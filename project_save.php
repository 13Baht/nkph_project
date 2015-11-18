<?php
session_start();
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
$project_id = date("YmdHis")."-".session_id();
$year_budget_id = $_POST['year_budget_id'];
$project_name = $_POST['project_name'];
$project_money = $_POST['project_money'];
$spend_type_id = $_POST['spend_type_id'];
include "myclass.php";
$begin_date = FormatDateDefault($_POST['begin_date']);
$end_date = FormatDateDefault($_POST['end_date']);
$project_area = $_POST['project_area'];
$strategic_province_id = $_POST['strategic_province_id'];
$strategic_district_id = $_POST['strategic_district_id'];
$strategic_hospital_id = $_POST['strategic_hospital_id'];
$responsibility_id = $_POST['responsibility_id'];
$target_id = $_POST['target_id'];
$project_style_id = $_POST['project_style_id'];
$project_dimension_id = $_POST['project_dimension_id'];
$sub_dept_id = $_POST['sub_dept_id'];
$sub_dept_with_id = $_POST['sub_dept_with_id'];
$project_email = $_POST['project_email'];
$project_tel = $_POST['project_tel'];
$datenow = date("Y-m-d H:i:s");
$project_status_id = $_POST['project_status_id'];
$st = $_REQUEST['st'];
include "config_ksh.php";
include "config.php";
include "includes/person_fullname.php";
if ($st == "save") {
	$sql = "insert into tb_project(project_id, year_budget_id, project_name, project_money, spend_type_id, begin_date, end_date, project_area, strategic_province_id, strategic_district_id, strategic_hospital_id, responsibility_id, target_id, project_style_id, project_dimension_id, sub_dept_id, sub_dept_with_id, project_email, project_tel, insert_date, user_update, project_status_id) values(\"$project_id\", \"$year_budget_id\", \"$project_name\", \"$project_money\", \"$spend_type_id\", \"$begin_date\", \"$end_date\", \"$project_area\", \"$strategic_province_id\", \"$strategic_district_id\", \"$strategic_hospital_id\", \"$responsibility_id\", \"$target_id\", \"$project_style_id\", \"$project_dimension_id\", \"$sub_dept_id\", \"$sub_dept_with_id\", \"$project_email\", \"$project_tel\", \"$datenow\", \"$fullname\", \"$project_status_id\")";
}
if ($st == "edit") {
	$project_id = $_POST['project_id'];
	$sql = "update tb_project set year_budget_id = \"$year_budget_id\", project_name = \"$project_name\", project_money = \"$project_money\", spend_type_id = \"$spend_type_id\", begin_date = \"$begin_date\", end_date = \"$end_date\", project_area = \"$project_area\", strategic_province_id = \"$strategic_province_id\", strategic_district_id = \"$strategic_district_id\", strategic_hospital_id = \"$strategic_hospital_id\", responsibility_id = \"$responsibility_id\", target_id = \"$target_id\", project_style_id = \"$project_style_id\", project_dimension_id = \"$project_dimension_id\", sub_dept_id = \"$sub_dept_id\", sub_dept_with_id = \"$sub_dept_with_id\", project_email = \"$project_email\", project_tel = \"$project_tel\", update_date = \"$datenow\", user_update = \"$fullname\", project_status_id = \"$project_status_id\" where project_id = \"$project_id\"";
}
$result = mysql_db_query($db, $sql);
if ($result) {
	echo "<script>alert('บันทึกข้อมูลเรียบร้อยแล้ว')</script>";
	echo "<meta http-equiv='refresh' content='0;url=project_manage.php?project_id=$project_id'>";
}
?>
</body>
</html>