<?php

$id = $_POST['id'];

require "connect.php";
   $query = "SELECT * FROM Elements WHERE id='$id'";
   $val = mysqli_query($db,$query);


   if($val)
   {
      $element = mysqli_fetch_array($val);
      echo json_encode($element);
   }


$db->close();

 ?>
