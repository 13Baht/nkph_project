<?php
session_start();
include "chk_cookie.php";
$point_result_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$point_result = $_GET['point_result'];
$point_result_unit = $_GET['point_result_unit'];
$point_result_target = $_GET['point_result_target'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_point_result(point_result_id, project_id, point_result, point_result_unit, point_result_target) values(\"$point_result_id\", \"$project_id\", \"$point_result\", \"$point_result_unit\", \"$point_result_target\")";
}
if ($st == "del") {
	$point_result_id = $_GET['point_result_id'];
	$sql = "delete from tb_project_point_result where point_result_id = \"$point_result_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>