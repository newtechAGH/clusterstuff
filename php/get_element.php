<?php

$id = $_POST['id'];

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
     echo "error";
   }

   $query = "SELECT * FROM Elements WHERE id='$id'";
   $val = mysqli_query($db,$query);


   if($val)
   {
      $element = mysqli_fetch_array($val);
      echo json_encode($element);
   }


$db->close();

 ?>
