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

namespace contest;

use Html\Html;

class contest extends Html
{
    /**
     * @var Html|null
     */
    public $html = null;
    /**
     * @var string
     */
    public $out_file = "output";
    /**
     * @var string
     */
    public $input = "";

    /**
     * @var array
     */
    public $lines = array();

    /**
     * @var array
     */
    public $_ = array();

    public function __construct()
    {
        $this->load();
        $this->out_file = "./outs/" . _class . ".txt";
        $this->save(false);
        if (isset($_POST['input'])) {
            $this->input = $_POST['input'];
            $this->index();
            if ($_POST['save'] === "Yes") {
                $this->save();
            } elseif ($GLOBALS['auto_save_note']) {
                echo "#This result not saved\n";
                echo "#Enable auto save to save it\n\n";
            }
            $this->showHtml();
        } else {
            $this->header();
            ?>
            <textarea onkeyup="edit();" class="palette palette-emerald form-control scrollbar" name="input"
                      id="Itextarea" placeholder="Input..."></textarea>
            <textarea class="form-control scrollbar" id="Otextarea" readonly="readonly"
                      placeholder="Result..."></textarea>
            <div
                style="text-align: left;position:fixed !important;position:absolute;bottom:0px;left:0px;width: 100%;height: 8%;"
                class="btn-group">
                <a href="./" class="btn btn-large btn-block palette palette-emerald" style="width: 20%;">Home</a>
                <button onclick="Submit();" class="btn btn-primary btn-large btn-block" style="width: 30%;">Submit
                </button>
            </div>
            <div
                style="text-align: left;position:fixed !important;position:absolute;bottom:0px;right:0px;width: 50%;height: 8%;"
                class="btn-group">
                <div class="row">
                    <div class="col-sm-2">
                        <span class="btn btn-large btn-block" style="width: 20%;">Auto refresh:</span>
                    </div>
                    <div class="col-sm-3">
                        <div class="bootstrap-switch-square">
                            <input data-toggle="switch" type="checkbox" id="autoRefresh" checked onchange="Submit();">
                        </div>
                    </div>


                    <div class="col-sm-2">
                        <span class="btn btn-large btn-block" style="width: 20%;">Auto save:</span>
                    </div>
                    <div class="col-sm-3">
                        <div class="bootstrap-switch-square">
                            <input data-toggle="switch" type="checkbox" id="autoSave" checked onchange="edit();">
                        </div>
                    </div>
                </div>
            </div>

            <?php
            $this->footer();
        }
    }

    private function load()
    {
        $modules = $this->_use();
        foreach ($modules as $module) {
            $this->newModul($module);
        }
    }

    public function _use()
    {
        $file = glob("./module/*.module.php");
        $re = [];
        foreach ($file as $filename) {
            $re[] = str_replace(["./module/", ".module.php"], "", $filename);
        }
        return $re;
    }

    public function newModul($moduleName)
    {
        $filename = "./module/$moduleName.module.php";
        if (file_exists($filename)) {
            include_once $filename;
        }
    }

    /**
     * @param $a
     * Save output to the output file
     */
    public function save($a = true)
    {
        if ($a) {
            file_put_contents("./outs/" . _class . ".txt", rtrim($GLOBALS["output"], "\n"));
        }
    }

    /**
     * index function for the main code
     */
    public function index()
    {
    }

    /**
     * Show output in visual HTML platform
     */
    public function showHtml()
    {
        echo rtrim($GLOBALS['output'], "\n");
    }
}