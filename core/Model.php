<?php

class Model extends DB {

    function __construct() {
        parent::__construct();
    }
    
    public static function checkDate ($date){
        $day = $date['day'];
        $month = $date['month'];
        $year = $date['year'];
            if(mktime(0, 0, 0, $month, $day, $year) >= mktime(0, 0, 0, date('n'), date('j'), date('Y'))){
                if ($day > 31 || $month >12){
                    $date = self::checkEvenNumber(date('j'), date('n'), date('Y'));
                    $date['Error'] = 'Invalid date !!!';
                    return $date;
                } else {
                    return self::checkEvenNumber($day, $month, $year);
                }
            } else {
                return self::checkEvenNumber(date('j'), date('n'), date('Y'));
            }
    }
    public function checkEvenNumber($day, $month, $year){
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


}
