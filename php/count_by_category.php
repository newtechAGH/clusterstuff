<?php

$category= $_POST['kategoria'];

require "connect.php";


   if($category!="all")
   {
     $query = "SELECT id FROM Elements WHERE kategoria LIKE '" . mysql_escape_string($category) . "';";
   }
   else {
     $query = "SELECT id FROM Elements";
   }

   $val = mysqli_query($db,$query);

$count = mysqli_num_rows($val);

echo $count;

 ?>
