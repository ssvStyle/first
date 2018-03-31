<?php

class Model extends DB {

    function __construct() {
        parent::__construct();
    }
    
    public static function checkDate ($date){
        if (preg_match("~^[0-9]{1,2}:[1-9]{1,2}:[0-9]{4}$~", $date)){
            $date = explode(':', $date);//$date[0] - day, $date[1] - month, $date[2] - year
                if(mktime(0, 0, 0, $date[1], $date[0], $date[2]) >= mktime(0, 0, 0, date('n'), date('j'), date('Y'))){
                    if ($date[0] > 31 || $date[1] >12){
                        return self::today();
                    } else {
                        return self::checkEvenNumber($date[0], $date[1], $date[2]);
                    }
                } else {
                    return self::checkEvenNumber(date('j'), date('n'), date('Y'));
                }
        } else {
            return self::today();
        }
    }
    private function checkEvenNumber($day, $month, $year){
        if (!($day % 2)){
                        return $date = ['day' => $day, 'month' => $month, 'year' => $year];
                    } else {
                            if(!(++$day % 2) && $day < 31){
                                return $date = ['day' => $day, 'month' => $month, 'year' => $year];
                            } else {
                                $day = 2;
                                $month++; 
                                if ($month > 12) {
                                    $month = 1;
                                    $year++;
                                }
                                return $date = ['day' => $day, 'month' => $month, 'year' => $year];
                            }
                    }
    }
    private function today(){
        $date = self::checkEvenNumber(date('j'), date('n'), date('Y'));
        $date['Error'] = 'Invalid date !!!';
        return $date;
    }

}
