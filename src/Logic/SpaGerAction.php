<?php

namespace spanisch\Logic;

echo '<br><center>';

require "Formulare/Navigation.html";

class SpaGerAction
{
    public function __invoke()
    {
        session_start();

        require "Formulare/FormularSpaGer.html";


        $spa = $this->IsPosted();

        $db = mysqli_connect("localhost", "root", "", "nico");

        $sql = "SELECT * FROM spanisch";
        $result = mysqli_query($db, $sql);
        $spanisch = array();
        while ($row = mysqli_fetch_array($result)) {
            $spanisch[] = $row['spanisch'];
        }

        $sql2 = "SELECT * FROM spanisch";
        $result2 = mysqli_query($db, $sql2);
        $deutsch = array();
        while ($row2 = mysqli_fetch_array($result2)) {
            $deutsch[] = $row2['deutsch'];
        }

        $vokabel_anzahl = count($spanisch);

        echo "<hr>";

        echo "<b style='font-size: 15px;'>Ihre Antwort ist: </b>";
        echo "<br>";

        if ($deutsch[$_SESSION['zufall']] == $spa) {
            echo "<b style='font-size: 18px; color:green'>Richtig</b>";
        } else {
            echo "<b style='font-size: 18px; color:red'>Falsch</b><br>";
            echo "<hr><b style='font-size: 15px; color:green'>Die richtige Lösung wäre gewesen:</b><br>";
            echo "<b style='font-size:18px;'>" . $deutsch[$_SESSION['zufall']] . "</b>";
        }

        echo "<hr>";

        $_SESSION['zufall'] = rand(0, $vokabel_anzahl - 1);

        echo "<b style='font-size: 15px; color:darkblue'>Das nächste gesuchte Wort ist: </b><br>";

        echo "<b style='font-size: 18px; color:mediumpurple'>" . $spanisch[$_SESSION['zufall']] . "</b>";

        echo "<hr>";
        echo "<b style='font-size: 15px;'>Aktuelle Anzahl der Vokabeln:<br>";
        echo "<b style='color:red; font-size:18px'>" . $vokabel_anzahl . "</b>";
        echo '<br><br><br></div>';
    }


    /**
     * @return string
     */
    private function IsPosted(): string
    {
        if (!isset($_POST['deutsch'])) {
            $spa = '';
        } else {
            $spa = $_POST['deutsch'];
        }
        return $spa;
    }

}