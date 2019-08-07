/*
 C#

 主にunityの言語として有名
 
*/

public class test{
  public static void Main(){
   if_test(1000);
    // 100 < num

    if_test(70);
    //50 < num <= 100

    if_test(0);
    //num == 0

    if_test(-100);
    //num < 0
  }

  private static void if_test(int num){
  	if(num > 100){
      System.Console.WriteLine("100 < num");
    }else if(num > 50){
      System.Console.WriteLine("50 < num <= 100");
    }else if(num > 0){
      System.Console.WriteLine("0 < num <= 50");
    }else if(num == 0){
      System.Console.WriteLine("num < 0>");
    }else{
      System.Console.WriteLine("num < 0");
    }
	}
}
