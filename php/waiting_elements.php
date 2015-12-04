<?php

require "connect.php";

$query  = "SELECT * FROM ElementsRequest";
$val = mysqli_query($db,$query);
$arr = array();
while($row = mysqli_fetch_array($val))
{
  array_push($arr,array('id'=>$row['id'],'user'=>$row['user'],'element'=>$row['element'],'info'=>$row['opis']));
}
echo json_encode($arr);
$db->close();


 ?>
