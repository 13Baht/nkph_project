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
$person_id = $_POST['person_id'];
$user_login = $_POST['user_login'];
$user_pass = $_POST['user_pass'];
$full_name = $_POST['full_name'];
include "config.php";
$sql = "update user_leader1 set person_id = \"$person_id\", user_login = \"$user_login\", user_pass = \"$user_pass\", full_name = \"$full_name\"";
$result = mysql_query($sql);
if ($result) {
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0;url=user.php'>";
}
?>
</body>
</html>