<?php

/**
 * This file is loaded automatically by the app/webroot/index.php file after core.php
 *
 * This file should load/create any application wide configuration settings, such as
 * Caching, Logging, loading additional configuration files.
 *
 * You should also use this file to include any files that provide global functions/constants
 * that your application uses.
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
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
// Setup a 'default' cache configuration for use in the application.
Cache::config('default', array('engine' => 'File'));

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 *
 * App::build(array(
 *     'Model'                     => array('/path/to/models/', '/next/path/to/models/'),
 *     'Model/Behavior'            => array('/path/to/behaviors/', '/next/path/to/behaviors/'),
 *     'Model/Datasource'          => array('/path/to/datasources/', '/next/path/to/datasources/'),
 *     'Model/Datasource/Database' => array('/path/to/databases/', '/next/path/to/database/'),
 *     'Model/Datasource/Session'  => array('/path/to/sessions/', '/next/path/to/sessions/'),
 *     'Controller'                => array('/path/to/controllers/', '/next/path/to/controllers/'),
 *     'Controller/Component'      => array('/path/to/components/', '/next/path/to/components/'),
 *     'Controller/Component/Auth' => array('/path/to/auths/', '/next/path/to/auths/'),
 *     'Controller/Component/Acl'  => array('/path/to/acls/', '/next/path/to/acls/'),
 *     'View'                      => array('/path/to/views/', '/next/path/to/views/'),
 *     'View/Helper'               => array('/path/to/helpers/', '/next/path/to/helpers/'),
 *     'Console'                   => array('/path/to/consoles/', '/next/path/to/consoles/'),
 *     'Console/Command'           => array('/path/to/commands/', '/next/path/to/commands/'),
 *     'Console/Command/Task'      => array('/path/to/tasks/', '/next/path/to/tasks/'),
 *     'Lib'                       => array('/path/to/libs/', '/next/path/to/libs/'),
 *     'Locale'                    => array('/path/to/locales/', '/next/path/to/locales/'),
 *     'Vendor'                    => array('/path/to/vendors/', '/next/path/to/vendors/'),
 *     'Plugin'                    => array('/path/to/plugins/', '/next/path/to/plugins/'),
 * ));
 *
 */
/**
 * Custom Inflector rules can be set to correctly pluralize or singularize table, model, controller names or whatever other
 * string is passed to the inflection functions
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
/**
 * Plugins need to be loaded manually, you can either load them one by one or all of them in a single call
 * Uncomment one of the lines below, as you need. Make sure you read the documentation on CakePlugin to use more
 * advanced ways of loading plugins
 *
 * CakePlugin::loadAll(); // Loads all plugins at once
 * CakePlugin::load('DebugKit'); //Loads a single plugin named DebugKit
 *
 */
CakePlugin::load('DebugKit');
CakePlugin::load('Paypal');
/**
 * You can attach event listeners to the request lifecycle as Dispatcher Filter. By default CakePHP bundles two filters:
 *
 * - AssetDispatcher filter will serve your asset files (css, images, js, etc) from your themes and plugins
 * - CacheDispatcher filter will read the Cache.check configure variable and try to serve cached content generated from controllers
 *
 * Feel free to remove or add filters as you see fit for your application. A few examples:
 *
 * Configure::write('Dispatcher.filters', array(
 * 		'MyCacheFilter', //  will use MyCacheFilter class from the Routing/Filter package in your app.
 * 		'MyCacheFilter' => array('prefix' => 'my_cache_'), //  will use MyCacheFilter class from the Routing/Filter package in your app with settings array.
 * 		'MyPlugin.MyFilter', // will use MyFilter class from the Routing/Filter package in MyPlugin plugin.
 * 		array('callable' => $aFunction, 'on' => 'before', 'priority' => 9), // A valid PHP callback type to be called on beforeDispatch
 * 		array('callable' => $anotherMethod, 'on' => 'after'), // A valid PHP callback type to be called on afterDispatch
 *
 * ));
 */
Configure::write('Dispatcher.filters', array(
    'AssetDispatcher',
    'CacheDispatcher'
));
Configure::write('Config.language', 'eng');
//Global Variable
define("_TEMPLATE_DIR", "template");
define("_FRONT_TEMPLATE_DIR", "front_template");
define("_EMPTY_IMAGE", "/img/no_image.jpg");

define("_APP_VERSION", "1.0.0");
define("_APP_NAME", "Expo 7");
define("_APP_REFERENCE_NAME", "Expo 7");
define("_APP_KEY", "rsD3eZk2DerCM6CoWmUen5xAD6ilXCF9pN5Ysu0CLDcK38hkv9cNjI3Rjzp3nqBfwHMcS3vOMSvJOfssMN1JXHGw9mVDceWEQqoWU31EgBMs3HI0tkDUwILY7DHY5DyF7juNSlCb0AC1ZZBbWbMcjwUcTQWzzTctCAAlwaN71AkW4KEI4PfufuqMr2omu4YBtRS86lm6fKRH497pP6PJzrqqxSsGsSVX5A07MATx9c8w0AxaqjIzLqkp1J9rsvQ");
define("_APP_CORPORATE", "Westwood, Inc.");
define("_APP_START", "2017");
define("_COPYRIGHT_YEAR", date("Y"));

define("_DEVELOPER_NAME", "PT Ilugroup Multimedia");
define("_DEVELOPER_WEBSITE", "http://www.ilugroup.com/");

define("_PRIVATE_DIR", "Asset");

define("_DOWNLINE_SLOT", 7);
define("_WESTWOOD_ACCOUNT_ID", 3);

define("_MIDTRANS_CLIENT_KEY", "VT-client-HF5a6TWhBYRtAxaQ");
define("_MIDTRANS_SERVER_KEY", "VT-server-p-oLx8k1X3tIqe_0xghjaeoJ");

define("_RECAPTCHA_SITE_KEY", "6LfsBTwUAAAAAP87tblC7bjPOg2f3C31HihWkDfn");

// BCA API
define("_BCA_API_KEY", "2c111319-ac8a-4253-89b2-6ae8a94638d9");
define("_BCA_API_SECRET", "64f761a3-3cfb-4830-9bb4-da451c3fa2b4");
define("_BCA_CLIENT_ID", "301fabe1-74b4-4e41-8257-8d3d4fb3fd87");
define("_BCA_CLIENT_SECRET", "cc96a8d1-87d9-4f7e-bf17-e84255984c56");
define("_BCA_CORPORATE_ID", "BCAAPI2016");
define("_BCA_ACCOUNT_NO", "0201245680");

//0=production
//1=development
define("_DEVELOPMENT_STATUS",1);

define("_TEMP_MAIL_RECIPIENT", "suryawono@gmail.com");
/**
 * Configures default file logging options
 */
App::uses('CakeLog', 'Log');
CakeLog::config('debug', array(
    'engine' => 'File',
    'types' => array('notice', 'info', 'debug'),
    'file' => 'debug',
));
CakeLog::config('error', array(
    'engine' => 'File',
    'types' => array('warning', 'error', 'critical', 'alert', 'emergency'),
    'file' => 'error',
));
