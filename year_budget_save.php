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
$year_budget_id = $_REQUEST['year_budget_id'];
$st = $_REQUEST['st'];
include "config.php";
if ($st == "save") {
	//ตรวจสอบว่ามีข้อมูลแล้วหรือไม่
	$sql1 = "select year_budget_id from year_budget where year_budget_id = \"$year_budget_id\"";
	$result1 = mysql_query($sql1);
	$r1 = mysql_fetch_row($result1);
	if ($r1[0] != "") {
		echo "<hr>";
		echo "<center><br><font color='#FF0000'>ข้อมูลซ้ำ ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลให้ถูกต้อง!</font></center>";
		echo "<hr>";
		exit();
	}
	$sql = "insert into year_budget(year_budget_id) values(\"$year_budget_id\")";
	$result = mysql_query($sql);
}
if ($st == "del") {
	$sql = "delete from year_budget where year_budget_id = \"$year_budget_id\"";
	$result = mysql_query($sql);
}
if ($result) {
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0;url=year_budget.php'>";
}
?>
</body>
</html>