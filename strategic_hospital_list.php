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
                                  <td width="56%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อประเด็นยุทธศาสตร์โรงพยาบาล</td>
                                  <td width="13%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ปีงบประมาณ</td>
                                  <td width="17%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">สถานะ</td>
                                  <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                  </tr>
                                  <?php
								  $sql = "select sh.*, ss.status_name from strategic_hospital sh left outer join s_status ss on sh.strategic_hospital_status = ss.status_id where sh.strategic_hospital_year = '$year_budget' order by sh.strategic_hospital_id";
								  $result = mysql_db_query($db, $sql);
								  $i = 1;
								  while ($r = mysql_fetch_array($result)) {
									  $c = "";
									  if ($r['strategic_hospital_status'] == "0") {
										  $c = "textRedSmall";
									  }
								  ?>
                                <tr class="textBlackNormal" onmouseover=this.style.backgroundColor="#E3FFBB" onmouseout=this.style.backgroundColor="">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['strategic_hospital_name']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r['strategic_hospital_year']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><span class="<?php echo $c; ?>"><?php echo $r['status_name']; ?></span></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="popupAdd('edit', '<?php echo $r['strategic_hospital_id']; ?>')"><img src="images/edit.png" width="22" height="22" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table>