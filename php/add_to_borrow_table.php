<?php

$user = $_POST['user'];
$element  = $_POST['element'];

require "connect.php";

$dat = date("Y-m-d");
$query = "INSERT INTO ElementsBorrowed (id_element,id_user,data) VALUES ('$element','$user','$dat')";
$query_update = "UPDATE Elements SET wypozyczone='1' WHERE id='$element'";


$val = mysqli_query($db,$query);
$val_update = mysqli_query($db,$query_update);
if($val and $val_update);
{
  echo "Added";
}

$db->close();

 ?>
