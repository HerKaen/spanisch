<?php

namespace spanisch\Logic;

echo '<br><center>';

require "Navigation.html";

require "Formular.html";

class WriteAction
{
    public function __invoke()
    {

        if (isset($_POST["deutsch"]) && ($_POST["spanisch"])) {

            $kategorie = $_POST["kategorie"];
            $deutsch = $_POST["deutsch"];
            $spanisch = $_POST["spanisch"];

            $db = mysqli_connect("localhost", "root", "", "nico");
            $eintrag = "INSERT INTO spanisch (kategorie, deutsch, spanisch) VALUES ('$kategorie', '$deutsch', '$spanisch')";
            $eintragen = mysqli_query($db, $eintrag);
            mysqli_close($db);
        }
    }
}