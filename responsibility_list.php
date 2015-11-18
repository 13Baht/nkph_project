<?php
include "config.php";
$year_budget = $_GET['year_budget'];
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
                                  <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="56%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อพันธกิจ</td>
                                  <td width="13%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ปีงบประมาณ</td>
                                  <td width="17%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">สถานะ</td>
                                  <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                  </tr>
                                  <?php
								  $sql = "select r.*, ss.status_name from responsibility r left outer join s_status ss on r.responsibility_status = ss.status_id where r.responsibility_year = '$year_budget' order by r.responsibility_id";
								  $result = mysql_db_query($db, $sql);
								  $i = 1;
								  while ($r = mysql_fetch_array($result)) {
									  $c = "";
									  if ($r['responsibility_status'] == "0") {
										  $c = "textRedSmall";
									  }
								  ?>
                                <tr class="textBlackNormal" onmouseover=this.style.backgroundColor="#E3FFBB" onmouseout=this.style.backgroundColor="">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['responsibility_name']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['responsibility_year']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><span class="<?php echo $c; ?>"><?php echo $r['status_name']; ?></span></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="popupAdd('edit', '<?php echo $r['responsibility_id']; ?>')"><img src="images/edit.png" width="22" height="22" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table>