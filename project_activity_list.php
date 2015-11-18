<?php
include "chk_cookie.php";
include "myclass.php";
$project_id = $_GET['project_id'];
include "config.php";
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="textBlackNormal">
                                    <td width="39%" height="25" align="left" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">กิจกรรม</td>
                                    <td width="19%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ค่าน้ำหนัก (%)</td>
                                    <td width="18%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">วันเริ่มต้น</td>
                                    <td width="18%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">วันสิ้นสุด</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
  </tr>
                                  <?php
								  $sql_pa = "select * from tb_project_activity where project_id = '$project_id'";
								  $result_pa = mysql_query($sql_pa);
								  $total_activity_weight = 0;
								  while ($r_pa = mysql_fetch_array($result_pa)) {
									  $total_activity_weight += $r_pa['activity_weight'];
								  ?>
                                  <tr class="textBlackNormal">
                                    <td height="25" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pa['activity_name']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pa['activity_weight']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo FormatDateShort($r_pa['activity_begin_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo FormatDateShort($r_pa['activity_end_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delProjectActivity('<?php echo $r_pa['project_activity_id']; ?>')" title="ลบ"><img src="images/bin.png" width="21" height="21" border="0" /></a></td>
                                  </tr>
                                  <?php } //end while budget_from ?>
                                  <tr class="textBlackNormal">
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">รวมร้อยละ</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($total_activity_weight, 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
                                  </tr>
</table>