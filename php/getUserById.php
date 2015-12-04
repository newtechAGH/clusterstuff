<?php
require "connect.php";

   $id= $_POST['id'];


   $query = "SELECT * FROM Users WHERE id='$id'";
   $val = mysqli_query($db,$query);


   if($val)
   {
      $user = mysqli_fetch_array($val);
      echo json_encode($user);
   }


 ?>
