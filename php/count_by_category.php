<?php

$category= $_POST['kategoria'];

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
     echo "error";
   }


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
