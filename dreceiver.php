<?php
 include_once 'include/database.php';
 $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

 $id=$_GET['rid'];
 
 $sql = "DELETE FROM nexttel.receiver WHERE rid LIKE '$id'";
 $results=$db->query($sql);
 
 header("Location:handover.php");
?>