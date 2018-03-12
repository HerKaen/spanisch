<?php
/**
 * Created by PhpStorm.
 * User: Nico Glenz
 * Date: 26.02.2018
 * Time: 14:44
 */

namespace spanisch\Logic;

use spanisch\Logic\Funktionen\DbConnect;

echo '<center>';

require "Formulare/Navigation.html";

require "Formulare/SQL.html";

class SqlAction extends DbConnect
{
    public function __invoke()
    {

        if (isset($_POST["comment"])) {

            $comment = $_POST['comment'];

            $db = $this->connect();
            $eintrag = "INSERT INTO spanisch (kategorie, deutsch, spanisch) VALUES ($comment)";
            $eintragen = mysqli_query($db, $eintrag);
            mysqli_close($db);
        }
    }
}