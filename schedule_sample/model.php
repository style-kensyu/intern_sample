<?php

class model extends db{

function __construct(){
    parent:: __construct();
}

// スケジュール
function select_schedule($date){
    logger("model::select_schedule() [date]:" . $date);
    $sql = <<<SQL
SELECT sid,text,DATE_FORMAT(reg_date,'%H:%i') as time
FROM userschedule
WHERE reg_date LIKE '{$date}%'
AND status = 0
ORDER BY reg_date
SQL;

    $result = $this->query($sql);
    return $result;
}

function month_schedule($date){
    logger("model::select_schedule() [date]:" . $date);
    $sql = <<<SQL
SELECT DATE_FORMAT(reg_date,'%Y-%m-%d') as sch
FROM userschedule
WHERE reg_date LIKE '{$date}%'
AND status = 0
GROUP BY DATE_FORMAT(reg_date,'%Y-%m-%d')
SQL;
    $result = $this->query($sql);
    return $result;
}

function reg_schedule($plan,$time){
    logger("model::reg_schedule() [plan]:" . $plan . " [time]:" . $time);
  	$sql = "INSERT INTO userschedule (text,type,reg_date) VALUES ('{$plan}',1,'{$time}')";
    $result = $this->query($sql);
}

function delete_schedule($delete){
    logger("model::delete_schedule() [delete]:" . $date);
    $sql = "UPDATE userschedule SET status = 1 WHERE sid = {$delete}";
    $result = $this->query($sql);
}

function change_schedule($change,$plan,$time){
    logger("model::change_schedule() [change]:" . $change . " [plan]:" . $plan . " [time]:" .$time);
    $sql = "UPDATE userschedule SET ";

    if($plan) $sql .= "text = '{$plan}' ,";

    $sql .="reg_date = '{$time}' WHERE sid = {$change}";
    $result = $this->query($sql);
}

function query($sql){
  logger("model::query() sql \n" . $sql);
  $result = $this->db->query($sql);
  return $result->fetchAll(PDO::FETCH_ASSOC);
}

}
