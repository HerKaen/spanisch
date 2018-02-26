<?php

namespace spanisch\Logic;


class ListAction
{
    public function __invoke()
    {
        echo '<br><center>';

        require "Navigation.html";
        require "Panel.html";

        $db = mysqli_connect("localhost", "root", "", "nico");

        if (isset($_POST["selector"])) {
            $sql = "SELECT * FROM spanisch WHERE kategorie = $_POST[kategorie]";
        } else {
            $sql = "SELECT * FROM spanisch";
        }

        $result = mysqli_query($db, $sql);

        echo '<br>';

        echo "<table border='3' style='text-align: center; border-color:black; background-color:yellowgreen' width='50%';><tr style='font-weight: bold; color:darkslategrey;'><td width='2%'>ID</td><td width='5%'>Kategorie</td><td width='5%'>Deutsch</td><td width='5%'>Spanisch</td></tr>";

        while ($row = mysqli_fetch_assoc($result)) {

            echo "<tr><td>" . $row['id'] . "</td><td>" . $row['kategorie'] . '</td><td>' . $row['deutsch'] . '</td><td>' . $row['spanisch'] . "</td></tr>";
        }
        echo "</table>";

        mysqli_close($db);
    }
}