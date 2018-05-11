<?php

//namespace Articles;

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
    public function deleteArticles($id = false){
            $query= $this->prepare("DELETE FROM articles WHERE id='".$id."'");
            $query->execute();
                if ($query->errorCode() == 00000) {
                            return array ('error' => 'Статья удаленна');
                        } else {
                            //return $query->errorInfo();
                            return array ('error' => 'Что-то пошло не так((((');
                        }
    }
    public function getFullArticle($id) {
        $query= $this->prepare("SELECT id, heading, fullArticle, date, source FROM articles  WHERE id = $id LIMIT 1");
	$query->execute();
	return $query->fetchALL(PDO::FETCH_ASSOC);
    }
    public function addArticle($array = false) {
        $shortArticle = strip_tags(mb_substr($array['fullArticle'], 0, 200, 'UTF-8'));
        $newArray = array_map("htmlspecialchars", $array);
        $newArray = self::checkPost($newArray);
        if(empty($newArray['error'])){// Add too DB
            //$newArray['source'] 
            //$newArray['heading']
            //$newArray['imageName']
            //$newArray['fullArticle']
            //heading 	imageName 	shortArticle 	fullArticle 	date 	source
            $values = ['heading' => $newArray['heading'], 'imageName' => $newArray['imageName'], 'shortArticle' => $shortArticle, 'fullArticle' => $newArray['fullArticle'], 'date' => time(), 'source' => $newArray['source']];
                $query= $this->prepare("INSERT INTO articles (heading, imageName, shortArticle, fullArticle, date, source) VALUES (:heading, :imageName, :shortArticle, :fullArticle, :date, :source)");
                $query->execute($values);
                
            if ($query->errorCode() == 00000) {
                    return array ('error' => 'Статья добавленна');
                } elseif ($query->errorCode() == 23000) {
                    return array ('error' => 'Такая статья уже существует, или пустое значение');
                } else {
                    return $query->errorInfo();
                    //return array ('error' => 'Что-то пошло не так((((');
                }
        } else {
            return $newArray;
        }
        
    }
    
    public function updateArticle($newArray){
        $shortArticle = strip_tags(mb_substr($newArray['fullArticle'], 0, 200, 'UTF-8'));
        $newArray = array_map("htmlspecialchars", $newArray);
        $newArray = self::checkPost($newArray);
        if(empty($newArray['error'])){
            $values = ['heading' => $newArray['heading'], 'imageName' => $newArray['imageName'], 'shortArticle' => $shortArticle, 'fullArticle' => $newArray['fullArticle'], 'date' => time(), 'source' => $newArray['source'], 'id' => $newArray['id']];
            $query= $this->prepare("UPDATE articles SET heading = :heading, imageName = :imageName, shortArticle = :shortArticle, fullArticle = :fullArticle, date = :date, source = :source WHERE id= :id");
            $query->execute($values);
            if ($query->errorCode() == 00000) {
                        return array ('error' => 'Статья изменена');
                    } elseif ($query->errorCode() == 23000) {
                        return array ('error' => 'Пустое значение');
                    } else {
                        return array ('error' => 'Что-то пошло не так((((');
                    }
            } else {
            return $newArray;
        }
    }
    
    public function checkPost($data){
        foreach ($data as $k => $v){
            if (empty($v)){
               $data['error'][] = 'Поле <b>'.$k.'</b> не заполненно !!!';
            } elseif ($k == 'fullArticle' && mb_strlen($v) < 160) {
                $data['error'][] = 'Короткая статья !!!';
            }
        }
        return $data;
    }

}

