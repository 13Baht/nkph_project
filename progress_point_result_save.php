<?php
session_start();
include "chk_cookie.php";
$point_result_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$point_result = $_GET['point_result'];
$point_result_unit = $_GET['point_result_unit'];
$point_result_target = $_GET['point_result_target'];
$result = $_GET['result'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_point_result_progress(point_result_id, project_id, point_result, point_result_unit, point_result_target, result) values(\"$point_result_id\", \"$project_id\", \"$point_result\", \"$point_result_unit\", \"$point_result_target\", \"$result\")";
}
if ($st == "edit") {
	$point_result_id = $_GET['point_result_id'];
	$sql = "update tb_project_point_result_progress set point_result = \"$point_result\", point_result_unit = \"$point_result_unit\", point_result_target = \"$point_result_target\", result = \"$result\" where point_result_id = \"$point_result_id\"";
}
if ($st == "del") {
	$point_result_id = $_GET['point_result_id'];
	$sql = "delete from tb_project_point_result_progress where point_result_id = \"$point_result_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>