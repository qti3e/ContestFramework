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

namespace home;

use Html\Html;

class home extends Html
{
    public function __construct()
    {
        $this->header();
        echo "<div class='scrollbar' style='width:100%;position:fixed !important;position:absolute;top:0;right:0;bottom:0;left:0;overflow-x: hidden;'>";
        echo "<h1>Questions list:</h1>";
        $files = $this->classesToArray();
        for ($i = 0; $i <= count($files); $i += 4) {
            echo "<div class=\"row demo-tiles\">";
            if (isset($files[$i])) {
                echo "
        <div class=\"col-xs-3\">
          <div class=\"tile\">
            <h3 class=\"tile-title\">" . $files[$i][0] . "</h3>
            <div class=\"btn-group col-xs-12\">
                <a class=\"btn btn-primary col-xs-6\" href=\"./" . $files[$i][1] . "\">Open</a>
                <a class=\"btn btn-inverse col-xs-6\" href=\"./source/source?" . $files[$i][1] . "\">Code</a>
            </div>
          </div>
        </div>";
            }
            if (isset($files[$i + 1])) {
                echo "
        <div class=\"col-xs-3\">
          <div class=\"tile\">
            <h3 class=\"tile-title\">" . $files[$i + 1][0] . "</h3>
<div class=\"btn-group col-xs-12\">
                <a class=\"btn btn-primary col-xs-6\" href=\"./" . $files[$i + 1][1] . "\">Open</a>
                <a class=\"btn btn-inverse col-xs-6\" href=\"./source/source?" . $files[$i + 1][1] . "\">Code</a>
            </div>          </div>
        </div>";
            }
            if (isset($files[$i + 2])) {
                echo "
        <div class=\"col-xs-3\">
          <div class=\"tile\">
            <h3 class=\"tile-title\">" . $files[$i + 2][0] . "</h3>
        <div class=\"btn-group col-xs-12\">
                <a class=\"btn btn-primary col-xs-6\" href=\"./" . $files[$i + 2][1] . "\">Open</a>
                <a class=\"btn btn-inverse col-xs-6\" href=\"./source/source?" . $files[$i + 2][1] . "\">Code</a>
            </div>          </div>
        </div>";
            }
            if (isset($files[$i + 3])) {
                echo "
        <div class=\"col-xs-3\">
          <div class=\"tile\">
            <h3 class=\"tile-title\">" . $files[$i + 3][0] . "</h3>
<div class=\"btn-group col-xs-12\">
                <a class=\"btn btn-primary col-xs-6\" href=\"./" . $files[$i + 3][1] . "\">Open</a>
                <a class=\"btn btn-inverse col-xs-6\" href=\"./source/source?" . $files[$i + 3][1] . "\">Code</a>
            </div>          </div>
        </div>";
            }
            echo "</div>";
        }
        echo "</div>";
        $this->footer();
    }

    /**
     * @return array
     */
    private function classesToArray()
    {
        $re = array();
        $dir = './Questions';
        $files = scandir($dir);
        foreach ($files as $file) {
            if (is_file("./Questions/" . $file) && $file !== ".htaccess") {
                $re[] = [ucfirst(str_replace("_", " ", rtrim($file, ".php"))), rtrim($file, ".php")];
            }
        }
        return $re;
    }
}