<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>บันทึกข้อสั่งการ</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script>
function OnOK(){
	window.close();	
}
</script>
</head>

<body>
<?php
$command_id = $_GET['command_id'];
include "myclass.php";
include "config.php";
$sql = "select * from tb_project_command where command_id = \"$command_id\"";
$result = mysql_db_query($db, $sql);
$r = mysql_fetch_array($result);
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">รายละเอียดข้อสั่งการ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td height="25" align="left">ข้อสั่งการ :</td>
        <td height="25" align="left"><?php echo nl2br($r['text_command']); ?></td>
      </tr>
      <tr>
        <td height="25" align="left">สั่งการโดย :</td>
        <td height="25" align="left"><?php echo $r['user_command']; ?></td>
      </tr>
      <tr>
        <td height="25" align="left">สั่งการเมื่อวันที่ :</td>
        <td height="25" align="left"><?php echo FormatDateSlash(substr($r['date_command'], 0, 10))."&nbsp;".substr($r['date_command'], 11, 8); ?></td>
      </tr>
      <tr>
        <td width="27%" height="25" align="left" style="border-top:1px dotted #CCC;">ข้อชี้แจง :</td>
        <td width="73%" height="25" align="left" style="border-top:1px dotted #CCC;"><?php echo nl2br($r['answer_command_text']); ?></td>
      </tr>
      <tr>
        <td height="25" align="left">ชี้แจงโดย :</td>
        <td height="25" align="left"><?php echo $r['answer_command_user']; ?></td>
      </tr>
      <tr>
        <td height="25" align="left">ชี้แจงเมื่อวันที่ :</td>
        <td height="25" align="left"><?php echo FormatDateSlash(substr($r['answer_command_date'], 0, 10))."&nbsp;".substr($r['answer_command_date'], 11, 8); ?></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button2" id="button2" value="  ปิด  " onclick="OnOK()" /></td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>
