<?php
/**
 * Application level View Helper
 *
 * This file is application-wide helper file. You can put all
 * application-wide helper-related methods here.
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
 * @package       app.View.Helper
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('Helper', 'View');

/**
 * Application helper
 *
 * Add your application-wide methods in the class below, your helpers
 * will inherit them.
 *
 * @package       app.View.Helper
 */
class Expo7Helper extends HtmlHelper {

    function pagination($paginationInfo = false, $query = [], $url = "#", $totalButton = 5) {
        if ($paginationInfo !== false) {
            $symmetryCount = floor($totalButton / 2);
            $totalButtonBefore = $paginationInfo["currentPage"] - 1;
            $totalButtonAfter = $paginationInfo["totalPage"] - $paginationInfo["currentPage"];
            $countButtonBefore = $totalButtonBefore > $symmetryCount ? $symmetryCount : $totalButtonBefore;
            $countButtonAfter = $totalButtonAfter > $symmetryCount ? $symmetryCount : $totalButtonAfter;
            if ($countButtonBefore <= 0 && $countButtonAfter <= 0) {
                $buttonBefore = 0;
                $buttonAfter = 0;
            } else {
                $buttonBefore = $countButtonBefore + ($symmetryCount - $countButtonAfter);
                $buttonAfter = $countButtonAfter + ($symmetryCount - $countButtonBefore);
            }
            ?>
            <?php
            if ($paginationInfo["currentPage"] != 1) {
                $query["page"] = $paginationInfo["currentPage"] - 1;
                ?>
                <span>
                    <a href="<?= $url . "?" . http_build_query($query) ?>">
                        <
                    </a>
                </span>
                <?php
            }
            for ($n = $buttonBefore; $n >= 1; $n--) {
                $m = $paginationInfo["currentPage"] - $n;
                if ($m < 1) {
                    continue;
                }
                $query["page"] = $m;
                ?>
                <span>
                    <a href="<?= $url . "?" . http_build_query($query) ?>">
                        <?= $m ?>
                    </a>
                </span>        
                <?php
            }
            ?>
            <span>
                <a href="#" class="active">
                    <?= $m = $paginationInfo["currentPage"] ?>
                </a>
            </span>
            <?php
            for ($n = 1; $n <= $buttonAfter; $n++) {
                $m = $paginationInfo["currentPage"] + $n;
                if ($m > $paginationInfo["totalPage"]) {
                    continue;
                }
                $query["page"] = $m;
                ?>
                <span>
                    <a href="<?= $url . "?" . http_build_query($query) ?>">
                        <?= $m ?>
                    </a>
                </span>        
                <?php
            }
            if ($paginationInfo["currentPage"] != $paginationInfo["totalPage"] && $paginationInfo['totalItem'] > 0) {
                $query["page"] = $paginationInfo["currentPage"] + 1;
                ?>
                <span>
                    <a href="<?= $url . "?" . http_build_query($query) ?>">
                        >
                    </a>
                </span>
                <?php
            }
        }
    }
    
    function is_either_morning_noon_or_evening() {
        $current_hour = date("H");
        $day = "";
        if( ($current_hour >= 0 && $current_hour <= 4) || ($current_hour >= 19 && $current_hour <= 23) ) {
            $day = "Malam";
        } else if($current_hour >= 5 && $current_hour <= 10) {
            $day = "Pagi";
        } else if($current_hour >= 11 && $current_hour <= 14) {
            $day = "Siang";
        } else if($current_hour >= 15 && $current_hour <= 18) {
            $day = "Sore";
        }
        return strtoupper($day);
    }
}
