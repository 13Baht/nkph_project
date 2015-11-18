<?php
$host = "localhost";
$user = "keling";
$pass = "mis_dev";
$db = "db_nkph_project";
$conn = mysql_connect($host, $user, $pass) or die('การเชื่อมต่อฐานข้อมูลล้มเหลว');
mysql_select_db($db, $conn);
mysql_query("set NAMES utf8", $conn);
$title_web = "ระบบติดตามความก้าวหน้าและประเมินผลแผนงานโครงการ";
?>