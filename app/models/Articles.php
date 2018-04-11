<?php

class Articles extends Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function showAllArticles(){
        $query= $this->prepare("SELECT id, heading, imageName, shortArticle, date, source FROM articles LIMIT 10");
	$query->execute();
	return $this->fullArticle = $query->fetchALL(PDO::FETCH_ASSOC);
    }

}

