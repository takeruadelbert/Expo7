<?php

/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
Router::connect('/', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

//=======================================================================================================
//front end
//pqp
Router::connect('/index', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'index'));
Router::connect('/about-us', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'aboutus'));
Router::connect('/events', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'events'));
Router::connect('/news', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'news'));
Router::connect('/event/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_event'), ["pass" => [ "id", "judul"]]);
Router::connect('/news/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_news'), ["pass" => [ "id", "judul"]]);
Router::connect('/contact', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'contact_us'));
Router::connect('/gallery_photo_video', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'gallery'));
Router::connect('/about', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'about_us'));
Router::connect('/how-to', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'how_to'));
Router::connect('/instruction', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'instruction'));
Router::connect('/payment-guide', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'payment_guide'));
Router::connect('/term-condition', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'term_and_condition'));
Router::connect('/privacy-policy', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'privacy_policy'));
Router::connect('/game', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'game'));
Router::connect('/game/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'detail_game'), ["pass" => [ "id", "judul"]]);
Router::connect('/play-game/:id/:judul', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'play_game'), ["pass" => [ "id", "judul"]]);
Router::connect('/prohibited-play-game', array('front' => true, 'controller' => 'fronts', 'action' => 'play_now'));

//expo7
Router::connect('/member/activation', array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'activation'));
Router::connect("/login", array('front' => true, 'controller' => "fronts", 'action' => "display", 'ID', 'login'));
Router::connect("/forget-password", array('front' => true, 'controller' => "fronts", 'action' => "display", 'ID', 'forget_password'));
Router::connect("/our-testimonies", array('front' => true, 'controller' => "fronts", 'action' => "display", 'ID', 'our_testimonies'));
Router::connect("/front-reset-password/:token", array("front" => true, 'controller' => "fronts", 'action' => 'display', "ID", 'reset_password'), ['pass' => ['token']]);

//redirectlink
Router::connect('/checkout', array('controller' => 'fronts', 'action' => 'checkout'));
Router::connect('/checkoutfinish', array('controller' => 'fronts', 'action' => 'checkoutfinish'));

//member-area
Router::connect('/member', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_dashboard'));
Router::connect('/member/dashboard', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_dashboard'));
Router::connect('/member/payment', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_payment'));
Router::connect('/member/downline/genealogytree', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_genealogytree'));
Router::connect('/member/downline/genealogylist', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_genealogylist'));
Router::connect('/member/ewallet/withdraw', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_ewallet_withdraw'));
Router::connect('/member/ewallet/history', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_ewallet_history'));
Router::connect('/profil', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'profil'));
Router::connect('/member/logout', array('controller' => 'accounts', 'action' => 'logout_member'));
Router::connect('/member/testimonial', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_testimonial'));
Router::connect('/member/knowledge_base', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_knowledge_base'));
Router::connect('/member/edit_profile', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_edit_profile'));
Router::connect('/member/upload-game', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_upload_game'));

// Member Area - Ticketing System
Router::connect('/member/ticket', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_new_ticket'));
Router::connect('/member/ticket/all', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_all_ticket'));
Router::connect('/member/ticket/open', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_all_ticket_open'));
Router::connect('/member/ticket/in-progress', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_all_ticket_in_progress'));
Router::connect('/member/ticket/solved', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_all_ticket_solved'));

// Member Area - Message
Router::connect('/member/message', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_new_message'));
Router::connect('/member/message/inbox', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_inbox_message'));
Router::connect('/member/message/sent', array('member' => true, 'prefix' => 'front', 'controller' => 'fronts', 'action' => 'display', 'ID', 'member_sent_message'));

Router::connect("/snap/payment", array('front' => true, 'controller' => 'fronts', 'action' => 'display', 'ID', 'snap_payment'));
Router::connect("/snap/finish", array('controller' => 'fronts', 'action' => 'snap_payment_finish'));

//Router::connect('/:lang/:page', array('front' => true, 'controller' => 'fronts', 'action' => 'display'), array("pass" => array('lang', 'page'), "lang" => "[A-Z]{2}"));
//=======================================================================================================
//admin area
Router::connect('/admin/change-password', array('admin' => true, 'controller' => 'accounts', 'action' => 'change_password'));
Router::connect('/admin', array('controller' => 'accounts', 'action' => 'login_admin'));
Router::connect('/admin/lupa-password', array('controller' => 'accounts', 'action' => 'login_utama_lupa_password'));
Router::connect('/admin/dashboard', array('admin' => true, 'controller' => 'accounts', 'action' => 'dashboard'));
Router::connect('/admin/logout', array('controller' => 'accounts', 'action' => 'logout_admin'));
Router::connect("/admin/how-to", array('admin' => true, 'controller' => 'how_tos', 'action' => 'how_to'));

Router::connect('/reset-password/*', array('controller' => 'accounts', 'action' => 'reset_password'));
//index
Router::connect('/module/*', array('admin' => true, 'controller' => 'modules', 'action' => 'index'));
Router::connect('/module-content/*', array('admin' => true, 'controller' => 'module_contents', 'action' => 'index'));
Router::connect('/account/*', array('admin' => true, 'controller' => 'accounts', 'action' => 'index'));

//add
Router::connect('/module-add', array('admin' => true, 'controller' => 'modules', 'action' => 'add'));
Router::connect('/module-content-add', array('admin' => true, 'controller' => 'module_contents', 'action' => 'add'));
Router::connect('/account-add', array('admin' => true, 'controller' => 'accounts', 'action' => 'add'));

//edit
Router::connect('/module-edit/*', array('admin' => true, 'controller' => 'modules', 'action' => 'edit'));
Router::connect('/module-content-edit/*', array('admin' => true, 'controller' => 'module_contents', 'action' => 'edit'));
Router::connect('/account-edit/*', array('admin' => true, 'controller' => 'accounts', 'action' => 'edit'));

//Report

Router::connect("/admin/restriction", array("admin" => true, "controller" => "accounts", "action" => "restriction"));

//Setting
Router::connect('/setting', array('admin' => true, 'controller' => 'company_profiles', 'action' => 'edit', '1'));

// API
Router::connect("/api/login",["api"=>true,"controller"=>"accounts","action"=>"login"]);
Router::connect("/api/heal",["api"=>true,"controller"=>"accounts","action"=>"heal"]);
Router::connect("/api/statuscode",["api"=>true,"controller"=>"accounts","action"=>"status_code"]);
Router::connect("/api/restriction",["api"=>true,"controller"=>"accounts","action"=>"restriction"]);
Router::connect("/api/scoreboard",["api" => true, "controller" => "games", "action" => "data_scoreboard"]);
Router::connect("/api/games", ['api' => true, 'controller' => "games", 'action' => "list_game"]);

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
require CAKE . 'Config' . DS . 'routes.php';
