<?php

$id = $_POST['id'];

require "connect.php";

   $query = "DELETE FROM ElementsRequest WHERE id='$id'";
   $val = mysqli_query($db,$query);
   if($val)
   {
     echo "ok";
   }
?>
