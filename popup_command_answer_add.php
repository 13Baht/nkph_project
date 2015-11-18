<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>บันทึกชี้แจงข้อสั่งการ</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKCommand()");
	window.close();	
}
function saveData() {
	var cf = confirm('ต้องการบันทึกข้อมูลใช่หรือไม่');
	if (cf == true) {
		var frm = document.frm1;
		var answer_command_text = frm.answer_command_text.value;
		var fullname = frm.fullname.value;
		var command_id = frm.command_id.value;
		var url = "command_save.php?command_id=" + encodeURIComponent(command_id) + "&answer_command_text=" + encodeURIComponent(answer_command_text) + "&fullname=" + encodeURIComponent(fullname) + "&st=answer";
		LoadData(url, "tSave");
		alert('บันทึกข้อมูลเรียบร้อยแล้ว');
		OnOK();
	} else {
		return false;
	}
}
</script>
</head>

<body>
<?php
$command_id = $_GET['command_id'];
include "config_ksh.php";
include "config.php";
include "includes/person_fullname.php";
include "myclass.php";
$sql = "select text_command from tb_project_command where command_id = \"$command_id\"";
$result = mysql_db_query($db, $sql);
$r = mysql_fetch_row($result);
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ชี้แจงข้อสั่งการ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td height="25" align="left">ข้อสั่งการ :</td>
        <td height="25" align="left"><?php echo nl2br($r[0]); ?></td>
      </tr>
      <tr>
        <td width="27%" height="25" align="left">ข้อชี้แจง :</td>
        <td width="73%" height="25" align="left"><textarea name="answer_command_text" id="answer_command_text" style="width:330px;" rows="5"></textarea></td>
      </tr>
      <tr>
        <td height="25" align="left">ชี้แจงโดย :</td>
        <td height="25" align="left"><?php echo $fullname; ?></td>
      </tr>
      <tr>
        <td height="25" align="left">ชี้แจงเมื่อวันที่ :</td>
        <td height="25" align="left"><?php echo FormatDateSlash(date("Y-m-d"))."&nbsp;".date("H:i:s"); ?></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกชี้แจงข้อสั่งการ  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK()" />
          <input name="command_id" type="hidden" id="command_id" value="<?php echo $command_id; ?>" />
          <input name="fullname" type="hidden" id="fullname" value="<?php echo $fullname; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><span class="textRedSmall" id="tSave">ถ้าชี้แจงแล้วจะไม่สามารถแก้ไขข้อมูลที่ชี้แจงได้</span></td>
      </tr>
    </table></form></td>
  </tr>
</table>
</body>
</html>
