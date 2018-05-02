<?php

class EntryModel extends Model {

    function __construct() {
        parent::__construct();
    }
    
    public function showUserEnry() {
        $query= $this->prepare("SELECT * FROM record WHERE number='".$_SESSION['phone']."' ");
	$query->execute();
	$arr = $query->fetchALL(PDO::FETCH_ASSOC);
		if (empty($arr)){
                    return FALSE;
                } else {
                    return $arr;
                    }
        
	}
    
    public function showAllEntry() {
        $query= $this->prepare("SELECT * FROM record ORDER BY `id` DESC");
	$query->execute();
	$arr = $query->fetchALL(PDO::FETCH_ASSOC);
		if (empty($arr)){
                    return FALSE;
                } else {
                    return $arr;
                }
    }
    
    public function deleteEntry($id) {
        if (is_numeric($id)) {
            $query= $this->prepare("DELETE FROM record WHERE id='".$id."'");
            $query->execute();
            return $query->errorCode();
        } else {
            return FALSE;
        }
        
    }

}

