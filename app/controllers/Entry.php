<?php

//Контроллер
class Entry extends Controller {
    protected $data;
            
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->data = new AddNewEntry ();
    }
    public function indexAction() {
        $this->view->setData($this->data->entryDay($result = ['day' => date('j'), 'month' => date('n'), 'year' => date('Y')]));
        $this->view->render('entry/index');
    }
    
    public function addNewItemAction($params) {
        $result = explode(':', $params);
        $this->view->setData($this->data->entryDay($date = ['day' => $result[0],'month'=>$result[1],'year'=>$result[2]]));
        $this->view->render('addnewitem/index');
    }
}

