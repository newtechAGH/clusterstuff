<?php
$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
   	 echo "error";
   }
   $query = "SELECT * FROM Kategorie";
   $zapytanie = mysqli_query($db,$query);

   if($zapytanie and mysqli_num_rows($zapytanie)>0)
   {
     $data = array();
     while($row = mysqli_fetch_assoc($zapytanie))
     {
          array_push($data,array("id"=>$row["id"],"nazwa"=>$row["nazwa"],"szukaj"=>$row["szukaj"]));
     }
     echo json_encode($data);
   }
   else {
     echo "error";
   }

   $db->close();


 ?>
