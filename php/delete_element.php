<?php
   $id = $_POST['id'];

   require "connect.php";


    $query = "DELETE FROM Elements WHERE id LIKE '" . mysql_escape_string($id) . "';";
    if(mysqli_query($db,$query))
    {
      echo "deleted";
    }
    else {
      echo "error";
    }

 ?>
