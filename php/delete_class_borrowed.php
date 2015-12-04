<?php
   $id = $_POST['id'];

  require "connect.php";

    $query = "UPDATE Elements SET wypozyczone = '0' WHERE id='$id'";
    if(mysqli_query($db,$query))
    {
      echo "updated";
    }
    else {
      echo "error";
    }

 $db->close();
 ?>
