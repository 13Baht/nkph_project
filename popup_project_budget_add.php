<?php
include "chk_cookie.php";
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มแหล่งงบประมาณ</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKProjectBudget()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var budget_from_id = frm.budget_from_id.value;
	var budget_from_orther = frm.budget_from_orther.value;
	var budget_money = frm.budget_money.value;
	var project_id = frm.project_id.value;
	var url = "project_budget_save.php?project_id=" + encodeURIComponent(project_id) + "&budget_from_id=" + encodeURIComponent(budget_from_id) + "&budget_from_orther=" + encodeURIComponent(budget_from_orther) + "&budget_money=" + encodeURIComponent(budget_money) + "&st=save";
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
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เพิ่มแหล่งงบประมาณ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="right">แหล่งงบประมาณ :</td>
<td width="73%" height="25" align="left"><select name="budget_from_id" id="budget_from_id" style="width:170px;">
                                <option value="">--เลือก--</option>
                                <?php
						$sql_bf = "select budget_from_id, budget_from_name from budget_from order by budget_from_id";
						$result_bf = mysql_query($sql_bf);
						while ($r_bf = mysql_fetch_array($result_bf)) {
							echo "<option value='$r_bf[budget_from_id]'>$r_bf[budget_from_name]</option>";
						}
						?>
            </select></td>
      </tr>
      <tr>
        <td height="25" align="right">งบอื่นๆ :</td>
        <td height="25" align="left"><input name="budget_from_orther" type="text" id="budget_from_orther" style="width:100px;" maxlength="250" />
          *ระบุ หากเลือกแหล่งงบประมาณเป็น อื่นๆ</td>
      </tr>
      <tr>
        <td height="25" align="right">จำนวนเงิน :</td>
        <td height="25" align="left"><input name="budget_money" type="text" id="budget_money" style="width:100px;" maxlength="15" /></td>
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
