<?php
$pay_type_id = $_GET['pay_type_id'];
include "config.php";
$sql1 = "select have_sub_type, have_sub_type_text from pay_type where pay_type_id = '$pay_type_id'";
$result1 = mysql_query($sql1);
$r1 = mysql_fetch_array($result1);
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <?php if ($r1['have_sub_type'] == "1") { ?>
  <tr>
    <td width="135" height="25" align="left">รายการค่าใช้จ่าย :</td>
    <td width="365" height="25" align="left">
    <?php
	echo "<select name='pay_type_sub' style='width:300px;'>";
	$sql2 = "select pay_type_sub_id, pay_type_sub_name from pay_type_sub where pay_type_id = '$pay_type_id'";
	$result2 = mysql_query($sql2);
	while ($r2 = mysql_fetch_array($result2)) {
		echo "<option value='$r2[pay_type_sub_id]'>$r2[pay_type_sub_name]</option>";
	}
	echo "</select>";
?></td>
  </tr>
  <?php } //end if have_sub_type ?>
  <?php if ($r1['have_sub_type_text'] == "1") { ?>
  <tr>
    <td width="135" height="25" align="left">ชื่อค่าใช้จ่าย :</td>
    <td width="365" height="25" align="left"><?php echo "<input name='pay_type_text' type='text' id='pay_type_text' style='width:300px;' maxlength='255' /> <span class='textRedSmall'>*</span>"; ?></td>
  </tr>
  <?php } //end if have_sub_type_text ?>
</table>
<?php
echo "<input type='hidden' name='have_sub_type' value='$r1[have_sub_type]'>";
echo "<input type='hidden' name='have_sub_type_text' value='$r1[have_sub_type_text]'>";
?>