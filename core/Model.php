<?php

class Model extends DB {

    function __construct() {
        parent::__construct();
    }
    
    public static function checkDate ($date){
        $day = $date[0];
        $month = $date[1];
        $year = $date[2];
            if(mktime(0, 0, 0, $month, $day, $year) >= mktime(0, 0, 0, date('n'), date('j'), date('Y'))){
                return self::checkEvenNumber($day, $month, $year);
            } else {
                return self::checkEvenNumber(date('j'), date('n'), date('Y'));
            }
    }
    public function checkEvenNumber($day, $month, $year){
        if (!($day % 2)){
                        return $arayDate = ['day' => $day, 'month' => $month, 'year' => $year];
                    } else {
                            if(!(++$day % 2) && $day < 31){
                                return $arayDate = ['day' => $day, 'month' => $month, 'year' => $year];
                            } else {
                                $day = 2;
                                $month++; 
                                if ($month > 12) {
                                    $month = 1;
                                    $year++;
                                }
                                return $arayDate = ['day' => $day, 'month' => $month, 'year' => $year];
                            }
                    }
    }


}
