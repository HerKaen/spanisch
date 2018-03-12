<?php

echo "<form action='' method='POST''>";

$db3 = mysqli_connect("localhost", "root", "", "nico");

$query3 = "SELECT * FROM spanisch";


echo '<br>';

echo "<table border='3' style='text-align: center; border-color:black; background-color:lightblue' width='40%';><tr style='font-weight: bold;'><td width='2%'>ID</td><td width='5%'>Kategorie</td><td width='5%'>Deutsch</td><td width='5%'>Spanisch</td></tr>";

echo "<tr><td>" . '<input type="text" name="Id2">' . "</td><td>" .
    '<select name="kategorie2" size="1"><option value="" checked></option><option value="Anderes">Anderes</option><option value="Hauptwort">Hauptwort</option><option value="Verb">Verb</option><option value="Adjektiv">Adjektiv</option><option value="Satz">Satz</option></select>'
    . '</td><td>' . '<input type="text" name="deutsch2">' . '</td><td>' . '<input type="text" name="spanisch2">' . '</td></tr>';

echo "</table>";

echo '<br>';
echo '<input type="submit" name="submit2" value="Änderung abschicken" class="btn-primary">';

echo '</form>';


if (!empty($_POST["submit2"])) {


    $id2 = $_POST['Id2'];
    $kategorie2 = $_POST['kategorie2'];
    $deutsch2 = $_POST['deutsch2'];
    $spanisch2 = $_POST['spanisch2'];


    if (isset($_POST['kategorie2']) && $_POST['kategorie2'] != '') {
        $query3 = "UPDATE spanisch SET kategorie='$kategorie2' WHERE Id='$id2'";
        mysqli_query($db3, $query3);
    }
    if (isset($_POST['deutsch2']) && $_POST['deutsch2'] != '') {
        $query3 = "UPDATE spanisch SET deutsch='$deutsch2' WHERE Id='$id2'";
        mysqli_query($db3, $query3);
    }
    if (isset($_POST['spanisch2']) && $_POST['spanisch2'] != '') {
        $query3 = "UPDATE spanisch SET spanisch='$spanisch2' WHERE Id='$id2'";
        mysqli_query($db3, $query3);
    }

    mysqli_close($db3);

}

echo '</form>';

?>