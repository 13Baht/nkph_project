<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มเป้าหมายการเบิกจ่าย</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKPayTarget()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var quarter_id = frm.quarter_id.value;
	var target_money = frm.target_money.value;
	var project_id = frm.project_id.value;
	var url = "pay_target_save.php?project_id=" + encodeURIComponent(project_id) + "&quarter_id=" + encodeURIComponent(quarter_id) + "&target_money=" + encodeURIComponent(target_money) + "&st=save";
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
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เพิ่มเป้าหมายการเบิกจ่าย รายไตรมาส</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="left">ไตรมาสที่ :</td>
        <td width="73%" height="25" align="left"><select name="quarter_id" id="quarter_id" style="width:300px;">
                                <option value="">--เลือก--</option>
                                <?php
						$sql_pay = "select * from quarter order by quarter_id";
						$result_pay = mysql_query($sql_pay);
						while ($r_pay = mysql_fetch_array($result_pay)) {
							echo "<option value='$r_pay[quarter_id]'>$r_pay[quarter_name]</option>";
						}
						?>
            </select></td>
      </tr>
      <tr>
        <td height="25" align="left">จำนวนเงิน :</td>
        <td height="25" align="left"><input name="target_money" type="text" id="target_money" style="width:100px;" maxlength="10" /></td>
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
