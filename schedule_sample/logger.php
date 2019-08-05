<?php

class logger{
  function __construct(){
      $this->set_logger();
  }

  function set_logger(){
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
      $path = "/xampp/xamppfiles/logs/schedule/";
    } else {
      $path = "/Applications/XAMPP/xamppfiles/logs/schedule/";
    }

    if(!file_exists($path)){
      mkdir($path,0777,true);
    }

    $err_log = $path."schedule_sample_".date('Ymd').".log";
    if(!file_exists($err_log)){
      touch($err_log,0777,true);
    }

    ini_set('error_log',$err_log);
  }
}

?>
