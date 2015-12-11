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

namespace Html;
$output = "";

class Html
{
    public function header($f = ".")
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <title>Contest Framework</title>
            <meta name="description"
                  content="`Contest Framework` is a PHP framework for participate in programming contests and take you as a winner!"/>

            <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

            <!-- Loading Bootstrap -->
            <link href="<?php echo $f; ?>/style/dist/css/vendor/bootstrap.min.css" rel="stylesheet">

            <!-- Loading Flat UI -->
            <link href="<?php echo $f; ?>/style/dist/css/flat-ui.css" rel="stylesheet">
            <link href="<?php echo $f; ?>/style/assets/css/demo.css" rel="stylesheet">

            <link rel="shortcut icon" href="<?php echo $f; ?>/logo/CF_500×500.png">

            <!--[if lt IE 9]>
            <script src="<?php echo $f; ?>/style/dist/js/vendor/html5shiv.js"></script>
            <script src="<?php echo $f; ?>/style/dist/js/vendor/respond.min.js"></script>
            <![endif]-->
            <style type="text/css">
                .scrollbar {
                    overflow-y: auto;
                }

                .scrollbar::-webkit-scrollbar {
                    width: 12px;
                    background-color: #34495e;
                }

                .scrollbar::-webkit-scrollbar-thumb {
                    background-color: #1abc9c;
                }

                .scrollbar::-webkit-scrollbar-track {
                    border: 1px gray solid;
                    -webkit-box-shadow: 0 0 2px gray inset;
                }

                #Itextarea {
                    text-align: left;
                    position: fixed !important;
                    position: absolute;
                    top: 0;
                    bottom: 46px;
                    height: 92%;
                    text-transform: none;
                    width: 50%;
                    float: left;
                    left: 0;
                    resize: none;
                }

                #Otextarea {
                    text-align: left;
                    position: fixed !important;
                    position: absolute;
                    top: 0;
                    right: 0;
                    bottom: 46px;
                    height: 92%;
                    text-transform: none;
                    width: 50%;
                    float: right;
                    color: #000;
                    resize: none;
                }
            </style>
        </head>
        <body class="scrollbar">
    <?php
    }

    public function footer($f = ".")
    {

        ?>

        <script src="<?php echo $f; ?>/style/dist/js/vendor/jquery.min.js"></script>
        <script type="application/javascript">
            function Submit() {
                var save = "No";
                if ($('#autoSave').is(":checked")) {
                    save = "Yes"
                }
                $.post("",
                    {
                        input: $("textarea#Itextarea").val(),
                        save: save
                    },
                    function (data, status) {
                        $("textarea#Otextarea").val(data);
                    });
            }
            function edit() {
                if ($('#autoRefresh').is(":checked")) {
                    Submit();
                }
            }
        </script>
        <script src="<?php echo $f; ?>/style/dist/js/vendor/video.js"></script>
        <script src="<?php echo $f; ?>/style/dist/js/flat-ui.min.js"></script>
        <script src="<?php echo $f; ?>/style/assets/js/application.js"></script>
        </body>
        </html>
    <?php
    }
}