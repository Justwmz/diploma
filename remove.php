<?php
include_once 'lib/safemysql.class.php';
$db = new SafeMySQL();
$db->query("DELETE FROM incidents WHERE id = ".$_GET['id']."");
header ("location: main.php");
?>