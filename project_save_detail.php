<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>จัดการข้อมูล</title>
</head>

<body>
<?php
$project_id = $_POST['project_id2'];
$project_reason = $_POST['project_reason'];
$project_objective = $_POST['project_objective'];
$project_target_group = $_POST['project_target_group'];
$project_interest_id = $_POST['project_interest_id'];
$project_adviser_name = $_POST['project_adviser_name'];
$project_adviser_position = $_POST['project_adviser_position'];
$project_adviser_email = $_POST['project_adviser_email'];
$project_adviser_tel = $_POST['project_adviser_tel'];
$project_responsible_name = $_POST['project_responsible_name'];
$project_responsible_position = $_POST['project_responsible_position'];
$project_responsible_email = $_POST['project_responsible_email'];
$project_responsible_tel = $_POST['project_responsible_tel'];
$project_collaborator_name = $_POST['project_collaborator_name'];
$project_collaborator_position = $_POST['project_collaborator_position'];
$project_collaborator_email = $_POST['project_collaborator_email'];
$project_collaborator_tel = $_POST['project_collaborator_tel'];
$project_record_name = $_POST['project_record_name'];
$project_record_position = $_POST['project_record_position'];
$project_record_email = $_POST['project_record_email'];
$project_record_tel = $_POST['project_record_tel'];
$datenow = date("Y-m-d H:i:s");
include "config.php";
$sql = "update tb_project set project_reason = \"$project_reason\", project_objective = \"$project_objective\", project_target_group = \"$project_target_group\", project_interest_id = \"$project_interest_id\", project_adviser_name = \"$project_adviser_name\", project_adviser_position = \"$project_adviser_position\", project_adviser_email = \"$project_adviser_email\", project_adviser_tel = \"$project_adviser_tel\", project_responsible_name = \"$project_responsible_name\", project_responsible_position = \"$project_responsible_position\", project_responsible_email = \"$project_responsible_email\", project_responsible_tel = \"$project_responsible_tel\", project_collaborator_name = \"$project_collaborator_name\", project_collaborator_position = \"$project_collaborator_position\", project_collaborator_email = \"$project_collaborator_email\", project_collaborator_tel = \"$project_collaborator_tel\", project_record_name = \"$project_record_name\", project_record_position = \"$project_record_position\", project_record_email = \"$project_record_email\", project_record_tel = \"$project_record_tel\"
, update_date = \"$datenow\", user_update = \"$_COOKIE[cook_id]\"
where project_id = \"$project_id\"";
$result = mysql_query($sql);
if ($result) {
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0;url=project_manage.php?project_id=$project_id'>";
}
?>
</body>
</html>