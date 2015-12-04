<?php
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$kategoria = $_POST['kategoria'];

require "connect.php";

if($nazwa and $opis and $kategoria) {


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
