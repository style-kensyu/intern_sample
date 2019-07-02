<?php

class model extends db{

function __construct(){
    parent:: __construct();
}

// スケジュール
function select_schedule($date){
    $sql = <<<SQL
SELECT sid,text,DATE_FORMAT(reg_date,'%H:%i') as time
FROM userschedule
WHERE reg_date LIKE '{$date}%'
AND status = 0
ORDER BY reg_date
SQL;

    $result = $this->db->query($sql);
    return $result;
}

function month_schedule($date){
    $sql = <<<SQL
SELECT DATE_FORMAT(reg_date,'%Y-%m-%d') as sch
FROM userschedule
WHERE reg_date LIKE '{$date}%'
AND status = 0
GROUP BY DATE_FORMAT(reg_date,'%Y-%m-%d')
SQL;
    $result = $this->db->query($sql);
    return $result;
}

function reg_schedule($plan,$time){
	$sql = "INSERT INTO userschedule (text,type,reg_date) VALUES ('{$plan}',1,'{$time}')";
  $result = $this->db->query($sql);
}

function delete_schedule($delete){
    $sql = "UPDATE userschedule SET status = 1 WHERE sid = {$delete}";
    $result = $this->db->query($sql);
}

function change_schedule($change,$plan,$time){
    $sql = "UPDATE userschedule SET ";

    if($plan) $sql .= "text = '{$plan}' ,";

    $sql .="reg_date = '{$time}' WHERE sid = {$change}";
    $result = $this->db->query($sql);
}

}
