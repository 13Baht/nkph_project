<?php
include "config.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="39%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ข้อสั่งการ</td>
                                    <td width="24%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">สั่งการโดย</td>
                                    <td width="23%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">สั่งเมื่อวันที่</td>
                                    <td width="6%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลบ</td>
                                    <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;"><?php
                                    //if ($_COOKIE["cook_user_type_id"] == "") {
										echo "ชี้แจง";
									//}
									?></td>
                                  </tr>
                                  <?php
								  $sql_cm = "select * from tb_project_command tpc where tpc.project_id = \"$project_id\" order by tpc.command_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  while ($r_cm = mysql_fetch_array($result_cm)) {
								  ?>
                                  <tr>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo nl2br($r_cm['text_command']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['user_command']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    echo FormatDateSlash(substr($r_cm['date_command'], 0, 10));
									echo "&nbsp;".substr($r_cm['date_command'], 11, 8);
									?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    if ($_COOKIE["cook_id"] == $r_cm['user_command_id']) {
										echo "<a href=\"javascript:;\" onclick=\"delCommand('$r_cm[command_id]')\" title=\"ลบ\"><img src=\"images/bin.png\" border=\"0\" align=\"absmiddle\" /></a>";
									} else {
										echo "-";
									} ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><?php
                                    if ($r_cm['answer_command_user'] != "") {
										echo "<a href=\"javascript:;\" onclick=\"popupCommandDetail('$r_cm[command_id]')\" title='อ่าน'><img src=\"images/read.png\" border=\"0\" /></a>";
									} else {
										echo "<a href=\"javascript:;\" onclick=\"popupAnswerCommand('$r_cm[command_id]')\" title='ชี้แจง'><img src=\"images/pencil.gif\" border=\"0\" /></a>";
									} ?></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table>