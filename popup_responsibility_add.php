<?php
include "chk_cookie.php";
include "config.php";
$st = $_GET['st'];
$responsibility_id = $_GET['responsibility_id'];
$s_status = "1";
if ($st == "edit") {
	$sql = "select * from responsibility where responsibility_id = \"$responsibility_id\"";
	$result = mysql_query($sql);
	$r = mysql_fetch_array($result);
	$s_status = $r['responsibility_status'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>จัดการข้อมูลพันธกิจ</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(v) {
	eval("self.opener.q1('" + v + "')");
	window.close();	
}
function saveData(st) {
	var frm = document.frm1;
	var year_budget_id = frm.year_budget_id.value;
	var responsibility_name = frm.responsibility_name.value;
	var s_status = "1";
	if (frm.s_status[1].checked == true) {
		s_status = "0";
	}
	var responsibility_id = frm.responsibility_id.value;
	if (year_budget_id == "") {
		alert('กรุณาเลือกปีงบประมาณ');
		frm.year_budget_id.focus();
		return false;
	}
	if (responsibility_name == "") {
		alert('กรุณาระบุพันธกิจ');
		frm.responsibility_name.focus();
		return false;
	}
	var url = "responsibility_save.php?year_budget_id=" + year_budget_id + "&responsibility_name=" + encodeURIComponent(responsibility_name) + "&responsibility_id=" + responsibility_id + "&s_status=" + s_status + "&st=" + st;
	LoadData(url, "tSave");
	alert('บันทึกข้อมูลเรียบร้อยแล้ว');
	OnOK(year_budget_id);
}
</script>
</head>

<body>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">จัดการข้อมูลพันธกิจ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="right">ปีงบประมาณ :</td>
        <td width="73%" height="25" align="left"><select name="year_budget_id" id="year_budget_id" style="width:90px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_budget = "select year_budget_id from year_budget order by year_budget_id desc";
						$result_budget = mysql_query($sql_budget);
						while ($r_budget = mysql_fetch_array($result_budget)) {
							if ($r['responsibility_year'] == $r_budget['year_budget_id']) {
								echo "<option value='$r_budget[year_budget_id]' selected>$r_budget[year_budget_id]</option>";
							} else {
								echo "<option value='$r_budget[year_budget_id]'>$r_budget[year_budget_id]</option>";
							}
						}
						?>
                      </select></td>
      </tr>
      <tr>
        <td height="25" align="right">ชื่อพันธกิจ :</td>
        <td height="25" align="left"><input name="responsibility_name" type="text" id="responsibility_name" style="width:300px;" value="<?php echo $r['responsibility_name']; ?>" maxlength="250" /></td>
      </tr>
      <tr>
        <td height="25" align="right">สถานะ :</td>
        <td height="25" align="left"><label>
          <input name="s_status" type="radio" id="radio" value="1" <?php if ($s_status == "1") { echo "checked"; } ?> />
          เปิดใช้งาน</label>&nbsp;
          <label>
            <input type="radio" name="s_status" id="radio2" value="0" <?php if ($s_status == "0") { echo "checked"; } ?> />
            ปิดใช้งาน</label></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกข้อมูล  " onclick="saveData('<?php echo $st; ?>')" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK('')" />
          <input name="responsibility_id" type="hidden" id="responsibility_id" value="<?php echo $responsibility_id; ?>" /></td>
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
