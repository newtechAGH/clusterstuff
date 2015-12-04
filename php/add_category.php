<?php
$kategoria= $_POST['kategoria'];
$szukaj = $_POST['szukaj'];


require "connect.php";

if($szukaj and $kategoria) {


     $sql = "INSERT INTO Kategorie (nazwa,szukaj) VALUES ('$kategoria','$szukaj')";
    if(mysqli_query($db,$sql))
    {
      echo "added";
    }
    else {
      echo "error";
    }

  
}

?>
