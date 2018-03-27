<?php

class Model extends DB {

    function __construct() {
        parent::__construct();
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
