<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
$db->query("UPDATE incidents SET status = ".$_POST['status']." WHERE id = ".$_POST['id']."");
header ("location: main.php");
?>