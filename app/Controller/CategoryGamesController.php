<?php

App::uses('AppController', 'Controller');

class CategoryGamesController extends AppController {

    var $name = "CategoryGames";
    var $disabledAction = array(
    );

    function beforeFilter() {
        parent::beforeFilter();
        $this->_setPageInfo("admin_index", "");
        $this->_setPageInfo("admin_add", "");
        $this->_setPageInfo("admin_edit", "");
    }
}
