<?php
$id = $_POST['id'];

require "connect.php";

$query  = "SELECT * FROM ElementsBorrowed WHERE id_user ='$id'";
$val = mysqli_query($db,$query);
$arr = array();
while($row = mysqli_fetch_array($val))
{
  array_push($arr,array('id'=>$row['id'],'user'=>$row['id_user'],'element'=>$row['id_element'],'data'=>$row['data']));
}
echo json_encode($arr);
$db->close();


 ?>
