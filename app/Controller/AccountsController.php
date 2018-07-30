<?php

class AccountsController extends AppController {

    var $disabledAction = array();

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "Akun");
        $this->_setPageInfo("admin_add", "Tambah Akun");
        $this->_setPageInfo("admin_edit", "Edit Akun");
        $this->_setPageInfo("admin_edit_profile", "Edit Akun");
        $this->_setPageInfo("admin_restriction", "Terlarang");
        $this->_setPageInfo("admin_change_password", "Ganti password");
    }

    function beforeRender() {
        $this->_options();
        parent::beforeRender();
    }

    function _options() {
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Biodata->Country->find("list", array("fields" => array("Country.id", "Country.name"))));
        $this->set("ranks", $this->{ Inflector::classify($this->name) }->Member->Rank->getList());
        $this->set("accountStatuses", $this->{ Inflector::classify($this->name) }->AccountStatus->find("list", array("fields" => array("AccountStatus.id", "AccountStatus.name"))));
    }

    function admin_dashboard() {
        $view = new View($this);
        $helper = $view->loadHelper('App');
        $today = new DateTime(date("Y-m-d"));
        $temp = new DateTime(date("Y-m-d"));
        $week_before = $temp->modify("-6 day");
        $categories_label = [];
        $data_user = [];
        $data_user_register = [];
        $data_temp_user_waiting_payment = [];
        $data_user_waiting_payment = [];
        $data_temp_paid_user = [];
        $data_paid_user = [];
        for ($i = $week_before; $i <= $today; $i->modify("+1 day")) {
            $date = $i->format("Y-m-d");
            $categories_label[] = $helper->cvtTanggalSingkatan($date);

            // get total of register user in recent a week
            $dataUserRegister = ClassRegistry::init("Member")->find("count", [
                "conditions" => [
                    "Member.is_paid" => 0,
                    "DATE_FORMAT(Member.register_dt, '%Y-%m-%d')" => $date,
                    "Account.account_status_id" => 4
                ],
                "contain" => [
                    "Account"
                ]
            ]);
            $data_user[] = $dataUserRegister;

            // get total of user which registered but still waiting for a payment
            $dataUserWaitingPayment = ClassRegistry::init("Member")->find("count", [
                "conditions" => [
                    "Member.is_paid" => 0,
                    "DATE_FORMAT(Account.activation_dt, '%Y-%m-%d')" => $date,
                    "Account.account_status_id" => 5,
                ],
                "contain" => [
                    "Account"
                ]
            ]);
            $data_temp_user_waiting_payment[] = $dataUserWaitingPayment;

            // get total of paid user
            $dataPaidUser = ClassRegistry::init("Member")->find("count", [
                "conditions" => [
                    "Member.is_paid" => 1,
                    "Account.account_status_id" => 1,
                    "DATE_FORMAT(Member.joining_dt, '%Y-%m-%d')" => $date
                ],
                "contain" => [
                    "Account"
                ]
            ]);
            $data_temp_paid_user[] = $dataPaidUser;
        }

        // get each of total user today
        $dataUserRegisterToday = ClassRegistry::init("Member")->find("count", [
            "conditions" => [
                "Member.is_paid" => 0,
                "DATE_FORMAT(Member.register_dt, '%Y-%m-%d')" => $today->format("Y-m-d"),
                "Account.account_status_id" => 4
            ],
            "contain" => [
                "Account"
            ]
        ]);
        $dataUserWaitingPaymentToday = ClassRegistry::init("Member")->find("count", [
            "conditions" => [
                "Member.is_paid" => 0,
                "DATE_FORMAT(Account.activation_dt, '%Y-%m-%d')" => $today->format("Y-m-d"),
                "Account.account_status_id" => 5,
            ],
            "contain" => [
                "Account"
            ]
        ]);
        $dataPaidUserToday = ClassRegistry::init("Member")->find("count", [
            "conditions" => [
                "Member.is_paid" => 1,
                "Account.account_status_id" => 1,
                "DATE_FORMAT(Member.joining_dt, '%Y-%m-%d')" => $today->format("Y-m-d")
            ],
            "contain" => [
                "Account"
            ]
        ]);

        $categories_label_encode = json_encode($categories_label);
        $data_user_register = [
            "name" => __("Total Register User"),
            "data" => $data_user
        ];
        $data_user_register_encode = json_encode($data_user_register);
        $data_user_waiting_payment = [
            "name" => __("Total Unpaid User"),
            "data" => $data_temp_user_waiting_payment
        ];
        $data_user_waiting_payment_encode = json_encode($data_user_waiting_payment);
        $data_paid_user = [
            "name" => __("Total Paid User"),
            "data" => $data_temp_paid_user
        ];
        $data_paid_user_encode = json_encode($data_paid_user);
        $this->set(compact("dataUserRegisterToday", "dataUserWaitingPaymentToday", "dataPaidUserToday"));
        $this->set(compact("categories_label_encode", "data_user_register_encode", 'data_user_waiting_payment_encode', 'data_paid_user_encode', 'today'));
    }

    function admin_index() {
        $this->contain = [
            "User",
            "Biodata",
            "AccountStatus",
        ];
        parent::admin_index();
        $this->set("userGroups", ClassRegistry::init("UserGroup")->find("list", array("fields" => array("UserGroup.id", "UserGroup.label"))));
        $this->_activePrint(func_get_args(), "data_pengguna");
    }

    function admin_multiple_delete() {
        $this->{ Inflector::classify($this->name) }->set($this->data);
        if (empty($this->data)) {
            $code = 203;
        } else {
            $allData = $this->data[Inflector::classify($this->name)]['checkbox'];
            foreach ($allData as $data) {
                if ($data != '' || $data != 0) {
                    $this->{ Inflector::classify($this->name) }->delete($data, true);
                }
            }
            $code = 204;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    function admin_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
            $salt = hash("sha224", uniqid(mt_rand(), true), false);
            $encrypt = hash("sha512", $password . $salt, false);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["password_game"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                unset($this->{ Inflector::classify($this->name) }->data["User"]["repeatPassword"]);
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                $this->Session->setFlash(__("Data berhasil disimpan"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_index'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
            }
        }
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Biodata->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
        $this->set("userGroups", $this->{ Inflector::classify($this->name) }->User->UserGroup->find("list", array("fields" => array("UserGroup.id", "UserGroup.label"))));
        $this->set("identityTypes", $this->{ Inflector::classify($this->name) }->Biodata->IdentityType->find("list", array("fields" => array("IdentityType.id", "IdentityType.name"))));
    }

    function admin_edit($id = null) {
        if ($this->request->is("post") || $this->request->is("put")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->validates()) {
                if (!is_null($id)) {
                    $this->{ Inflector::classify($this->name) }->id = $id;
                    $this->Account->data['Account']['id'] = $id;
                    $this->{ Inflector::classify($this->name) }->saveAll();
                    $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
                    $this->data = $rows;
                    $this->Session->setFlash(__("Data berhasil diubah"), 'default', array(), 'success');
                    $this->redirect(array('action' => 'admin_index'));
                } else {
                    
                }
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
            }
        } else {
            $rows = $this->{ Inflector::classify($this->name) }->find("first", array('conditions' => array(Inflector::classify($this->name) . ".id" => $id)));
            $this->data = $rows;
        }
        $this->set("identityTypes", $this->{ Inflector::classify($this->name) }->Biodata->IdentityType->find("list", array("fields" => array("IdentityType.id", "IdentityType.name"))));
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Biodata->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
        $this->set("states", $this->{ Inflector::classify($this->name) }->Biodata->State->find("list", array("fields" => array("State.id", "State.name"))));
        $this->set("userGroups", $this->{ Inflector::classify($this->name) }->User->UserGroup->find("list", array("fields" => array("UserGroup.id", "UserGroup.name"))));
        $this->set("cities", $this->{ Inflector::classify($this->name) }->Biodata->City->find("list", array("conditions" => array("City.state_id" => $this->data['Biodata']['state_id']))));
    }

    function admin_delete($id = null) {
        if ($this->request->is("delete")) {
            if ($this->{ Inflector::classify($this->name) }->delete($id)) {
                $code = 204;
            } else {
                $code = 400;
            }
        } else {
            $code = 400;
        }
        echo json_encode($this->_generateStatusCode($code));
        die();
    }

    function login_admin() {
        if (!empty($this->Session->read("credential.admin"))) {
            $this->redirect("/admin/dashboard");
        }
        $loginCredential = ClassRegistry::init("LoginPageCredential")->find("list", [
            "conditions" => [
                "LoginPage.name" => "im",
                "LoginPageCredential.access" => true,
            ],
            "fields" => [
                "LoginPageCredential.user_group_id",
            ],
            "contain" => [
                "LoginPage",
            ]
        ]);
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 3, "conditions" => array("OR" => array("User.email" => $this->data['Account']['username'], "User.username" => $this->data['Account']['username']))));
            if (!empty($data)) {
                if ($this->_testPassword($this->data['Account']['password'], $data['User']['salt'], $data['User']['password'])) {
                    if (in_array($data['User']['user_group_id'], $loginCredential)) {
                        $this->Session->write("credential.admin", $data);
                        $this->Session->write("currentlogin", "im");
                        $this->redirect("/admin/dashboard");
                    } else {
                        $this->Session->setFlash(__("Anda tidak mempunyai akses ke halaman ini."), 'default', array(), 'warning');
                    }
                } else {
                    $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warning');
                }
            } else {
                $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warning');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login";
    }

    function login_utama() {
        if (!empty($this->Session->read("credential.admin"))) {
            $this->redirect("/admin/dashboard");
        }
        $loginCredential = ClassRegistry::init("LoginPageCredential")->find("list", [
            "conditions" => [
                "LoginPage.name" => "im",
                "LoginPageCredential.access" => true,
            ],
            "fields" => [
                "LoginPageCredential.user_group_id",
            ],
            "contain" => [
                "LoginPage",
            ]
        ]);
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 3, "conditions" => array("OR" => array("User.email" => $this->data['Account']['username'], "User.username" => $this->data['Account']['username']))));
            if (!empty($data)) {
                if ($this->_testPassword($this->data['Account']['password'], $data['User']['salt'], $data['User']['password'])) {
                    if (in_array($data['User']['user_group_id'], $loginCredential)) {
                        $this->Session->write("credential.admin", $data);
                        $this->Session->write("currentlogin", "im");
                        $this->redirect("/admin/dashboard");
                    } else {
                        $this->Session->setFlash(__("Anda tidak mempunyai akses ke halaman ini."), 'default', array(), 'warninglogin');
                    }
                } else {
                    $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
                }
            } else {
                $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_utama";
        $this->set("title", "Login Sistem Informasi Manajemen");
    }

    function lupa_password_admin() {
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);

                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("forgot-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "SIDISPOP - Reset Password",
                    "from" => array("noreply@dispopsulbar.com" => "SIDISPOP"),
                    "acc" => "NoReply",
                    "item" => [
                        'token' => $token,
                        'username' => $data['User']['username'],
                    ],
                ]);
                $this->Session->setFlash(__("Silahkan mengecek email anda"), 'default', array(), 'successlupapassword');
                $this->redirect("/admin#lupa-password");
            } else {
                $this->Session->setFlash(__("Email tidak terdaftar"), 'default', array(), 'warninglupapassword');
                $this->redirect("/admin#lupa-password");
            }
        } else {
            $this->redirect("/admin");
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login";
    }

    function login_utama_lupa_password() {
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);

                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("forgot-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "SIDISPOP - Reset Password",
                    "from" => array("noreply@dispopsulbar.com" => "SIDISPOP"),
                    "acc" => "NoReply",
                    "item" => [
                        'token' => $token,
                        'username' => $data['User']['username'],
                    ],
                ]);
                $this->Session->setFlash(__("Silahkan mengecek email anda"), 'default', array(), 'successlupapassword');
                $this->redirect("/admin/lupa-password");
            } else {
                $this->Session->setFlash(__("Email tidak terdaftar"), 'default', array(), 'warninglupapassword');
                $this->redirect("/admin/lupa-password");
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_utama";
        $this->set("title", "Lupa Password");
    }

    function login_persuratan() {
        if (!empty($this->Session->read("credential.admin"))) {
            $this->redirect("/admin/dashboard");
        }
        $loginCredential = ClassRegistry::init("LoginPageCredential")->find("list", [
            "conditions" => [
                "LoginPage.name" => "persuratan",
                "LoginPageCredential.access" => true,
            ],
            "fields" => [
                "LoginPageCredential.user_group_id",
            ],
            "contain" => [
                "LoginPage",
            ]
        ]);
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 3, "conditions" => array("OR" => array("User.email" => $this->data['Account']['username'], "User.username" => $this->data['Account']['username']))));
            if (!empty($data)) {
                if ($this->_testPassword($this->data['Account']['password'], $data['User']['salt'], $data['User']['password'])) {
                    if (in_array($data['User']['user_group_id'], $loginCredential)) {
                        $this->Session->write("credential.admin", $data);
                        $this->Session->write("currentlogin", "persuratan");
                        $this->redirect("/admin/dashboard");
                    } else {
                        $this->Session->setFlash(__("Anda tidak mempunyai akses ke halaman ini."), 'default', array(), 'warninglogin');
                    }
                } else {
                    $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
                }
            } else {
                $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_persuratan";
        $this->set("title", "Login Sistem Informasi Manajemen Arsip Surat");
    }

    function login_persuratan_lupa_password() {
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);

                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("forgot-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "SIDISPOP - Reset Password",
                    "from" => array("noreply@dispopsulbar.com" => "SIDISPOP"),
                    "acc" => "NoReply",
                    "item" => [
                        'token' => $token,
                        'username' => $data['User']['username'],
                    ],
                ]);
                $this->Session->setFlash(__("Silahkan mengecek email anda"), 'default', array(), 'successlupapassword');
                $this->redirect("/persuratan/lupa-password");
            } else {
                $this->Session->setFlash(__("Email tidak terdaftar"), 'default', array(), 'warninglupapassword');
                $this->redirect("/persuratan/lupa-password");
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_persuratan";
        $this->set("title", "Lupa Password");
    }

    function login_kepegawaian() {
        if (!empty($this->Session->read("credential.admin"))) {
            $this->redirect("/admin/dashboard");
        }
        $loginCredential = ClassRegistry::init("LoginPageCredential")->find("list", [
            "conditions" => [
                "LoginPage.name" => "kepegawaian",
                "LoginPageCredential.access" => true,
            ],
            "fields" => [
                "LoginPageCredential.user_group_id",
            ],
            "contain" => [
                "LoginPage",
            ]
        ]);
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 3, "conditions" => array("OR" => array("User.email" => $this->data['Account']['username'], "User.username" => $this->data['Account']['username']))));
            if (!empty($data)) {
                if ($this->_testPassword($this->data['Account']['password'], $data['User']['salt'], $data['User']['password'])) {
                    if (in_array($data['User']['user_group_id'], $loginCredential)) {
                        $this->Session->write("credential.admin", $data);
                        $this->Session->write("currentlogin", "kepegawaian");
                        $this->redirect("/admin/dashboard");
                    } else {
                        $this->Session->setFlash(__("Anda tidak mempunyai akses ke halaman ini."), 'default', array(), 'warninglogin');
                    }
                } else {
                    $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
                }
            } else {
                $this->Session->setFlash(__("Username atau password yang anda masukkan salah. Silahkan periksa kembali."), 'default', array(), 'warninglogin');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_kepegawaian";
        $this->set("title", "Login Sistem Informasi Manajemen Kepegawaian dan Kinerja");
    }

    function login_kepegawaian_lupa_password() {
        if ($this->request->is("post")) {
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("User.email" => $this->data['User']['email']))));
            if (!empty($data)) {
                $token = hash("sha256", uniqid(mt_rand(), true), false);

                $this->Account->data['Account']['id'] = $data['Account']['id'];
                $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                $this->Account->data['PasswordReset']['token'] = $token;
                $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                $this->Account->data['PasswordReset']['is_used'] = false;
                $this->Account->saveAll();
                $this->_sentEmail("forgot-password", [
                    "tujuan" => $this->data['User']['email'],
                    "subject" => "SIDISPOP - Reset Password",
                    "from" => array("noreply@dispopsulbar.com" => "SIDISPOP"),
                    "acc" => "NoReply",
                    "item" => [
                        'token' => $token,
                        'username' => $data['User']['username'],
                    ],
                ]);
                $this->Session->setFlash(__("Silahkan mengecek email anda"), 'default', array(), 'successlupapassword');
                $this->redirect("/kepegawaian/lupa-password");
            } else {
                $this->Session->setFlash(__("Email tidak terdaftar"), 'default', array(), 'warninglupapassword');
                $this->redirect("/kepegawaian/lupa-password");
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login_kepegawaian";
        $this->set("title", "Lupa Password");
    }

    function logout_admin() {
        $this->Session->delete("credential.admin");
        $currentSystem = $this->Session->read("currentlogin");
        if ($currentSystem == "persuratan") {
            $this->redirect("/persuratan");
        } else if ($currentSystem == "kepegawaian") {
            $this->redirect("/kepegawaian");
        } else if (is_null($currentSystem) || $currentSystem == "im") {
            $this->redirect("/admin");
        }
    }

    function login_member() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $message = __("Please check your username/password");
            $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, "conditions" => array("OR" => array("User.email" => $this->request->data['username'], "User.username" => $this->request->data['username']), "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"))));
            if (!empty($data)) {
                if ($this->_testPassword($this->request->data['password'], $data['User']['salt'], $data['User']['password'])) {
                    if (in_array($data["Account"]["account_status_id"], [1, 5])) {
                        $this->Account->User->saveAll([
                            "User" => [
                                "id" => $data["User"]["id"],
                                "last_login" => DboSource::expression('NOW()'),
                            ]
                        ]);
                        $this->Session->write("credential.member", $data);
                        $code = 201;
                    } else {
                        $code = 402;
                        $message = $data["AccountStatus"]["name"];
                    }
                }
            }
            echo json_encode($this->_generateStatusCode($code, $message));
        }
    }

    function member_sudo() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $message = __("Invalid.");
            if ($this->request->data['username'] == $this->memberEngine->getUsername()) {
                $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, "conditions" => array("OR" => array("User.email" => $this->request->data['username'], "User.username" => $this->request->data['username']), "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"))));
                if (!empty($data)) {
                    if ($this->_testPassword($this->request->data['password'], $data['User']['salt'], $data['User']['password'])) {
                        if (in_array($data["Account"]["account_status_id"], [1])) {
                            $code = 201;
                            $message = __("Success");
                        }
                    }
                }
            }
            echo json_encode($this->_generateStatusCode($code, $message));
        }
    }

    function member_getverify() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 405;
            if ($this->request->data['username'] == $this->memberEngine->getUsername()) {
                $data = $this->{ Inflector::classify($this->name) }->find("first", array("recursive" => 2, "conditions" => array("OR" => array("User.email" => $this->request->data['username'], "User.username" => $this->request->data['username']), "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"))));
                if (!empty($data)) {
                    if ($this->_testPassword($this->request->data['password'], $data['User']['salt'], $data['User']['password'])) {
                        if (in_array($data["Account"]["account_status_id"], [1])) {
                            $code = 201;
                            $message = __("Success");
                        }
                    }
                }
            }
            echo json_encode($this->_generateStatusCode($code, $message));
        }
    }

    function logout_member() {
        $this->Session->delete("credential.member");
        $this->Session->delete("cart");
        $this->Session->delete("compare");
        $this->Session->delete("pembelian-terakhir");
        $this->redirect("/");
    }

    function _hashPassword($plain) {
        $hashed = hash("sha512", $plain, false);
        return $hashed;
    }

    function _testPassword($password, $salt, $hashedPassword) {
        return $hashedPassword == $this->_hashPassword($password . $salt);
    }

    function admin_change_password() {
        if ($this->request->is("post")) {
            if ($this->_testPassword($this->data['Account']['password_lama'], $this->Session->read("credential.admin.User.salt"), $this->Session->read("credential.admin.User.password"))) {
                $this->{ Inflector::classify($this->name) }->data = $this->data;
                unset($this->{ Inflector::classify($this->name) }->data['Account']['password_lama']);
                $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
                $salt = hash("sha224", uniqid(mt_rand(), true), false);
                $encrypt = $this->_hashPassword($password . $salt);
                if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                    $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                    $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                    unset($this->{ Inflector::classify($this->name) }->data["User"]["repeat_password"]);
                    $this->{ Inflector::classify($this->name) }->data['Account']['id'] = $this->Session->read("credential.admin.Account.id");
                    $this->{ Inflector::classify($this->name) }->data["User"]["id"] = $this->Session->read("credential.admin.User.id");
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                    $this->_update_admin_session();
                    $this->data = array();
                    $this->Session->setFlash(__("Password berhasil diganti"), 'default', array(), 'success');
                } else {
                    $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                    $this->Session->setFlash(__("Harap mengecek kembali kesalahan dibawah."), 'default', array(), 'danger');
                }
            } else {
                $this->Session->setFlash(__("Password lama salah"), 'default', array(), 'danger');
            }
        }
    }

    function _update_admin_session() {
        $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.admin.Account.id"))));
        $this->Session->write("credential.admin", $data);
    }

    function admin_restriction() {
        
    }

    function admin_change_status() {
        $this->autoRender = false;
        if ($this->request->is("PUT")) {
            $this->Account->id = $this->request->data['id'];
            $this->Account->save(array("Account" => array("account_status_id" => $this->request->data['status'])));
            $data = $this->Account->find("first", array("conditions" => array("Account.id" => $this->request->data['id']), "recursive" => 1));
            echo json_encode($this->_generateStatusCode(207, null, array("status_label" => $data['AccountStatus']['name'])));
        } else {
            echo json_encode($this->_generateStatusCode(400));
        }
    }

    function admin_ganti_pp() {
        if ($this->request->is("PUT") || $this->request->is("POST")) {
            $this->Account->data['Account']['id'] = $this->Session->read("credential.admin.Account.id");
            $this->Account->data['User']['id'] = $this->Session->read("credential.admin.User.id");
            App::import("Vendor", "qqUploader");
            $allowedExt = array("jpg", "jpeg", "png");
            $size = 10 * 1024 * 1024;
            $uploader = new qqFileUploader($allowedExt, $size, $this->data['Account']['profile_picture']);
            $result = $uploader->handleUpload("img" . DS . "profile_photos" . DS);
            switch ($result['status']) {
                case 206:
                    $this->Account->data['User']['profile_picture'] = "/{$result['data']['folder']}{$result['data']['fileName']}";
                    break;
                default:
                    $this->Session->setFlash(__($result['message']), 'default', array(), 'danger');
                    $this->redirect("/admin/dashboard");
                    break;
            }
            $this->Account->saveAll();
            $this->_update_admin_session();
            $this->Session->setFlash(__("Foto telah diperbaharui"), 'default', array(), 'success');
            $this->redirect("/admin/dashboard");
        } else {
            $this->Session->setFlash(__("Internal Server Error"), 'default', array(), 'danger');
            $this->redirect("/admin/dashboard");
        }
    }

    function reset_password($token = null) {
        $data = $this->{ Inflector::classify($this->name) }->find("first", array("contain" => array("PasswordReset", "User", "Biodata"), "conditions" => array("OR" => array("PasswordReset.token" => $token))));
        $now = new DateTime();
        if (is_null($token) || empty($data) || $data['PasswordReset']['is_used'] || $now > new DateTime($data['PasswordReset']['expire'])) {
            $this->redirect("/");
        }
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
                $salt = $data['User']['salt'];
                $encrypt = $this->_hashPassword($password . $salt);
                $this->{ Inflector::classify($this->name) }->data["Account"]["id"] = $data['Account']['id'];
                $this->{ Inflector::classify($this->name) }->data["User"]["id"] = $data['User']['id'];
                $this->{ Inflector::classify($this->name) }->data["PasswordReset"]["id"] = $data['PasswordReset']['id'];
                $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["PasswordReset"]["is_used"] = true;
                unset($this->{ Inflector::classify($this->name) }->data["User"]["repeat_password"]);
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => true));
                $this->Session->setFlash(__("Kata sandi berhasil diubah"), 'default', array(), 'successlogin');
                $this->redirect("/");
            } else {
                $this->Session->setFlash(__("Periksa kesalahan"), 'default', array(), 'warninglogin');
            }
        }
        $this->layout = _TEMPLATE_DIR . "/{$this->template}/login";
    }

    function admin_member_list() {
        $this->contain = [
            "User",
            "Biodata" => [
                "Country",
            ],
            "AccountStatus",
            "Member" => [
                "Rank",
                "Upline" => [
                    "Member",
                ],
                "Title",
            ],
        ];
        $this->conds = [
            "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
            "Account.account_status_id" => 1,
        ];
        $this->_activePrint(func_get_args(), "member_list");
        parent::admin_index();
    }

    function admin_member_registration_list() {
        $this->contain = [
            "User",
            "Biodata" => [
                "Country",
            ],
            "AccountStatus",
            "Member" => [
                "Rank",
                "Upline" => [
                    "Member",
                ],
            ],
        ];
        $this->conds = [
            "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
        ];
        $this->_activePrint(func_get_args(), "member_registration_list");
        parent::admin_index();
    }

    function admin_member_joining_report() {
        $this->contain = [
            "User",
            "Biodata" => [
                "Country",
            ],
            "AccountStatus",
            "Member" => [
                "Rank",
                "Upline" => [
                    "Member" => [
                        "Rank",
                    ],
                    "Biodata",
                ],
                "Title",
            ],
        ];
        $this->conds = [
            "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
        ];
        parent::admin_index();
    }

    function admin_member_add() {
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            $password = $this->{ Inflector::classify($this->name) }->data["User"]["password"];
            $salt = hash("sha224", uniqid(mt_rand(), true), false);
            $encrypt = hash("sha512", $password . $salt, false);
            if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only'))) {
                $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["password_game"] = $encrypt;
                $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                $this->{ Inflector::classify($this->name) }->data["Member"]["id_referral"] = $this->Account->Member->generateIdReferral();
                $this->{ Inflector::classify($this->name) }->data["Member"]["register_dt"] = date("Y-m-d H:i:s");
                unset($this->{ Inflector::classify($this->name) }->data["User"]["repeatPassword"]);
                $this->{ Inflector::classify($this->name) }->data["Account"]["account_status_id"] = 4;
                $this->{ Inflector::classify($this->name) }->data["User"]["user_group_id"] = ClassRegistry::init("UserGroup")->translateToId("member");
                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data);
                $accountId = $this->Account->getLastInsertID();
                $this->Account->Member->updateAfterRegistration($accountId);
                $data = $this->Account->find("first", [
                    "conditions" => [
                        "Account.id" => $accountId,
                    ],
                    "contain" => [
                        "Biodata"
                    ]
                ]);
                try {
                    $this->_sentEmail("member-activation", [
                        "tujuan" => _TEMP_MAIL_RECIPIENT,
                        "subject" => "EXPO 7 - Email Verification",
                        "from" => array("noreply@exposeven.com" => "EXPO 7"),
                        "acc" => "NoReply",
                        "item" => [
                            'token' => $data['Account']['activation_code'],
                            'fullName' => $data['Biodata']['full_name'],
                        ],
                    ]);
                } catch (Exception $e) {
                    
                }
                $this->Session->setFlash(__("Registration success"), 'default', array(), 'success');
                $this->redirect(array('action' => 'admin_member_registration_list'));
            } else {
                $this->validationErrors = $this->{ Inflector::classify($this->name) }->validationErrors;
                $this->Session->setFlash(__($this->constantString["validation-error"]), 'default', array(), 'danger');
            }
        }
        $this->set("accountStatuses", $this->{ Inflector::classify($this->name) }->AccountStatus->find("list", array("fields" => array("AccountStatus.id", "AccountStatus.name"))));
        $this->set("genders", $this->{ Inflector::classify($this->name) }->Biodata->Gender->find("list", array("fields" => array("Gender.id", "Gender.name"))));
        $this->set("countries", $this->{ Inflector::classify($this->name) }->Biodata->Country->find("list", array("fields" => array("Country.id", "Country.name"))));
        $this->set("userGroups", $this->{ Inflector::classify($this->name) }->User->UserGroup->find("list", array("fields" => array("UserGroup.id", "UserGroup.label"))));
        $this->set("identityTypes", $this->{ Inflector::classify($this->name) }->Biodata->IdentityType->find("list", array("fields" => array("IdentityType.id", "IdentityType.name"))));
    }

    function admin_list_member_by_referral_id() {
        $id_referral = $this->request->query["q"];
        $this->autoRender = false;
        $accounts = $this->Account->find("all", [
            "conditions" => [
                "Member.id_referral like" => "%$id_referral%",
                "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
                "Account.account_status_id" => 1,
                "Member.direct_downline < 7",
            ],
            "contain" => [
                "User",
                "Member" => [
                    "Rank",
                    "Title",
                ],
                "Biodata",
            ],
            "limit" => 10,
        ]);
        $result = [];
        foreach ($accounts as $account) {
            $result[] = [
                "account_id" => $account["Account"]["id"],
                "full_name" => $account["Biodata"]["full_name"],
                "id_referral" => $account["Member"]["id_referral"],
                "level" => $account["Member"]["Rank"]["level"],
                "title" => $account["Member"]["Title"]["name"]
            ];
        }
        echo json_encode($this->_generateStatusCode(206, null, $result));
    }

    function admin_search_member() {
        $q = $this->request->query["q"];
        $queries = explode(" ", $q);
        $conds = [];
        foreach ($queries as $query) {
            $conds = [
                "Member.id_referral like" => "%$query%",
                "Biodata.first_name like" => "%$query%",
                "Biodata.last_name like" => "%$query%",
            ];
        }
        $this->autoRender = false;
        $accounts = $this->Account->find("all", [
            "conditions" => [
                "OR" => $conds,
                "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
                "Account.account_status_id" => [1, 2, 3],
            ],
            "contain" => [
                "User",
                "Member" => [
                    "Rank",
                    "Title",
                ],
                "Biodata",
            ],
            "limit" => 10,
        ]);
        $result = [];
        foreach ($accounts as $account) {
            $result[] = [
                "account_id" => $account["Account"]["id"],
                "full_name" => $account["Biodata"]["full_name"],
                "id_referral" => $account["Member"]["id_referral"],
                "level" => $account["Member"]["Rank"]["level"],
                "title" => $account["Member"]["Title"]["name"],
                "full_label" => "{$account["Biodata"]["full_name"]} ({$account["Member"]["id_referral"]})",
            ];
        }
        echo json_encode($this->_generateStatusCode(206, null, $result));
    }

    function admin_ajax_account_activation($activationCode = null) {
        $this->autoRender = false;
        $account = $this->Account->find("first", [
            "conditions" => [
                "Account.activation_code" => $activationCode,
                "Account.account_status_id" => 4,
            ],
            "recursive" => -1
        ]);
        if (empty($account)) {
            echo json_encode($this->_generateStatusCode(406));
        } else {
            $this->Account->id = $account["Account"]["id"];
            $this->Account->save(["id" => $account["Account"]["id"], "account_status_id" => 5, "activation_dt" => date("Y-m-d H:i:s")]);
            $account = $this->Account->find("first", [
                "conditions" => [
                    "Account.id" => $account["Account"]["id"],
                ],
                "contain" => [
                    "AccountStatus",
                ],
            ]);
            echo json_encode($this->_generateStatusCode(208, null, ["account_id" => $account["Account"]["id"], "status_label" => $account["AccountStatus"]["name"]]));
        }
    }

    function test_update() {
        $this->Account->Member->updateAfterRegistration(12);
    }

    function test_paypal() {
        $this->autoRender = false;
    }

    function test_transaction() {
        $this->autoRender = false;
//        ClassRegistry::init("Transaction")->updateTransaction("RF", 13.98, 3, 23);
    }

    function test_approved_payment() {
        $this->autoRender = false;
        ClassRegistry::init("Member")->approvedPayment(28);
    }

    function test_check_paypal() {
        $this->autoRender = false;
        App::import('Vendor', 'paypalexpresscheckout');
        $paypalExpo7 = new PaypalExpo7();
        $paypalInfo = $paypalExpo7->getExpressCheckoutDetails("EC-2YV95217RU871184B");
        debug($paypalInfo);
    }

    function test_kurs() {
        $this->autoRender = false;
        echo $this->kurs->getUSDtoIDR();
    }

    function api_login() {
//        $this->autoRender = false;
        if ($this->request->is("POST")) {
            if ($this->_checkData(["username", "password"])) {
                $username = $this->request->data["username"];
                $password = $this->request->data["password"];
//                $data = ClassRegistry::init("User")->find("first", array("recursive" => -1, "conditions" => array("OR" => array("User.email" => $username, "User.username" => $username))));
                $data = $this->Account->find("first", [
                    "conditions" => [
                        "Account.account_status_id" => 1,
                        "Member.id !=" => null,
                        "OR" => [
                            "User.email" => $username,
                            "User.username_game" => $username
                        ]
                    ],
                    "contain" => [
                        "AccountStatus",
                        "Member",
                        "User"
                    ]
                ]);
                if (!empty($data)) {
                    if ($this->_testPassword($password, $data['User']['salt'], $data['User']['password_game'])) {
                        $this->_writeApiResponse($this->_generateStatusCode(201, null, ["token" => $this->_generateAccessToken($data['User']["id"]), "id_referral" => $data['Member']['id_referral']]));
                    } else {
                        $this->_writeApiResponse($this->_generateStatusCode(402));
                    }
                } else {
                    $this->_writeApiResponse($this->_generateStatusCode(402));
                }
            }
        } else {
            $this->_writeApiResponse($this->_generateStatusCode(400));
        }
    }

    function api_heal() {
//        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $account = $this->apiCredential;
            $newToken = $this->_generateAccessToken($account["User"]["id"]);
            $this->_writeApiResponse($this->_generateStatusCode(206, null, ["token" => $newToken]));
        } else {
            $this->_writeApiResponse($this->_generateStatusCode(400));
        }
    }

    function api_status_code() {
        $this->_writeApiResponse($this->_generateStatusCode(206, null, ["codelist" => $this->statusCode]));
    }

    function api_restriction() {
        $this->_writeApiResponse($this->_generateStatusCode(403));
    }

    function _generateAccessToken($userId = null) {
        $token = random_str(255);
        $this->Account->User->save([
            "User" => [
                "id" => $userId,
                "api_token" => $token,
                "api_token_expire" => date("Y-m-d H:i:s", strtotime("+1 day")),
            ],
        ]);
        return $token;
    }

    function admin_list() {
        $this->autoRender = false;
        $conds = [];
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds[] = array(
                "or" => array(
                    "Biodata.first_name like" => "%$q%",
                    "Biodata.last_name like" => "%$q%"
            ));
        }
        $suggestions = ClassRegistry::init("Account")->find("all", array(
            "conditions" => [
                $conds
            ],
            "contain" => array(
                "Biodata",
            ),
            "limit" => 10,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['Account'])) {
                $result[] = [
                    "id" => $item['Account']['id'],
                    "full_name" => $item['Biodata']['full_name']
                ];
            }
        }
        echo json_encode($result);
    }

    function admin_list_account_with_member() {
        $this->autoRender = false;
        $conds = [];
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds[] = array(
                "or" => array(
                    "Biodata.first_name like" => "%$q%",
                    "Biodata.last_name like" => "%$q%"
            ));
        }
        $suggestions = ClassRegistry::init("Account")->find("all", array(
            "conditions" => [
                $conds,
                "Member.id !=" => null
            ],
            "contain" => array(
                "Biodata",
                "Member"
            ),
            "limit" => 10,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['Account'])) {
                $result[] = [
                    "id" => $item['Account']['id'],
                    "full_name" => $item['Biodata']['full_name'],
                    "referral_id" => $item['Member']['id_referral']
                ];
            }
        }
        echo json_encode($result);
    }

    function member_edit_profile() {
        $this->autoRender = false;
        $user_id = $this->Session->read("credential.member.User.id");
        $account_id = $this->Session->read("credential.member.Account.id");
        $biodata_id = $this->Session->read("credential.member.Biodata.id");
        $password = $this->data['User']['password'];
        $current_password = $this->data['User']['current_password'];
        $retype_password = $this->data['User']['retype_password'];
        $password_game = $this->data['User']['password_game'];
        $current_password_game = $this->data['User']['current_password_game'];
        $retype_password_game = $this->data['User']['retype_password_game'];
        $current_salt = $this->Session->read("credential.member.User.salt");
        $salt = hash("sha224", uniqid(mt_rand(), true), false);
        $hashedPassword = $this->Session->read("credential.member.User.password");
        if ($this->request->is("post") || $this->request->is("put")) {
            if (!is_null($account_id)) {
                if ((!empty($password) && !empty($current_password) && !empty($retype_password)) ||
                        (!empty($password_game) && !empty($current_password_game) && !empty($retype_password_game))) {
                    if (!empty($password) && !empty($current_password) && !empty($retype_password)) {
                        if ($this->_testPassword($current_password, $current_salt, $hashedPassword)) {
                            if ($this->data['User']['password'] == $this->data['User']['retype_password']) {
                                $this->Account->data['Account']['id'] = $account_id;
                                $this->Account->data['User']['id'] = $user_id;
                                $this->Account->data['Biodata']['id'] = $biodata_id;
                                $this->{ Inflector::classify($this->name) }->data['User']['salt'] = $salt;
                                $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['tanggal_lahir'] = $this->data['Biodata']['tanggal_lahir'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['handphone'] = $this->data['Biodata']['handphone'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['address'] = $this->data['Biodata']['address'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['postal_code'] = $this->data['Biodata']['postal_code'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['country_id'] = $this->data['Biodata']['country_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['state_id'] = $this->data['Biodata']['state_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['city_id'] = $this->data['Biodata']['city_id'];
                                $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                                $this->{ Inflector::classify($this->name) }->data['User']['username_game'] = $this->data['User']['username_game'];
                                $encrypt = hash("sha512", $password . $salt, false);
                                $this->{ Inflector::classify($this->name) }->data['User']['password'] = $encrypt;
                                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                                $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
                                $this->Session->write("credential.member", $data);
                                $this->Session->setFlash(__("Successfully updated profile"), 'default', array(), 'success');
                            } else {
                                $this->Session->setFlash(__("Repeat password not match with new password."), 'default', array(), 'danger');
                            }
                        } else {
                            $this->Session->setFlash(__("Current password wrong."), 'default', array(), 'danger');
                        }
                    } else {
                        if ($this->_testPassword($current_password_game, $current_salt, $hashedPassword)) {
                            if ($this->data['User']['password_game'] == $this->data['User']['retype_password_game']) {
                                $this->Account->data['Account']['id'] = $account_id;
                                $this->Account->data['User']['id'] = $user_id;
                                $this->Account->data['Biodata']['id'] = $biodata_id;
                                $this->{ Inflector::classify($this->name) }->data['User']['salt'] = $salt;
                                $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['tanggal_lahir'] = $this->data['Biodata']['tanggal_lahir'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['handphone'] = $this->data['Biodata']['handphone'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['address'] = $this->data['Biodata']['address'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['postal_code'] = $this->data['Biodata']['postal_code'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['country_id'] = $this->data['Biodata']['country_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['state_id'] = $this->data['Biodata']['state_id'];
                                $this->{ Inflector::classify($this->name) }->data['Biodata']['city_id'] = $this->data['Biodata']['city_id'];
                                $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                                $this->{ Inflector::classify($this->name) }->data['User']['username_game'] = $this->data['User']['username_game'];
                                $encrypt = hash("sha512", $password_game . $salt, false);
                                $this->{ Inflector::classify($this->name) }->data['User']['password_game'] = $encrypt;
                                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                                $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
                                $this->Session->write("credential.member", $data);
                                $this->Session->setFlash(__("Successfully updated profile"), 'default', array(), 'success');
                            } else {
                                $this->Session->setFlash(__("Repeat password game not match with new password game."), 'default', array(), 'danger');
                            }
                        } else {
                            $this->Session->setFlash(__("Current password game is wrong."), 'default', array(), 'danger');
                        }
                    }
                } else {
                    $this->Account->data['Account']['id'] = $account_id;
                    $this->Account->data['User']['id'] = $user_id;
                    $this->Account->data['Biodata']['id'] = $biodata_id;
                    $this->{ Inflector::classify($this->name) }->data['User']['email'] = $this->data['User']['email'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['first_name'] = $this->data['Biodata']['first_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['last_name'] = $this->data['Biodata']['last_name'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['gender_id'] = $this->data['Biodata']['gender_id'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['tanggal_lahir'] = $this->data['Biodata']['tanggal_lahir'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['phone'] = $this->data['Biodata']['phone'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['handphone'] = $this->data['Biodata']['handphone'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['address'] = $this->data['Biodata']['address'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['postal_code'] = $this->data['Biodata']['postal_code'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['country_id'] = $this->data['Biodata']['country_id'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['state_id'] = $this->data['Biodata']['state_id'];
                    $this->{ Inflector::classify($this->name) }->data['Biodata']['city_id'] = $this->data['Biodata']['city_id'];
                    $this->{ Inflector::classify($this->name) }->data['User']['username'] = $this->data['User']['username'];
                    $this->{ Inflector::classify($this->name) }->data['User']['username_game'] = $this->data['User']['username_game'];
                    $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                    $data = $this->{ Inflector::classify($this->name) }->find("first", array("conditions" => array("Account.id" => $this->Session->read("credential.member.Account.id"))));
                    $this->Session->write("credential.member", $data);
                    $this->request->data = $data;
                    $this->Session->setFlash(__("Successfully updated profile"), 'default', array(), 'success');
                }
            }
        }
        $this->redirect("/member/edit_profile");
    }

    function front_login() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $code = 402;
            $data = $this->{ Inflector::classify($this->name) }->find("first", array(
                "recursive" => 2,
                "conditions" => array(
                    "OR" => array(
                        "User.email" => $this->data['User']['email'],
                        "User.username" => $this->data['User']['email'])
                )
                    )
            );
            if (!empty($data)) {
                if (in_array($data['Account']['account_status_id'], [1, 5])) {
                    if ($this->_testPassword($this->data['User']['password'], $data['User']['salt'], $data['User']['password'])) {
                        $this->Session->write("credential.member", $data);
                        $code = 201;
//                        echo json_encode($this->_generateStatusCode($code));
                        $this->Session->setFlash(__("Login Success"), 'default', array(), 'success');
                        $this->redirect('/member/dashboard');
                    } else {
                        $this->Session->setFlash(__("Incorrect Password"), 'default', array(), 'danger');
//                        echo json_encode($this->_generateStatusCode($code));
                        $this->redirect('/login');
                    }
                } else {
                    $this->Session->setFlash(__("Your account is not active"), 'default', array(), 'danger');
                    $this->redirect('/login');
                }
            } else {
                $this->Session->setFlash(__("Login failed"), 'default', array(), 'danger');
//                echo json_encode($this->_generateStatusCode($code));
                $this->redirect('/login');
            }
        }
    }

    function front_register() {
        $this->autoRender = false;
        if ($this->request->is("post")) {
            $this->{ Inflector::classify($this->name) }->set($this->data);
            if (isset($this->Account->data['Account']['Dummy']['is_agree']) && $this->Account->data['Account']['Dummy']['is_agree']) {
                if (!empty($this->Account->data['User']['email']) && !empty($this->Account->data['User']['username']) && !empty($this->Account->data['Member']['id_referral'])) {
                    unset($this->Account->data['Account']['Dummy']);
                    if ($this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array('validate' => 'only', "deep" => true))) {
                        $dataReferral = ClassRegistry::init("Member")->find("first", [
                            "conditions" => [
                                "Member.id_referral" => $this->data['Member']['id_referral']
                            ],
                            "contain" => [
                                "Account"
                            ]
                        ]);
                        if (!empty($dataReferral)) {
                            $email = $this->Account->data['User']['email'];
                            $username = $this->Account->data['User']['username'];
                            $password = $this->Account->data['User']['password'];
                            $salt = hash("sha224", uniqid(mt_rand(), true), false);
                            $encrypt = hash("sha512", $password . $salt, false);
                            $token = hash("sha256", uniqid(mt_rand(), true), false);
                            $success = true;
                            $this->{ Inflector::classify($this->name) }->data["User"]["user_group_id"] = ClassRegistry::init("UserGroup")->translateToId("member");
                            $this->{ Inflector::classify($this->name) }->data["User"]["password"] = $encrypt;
                            $this->{ Inflector::classify($this->name) }->data["User"]["password_game"] = $encrypt;
                            $this->{ Inflector::classify($this->name) }->data["User"]["username"] = $username;
                            $this->{ Inflector::classify($this->name) }->data["User"]["email"] = $email;
                            $this->{ Inflector::classify($this->name) }->data["User"]["salt"] = $salt;
                            $this->{ Inflector::classify($this->name) }->data["Biodata"]["created"] = date('Y-m-d h:i:s');
                            $this->{ Inflector::classify($this->name) }->data["Biodata"]["modified"] = date('Y-m-d h:i:s');
                            $this->{ Inflector::classify($this->name) }->data["Account"]["account_status_id"] = 4;
                            $this->{ Inflector::classify($this->name) }->data["Account"]["activation_code"] = $token;
                            $this->{ Inflector::classify($this->name) }->data["Member"]["id_referral"] = $this->Account->Member->generateIdReferral();
                            $this->{ Inflector::classify($this->name) }->data["Member"]["upline_id"] = $dataReferral['Account']['id'];
                            $this->{ Inflector::classify($this->name) }->data["Member"]["register_dt"] = date("Y-m-d H:i:s");
                            try {
                                $this->_sentEmail("member-activation", [
                                    "tujuan" => $email,
                                    "subject" => "EXPO 7 - Email Verification",
                                    "from" => array("noreply@exposeven.com" => "EXPO 7"),
                                    "acc" => "NoReply",
                                    "item" => [
                                        'token' => $token,
                                        'fullName' => $username,
                                    ],
                                ]);
                                $this->{ Inflector::classify($this->name) }->saveAll($this->{ Inflector::classify($this->name) }->data, array("deep" => "true", "validate" => false));
                            } catch (Exception $e) {
                                $success = false;
                                $this->Session->setFlash(__("Register Failed when sending email."), 'default', array(), 'danger');
                            }
                            if ($success == true) {
                                $this->Session->setFlash(__("Register Success."), 'default', array(), 'success');
                            }
                        } else {
                            $this->Session->setFlash(__("No Referral Name was found. Try again."), 'default', array(), 'danger');
                        }
                    } else {
                        $this->Session->setFlash(__("Register Failed : Email/username already exist and/or only alphabets & numbers allowed."), 'default', array(), 'danger');
                    }
                } else {
                    $this->Session->setFlash(__("Register Failed."), 'default', array(), 'danger');
                }
            } else {
                $this->Session->setFlash(__("Privacy & Policy Agreement conditions must be met."), 'default', array(), 'danger');
            }
            $this->redirect("/");
        }
    }

    function generate_password($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $password = substr(str_shuffle($chars), 0, $length);
        return $password;
    }

    function front_member_list() {
        $this->autoRender = false;
        $conds = [];
        if (isset($this->request->query['q'])) {
            $q = $this->request->query['q'];
            $conds[] = array(
                "or" => array(
                    "Biodata.first_name like" => "%$q%",
                    "Biodata.last_name like" => "%$q%",
                    "Member.id_referral like" => "%$q%"
            ));
        }
        $suggestions = ClassRegistry::init("Account")->find("all", array(
            "conditions" => [
                $conds,
                "Member.id !=" => null,
                "Account.account_status_id" => 1,
                "Account.id !=" => $this->Session->read("credential.member.Account.id")
            ],
            "contain" => array(
                "Biodata",
                "Member"
            ),
            "limit" => 10,
        ));
        $result = [];
        foreach ($suggestions as $item) {
            if (!empty($item['Account'])) {
                $result[] = [
                    "id" => $item['Account']['id'],
                    "full_name" => $item['Biodata']['full_name'],
                    "id_referral" => $item['Member']['id_referral']
                ];
            }
        }
        echo json_encode($result);
    }

    /*
     * Sent Email Function.
     * merely for testing purpose.
     */

    function test_sent_email() {
        $this->autoRender = false;
        $token = "u0CcMrVuYlEhaRz60Q";
        $email = "takeru_adelbert@yahoo.com";
        $username = "takeru";
        try {
            $this->_sentEmail("member-activation", [
                "tujuan" => $email,
                "subject" => "EXPO 7 - Email Verification",
                "from" => array("noreply@exposeven.com" => "EXPO 7"),
                "acc" => "NoReply",
                "item" => [
                    'token' => $token,
                    'fullName' => $username,
                ],
            ]);
            debug("Email sent Successfully!");
            die;
        } catch (Exception $e) {
            debug("Failed sending email!");
            debug($e);
            die;
        }
    }

    function admin_list_member_by_referral_id_and_name() {
        $id_referral = $this->request->query["q"];
        $this->autoRender = false;
        $accounts = $this->Account->find("all", [
            "conditions" => [
                "OR" => [
                    "Member.id_referral like" => "%$id_referral%",
                    "Biodata.first_name like" => "%$id_referral%",
                    "Biodata.last_name like" => "%$id_referral%"
                ],
                "User.user_group_id" => ClassRegistry::init("UserGroup")->translateToId("member"),
                "Account.account_status_id" => 1,
                "Member.direct_downline < 7",
            ],
            "contain" => [
                "User",
                "Member" => [
                    "Rank",
                    "Title"
                ],
                "Biodata",
                "Balance"
            ],
            "limit" => 10,
        ]);
        $result = [];
        foreach ($accounts as $account) {
            $result[] = [
                "account_id" => $account["Account"]["id"],
                "full_name" => $account["Biodata"]["full_name"],
                "id_referral" => $account["Member"]["id_referral"],
                "level" => $account["Member"]["Rank"]["level"],
                "title" => $account["Member"]["Title"]["name"],
                "balance" => @$account['Balance']['amount']
            ];
        }
        echo json_encode($this->_generateStatusCode(206, null, $result));
    }

    function front_forget_password() {
        $this->autoRender = false;
        if ($this->request->is("POST")) {
            $email = $this->data['User']['email'];
            if (ClassRegistry::init("User")->hasAny(['User.email' => $email])) {
                $data = $this->Account->find("first", [
                    "conditions" => [
                        "User.email" => $email
                    ],
                    "contain" => [
                        "User",
                        "PasswordReset"
                    ]
                ]);
                if (!empty($data)) {
                    try {
                        $token = hash("sha256", uniqid(mt_rand(), true), false);
                        $this->Account->data['Account']['id'] = $data['Account']['id'];
                        $this->Account->data['PasswordReset']['id'] = $data['PasswordReset']['id'];
                        $this->Account->data['PasswordReset']['token'] = $token;
                        $this->Account->data['PasswordReset']['expire'] = date("Y-m-d H:i:s", time() + (24 * 3600));
                        $this->Account->data['PasswordReset']['is_used'] = false;
                        $this->Account->saveAll();
                        $this->_sentEmail("front-forget-password", [
                            "tujuan" => $email,
                            "subject" => "EXPOSEVEN - Reset Password",
                            "from" => array("noreply@exposeven.com" => "EXPOSEVEN"),
                            "acc" => "NoReply",
                            "item" => [
                                'token' => $token,
                                'username' => $data['User']['username'],
                            ],
                        ]);
                        $this->Session->setFlash(__("Email has been sent successfully. Kindly check your mail inbox."), 'default', array(), 'success');
                        $this->redirect("/forget-password");
                    } catch (Exception $ex) {
                        $this->Session->setFlash(__("Failed sending an email."), 'default', array(), 'danger');
                        $this->redirect("/forget-password");
                    }
                }
            } else {
                $this->Session->setFlash(__("Email not registered."), 'default', array(), 'danger');
                $this->redirect("/forget-password");
            }
        }
    }
}
