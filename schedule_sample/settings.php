<?php
  SESSION_START();
  date_default_timezone_set('Asia/Tokyo');

  // logを管理してます。
  function logger($log=""){
    error_log($log);
  }

  function logger_r($text="",$log=[]){
    error_log($text . "\n" . print_r($log,true));
  }
?>
