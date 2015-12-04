<?php
require "connect.php";

   $login = $_POST['login'];
   $password = $_POST['password'];


   $query = "SELECT * FROM Users WHERE mail='$login' AND password='$password'";
   $val = mysqli_query($db,$query);


   if($val)
   {
      $user = mysqli_fetch_array($val);
      echo json_encode($user);
   }

 ?>
