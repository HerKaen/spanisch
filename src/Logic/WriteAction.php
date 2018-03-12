<?php

namespace spanisch\Logic;

use spanisch\Logic\Funktionen\DbConnect;

echo '<br><center>';

require "Formulare/Navigation.html";

require "Formulare/Formular.html";

class WriteAction extends DbConnect
{
    public function __invoke()
    {

        if (isset($_POST["deutsch"]) && ($_POST["spanisch"])) {

            $kategorie = $_POST["kategorie"];
            $deutsch = ucfirst($_POST["deutsch"]);
            $spanisch = ucfirst($_POST["spanisch"]);

            $db = $this->connect();

            $eintrag = "INSERT INTO spanisch (kategorie, deutsch, spanisch) VALUES ('$kategorie', '$deutsch', '$spanisch')";
            $eintragen = $db->query($eintrag);

            $db->close();
        }
    }
}