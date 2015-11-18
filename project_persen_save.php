<?php
include "chk_cookie.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$project_persen = $_GET['project_persen'];
include "config.php";
$sql = "update tb_project set project_persen = \"$project_persen\" where project_id = \"$project_id\"";
$result = mysql_query($sql);
?>