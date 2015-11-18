<?php
$user_login = $_POST['user_login'];
$pass_login = $_POST['pass_login'];
$user_type_id = $_POST['user_type_id'];
if ($user_login == "" || $pass_login == "") {
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo "<br><br><center>ข้อมูลผิดพลาด กรุณาตรวจสอบการกรอกข้อมูล</center>";
	exit();
}
include "config.php";
include "config_ksh.php";
//admin
if ($user_type_id == "1") {
	$sql = "select person_id from user_admin where user_login = \"$user_login\" and pass_login = \"$pass_login\"";
	$result = mysql_db_query($db, $sql);
	$r = mysql_fetch_row($result);
}
//ผู้อำนวยการ
if ($user_type_id == "2") {
	$sql2 = "select person_id from user_leader1 where user_login = '$user_login' and user_pass = '$pass_login'";
	$result2 = mysql_db_query($db, $sql2);
	$r = mysql_fetch_row($result2);
}
//รองผู้อำนวยการ
if ($user_type_id == "3") {
	$sql1 = "select person_id from personal where person_username = '$user_login' and person_password = '$pass_login' and person_state != '6'";
	$result1 = mysql_query($sql1);
	$r1 = mysql_fetch_row($result1);
	$sql2 = "select person_id from user_leader2 where person_id = '$r1[0]'";
	$result2 = mysql_db_query($db, $sql2);
	$r = mysql_fetch_row($result2);
}
//หัวหน้ากลุ่มงาน
if ($user_type_id == "4") {
	$sql1 = "select person_id from personal where person_username = '$user_login' and person_password = '$pass_login' and person_state != '6'";
	$result1 = mysql_query($sql1);
	$r1 = mysql_fetch_row($result1);
	$sql2 = "select person_id from user_group_work where person_id = '$r1[0]'";
	$result2 = mysql_db_query($db, $sql2);
	$r = mysql_fetch_row($result2);
}
//หน่วยงาน / ทีม
if ($user_type_id == "5") {
	$sql1 = "select person_id from personal where person_username = '$user_login' and person_password = '$pass_login' and person_state != '6'";
	$result1 = mysql_query($sql1);
	$r1 = mysql_fetch_row($result1);
	$sql2 = "select person_id from user_work where person_id = '$r1[0]'";
	$result2 = mysql_db_query($db, $sql2);
	$r = mysql_fetch_row($result2);
}
if ($r[0] != "") {
	setcookie("cook_id", $r[0]);
	setcookie("cook_user_type_id", $user_type_id);
	if ($user_type_id == "1") {
		setcookie("cook_user_type_name", "ผู้ดูแลระบบ");
	}
	if ($user_type_id == "2") {
		setcookie("cook_user_type_name", "ผู้อำนวยการ");
	}
	if ($user_type_id == "3") {
		setcookie("cook_user_type_name", "รองผู้อำนวยการ");
	}
	if ($user_type_id == "4") {
		setcookie("cook_user_type_name", "หัวหน้ากลุ่มงาน");
	}
	if ($user_type_id == "5") {
		setcookie("cook_user_type_name", "หน่วยงาน / ทีม");
	}
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
} else {
	echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
	echo "<script>";
	echo "alert('ข้อมูลการล็อกอินไม่ถูกต้อง')";
	echo "</script>";
	echo "<meta http-equiv='refresh' content='0;url=index.php'>";
}
?>