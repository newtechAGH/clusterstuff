<?php

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
   	 echo "error";
   }

   $query = "SELECT * FROM Elements";
   $val = mysqli_query($db,$query);

     $elements = array();
     while($row = mysqli_fetch_assoc($val))
     {

       array_push($elements,array("id"=>$row["id"],"nazwa"=>$row["nazwa"],"kategoria"=>$row["kategoria"],"opis"=>$row["opis"],"wyp"=>$row["wypozyczone"],"uszk"=>$row["uszkodzone"]));

     }

     echo json_encode($elements);




$db->close();

 ?>
