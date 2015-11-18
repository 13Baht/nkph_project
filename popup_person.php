<?php
$str = $_GET['str'];
$module = $_GET['module'];
$output1 = $_GET['output1'];
$output2 = $_GET['output2'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<title>ค้นหาข้อมูล</title>
</head>

<body onload="document.frms.keyword.focus();">
<script>
function selectitem(field1, field2, output1, output2){
	eval("self.opener." + output1 +".value='"+field1+"'");
	eval("self.opener." + output2 +".value='"+field2+"'");
	window.close();	
}
</script>
<?php
$keyword = $_POST['keyword'];
include "config_ksh.php";
if ($keyword == "") {
	$sql = "select p1.person_id, p2.prefix_name, p1.person_firstname, p1.person_lastname from personal p1 left outer join prefix p2 on p1.person_prefix = p2.prefix_id where person_state != '6' order by person_firstname limit 0, 25";
} else {
	$sql = "select p1.person_id, p2.prefix_name, p1.person_firstname, p1.person_lastname from personal p1 left outer join prefix p2 on p1.person_prefix = p2.prefix_id where person_state != '6' and p1.person_firstname like '%$keyword%' order by p1.person_firstname";
}
$result = mysql_query($sql);
?>    
<table width="480" border="1" align="center" cellpadding="0" cellspacing="1" bordercolor="#CCCCCC">
  <tr>
    <td height="25" colspan="3" align="center" bgcolor="#DBCF21" class="textBlackBold">ข้อมูลบุคลากร</td>
  </tr>
  <form method="post" action="" name="frms">
  <tr>
    <td height="25" colspan="3" align="center" bgcolor="#E9E9F3"><span class="textBlackNormal">ค้นหา</span> 
    <input type="text" name="keyword" id="keyword" />
    <input type="submit" name="button" id="button" value="ค้นหา" />
    <br />
    <span class="textBlackNormal">คลิกปุ่มค้นหาอีกครั้งเพื่อแสดงข้อมูลทั้งหมด</span></td>
  </tr>
  </form>
  <tr class="textBlackBold">
    <td width="61" height="25" align="center" bgcolor="#E9E9F3" class="text_black_bold">ลำดับ</td>
    <td width="332" height="25" align="center" bgcolor="#E9E9F3" class="text_black_bold">ชื่อ - สกุล</td>
    <td width="75" align="center" bgcolor="#E9E9F3" class="text_black_bold">เลือก</td>
  </tr>
  <?php
  $i = 1;
  while ($r = mysql_fetch_array($result)) {
	  $full_name = $r['prefix_name']."".$r['person_firstname']."&nbsp;".$r['person_lastname'];
  ?>
  <tr class="textBlackNormal" onmouseover=this.style.backgroundColor="#B9D5FF" onmouseout=this.style.backgroundColor="">
    <td height="25" align="center" class="text_normal"><?php echo $i++; ?></td>
    <td height="25" align="left" class="text_normal">&nbsp;<?php echo $full_name; ?></td>
    <td height="25" align="center" class="text_normal"><a href="javascript:;" onClick="selectitem('<?php echo $full_name; ?>', '<?php echo $r['person_id']; ?>', '<?php echo $output1; ?>', '<?php echo $output2; ?>')"><img src="images/add.png" border="0" /></a></td>
  </tr>
  <?php
  }
  ?>
  <tr>
    <td height="5" align="center" bgcolor="#E9E9F3"><span class="style1"></span></td>
    <td height="5" colspan="2" align="left" bgcolor="#E9E9F3"><span class="style1"></span></td>
  </tr>
</table>
</body>
</html>
