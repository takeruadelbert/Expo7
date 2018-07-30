<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <div class="boxOut-contentLeft inherit">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-contentLeft-top">
                        <div class="boxOut-profilePhoto center-block">
                            <img src="<?= Router::url($this->Session->read("credential.member.User.profile_picture"), true) ?>">
                        </div>
                    </div>
                </div>
                <?php
                echo $this->Form->create('User', array('action' => 'change_profile_picture', 'type' => 'file', 'id' => 'changeProfilePicture'));
                ?>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="boxOut-changePicture center-block input-form3 lampir-file">
                            <span class="btn btn-file button-changePicture font-RobotoCondensed-Bold">
                                <?= __("Change Pictures") ?><input type="file" name="data[User][profile_picture]" id="file" accept=".jpeg, .jpg, .png">
                            </span>
                            <div class="boxOut-nameFile">
                                <input type="text" class="form-control input-fieldKomfirmasi font-RobotoCondensed-Light hidden" placeholder="No File Choose" readonly">
                            </div>
                        </div>
                        <input type="submit" class="hidden"/>
                    </div>
                </div>
                <?= $this->Form->end(); ?>
            </div>
            <div class="boxOut-contentRight inherit">
                <div class="row boxOut-editProfile">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-editProfile">
                        <?php
                        echo $this->Form->create("Account", ["action" => 'edit_profile', 'type' => "post", 'id' => "dataProfile"]);
                        ?>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="button" class="btn button-editBank font-RobotoCondensed-Light"><?= __("Edit Bank Account") ?></button>

                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-editProfile-left">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 title-editProfile font-Exo2SemiBold">
                                            <?= __("Edit Personal Profile") ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                        <?= __("First Name") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][first_name]" value="<?= !empty($this->Session->read("credential.member.Biodata.first_name")) ? $this->Session->read("credential.member.Biodata.first_name") : "" ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-sx-2">

                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                        <?= __("Last Name") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][last_name]" value="<?= !empty($this->Session->read("credential.member.Biodata.last_name")) ? $this->Session->read("credential.member.Biodata.last_name") : "" ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                        <?= __("Birth Date") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="date" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][tanggal_lahir]" value="<?= !empty($this->Session->read("credential.member.Biodata.tanggal_lahir")) ? $this->Session->read("credential.member.Biodata.tanggal_lahir") : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-sx-2">

                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                        <?= __("Gender") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <?php
                                                        $is_selected1 = "";
                                                        $is_selected2 = "";
                                                        if (!empty($this->Session->read("credential.member.Biodata.gender_id"))) {
                                                            if ($this->Session->read("credential.member.Biodata.gender_id") == 1) {
                                                                $is_selected1 = "selected";
                                                            } else {
                                                                $is_selected2 = "selected";
                                                            }
                                                        }
                                                        ?>
                                                        <select class="form-control dropdown-gender font-RobotoCondensed-Light" name="data[Biodata][gender_id]">
                                                            <option value="" hidden>Select Gender</option>
                                                            <option value="1" <?= $is_selected1 ?>>Male</option>
                                                            <option value="2" <?= $is_selected2 ?>>Female</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                    <?= __("Address") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][address]" value="<?= !empty($this->Session->read("credential.member.Biodata.address")) ? $this->Session->read("credential.member.Biodata.address") : '' ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-timeLeft">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                        <?= __("Postal Code") ?>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][postal_code]" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46" value="<?= !empty($this->Session->read("credential.member.Biodata.postal_code")) ? $this->Session->read("credential.member.Biodata.postal_code") : '' ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2">

                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-timeLeft">
                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                    <?= __("Country") ?>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <?php
                                                    $country_list = ClassRegistry::init("Country")->find("all");
                                                    ?>
                                                    <select class="form-control dropdown-gender font-RobotoCondensed-Light state-country" name="data[Biodata][country_id]" data-state-country-target="#BiodataStateId">
                                                        <?php
                                                        $is_selected = "";
                                                        foreach ($country_list as $countries) {
                                                            if (!empty($this->Session->read("credential.member.Biodata.country_id"))) {
                                                                if ($this->Session->read("credential.member.Biodata.country_id") == $countries['Country']['id']) {
                                                                    $is_selected = "selected";
                                                                } else {
                                                                    $is_selected = "";
                                                                }
                                                            }
                                                            ?>
                                                            <option value="<?= $countries['Country']['id'] ?>" <?= $is_selected ?>><?= $countries['Country']['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-timeLeft">
                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                    <?= __("States") ?>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <?php
                                                    $state_list = ClassRegistry::init("State")->find("all", [
                                                        "conditions" => [
                                                            "State.country_id" => $this->Session->read("credential.member.Biodata.country_id")
                                                        ]
                                                    ]);
                                                    ?>
                                                    <select class="form-control dropdown-gender font-RobotoCondensed-Light city-state state-country-target" name="data[Biodata][state_id]" data-city-state-target="#BiodataCityId" id="BiodataStateId">
                                                        <?php
                                                        $is_selected_for_state = "";
                                                        foreach ($state_list as $states) {
                                                            if (!empty($this->Session->read("credential.member.Biodata.state_id"))) {
                                                                if ($this->Session->read("credential.member.Biodata.state_id") == $states['State']['id']) {
                                                                    $is_selected_for_state = "selected";
                                                                } else {
                                                                    $is_selected_for_state = "";
                                                                }
                                                            }
                                                            ?>
                                                            <option value="<?= $states['State']['id'] ?>" <?= $is_selected_for_state ?>><?= $states['State']['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-2 col-xs-2">

                                            </div>
                                            <div class="col-md-5 col-sm-5 col-xs-5 boxOut-timeLeft">
                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                    <?= __("City") ?>
                                                </div>
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <?php
                                                    $city_list = ClassRegistry::init("City")->find("all", [
                                                        "conditions" => [
                                                            "City.state_id" => $this->Session->read("credential.member.Biodata.state_id")
                                                        ]
                                                    ]);
                                                    ?>
                                                    <select class="form-control dropdown-gender font-RobotoCondensed-Light city-state-target" name="data[Biodata][city_id]" id="BiodataCityId">
                                                        <?php
                                                        $is_selected_for_city = "";
                                                        foreach ($city_list as $cities) {
                                                            if (!empty($this->Session->read("credential.member.Biodata.city_id"))) {
                                                                if ($this->Session->read("credential.member.Biodata.city_id") == $cities['City']['id']) {
                                                                    $is_selected_for_city = "selected";
                                                                } else {
                                                                    $is_selected_for_city = "";
                                                                }
                                                            }
                                                            ?>
                                                            <option value="<?= $cities['City']['id'] ?>" <?= $is_selected_for_city ?>><?= $cities['City']['name'] ?></option>
                                                            <?php
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 boxOut-editProfile-right">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-editProfile font-Exo2SemiBold">
                                                    <?= __("Edit Contact") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                                Username
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][username]" value="<?= !empty($this->Session->read("credential.member.User.username")) ? $this->Session->read("credential.member.User.username") : "" ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 col-sm-2 col-sx-2">

                                                    </div>
                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                                Username Game
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <input type="text" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][username_game]" value="<?= !empty($this->Session->read("credential.member.User.username_game")) ? $this->Session->read("credential.member.User.username_game") : "" ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            Email
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="email" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][email]" value="<?= !empty($this->Session->read("credential.member.User.email")) ? $this->Session->read("credential.member.User.email") : "" ?>" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            <?= __("Mobile Phone") ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="number" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][handphone]" value="<?= !empty($this->Session->read("credential.member.Biodata.handphone")) ? $this->Session->read("credential.member.Biodata.handphone") : "" ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            <?= __("Phone") ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="number" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[Biodata][phone]" value="<?= !empty($this->Session->read("credential.member.Biodata.phone")) ? $this->Session->read("credential.member.Biodata.phone") : "" ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 title-editProfile titleField-editPassword font-Exo2SemiBold">
                                                    <?= __("Change Password") ?>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            <?= __("Current Password") ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][current_password]" id="currentPassword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            <?= __("New Password") ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][password]" id="newPassword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                            <?= __("Confirm  Password") ?>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][retype_password]" id="retypePassword">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 title-editProfile titleField-editPassword font-Exo2SemiBold">
                                        <?= __("Change Password Game") ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                <?= __("Current Password") ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][current_password_game]" id="currentPasswordGame">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                <?= __("New Password") ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][password_game]" id="newPasswordGame">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editProfile font-RobotoCondensed-Light">
                                                <?= __("Confirm  Password") ?>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="password" placeholder="" class="form-control field-title font-RobotoCondensed" name="data[User][retype_password_game]" id="retypePasswordGame">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <button type="submit" class="btn button-saveChange font-RobotoCondensed-Bold"><?= __("SAVE CHANGE") ?></button>
                            </div>
                        </div>
                        <?php echo $this->Form->end(); ?>
                    </div>
                </div>
                <div class="row boxOut-editBank">
                    <div class="col-md-12 col-sm-12 col-xs-12 box-editBank">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-6 title-editProfile font-Exo2SemiBold">
                                        <?= __("Edit Bank Account") ?>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-6">
                                        <button type="button" class="btn button-editGeneralProfile font-RobotoCondensed-Light">Edit General Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-universal">

                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-bankList" data-mcs-theme="dark-3">

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-bankList">
                                            <div class="col-md-12 col-sm-12 col-xs-12 bankList">
                                                <div class="boxOut-keteranganBank-left">
                                                    <div class="boxOut-buttonEdit">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 box-a">
                                                            <a href="#" class="a-rincian">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-actionImg">
                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/bank-edit.png", true) ?>">
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textAction font-RobotoCondensed-Light">
                                                                    Edit
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 box-a">
                                                            <a href="#" class="">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-actionImg-delete">
                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/bank-delete.png", true) ?>">
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textAction font-RobotoCondensed-Light">
                                                                    Delete
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="boxOut-bankImg box-bankImg">
                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/bank-transfer-1.png", true) ?>">
                                                    </div>
                                                </div>
                                                <div class="boxOut-keteranganBank-right">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Account owner :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Ilugroup Multimedia 
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Account number :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        01234567890
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12 boxOut-table-bottom">
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Bank name :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Bank Central Asia
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Branch :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Mattoangin - Makassar
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rincianList">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 subTitle-editProfile font-RobotoCondensed-Bold">
                                                            Insert Bank Account
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-left">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Account Name
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="BUDI AHSUDAHLAH ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Account Number
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="01234567890" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Bank Name
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-namaBank font-RobotoCondensed-Bold">
                                                                                    PT. BANK NEGARA INDONESIA (PERSERO) <a class="a-click" href="#"><img class="" src="<?= Router::url("/front_file/expo7/img/icon/pencil-edit.png", true) ?>"></a>
                                                                                </div>
                                                                                <div class="editBank-popup">
                                                                                    <button type="button" class="btn button-chooseBank button-circleClose font-RobotoCondensed-Bold">
                                                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/close-icon2.png", true) ?>">
                                                                                    </button>
                                                                                    <div class="popup-triangle hidden-xs"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBankAccount font-RobotoCondensed-Light">
                                                                                            Choose Bank Account
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-search">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-btn">
                                                                                                    <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                                                                </div>
                                                                                                <input type="text" class="form-control field-search font-RobotoCondensed" placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-radioButton font-RobotoCondensed-Light">
                                                                                            <div>
                                                                                                <input type="radio" id="radio01" name="radio" />
                                                                                                <label for="radio01"><span></span> PT. BCA (BANK CENTRAL ASIA) TBK / BCA</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio02" name="radio" />
                                                                                                <label for="radio02"><span></span> PT. BANK NEGARA INDONESIA (PERSERO) / BNI </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio03" name="radio" />
                                                                                                <label for="radio03"><span></span> PT. BANK RAKYAT INDONESIA (PERSERO) / BRI</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio04" name="radio" />
                                                                                                <label for="radio04"><span></span> PT. BANK CIMB NIAGA TBK</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio05" name="radio" />
                                                                                                <label for="radio05"><span></span> CITIBANK NA </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio06" name="radio" />
                                                                                                <label for="radio06"><span></span> PT. BANK DANAMON INDONESIA TBK</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio07" name="radio" />
                                                                                                <label for="radio07"><span></span> PT. BANK MANDIRI</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio08" name="radio" />
                                                                                                <label for="radio08"><span></span> BANGKOK BANK PUBLIC CO. LTD </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio09" name="radio" />
                                                                                                <label for="radio09"><span></span> BANK HANA</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio10" name="radio" />
                                                                                                <label for="radio10"><span></span> BANK JABAR BANTEN SYARIAH / BJB SYARIAH </label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-popupButton">
                                                                                            <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-left">
                                                                                                <button type="button" class="btn button-prev font-RobotoCondensed-Bold">
                                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-left.png", true) ?>">
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-right">
                                                                                                <button type="button" class="btn button-next font-RobotoCondensed-Bold active">
                                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-right.png", true) ?>">
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Branch
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="MAKASSAR" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-RobotoCondensed-Light">
                                                                        For banks other than BCA, it is required to fill out Branch Office
                                                                        <br>
                                                                        along with city where the bank is located. e.g: Pondok Indah Jakarta Selatan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-right">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                QTP Code 
                                                                                <a href="#" class="box-qtp" data-toggle="tooltip" data-trigger="hover" data-placement="auto right" title="Quick Test Professional (QTP)">
                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/info.png", true) ?>">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="col-md-7 col-sm-7 col-xs-7 boxOut-QTPfield">
                                                                                    <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                                </div>
                                                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                    <button type="button" class="btn button-qtp font-RobotoCondensed-Bold">Send OTP to Phone</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Password Tokosayaonline
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="password" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <button type="button" class="btn button-cancel font-RobotoCondensed-Bold">Cancel</button>
                                                                        <button type="button" class="btn button-send font-RobotoCondensed-Bold">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-bankList">
                                            <div class="col-md-12 col-sm-12 col-xs-12 bankList">
                                                <div class="boxOut-keteranganBank-left">
                                                    <div class="boxOut-buttonEdit">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 box-a">
                                                            <a href="#" class="a-rincian">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-actionImg">
                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/bank-edit.png", true) ?>">
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textAction font-RobotoCondensed-Light">
                                                                    Edit
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6 box-a">
                                                            <a href="#" class="">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-actionImg-delete">
                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/bank-delete.png", true) ?>">
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-textAction font-RobotoCondensed-Light">
                                                                    Delete
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="boxOut-bankImg box-bankImg">
                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/bank-transfer-2.png", true) ?>">
                                                    </div>
                                                </div>
                                                <div class="boxOut-keteranganBank-right">
                                                    <div class="col-md-6 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Account owner :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Ilugroup Multimedia 
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Account number :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        01234567890
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 col-sm-12 col-xs-12 boxOut-table-bottom">
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Bank name :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Bank Central Asia
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-6">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-titleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-titleList font-RobotoCondensed-Bold">
                                                                        Branch :
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subTitleList">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 box-subTitleList font-RobotoCondensed-Light">
                                                                        Mattoangin - Makassar
                                                                    </div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rincianList">
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-6 subTitle-editProfile font-RobotoCondensed-Bold">
                                                            Insert Bank Account
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-left">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Account Name
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="BUDI AHSUDAHLAH ">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Account Number
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="01234567890" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Bank Name
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-namaBank font-RobotoCondensed-Bold">
                                                                                    PT. BANK NEGARA INDONESIA (PERSERO) <a class="a-click" href="#"><img class="" src="<?= Router::url("/front_file/expo7/img/icon/pencil-edit.png", true) ?>"></a>
                                                                                </div>
                                                                                <div class="editBank-popup">
                                                                                    <button type="button" class="btn button-chooseBank button-circleClose font-RobotoCondensed-Bold">
                                                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/close-icon2.png", true) ?>">
                                                                                    </button>
                                                                                    <div class="popup-triangle hidden-xs"></div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBankAccount font-RobotoCondensed-Light">
                                                                                            Choose Bank Account
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-search">
                                                                                            <div class="input-group">
                                                                                                <div class="input-group-btn">
                                                                                                    <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                                                                </div>
                                                                                                <input type="text" class="form-control field-search font-RobotoCondensed" placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-radioButton font-RobotoCondensed-Light">
                                                                                            <div>
                                                                                                <input type="radio" id="radio01" name="radio" />
                                                                                                <label for="radio01"><span></span> PT. BCA (BANK CENTRAL ASIA) TBK / BCA</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio02" name="radio" />
                                                                                                <label for="radio02"><span></span> PT. BANK NEGARA INDONESIA (PERSERO) / BNI </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio03" name="radio" />
                                                                                                <label for="radio03"><span></span> PT. BANK RAKYAT INDONESIA (PERSERO) / BRI</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio04" name="radio" />
                                                                                                <label for="radio04"><span></span> PT. BANK CIMB NIAGA TBK</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio05" name="radio" />
                                                                                                <label for="radio05"><span></span> CITIBANK NA </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio06" name="radio" />
                                                                                                <label for="radio06"><span></span> PT. BANK DANAMON INDONESIA TBK</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio07" name="radio" />
                                                                                                <label for="radio07"><span></span> PT. BANK MANDIRI</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio08" name="radio" />
                                                                                                <label for="radio08"><span></span> BANGKOK BANK PUBLIC CO. LTD </label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio09" name="radio" />
                                                                                                <label for="radio09"><span></span> BANK HANA</label>
                                                                                            </div>

                                                                                            <div>
                                                                                                <input type="radio" id="radio10" name="radio" />
                                                                                                <label for="radio10"><span></span> BANK JABAR BANTEN SYARIAH / BJB SYARIAH </label>
                                                                                            </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-popupButton">
                                                                                            <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-left">
                                                                                                <button type="button" class="btn button-prev font-RobotoCondensed-Bold">
                                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-left.png", true) ?>">
                                                                                                </button>
                                                                                            </div>
                                                                                            <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-right">
                                                                                                <button type="button" class="btn button-next font-RobotoCondensed-Bold active">
                                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-right.png", true) ?>">
                                                                                                </button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Branch
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" value="MAKASSAR" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-RobotoCondensed-Light">
                                                                        For banks other than BCA, it is required to fill out Branch Office
                                                                        <br>
                                                                        along with city where the bank is located. e.g: Pondok Indah Jakarta Selatan
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-right">
                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                QTP Code 
                                                                                <a href="#" class="box-qtp" data-toggle="tooltip" data-trigger="hover" data-placement="auto right" title="Quick Test Professional (QTP)">
                                                                                    <img src="<?= Router::url("/front_file/expo7/img/icon/info.png", true) ?>">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <div class="col-md-7 col-sm-7 col-xs-7 boxOut-QTPfield">
                                                                                    <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                                </div>
                                                                                <div class="col-md-5 col-sm-5 col-xs-5">
                                                                                    <button type="button" class="btn button-qtp font-RobotoCondensed-Bold">Send OTP to Phone</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                                Password Tokosayaonline
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                <input type="password" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" >
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <button type="button" class="btn button-cancel font-RobotoCondensed-Bold">Cancel</button>
                                                                        <button type="button" class="btn button-send font-RobotoCondensed-Bold">Save</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-insert">
                                    <button type="button" class="btn button-insert font-RobotoCondensed-Bold">
                                        <img class="insert" src="<?= Router::url("/front_file/expo7/img/icon/insert-plus.png", true) ?>">
                                    </button>
                                    <button type="button" class="btn button-closeInsert font-RobotoCondensed-Bold">
                                        <img class="close-insert" src="<?= Router::url("/front_file/expo7/img/icon/close-insert.png", true) ?>">
                                    </button>
                                </div>

                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-tambahBankAccount">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-6 subTitle-editProfile font-RobotoCondensed-Bold">
                                                Insert Bank Account
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-left">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    Account Name
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    Account Number
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    Bank Name
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <button type="button" class="btn button-chooseBank font-RobotoCondensed-Bold">Choose Bank</button>
                                                                    <div class="chooseBank-popup">
                                                                        <button type="button" class="btn button-chooseBank button-circleClose font-RobotoCondensed-Bold">
                                                                            <img src="<?= Router::url("/front_file/expo7/img/icon/close-icon2.png", true) ?>">
                                                                        </button>
                                                                        <div class="popup-triangle hidden-xs"></div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBankAccount font-RobotoCondensed-Light">
                                                                                Choose Bank Account
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-search">
                                                                                <div class="input-group">
                                                                                    <div class="input-group-btn">
                                                                                        <button class="btn btn-default btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                                                                                    </div>
                                                                                    <input type="text" class="form-control field-search font-RobotoCondensed" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-radioButton font-RobotoCondensed-Light">
                                                                                <div>
                                                                                    <input type="radio" id="radio01" name="radio" />
                                                                                    <label for="radio01"><span></span> PT. BCA (BANK CENTRAL ASIA) TBK / BCA</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio02" name="radio" />
                                                                                    <label for="radio02"><span></span> PT. BANK NEGARA INDONESIA (PERSERO) / BNI </label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio03" name="radio" />
                                                                                    <label for="radio03"><span></span> PT. BANK RAKYAT INDONESIA (PERSERO) / BRI</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio04" name="radio" />
                                                                                    <label for="radio04"><span></span> PT. BANK CIMB NIAGA TBK</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio05" name="radio" />
                                                                                    <label for="radio05"><span></span> CITIBANK NA </label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio06" name="radio" />
                                                                                    <label for="radio06"><span></span> PT. BANK DANAMON INDONESIA TBK</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio07" name="radio" />
                                                                                    <label for="radio07"><span></span> PT. BANK MANDIRI</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio08" name="radio" />
                                                                                    <label for="radio08"><span></span> BANGKOK BANK PUBLIC CO. LTD </label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio09" name="radio" />
                                                                                    <label for="radio09"><span></span> BANK HANA</label>
                                                                                </div>

                                                                                <div>
                                                                                    <input type="radio" id="radio10" name="radio" />
                                                                                    <label for="radio10"><span></span> BANK JABAR BANTEN SYARIAH / BJB SYARIAH </label>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-popupButton">
                                                                                <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-left">
                                                                                    <button type="button" class="btn button-prev font-RobotoCondensed-Bold">
                                                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-left.png", true) ?>">
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-md-6 col-sm-6 col-xs-6 boxOut-popupButton-right">
                                                                                    <button type="button" class="btn button-next font-RobotoCondensed-Bold active">
                                                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/popupButton-right.png", true) ?>">
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    Branch
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-keteranganField font-RobotoCondensed-Light">
                                                            For banks other than BCA, it is required to fill out Branch Office
                                                            <br>
                                                            along with city where the bank is located. e.g: Pondok Indah Jakarta Selatan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-bankAccount-right">
                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    QTP Code 
                                                                    <a href="#" class="box-qtp" data-toggle="tooltip" data-trigger="hover" data-placement="auto right" title="Quick Test Professional (QTP)">
                                                                        <img src="<?= Router::url("/front_file/expo7/img/icon/info.png", true) ?>">
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-7 col-sm-7 col-xs-7 boxOut-QTPfield">
                                                                        <input type="text" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46">
                                                                    </div>
                                                                    <div class="col-md-5 col-sm-5 col-xs-5">
                                                                        <button type="button" class="btn button-qtp font-RobotoCondensed-Bold">Send OTP to Phone</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 titleField-editBank font-RobotoCondensed-Light">
                                                                    Password Tokosayaonline
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <input type="password" placeholder="" class="form-control field-bank font-RobotoCondensed-Bold" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <button type="button" class="btn button-cancel font-RobotoCondensed-Bold">Cancel</button>
                                                            <button type="button" class="btn button-send font-RobotoCondensed-Bold">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $(document).on('change', '.btn-file :file', function () {
            var input = $(this),
                    numFiles = input.get(0).files ? input.get(0).files.length : 1,
                    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready(function () {
            $('.btn-file :file').on('fileselect', function (event, numFiles, label) {

                var input = $(this).parents('.lampir-file').find(':text'),
                        log = numFiles > 1 ? numFiles + ' files selected' : label;

                if (input.length) {
                    input.val(log);
                } else {
                    if (log)
                        alert(log);
                }

            });
        });

        $('.boxOut-contentRight').find('.button-editBank').on('click', function (e) {
            $(this).parents('.boxOut-contentRight').find('.box-editProfile').fadeOut(0);
            $(this).parents('.boxOut-contentRight').find('.box-editBank').fadeIn(400);
        });

        $('.boxOut-contentRight').find('.button-editGeneralProfile').on('click', function (e) {
            $(this).parents('.boxOut-contentRight').find('.box-editBank').fadeOut(0);
            $(this).parents('.boxOut-contentRight').find('.box-editProfile').fadeIn(400);
        });


        $('.button-chooseBank').on("click", function () {
            $('.chooseBank-popup').fadeToggle(300);
        });

        $('.a-click').on("click", function () {
            $('.editBank-popup').fadeToggle(300);
        });

        $('.a-rincian').on("click", function () {
            $(this).parents('.box-bankList').find('.boxOut-rincianList').slideToggle(200);
        });

        $('.button-insert').on("click", function () {
            $(this).parents('.boxOut-universal').find('.boxOut-tambahBankAccount').slideToggle(200);
            $(this).parents('.boxOut-insert').find('.button-insert').hide();
            $(this).parents('.boxOut-insert').find('.button-closeInsert').show();
        });

        $('.button-closeInsert').on("click", function () {
            $(this).parents('.boxOut-universal').find('.boxOut-tambahBankAccount').slideToggle(200);
            $(this).parents('.boxOut-insert').find('.button-insert').show();
            $(this).parents('.boxOut-insert').find('.button-closeInsert').hide();
        });

        $(".city-state").on("change", function () {
            cityList(this, $(this).data("city-state-target"));
        });
        $(".state-country").on("change", function () {
            stateList(this, $(this).data("state-country-target"));
        });

        $("#file").on("change", function () {
            var fileName = $(this).val();
            if (fileName) {
                $("#changeProfilePicture").submit();
            } else {
                alert("Silahkan pilih gambar yang ingin diupload.");
            }
        });

        $("#newPassword, #retypePassword").on("change keyup", function () {
            var status;
            if ($("#newPassword").val() != "" && $("#retypePassword").val() != "") {
                status = true;
            } else {
                status = false;
            }
            validate_password(status);
        });
    });

    function validate_password(status) {
        $("#dataProfile").validate({
            rules: {
                "data[User][password]": {
                    required: status,
                    minlength: 6
                },
                "data[User][retype_password]": {
                    required: status,
                    minlength: 6,
                    equalTo: "#newPassword"
                }
            }
        });
    }

    function cityList(e, targetE) {
        var id = $(e).val();
        $.ajax({
            url: BASE_URL + "/cities/list_city/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var $target = $(targetE);
                $target.html("<option value=''>- Choose City -</option>");
                $.each(data.data, function (k, v) {
                    $target.append("<option value='" + k + "'>" + v + "</option>");
                })
            },
            error: function () {

            }
        })
    }
    function stateList(e, targetE) {
        var id = $(e).val();
        $.ajax({
            url: BASE_URL + "/states/list_state/" + id,
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                var $target = $(targetE);
                $target.html("<option value=''>- Choose State -</option>");
                $.each(data.data, function (k, v) {
                    $target.append("<option value='" + k + "'>" + v + "</option>");
                })
            },
            error: function () {

            }
        })
    }
</script>