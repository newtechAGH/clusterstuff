<?php
$nazwa = $_POST['nazwa'];
$opis = $_POST['opis'];
$kategoria = $_POST['kategoria'];



$elements = array();
array_push($elements,$nazwa,$opis,$kategoria);

echo json_encode($elements);
?>