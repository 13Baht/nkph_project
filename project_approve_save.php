<?php
include "chk_cookie.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$project_approve = $_GET['project_approve'];
$approve_date = FormatDateDefault($_GET['approve_date']);
include "config.php";
$sql = "update tb_project set project_approve = \"$project_approve\", approve_date = \"$approve_date\" where project_id = \"$project_id\"";
$result = mysql_query($sql);
?>