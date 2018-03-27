<?php

//Контроллер
class Entry extends Controller {
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        
    }
    public function indexAction() {
        $data = new AddNewEntry();
        $this->view->setData($data->entryTooday());
        $this->view->render('entry/index');
    }
    
    public function addNewItemAction($params) {
        $result = explode(':', $params);
        $this->view->setData(AddNewEntry::checkDate($result));
        $this->view->render('addnewitem/index');
    }
}

