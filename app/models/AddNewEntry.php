<?php

class AddNewEntry extends Model {
    protected $today = ["09 : 00"=> false, "09 : 30"=> false, "10 : 00"=> false, "10 : 30"=> false, "11 : 00"=> false, "11 : 30"=> false, "12 : 00"=> false, "12 : 30"=> false, "13 : 00"=> false, "13 : 30"=> false, "14 : 00"=> false, "14 : 30"=> false,  "15 : 00"=> false, "15 : 30"=> false, "16 : 00"=> false, "16 : 30"=> false, "17 : 00"=> false, "17 : 30"=> false, "18 : 00"=> false, "date" => false];
    
    public function __construct() {
        parent::__construct();
    }


    public function entryDay($date) {
      $date = self::checkDate($date);
      $today = $this->today;
      $today['date'] = $date;
      $result = $this->query("SELECT * FROM record WHERE year=" . $date['year'] . " AND month=" . $date['month'] . " AND day=" . $date['day'] . "")->fetchALL(PDO::FETCH_ASSOC);
      foreach ($result as $mass){
		$i = $mass['hour'];
		$today[$i] = $mass['service'].' '.$mass['serviceAdd'];
            }
	return $today;
    }
    
}
