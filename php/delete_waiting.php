<?php

$id = $_POST['id'];

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
     echo "error";
   }

   $query = "DELETE FROM ElementsRequest WHERE id='$id'";
   $val = mysqli_query($db,$query);
   if($val)
   {
     echo "ok";
   }
?>
