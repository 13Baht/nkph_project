<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มความก้าวหน้าตามตัวชี้วัดผลลัพธ์</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKPointResultProgress()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var point_result = frm.point_result.value;
	var point_result_unit = frm.point_result_unit.value;
	var point_result_target = frm.point_result_target.value;
	var result = frm.result.value;
	var project_id = frm.project_id.value;
	var url = "progress_point_result_save.php?project_id=" + encodeURIComponent(project_id) + "&point_result=" + encodeURIComponent(point_result) + "&point_result_unit=" + encodeURIComponent(point_result_unit) + "&point_result_target=" + point_result_target + "&result=" + result + "&st=save";
	LoadData(url, "tSave");
	alert('บันทึกข้อมูลเรียบร้อยแล้ว');
	OnOK();
}
</script>
</head>

<body>
<?php
$project_id = $_GET['project_id'];
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เพิ่มความก้าวหน้าตามตัวชี้วัดผลลัพธ์</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="left">ตัวชี้วัดผลลัพธ์ :</td>
        <td width="73%" height="25" align="left"><input name="point_result" type="text" id="point_result" style="width:300px;" maxlength="255" /></td>
      </tr>
      <tr>
        <td height="25" align="left">หน่วยนับ :</td>
        <td height="25" align="left"><input name="point_result_unit" type="text" id="point_result_unit" style="width:100px;" maxlength="20" /></td>
      </tr>
      <tr>
        <td height="25" align="left">เป้าหมาย :</td>
        <td height="25" align="left"><input name="point_result_target" type="text" id="point_result_target" style="width:100px;" maxlength="10" /></td>
      </tr>
      <tr>
        <td height="25" align="left">ผลลัพธ์ :</td>
        <td height="25" align="left"><input name="result" type="text" id="result" style="width:100px;" maxlength="50" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกข้อมูล  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK()" />
          <input name="project_id" type="hidden" id="project_id" value="<?php echo $project_id; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><span class="textRedSmall" id="tSave">&nbsp;</span></td>
      </tr>
    </table></form></td>
  </tr>
</table>
</body>
</html>
