<?php
/*****************************************************************************
 *         In the name of God the Most Beneficent the Most Merciful          *
 *___________________________________________________________________________*
 *   This program is free software: you can redistribute it and/or modify    *
 *   it under the terms of the GNU General Public License as published by    *
 *   the Free Software Foundation, either version 3 of the License, or       *
 *   (at your option) any later version.                                     *
 *___________________________________________________________________________*
 *   This program is distributed in the hope that it will be useful,         *
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of          *
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the           *
 *   GNU General Public License for more details.                            *
 *___________________________________________________________________________*
 *   You should have received a copy of the GNU General Public License       *
 *   along with this program.  If not, see <http://www.gnu.org/licenses/>.   *
 *___________________________________________________________________________*
 *                       Created by AliReza Ghadimi                          *
 *     <http://AliRezaGhadimi.ir>    LO-VE    <AliRezaGhadimy@Gmail.com>     *
 *****************************************************************************/

/**
 * Hello I'm using Contest FrameWork V1.0.2
 * This is best framework for participate in programming contest and it's has best manager of giv input and save output
 * You can download it from:http://CF.AliRezaGhadimi.ir/download
 */
class contest
{
    public $html = null;
    public $input = "";
    public $lines = array();
    public $math = null;
    public $output = "";

    public function __construct()
    {
        $this->math = new math();
        $this->index();
        $this->show();
    }

    public function index()
    {
    }

    public function show()
    {
        echo rtrim($this->output, "\n");
    }

    public function newLine($string)
    {
        $this->output .= $string . "\n";
    }

    public function str($string)
    {
        return new string($string);
    }

    public function arr($array)
    {
        return new _array($array);
    }

    public function readByLine()
    {
        $this->lines = explode("\n", $this->input);
        return $this->lines;
    }
}

class _array
{
    public $array = [];

    public function __construct($array)
    {
        if (is_array($array)) {
            $this->array = $array;
            return true;
        }
        return false;
    }

    public function operator($Operator = "+")
    {
        $array = $this->array;
        if ($Operator === "+") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re += (int)$a;
            }
            return $re;
        }
        if ($Operator === "-") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re -= (int)$a;
            }
            return $re;
        }
        if ($Operator === "*") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re *= (int)$a;
            }
            return $re;
        }
        if ($Operator === "/") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re /= $a;
            }
            return $re;
        }
        if ($Operator === "%") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re %= $a;
            }
            return $re;
        }
        return false;
    }

    public function implode($glue)
    {
        return implode($glue, $this->array);
    }
}

class math
{
    public function LCM($m, $n)
    {
        return ($m * $n) / $this->GCD($m, $n);
    }

    public function GCD($a, $b)
    {
        while ($b > 0) {
            $a = $a % $b;
            $a ^= $b;
            $b ^= $a;
            $a ^= $b;
        }
        return $a;
    }

    public function C($n, $k)
    {
        $numerator = 1;
        $denominator = 1;
        if ($k > $n / 2) $k = $n - $k;
        for ($i = $k; $i; $i--) {
            $toMul = $n - $k + $i;
            $toDiv = $i;
            $g = $this->GCD($toMul, $toDiv);
            $toMul /= $g;
            $toDiv /= $g;
            $g = $this->GCD($numerator, $toDiv);
            $numerator /= $g;
            $toDiv /= $g;
            $g = $this->GCD($toMul, $denominator);
            $toMul /= $g;
            $toDiv /= $g;
            $numerator *= $toMul;
            $denominator *= $toDiv;
        }
        return $numerator / $denominator;
    }

    public function fastexp($base, $power)
    {
        if ($power == 0) {
            return 1;
        } elseif ($power % 2 == 0) {
            return $this->square($this->fastexp($base, $power / 2));
        } else {
            return $base * ($this->fastexp($base, $power - 1));
        }
    }

    public function square($n)
    {
        return $n * $n;
    }

    public function Factorial($n, $to = 1)
    {
        $result = 1;
        for ($i = $to; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    public function Fib($n)
    {
        $a = 1;
        $b = 1;
        for ($i = 3; $i <= $n; $i++) {
            $c = $a + $b;
            $a = $b;
            $b = $c;
        }
        return $a;
    }

    public function Carmicheal($n)
    {
        if ($this->is_prime($n)) {
            return false;
        }
        $p = 0;
        $l = 1;
        for ($i = 1; $i <= $n; $i++) {
            if ($n % $i == 0) {
                if ($this->is_prime($i)) {
                    if ($l * $i <= $n) {
                        $l *= $i;
                        $p++;
                    }
                }
            }
            if ($p > 2) {
                return true;
            }
        }
        return false;
    }

    public function is_prime($a)
    {
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
}

class string
{
    public $string = "";

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function _alphabet()
    {
        return !$this->alphabet();
    }

    public function alphabet()
    {
        return $this->every_filter("([a-zA-Z])");
    }

    public function every_filter($filter)
    {
        if (preg_match($filter, $this->string)) {
            return true;
        } else {
            return false;
        }
    }

    public function _sAlphabet()
    {
        return !$this->sAlphabet();
    }

    public function sAlphabet()
    {
        return $this->every_filter("([a-z])");
    }

    public function _bAlphabet()
    {
        return !$this->bAlphabet();
    }

    public function bAlphabet()
    {
        return $this->every_filter("([A-Z])");
    }

    public function _number()
    {
        return !$this->number();
    }

    public function number()
    {
        return $this->every_filter('/\d/');
    }

    public function _other()
    {
        return !$this->other();
    }

    public function other()
    {
        return $this->every_filter('/\W/');
    }

    public function _unique()
    {
        return !$this->unique();
    }

    public function unique()
    {
        $text = $this->string;
        $while = mb_strlen($text, 'UTF-8');
        $num = 0;
        $array = array();
        while ($num < $while) {
            $array [] = mb_substr($text, $num, 1, 'UTF-8');
            $num++;
        }
        $unique = array_unique($array);
        if ($unique == $array) {
            return true;
        }
        return false;
    }

    public function strlen()
    {
        return strlen($this->string);
    }

    public function substr($start, $length = null)
    {
        return substr($this->string, $start, $length);
    }

    public function substr_replace($replacement, $start, $length = null)
    {
        return substr_replace($this->string, $replacement, $start, $length);
    }

    public function str_word_count($format = null, $charlist = null)
    {
        return str_word_count($this->string, $format, $charlist);
    }

    public function str_repeat($multiplier)
    {
        return str_repeat($this->string, $multiplier);
    }

    public function addcslashes($charlist)
    {
        return addcslashes($this->string, $charlist);
    }

    public function addslashes()
    {
        return addslashes($this->string);
    }

    public function bin2hex()
    {
        return bin2hex($this->string);
    }

    public function md5($raw_output = null)
    {
        return md5($this->string, $raw_output);
    }

    public function sha1($raw_output = null)
    {
        return sha1($this->string, $raw_output);
    }

    public function strstr($needle, $before_needle = null)
    {
        return strstr($this->string, $needle, $before_needle);
    }

    public function stristr($needle, $before_needle = null)
    {
        return stristr($this->string, $needle, $before_needle);
    }

    public function operator($Operator = "+", $delimiter = " ")
    {
        $array = $this->explode($delimiter);
        if ($Operator === "+") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re += (int)$a;
            }
            return $re;
        }
        if ($Operator === "-") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re -= (int)$a;
            }
            return $re;
        }
        if ($Operator === "*") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re *= (int)$a;
            }
            return $re;
        }
        if ($Operator === "/") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re /= $a;
            }
            return $re;
        }
        if ($Operator === "%") {
            $re = (int)$array[0];
            unset($array[0]);
            foreach ($array as $a) {
                $re %= $a;
            }
            return $re;
        }
        return false;
    }

    public function explode($delimiter = " ")
    {
        return explode($delimiter, $this->string);
    }
}