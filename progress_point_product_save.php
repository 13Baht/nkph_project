<?php
session_start();
include "chk_cookie.php";
$point_product_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$point_product = $_GET['point_product'];
$point_product_unit = $_GET['point_product_unit'];
$point_product_target = $_GET['point_product_target'];
$result = $_GET['result'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_point_product_progress(point_product_id, project_id, point_product, point_product_unit, point_product_target, result) values(\"$point_product_id\", \"$project_id\", \"$point_product\", \"$point_product_unit\", \"$point_product_target\", \"$result\")";
}
if ($st == "edit") {
	$point_product_id = $_GET['point_product_id'];
	$sql = "update tb_project_point_product_progress set point_product = \"$point_product\", point_product_unit = \"$point_product_unit\", point_product_target = \"$point_product_target\", result = \"$result\" where point_product_id = \"$point_product_id\"";
}
if ($st == "del") {
	$point_product_id = $_GET['point_product_id'];
	$sql = "delete from tb_project_point_product_progress where point_product_id = \"$point_product_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>