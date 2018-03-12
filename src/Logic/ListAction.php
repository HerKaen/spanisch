<?php

namespace spanisch\Logic;


use spanisch\Logic\Funktionen\DbConnect;

class ListAction extends DbConnect
{
    public function __invoke()
    {
        echo '<br><center>';

        require "Formulare/Navigation.html";
        require "Formulare/Panel.html";

        echo '<br>';

        $db = $this->connect();

        if (isset($_POST["selector"])) {
            $query = "SELECT * FROM spanisch WHERE kategorie = '$_POST[kategorie]'";

            $result = $db->query($query);

            echo '<br>';

            echo "<table border='3' style='text-align: center; border-color:black; background-color:yellowgreen' width='50%';><tr style='font-weight: bold; color:darkslategrey;'><td width='2%'>ID</td><td width='5%'>Kategorie</td><td width='5%'>Deutsch</td><td width='5%'>Spanisch</td></tr>";

            while ($row = $result->fetch_assoc()) {

                echo "<tr><td>" . $row['id'] . "</td><td>" . $row['kategorie'] . '</td><td>' . $row['deutsch'] . '</td><td>' . $row['spanisch'] . "</td></tr>";
            }
            echo "</table>";

        } else {
            $query = "SELECT * FROM spanisch";

            require "Funktionen/Pagination.php";
        }
    }
}