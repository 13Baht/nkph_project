<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แก้ไขความก้าวหน้าตามตัวชี้วัดผลผลิต</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKPointProductProgress()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var point_product = frm.point_product.value;
	var point_product_unit = frm.point_product_unit.value;
	var point_product_target = frm.point_product_target.value;
	var result = frm.result.value;
	var point_product_id = frm.point_product_id.value;
	var url = "progress_point_product_save.php?point_product_id=" + encodeURIComponent(point_product_id) + "&point_product=" + encodeURIComponent(point_product) + "&point_product_unit=" + encodeURIComponent(point_product_unit) + "&point_product_target=" + point_product_target + "&result=" + result + "&st=edit";
	LoadData(url, "tSave");
	alert('บันทึกข้อมูลเรียบร้อยแล้ว');
	OnOK();
}
</script>
</head>

<body>
<?php
$point_product_id = $_GET['point_product_id'];
include "config.php";
$sql = "select * from tb_project_point_product_progress where point_product_id = \"$point_product_id\"";
$result = mysql_query($sql);
$r = mysql_fetch_array($result);
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไขความก้าวหน้าตามตัวชี้วัดผลผลิต</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="left">ตัวชี้วัดผลผลิต :</td>
        <td width="73%" height="25" align="left"><input name="point_product" type="text" id="point_product" style="width:300px;" value="<?php echo $r['point_product']; ?>" maxlength="255" /></td>
      </tr>
      <tr>
        <td height="25" align="left">หน่วยนับ :</td>
        <td height="25" align="left"><input name="point_product_unit" type="text" id="point_product_unit" style="width:100px;" value="<?php echo $r['point_product_unit']; ?>" maxlength="20" /></td>
      </tr>
      <tr>
        <td height="25" align="left">เป้าหมาย :</td>
        <td height="25" align="left"><input name="point_product_target" type="text" id="point_product_target" style="width:100px;" value="<?php echo $r['point_product_target']; ?>" maxlength="10" /></td>
      </tr>
      <tr>
        <td height="25" align="left">ผลงาน :</td>
        <td height="25" align="left"><input name="result" type="text" id="result" style="width:100px;" value="<?php echo $r['result']; ?>" maxlength="50" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกข้อมูล  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK()" />
          <input name="point_product_id" type="hidden" id="point_product_id" value="<?php echo $point_product_id; ?>" /></td>
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
