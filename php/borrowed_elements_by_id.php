<?php

$id = $_POST['id'];

require "connect.php";

   $query = "SELECT * FROM ElementsBorrowed WHERE id_element='$id'";
   $val = mysqli_query($db,$query);


   if($val)
   {
      $element = mysqli_fetch_array($val);
      echo json_encode($element);
   }


$db->close();

 ?>
