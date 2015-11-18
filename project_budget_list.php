<?php
include "chk_cookie.php";
$project_id = $_GET['project_id'];
include "config.php";
$result = mysql_query($sql);
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr class="textBlackNormal">
                                    <td width="63%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">รายการแหล่งงบประมาณ</td>
                                    <td width="25%" height="25" align="right" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">จำนวนเงิน</td>
                                    <td width="12%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_bf = "select tpb.project_budget_id, tpb.budget_from_id, bf.budget_from_name, tpb.budget_from_orther, tpb.budget_money from tb_project_budget tpb inner join budget_from bf on tpb.budget_from_id = bf.budget_from_id where tpb.project_id = '$project_id' order by tpb.budget_from_id";
								  $result_bf = mysql_query($sql_bf);
								  while ($r_bf = mysql_fetch_array($result_bf)) {
								  ?>
                                  <tr class="textBlackNormal">
                                    <td height="25" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    if ($r_bf['budget_from_id'] != "8") {
										echo $r_bf['budget_from_name'];
									} else { //อื่นๆ
										echo $r_bf['budget_from_name']."-".$r_bf['budget_from_orther'];
									}
									?></td>
                                    <td height="25" align="right" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo number_format($r_bf['budget_money'], 2); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delProjectBudget('<?php echo $project_id; ?>', '<?php echo $r_bf['project_budget_id']; ?>')" title="ลบ"><img src="images/bin.png" width="21" height="21" border="0" /></a></td>
                                  </tr>
                                  <?php } //end while budget_from ?>
</table>