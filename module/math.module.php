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
 * @param $a
 * @param $b
 * @return int
 */
function GCD($a, $b)
{
    while ($b > 0) {
        $a = $a % $b;
        $a ^= $b;
        $b ^= $a;
        $a ^= $b;
    }
    return $a;
}

/**
 * @param $m
 * @param $n
 * @return float
 */
function LCM($m, $n)
{
    return ($m * $n) / $this->GCD($m, $n);
}

/**
 * @param $n
 * @param $k
 * @return float
 */
function C($n, $k)
{
    $numerator = 1;
    $denominator = 1;
    if ($k > $n / 2)
        $k = $n - $k;
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

/**
 * @param $n
 * @return mixed
 */
function square($n)
{
    return $n * $n;
}

/**
 * @param $base
 * @param $power
 * @return int
 */
function fastexp($base, $power)
{
    if ($power == 0) {
        return 1;
    } elseif ($power % 2 == 0) {
        return $this->square($this->fastexp($base, $power / 2));
    } else {
        return $base * ($this->fastexp($base, $power - 1));
    }
}

/**
 * @param $n
 * @param int $to
 * @return int
 */
function Factorial($n, $to = 1)
{
    $result = 1;
    for ($i = $to; $i <= $n; $i++) {
        $result *= $i;
    }
    return $result;
}

/**
 * @param $n
 * @return int
 */
function Fib($n)
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

/**
 * @param $a
 * @return bool
 */
function is_prime($a)
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

/**
 * @param $n
 * @return bool
 */
function Carmicheal($n)
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

/**
 * Sum tow very big number
 * @param $n1
 * @param $n2
 * @return string
 */
function big_sum($n1,$n2)
{
    if(strlen($n1) > strlen($n2)){
        //small number
        $m1 = $n2;
        //big number
        $m2 = $n1;
    }else{
        //small number
        $m1 = $n1;
        //big number
        $m2 = $n2;
    }
    $m1     = str_repeat(0,(strlen($m2) - strlen($m1))).$m1;
    $len    = strlen($m1)-1;
    $re     = "";
    $plus   = 0;
    for($i = $len;$i >= 0;$i--){
        $n1 = (int)$m1[$i];
        $n2 = (int)$m2[$i];
        $s  = $n1 + $n2 + $plus;
        if($s >= 10){
            $re     = substr($s,strlen($s)-1,strlen($s)).$re;
            $plus   = (int)substr($s,0,strlen($s)-1);
        }else{
            $re     = $s.$re;
            $plus   = 0;
        }
    }
    return (($plus == 0) ? "" : $plus).$re;
}

/**
 * @param $n1
 * @param $n2
 * @return mixed
 */
function big_multiplication($n1,$n2)
{
    if(strlen($n1) > strlen($n2)){
        //small number
        $m1 = $n2;
        //big number
        $m2 = $n1;
    }else{
        //small number
        $m1 = $n1;
        //big number
        $m2 = $n2;
    }
    $re = $m2;
    for($i = 1;$i < $m1;$i++){
        $re = big_sum($m2,$re);
    }
    return $re;
}