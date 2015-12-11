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
 * Write new line to output.
 * This function add a \n charset automatic at the end of string
 * @param $string
 */
function newLine($string)
{
    if (is_bool($string)) {
        if ($string === true) {
            $string = "true";
        } elseif ($string === false) {
            $string = "false";
        }
    }
    $GLOBALS['output'] .= "\n" . $string;
    $GLOBALS['output'] = ltrim($GLOBALS['output'], "\n");
    $GLOBALS['output'] = rtrim($GLOBALS['output'], "\n");
}

/**
 * Print with if:
 *  Without it:
 *      1.if($if){
 *            newLine($do);
 *        }else{
 *            newLine($else);
 *        }
 * _______
 *      2.if($if){
 *            newLine("YES");
 *        }else{
 *            newLine("NO");
 *        }
 * ___________________________________________
 *  With this function:
 *      1.ifPrint($if,$do,$else);
 * _______
 *      2.ifPrint($if);
 * @param $if
 * @param string $do
 * @param string $else
 */
function ifPrint($if, $do = "YES", $else = "NO")
{
    if ($if) {
        newLine($do);
    } elseif ($else !== FALSE) {
        newLine($else);
    }
}