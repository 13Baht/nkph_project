<?php
session_start();
include "chk_cookie.php";
$pay_target_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$quarter_id = $_GET['quarter_id'];
$target_money = $_GET['target_money'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_pay_target(pay_target_id, project_id, quarter_id, target_money) values(\"$pay_target_id\", \"$project_id\", \"$quarter_id\", \"$target_money\")";
}
if ($st == "del") {
	$pay_target_id = $_GET['pay_target_id'];
	$sql = "delete from tb_project_pay_target where pay_target_id = \"$pay_target_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>