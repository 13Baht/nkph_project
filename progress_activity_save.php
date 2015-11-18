<?php
session_start();
include "chk_cookie.php";
include "myclass.php";
$project_activity_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$activity_name = $_GET['activity_name'];
$activity_weight = $_GET['activity_weight'];
$activity_begin_date = FormatDateDefault($_GET['activity_begin_date']);
$activity_end_date = FormatDateDefault($_GET['activity_end_date']);
$result = $_GET['result'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_activity_progress(project_activity_id, project_id, activity_name, activity_weight, activity_begin_date, activity_end_date, result) values(\"$project_activity_id\", \"$project_id\", \"$activity_name\", \"$activity_weight\", \"$activity_begin_date\", \"$activity_end_date\", \"$result\")";
}
if ($st == "edit") {
	$project_activity_id = $_GET['project_activity_id'];
	$sql = "update tb_project_activity_progress set activity_name = \"$activity_name\", activity_weight = \"$activity_weight\", activity_begin_date = \"$activity_begin_date\", activity_end_date = \"$activity_end_date\", result = \"$result\" where project_activity_id = \"$project_activity_id\"";
}
if ($st == "del") {
	$project_activity_id = $_GET['project_activity_id'];
	$sql = "delete from tb_project_activity_progress where project_activity_id = \"$project_activity_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>