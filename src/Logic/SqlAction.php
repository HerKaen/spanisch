<?php
/**
 * Created by PhpStorm.
 * User: Nico Glenz
 * Date: 26.02.2018
 * Time: 14:44
 */

namespace spanisch\Logic;

echo '<center>';

require "Navigation.html";

require "SQL.html";

class SqlAction
{
    public function __invoke()
    {

        if (isset($_POST["comment"]) && ($_POST["spanisch"])) {


            $db = mysqli_connect("localhost", "root", "", "nico");
            $eintrag = $_POST['comment'];
            $eintragen = mysqli_query($db, $eintrag);
            mysqli_close($db);
        }
    }
}