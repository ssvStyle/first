<?php

class View {
    protected $head, $body, $siteTitle = SITE_TITLE, $outputBuffer, $layout = DEFAULT_LAYOUT, $data;
    
    public function setData($data) {
        $this->data = $data;
    }
    
    public function render($viewName) {
        $viewAry = explode('/', $viewName);
        $viewString = implode('/', $viewAry);
        if (file_exists(ROOT . '/app/views/' . $viewString . '.php')) {
            include ROOT . '/app/views/' . $viewString . '.php';
            include ROOT . '/app/views/layouts/' . $this->layout . '.php';
        } else {
            //require_once (ROOT . '/app/views/errorpage/index.php');
            die('The view\"' . $viewName . '\" does not exist.');
        }
    }
    
    public function content($type) {
        if ($type == 'head') {
            return $this->head;
        } elseif ($type == 'body') {
            return $this->body;
        }
        return FALSE;
    }
    
    public function start($type) {
        $this->outputBuffer = $type;
        ob_start();
        
    }
    
    public function end() {
        if ($this->outputBuffer == 'head') {
            $this->head = ob_get_clean();
        } elseif($this->outputBuffer == 'body'){
            $this->body = ob_get_clean();
        } else {
            die('You must first run the start method.');
        }
    }
    
    public function siteTitle() {
        return $this->siteTitle;
    }
    
    public function setSiteTitle($title) {
        $this->siteTitle = $title;
    }
    
    public function setLayout($path) {
        $this->layout = $path;
    }
}