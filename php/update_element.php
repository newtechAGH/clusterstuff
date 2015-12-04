<?php

$id = $_POST['id'];
$nazwa = $_POST['nazwa'];
$kategoria = $_POST['kategoria'];
$opis = $_POST['opis'];
$zepsuty = $_POST['zepsuty'];

require "connect.php";

if($id and $nazwa and $kategoria)
{


   $query = "UPDATE Elements SET nazwa='$nazwa',kategoria='$kategoria',opis='$opis',uszkodzone='$zepsuty' WHERE id = '$id'";
   mysqli_query($db,$query);

    $db->close();
}

 ?>
