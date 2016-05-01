# ContestFramework
##What?
  A PHP framework to help you to participate in programming contests.
##Who?
  All of PHP programmers that want to participate in programming contests
##Why?
  It has an extra power to make your codes shorter and with no wrong.
  For example look at this simple code that read judge system's input line by line and prints each number that is prime:
  ```php
<?PHP
Class q2 extends \contest\contest {
    Public function index () {
        ReadByLine ($this->input, function ($line) {
           Offprint (is_prime ($line), $line, false);
        });
    }
}
?>
  ```
  And are you ready to write it by yourself,but without this framework?
  ```php
<?php
Function is_prime ($a) {
	If ($a == 1) return false;
	If ($a == 2) return true;
	If ($a % 2 == 0) return false;
	$Lim = (int) sqrt ($a);
	For ($i = 2; $i <= $lim; $i++) {
		If ($a % $i == 0) {
			Return false;
		}
	}
	Return true;
}
While (fscanf (STDIN, '%d', $number1) === 1) {
	If (is_prime ((int) $number1)) {
		fprintf(STDOUT,"%d\n",$number1);
	}
}
```
