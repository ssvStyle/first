<?php

class AddNewEntry extends Model {
    protected $today = ["09 : 00"=> false, "09 : 30"=> false, "10 : 00"=> false, "10 : 30"=> false, "11 : 00"=> false, "11 : 30"=> false, "12 : 00"=> false, "12 : 30"=> false, "13 : 00"=> false, "13 : 30"=> false, "14 : 00"=> false, "14 : 30"=> false,  "15 : 00"=> false, "15 : 30"=> false, "16 : 00"=> false, "16 : 30"=> false, "17 : 00"=> false, "17 : 30"=> false, "18 : 00"=> false];
			
    
    public function entryDay() {
      return $result = $this->query("SELECT * FROM record")->fetchALL(PDO::FETCH_ASSOC);
    }
    
    public function entryTooday() {
        return $this->checkDate($arayDate = [date('j'), date('n'), date('Y')]);
        $day = date('j');
            
    }
    
    public static function checkDate ($date){//Продумать проверку на ТОЛЬКО четное и корректное число месяца
        $day = $date[0];
        $month = $date[1];
        $year = $date[2];
        if (!($day % 2)){
                return $arayDate = ['day' => $day, 'month' => $month, 'year' => $year];
            } else {
                    if(!($day++ % 2)){
                        return $arayDate = ['day' => $day, 'month' => $month, 'year' => $year];
                    } else {
                        $day+2;
                        return $arayDate = [$day, $month, $year];
                    }
            }
    }

}
