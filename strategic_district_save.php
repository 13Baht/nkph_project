<?php
include "chk_cookie.php";
$year_budget_id = $_GET['year_budget_id'];
$strategic_district_name = $_GET['strategic_district_name'];
$s_status = $_GET['s_status'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sqlc = "select count(strategic_district_id) cc from strategic_district where strategic_district_year = '$year_budget_id'";
	$resultc = mysql_query($sqlc);
	$rc = mysql_fetch_row($resultc);
	$m = $rc[0] + 1;
	if (strlen($m) <= 1) {
		$m = "0".$m;
	}
	$strategic_district_id = $year_budget_id."-".$m;
	$sql = "insert into strategic_district(strategic_district_id, strategic_district_name, strategic_district_year, strategic_district_status) values(\"$strategic_district_id\", \"$strategic_district_name\", \"$year_budget_id\", \"$s_status\")";
}
if ($st == "edit") {
	$strategic_district_id = $_GET['strategic_district_id'];
	$sql = "update strategic_district set strategic_district_name = \"$strategic_district_name\", strategic_district_year = \"$year_budget_id\", strategic_district_status = \"$s_status\" where strategic_district_id = \"$strategic_district_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>