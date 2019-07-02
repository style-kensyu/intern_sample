<?php
function if_test($num){
  if($num > 100){
    printf("100 < num\n");
  }else if($num > 50){
    printf("50 < num <= 100\n");
  }else if($num > 0){
    printf("0 < num <= 50\n");
  }else if($num == 0){
    printf("num < 0>\n");
  }else{
    printf("num < 0\n");
  }
}

if_test(1000);
# 100 < num

if_test(70);
# 50 < num <= 100

if_test(0);
# num == 0

if_test(-100);
  # num < 0


?>
