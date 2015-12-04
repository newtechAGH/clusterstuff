<?php

$user = $_POST['user'];
$element = $_POST['element'];
$info = $_POST['info'];

require "connect.php";

if($user and $element)
{

   $query = "INSERT INTO ElementsRequest (user,element,opis) VALUES('$user','$element','$info')";
   if(mysqli_query($db,$query))
   {
     echo "added";
   }
   else {
     echo "error";
   }
}
else {
  echo "error";
}




 ?>
