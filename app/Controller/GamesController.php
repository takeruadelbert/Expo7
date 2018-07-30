<?php

App::uses('AppController', 'Controller');

class GamesController extends AppController {

    var $name = "Games";
    var $disabledAction = array(
    );
    var $contain = [
        "CategoryGameDetail" => [
            "CategoryGame"
        ],
        "GameDetail",
        "GameStatus",
        "Creator" => [
            "Biodata",
            "User",
            "Member"
        ]
    ];

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function _options() {
        $this->set("categories", ClassRegistry::init("CategoryGame")->find("list", ["fields" => ["CategoryGame.id", 'CategoryGame.name']]));
        $this->set("gameStatuses", ClassRegistry::init("GameStatus")->find("list", ['fields' => ['GameStatus.id', 'GameStatus.name']]));
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->Game->data['Game']['thumbnail']['name']) && !empty($this->Game->data['Game']['cover']['name'])) {
                    foreach ($this->Game->data['Game']['categories'] as $index => $category) {
                        $this->Game->data['CategoryGameDetail'][$index]['category_game_id'] = $category;
                    }
                    unset($this->Game->data['Game']['categories']);

                    // thumbnail processing
                    try {
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->Game->data['Game']['thumbnail']);
                        $result = $uploader->handleUpload("img" . DS . "games" . DS . "thumbnails" . DS);
                        switch ($result['status']) {
                            case 206:
                                $this->Game->data['Game']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                break;
                        }
                        unset($this->Game->data['Game']['thumbnail']);
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Error found when uploading thumbnail. Please try again."), 'default', array(), 'danger');
                    }

                    // cover processing
                    try {
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->Game->data['Game']['cover']);
                        $result = $uploader->handleUpload("img" . DS . "games" . DS . "covers" . DS);
                        switch ($result['status']) {
                            case 206:
                                $this->Game->data['Game']['cover_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                break;
                        }
                        unset($this->Game->data['Game']['cover']);
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Error found when uploading cover. Please try again."), 'default', array(), 'danger');
                    }

                    /*
                     * process the build game (unity WebGL data)
                     * extracting them.
                     */
                    if(!empty($this->Game->data['Game']['import_build']['size'])) {
                        $import_build_file = $this->Game->data['Game']['import_build'];
                        $temp = str_replace(" ", "", $this->Game->data['Game']['name']);
                        $game_name = preg_replace('/[^A-Za-z0-9\-]/', '', $temp);
                        $path = "games" . DS . $game_name . DS;
                        if ($this->extract_zip($import_build_file['tmp_name'], $path)) {
                            $extracted_path = glob($path . "*");
                            $parent_dir = basename($extracted_path[0]);
                            $index_html_dir = glob($path . $parent_dir . DS . "index.html");
                            $build_game_path = dirname($index_html_dir[0]);
                            $this->Game->data['Game']['build_game_path'] = $build_game_path;
                        } else {
                            $this->Session->setFlash(__("Error found when extracting the import build game files."), "default", array(), "danger");
                            $this->redirect(array('action' => 'admin_index'));
                        }
                    }
                    $this->{Inflector::classify($this->name)}->data['Game']['game_status_id'] = 2;
                    $this->{ Inflector::classify($this->name) }->data['Game']['creator_id'] = ClassRegistry::init("Account")->get_member_ids("expo7");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                    $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    $this->Session->setFlash(__("Thumbnail & Cover Must not be Empty"), 'default', array(), 'danger');
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
    }

    function admin_edit($id = null) {
        if (!$this->{ Inflector::classify($this->name) }->exists($id)) {
            throw new NotFoundException(__('Data tidak ditemukan'));
        } else {
            if ($this->request->is("post") || $this->request->is("put")) {
                $this->{ Inflector::classify($this->name) }->set($this->data);
                $this->{ Inflector::classify($this->name) }->data[Inflector::classify($this->name)]['id'] = $id;
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                    if (!is_null($id)) {
                        foreach ($this->Game->data['Game']['categories'] as $index => $category) {
                            $dataCategoryGameDetail = ClassRegistry::init("CategoryGameDetail")->find("first", [
                                "conditions" => [
                                    "CategoryGameDetail.category_game_id" => $category,
                                    "CategoryGameDetail.game_id" => $id
                                ]
                            ]);
                            if (!empty($dataCategoryGameDetail)) {
                                $this->Game->data['CategoryGameDetail'][$index]['id'] = $dataCategoryGameDetail['CategoryGameDetail']['id'];
                            }
                            $this->Game->data['CategoryGameDetail'][$index]['category_game_id'] = $category;
                        }
                        unset($this->Game->data['GameCategoryDetail']);

                        if (!empty($this->Game->data['Game']['thumbnail']['name'])) {
                            // thumbnail processing
                            try {
                                App::import("Vendor", "qqUploader");
                                $allowedExt = array("jpg", "jpeg", "png");
                                $size = 10 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $this->Game->data['Game']['thumbnail']);
                                $result = $uploader->handleUpload("img" . DS . "games" . DS . "thumbnails" . DS);
                                switch ($result['status']) {
                                    case 206:
                                        $this->Game->data['Game']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                        break;
                                }
                            } catch (Exception $ex) {
                                $this->Session->setFlash(__("Error found when uploading thumbnail. Please try again."), 'default', array(), 'danger');
                            }
                        }
                        unset($this->Game->data['Game']['thumbnail']);
                        if (!empty($this->Game->data['Game']['cover']['name'])) {
                            // cover processing
                            try {
                                App::import("Vendor", "qqUploader");
                                $allowedExt = array("jpg", "jpeg", "png");
                                $size = 10 * 1024 * 1024;
                                $uploader = new qqFileUploader($allowedExt, $size, $this->Game->data['Game']['cover']);
                                $result = $uploader->handleUpload("img" . DS . "games" . DS . "covers" . DS);
                                switch ($result['status']) {
                                    case 206:
                                        $this->Game->data['Game']['cover_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                        break;
                                }
                            } catch (Exception $ex) {
                                $this->Session->setFlash(__("Error found when uploading cover. Please try again."), 'default', array(), 'danger');
                            }
                        }
                        unset($this->Game->data['Game']['cover']);
                        $this->Game->_deleteableHasmany();

                        /*
                         * Recreate the build game directory if user upload it again.
                         */
                        if (!empty($this->Game->data['Game']['import_build']['size'])) {
                            $dataImportBuild = $this->Game->find("first", [
                                "conditions" => [
                                    "Game.id" => $id
                                ],
                                "recursive" => -1
                            ]);
                            if (!empty($dataImportBuild['Game']['build_game_path'])) {
                                if (file_exists(realpath($dataImportBuild['Game']['build_game_path']))) {
                                    $parent_dir = $dataImportBuild['Game']['build_game_path'];
                                    $this->removeDirectory($parent_dir);
                                }
                            }
                            $import_build_file = $this->Game->data['Game']['import_build'];
                            $temp = str_replace(" ", "", $this->Game->data['Game']['name']);
                            $game_name = preg_replace('/[^A-Za-z0-9\-]/', '', $temp);
                            $path = "games" . DS . $game_name . DS;
                            if ($this->extract_zip($import_build_file['tmp_name'], $path)) {
                                $extracted_path = glob($path . "*");
                                $parent_dir = basename($extracted_path[0]);
                                $index_html_dir = glob($path . $parent_dir . DS . "index.html");
                                $build_game_path = dirname($index_html_dir[0]);
                                $this->Game->data['Game']['build_game_path'] = $build_game_path;
                            } else {
                                $this->Session->setFlash(__("Error found when extracting the import build game files."), "default", array(), "danger");
                            }
                        }
                        $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                        $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                        $this->redirect(array('action' => 'admin_index'));
                    }
                } else {
                    $this->request->data[Inflector::classify($this->name)]["id"] = $id;
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                }
            } else {
                $rows = $this->{ Inflector::classify($this->name) }->find("first", array(
                    'conditions' => array(
                        Inflector::classify($this->name) . ".id" => $id
                    ),
                    'recursive' => 2
                ));
                $this->data = $rows;
            }
        }
    }

    function admin_upload_image() {
        $this->autoRender = false;
        $this->layout = 'ajax';
        $this->jump = true;
        App::import('Vendor', 'qqUploaderGame');
    }

    function api_data_scoreboard() {
        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $fields = [
                "code_game",
                "id_referral",
                "score"
            ];
            if ($this->_checkData($fields)) {
                $code_game = $this->data['code_game'];
                $id_referral = $this->data['id_referral'];

                // find the game
                $dataGame = ClassRegistry::init("Game")->find("first", [
                    "conditions" => [
                        "Game.code" => $code_game
                    ],
                    'contain' => [
                        "Scoreboard"
                    ]
                ]);

                // find the member
                $dataMember = ClassRegistry::init("Member")->find("first", [
                    'conditions' => [
                        "Member.id_referral" => $id_referral
                    ],
                    "recursive" => -1
                ]);

                // find the score from the scoreboard
                $dataScoreboard = ClassRegistry::init("Scoreboard")->find("first", [
                    "conditions" => [
                        "Scoreboard.game_id" => $dataGame['Game']['id'],
                        "Scoreboard.member_id" => $dataMember['Member']['id']
                    ],
                    "recursive" => -1
                ]);

                /*
                 * compare if current score is the best score.
                 * If so, replace the score with the new one.
                 */
                if (!empty($dataScoreboard)) {
                    if ($this->data['score'] > $dataScoreboard['Scoreboard']['score']) {
                        $score = $this->data['score'];
                    } else {
                        $score = $dataScoreboard['Scoreboard']['score'];
                    }
                } else {
                    $score = $this->data['score'];
                }

                if (!empty($dataGame) && !empty($dataMember)) {
                    try {
                        if (empty($dataScoreboard)) {
                            $savedData = [
                                "Scoreboard" => [
                                    "game_id" => $dataGame['Game']['id'],
                                    "member_id" => $dataMember['Member']['id'],
                                    "score" => $score
                                ]
                            ];
                            ClassRegistry::init("Scoreboard")->save($savedData);
                            $this->_writeApiResponse($this->_generateStatusCode(200, 'Data has been saved successfully.', $savedData));
                        } else {
                            $updatedData = [
                                "Scoreboard" => [
                                    "id" => $dataScoreboard['Scoreboard']['id'],
                                    "score" => $score
                                ]
                            ];
                            ClassRegistry::init("Scoreboard")->save($updatedData);
                            $this->_writeApiResponse($this->_generateStatusCode(202, 'Data has been updated successfully.', $updatedData));
                        }
                    } catch (Exception $ex) {
                        $this->_writeApiResponse($this->_generateStatusCode(405, 'Failed to save data.'));
                    }
                } else {
                    $this->_writeApiResponse($this->_generateStatusCode(401, 'No data game and/or member found.'));
                }
            }
        } else if ($this->request->is("GET")) {
            if ($this->_checkData(["code"])) {
                $code_game = $this->request->query['code'];

                // find the game
                $dataGame = ClassRegistry::init("Game")->find("first", [
                    "conditions" => [
                        "Game.code" => $code_game
                    ],
                    "contain" => [
                        "Scoreboard" => [
                            "Member" => [
                                "Account" => [
                                    "Biodata"
                                ]
                            ],
                            "order" => "Scoreboard.score DESC",
                            "limit" => 10
                        ],
                    ]
                ]);
                $list_scoreboard = [];
                $rank = 1;
                foreach ($dataGame['Scoreboard'] as $scoreboard) {
                    $list_scoreboard[] = [
                        'name' => $scoreboard['Member']['Account']['Biodata']['full_name'],
                        'rank' => $rank,
                        'score' => (int) $scoreboard['score']
                    ];
                    $rank++;
                }

                $data_game_scoreboard = [
                    "game_name" => $dataGame['Game']['name'],
                    "game_code" => $dataGame['Game']['code'],
                    "scoreboard" => $list_scoreboard
                ];

                $this->_writeApiResponse($this->_generateStatusCode(206, "OK", $data_game_scoreboard));
            }
        } else if ($this->request->is("DELETE")) {
            try {
                ClassRegistry::init("Scoreboard")->truncate_data();
                $this->_writeApiResponse($this->_generateStatusCode(202, "Truncate success."));
            } catch (Exception $ex) {
                $this->_writeApiResponse($this->_generateStatusCode(206, "Failed to truncate."));
            }
        } else {
            $this->_writeApiResponse($this->_generateStatusCode(400, 'Invalid Request.'));
        }
    }

    function api_list_game() {
        $this->autoRender = false;
        if ($this->request->is("GET")) {
            $dataGames = ClassRegistry::init("Game")->find("all", ["recursive" => -1]);
            $listGame = [];
            foreach ($dataGames as $game) {
                $listGame[] = [
                    "name" => $game['Game']['name'],
                    "code" => $game['Game']['code']
                ];
            }
            $dataListGame = [
                "gamelist" => $listGame
            ];
            $this->_writeApiResponse($this->_generateStatusCode(206, 'OK', $dataListGame));
        } else {
            $this->_writeApiResponse($this->_generateStatusCode(400, 'Invalid Request.'));
        }
    }

    function admin_change_status() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->Game->id = $this->request->data['id'];
            $this->Game->save(array("Game" => array("game_status_id" => $this->request->data['status'])));
            $data = $this->Game->find("first", array("conditions" => array("Game.id" => $this->request->data['id']), "recursive" => 1));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['GameStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }

}
