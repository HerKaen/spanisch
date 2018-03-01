<?php

namespace spanisch\Logic;

echo '<br><center>';

require "Formulare/Navigation.html";

class GerSpaAction
{
    public function __invoke()
    {
        session_start();

        require "Formulare/FormularGerSpa.html";


        if (!isset($_POST['spanisch'])) {
            $spa = '';
        } else {
            $spa = $_POST['spanisch'];
        }

        $db = mysqli_connect("localhost", "root", "", "nico");
        $sql = "SELECT * FROM spanisch";
        $result = mysqli_query($db, $sql);
        $deutsch = array();
        while ($row = mysqli_fetch_array($result)) {
            $deutsch[] = $row['deutsch'];
        }

        $sql2 = "SELECT * FROM spanisch";
        $result2 = mysqli_query($db, $sql2);
        $spanisch = array();
        while ($row2 = mysqli_fetch_array($result2)) {
            $spanisch[] = $row2['spanisch'];
        }

        $vokabel_anzahl = count($deutsch);

        echo "<hr>";

        echo "<b style='font-size: 15px;'>Ihre Antwort ist: </b>";
        echo "<br>";

        if ($spanisch[$_SESSION['zufall']] == $spa) {
            echo "<b style='font-size: 18px; color:green'>Richtig</b>";
        } else {
            echo "<b style='font-size: 18px; color:red'>Falsch</b><br>";
            echo "<hr><b style='font-size: 15px; color:green'>Die richtige Lösung wäre gewesen:</b><br>";
            echo "<b style='font-size:18px;'>" . $spanisch[$_SESSION['zufall']] . "</b>";
        }

        echo "<hr>";

        $_SESSION['zufall'] = rand(0, $vokabel_anzahl - 1);

        echo "<b style='font-size: 15px; color:darkblue'>Das nächste gesuchte Wort ist: </b><br>";

        echo "<b style='font-size: 18px; color:mediumpurple'>" . $deutsch[$_SESSION['zufall']] . "</b>";

        echo "<hr>";
        echo "<b style='font-size: 15px;'>Aktuelle Anzahl der Vokabeln:<br>";
        echo "<b style='color:red; font-size:18px'>" . $vokabel_anzahl . "</b>";
        echo '<br><br><br></div>';
    }
}