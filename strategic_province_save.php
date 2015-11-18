<?php
include "chk_cookie.php";
$year_budget_id = $_GET['year_budget_id'];
$strategic_province_name = $_GET['strategic_province_name'];
$s_status = $_GET['s_status'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sqlc = "select count(strategic_province_id) cc from strategic_province where strategic_province_year = '$year_budget_id'";
	$resultc = mysql_query($sqlc);
	$rc = mysql_fetch_row($resultc);
	$m = $rc[0] + 1;
	if (strlen($m) <= 1) {
		$m = "0".$m;
	}
	$strategic_province_id = $year_budget_id."-".$m;
	$sql = "insert into strategic_province(strategic_province_id, strategic_province_name, strategic_province_year, strategic_province_status) values(\"$strategic_province_id\", \"$strategic_province_name\", \"$year_budget_id\", \"$s_status\")";
}
if ($st == "edit") {
	$strategic_province_id = $_GET['strategic_province_id'];
	$sql = "update strategic_province set strategic_province_name = \"$strategic_province_name\", strategic_province_year = \"$year_budget_id\", strategic_province_status = \"$s_status\" where strategic_province_id = \"$strategic_province_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>