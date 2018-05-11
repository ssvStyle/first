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
    
    public function setDateAction($params) {
        $this->view->setData($this->AddNewEntry->entryDay($params));
        $this->view->render('setdate/index');
    }
    
    public function addEntryAction() {
            $result = $this->AddNewEntry->addEntry($_POST);
                if ($result["Entry"] == "Запись добавленна"){
                    //$this->SendEmail->addAddress($result[0]['email']);
                    //$this->SendEmail->Subject = $result[0]['name'].' ваша запись добавленна'; // Заголовок письма
                    $text = '<h4> '.$result[0]['name'].'</h4><b>вы записаны на:</b>  '.$result[0]['day'].' '. $result[0]['month'].' '.$result[0]['year'].'<br>
                    <b>Время:</b> '.$result[0]['hour'].'<br>
                    <b>Услуга:</b> '.$result[0]['service'].'<br>
                    <b>Доп. Услуга:</b> '.$result[0]['serviceAdd'].'<br>
                    <br><br><br>Спасибо за заявку. Ожидайте звонка.<br><p>Удалить запись можно в Личном кабинете</a></p><hr>';
                    SendMail::send($result[0]['email'], $result[0]['name'].' ваша запись добавленна', $text);
                    //$this->SendEmail->Body =  $text;
                    //$this->SendEmail->send();
                }
            $this->view->setData($result);
            $this->view->render('addentry/index');
    }
}

