<?php
session_start();
include "chk_cookie.php";
include "myclass.php";
$project_activity_id = date("YmdHis")."-".session_id();
$project_id = $_GET['project_id'];
$activity_name = $_GET['activity_name'];
$activity_weight = $_GET['activity_weight'];
$activity_begin_date = FormatDateDefault($_GET['activity_begin_date']);
$activity_end_date = FormatDateDefault($_GET['activity_end_date']);
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_activity(project_activity_id, project_id, activity_name, activity_weight, activity_begin_date, activity_end_date) values(\"$project_activity_id\", \"$project_id\", \"$activity_name\", \"$activity_weight\", \"$activity_begin_date\", \"$activity_end_date\")";
}
if ($st == "del") {
	$project_activity_id = $_GET['project_activity_id'];
	$sql = "delete from tb_project_activity where project_activity_id = \"$project_activity_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>