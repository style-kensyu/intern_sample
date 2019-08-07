/*
  java

  有名なプログラミング言語
  Androidアプリを作成するのにもつかわれる。
*/

import java.util.*;
public class Test {
  public static void main(String[] args) throws Exception {
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
      System.out.println("100 < num");
    }else if(num > 50){
      System.out.println("50 < num <= 100");
    }else if(num > 0){
      System.out.println("0 < num <= 50");
    }else if(num == 0){
      System.out.println("num < 0>");
    }else{
      System.out.println("num < 0");
    }
   }
}
