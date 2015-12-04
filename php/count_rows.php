<?php

$tabela= $_POST['tabela'];

require "connect.php";

     $query = "SELECT id FROM $tabela";

   $val = mysqli_query($db,$query);

$count = mysqli_num_rows($val);

echo $count;

 ?>
