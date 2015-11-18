<?php
include "config.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                    <td width="54%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">รายการตัวชี้วัดผลผลิต</td>
                                    <td width="15%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">หน่วยนับ</td>
                                    <td width="15%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">เป้าหมาย</td>
                                    <td width="9%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_cm = "select * from tb_project_point_product where project_id = \"$project_id\" order by point_product_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  $i = 1;
								  while ($r_cm = mysql_fetch_array($result_cm)) {
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo nl2br($r_cm['point_product']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['point_product_unit']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['point_product_target'];?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delPointProduct('<?php echo $r_cm['point_product_id']; ?>')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table>