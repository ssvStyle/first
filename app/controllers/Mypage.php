<?php

//use Articles;

class Mypage extends Controller{
    protected $Article;
            
    function __construct($controller, $action) {
        parent::__construct($controller, $action);
        $this->Article = new Articles();
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
                $this->view->setData($this->Article->addArticle($_POST));
                $this->view->render('addarticle/index');
            } else if (isset($_POST['changeAticles'])) {
                //var_dump($_POST);
                $this->view->setData($_POST);
                $this->view->render('addarticle/index');
            } else if (isset($_POST['SaveChanges'])){
                $this->view->setData($this->Article->updateArticle($_POST));
                $this->view->render('addarticle/index');
            } else {
                $this->view->render('addarticle/index');
            }
        }
    }
    
    public function editarticleAction() {
        if (isset($_SESSION['user_id']) && $_SESSION['phone'] === '0679070779'){
                if (isset($_POST['delArticle']) && is_numeric($_POST['delArticle'])) {
                    $this->view->setData($this->Article->deleteArticles($_POST['delArticle']));
                    $this->view->render('editarticle/index');
                } else {
                    $this->view->setData($this->Article->showAllFullArticles());
                    $this->view->render('editarticle/index');
                }
            //}
                
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