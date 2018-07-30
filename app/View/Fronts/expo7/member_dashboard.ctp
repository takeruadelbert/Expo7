<?php
$directDownlines = $memberEngine->getDirectDownline();
$countDirectDownline = count($directDownlines);
?>
<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-content">
        <div class="col-md-12 col-sm-12 col-xs-12 box-content">
            <div class="col-md-5 col-sm-12 col-xs-12 boxOut-contentLeft">
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentLeft-top">
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 title-moneyEarned font-RobotoCondensed-Light">
                                <?= __("Total") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="circle-earn center-block font-Exo2SemiBold">
                                    <font class="font-dollar">$</font>&nbsp;
                                    <?= $memberEngine->getMoneyTotal(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-batas"></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 title-moneyEarned font-RobotoCondensed-Light">
                                <?= __("Money Earned") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="circle-earn center-block font-Exo2SemiBold">
                                    <font class="font-dollar">$</font>&nbsp;
                                    <?= $memberEngine->getMoneyEarned(); ?>
                                </div>
                            </div>
                        </div>
                        <div class="border-batas"></div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 title-moneyEarned font-RobotoCondensed-Light">
                                <?= __("Money Due") ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="circle-earn center-block font-Exo2SemiBold">
                                    <font class="font-dollar">$</font>&nbsp;
                                    <?= $memberEngine->getMoneyDue(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12 boxOut-contentLeft-bottom table-responsive mCustomScrollbar" data-mcs-theme="dark-3">
                    <table class="table edit-tableMail col-md-12 col-sm-12 col-xs-12 font-RobotoCondensed-Light">
                        <tr class="tableTr-1">
                            <td class="icon-1 center">
                                <img class="td-mail" src="<?php echo Router::url("/front_file/expo7/img/icon/mail-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                        <tr class="tableTr-2">
                            <td class="icon-2 center">
                                <img class="td-mail" src="<?php echo Router::url("/front_file/expo7/img/icon/mail-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                        <tr class="tableTr-1">
                            <td class="icon-1 center">
                                <img class="td-mail" src="<?php echo Router::url("/front_file/expo7/img/icon/mail-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                        <tr class="tableTr-2">
                            <td class="icon-2 center">
                                <img class="td-ticket" src="<?php echo Router::url("/front_file/expo7/img/icon/ticket-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                        <tr class="tableTr-1">
                            <td class="icon-1 center">
                                <img class="td-ticket" src="<?php echo Router::url("/front_file/expo7/img/icon/ticket-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                        <tr class="tableTr-2">
                            <td class="icon-2 center">
                                <img class="td-ticket" src="<?php echo Router::url("/front_file/expo7/img/icon/ticket-icon.png", true) ?>">
                            </td>
                            <td class="table-title">
                                <a href="#">
                                    Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque...
                                </a>
                            </td>
                            <td class="close-td">
                                <button type="button" class="btn button-closed center-block" style="background-image: url('<?php echo Router::url("/front_file/expo7/img/icon/close-icon.png", true) ?>');"></button>
                            </td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 boxOut-contentRight mCustomScrollbar" data-mcs-theme="dark-3">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 title-Accumulated font-RobotoCondensed-Light">
                                    <?= __("Accumulated Downline") ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 table-responsive boxOut-table-people">
                                    <table class="table table-people col-md-12 col-sm-12 col-xs-12 font-Exo2SemiBold">
                                        <tr class="grey-tableTr font-Exo2SemiBold">
                                            <td class="minimum-td countNumber" rowspan="2"><?= $memberEngine->getDownline() ?></td>
                                            <td class="title-people" colspan="2"><?= __("People") ?></td>
                                        </tr>
                                        <tr>
                                            <td class="minimum-td title-level"><?= __("Level") ?> <?= romanic_number($memberEngine->getLevel()) ?></td>
                                            <td class="">
                                                <img class="medal-level" src="<?php echo Router::url("/{$this->Session->read('credential.member.Member.Title.reward_path')}", true) ?>" title="<?= $memberEngine->getTitle() ?>">
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12 boxOut-rightBottom">
                        <div class="col-md-6 col-sm-12 col-xs-12 boxOut-rightBottom-left table-responsive">
                            <table class="table table-progress col-md-12 col-sm-12 col-xs-12">
                                <?php
                                foreach ($directDownlines as $i => $downline) {
                                    if ($i == 4)
                                        break;
                                    ?>
                                    <tr class="tr-padding">
                                        <td class="minimum-td">
                                            <div class="circle-member">
                                                <img class="" src="<?php echo Router::url($downline["Account"]["User"]["profile_picture"], true) ?>">
                                                <div class="circle-number font-RobotoCondensed-Bold">
                                                    <?= $i + 1 ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="boxOut-title-name">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-name font-RobotoCondensed-Bold">
                                                <?= $downline["Account"]["Biodata"]["full_name"] ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-name font-RobotoCondensed-Light">
                                                <?= __("Level") ?> <?= romanic_number($downline["Rank"]["level"]) ?><br> <?= __("Total Downline") ?> : <?= $downline["Member"]["downline"] ?>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div id="bar-<?= $i + 1 ?>"></div>
                                        </td>
                                        <td class="minimum-td">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-peoplePercent font-RobotoCondensed-Bold">
                                                <?= $downline["Member"]["downline"] ?> / <?= $memberEngine->getNextTitleTotalDownline($downline["Member"]["downline"]) ?> <?= __("People") ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-peoplePercent font-RobotoCondensed-Light">
                                                <?= number_format($downline["Member"]["downline"] / $memberEngine->getNextTitleTotalDownline($downline["Member"]["downline"]) * 100, 1) ?> %
                                            </div>
                                        </td>
                                        <td class="minimum-td">
                                            <img class="member-medal-level" src="<?php echo Router::url("/{$downline['Title']['reward_path']}", true) ?>" title=" Level <?= $downline["Title"]["name"] ?>">
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                for ($i = 0; $i < (4 - $countDirectDownline); $i++) {
                                    ?>
                                    <tr class="tr-padding">
                                        <td class="minimum-td">
                                            <div class="circle-member">
                                                <img class="" src="<?php echo Router::url("/front_file/expo7/img/icon/member.png", true) ?>">
                                                <div class="circle-number font-RobotoCondensed-Bold">
                                                    <?= $i + 1 + $countDirectDownline ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="boxOut-title-name">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-name font-RobotoCondensed-Bold">
                                                <?= __("Available") ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-name font-RobotoCondensed-Light">
                                                <?= __("Invite your friend to join.") ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 boxOut-rightBottom-right table-responsive">
                            <table class="table table-progress col-md-12 col-sm-12 col-xs-12">
                                <?php
                                foreach ($directDownlines as $i => $downline) {
                                    if ($i < 4)
                                        continue;
                                    ?>
                                    <tr class="tr-padding">
                                        <td class="minimum-td">
                                            <div class="circle-member">
                                                <img class="" src="<?php echo Router::url($downline["Account"]["User"]["profile_picture"], true) ?>">
                                                <div class="circle-number font-RobotoCondensed-Bold">
                                                    <?= $i + 1 ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="boxOut-title-name">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-name font-RobotoCondensed-Bold">
                                                <?= $downline["Account"]["Biodata"]["full_name"] ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-name font-RobotoCondensed-Light">
                                                <?= __("Level") ?> <?= romanic_number($downline["Rank"]["level"]) ?><br><?= __("Total Downline") ?> : <?= $downline["Member"]["downline"] ?>
                                            </div>
                                        </td>
                                        <td class="">
                                            <div id="bar-<?= $i + 1 ?>"></div>
                                        </td>
                                        <td class="minimum-td">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-peoplePercent font-RobotoCondensed-Bold">
                                                <?= $downline["Member"]["downline"] ?> / <?= $memberEngine->getNextTitleTotalDownline($downline["Member"]["downline"]) ?> <?= __("People") ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-peoplePercent font-RobotoCondensed-Light">
                                                <?= number_format($downline["Member"]["downline"] / $memberEngine->getNextTitleTotalDownline($downline["Member"]["downline"]) * 100, 1) ?> %
                                            </div>
                                        </td>
                                        <td class="minimum-td">
                                            <img class="member-medal-level" src="<?php echo Router::url("/front_file/expo7/img/icon/reward-{$downline["Title"]["name"]}.png", true) ?>" title="<?= $downline["Title"]["name"] ?>">
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <?php
                                $rightMember = (($countDirectDownline - 4) < 0 ? 0 : ($countDirectDownline - 4));
                                for ($i = 0; $i < (7 - 4 - $rightMember); $i++) {
                                    ?>
                                    <tr class="tr-padding">
                                        <td class="minimum-td">
                                            <div class="circle-member">
                                                <img class="" src="<?php echo Router::url("/front_file/expo7/img/icon/member.png", true) ?>">
                                                <div class="circle-number font-RobotoCondensed-Bold">
                                                    <?= $i + 5 + $rightMember ?>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="boxOut-title-name">
                                            <div class="col-md-12 col-sm-12 col-xs-12 title-name font-RobotoCondensed-Bold">
                                                <?= __("Available") ?>
                                            </div>
                                            <div class="col-md-12 col-sm-12 col-xs-12 subTitle-name font-RobotoCondensed-Light">
                                                <?= __("Invite your friend to join you.") ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-5 col-sm-12 col-xs-12 hidden-xs hidden-sm">

            </div>
            <div class="col-md-7 col-sm-12 col-xs-12 boxOut-referral">
                <div class="col-md-7 col-sm-7 col-xs-12">
                    <div class="col-md-3 col-sm-3 col-xs-12 boxOut-titleReferral font-RobotoCondensed">
                        <?= __("Your referral link") ?>:
                    </div>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="input-group edit-input-group">
                            <input type="text" class="form-control input-fieldKomfirmasi font-PoppinsSemiBold" id="copyreferrallink" value="<?= Router::url("/register?ref=" . $memberEngine->getReferralCode(), true) ?>" disabled/>
                            <div class="input-group-btn">
                                <button type="button" class="btn button-play font-RobotoCondensed-Bold"  onclick="copyToClipboard($('#copyreferrallink').val());"><?= __("Copy") ?></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-sm-5 col-xs-12 boxOut-code">
                    <div class="col-md-5 col-sm-5 col-xs-12 boxOut-titleReferral font-RobotoCondensed">
                        <?= __("Your referral code") ?> :
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                        <div class="input-group edit-input-group">
                            <input type="text" class="form-control input-fieldKomfirmasi font-PoppinsSemiBold" id="copyreferralcode" value="<?= $memberEngine->getReferralCode() ?>" disabled/>
                            <div class="input-group-btn">
                                <button type="button" class="btn button-play font-RobotoCondensed-Bold" onclick="copyToClipboard($('#copyreferralcode').val());"><?= __("Copy") ?></button>
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
//        var pieData = [
//            {
//                value: 95,
//                color: "#1A64B8"
//            },
//            {
//                value: 100 - 95,
//                color: "#97DAF8"
//            }
//        ];

        //var myPie = new Chart(document.getElementById("canvas").getContext("2d")).Doughnut(pieData, {percentageInnerCutout: 80});
<?php
foreach ($directDownlines as $i => $downline) {
    ?>
            bar<?= $i + 1 ?> = $('#bar-<?= $i + 1 ?>').progressbarManager({
                totalValue: 7,
                animate: true,
                stripe: true
            });

            bar<?= $i + 1 ?>.setValue(<?= $downline["direct_downline"] ?>);
    <?php
}
?>

    });
</script>