<?php
session_start();
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
include "chk_cookie.php";
$file_id = date("YmdHis")."-".session_id();
$project_id = $_REQUEST['project_id_file'];
$file_description = $_POST['file_description'];
$st = $_REQUEST['file_st'];
$dir = "files/";
include "config.php";
if ($st == "save") {
	$fileupload = $_FILES['fileupload']['tmp_name'];
	$fileupload_name = $_FILES['fileupload']['name'];
	$fileupload_size = $_FILES['fileupload']['size'];
	$fileupload_type = $_FILES['fileupload']['type'];
	if ($fileupload) {
	$ext = strtolower(end(explode('.', $fileupload_name)));
		if ($ext != "jpg" && $ext != "jpeg" && $ext != "doc" && $ext != "docx" && $ext != "xls" && $ext != "xlsx" && $ext != "ppt" && $ext != "pptx" && $ext != "pdf") {
			echo "<center><br><font color='#FF0000'>ระบบนี้รองรับเฉพาะไฟล์รูปภาพนามสกุล jpg, doc, docx, xls, xlsx, ppt, pptx และ pdf เท่านั้น</font>";
			exit();
		}
		if ($fileupload_size > 2097152) {
			echo "<center><br><font color='#FF0000'>ไฟล์มีขนาดเกิน 2 MB</font>";
			exit();
		}
		$filename = $file_id.".".$ext;
		if ($ext == "jpg" || $ext == "jpeg") {
			$ori_img = imagecreatefromjpeg($fileupload);
			$ori_size = getimagesize($fileupload);
			$ori_w = $ori_size[0];
			$ori_h = $ori_size[1];
			if ($ori_w >= $ori_h) {
				if ($ori_w > 800) {
					$new_w = 800;
				} else {
					$new_w = $ori_w;
				}
				$new_h = round(($new_w / $ori_w) * $ori_h);
			} else {
				if ($ori_h > 800) {
					$new_h = 800;
				} else {
					$new_h = $ori_h;
				}
				$new_w = round(($new_h / $ori_h) * $ori_w);
			}
			$new_img = imagecreatetruecolor($new_w, $new_h);
			imagecopyresized($new_img, $ori_img, 0, 0, 0, 0, $new_w, $new_h, $ori_w, $ori_h);
			if ($ext == "jpg" or $ext == "jpeg") {
				imagejpeg($new_img, "$dir$filename");
			}
			imagedestroy($new_img);
			imagedestroy($ori_img);
		} else {
			copy($fileupload, "$dir$filename");
		}
	} else {
		echo "<center><br><font color='#FF0000'>กรุณาเลือกไฟล์ก่อนบันทึกข้อมูล</font>";
		exit();
	}
	$sql = "insert into tb_project_file(file_id, project_id, file_name, file_description, ext) values(\"$file_id\", \"$project_id\", \"$filename\", \"$file_description\", \"$ext\")";
}
if ($st == "del") {
	$file_id = $_GET['file_id'];
	$file_name = $_GET['file_name'];
	unlink("$dir$file_name");
	$sql = "delete from tb_project_file where file_id = \"$file_id\"";
}
$result = mysql_query($sql);
echo "<script>";
echo "alert('บันทึกข้อมูลเรียบร้อยแล้ว');";
echo "</script>";
echo "<meta http-equiv='refresh' content='0;url=project_manage.php?project_id=$project_id'>";
?>