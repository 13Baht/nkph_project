<?php
include "chk_cookie.php";
$year_budget_id = $_GET['year_budget_id'];
$responsibility_name = $_GET['responsibility_name'];
$s_status = $_GET['s_status'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sqlc = "select count(responsibility_id) cc from responsibility where responsibility_year = '$year_budget_id'";
	$resultc = mysql_query($sqlc);
	$rc = mysql_fetch_row($resultc);
	$m = $rc[0] + 1;
	if (strlen($m) <= 1) {
		$m = "0".$m;
	}
	$responsibility_id = $year_budget_id."-".$m;
	$sql = "insert into responsibility(responsibility_id, responsibility_name, responsibility_year, responsibility_status) values(\"$responsibility_id\", \"$responsibility_name\", \"$year_budget_id\", \"$s_status\")";
}
if ($st == "edit") {
	$responsibility_id = $_GET['responsibility_id'];
	$sql = "update responsibility set responsibility_name = \"$responsibility_name\", responsibility_year = \"$year_budget_id\", responsibility_status = \"$s_status\" where responsibility_id = \"$responsibility_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>