<?php

class Mypage extends Controller{
    
    
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
    }
    
    public function indexAction() {
        if (isset($_SESSION['user_id']) && $_SESSION['phone'] === '0679070779'){
                $this->view->setData($this->EntryModel->showAllEntry());
                $this->view->render('admin/index');
            } elseif (isset($_SESSION['user_id'])) {
                $this->view->setData($this->EntryModel->showUserEnry());
                $this->view->render('clientPage/index');
            } else {
                header ('Location: '.PROOT.'home');
            }
    
    }
    
    public function addarticleAction() {
        if (isset($_SESSION['user_id']) && $_SESSION['phone'] === '0679070779'){
            if (isset($_POST['addArticle'])) {
                $article = new Articles();
                $this->view->setData($article->addArticle($_POST));
            }
                $this->view->render('addarticle/index');
            } else {
                header ('Location: '.PROOT.'home');
            }
    }
    
    public function editarticleAction() {
        if (isset($_SESSION['user_id']) && $_SESSION['phone'] === '0679070779'){
            //if (isset($_POST['editArticle'])) {
                $article = new Articles();
                $this->view->setData($article->showAllFullArticles());
            //}
                $this->view->render('editarticle/index');
            //} else {
                //header ('Location: '.PROOT.'home');
            }
    }
    
    public function deleteAction() {
        if($_POST['deleteById']){
            $result = $this->EntryModel->deleteEntry($_POST['deleteById']);
            $this->view->setData($result);
            $this->view->render('deleteentry/index');
        } else {
                header ('Location: '.PROOT.'home');
        }
    }
}