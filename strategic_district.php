<?php
include "chk_cookie_admin.php";
include "config.php";
$year_budget = date("Y") + 543;
if (date("m") >= 10) {
	$year_budget = date("Y") + 544;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/temp1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $title_web; ?></title>
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
                <td width="707" align="left" background="images/top2.jpg" class="textWhiteBold"><!-- InstanceBeginEditable name="EditRegion3" -->จัดการข้อมูลประเด็นยุทธศาสตร์อำเภอ<!-- InstanceEndEditable --></td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td align="left"><!-- InstanceBeginEditable name="EditRegion4" -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="71%" height="25" align="left">
<script src="js/myjs.js"></script>
<script>
window.onload = function() {
	q1('<?php echo $year_budget; ?>');
}
function q1(v) {
	var url = "strategic_district_list.php?year_budget=" + v;
	LoadData(url, "t1");
}
function popupAdd(st, strategic_district_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_strategic_district_add.php?st=" + st + "&strategic_district_id=" + strategic_district_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
</script>
                      <form id="form1" name="form1" method="post" action="">ปีงบประมาณ : <select name="year_budget_id" id="year_budget_id" style="width:90px;" onchange="q1(this.value)">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_budget = "select year_budget_id from year_budget order by year_budget_id desc";
						$result_budget = mysql_query($sql_budget);
						while ($r_budget = mysql_fetch_array($result_budget)) {
							if ($year_budget == $r_budget['year_budget_id']) {
								echo "<option value='$r_budget[year_budget_id]' selected>$r_budget[year_budget_id]</option>";
							} else {
								echo "<option value='$r_budget[year_budget_id]'>$r_budget[year_budget_id]</option>";
							}
						}
						?>
                      </select>
                      </form></td>
                      <td width="29%" align="right"><img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /><a href="javascript:;" onclick="popupAdd('save', '')" id="k2">เพิ่มประเด็นยุทธศาสตร์อำเภอ</a></td>
                    </tr>
                    <tr>
                      <td height="25" colspan="2" align="left"><span id="t1">&nbsp;</span></td>
                    </tr>
                    <tr>
                      <td height="25" colspan="2" align="left">&nbsp;</td>
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