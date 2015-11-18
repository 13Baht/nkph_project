<?php
include "chk_cookie_admin.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>จัดการข้อมูล</title>
</head>

<body>
<?php
$person_id = $_REQUEST['work_id'];
$st = $_REQUEST['st'];
include "config.php";
if ($st == "save") {
	//ตรวจสอบว่ามีข้อมูลแล้วหรือไม่
	$sql1 = "select person_id from user_work where person_id = \"$person_id\"";
	$result1 = mysql_query($sql1);
	$r1 = mysql_fetch_row($result1);
	if ($r1[0] != "") {
		echo "<hr>";
		echo "<center><br><font color='#FF0000'>ข้อมูลซ้ำ ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง!</font></center>";
		echo "<hr>";
		exit();
	}
}
if ($st == "edit" || $st == "del") {
	//ลบข้อมูลออกก่อน
	$sql_d = "delete from user_work where person_id = \"$person_id\"";
	$result_d = mysql_query($sql_d);
	//
	$sql_d2 = "delete from user_work_detail where person_id = \"$person_id\"";
	$result = mysql_query($sql_d2);
}
if ($st == "save" || $st == "edit") {
	//บันทึกข้อมูลใหม่
	$sql = "insert into user_work(person_id) values(\"$person_id\")";
	$result = mysql_query($sql);
	//รายละเอียด
	$sql_sd = "select sub_dept_id from tb_sub_dept where sub_dept_status = '1' order by sub_dept_id";
	$result_sd = mysql_query($sql_sd);
	while ($r_sd = mysql_fetch_array($result_sd)) {
		$cb = "sd_".$r_sd['sub_dept_id'];
		$ck = $_POST[$cb];
		if ($ck == "1") {
			//เพิ่มในตารางรายละเอียด
			$sql = "insert into user_work_detail(person_id, sub_dept_id) values('$person_id', '$r_sd[sub_dept_id]')";
			$result = mysql_query($sql);
		}
	} //end while
}
if ($result) {
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0;url=user.php'>";
}
?>
</body>
</html>