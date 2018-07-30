<?php

/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class FrontsController extends AppController {

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     * 	or MissingViewException in debug mode.
     */
    public function front_display() {
        $path = func_get_args();
        $this->_render($path);
    }

    public function member_display() {
        $path = func_get_args();
        $this->_render($path);
    }

    public function _render($path) {
        $count = count($path);
        if (!$count) {
            $path[] = 'ID';
            $path[] = "index";
        }
        $page = $subpage = $title_for_layout = null;
        if (!empty($path[1])) {
            $page = $path[$count - 1];
        }
        if (!empty($path[2])) {
            $subpage = $path[2];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        if ($this->params['member'] && !$this->memberEngine->isPaymentMade()) {
            $page = "member_payment";
        }

        // create Session default language
        $this->Session->write("default-lang", "eng");
//        $this->Session->delete("lang");
        if (!isset($this->request->query['lang']) && empty($this->request->query['lang'])) {
            if ($this->Session->read("lang")) {
                $language = $this->Session->read("lang");
            } else {
                // auto-detect user location from their IP Address
                $ip_address = $_SERVER['REMOTE_ADDR'];
                $language = ClassRegistry::init("Country")->get_country_from_ip_address($ip_address);
            }
            $this->Session->write("lang", $language);
        } else {
            $language = $this->request->query['lang'];
            $this->Session->write("lang", $language);
        }
        $this->_setLangClassic();

        switch ($page) {
            case "forget_password" :
                $dataLogin = ClassRegistry::init("FrontLoginPage")->find("first", ['recursive' => -1]);
                $this->set(compact("dataLogin"));
                break;
            case "reset_password" :
                $dataLogin = ClassRegistry::init("FrontLoginPage")->find("first", ['recursive' => -1]);
                $token = $path[0];
                $data = ClassRegistry::init("Account")->find("first", [
                    "conditions" => [
                        "PasswordReset.token" => $token,
                    ],
                    "contain" => [
                        "PasswordReset",
                        "User"
                    ]
                ]);
                $now = new DateTime();
                if (is_null($token) || empty($data) || $data['PasswordReset']['is_used'] || $now > new DateTime($data['PasswordReset']['expire'])) {
                    $this->Session->setFlash(__("Invalid Token"), 'default', array(), 'danger');
                    $this->redirect("/");
                }
                if ($this->request->is("post")) {
                    $current_password = $this->data['User']['newPassword'];
                    $repeat_password = $this->data['User']['repeatPassword'];
                    if ($current_password != $repeat_password) {
                        $this->Session->setFlash(__("Both Password are not exact same. Try again."), 'default', array(), 'danger');
                        $this->redirect($this->referer());
                    }
                    $this->loadModel("Account");
                    try {
                        $password = $current_password;
                        $salt = $data['User']['salt'];
                        $encrypt = ClassRegistry::init("Account")->_hashPassword($password . $salt);
                        $this->Account->data["Account"]["id"] = $data['Account']['id'];
                        $this->Account->data["User"]["id"] = $data['User']['id'];
                        $this->Account->data["PasswordReset"]["id"] = $data['PasswordReset']['id'];
                        $this->Account->data["User"]["password"] = $encrypt;
                        $this->Account->data["PasswordReset"]["is_used"] = true;
                        $this->Account->saveAll($this->Account->data, array("deep" => true));
                        $this->Session->setFlash(__("Your Password has been changed."), 'default', array(), 'success');
                    } catch (Exception $e) {
                        $this->Session->setFlash(__("Failed to change the password."), 'default', array(), 'danger');
                    }
                    $this->redirect("/");
                }
                $this->set(compact("dataLogin", 'token'));
                break;
            case "login" :
                $dataLogin = ClassRegistry::init("FrontLoginPage")->find("first", ['recursive' => -1]);
                $this->set(compact("dataLogin"));
                break;
            case "play_game" :
                $detailGame = ClassRegistry::init("Game")->find("first", [
                    "conditions" => [
                        "Game.id" => $path[0]
                    ],
                    "recursive" => -1,
                ]);
                $this->set(compact('detailGame'));
                break;
            case "game" :
                $order = "Game.name";
                $categoryGames = ClassRegistry::init("CategoryGame")->find("all", ['recursive' => -1, 'order' => 'CategoryGame.name']);
                if (isset($this->request->query['category']) && !empty($this->request->query['category'])) {
                    $category = $this->request->query['category'];
                    $current_category = $category;
                    $category_game_id = ClassRegistry::init("CategoryGame")->find("first", [
                        "conditions" => [
                            "CategoryGame.name" => $category
                        ],
                        "recursive" => -1
                    ]);
                    $listGames = ClassRegistry::init("CategoryGameDetail")->find("all", [
                        "conditions" => [
                            "CategoryGameDetail.category_game_id" => $category_game_id['CategoryGame']['id'],
                            "Game.game_status_id" => 2
                        ],
                        "contain" => [
                            "Game",
                            "CategoryGame"
                        ],
                        "order" => $order
                    ]);
                } else {
                    $current_category = "all";
                    $listGames = ClassRegistry::init("CategoryGameDetail")->find("all", [
                        "conditions" => [
                            "Game.game_status_id" => 2
                        ],
                        "contain" => [
                            "Game",
                            "CategoryGame"
                        ],
                        "order" => $order,
                        "group" => "CategoryGameDetail.game_id"
                    ]);
                }
                $this->set(compact('categoryGames', 'listGames', 'current_category'));
                break;
            case "detail_game" :
                $detailGame = ClassRegistry::init("Game")->find("first", [
                    "conditions" => [
                        "Game.id" => $path[0]
                    ],
                    "contain" => [
                        "GameDetail",
                        "CategoryGameDetail" => [
                            "CategoryGame"
                        ],
                        "Scoreboard" => [
                            "Member" => [
                                "Account" => [
                                    "Biodata"
                                ]
                            ],
                            "limit" => 10,
                            "order" => "Scoreboard.score DESC"
                        ]
                    ],
                ]);
                $category_ids = [];
                foreach ($detailGame['CategoryGameDetail'] as $details) {
                    $category_ids[] = $details['category_game_id'];
                }
                $dataSimilarGame = ClassRegistry::init("CategoryGameDetail")->find("all", [
                    "conditions" => [
                        "CategoryGameDetail.game_id !=" => $path[0],
                        "CategoryGameDetail.category_game_id" => $category_ids
                    ],
                    "contain" => [
                        "CategoryGame",
                        "Game"
                    ],
                    "limit" => 5,
                    "group" => "CategoryGameDetail.game_id"
                ]);
                $this->set(compact('detailGame', 'dataSimilarGame'));
                break;
            case "privacy_policy" :
                $this->set("privacyPolicies", ClassRegistry::init("PrivacyPolicy")->find("all", ['order' => 'PrivacyPolicy.ordering_number']));
                break;
            case "term_and_condition" :
                $this->set("termConditions", ClassRegistry::init("TermAndCondition")->find("first", [
                            'contain' => [
                                'TermAndConditionDetail' => [
                                    "order" => "TermAndConditionDetail.ordering_number"
                                ]
                            ],
                ]));
                break;
            case "payment_guide" :
                $this->set("paymentGuides", ClassRegistry::init("PaymentGuide")->find("first"));
                break;
            case "instruction" :
                $this->set("instructions", ClassRegistry::init("Instruction")->find("all", ['order' => "Instruction.ordering_number"]));
                break;
            case "how_to" :
                $how_to = ClassRegistry::init("HowTo")->find("all", ["recursive" => -1]);
                $this->set(compact('how_to'));
                break;
            case "about_us" :
                $this->set("aboutUs", ClassRegistry::init("About")->find("first"));
                break;
            case "gallery" :
                $conds = [];
                if (!empty($this->request->query['country_id'])) {
                    $country_id = $this->request->query['country_id'];
                    $conds[] = [
                        "Gallery.country_id" => $country_id
                    ];
                }
                if (!empty($this->request->query['state_id'])) {
                    $state_id = $this->request->query['state_id'];
                    $conds[] = [
                        "Gallery.state_id" => $state_id
                    ];
                }
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 9;
                }
                $order = 'Gallery.date DESC';
                $dataHighlightGallery = ClassRegistry::init("Gallery")->find("all", [
                    "order" => $order,
                    "limit" => 5,
                    "contain" => [
                        "DetailPhoto" => [
                            'order' => "DetailPhoto.is_default DESC"
                        ]
                    ]
                ]);
                $highlight_gallery_id = [];
                foreach ($dataHighlightGallery as $highlightGallery) {
                    $highlight_gallery_id[] = $highlightGallery['Gallery']['id'];
                }
                $conds[] = [
                    "Gallery.id !=" => $highlight_gallery_id
                ];
                $contain = [
                    "Account" => [
                        "Biodata"
                    ],
                    "DetailPhoto" => [
                        "order" => "DetailPhoto.is_default DESC"
                    ],
                    "ContentType",
                    "State",
                    "Country"
                ];
                $gallery = ClassRegistry::init("Gallery")->find("all", [
                    "conditions" => $conds,
                    "contain" => $contain,
                    'order' => $order,
                    'limit' => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Gallery", $conds, $pageNum, $limit, $order);
                $countries = ClassRegistry::init("Country")->find("all");
                $this->set(compact("paginationInfo", "gallery", "dataHighlightGallery", 'countries'));
                break;
            case "contact_us" :
                $this->set("dataContact", ClassRegistry::init("Contact")->find("first"));
                break;
            case "news" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 6;
                }
                $dataHighlightNews = ClassRegistry::init("News")->find("all", [
                    "order" => "News.news_date DESC",
                    "limit" => 3,
                    "recursive" => -1
                ]);
                $highlight_news_id = [];
                foreach ($dataHighlightNews as $highlightNews) {
                    $highlight_news_id[] = $highlightNews['News']['id'];
                }
                $order = 'News.news_date DESC';
                $conds = [
                    "News.news_status_id" => 2,
                    "News.id !=" => $highlight_news_id
                ];
                $contain = [
                    "Account" => [
                        "Biodata",
                        "User"
                    ]
                ];
                $news = ClassRegistry::init("News")->find("all", [
                    "conditions" => $conds,
                    "contain" => $contain,
                    'order' => $order,
                    'limit' => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("News", $conds, $pageNum, $limit, $order);
                $this->set(compact("paginationInfo", "news", "dataHighlightNews"));
                break;
            case "detail_news" :
                $dataNews = ClassRegistry::init("News")->find("first", [
                    "conditions" => [
                        "News.id" => $path[0]
                    ]
                ]);
                $this->set(compact('dataNews'));
                break;
            case "index" :
                $dataSlideshow = ClassRegistry::init("IndexSlideshow")->find("all", [
                    "conditions" => [
                        "IndexSlideshow.slideshow_status_id" => 2
                    ]
                ]);
                $dataHomeContent = ClassRegistry::init("HomeContent")->find("first", [
                    "contain" => [
                        "HomeContentDetail"
                    ]
                ]);
                $this->set(compact('dataSlideshow', 'dataHomeContent'));
                break;
            case "events" :
                if (isset($this->request->query['date']) && !empty($this->request->query['date'])) {
                    $query_date = $this->request->query['date'];
                } else {
                    $query_date = date("Y-n-d");
                }
                $temp_date = explode("-", $query_date);
                $year = $temp_date[0];
                $month = $temp_date[1];
                $day = $temp_date[2];
                if ($month < 10) {
                    $month = "0" . $month;
                }
                $date = $year . "-" . $month . "-" . $day;
                $events = ClassRegistry::init("Event")->find("all", [
                    "conditions" => [
                        "DATE_FORMAT(Event.event_date, '%Y-%m-%d')" => $date,
                        "Event.event_status_id" => 2
                    ],
                    "order" => "Event.event_date DESC",
                    "contain" => [
                        "EventStatus"
                    ]
                ]);
                $this->set(compact('events'));
                break;
            case "detail_event" :
                $dataEvent = ClassRegistry::init("Event")->find("first", [
                    "conditions" => [
                        "Event.id" => $path[0],
                        "Event.event_status_id" => 2
                    ]
                ]);
                $this->set(compact('dataEvent'));
                break;
            case "our_testimonies" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 9;
                }
                $order = 'Testimony.verified_datetime DESC';
                $conds = [
                    "Testimony.verify_status_id" => 2
                ];
                $contain = [
                    "Account" => [
                        "Biodata",
                        "User"
                    ]
                ];
                $dataTestimonies = ClassRegistry::init("Testimony")->find("all", [
                    "conditions" => $conds,
                    "contain" => $contain,
                    'order' => $order,
                    'limit' => $limit,
                    "page" => $pageNum
                ]);
                $dataHighlightTestimonies = ClassRegistry::init("Testimony")->find("all", [
                    "conditions" => $conds,
                    "order" => $order,
                    "limit" => 3,
                    "contain" => $contain
                ]);
                $paginationInfo = $this->_paginationInfo("Testimony", $conds, $pageNum, $limit, $order);

                $dataTestimonialPage = ClassRegistry::init("TestimonialPage")->find("first", ['recursive' => -1]);

                $this->set(compact("paginationInfo", "dataTestimonies", 'dataHighlightTestimonies', 'dataTestimonialPage'));
                break;
            case "member_edit_profile" :
                break;
            case "member_knowledge_base" :
                $dataKnowledgeBase = ClassRegistry::init("KnowledgeBase")->find("all", ['order' => 'KnowledgeBase.placement_order']);
                $this->set(compact('dataKnowledgeBase'));
                break;
            case "member_testimonial" :
                $dataTestimonyContent = ClassRegistry::init("MemberTestimonialPage")->find("first", ['recursive' => -1]);
                $dataTestimony = ClassRegistry::init("Testimony")->find("first", [
                    "conditions" => [
                        "Testimony.account_id" => $this->Session->read("credential.member.Account.id")
                    ],
                    "recursive" => -1
                ]);
                $this->set(compact('dataTestimony', 'dataTestimonyContent'));
                if ($this->request->is("post")) {
                    $updatedData = [];
                    if (!empty($dataTestimony)) {
                        $updatedData['Testimony']['id'] = $dataTestimony['Testimony']['id'];
                    }
                    $updatedData['Testimony']['account_id'] = $this->data['Testimony']['account_id'];
                    $updatedData['Testimony']['title'] = $this->data['Testimony']['title'];
                    $updatedData['Testimony']['message'] = $this->data['Testimony']['message'];
                    $updatedData['Testimony']['rate'] = $this->data['Testimony']['rate'];
                    if (ClassRegistry::init("Testimony")->save($updatedData, array('validate' => 'only'))) {
                        ClassRegistry::init("Testimony")->save($updatedData);
                        $this->Session->setFlash(__("Successfully added and waiting to be approved"), 'default', array(), 'success');
                    } else {
                        $this->Session->setFlash(__("Error"), 'default', array(), 'danger');
                    }
                    $this->redirect('/member/testimonial');
                }
                break;
            case "member_payment":
                $dataMember = ClassRegistry::init("Member")->find("first",[
                    "conditions" => [
                        "Member.id" => $this->Session->read("credential.member.Member.id")
                    ],
                    "contain" => [
                        "Account" => [
                            "Biodata"
                        ]
                    ]
                ]);
                $this->set(compact('dataMember'));
                break;
            case "activation":
                $activationToken = $this->request->query["token"];
                $account = ClassRegistry::init("Account")->find("first", [
                    "conditions" => [
                        "Account.activation_code" => $activationToken,
                    ],
                    "recursive" => -1
                ]);
                if (!empty($account)) {
                    if ($account["Account"]['account_status_id'] == 4) {
                        ClassRegistry::init("Account")->saveAll([
                            "Account" => [
                                "id" => $account["Account"]["id"],
                                "account_status_id" => 5,
                                "activation_dt" => date("Y-m-d H:i:s")
                            ],
                        ]);
                    }
                }
                break;
            case "member_genealogytree":
                $tree = $this->memberEngine->buildGenealogyTree($this->memberEngine->getAccountId());
                $tree = $this->memberEngine->translateToGoJsFormat($tree);
                $this->set(compact('tree'));
                break;
            case "member_ewallet_history":
                $conds = [
                    "NOT" => [
                        "TransactionType.code" => ["RF"],
                    ]
                ];
                if ($this->memberEngine->getAccountId() == _WESTWOOD_ACCOUNT_ID) {
                    $conds = [];
                }
                $transactions = ClassRegistry::init("Transaction")->find("all", [
                    "conditions" => [
                        "Transaction.balance_id" => $this->memberEngine->getBalanceId(),
                        $conds
                    ],
                    "recursive" => -1,
                    "order" => "Transaction.id desc",
                    "contain" => [
                        "RelatedAccount" => [
                            "Biodata",
                            "Member",
                        ],
                        "TransactionType",
                    ]
                ]);
                $this->set("ewallethistory", $transactions);
                break;
            case "member_sent_message" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 1;
                }
                $contain = [
                    "Recipient" => [
                        "Biodata",
                        "User"
                    ],
                    "Sender" => [
                        "Biodata",
                        "User"
                    ],
                    "Parent",
                    "Child" => [
                        "Recipient" => [
                            "User",
                            "Biodata"
                        ],
                        "Sender" => [
                            "User",
                            "Biodata"
                        ],
                        'order' => 'Child.created'
                    ]
                ];
                $order = "Message.created DESC";
                $conds = [
                    "Message.parent_id" => null,
                    "Message.sender_id" => $this->Session->read("credential.member.Account.id")
                ];
                $dataAllSentMessage = ClassRegistry::init("Message")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Message", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllSentMessage', 'paginationInfo'));
                break;
            case "member_inbox_message" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $order = "Message.created DESC";
                $conds = [];
                $contain = [
                    "Recipient" => [
                        "Biodata",
                        "User"
                    ],
                    "Sender" => [
                        "Biodata",
                        "User"
                    ],
                    "Parent",
                    "Child" => [
                        "Recipient" => [
                            "User",
                            "Biodata"
                        ],
                        "Sender" => [
                            "User",
                            "Biodata"
                        ],
                        'order' => 'Child.created'
                    ]
                ];
                $parentMessages = ClassRegistry::init("Message")->find("all", [
                    "conditions" => [
                        "Message.recipient_id" => $this->memberEngine->getAccountId(),
                    ],
                    "recursive" => -1,
                ]);
                $parentMessagesIds = array_column(array_column($parentMessages, "Message"), "parent_id");
                $conds = [
                    "OR" => [
                        "AND" => [
                            "Message.recipient_id" => $this->Session->read("credential.member.Account.id"),
                            "Message.parent_id" => null,
                        ],
                        "Message.id" => $parentMessagesIds,
                    ]
                ];
                $dataAllInboxMessage = ClassRegistry::init("Message")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Message", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllInboxMessage', 'paginationInfo'));
                break;
            case "member_new_message" :
                $conds = [];
                $data_forwardded_message = [];
                if (!empty($this->request->query['parent_id'])) {
                    $conds[] = [
                        "Message.parent_id" => $this->request->query['parent_id'],
                        "Message.id" => $this->request->query['id']
                    ];
                    $data_forwardded_message = ClassRegistry::init("Message")->find("first", [
                        "conditions" => $conds,
                        'recursive' => -1
                    ]);
                }
                $this->set(compact('data_forwardded_message'));
                break;
            case "member_new_ticket" :
                $departments = ClassRegistry::init("Department")->find("list", array("fields" => array("Department.id", "Department.name", "Parent.name"), "contain" => ['Parent']));
                $departments['Main Department'] = $departments[0];
                if (!empty($departments[0])) {
                    unset($departments[0]);
                }
                $this->set(compact("departments"));
                break;
            case "member_all_ticket" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $contain = [
                    "Account" => [
                        "User",
                        "Biodata"
                    ],
                    "TicketStatus",
                    "Department",
                    "Parent",
                    "Child" => [
                        "Account" => [
                            "Biodata",
                            "User"
                        ]
                    ]
                ];
                $order = "Ticket.created DESC";
                $parentTickets = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        "Ticket.account_id" => $this->memberEngine->getAccountId()
                    ],
                    "recursive" => -1,
                ]);
                $parentTicketIds = array_column(array_column($parentTickets, "Ticket"), "parent_id");
                $conds = [
                    "OR" => [
                        "AND" => [
                            "Ticket.account_id" => $this->memberEngine->getAccountId(),
                            "Ticket.parent_id" => null
                        ],
                        "Ticket.id" => $parentTicketIds,
                    ]
                ];
                $dataAllTicket = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Ticket", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllTicket', 'paginationInfo'));
                break;
            case "member_all_ticket_open" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $contain = [
                    "Account" => [
                        "User",
                        "Biodata"
                    ],
                    "TicketStatus",
                    "Department",
                    "Parent",
                    "Child" => [
                        "Account" => [
                            "Biodata",
                            "User"
                        ]
                    ]
                ];
                $order = "Ticket.created DESC";
                $parentTickets = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        "Ticket.account_id" => $this->memberEngine->getAccountId(),
                        "Ticket.ticket_status_id" => 1
                    ],
                    "recursive" => -1,
                ]);
                $parentTicketIds = array_column(array_column($parentTickets, "Ticket"), "parent_id");
                $conds = [
                    "OR" => [
                        "AND" => [
                            "Ticket.account_id" => $this->memberEngine->getAccountId(),
                            "Ticket.parent_id" => null,
                            "Ticket.ticket_status_id" => 1
                        ],
                        "Ticket.id" => $parentTicketIds,
                    ]
                ];
                $dataAllTicket = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Ticket", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllTicket', 'paginationInfo'));
                break;
            case "member_all_ticket_in_progress" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $contain = [
                    "Account" => [
                        "User",
                        "Biodata"
                    ],
                    "TicketStatus",
                    "Department",
                    "Parent",
                    "Child" => [
                        "Account" => [
                            "Biodata",
                            "User"
                        ]
                    ]
                ];
                $order = "Ticket.created DESC";
                $parentTickets = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        "Ticket.account_id" => $this->memberEngine->getAccountId(),
                        "Ticket.ticket_status_id" => 2
                    ],
                    "recursive" => -1,
                ]);
                $parentTicketIds = array_column(array_column($parentTickets, "Ticket"), "parent_id");
                $conds = [
                    "OR" => [
                        "AND" => [
                            "Ticket.account_id" => $this->memberEngine->getAccountId(),
                            "Ticket.parent_id" => null,
                            "Ticket.ticket_status_id" => 2
                        ],
                        "Ticket.id" => $parentTicketIds,
                    ]
                ];
                $dataAllTicket = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Ticket", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllTicket', 'paginationInfo'));
                break;
            case "member_all_ticket_solved" :
                if (isset($this->request->query['page']) && !empty($this->request->query['page'])) {
                    $pageNum = $this->request->query['page'];
                } else {
                    $pageNum = 1;
                }
                if (isset($this->request->query['limit']) && !empty($this->request->query['limit'])) {
                    $limit = $this->request->query['limit'];
                } else {
                    $limit = 10;
                }
                $contain = [
                    "Account" => [
                        "User",
                        "Biodata"
                    ],
                    "TicketStatus",
                    "Department",
                    "Parent",
                    "Child" => [
                        "Account" => [
                            "Biodata",
                            "User"
                        ]
                    ]
                ];
                $order = "Ticket.created DESC";
                $parentTickets = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        "Ticket.account_id" => $this->memberEngine->getAccountId(),
                        "Ticket.ticket_status_id" => 3
                    ],
                    "recursive" => -1,
                ]);
                $parentTicketIds = array_column(array_column($parentTickets, "Ticket"), "parent_id");
                $conds = [
                    "OR" => [
                        "AND" => [
                            "Ticket.account_id" => $this->memberEngine->getAccountId(),
                            "Ticket.parent_id" => null,
                            "Ticket.ticket_status_id" => 3
                        ],
                        "Ticket.id" => $parentTicketIds,
                    ]
                ];
                $dataAllTicket = ClassRegistry::init("Ticket")->find("all", [
                    "conditions" => [
                        $conds
                    ],
                    "contain" => $contain,
                    "order" => $order,
                    "limit" => $limit,
                    "page" => $pageNum
                ]);
                $paginationInfo = $this->_paginationInfo("Ticket", $conds, $pageNum, $limit, $order);
                $this->set(compact('dataAllTicket', 'paginationInfo'));
            case "member_ewallet_withdraw":
                if (isset($this->request->data["step"])) {
                    $currentWdStep = $this->request->data["step"];
                } else {
                    $currentWdStep = "wd_token";
                }
                if ($this->request->is("post")) {
                    switch ($this->request->data["step"]) {
                        case "wd_token":
                            $username = $this->request->data["username"];
                            $password = $this->request->data["password"];
                            if ($this->memberEngine->getUsername() == $username) {
                                $data = $this->memberEngine->modelAccount->find("first", array("recursive" => 2, "conditions" => array("OR" => array("User.username" => $this->request->data['username']))));
                                if (!empty($data)) {
                                    if ($this->memberEngine->modelAccount->_testPassword($password, $data['User']['salt'], $data['User']['password'])) {
                                        //create wd token
                                        $wd_token = $this->memberEngine->modelAccount->Member->generateWdToken($data["Member"]["id"]);
                                        $currentWdStep = "wd_otp";
                                        $this->set(compact('wd_token'));
                                    } else {
                                        $this->Session->setFlash(__("Invalid Password"), 'default', array(), 'danger');
                                    }
                                } else {
                                    $this->Session->setFlash(__("User Not Found"), 'default', array(), 'danger');
                                }
                            } else {
                                $this->Session->setFlash(__("Invalid Username"), 'default', array(), 'danger');
                            }
                            break;
                        case "wd_otp":
                            $verification_code = $this->request->data['verification_code'];
                            $dataAccount = ClassRegistry::init("Account")->find("first", [
                                "conditions" => [
                                    "Account.id" => $this->memberEngine->getAccountId()
                                ],
                                "contain" => [
                                    "Member"
                                ]
                            ]);
                            if ($dataAccount['Member']['wd_otp'] == $verification_code) {
                                try {
                                    $updatedData = [];
                                    $updatedData['Member']['id'] = $dataAccount['Member']['id'];
                                    $updatedData['Member']['wd_otp_valid'] = 1;
                                    ClassRegistry::init("Member")->save($updatedData);
                                    $currentWdStep = "wd_notice";
                                } catch (Exception $ex) {
                                    $this->Session->setFlash(__("Error found when updating data table."), 'default', array(), 'danger');
                                }
                            } else {
                                $this->Session->setFlash(__("Verification Code is not match."), 'default', array(), 'danger');
                            }
                            break;
                        case "wd_notice" :
                            if (!empty($this->request->data['is_agree'])) {
                                // update the member balance and posting to Transaction Table
                                $dataAccount = ClassRegistry::init("Account")->find("first", [
                                    "conditions" => [
                                        "Account.id" => $this->memberEngine->getAccountId()
                                    ],
                                    "contain" => [
                                        "Member"
                                    ]
                                ]);
                                $dataBalanceMember = ClassRegistry::init("Balance")->find("first", [
                                    "conditions" => [
                                        "Balance.account_id" => $dataAccount['Account']['id']
                                    ],
                                    "recursive" => -1
                                ]);
                                $balance = $dataBalanceMember['Balance']['amount'];
                                if ($balance <= 0) {
                                    $this->Session->setFlash(__("Your current balance is not sufficient."), 'default', array(), 'danger');
                                } else {
                                    $code = "WD";
                                    try {
                                        ClassRegistry::init("Transaction")->updateTransaction($code, $balance, $dataAccount['Account']['id'], $dataAccount['Account']['id']);
                                        $currentWdStep = "wd_complete";
                                        $this->Session->setFlash(__("Withdrawal Success."), 'default', array(), 'success');
                                    } catch (Exception $ex) {
                                        $this->Session->setFlash(__("Error was found when updating the balance."), 'default', array(), 'danger');
                                    }
                                }
                            } else {
                                $this->Session->setFlash(__("An agreement have to be checked."), 'default', array(), 'danger');
                            }
                            break;
                    }
                }
                $this->set(compact('currentWdStep'));
                break;
            case "member_upload_game" :
                $genres = ClassRegistry::init("CategoryGame")->find("list", ['fields' => ['CategoryGame.id', 'CategoryGame.name'], 'recursive' => -1]);
                if ($this->request->is("POST")) {
                    $data_saved = [];
                    $data_saved['Game'] = $this->data['Game'];
                    foreach ($this->data['Genre'] as $index => $category) {
                        $data_saved['CategoryGameDetail'][$index]['category_game_id'] = $category;
                    }
                    $data_saved['Game']['creator_id'] = $this->memberEngine->getAccountId();

                    // thumbnail processing
                    try {
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['Dummy']['thumbnail']);
                        $result = $uploader->handleUpload("img" . DS . "games" . DS . "thumbnails" . DS);
                        switch ($result['status']) {
                            case 206:
                                $data_saved['Game']['thumbnail_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                break;
                        }
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Error found when uploading thumbnail. Please try again."), 'default', array(), 'danger');
                    }

                    // cover processing
                    try {
                        App::import("Vendor", "qqUploader");
                        $allowedExt = array("jpg", "jpeg", "png");
                        $size = 10 * 1024 * 1024;
                        $uploader = new qqFileUploader($allowedExt, $size, $this->data['Dummy']['cover']);
                        $result = $uploader->handleUpload("img" . DS . "games" . DS . "covers" . DS);
                        switch ($result['status']) {
                            case 206:
                                $data_saved['Game']['cover_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                break;
                        }
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Error found when uploading cover. Please try again."), 'default', array(), 'danger');
                    }

                    // processing game preview(s)
                    if (isset($this->data['Dummy']['Preview']) && !empty($this->data['Dummy']['Preview'])) {
                        try {
                            foreach ($this->data['Dummy']['Preview'] as $index => $preview) {
                                if (!empty($preview['preview']['name'])) {
                                    App::import("Vendor", "qqUploader");
                                    $allowedExt = array("jpg", "jpeg", "png");
                                    $size = 10 * 1024 * 1024;
                                    $uploader = new qqFileUploader($allowedExt, $size, $preview['preview']);
                                    $result = $uploader->handleUpload("img" . DS . "game" . DS . "preview" . DS);
                                    switch ($result['status']) {
                                        case 206:
                                            $data_saved['GameDetail'][$index]['image_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                                            break;
                                    }
                                }
                            }
                        } catch (Exception $ex) {
                            $this->Session->setFlash(__("Error found when uploading the preview game. Please try again."), 'default', array(), 'danger');
                        }
                    } else {
                        $this->Session->setFlash(__("Preview Game must be uploaded."), 'default', array(), 'danger');
                    }

                    /*
                     * process the build game (unity WebGL data)
                     * extracting them.
                     */
                    if (!empty($this->data['Dummy']['import_build_game']['size'])) {
                        $import_build_file = $this->data['Dummy']['import_build_game'];
                        $temp = str_replace(" ", "", $this->data['Game']['name']);
                        $game_name = preg_replace('/[^A-Za-z0-9\-]/', '', $temp);
                        $path = "games" . DS . $game_name . DS;
                        if ($this->extract_zip($import_build_file['tmp_name'], $path)) {
                            $extracted_path = glob($path . "*");
                            $parent_dir = basename($extracted_path[0]);
                            $index_html_dir = glob($path . $parent_dir . DS . "index.html");
                            $build_game_path = dirname($index_html_dir[0]);
                            $data_saved['Game']['build_game_path'] = $build_game_path;
                        } else {
                            $this->Session->setFlash(__("Error found when extracting the import build game files."), "default", array(), "danger");
                        }
                    }

                    try {
                        ClassRegistry::init("Game")->saveAll($data_saved, ['deep' => true]);
                        $this->Session->setFlash(__("Submit Successfully."), "default", array(), "success");
                        $this->redirect("/member/upload-game");
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Error found when saving the data."), "default", array(), "danger");
                    }
                }
                $this->set(compact('genres'));
                break;
            default:
                break;
        }
        $this->set(compact('front', 'subpage', 'title_for_layout', 'page'));
        try {
            $this->render($this->frontTemplate . '/' . $page);
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    function checkout() {
        $this->autoRender = false;
        if (!empty($this->request->query["method"]) && !empty($this->request->query["rc"])) {
            $method = $this->request->query["method"];
            $rc = $this->request->query["rc"]; //referral code
            $accountId = $this->memberEngine->translateRcToAccountId($rc);
            if (empty($accountId)) {
                echo "referral code not found";
                die;
            } else if ($this->memberEngine->checkPaymentMade($accountId) !== false) {
                echo "payment made for this referral code";
                die;
            }
            switch ($method) {
                case "paypalexpress":
                    App::import('Vendor', 'paypalexpresscheckout');
                    $paypalExpo7 = new PaypalExpo7();
                    $attempt = 0;
                    do {
                        $paypalUrl = $paypalExpo7->getCheckoutUrl($accountId);
                        $attempt++;
                    } while ($attempt <= 3 && $paypalUrl === false);
                    if ($paypalUrl !== false) {
                        parse_str($paypalUrl, $parsed);
                        $token = $parsed["token"];
                        $this->memberEngine->updatePaypalToken($accountId, $token);
                        if ($paypalUrl !== false) {
                            $this->redirect($paypalUrl);
                        }
                    } else {
                        $this->redirect("/admin/dashboard");
                    }
                    break;
                case "midtrans":
                    App::import('Vendor', 'checkout');
                    App::import('Vendor', 'kurs');
                    global $registrationFare;
                    $kurs = new Kurs();
                    $usdidr = $kurs->getUSDtoIDR();
                    $orderRef = $rc . rand(100, 999);
                    $snaptoken = midtransCheckout($orderRef, ceil($usdidr * $registrationFare));
                    $this->memberEngine->updateMidtransPayment($accountId, $registrationFare, $usdidr, $orderRef, $snaptoken);
                    $this->redirect("/snap/payment?snaptoken=$snaptoken");
                    break;
            }
        } else {
            echo "empty";
        }
    }

    function checkoutfinish() {
        $this->autoRender = false;
        if (!empty($this->request->query["method"])) {
            $method = $this->request->query["method"];
            switch ($method) {
                case "paypalexpress":
                    $paypalToken = $this->request->query["token"];
                    $paypalPayerId = $this->request->query["PayerID"];
                    App::import('Vendor', 'paypalexpresscheckout');
                    $paypalExpo7 = new PaypalExpo7();
                    try {
                        $attempt = 0;
                        do {
                            $parsedInfo = $paypalExpo7->doExpressCheckoutPayment($paypalToken, $paypalPayerId);
                            $attempt;
                        } while ($attempt <= 3 && $parsedInfo === false);
                        if ($parsedInfo !== false) {
                            $paypalInfo = $paypalExpo7->getExpressCheckoutDetails($paypalToken);
                            if ($paypalInfo["CHECKOUTSTATUS"] == "PaymentActionCompleted") {
                                $this->memberEngine->updatePaymentDoneInfoByPaypal($paypalToken);
                                $this->redirect("/member/dashboard");
                            }
                        } else {
                            $this->redirect("/member/dashboard");
                        }
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                    break;
            }
        }
    }

    function testupdate() {
        $this->autoRender = false;
        $this->memberEngine->updatePaymentDoneInfoByPaypal($this->request->query["token"]);
    }

    function snap_payment_finish() {
        $this->autoRender = false;
        App::import('Vendor', 'checkout');
        $result = midtransCheckOrder($this->request->query["order_id"]);
        $midTranspayment = ClassRegistry::init("MidtransPayment")->find("first", [
            "conditions" => [
                "MidtransPayment.order_ref" => $this->request->query["order_id"],
            ],
            "recursive" => -1,
            "contain" => [
                "Member" => [
                    "Account",
                ],
            ],
        ]);
        switch ($result->status_code) {
            case 200:
                ClassRegistry::init("MidtransPayment")->updateAll([
                    "status" => "'accept'",
                    "transaction_ref" => "'{$result->transaction_id}'",
                        ], [
                    "MidtransPayment.order_ref" => $this->request->query["order_id"],
                ]);
                ClassRegistry::init("Member")->approvedPayment($midTranspayment["Member"]["Account"]["id"]);
                $this->redirect("/member/dashboard");
                break;
        }
        echo "We are working with your payment, please wait...";
    }

    function _paginationInfo($model_name, $conds, $page = 1, $limit = 2, $sort = "", $order = "") {
        $info = [];
        $data = ClassRegistry::init($model_name)->find("count", array(
            "conditions" => array(
                "and" => array(
                    $conds,
                )
            ),
            "order" => $order,
        ));
        $info['totalItem'] = $data;
        $info['totalPage'] = ceil($data / $limit);
        $info['currentPage'] = $page;
        $info['limit'] = $limit;
        $info['startItem'] = ($page - 1) * $limit + 1;
        $info['endItem'] = $info['startItem'] + $limit - 1;
        if ($info['endItem'] > $info['totalItem']) {
            $info['endItem'] = $info['totalItem'];
        }
        return $info;
    }

    function front_play_now() {
        $this->Session->setFlash(__("Game can only be accessed with an ExpoSeven account."), 'default', array(), 'danger');
        $this->redirect("/");
    }

}
