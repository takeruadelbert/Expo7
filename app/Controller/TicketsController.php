<?php

App::uses('AppController', 'Controller');

class TicketsController extends AppController {

    var $name = "Tickets";
    var $disabledAction = array(
        "admin_add",
        "admin_edit"
    );
    var $contain = [
    ];

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function _options() {
        $this->set("ticketStatuses", ClassRegistry::init("TicketStatus")->find("list", ['fields' => ["TicketStatus.id", "TicketStatus.name"]]));
        $departments = ClassRegistry::init("Department")->find("list", array("fields" => array("Department.id", "Department.name", "Parent.name"), "contain" => ['Parent']));
        $departments['Main Department'] = $departments[0];
        if (!empty($departments[0])) {
            unset($departments[0]);
        }
        $this->set(compact("departments"));
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function member_submit_ticket() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                if (!empty($this->Ticket->data['Ticket']['attachment']['name'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "zip", "tif", "xlsx");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->Ticket->data['Ticket']['attachment']);
                    $result = $uploader->handleUpload("img" . DS . "tickets" . DS . "attachments" . DS);
                    switch ($result['status']) {
                        case 206:
                            $this->Ticket->data['Ticket']['attachment_file_path'] = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->Ticket->data['Ticket']['attachment']);
                }
                $this->Ticket->data['Ticket']['account_id'] = $this->Session->read("credential.member.Account.id");
                $this->Ticket->data['Ticket']['has_member_read'] = 1;
                $this->Ticket->data['Ticket']['ticket_number'] = $this->generate_ticket_number();
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Ticket has been submitted successfully."), 'default', array(), 'success');
                $this->redirect($this->referer());
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Error was found when submitting the ticket."), 'default', array(), 'danger');
            }
        } else {
            $this->Session->setFlash(__("Invalid Request."), 'default', array(), 'danger');
        }
    }

    function generate_ticket_number() {
        $inc_id = 1;
        $m = date('m');
        $Y = date('Y');
        $d = date("d");
        $testCode = "[0-9]{5}$Y$m$d";
        $lastRecord = $this->Ticket->find('first', array(
            'conditions' => array(
                'and' => array(
                    "Ticket.ticket_number regexp" => $testCode,
                    "Ticket.parent_id" => null
                )
            ),
            'order' => array(
                'Ticket.ticket_number' => 'DESC'
            ),
            'group' => 'Ticket.parent_id'
        ));
        if (!empty($lastRecord)) {
            $current = substr($lastRecord['Ticket']['ticket_number'], 0, 5);
            $inc_id += $current;
        }
        $inc_id = sprintf("%05d", $inc_id);
        $kode = "$inc_id$Y$m$d";
        return $kode;
    }

    function member_download_attachment_file($id = null) {
        $this->autoRender = false;
        if (isset($this->request->query['dl']) && $this->request->query['dl'] == 0) {
            $download = false;
        } else {
            $download = true;
        }
        $file = $this->Ticket->find("first", array(
            "conditions" => array(
                "Ticket.id" => $id,
            )
        ));
        $attachment_path = explode("\\", $file['Ticket']['attachment_file_path']);
        $filename = $attachment_path[3];
        if (!empty($file)) {
            $this->response->file("webroot" . DS . $file['Ticket']['attachment_file_path'], array(
                'download' => $download,
                "name" => $filename,
            ));
            return $this->response;
        }
    }

    function member_close_ticket($id = null) {
        if (!empty($id)) {
            $updatedData = [];
            $dataTicket = ClassRegistry::init("Ticket")->find("first", [
                "conditions" => [
                    "Ticket.parent_id" => null,
                    "Ticket.id" => $id
                ],
                'contain' => [
                    "Child"
                ]
            ]);
            try {
                $updatedData['Ticket']['id'] = $dataTicket['Ticket']['id'];
                $updatedData['Ticket']['ticket_status_id'] = 3;
                $this->Ticket->save($updatedData);
                foreach ($dataTicket['Child'] as $child) {
                    $updatedData['Ticket']['id'] = $child['id'];
                    $updatedData['Ticket']['ticket_status_id'] = 3;
                    $this->Ticket->save($updatedData);
                }
                $this->Session->setFlash(__("Status Ticket has been updated successfully."), 'default', array(), 'success');
            } catch (Exception $ex) {
                $this->Session->setFlash(__("Error found when updating status ticket."), 'default', array(), 'danger');
            }
            $this->redirect($this->referer());
        } else {
            $this->Session->setFlash(__("Error found when closing the ticket."), 'default', array(), 'danger');
        }
    }

    function member_reply_ticket() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $dataParent = $this->Ticket->find("first", [
                    'conditions' => [
                        "Ticket.id" => $this->Ticket->data['Ticket']['parent_id']
                    ],
                    'recursive' => -1
                ]);
                $attachment_file_path = "";
                if (!empty($this->Ticket->data['Ticket']['attachment']['name'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "zip", "tif", "xlsx");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->Ticket->data['Ticket']['attachment']);
                    $result = $uploader->handleUpload("img" . DS . "tickets" . DS . "attachments" . DS);
                    switch ($result['status']) {
                        case 206:
                            $attachment_file_path = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->Ticket->data['Ticket']['attachment']);
                }
                $this->Ticket->data = [
                    "Ticket" => [
                        'parent_id' => $this->data['Ticket']['parent_id'],
                        'account_id' => $dataParent['Ticket']['account_id'],
                        'department_id' => $dataParent['Ticket']['department_id'],
                        "title" => $dataParent['Ticket']['title'],
                        'message' => $this->data['Ticket']['message'],
                        'ticket_status_id' => $dataParent['Ticket']['ticket_status_id'],
                        'attachment_file_path' => $attachment_file_path,
                        'has_member_read' => 1
                    ]
                ];
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Reply Message has been sent successfully."), 'default', array(), 'success');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash(__("Error found when replying the message."), 'default', array(), 'danger');
            }
        }
    }

    function update_unread_ticket($ticket_id = null, $member_id = null) {
        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $dataTicket = $this->Ticket->find("first", [
                "conditions" => [
                    "Ticket.id" => $ticket_id,
                    "Ticket.account_id" => $member_id
                ],
                'contain' => [
                    'Child'
                ]
            ]);
            $updatedData = [];
            try {
                if (!$dataTicket['Ticket']['has_member_read']) {
                    $updatedData = [
                        "Ticket" => [
                            "id" => $dataTicket['Ticket']['id'],
                            "has_member_read" => 1
                        ]
                    ];
                    $this->Ticket->save($updatedData);
                }
                if (!empty($dataTicket['Child'])) {
                    foreach ($dataTicket['Child'] as $child) {
                        $updatedData = [
                            "id" => $child['id'],
                            "has_member_read" => 1
                        ];
                        $this->Ticket->save($updatedData);
                    }
                }

                $count = 0;
                $dataCountUnreadTicket = ClassRegistry::init("Ticket")->find("all", [
                    'conditions' => [
                        "Ticket.account_id" => $this->Session->read("credential.member.Account.id")
                    ],
                    'contain' => [
                        'Child'
                    ]
                ]);
                foreach ($dataCountUnreadTicket as $parent) {
                    foreach ($parent['Child'] as $child) {
                        if ($child['parent_id'] == $parent['Ticket']['id']) {
                            if (!$child['has_member_read']) {
                                $count++;
                            }
                        }
                    }
                }

                return json_encode($this->_generateStatusCode(200, "Successfully updating data table.", $count));
            } catch (Exception $ex) {
                return json_encode($this->_generateStatusCode(405, "Failed when updating data table."));
            }
        } else {
            return json_encode($this->_generateStatusCode(400, "Invalid Request"));
        }
    }

    function admin_reply_ticket($ticket_id) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $dataParent = $this->Ticket->find("first", [
                    'conditions' => [
                        "Ticket.id" => $ticket_id
                    ],
                    'recursive' => -1
                ]);
                $attachment_file_path = "";
                if (!empty($this->Ticket->data['Ticket']['attachment']['name'])) {
                    App::import("Vendor", "qqUploader");
                    $allowedExt = array("jpg", "jpeg", "png", "gif", "pdf", "doc", "docx", "zip", "tif", "xlsx");
                    $size = 10 * 1024 * 1024;
                    $uploader = new qqFileUploader($allowedExt, $size, $this->Ticket->data['Ticket']['attachment']);
                    $result = $uploader->handleUpload("img" . DS . "tickets" . DS . "attachments" . DS);
                    switch ($result['status']) {
                        case 206:
                            $attachment_file_path = "/" . $result['data']['folder'] . $result['data']['fileName'];
                            break;
                    }
                    unset($this->Ticket->data['Ticket']['attachment']);
                }
                $this->Ticket->data = [
                    "Ticket" => [
                        'parent_id' => $ticket_id,
                        'account_id' => $this->Session->read("credential.admin.Account.id"),
                        'department_id' => $dataParent['Ticket']['department_id'],
                        "title" => $dataParent['Ticket']['title'],
                        'message' => $this->data['Ticket']['message'],
                        'ticket_status_id' => 2,
                        'attachment_file_path' => $attachment_file_path
                    ]
                ];
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));

                $updatedData = [];
                if ($dataParent['Ticket']['ticket_status_id'] == 1) {
                    $updatedData = [
                        "Ticket" => [
                            'id' => $ticket_id,
                            'ticket_status_id' => 2
                        ]
                    ];
                    $this->Ticket->save($updatedData);
                }

                $this->Session->setFlash(__("Data has successfully saved."), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array(
                'conditions' => array(
                    Inflector::classify($this->name) . ".id" => $ticket_id
                ),
                "contain" => [
                    "Parent",
                    "Child" => [
                        "Account" => [
                            "Biodata"
                        ]
                    ],
                    "Account" => [
                        "Biodata",
                        "Member"
                    ],
                    "Department",
                    "TicketStatus"
                ]
            ));
            $this->data = $rows;
        }
    }

    function admin_index() {
        $this->conds = [
            "Ticket.parent_id" => null
        ];
        $this->contain = [
            "Parent",
            "Child" => [
                "order" => "Child.created DESC"
            ],
            "Account" => [
                "Biodata",
                "User"
            ],
            "Department",
            "TicketStatus"
        ];
        parent::admin_index();
    }

    function admin_download_attachment_file($id = null) {
        $this->autoRender = false;
        if (isset($this->request->query['dl']) && $this->request->query['dl'] == 0) {
            $download = false;
        } else {
            $download = true;
        }
        $file = $this->Ticket->find("first", array(
            "conditions" => array(
                "Ticket.id" => $id,
            )
        ));
        $attachment_path = explode("\\", $file['Ticket']['attachment_file_path']);
        $filename = $attachment_path[3];
        if (!empty($file)) {
            $this->response->file("webroot" . DS . $file['Ticket']['attachment_file_path'], array(
                'download' => $download,
                "name" => $filename,
            ));
            return $this->response;
        }
    }
    
    function admin_update_status_ticket_to_solved($parent_id = null) {
        $this->autoRender = false;
        if(!empty($parent_id)) {
            $dataParent = $this->Ticket->find("first",[
                "conditions" => [
                    "Ticket.id" => $parent_id,
                    "Ticket.parent_id" => null
                ],
                "contain" => [
                    "Child"
                ]
            ]);
            try {
                $updatedData = [];
                $updatedData = [
                    "Ticket" => [
                        "id" => $parent_id,
                        "ticket_status_id" => 3
                    ]
                ];
                $this->Ticket->save($updatedData);
                
                if(!empty($dataParent['Child'])) {
                    foreach ($dataParent['Child'] as $child) {
                        $updatedData = [];
                        $updatedData = [
                            "id" => $child['id'],
                            "ticket_status_id" => 3
                        ];
                        $this->Ticket->save($updatedData);
                    }
                }
//                $this->Session->setFlash(__("Status Ticket has been updated succesfully to Solved."), 'default', array(), 'success');
//                $this->redirect(array('action' => 'admin_index'));
                return json_encode($this->_generateStatusCode(202, 'Status Ticket has been updated succesfully to Solved.'));
            } catch (Exception $ex) {
//                $this->Session->setFlash(__("Error found when updating status ticket to solved."), 'default', array(), 'danger');
//                $this->redirect(array('action' => 'admin_index'));
                return json_encode($this->_generateStatusCode(405, 'Error found when updating status ticket to solved.'));
            }
        }
    }
}
