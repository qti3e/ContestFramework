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

namespace source;

use Html\Html;

class source extends Html
{
    public function __construct()
    {
        $g = array_keys($_GET);
        if (isset($g[1])) {
            $f = $g[1];
            if (file_exists("./Questions/" . $f . ".php")) {
                $this->header("..");
                ?>
                <div
                    style="width:100%;position:fixed !important;position:absolute;top:0;right:0;bottom:0;left:0;overflow: hidden;">
                    <iframe class="scrollbar" style="width:100%;height:100%;border: hidden;"
                            src="../Questions/<?php echo array_keys($_GET)[1]; ?>.php"></iframe>
                </div>
                <?php
                $this->footer("..");
            } else {
                header("location: ../Error/err404");
            }
        } else {
            header("location: ../Error/err404");
        }
    }
}