<?php
use \contest\contest as framework;

class q2 extends framework{
    public function index(){
        readByLine($this->input,function($line){
           ifPrint(is_prime($line),$line,false);
        });
    }
}