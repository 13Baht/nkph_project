<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>บันทึกการแจ้งปัญหา</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKProblem()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var text_problem = frm.text_problem.value;
	var text_problem_suggestion = frm.text_problem_suggestion.value;
	var fullname = frm.fullname.value;
	var project_id = frm.project_id.value;
	var url = "problem_save.php?project_id=" + encodeURIComponent(project_id) + "&text_problem=" + encodeURIComponent(text_problem) + "&text_problem_suggestion=" + encodeURIComponent(text_problem_suggestion) + "&fullname=" + encodeURIComponent(fullname) + "&st=save";
	LoadData(url, "tSave");
	alert('บันทึกข้อมูลเรียบร้อยแล้ว');
	OnOK();
}
</script>
</head>

<body>
<?php
$project_id = $_GET['project_id'];
include "config_ksh.php";
include "config.php";
include "includes/person_fullname.php";
include "myclass.php";
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">บันทึกการแจ้งปัญหา / อุปสรรค / ข้อเสนอแนะ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="left">ปัญหา / อุปสรรค :</td>
        <td width="73%" height="25" align="left"><textarea name="text_problem" id="text_problem" style="width:330px;" rows="5"></textarea></td>
      </tr>
      <tr>
        <td height="25" align="left">ข้อเสนอแนะ :</td>
        <td height="25" align="left"><textarea name="text_problem_suggestion" id="text_problem_suggestion" style="width:330px;" rows="5"></textarea></td>
      </tr>
      <tr>
        <td height="25" align="left">แจ้งโดย :</td>
        <td height="25" align="left"><?php echo $fullname; ?></td>
      </tr>
      <tr>
        <td height="25" align="left">แจ้งเมื่อวันที่ :</td>
        <td height="25" align="left"><?php echo FormatDateSlash(date("Y-m-d"))."&nbsp;".date("H:i:s"); ?></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกปัญหา/ข้อเสนอแนะ  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK()" />
          <input name="project_id" type="hidden" id="project_id" value="<?php echo $project_id; ?>" />
          <input name="fullname" type="hidden" id="fullname" value="<?php echo $fullname; ?>" /></td>
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
