func if_test(num : Int){
    if(num > 100){
      print("100 < num\n");
    }else if(num > 50){
      print("50 < num <= 100\n");
    }else if(num > 0){
      print("0 < num <= 50\n");
    }else if(num == 0){
      print("num < 0>\n");
    }else{
      print("num < 0\n");
    }
}

if_test(num :1000);
// 100 < num

if_test(num :70)
// 50 < num <= 100

if_test(num :0)
// num == 0

if_test(num :-100)
// num < 0
