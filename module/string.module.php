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
 * @param $filter
 * @param $string
 * @return bool
 */
function every_filter($filter, $string)
{
    if (preg_match($filter, $string)) {
        return true;
    } else {
        return false;
    }
}

/**
 * @param $string
 * @return mixed
 */
function alphabet($string)
{
    return every_filter("([a-zA-Z])", $string);
}

function _alphabet($string)
{
    return !alphabet($string);
}

/**
 * @param $string
 * @return mixed
 */
function sAlphabet($string)
{
    return every_filter("([a-z])", $string);
}

function _sAlphabet($string)
{
    return !sAlphabet($string);
}

/**
 * @param $string
 * @return mixed
 */
function bAlphabet($string)
{
    return every_filter("([A-Z])", $string);
}

function _bAlphabet($string)
{
    return !bAlphabet($string);
}

/**
 * @param $string
 * @return mixed
 */
function number($string)
{
    return every_filter('/\d/', $string);
}

function _number($string)
{
    return !number($string);
}

/**
 * @param $string
 * @return mixed
 */
function other($string)
{
    return every_filter('/\W/', $string);
}

function _other($string)
{
    return !other($string);
}

/**
 * @param $string
 * @return bool
 */
function unique($string)
{
    $while = mb_strlen($string, 'UTF-8');
    $num = 0;
    $array = array();
    while ($num < $while) {
        $array [] = mb_substr($string, $num, 1, 'UTF-8');
        $num++;
    }
    $unique = array_unique($array);
    if ($unique == $array) {
        return true;
    }
    return false;
}

/**
 * @param $string
 * @return bool
 */
function _unique($string)
{
    return !unique($string);
}

/**
 * @param string $string
 * @param string $Operator
 * @param $delimiter
 * @return bool|int
 */
function operator($string, $Operator = "+", $delimiter = " ")
{
    $array = explode($delimiter, $string);
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

/**
 * @param $string
 * @param string $delimiter
 * @return array
 */
function toArray($string,$delimiter = " "){
    return explode($delimiter,$string);
}
