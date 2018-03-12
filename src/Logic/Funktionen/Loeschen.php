<?php
echo "<form action='' method='POST''>";

$db2 = mysqli_connect("localhost", "root", "", "nico");

$query2 = "SELECT * FROM spanisch";

echo "<table border='3' style='text-align: center; border-color:black; background-color:orangered' width='15%';><tr style='font-weight: bold;'><td>ID</td></tr>";

echo "<tr><td>" . '<input type="text" name="Id2">' . "</td></tr>";

echo "</table>";

echo '<br>';
echo '<input type="submit" name="submit" value="Eintrag Löschen" class="btn-danger">';

if (!empty($_POST["submit"]) && $_POST['Id2'] != '') {

    $id2 = $_POST['Id2'];

    $query2 = "DELETE FROM spanisch WHERE Id='$id2'";
    mysqli_query($db2, $query2);

    mysqli_close($db2);

}

echo '</form>';

?>