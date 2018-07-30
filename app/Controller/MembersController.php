<?php

App::uses('AppController', 'Controller');

class MembersController extends AppController {

    var $name = "Members";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }

    function admin_genealogy_list() {
        if (!isset($this->request->query["account_id"]) && empty($this->request->query["account_id"])) {
            $defaultAccountId = _WESTWOOD_ACCOUNT_ID;
        } else {
            $defaultAccountId = $this->request->query["account_id"];
        }
        $tree = $this->memberEngine->buildGenealogyTree($defaultAccountId);
        $tree = $this->memberEngine->translateToJqtreeFormat($tree);
        $this->set(compact('tree'));
    }

    function admin_genealogy_tree() {
        if (!isset($this->request->query["account_id"]) && empty($this->request->query["account_id"])) {
            $defaultAccountId = _WESTWOOD_ACCOUNT_ID;
        } else {
            $defaultAccountId = $this->request->query["account_id"];
        }
        $tree = $this->memberEngine->buildGenealogyTree($defaultAccountId);
        $tree = $this->memberEngine->translateToGoJsFormat($tree);
        $this->set(compact('tree'));
    }

    function generate_verification_code($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $code = substr(str_shuffle($chars), 0, $length);
        return $code;
    }

    function member_sent_verification_code($account_id = null) {
        $this->autoRender = false;
        if (!empty($account_id)) {
            if ($this->request->is("PUT")) {
                $dataAccount = ClassRegistry::init("Account")->find("first", [
                    "conditions" => [
                        "Account.id" => $account_id
                    ],
                    "contain" => [
                        "Member",
                        "User",
                        "Biodata"
                    ]
                ]);

                // sending an email contain a verification code
                $email = $dataAccount['User']['email'];
                $name = $dataAccount['Biodata']['full_name'];
                $verification_code = $this->generate_verification_code();
                try {
                    $this->_sentEmail("verification-code", [
                        "tujuan" => $email,
                        "subject" => "EXPO 7 - Verification Code",
                        "from" => array("testing.stn@gmail.com" => "EXPO 7"),
                        "acc" => "NoReply",
                        "item" => [
                            'verification_code' => $verification_code,
                            'fullName' => $name,
                        ],
                    ]);
                } catch (SocketException $e) {
                    echo("Exception: " . $e->getMessage() . "\r\n");
                    echo("File: " . $e->getFile() . "\r\n");
                    echo("Line: " . $e->getLine() . "\r\n");
                    echo("Trace: " . $e->getTraceAsString() . "\r\n");
                    debug("Exception: " . $e->getMessage() . "\r\n");
                    debug("File: " . $e->getFile() . "\r\n");
                    debug("Line: " . $e->getLine() . "\r\n");
                    debug("Trace: " . $e->getTraceAsString() . "\r\n");
                    die;
                } catch (Exception $ex) {
                    return json_encode($this->_generateStatusCode(405, "Error found when sending an email"));
                }
                // saving data
                $updatedData = [];
                try {
                    $updatedData['Member']['id'] = $dataAccount['Member']['id'];
                    $updatedData['Member']['wd_otp'] = $verification_code;
                    $updatedData['Member']['wd_otp_valid'] = 1;
                    ClassRegistry::init("Member")->save($updatedData);
                    return json_encode($this->_generateStatusCode(200, "Data has been saved successfully."));
                } catch (Exception $ex) {
                    return json_encode($this->_generateStatusCode(405, "Error : failed to saved the data"));
                }
            } else {
                return json_encode($this->_generateStatusCode(400, "Error : Invalid Request."));
            }
        } else {
            return json_encode($this->_generateStatusCode(401, "Error : ID not found."));
        }
    }

    function front_personal_info_member() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $request_data = $this->request->data;
            try {
                ClassRegistry::init("Biodata")->save($request_data);
                return json_encode($this->_generateStatusCode(202));
            } catch (Exception $ex) {
                echo "Error was found when updating the data";
                return json_encode($this->_generateStatusCode(405, "Update Data Failed"));
                debug("Error was found when updating the data");
                die;
            }
        } else {
            return json_encode($this->_generateStatusCode(400));
        }
    }

}
