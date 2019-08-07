/*
  javascript

  webブラウザの動きを作ることができる

*/

function if_test($num){
  if($num > 100){
    console.log("100 < num");
  }else if($num > 50){
    console.log("50 < num <= 100");
  }else if($num > 0){
    console.log("0 < num <= 50");
  }else if($num === 0){
    console.log("num < 0");
  }else{
    console.log("num < 0");
  }
}

if_test(1000);
 // 100 < num

if_test(70);
 // 50 < num <= 100

if_test(0);
 // num == 0

if_test(-100);
 // num < 0
