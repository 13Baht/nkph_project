<?php
include "chk_cookie_admin.php";
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/temp1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $title_web; ?></title>
<!--Tabs-->
<link rel="stylesheet" href="css/base/jquery.ui.all.css">
	<script src="js/jquery-1.8.0.js"></script>
	<script src="js/jquery.ui.core.js"></script>
	<script src="js/jquery.ui.widget.js"></script>
	<script src="js/jquery.ui.tabs.js"></script>
    <script type="text/javascript" src="js/jquery.cookie.js "></script>
	<link rel="stylesheet" href="css/demos.css">
	<script>
	$(function() {
		jQuery( "#tabs" ).tabs({cookie: {
				// store cookie for a day, without, it would be a session cookie
				expires: 1
			}
					});
	});
	</script>
<!-- InstanceEndEditable -->
<link rel="stylesheet" type="text/css" href="css/mycss.css"/>
<!-- InstanceBeginEditable name="head" -->
<!-- InstanceEndEditable -->
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="155" background="images/bg2.jpg"><div id="header">
      <table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td height="155" align="left" valign="top"><table width="1000" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="3" align="left"><img src="images/logo.png" /></td>
            </tr>
            <tr>
              <td width="23" height="38">&nbsp;</td>
              <td width="955" valign="bottom" class="textBlackNormal"><marquee scrolldelay="100" onmouseover="stop()" onmouseout="start()">ยินดีต้อนรับเข้าสู่ <?php echo $title_web; ?></marquee></td>
              <td width="22">&nbsp;</td>
            </tr>
          </table></td>
          </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td align="center"><table width="960" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td><table width="960" border="0" cellspacing="0" cellpadding="2">
          <tr>
            <td width="233" align="left" valign="top">
            <table width="230" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="215" align="left" background="images/top.jpg" class="textWhiteBold"><img src="images/loginIcon.png" border="0" align="absmiddle" />เข้าสู่ระบบ</td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td>
                <script>
				function chkLogin() {
					var frm = document.frmLogin;
					if (frm.user_login.value == "") {
						alert('กรุณากรอกชื่อผู้ใช้');
						frm.user_login.focus();
						return false;
					}
					if (frm.pass_login.value == "") {
						alert('กรุณากรอกชื่อรหัสผ่าน');
						frm.pass_login.focus();
						return false;
					}
					if (frm.user_type_id.value == "0") {
						alert('กรุณาเลือกกลุ่มผู้ใช้');
						frm.user_type_id.focus();
						return false;
					}
				}
				</script>
                <?php if ($_COOKIE["cook_id"] == "") { ?>
                <form method="post" name="frmLogin" action="login_check.php" onsubmit="return chkLogin()">
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td width="40%" align="left" class="textBlackNormal">ชื่อผู้ใช้ :</td>
                    <td width="60%" align="left"><input type="text" name="user_login" id="user_login"  style="width:100px;" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="textBlackNormal">รหัสผ่าน :</td>
                    <td align="left"><input type="password" name="pass_login" id="pass_login"  style="width:100px;" /></td>
                  </tr>
                  <tr>
                    <td align="left" class="textBlackNormal">กลุ่มผู้ใช้ :</td>
                    <td align="left"><select name="user_type_id" id="user_type_id" style="width:104px;">
                    <option value="0" selected="selected">--เลือก--</option>
                    <?php
					$sql_ut = "select user_type_id, user_type_name from user_type order by orderby";
					$result_ut = mysql_db_query($db, $sql_ut);
					while ($r_ut = mysql_fetch_array($result_ut)) {
						echo "<option value='$r_ut[user_type_id]'>$r_ut[user_type_name]</option>";
					}
					?>
                    </select></td>
                  </tr>
                  <tr>
                    <td align="left">&nbsp;</td>
                    <td align="left"><input type="submit" name="button" id="button" value="  ล็อกอิน  " /></td>
                  </tr>
                </table>
                </form>
                <?php } else { ?>
                <table width="100%" border="0" cellspacing="0" cellpadding="2">
                  <tr>
                    <td height="25" colspan="2" align="center" class="textBlueBold">ยินดีต้อนรับ</td>
                    </tr>
                  <tr>
                    <td width="33%" height="25" align="left" class="textBlackNormal">ผู้ใช้งาน :</td>
                    <td width="67%" height="25" align="left" class="textRedSmall"><?php
                    $person_id = substr($_COOKIE["cook_id"], 0, 9)."****";
					echo "$person_id";
					?></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" class="textBlackNormal">กลุ่มผู้ใช้ :</td>
                    <td height="25" align="left" class="textBlackNormal"><?php echo "$_COOKIE[cook_user_type_name]"; ?></td>
                  </tr>
                  <tr>
                    <td height="25" align="left">&nbsp;</td>
                    <td height="25" align="left"><img src="images/del.gif" width="24" height="24" align="absmiddle" />&nbsp;<a href="logout.php" id="k2">ออกจากระบบ</a></td>
                  </tr>
                </table>
                <?php } //end login ?>
                </td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table>
            
            <table width="230" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="215" align="left" background="images/top.jpg" class="textWhiteBold"><img src="images/list.png" border="0" align="absmiddle" />&nbsp;เมนูหลัก</td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="index.php" id="k2">หน้าแรก</a></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="manual.pdf" target="_blank" id="k2">คู่มือการใช้งาน</a></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="download.php" id="k2">ดาวน์โหลดเอกสาร</a></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="about.php" id="k2">เกี่ยวกับระบบ</a></td>
                  </tr>
                </table></td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table>
            
            <?php if ($_COOKIE["cook_id"] != "") { ?>
            <table width="230" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="215" align="left" background="images/top.jpg" class="textWhiteBold"><img src="images/config.png" width="30" height="30" border="0" align="absmiddle" /> ข้อมูลโครงการ</td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="project_add.php" id="k2">เพิ่มข้อมูลโครงการ</a></td>
                  </tr>
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="project_list.php" id="k2">จัดการข้อมูลโครงการ</a></td>
                  </tr>
                </table></td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table>
            
            <table width="230" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="215" align="left" background="images/top.jpg" class="textWhiteBold"><img src="images/report.png" width="30" height="30" border="0" align="absmiddle" /> ระบบรายงาน</td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="project_list_report.php" id="k2">รายงานโครงการ</a></td>
                  </tr>
                </table></td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table>
            <?php } //end ผ่านการ login ?>
            
            <?php if ($_COOKIE["cook_user_type_id"] == "1") { ?>
            <table width="230" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="215" align="left" background="images/top.jpg" class="textWhiteBold"><img src="images/users.png" width="25" height="25" border="0" align="absmiddle" /> สำหรับผู้ดูแลระบบ</td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="25" align="left" style="border-bottom:1px dotted #CCC;"><img src="images/bollet.jpg" width="10" height="8" align="absmiddle" />&nbsp;<a href="admin_main.php" id="k2">จัดการข้อมูลพื้นฐาน</a></td>
                  </tr>
                </table></td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table>
            <?php } //admin ?>
            
            </td>
            <td width="719" valign="top"><table width="719" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="7" align="left"><img src="images/top-left.jpg" width="7" height="45" /></td>
                <td width="707" align="left" background="images/top2.jpg" class="textWhiteBold"><!-- InstanceBeginEditable name="EditRegion3" -->จัดการข้อมูลผู้ใช้งาน<!-- InstanceEndEditable --></td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td align="left"><!-- InstanceBeginEditable name="EditRegion4" -->
                  <table width="704" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td align="left">
                      <div id="tabs">
                        <ul>
                            <li><a href="#tabs-user-1">ระดับผู้อำนวยการ</a></li>
                            <li><a href="#tabs-user-2">ระดับรองผู้อำนวยการ</a></li>
                            <li><a href="#tabs-user-3">ระดับหัวหน้ากลุ่มงาน</a></li>
                            <li><a href="#tabs-user-4">ระดับหน่วยงาน/ทีม</a></li>
                            <li><a href="#tabs-user-5">ผู้ดูแลระบบ</a></li>
                        </ul>
                       	<!--ระดับผู้อำนวยการ-->
                        <div id="tabs-user-1">
                          <table width="670" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="82%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อ - สกุล</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                  </tr>
                                  <?php
								  $sql_leader1 = "select * from user_leader1";
								  $result_leader1 = mysql_db_query($db, $sql_leader1);
								  while ($r_leader1 = mysql_fetch_array($result_leader1)) {
								  ?>
                                <tr class="textBlackNormal" onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;">1</td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_leader1['full_name']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="user_leader1_edit.php"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table></td>
                            </tr>
                          </table>
                        </div>
                        <!--รองผู้อำนวยการ-->
                        <div id="tabs-user-2">
                          <table width="670" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25"><img src="images/add.png" border="0" align="absmiddle" /> <a href="user_leader2_add.php?st=save" id="k2">เพิ่มข้อมูล</a></td>
                            </tr>
                            <tr>
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="72%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อ - สกุล</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลบ</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                </tr>
                                <?php
								//ข้อมูลรองผู้อำนวยการ
								include "config_ksh.php";
								$sql_l2 = "select u2.person_id, p2.prefix_name, p.person_firstname, p.person_lastname from user_leader2 u2 inner join ".$db2.".personal p on u2.person_id = p.person_id inner join ".$db2.".prefix p2 on p.person_prefix = p2.prefix_id";
								$result_l2 = mysql_db_query($db, $sql_l2);
								$i = 1;
								while ($r_l2 = mysql_fetch_array($result_l2)) {
									$full_name = $r_l2['prefix_name'].$r_l2['person_firstname']."&nbsp;".$r_l2['person_lastname'];
								?>
                                <tr class="textBlackNormal" onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $full_name; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><a href="user_leader2_save.php?leader2_id=<?php echo $r_l2['person_id']; ?>&st=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')"><img src="images/bin.png" border="0" /></a></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="user_leader2_add.php?person_id=<?php echo $r_l2['person_id']; ?>&st=edit"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                </tr>
                                <?php } //end while รองผู้อำนวยการ ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table>
                        </div>
                        <!--กลุ่มงาน-->
                        <div id="tabs-user-3"><table width="670" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25"><img src="images/add.png" border="0" align="absmiddle" /> <a href="user_group_work_add.php?st=save" id="k2">เพิ่มข้อมูล</a></td>
                            </tr>
                            <tr>
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="72%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อ - สกุล</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลบ</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                </tr>
                                <?php
								//ข้อมูลหัวหน้ากลุ่มงาน
								$sql_gw = "select uwg.person_id, p2.prefix_name, p.person_firstname, p.person_lastname from user_group_work uwg inner join ".$db2.".personal p on uwg.person_id = p.person_id inner join ".$db2.".prefix p2 on p.person_prefix = p2.prefix_id";
								$result_gw = mysql_db_query($db, $sql_gw);
								$i = 1;
								while ($r_gw = mysql_fetch_array($result_gw)) {
									$full_name = $r_gw['prefix_name'].$r_gw['person_firstname']."&nbsp;".$r_gw['person_lastname'];
								?>
                                <tr class="textBlackNormal" onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $full_name; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><a href="user_group_work_save.php?group_work_id=<?php echo $r_gw['person_id']; ?>&st=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')"><img src="images/bin.png" border="0" /></a></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="user_group_work_add.php?person_id=<?php echo $r_gw['person_id']; ?>&st=edit"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                </tr>
                                <?php } //end while รองผู้อำนวยการ ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table></div>
                          <!--ระดับหน่วยงาน/ทีม-->
                        <div id="tabs-user-4"><table width="670" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td height="25"><img src="images/add.png" border="0" align="absmiddle" /> <a href="user_work_add.php?st=save" id="k2">เพิ่มข้อมูล</a></td>
                            </tr>
                            <tr>
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="72%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อ - สกุล</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลบ</td>
                                  <td width="10%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แก้ไข</td>
                                </tr>
                                <?php
								//ข้อมูลหน่วยงาน/ทีม
								$sql_w = "select uw.person_id, p2.prefix_name, p.person_firstname, p.person_lastname from user_work uw inner join ".$db2.".personal p on uw.person_id = p.person_id inner join ".$db2.".prefix p2 on p.person_prefix = p2.prefix_id";
								$result_w = mysql_db_query($db, $sql_w);
								$i = 1;
								while ($r_w = mysql_fetch_array($result_w)) {
									$full_name = $r_w['prefix_name'].$r_w['person_firstname']."&nbsp;".$r_w['person_lastname'];
								?>
                                <tr class="textBlackNormal" onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $full_name; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><a href="user_work_save.php?work_id=<?php echo $r_w['person_id']; ?>&st=del" onclick="return confirm('ต้องการลบข้อมูลนี้ใช่หรือไม่')"><img src="images/bin.png" border="0" /></a></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="user_work_add.php?person_id=<?php echo $r_w['person_id']; ?>&st=edit"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                </tr>
                                <?php } //end while รองผู้อำนวยการ ?>
                              </table></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                            </tr>
                          </table></div>
                          <!--ผู้ดูแลระบบ-->
                        <div id="tabs-user-5"><table width="670" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                              <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
                                <tr class="textBlackNormal">
                                  <td width="8%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                  <td width="50%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">Admin name</td>
                                  <td width="20%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">Username</td>
                                  <td width="22%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">Password</td>
                                </tr>
                                <?php
								//ข้อมูลหน่วยงาน/ทีม
								$sql_a = "select * from user_admin";
								$result_a = mysql_db_query($db, $sql_a);
								$i = 1;
								while ($r_a = mysql_fetch_array($result_a)) {
								?>
                                <tr class="textBlackNormal" onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                  <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_a['user_name']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_a['user_login']; ?></td>
                                  <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">****</td>
                                </tr>
                                <?php } //end while รองผู้อำนวยการ ?>
                              </table></td>
                            </tr>
                          </table></div>
                      </div>
                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                    </tr>
                  </table>
                <!-- InstanceEndEditable --></td>
                <td background="images/right.jpg">&nbsp;</td>
              </tr>
              <tr>
                <td height="7" align="left"><img src="images/buttom-left.jpg" width="7" height="7" /></td>
                <td height="7" background="images/buttom.jpg"></td>
                <td height="7" align="right"><img src="images/buttom-right.jpg" width="8" height="7" /></td>
              </tr>
            </table></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="center" class="textBlackSmall" style="border-top:1px dotted #CCC;">สงวนลิขสิทธิ์ : โรงพยาบาลนครพนม<br />
          Copy right 2013, all right reserved</td>
      </tr>
      <tr>
        <td align="center" class="textBlackSmall" style="border-top:1px dotted #CCC;">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
<!-- InstanceEnd --></html>