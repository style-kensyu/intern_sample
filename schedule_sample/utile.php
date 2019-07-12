<?php

class utile{
    function makeRandStr($length) {
      $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
      $r_str = null;
      for ($i = 0; $i < $length; $i++) {
          $r_str .= $str[rand(0, count($str) - 1)];
      }
      return $r_str;
    }

    function monthColor($month){
      $colors = [
        "#c9171e",
        "#c3d825",
        "#f5d1db",
        "#c89933",
        "#6c2463",
        "#47885e",
        "#bbbcde",
        "#b45e67",
        "#223a70",
        "#5654a2",
        "#eb6101",
        "#bbe2f1",
      ];

      return $colors[$month - 1];
    }
}
