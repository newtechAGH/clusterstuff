<?php

$id = $_POST['id'];
$nazwa = $_POST['nazwa'];
$kategoria = $_POST['kategoria'];
$opis = $_POST['opis'];

echo $id;
echo $nazwa;

if($id and $nazwa and $kategoria)
{
  $db = new mysqli("localhost","root","root","clusterstuff");


     if($db->connect_error)
     {
     	 echo "error";
     }

   $query = "UPDATE Elements SET nazwa='$nazwa',kategoria='$kategoria',opis='$opis' WHERE id = '$id'";
   mysqli_query($db,$query);

    $db->close();
}

 ?>
