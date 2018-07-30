<?php

App::uses('AppController', 'Controller');

class MessagesController extends AppController {

    var $name = "Messages";
    var $disabledAction = array(
        "admin_add",
        "admin_edit"
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function member_send_message() {
        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $this->Message->data['Message']['sender_id'] = $this->Session->read("credential.member.Account.id");
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Message has been sent successfully."), 'default', array(), 'success');
                $this->redirect("/member/message");
            } else {
                $this->Session->setFlash(__("Error : Either Name or Reveral Code is Empty."), 'default', array(), 'danger');
            }
        } else {
            $this->Session->setFlash(__("Error : Invalid Request"), 'default', array(), 'danger');
        }
    }

    function member_reply_message() {
        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                $dataParent = $this->Message->find("first", [
                    "conditions" => [
                        "Message.id" => $this->data['Message']['parent_id']
                    ],
                    'recursive' => -1
                ]);
                $this->Message->data['Message']['sender_id'] = $this->Session->read("credential.member.Account.id");
                $this->Message->data['Message']['title'] = $dataParent['Message']['title'];
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('deep' => true));
                $this->Session->setFlash(__("Replied Message has been sent successfully."), 'default', array(), 'success');
                $this->redirect($this->referer());
            }
        } else {
            $this->Session->setFlash(__("Error : Invalid Request"), 'default', array(), 'danger');
        }
    }

    function update_unread_message($parent_id, $member_id) {
        $this->autoRender = false;
        if ($this->request->is("POST") && !empty($parent_id)) {
            $data = ClassRegistry::init("Message")->find("first", [
                "conditions" => [
                    "Message.id" => $parent_id,
                    "OR" => [
                        "Message.recipient_id" => $member_id,
                        "Message.sender_id" => $member_id
                    ]
                ],
                'contain' => [
                    "Child"
                ]
            ]);
            $updatedData = [];
            try {
                $updatedData['Message']['id'] = $data['Message']['id'];
                $updatedData['Message']['has_recipient_read'] = 1;
                ClassRegistry::init('Message')->save($updatedData);
                foreach ($data['Child'] as $child) {
                    if ($child['recipient_id'] == $member_id) {
                        $updatedData['Message']['id'] = $child['id'];
                        $updatedData['Message']['has_recipient_read'] = 1;
                        ClassRegistry::init('Message')->save($updatedData);
                    }
                }

                // re-counting unread message(s) according the recipient
                $dataCountUnreadMessage = ClassRegistry::init("Message")->find("count", [
                    "conditions" => [
                        "Message.recipient_id" => $this->Session->read("credential.member.Account.id"),
                        "Message.has_recipient_read" => 0,
                    ],
                    "recursive" => -1
                ]);

                return json_encode($this->_generateStatusCode(206, 'Successfully Updated Unread Message(s)', $dataCountUnreadMessage));
            } catch (Exception $ex) {
                return json_encode($this->_generateStatusCode(405, 'Error : failed when updating unread message(s)'));
            }
        } else {
            return json_encode($this->_generateStatusCode(400, 'Error : Invalid Request'));
        }
    }

}
