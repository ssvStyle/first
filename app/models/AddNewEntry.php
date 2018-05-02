<?php


class AddNewEntry extends Model {
    protected $today = ["09 : 00"=> false, "09 : 30"=> false, "10 : 00"=> false, "10 : 30"=> false, "11 : 00"=> false, "11 : 30"=> false, "12 : 00"=> false, "12 : 30"=> false, "13 : 00"=> false, "13 : 30"=> false, "14 : 00"=> false, "14 : 30"=> false,  "15 : 00"=> false, "15 : 30"=> false, "16 : 00"=> false, "16 : 30"=> false, "17 : 00"=> false, "17 : 30"=> false, "18 : 00"=> false, "date" => false];
    protected $rusmonth = [1 => 'Января','Февраля','Марта','Апреля','Мая','Июня','Июля','Августа','Сентября','Октября','Ноября','Декабря'];
    
    public function __construct() {
        parent::__construct();
    }


    public function entryDay($date = false) {
      $date = self::checkDate($date);
      $today = $this->today;
      $today['date'] = $date;
      $today['date']['ruMonth'] = $this->rusmonth[$date['month']];
      $result = $this->query("SELECT * FROM record WHERE year=" . $date['year'] . " AND month=" . $date['month'] . " AND day=" . $date['day'] . "")->fetchALL(PDO::FETCH_ASSOC);
      foreach ($result as $mass){
		$i = $mass['hour'];
		$today[$i] = $mass['service'].' '.$mass['serviceAdd'];
            }
	return $today;
    }
    
    public function addEntry($data){
            if (isset($data) && $data['hour'] != ''){
                $rez = explode(' : ', $data['hour']);
                $query= $this->prepare("INSERT INTO record (year, month, day, hour, name, number, email, service, serviceAdd, msg, uniqId) VALUES (:year, :month, :day, :hour, :name, :number, :email, :service, :serviceAdd, :msg, :uniqId)");
		$values = ['year' => $data['year'], 'month' => $data['month'], 'day' => $data['day'], 'hour' => $data['hour'], 'name' => $data['name'], 'number' => $data['phone'], 'email' => $data['email'], 'service' => $data['service'], 'serviceAdd' => $data['serviceAdd'], 'msg' => trim(htmlspecialchars($data['msg'])), 'uniqId' => mktime($rez[0], $rez[1], 0, $data['month'], $data['day'], $data['year'])];
                $query->execute($values);
                $values['month'] = $this->rusmonth[$data['month']];
                        if ($query->errorCode() == 00000){
                            return $array = ['Entry' => 'Запись добавленна', $values];
                        } else if ($query->errorCode() == 23000) {
                            return $array = ['Entry' => 'Такая запись уже существует<br><a href="'.PROOT.'entry">Запись</a>'];
                        } else {
                            return $array = ['Entry' => 'Error...'];
                    }
            } else {
                return $array = ['Entry' => '<br><br>Время не заданно !!!<br><br>Запись не добавленна !!! <a href="'.PROOT.'entry">Запись</a>'];
            }
        /* $data -
        ["hour"]=>string(7) "13 : 30"
        ["service"]=>string(14) "Стрижка"
        ["serviceAdd"]=>string(0) ""
        ["day"]=>string(2) "20"
        ["month"]=>string(1) "4"!!!
        ["year"]=>string(4) "2018"!!!
        ["name"]=>string(0) ""
        ["phone"]=>string(0) ""
        ["email"]=>string(0) ""
        ["msg"]=>string(0) ""
        ["uniqId"]=>timestamp day month year hour ""         */
    }
    
}
