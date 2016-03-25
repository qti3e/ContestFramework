# ContestFramework
##What?
  A PHP framework for help you to participate in programming contests.
##Who?
  All of php programmers that wants to participate in programming contects
##Why?
  It have an extera power in make your code shorter and with no wrong,look at this simple code that read judge system's input line by line and prints each number that is prime:
  ```
<?php
class q2 extends \contest\contest{
    public function index(){
        readByLine($this->input,function($line){
           ifPrint(is_prime($line),$line,false);
        });
    }
}
?>
  ```
  And are you ready to read it by your self without this framework?
  ```
function is_prime($a){
	if ($a == 1) return false;
	if ($a == 2) return true;
	if ($a % 2 == 0) return false;
	$lim = (int)sqrt($a);
	for ($i = 2; $i <= $lim; $i++) {
		if ($a % $i == 0) {
			return false;
		}
	}
	return true;
}
while (fscanf(STDIN, '%d', $number1) === 1){
	if(is_prime((int)$number1)){
		fprintf(STDOUT,"%d\n",$number1);
	}
}
```
