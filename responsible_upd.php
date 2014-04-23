<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
$db->query("UPDATE incidents SET responsible = ".$_POST['responsible']." WHERE id = ".$_POST['id']."");
header ("location: main.php");
?>