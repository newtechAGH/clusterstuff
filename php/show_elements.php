<?php

$category = $_POST['kategoria'];
$search = $_POST['search'];

$db = new mysqli("localhost","root","root","clusterstuff");
   if($db->connect_error)
   {
   	 echo "error";
   }


   if($category!="all")
   {
     $query = "SELECT * FROM Elements WHERE kategoria LIKE '" . mysql_escape_string($category) . "';";
   }
   else {
     $query = "SELECT * FROM Elements";
   }

   $val = mysqli_query($db,$query);


  if($val and (mysqli_num_rows($val)>0))
  {


     $elements = array();
     while($row = mysqli_fetch_assoc($val))
     {
    if(!empty($search))
    {
        if((strpos($row["nazwa"],$search)!==false) || (strpos($row["opis"],$search)!==false))
         {
           array_push($elements,array("id"=>$row["id"],"nazwa"=>$row["nazwa"],"kategoria"=>$row["kategoria"],"opis"=>$row["opis"],"wyp"=>$row["wypozyczone"],"uszk"=>$row["uszkodzone"]));

        }
      }
    else {
      array_push($elements,array("id"=>$row["id"],"nazwa"=>$row["nazwa"],"kategoria"=>$row["kategoria"],"opis"=>$row["opis"],"wyp"=>$row["wypozyczone"],"uszk"=>$row["uszkodzone"]));

    }


     }

     echo json_encode($elements);

}
else {
  echo "error";
}


$db->close();

 ?>
