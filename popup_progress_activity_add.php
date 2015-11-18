<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>รายงานความก้าวหน้าตามกิจกรรม</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKActivityProgress()");
	window.close();
}
function saveData() {
	var frm = document.frm1;
	var activity_name = frm.activity_name.value;
	var activity_weight = frm.activity_weight.value;
	var activity_begin_date = frm.activity_begin_date.value;
	var activity_end_date = frm.activity_end_date.value;
	var result = frm.result.value;
	var project_id = frm.project_id.value;
	var url = "progress_activity_save.php?project_id=" + encodeURIComponent(project_id) + "&activity_name=" + encodeURIComponent(activity_name) + "&activity_weight=" + encodeURIComponent(activity_weight) + "&activity_begin_date=" + encodeURIComponent(activity_begin_date) + "&activity_end_date=" + encodeURIComponent(activity_end_date) + "&result=" + encodeURIComponent(result) + "&st=save";
	LoadData(url, "tSave");
	alert('บันทึกข้อมูลเรียบร้อยแล้ว');
	OnOK();
}
</script>
</head>

<body>
<?php
$project_id = $_GET['project_id'];
include "config.php";
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">รายงานความก้าวหน้าตามกิจกรรม</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td height="25" align="left">กิจกรรม :</td>
        <td height="25" align="left"><input name="activity_name" type="text" id="activity_name" style="width:300px;" maxlength="255" /></td>
      </tr>
      <tr>
        <td height="25" align="left">ค่าน้ำหนัก (%) :</td>
        <td height="25" align="left"><input name="activity_weight" type="text" id="activity_weight" style="width:100px;" maxlength="3" /></td>
      </tr>
      <tr>
        <td width="32%" height="25" align="left">วันเริ่มต้น :</td>
        <td width="68%" height="25" align="left"><link type="text/css" href="css/ui-lightness/jquery-ui-1.8.23.custom.css" rel="stylesheet" />
                        <script type="text/javascript" src="js/jquery-1.8.0.js"></script>
              <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
              <script type="text/javascript" src="js/dp.js"></script>
              <style type="text/css">
			/*demo page css
			body{ font: 80% "Trebuchet MS", sans-serif; margin: 50px;}*/
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style><input name="activity_begin_date" type="text" id="datepicker-th-1" style="width:100px;" maxlength="10" value="" /></td>
      </tr>
      <tr>
        <td height="25" align="left">วันสิ้นสุด :</td>
        <td height="25" align="left"><input name="activity_end_date" type="text" id="datepicker-th-2" style="width:100px;" maxlength="10" value="" /></td>
      </tr>
      <tr>
        <td height="25" align="left">ผลงาน :</td>
        <td height="25" align="left"><input name="result" type="text" id="result" style="width:100px;" maxlength="50" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกข้อมูล  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ปิด  " onclick="OnOK()" />
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
