<?php
include "config.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$sql_m_project = "select project_money from tb_project where project_id = \"$project_id\"";
$result_m_project = mysql_db_query($db, $sql_m_project);
$r_m_project = mysql_fetch_row($result_m_project);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                    <td width="50%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ไตรมาส</td>
                                    <td width="18%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">% ที่ต้องเบิกจ่าย</td>
                                    <td width="20%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">จำนวนเงิน</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_cm = "select p.pay_target_id, q.quarter_name, p.target_money from tb_project_pay_target p left outer join quarter q on p.quarter_id = q.quarter_id where p.project_id = \"$project_id\" order by p.pay_target_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  $i = 1;
								  $total_target_money = 0;
								  $total_percen = 0;
								  while ($r_cm = mysql_fetch_array($result_cm)) {
									  $total_target_money += $r_cm['target_money'];
									  //ร้อยละเป้าหมายการเบิกจ่าย
									  $percen_pay = (100 * $r_cm['target_money']) / $r_m_project[0];
									  $total_percen += $percen_pay;
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['quarter_name']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($percen_pay, 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($r_cm['target_money'], 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delPayTarget('<?php echo $r_cm['pay_target_id']; ?>')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while รายการค่าใช้จ่าย ?>
                                  <tr>
                                    <td height="25" colspan="2" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">รวมเป้าหมายการเบิกจ่าย</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($total_percen, 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($total_target_money, 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
                                  </tr>
                                </table>