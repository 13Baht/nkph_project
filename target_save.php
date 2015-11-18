<?php
include "chk_cookie.php";
$year_budget_id = $_GET['year_budget_id'];
$responsibility_id = $_GET['responsibility_id'];
$target_name = $_GET['target_name'];
$s_status = $_GET['s_status'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sqlc = "select count(target_id) cc from target where target_year = '$year_budget_id'";
	$resultc = mysql_query($sqlc);
	$rc = mysql_fetch_row($resultc);
	$m = $rc[0] + 1;
	if (strlen($m) <= 1) {
		$m = "0".$m;
	}
	$target_id = $year_budget_id."-".$m;
	$sql = "insert into target(target_id, responsibility_id, target_name, target_year, target_status) values(\"$target_id\", \"$responsibility_id\", \"$target_name\", \"$year_budget_id\", \"$s_status\")";
}
if ($st == "edit") {
	$target_id = $_GET['target_id'];
	$sql = "update target set responsibility_id = \"$responsibility_id\", target_name = \"$target_name\", target_year = \"$year_budget_id\", target_status = \"$s_status\" where target_id = \"$target_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>