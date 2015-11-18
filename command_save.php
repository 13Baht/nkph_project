<?php
session_start();
include "chk_cookie.php";
$command_id = date("YmdHis")."-".session_id();
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$text_command = $_GET['text_command'];
$fullname = $_GET['fullname'];
$datenow = date("Y-m-d H:i:s");
$st = $_GET['st'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_command(command_id, project_id, text_command, user_command_id, user_command, date_command) values(\"$command_id\", \"$project_id\", \"$text_command\", \"$_COOKIE[cook_id]\", \"$fullname\", \"$datenow\")";
}
if ($st == "del") {
	$command_id = $_GET['command_id'];
	$sql = "delete from tb_project_command where command_id = \"$command_id\"";
}
if ($st == "answer") {
	$command_id = $_GET['command_id'];
	$answer_command_text = $_GET['answer_command_text'];
	$sql = "update tb_project_command set answer_command_text = \"$answer_command_text\", answer_command_user = \"$fullname\", answer_command_date = \"$datenow\" where command_id = \"$command_id\"";
}
$result = mysql_query($sql);
echo "Save OK!";
?>