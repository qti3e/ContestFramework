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

namespace Manager;

class URL
{
    public function __construct()
    {
        spl_autoload_register(array($this, "classLoader"), true, true);
        if (isset($_GET['url'])) {
            $question = $_GET['url'];
            $q = str_replace("/", "\\", $question);
            if (class_exists($q)) {
                new $q;
            } elseif (file_exists("./Questions/" . $question . ".php")) {
                include "./Questions/" . $question . ".php";
                if (class_exists($question)) {
                    define("_class", $question);
                    new $question;
                } else {
                    header("location: Error/err404");
                }
            } else {
                header("location: Error/err404");
            }
        } else {
            new \home\home();
        }
    }

    public function classLoader($class_name)
    {
        $file = "class/" . str_replace("\\", "/", $class_name) . ".class.php";
        if (file_exists($file)) {
            require_once($file);
            return true;
        } else {
            return false;
        }
    }
}