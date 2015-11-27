<?php
   $id = $_POST['id'];

   $db = new mysqli("localhost","root","root","clusterstuff");
      if($db->connect_error)
      {
        echo "error";
      }


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
