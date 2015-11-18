<?php
include "chk_cookie.php";
$year_budget_id = $_GET['year_budget_id'];
$strategic_hospital_name = $_GET['strategic_hospital_name'];
$s_status = $_GET['s_status'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sqlc = "select count(strategic_hospital_id) cc from strategic_hospital where strategic_hospital_year = '$year_budget_id'";
	$resultc = mysql_query($sqlc);
	$rc = mysql_fetch_row($resultc);
	$m = $rc[0] + 1;
	if (strlen($m) <= 1) {
		$m = "0".$m;
	}
	$strategic_hospital_id = $year_budget_id."-".$m;
	$sql = "insert into strategic_hospital(strategic_hospital_id, strategic_hospital_name, strategic_hospital_year, strategic_hospital_status) values(\"$strategic_hospital_id\", \"$strategic_hospital_name\", \"$year_budget_id\", \"$s_status\")";
}
if ($st == "edit") {
	$strategic_hospital_id = $_GET['strategic_hospital_id'];
	$sql = "update strategic_hospital set strategic_hospital_name = \"$strategic_hospital_name\", strategic_hospital_year = \"$year_budget_id\", strategic_hospital_status = \"$s_status\" where strategic_hospital_id = \"$strategic_hospital_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>