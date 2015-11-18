<?php
session_start();
include "chk_cookie.php";
$problem_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$text_problem = $_GET['text_problem'];
$text_problem_suggestion = $_GET['text_problem_suggestion'];
$fullname = $_GET['fullname'];
$datenow = date("Y-m-d H:i:s");
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_problem(problem_id, project_id, text_problem, text_problem_suggestion, user_problem_id, user_problem, date_problem) values(\"$problem_id\", \"$project_id\", \"$text_problem\", \"$text_problem_suggestion\", \"$_COOKIE[cook_id]\", \"$fullname\", \"$datenow\")";
}
if ($st == "del") {
	$problem_id = $_GET['problem_id'];
	$sql = "delete from tb_project_problem where problem_id = \"$problem_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>