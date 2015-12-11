<?php
use \contest\contest as framework;

class q4 extends framework{
    private function is_hello($str){
        $a = $str."q";
        $a = preg_filter("([^hello])","",$a);
        $r = preg_filter(["(he)","(2ll)","([^3o])","(3o)","(o)"],["2","3","","4",""],$a);
        return (($r == "4") ? true : false);
    }
    public function index(){
        readByLine($this->input,function($line,$id,$lines){
            ifPrint($this->is_hello($line),"YES","NO");
        });
    }
}