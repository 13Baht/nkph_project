<?php
include "config.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                    <td width="41%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ตัวชี้วัดผลลัพธ์</td>
                                    <td width="14%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">หน่วยนับ</td>
                                    <td width="13%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">เป้าหมาย</td>
                                    <td width="11%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ผลงาน</td>
                                    <td width="9%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลงผลงาน</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_cm = "select * from tb_project_point_result_progress where project_id = \"$project_id\" order by point_result_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  $i = 1;
								  while ($r_cm = mysql_fetch_array($result_cm)) {
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['point_result']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['point_result_unit']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['point_result_target']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['result']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><a href="javascript:;" onclick="editPointResultProgress('<?php echo $r_cm['point_result_id']; ?>')"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delPointResultProgress('<?php echo $r_cm['point_result_id']; ?>')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while รายการค่าใช้จ่าย ?>
                                </table>