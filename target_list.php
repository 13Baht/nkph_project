<?php
include "config.php";
$year_budget = $_GET['year_budget'];
$responsibility_id = $_GET['responsibility_id'];
if ($year_budget == "") {
	$year_budget = date("Y") + 543;
	if (date("m") >= 10) {
		$year_budget = date("Y") + 544;
	}
}
?>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="34%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">เป้าประสงค์</td>
                                  <td width="29%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">พันธกิจ</td>
                                  <td width="13%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ปีงบประมาณ</td>
                                  <td width="12%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">สถานะ</td>
                                  <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                  </tr>
                                  <?php
								  $sql = "select t.*, r.responsibility_name, ss.status_name from target t left outer join responsibility r on t.responsibility_id = r.responsibility_id left outer join s_status ss on t.target_status = ss.status_id where t.target_year = '$year_budget'";
								  if ($responsibility_id != "") {
									  $sql .= " and t.responsibility_id = '$responsibility_id'";
								  }
								  $sql .= " order by t.target_id, t.responsibility_id";
								  $result = mysql_db_query($db, $sql);
								  $i = 1;
								  while ($r = mysql_fetch_array($result)) {
									  $c = "";
									  if ($r['target_status'] == "0") {
										  $c = "textRedSmall";
									  }
								  ?>
                                <tr class="textBlackNormal" onmouseover=this.style.backgroundColor="#E3FFBB" onmouseout=this.style.backgroundColor="">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['target_name']; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['responsibility_name']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['target_year']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><span class="<?php echo $c; ?>"><?php echo $r['status_name']; ?></span></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="popupAdd('edit', '<?php echo $r['target_id']; ?>')"><img src="images/edit.png" width="22" height="22" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table>