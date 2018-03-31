<?php

//Контроллер
class Entry extends Controller {
    protected $AddNewEntry;
            
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->AddNewEntry = new AddNewEntry ();
    }
    public function indexAction() {
        $this->view->setData($this->AddNewEntry->entryDay());
        $this->view->render('entry/index');
    }
    
    public function setTimeAction($params) {
        $this->view->setData($this->AddNewEntry->entryDay($params));
        $this->view->render('settime/index');
    }
    
    public function addEntryAction() {
        $result = $this->AddNewEntry->addEntry($_POST);
        $this->view->setData($result);
        $this->view->render('addentry/index');
    }
}

