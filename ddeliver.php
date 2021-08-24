<?php
 include_once 'include/database.php';
 $db= new PDO("mysql:host=" . HOST .";dbname" . DB_NAME,USER,PASS);

 $id=$_GET['did'];
 
 $sql = "DELETE FROM nexttel.deliver WHERE did LIKE '$id'";
 $results=$db->query($sql);
 
 header("Location:handover.php");
?>