<?php
include "config.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
    <td width="51%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">แหล่งงบประมาณ</td>
    <td width="14%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">จำนวนเงินที่มี</td>
    <td width="14%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">เบิกจ่ายแล้ว</td>
    <td width="14%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">คงเหลือ</td>
  </tr>
  <?php
  $sql_bf = "select tpb.project_budget_id, tpb.budget_from_id, bf.budget_from_name, tpb.budget_from_orther, tpb.budget_money from tb_project_budget tpb inner join budget_from bf on tpb.budget_from_id = bf.budget_from_id where tpb.project_id = '$project_id'";
  $result_bf = mysql_query($sql_bf);
  $i = 1;
  $total_m = 0;
  $total_p = 0;
  while ($r_bf = mysql_fetch_array($result_bf)) {
	  $total_m += $r_bf['budget_money'];
  ?>
  <tr>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_bf['budget_from_name']; ?></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($r_bf['budget_money'], 2); ?></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
    $sql_s = "select sum(pay_total) cc from tb_project_pay where project_id = '$project_id' and budget_from_id = '$r_bf[budget_from_id]'";
	$result_s = mysql_query($sql_s);
	$r_s = mysql_fetch_row($result_s);
	$total_p += $r_s[0];
	echo number_format($r_s[0], 2);
	?></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><?php
    $mm = $r_bf['budget_money'] - $r_s[0];
	echo number_format($mm, 2);
	?></td>
  </tr>
  <?php } //end whlile ?>
  <tr>
    <td height="25" colspan="2" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><b>รวม</b></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><b><?php echo number_format($total_m, 2); ?></b></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><b><?php echo number_format($total_p, 2); ?></b></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><?php
    $result_money = $total_m - $total_p;
	echo "<b>".number_format($result_money, 2)."</b>";
	?></td>
  </tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                    <td width="24%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">รายการเบิกจ่าย</td>
                                    <td width="17%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">แหล่งงบ</td>
                                    <td width="13%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">วันที่เบิกจ่าย</td>
                                    <td width="10%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">จำนวน (หน่วย)</td>
                                    <td width="11%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">เงินต่อหน่วย</td>
                                    <td width="13%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">รวม</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
<?php
$sql_pt = "select * from pay_type order by order_no";
$result_pt = mysql_query($sql_pt);
$i = 1;
$pay_total = 0;
while ($r_pt = mysql_fetch_array($result_pt)) {
?>
                                  <tr>
                                    <td height="25" align="center" class="textGreenNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i; ?></td>
                                    <td height="25" align="left" class="textGreenNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pt['pay_type_name']; ?></td>
                                    <td height="25" align="left" class="textGreenNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
                                  </tr>
                                  <?php
								  $sql_cm = "select tpp.*, pts.pay_type_sub_name, bf.budget_from_name
								  from tb_project_pay tpp
								  left outer join pay_type_sub pts on tpp.pay_type_sub_id = pts.pay_type_sub_id
								  left outer join budget_from bf on tpp.budget_from_id = bf.budget_from_id
								  where tpp.project_id = \"$project_id\" and tpp.pay_type_id = '$r_pt[pay_type_id]' order by tpp.pay_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  $ii = 1;
								  while ($r_cm = mysql_fetch_array($result_cm)) {
									  $pay_total += $r_cm['pay_total'];
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">&nbsp;</td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    echo $i.".".$ii++;
									if ($r_cm['pay_type_sub_id'] != "0") {
										echo "&nbsp;".$r_cm['pay_type_sub_name'];
									} else {
										echo "&nbsp;".$r_cm['pay_type_text'];
									} ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['budget_from_name']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo FormatDateSlash($r_cm['pay_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['pay_unit']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($r_cm['pay_money'], 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($r_cm['pay_total'], 2);?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delPay('<?php echo $r_cm['pay_id']; ?>')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  
                                  <?php
                                  } //end while รายการค่าใช้จ่าย
								  $i++;
								} //end whlie หมวดค่าใช้จ่าย
								  ?>
                                  <tr>
                                    <td height="25" colspan="6" align="center" bgcolor="#FFD5D5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">รวมเบิกจ่ายจริงทั้งสิ้น</td>
                                    <td height="25" align="center" bgcolor="#FFD5D5"  class="textBlackBold" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($pay_total, 2); ?></td>
                                    <td height="25" align="center" bgcolor="#FFD5D5" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
                                  </tr>
                                </table>