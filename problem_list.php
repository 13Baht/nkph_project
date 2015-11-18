<?php
include "chk_cookie.php";
include "config.php";
include "myclass.php";
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr class="textBlackNormal">
                                    <td width="31%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ปัญหา / อุปสรรค</td>
                                    <td width="21%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">แจ้งโดย</td>
                                    <td width="19%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">แจ้งเมื่อวันที่</td>
                                    <td width="23%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ข้อเสนอแนะ</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
								  <?php
								  $sql_pb = "select * from tb_project_problem where project_id = '$project_id' order by problem_id";
								  $result_pb = mysql_db_query($db, $sql_pb);
								  while ($r_pb = mysql_fetch_array($result_pb)) {
								  ?>
                                  <tr class="textBlackNormal">
                                    <td height="25" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pb['text_problem']; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pb['user_problem']; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    echo FormatDateSlash(substr($r_pb['date_problem'], 0, 10));
									echo "&nbsp;".substr($r_pb['date_problem'], 11, 8);
									?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_pb['text_problem_suggestion']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><?php
                                    if ($_COOKIE["cook_id"] == $r_pb['user_problem_id']) {
										echo "<a href=\"javascript:;\" onclick=\"delProblem('$r_pb[problem_id]')\" title='ลบ'><img src=\"images/bin.png\" border=\"0\" /></a>";
									} else {
										echo "-";
									} ?></td>
                                  </tr>
                                  <?php } //end while budget_from ?>
</table>