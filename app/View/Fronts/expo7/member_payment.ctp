<style>
    .inactiveLink {
        pointer-events: none;
        cursor: default;
    }
</style>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content mCustomScrollbar" data-mcs-theme="dark-3">

            <section>
                <div class="wizard">
                    <div class="wizard-inner padding-wizard">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="li-1 active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Confirm your identity" class="inactiveLink">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("Confirm Referral") ?>
                                    </div>
                                </a>
                            </li>

                            <li role="presentation" class="li-2 disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Contact Information" class="inactiveLink">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("Contact Information") ?>
                                    </div>
                                </a>
                            </li>

                            <li role="presentation" class="li-3 disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Completed" class="inactiveLink">
                                    <span class="round-tab"></span>
                                    <div class="li-text font-RobotoCondensed">
                                        <?= __("Payment") ?>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-content-step-1">
                                            <div class="col-md-6 col-sm-6 col-xs-12 box-tableLeft table-responsive">
                                                <table class="table table-content col-md-12 col-sm-12 col-xs-12 font-Exo2SemiBold">
                                                    <tr>
                                                        <td class="font-RobotoCondensed">
                                                            <?= __("ID Referral") ?> :
                                                        </td>
                                                        <td class="font-RobotoCondensed-Bold">
                                                            <?= $memberEngine->getUplineReferralCode() ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 box-tableRight table-responsive">
                                                <table class="table table-content col-md-12 col-sm-12 col-xs-12 font-Exo2SemiBold">
                                                    <tr>
                                                        <td class="font-RobotoCondensed">
                                                            <?= __("Referral Name") ?> :
                                                        </td>
                                                        <td class="font-RobotoCondensed-Bold">
                                                            <?= $memberEngine->getUplineReferraNamel() ?>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12 center">
                                        <button type="button" class="btn button-next next-step font-RobotoCondensed"><?= __("Next Step") ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="col-md-12 col-sm-12 col-xs-12 box-content-step">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step-2">
                                        <div class="col-md-12 col-sm-12 col-xs-12 box-step2-1">
                                            <div class="row">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-content-2">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rowContent-2">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulContent-2 font-RobotoCondensed-Bold">
                                                                        <?= __("PERSONAL INFORMATION") ?>
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subJudulContent-2 font-RobotoCondensed-Light">

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            <?= __("First Name") ?> :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" id="firstName" name="data[Biodata][first_name]" value="<?= !empty($dataMember['Account']['Biodata']['first_name']) ? $dataMember['Account']['Biodata']['first_name'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            <?= __("Last Name") ?> :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" id="lastName" name="data[Biodata][last_name]" value="<?= !empty($dataMember['Account']['Biodata']['last_name']) ? $dataMember['Account']['Biodata']['last_name'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            <?= __("Gender") ?> :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <?php
                                                                                            $is_selected1 = "";
                                                                                            $is_selected2 = "";
                                                                                            if (!empty($dataMember['Account']['Biodata']['gender_id'])) {
                                                                                                if ($dataMember['Account']['Biodata']['gender_id'] == 1) {
                                                                                                    $is_selected1 = "selected";
                                                                                                } else {
                                                                                                    $is_selected2 = "selected";
                                                                                                }
                                                                                            }
                                                                                            ?>
                                                                                            <select class="form-control dropdown-gender font-RobotoCondensed-Light" name="data[Biodata][gender_id]" id="gender">
                                                                                                <option value="" hidden>Select Gender</option>
                                                                                                <option value="1" <?= $is_selected1 ?>>Male</option>
                                                                                                <option value="2" <?= $is_selected2 ?>>Female</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Date of Birth :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="date" class="form-control field-postalCode datepicker font-RobotoCondensed" id="birthdate" name="data[Biodata][tanggal_lahir]" value="<?= !empty($dataMember['Account']['Biodata']['tanggal_lahir']) ? $dataMember['Account']['Biodata']['tanggal_lahir'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Address :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" id="address" name="data[Biodata][address]" value="<?= !empty($dataMember['Account']['Biodata']['address']) ? $dataMember['Account']['Biodata']['address'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Country :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <?php
                                                                                            $country_list = ClassRegistry::init("Country")->find("all");
                                                                                            ?>
                                                                                            <select class="form-control dropdown-gender font-RobotoCondensed-Light state-country" id="country" name="data[Biodata][country_id]" data-state-country-target="#BiodataStateId">
                                                                                                <?php
                                                                                                $is_selected = "";
                                                                                                foreach ($country_list as $countries) {
                                                                                                    if (!empty($dataMember['Account']['Biodata']['country_id'])) {
                                                                                                        if ($dataMember['Account']['Biodata']['country_id'] == $countries['Country']['id']) {
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
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            States :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <?php
                                                                                            $state_list = ClassRegistry::init("State")->find("all", [
                                                                                                "conditions" => [
                                                                                                    "State.country_id" => $dataMember['Account']['Biodata']['country_id']
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
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            City :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <?php
                                                                                            $city_list = ClassRegistry::init("City")->find("all", [
                                                                                                "conditions" => [
                                                                                                    "City.state_id" => $dataMember['Account']['Biodata']['state_id']
                                                                                                ]
                                                                                            ]);
                                                                                            ?>
                                                                                            <select class="form-control dropdown-gender font-RobotoCondensed-Light city-state-target" name="data[Biodata][city_id]" id="BiodataCityId">
                                                                                                <?php
                                                                                                $is_selected_for_city = "";
                                                                                                foreach ($city_list as $cities) {
                                                                                                    if (!empty($dataMember['Account']['Biodata']['city_id'])) {
                                                                                                        if ($dataMember['Account']['Biodata']['city_id'] == $cities['City']['id']) {
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
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Postal Code :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-postalCode font-RobotoCondensed" id="postalCode" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46" name="data[Biodata][postal_code]" value="<?= !empty($dataMember['Account']['Biodata']['postal_code']) ? $dataMember['Account']['Biodata']['postal_code'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Phone Number :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" id="phoneNumber" name="data[Biodata][phone]" value="<?= !empty($dataMember['Account']['Biodata']['phone']) ? $dataMember['Account']['Biodata']['phone'] : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Mobile Phone Number :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" id="mobilePhoneNumber" name="data[Biodata][handphone]" value="<?= !empty($dataMember['Account']['Biodata']['handphone']) ? $dataMember['Account']['Biodata']['handphone'] : "" ?>">
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
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rowContent-2">
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulContent-2 font-RobotoCondensed-Bold">
                                                                        BANK INFORMATION
                                                                    </div>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-subJudulContent-2 font-RobotoCondensed-Light">
                                                                        Isikan data dengan baik dan benar
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Name of Bank :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" name="data[Member][bank_name]" value="<?= !empty($this->Session->read("credential.member.Member.bank_name")) ? $this->Session->read("credential.member.Member.bank_name") : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Branch Name :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" name="data[Member][bank_branch]" value="<?= !empty($this->Session->read("credential.member.Member.bank_branch")) ? $this->Session->read("credential.member.Member.bank_branch") : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Account Number :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" onkeydown="return (event.which >= 48 && event.which <= 57) || event.which == 8 || event.which == 46" name="data[Member][bank_account]" value="<?= !empty($this->Session->read("credential.member.Member.bank_account")) ? $this->Session->read("credential.member.Member.bank_account") : "" ?>">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-2">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-fieldContent-2">
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-judulField font-RobotoCondensed-Bold">
                                                                                            Account Holder :
                                                                                        </div>
                                                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                            <input type="text" placeholder="" class="form-control field-content2 font-RobotoCondensed" name="data[Member][bank_an]" value="<?= !empty($this->Session->read("credential.member.Member.bank_an")) ? $this->Session->read("credential.member.Member.bank_an") : "" ?>">
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
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-button center">
                                        <button type="button" class="btn prev-step button-reset font-RobotoCondensed"><?= __("Back") ?></button>
                                        <button type="button" class="btn button-next font-RobotoCondensed" id="nextToPayment" onclick="save_data(<?= $this->Session->read("credential.member.Biodata.id") ?>)"><?= __("Next Step") ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content-step boxOut-content-step-3">
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-complete-up">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-complete-up">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-table-complete table-responsive">
                                                            <table class="table table-order center-block">
                                                                <tr>
                                                                    <td class="td-imgOrder" rowspan="2">
                                                                        <img src="<?php echo Router::url("/front_file/expo7/img/icon/orderDetail-logo.png", true) ?>">
                                                                    </td>
                                                                    <td class="td-titleContent-complete font-PoppinsSemiBold">
                                                                        <?= __("Payment") ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-subTitleContent-complete font-LatoLightItalic">
                                                                        &nbsp;
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentLeft-complete">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-contentLeft-complete font-PoppinsLight">
                                                                    <?= __("Username") ?> : 
                                                                    <font class="font-PoppinsSemiBold">
                                                                    <?= $memberEngine->getUsername() ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-12 boxOut-contentRight-complete">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-contentRight-complete font-PoppinsLight">
                                                                    <?= __("Your Referral ID") ?>: 
                                                                    <font class="font-PoppinsSemiBold">
                                                                    <?= $memberEngine->getReferralCode() ?>
                                                                    </font>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-complete-down">
                                                <div class="col-md-12 col-sm-12 col-xs-12 box-complete-down">
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-table-complete table-responsive">
                                                            <table class="table table-payment center-block">
                                                                <tr>
                                                                    <td class="td-imgOrder" rowspan="2">
                                                                        <img src="<?php echo Router::url("/front_file/expo7/img/icon/paymentMethode.png", true) ?>">
                                                                    </td>
                                                                    <td class="td-titleContent-complete font-PoppinsSemiBold">
                                                                        Payment Methode
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="td-subTitleContent-complete font-LatoLightItalic">
                                                                        Choose your payment methode
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 col-sm-12 col-xs-12 boxOut-padding">

                                                            <div id="paymentMethode" class="col-md-12 col-sm-12 col-xs-12 tab-pane">
                                                                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentRight">

                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-contentRight payment-type">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <input class="single-check paymentmethod" type="checkbox" id="method-4" data-method="midtrans" onchange="click_checkbox($(this), $('#method-5'))"/>
                                                                                        <label class="label-inputPrimary font-PoppinsSemiBold" for="method-4">Indonesia Local Payment</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-primaryText font-LatoLightItalic">
                                                                                        <?= __("Pay with Indonesia Local Payment") ?>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <ul class="nav nav-order-logoOut">

                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-borderDot">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-borderDot"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="boxOut-toogle boxOut-toggle-1 col-md-12 col-sm-12 col-xs-12 hide-element toggle-slide">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    &nbsp;
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-md-12 col-sm-12 col-xs-12 box-contentRight payment-type">
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                        <input class="single-check paymentmethod" type="checkbox" id="method-5" data-method="paypal" onchange="click_checkbox($(this), $('#method-4'))"/>
                                                                                        <label class="label-inputPrimary font-PoppinsSemiBold" for="method-5">Paypal</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="row">
                                                                                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-primaryText font-LatoLightItalic">
                                                                                        <?= __("Pay with Paypal Express Checkout") ?>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-md-6 col-sm-6 col-xs-12">
                                                                                <ul class="nav nav-order-logoOut">
                                                                                    <li class="active">
                                                                                        <a data-toggle="tab" href="#order-5-1">
                                                                                            <img class="" src="<?php echo Router::url("/front_file/expo7/img/icon/order-5-1.png", true) ?>">
                                                                                        </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                            <div class="col-md-12 col-sm-12 col-xs-12 boxOut-borderDot">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12 box-borderDot"></div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="boxOut-toogle boxOut-toggle-1 col-md-12 col-sm-12 col-xs-12 hide-element toggle-slide">
                                                                            <div class="row">
                                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                                    &nbsp;
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
                                    <div class="col-md-12 col-sm-12 col-xs-12 center">
                                        <button type="button" class="btn button-logout next-step font-RobotoCondensed" onclick="checkoutregister()"><?= __("Continue") ?></button>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </section>

        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        //Initialize tooltips
        $('.nav-tabs > li a[title]').tooltip();

        //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);
        });
        $(".prev-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);

        });
        $(".city-state").on("change", function () {
            cityList(this, $(this).data("city-state-target"));
        });
        $(".state-country").on("change", function () {
            stateList(this, $(this).data("state-country-target"));
        });

    });

    function click_checkbox(clicked_id, unclick_id) {
        if ($(clicked_id).is(":checked")) {
            $(unclick_id).removeAttr("checked");
        }
    }

    function nextTab(elem) {
        $(elem).next().find('a[data-toggle="tab"]').click();
    }
    function prevTab(elem) {
        $(elem).prev().find('a[data-toggle="tab"]').click();
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

    function save_data(member_id) {
        var first_name = $("#firstName").val();
        var last_name = $("#lastName").val();
        var gender_id = $("#gender").val();
        var birthdate = $("#birthdate").val();
        var address = $("#address").val();
        var country_id = $("#country").val();
        var state_id = $("#BiodataStateId").val();
        var city_id = $("#BiodataCityId").val();
        var postal_code = $("#postalCode").val();
        var phone_number = $("#phoneNumber").val();
        var mobile_phone_number = $("#mobilePhoneNumber").val();
        $.ajax({
            url: BASE_URL + "/front/members/personal_info_member/",
            type: "PUT",
            dataType: "JSON",
            data: {
                Biodata: {
                    id: member_id,
                    first_name: first_name,
                    last_name: last_name,
                    gender_id: gender_id,
                    tanggal_lahir: birthdate,
                    address: address,
                    country_id: country_id,
                    city_id: city_id,
                    state_id: state_id,
                    postal_code: postal_code,
                    handphone: mobile_phone_number,
                    phone: phone_number
                },
            },
            success: function (response) {
                console.log(response);
                if(response.status == 202) {
                    <!--if success-->
                    var $active = $('.wizard .nav-tabs li.active');
                    $active.next().removeClass('disabled');
                    nextTab($active);
                }else{
                    $.growl.warning({
                        title: "Warning",
                        message: response.message
                    });
                }
            }
        });
        
    }
</script>
<script>
    $(document).ready(function () {

        var $jasa = $('input.select');
        $jasa.click(function () {
            $jasa.filter(':checked').not(this).removeAttr('checked');
        });

//                $('.boxOut-content-button').find('.button-select').on('click', function (e) {
//                    $(this).parents('.box-content-step').find('.box-step2-1').hide();
//                    $(this).parents('.box-content-step').find('.button-step2-1').hide();
//                    $(this).parents('.box-content-step').find('.box-step2-2').show();
//                    $(this).parents('.box-content-step').find('.button-step2-2').show();
//                });
//
//                $('.boxOut-content-button').find('.button-verify').on('click', function (e) {
//                    $(this).parents('.box-content-step').find('.box-step2-2').hide();
//                    $(this).parents('.box-content-step').find('.button-step2-2').hide();
//                    $(this).parents('.box-content-step').find('.box-step2-3').show();
//                    $(this).parents('.box-content-step').find('.button-step2-3').show();
//                });



    });
</script>
<script>
    jQuery(function ($) {
        $('.cc-exp').payment('formatCardExpiry');



        $('form').submit(function (e) {
            e.preventDefault();

            var cardType = $.payment.cardType($('.cc-number').val());
            $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));

        });

    });
</script>
<script>
    function checkoutregister() {
        var method = $(".paymentmethod:checked").data("method");
        switch (method) {
            case "paypal":
                window.location.href = BASE_URL + "checkout?method=paypalexpress&rc=<?= $memberEngine->getReferralCode() ?>";
                break;
            case "midtrans":
                window.location.href = BASE_URL + "checkout?method=midtrans&rc=<?= $memberEngine->getReferralCode() ?>";
                break;
        }
    }
</script>