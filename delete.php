<?php

include_once 'include/database.php';
$db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

$id=$_GET['id'];

$sql="DELETE FROM nexttel.datacenter WHERE id LIKE '$id'";
$data=$db->query($sql);

header("Location:datacenter.php");

?>


