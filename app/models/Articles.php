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
    public function showAllFullArticles(){
        $query= $this->prepare("SELECT id, heading, imageName, fullArticle, date, source FROM articles");
	$query->execute();
	return $this->fullArticle = $query->fetchALL(PDO::FETCH_ASSOC);
    }
    public function getFullArticle($id) {
        $query= $this->prepare("SELECT id, heading, fullArticle, date, source FROM articles  WHERE id = $id LIMIT 1");
	$query->execute();
	return $query->fetchALL(PDO::FETCH_ASSOC);
    }
    public function addArticle($array = false) {
        $shortArticle = strip_tags(mb_substr($array['fullArticle'], 0, 200, 'UTF-8'));
        $newArray = array_map("htmlspecialchars", $array);
        foreach ($newArray as $k => $v){
            if (empty($v)){
               $newArray['error'][] = 'Поле <b>'.$k.'</b> не заполненно !!!';
            } elseif ($k == 'fullArticle' && mb_strlen($v) < 160) {
                $newArray['error'][] = 'Короткая статья !!!';
            }
        }
        if(empty($newArray['error'])){// Add too DB
            //$newArray['source'] 
            //$newArray['heading']
            //$newArray['imageName']
            //$newArray['fullArticle']
            //heading 	imageName 	shortArticle 	fullArticle 	date 	source
            $query= $this->prepare("INSERT INTO articles (heading, imageName, shortArticle, fullArticle, date, source) VALUES (:heading, :imageName, :shortArticle, :fullArticle, :date, :source)");
            $values = ['heading' => $newArray['heading'], 'imageName' => $newArray['imageName'], 'shortArticle' => $shortArticle, 'fullArticle' => $newArray['fullArticle'], 'date' => time(), 'source' => $newArray['source']];
            $query->execute($values);
            //return $newArray['error'][] = $query->errorCode();
                if ($query->errorCode() == 00000) {
                    return $newArray['error'][] = 'Статья добавленна';
                } elseif ($query->errorCode() == 23000) {
                    return $newArray['error'][] = 'Такая статья уже существует, или пустое значение';
                } else {
                    return $newArray['error'][] = 'Что-то пошло не так((((';
                }
            
            
            
            
        } else {
            return $newArray;
        }
        
    }

}

