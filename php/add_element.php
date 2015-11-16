<?php
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$kategoria = $_POST['kategoria'];



if($nazwa and $opis and $kategoria) {


  $db = new mysqli("localhost","root","root","clusterstuff");


     if($db->connect_error)
     {
     	 echo "error";
     }


     $sql = "INSERT INTO Elements (nazwa,kategoria,opis) VALUES ('".$nazwa."','".$kategoria."','".$opis."')";
    if(mysqli_query($db,$sql))
    {
      echo "added";
    }
    else {
      echo "error";
    }

    $db->close();
}

?>
