<?php

$tabela= $_POST['tabela'];

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
     echo "error";
   }

     $query = "SELECT id FROM $tabela";

   $val = mysqli_query($db,$query);

$count = mysqli_num_rows($val);

echo $count;

 ?>
