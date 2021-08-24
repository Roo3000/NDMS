<?php
 include_once 'include/database.php';
 $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

 $id=$_GET['id'];
 
 $sql = "DELETE FROM nexttel.component WHERE id LIKE '$id'";
 $results=$db->query($sql);
 
 header("Location:handover.php");
?>