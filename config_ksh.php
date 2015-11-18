<?php
$host2 = "localhost";
$user2 = "keling";
$pass2 = "mis_dev";
$db2 = "db_ksh";
$conn2 = mysql_connect($host2, $user2, $pass2) or die('การเชื่อมต่อฐานข้อมูลล้มเหลว');
mysql_select_db($db2, $conn2);
mysql_query("set NAMES utf8", $conn2);
?>