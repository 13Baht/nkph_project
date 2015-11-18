<?php
session_start();
include "chk_cookie.php";
include "myclass.php";
$pay_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$pay_type_id = $_GET['pay_type_id'];
$pay_type_sub_id = $_GET['pay_type_sub_id'];
$pay_type_text = $_GET['pay_type_text'];
$budget_from_id = $_GET['budget_from_id'];
$pay_date = FormatDateDefault($_GET['pay_date']);
$pay_unit = $_GET['pay_unit'];
$pay_money = $_GET['pay_money'];
$pay_total = $_GET['pay_total'];
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_pay(pay_id, project_id, pay_type_id, pay_type_sub_id, pay_type_text, budget_from_id, pay_date, pay_unit, pay_money, pay_total) values(\"$pay_id\", \"$project_id\", \"$pay_type_id\", \"$pay_type_sub_id\", \"$pay_type_text\", \"$budget_from_id\", \"$pay_date\", \"$pay_unit\", \"$pay_money\", \"$pay_total\")";
}
if ($st == "del") {
	$pay_id = $_GET['pay_id'];
	$sql = "delete from tb_project_pay where pay_id = \"$pay_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>