<?php

$user = $_POST['user'];
$element = $_POST['element'];
$info = $_POST['info'];


if($user and $element)
{
  $db = new mysqli("localhost","root","root","clusterstuff");
     if($db->connect_error)
     {
       echo "error";
     }
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
