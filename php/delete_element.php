<?php
   $id = $_POST['id'];

   $db = new mysqli("localhost","root","root","clusterstuff");
      if($db->connect_error)
      {
        echo "error";
      }


    $query = "DELETE FROM Elements WHERE id LIKE '" . mysql_escape_string($id) . "';";
    if(mysqli_query($db,$query))
    {
      echo "deleted";
    }
    else {
      echo "error";
    }

 ?>
