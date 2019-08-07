
/*
 go言語
 
 Googleによって開発されたプログラミング言語の1つ

*/

package main
import "fmt"
func main(){
  if_test(1000);
  //100 < num

  if_test(70);
  //50 < num <= 100

  if_test(0);
  //num == 0

  if_test(-100);
  //num < 0
}

func if_test(num int){
  if(num > 100){
    fmt.Println("100 < num\n")
  }else if(num > 50){
    fmt.Println("50 < num <= 100\n")
  }else if(num > 0){
    fmt.Println("0 < num <= 50\n")
  }else if(num == 0){
    fmt.Println("num < 0>\n")
  }else{
    fmt.Println("num < 0\n")
  }
}
