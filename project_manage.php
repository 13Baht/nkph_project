<?php
include "chk_cookie.php";
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
<script>
window.onload = function() {
	getOKProjectBudget();
	getOKProjectActivity();
	getOKPointProduct();
	getOKPointResult();
	getOKPayTarget();
	getOKPay();
	getOKActivityProgress();
	getOKPointProductProgress();
	getOKPointResultProgress();
	getOKProblem();
	getOKCommand();
}
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
                <td width="707" align="left" background="images/top2.jpg" class="textWhiteBold"><!-- InstanceBeginEditable name="EditRegion3" --><img src="images/edit2.png" border="0" align="absmiddle" />จัดการข้อมูลโครงการ<!-- InstanceEndEditable --></td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td align="left"><!-- InstanceBeginEditable name="EditRegion4" -->
                  <table width="704" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td>
                      <div id="tabs">
                        <ul>
                            <li><a href="#tabs-1">ข้อมูลทั่วไป</a></li>
                            <li><a href="#tabs-2">รายละเอียด</a></li>
                            <li><a href="#tabs-3">การเบิกจ่าย</a></li>
                            <li><a href="#tabs-4">ความก้าวหน้าโครงการ</a></li>
                            <li><a href="#tabs-5">เอกสาร/รูปภาพ</a></li>
                            <li><a href="#tabs-6">ข้อเสนอแนะ-ข้อสั่งการ</a></li>
                            <li><a href="#tabs-7">ผลการตรวจสอบ</a></li>
                        </ul>
                        <!--ข้อมูลทั่วไป-->
                        <div id="tabs-1">
<?php
include "myclass.php";
$project_id = $_GET['project_id'];
$sqlp = "select * from tb_project where project_id = \"$project_id\"";
$resultp = mysql_query($sqlp);
$rp = mysql_fetch_array($resultp);
$d1 = "";
if ($rp['begin_date'] != "") {
	$d1 = FormatDateSlash($rp['begin_date']);
}
$d2 = "";
if ($rp['end_date'] != "") {
	$d2 = FormatDateSlash($rp['end_date']);
}
?>
<script src="js/myjs.js"></script>
<script>
function q1(v) {
	var url1 = 'q_strategic_province.php?year_budget_id=' + v;
	LoadData(url1, 'tStrategic_province');
	var url2 = 'q_strategic_district.php?year_budget_id=' + v;
	LoadData(url2, 'tStrategic_district');
	var url3 = 'q_strategic_hospital.php?year_budget_id=' + v;
	LoadData(url3, 'tStrategic_hospital');
	var url4 = 'q_responsibility.php?year_budget_id=' + v;
	LoadData(url4, 'tResponsibility');
	var url5 = 'q_target.php?responsibility_id=0';
	LoadData(url5, 'tTarget');
}
/*function qResponsibility(v) {
	var url4 = 'q_responsibility.php?strategic_hospital_id=' + v;
	LoadData(url4, 'tResponsibility');
}*/
function qTarget(v) {
	var url5 = 'q_target.php?responsibility_id=' + v;
	LoadData(url5, 'tTarget');
}
function chkData() {
	var frm = document.frm1;
	if (frm.year_budget_id.value == "") {
		alert('กรุณาเลือกปีงบประมาณ');
		frm.year_budget_id.focus();
		return false;
	}
	if (frm.project_name.value == "") {
		alert('กรุณาระบุชื่อโครงการ');
		frm.project_name.focus();
		return false;
	}
	if (frm.project_money.value == "") {
		alert('กรุณาระบุงบประมาณ');
		frm.project_money.focus();
		return false;
	}
	if (frm.spend_type_id.value == "") {
		alert('กรุณาเลือกประเภทการใช้จ่าย');
		frm.spend_type_id.focus();
		return false;
	}
	if (frm.begin_date.value == "") {
		alert('กรุณาระบุวันที่เริ่มต้นโครงการ');
		frm.begin_date.focus();
		return false;
	}
	if (frm.end_date.value == "") {
		alert('กรุณาระบุวันที่สิ้นสุดโครงการ');
		frm.end_date.focus();
		return false;
	}
	if (frm.project_area.value == "") {
		alert('กรุณาระบุพื้นที่ดำเนินโครงการ');
		frm.project_area.focus();
		return false;
	}
	if (frm.strategic_province_id.value == "") {
		alert('กรุณาเลือกประเด็นยุทธศาสตร์จังหวัด');
		frm.strategic_province_id.focus();
		return false;
	}
	if (frm.strategic_district_id.value == "") {
		alert('กรุณาเลือกประเด็นยุทธศาสตร์อำเภอ');
		frm.strategic_district_id.focus();
		return false;
	}
	if (frm.strategic_hospital_id.value == "") {
		alert('กรุณาเลือกประเด็นยุทธศาสตร์ รพ.');
		frm.strategic_hospital_id.focus();
		return false;
	}
	if (frm.responsibility_id.value == "") {
		alert('กรุณาเลือกพันธกิจ');
		frm.responsibility_id.focus();
		return false;
	}
	if (frm.target_id.value == "") {
		alert('กรุณาเลือกเป้าประสงค์');
		frm.target_id.focus();
		return false;
	}
	if (frm.project_style_id.value == "") {
		alert('กรุณาเลือกลักษณะของโครงการ');
		frm.project_style_id.focus();
		return false;
	}
	if (frm.project_dimension_id.value == "") {
		alert('กรุณาเลือกมิติปฏิบัติราชการ');
		frm.project_dimension_id.focus();
		return false;
	}
	if (frm.sub_dept_id.value == "") {
		alert('กรุณาเลือกหน่วยงานที่รับผิดชอบโครงการ');
		frm.sub_dept_id.focus();
		return false;
	}
	if (frm.project_email.value == "") {
		alert('กรุณาระบุ Email');
		frm.project_email.focus();
		return false;
	}
	if (frm.project_tel.value == "") {
		alert('กรุณาระบุเบอร์โทรศัพท์');
		frm.project_tel.focus();
		return false;
	}
	if (frm.project_status_id.value == "") {
		alert('กรุณาเลือกสถานะโครงการ');
		frm.project_status_id.focus();
		return false;
	}
	var cf = confirm('ต้องการบันทึกข้อมูลใช่หรือไม่');
	if (cf == true) {
		return true;
	} else {
		return false;
	}
}
</script>
                        <form method="post" action="project_save.php" name="frm1" onsubmit="return chkData()">
                  <table width="670" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="155" height="25" align="right" class="textBlackNormal">ปีงบประมาณที่ทำโครงการ :</td>
                      <td height="25" colspan="3" align="left"><select name="year_budget_id" id="year_budget_id" style="width:90px;" onchange="q1(this.value)">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_budget = "select year_budget_id from year_budget order by year_budget_id desc";
						$result_budget = mysql_query($sql_budget);
						while ($r_budget = mysql_fetch_array($result_budget)) {
							if ($rp['year_budget_id'] == $r_budget['year_budget_id']) {
								echo "<option value='$r_budget[year_budget_id]' selected>$r_budget[year_budget_id]</option>";
							} else {
								echo "<option value='$r_budget[year_budget_id]'>$r_budget[year_budget_id]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ชื่อแผนงาน/โครงการ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_name" type="text" id="project_name" style="width:450px;" value="<?php echo $rp['project_name']; ?>" maxlength="250" />
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">งบประมาณ (บาท) :</td>
                      <td height="25" align="left"><input name="project_money" type="text" id="project_money" style="width:80px;" value="<?php echo $rp['project_money']; ?>"  maxlength="15" />
                        <span class="textRedSmall">*</span></td>
                      <td height="25" align="right" class="textBlackNormal">ประเภทการใช้จ่าย :</td>
                      <td height="25" align="left"><select name="spend_type_id" id="spend_type_id" style="width:84px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_spend = "select spend_type_id, spend_type_name from spend_type order by spend_type_id";
						$result_spend = mysql_query($sql_spend);
						while ($r_spend = mysql_fetch_array($result_spend)) {
							if ($rp['spend_type_id'] == $r_spend['spend_type_id']) {
								echo "<option value='$r_spend[spend_type_id]' selected>$r_spend[spend_type_name]</option>";
							} else {
								echo "<option value='$r_spend[spend_type_id]'>$r_spend[spend_type_name]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">วันที่เริ่มต้นโครงการ :</td>
                      <td width="102" height="25" align="left">
                        <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
                        <script type="text/javascript" src="js/dp.js"></script>
                        <style type="text/css">
			/*demo page css
			body{ font: 80% "Trebuchet MS", sans-serif; margin: 50px;}*/
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style><input name="begin_date" type="text" id="datepicker-th-1" style="width:80px;" maxlength="10" value="<?php echo $d1; ?>" />
		<span class="textRedSmall">*</span></td>
                      <td width="115" align="right" class="textBlackNormal">วันที่สิ้นสุดโครงการ :</td>
                      <td width="282" align="left"><input name="end_date" type="text" id="datepicker-th-2" style="width:80px;" value="<?php echo $d2; ?>"  maxlength="10" />
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">พื้นที่ดำเนินการ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_area" type="text" id="project_area" style="width:295px;" value="<?php echo $rp['project_area']; ?>" maxlength="250"/>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์จังหวัด :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_province"><select name="strategic_province_id" id="strategic_province_id" style="width:300px;">
                      	<option value='0'>ไม่สอดคล้องโดยตรง</option>
                      <?php
					  $sql_sp = "select strategic_province_id, strategic_province_name from strategic_province where strategic_province_year = '$rp[year_budget_id]' and strategic_province_status = '1'";
$result_sp = mysql_query($sql_sp);
						while ($r_sp = mysql_fetch_array($result_sp)) {
							if ($rp['strategic_province_id'] == $r_sp['strategic_province_id']) {
								echo "<option value='$r_sp[strategic_province_id]' selected>$r_sp[strategic_province_name]</option>";
							} else {
								echo "<option value='$r_sp[strategic_province_id]'>$r_sp[strategic_province_name]</option>";
							}
						}
					  ?>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์อำเภอ :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_district"><select name="strategic_district_id" id="strategic_district_id" style="width:300px;">
                        <option value='0'>ไม่สอดคล้องโดยตรง</option>
                        <?php
						$sql_sd = "select strategic_district_id, strategic_district_name from strategic_district where strategic_district_year = '$rp[year_budget_id]' and strategic_district_status = '1'";
						$result_sd = mysql_query($sql_sd);
						while ($r_sd = mysql_fetch_array($result_sd)) {
							if ($rp['strategic_district_id'] == $r_sd['strategic_district_id']) {
								echo "<option value='$r_sd[strategic_district_id]' selected>$r_sd[strategic_district_name]</option>";
							} else {
								echo "<option value='$r_sd[strategic_district_id]'>$r_sd[strategic_district_name]</option>";
							}
						}
						?>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์ รพ. :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_hospital"><select name="strategic_hospital_id" id="strategic_hospital_id" style="width:300px;">
                        <option value='0'>ไม่สอดคล้องโดยตรง</option>
                        <?php
						$sql_sh = "select strategic_hospital_id, strategic_hospital_name from strategic_hospital where strategic_hospital_year = '$rp[year_budget_id]' and strategic_hospital_status = '1'";
						$result_sh = mysql_query($sql_sh);
						while ($r_sh = mysql_fetch_array($result_sh)) {
							if ($rp['strategic_hospital_id'] == $r_sh['strategic_hospital_id']) {
								echo "<option value='$r_sh[strategic_hospital_id]' selected>$r_sh[strategic_hospital_name]</option>";
							} else {
								echo "<option value='$r_sh[strategic_hospital_id]'>$r_sh[strategic_hospital_name]</option>";
							}
						}
						?>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">พันธกิจ :</td>
                      <td height="25" colspan="3" align="left"><span id="tResponsibility"><select name="responsibility_id" id="responsibility_id" style="width:300px;" onchange="qTarget(this.value)">
                        <option value='0'>ไม่สอดคล้องโดยตรง</option>
                        <?php
						$sql_r = "select responsibility_id, responsibility_name from responsibility where responsibility_year = '$rp[year_budget_id]' and responsibility_status = '1'";
						$result_r = mysql_query($sql_r);
						while ($r_r = mysql_fetch_array($result_r)) {
							if ($rp['responsibility_id'] == $r_r['responsibility_id']) {
								echo "<option value='$r_r[responsibility_id]' selected>$r_r[responsibility_name]</option>";
							} else {
								echo "<option value='$r_r[responsibility_id]'>$r_r[responsibility_name]</option>";
							}
						}
						?>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">เป้าประสงค์ :</td>
                      <td height="25" colspan="3" align="left"><span id="tTarget"><select name="target_id" id="target_id" style="width:300px;">
                        <option value='0'>ไม่สอดคล้องโดยตรง</option>
                        <?php
						$sql_t = "select target_id, target_name from target where responsibility_id = '$rp[responsibility_id]' and target_status = '1'";
						$result_t = mysql_query($sql_t);
						while ($r_t = mysql_fetch_array($result_t)) {
							if ($rp['target_id'] == $r_t['target_id']) {
								echo "<option value='$r_t[target_id]' selected>$r_t[target_name]</option>";
							} else {
								echo "<option value='$r_t[target_id]'>$r_t[target_name]</option>";
							}
						}
						?>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ลักษณะของโครงการ :</td>
                      <td height="25" colspan="3" align="left"><select name="project_style_id" id="project_style_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_ps = "select project_style_id, project_style_name from project_style order by project_style_id";
						$result_ps = mysql_query($sql_ps);
						while ($r_ps = mysql_fetch_array($result_ps)) {
							if ($rp['project_style_id'] == $r_ps['project_style_id']) {
								echo "<option value='$r_ps[project_style_id]' selected>$r_ps[project_style_name]</option>";
							} else {
								echo "<option value='$r_ps[project_style_id]'>$r_ps[project_style_name]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">มิติปฏิบัติราชการ :</td>
                      <td height="25" colspan="3" align="left"><select name="project_dimension_id" id="project_dimension_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_pd = "select project_dimension_id, project_dimension_name from project_dimension order by project_dimension_id";
						$result_pd = mysql_query($sql_pd);
						while ($r_pd = mysql_fetch_array($result_pd)) {
							if ($rp['project_dimension_id'] == $r_pd['project_dimension_id']) {
								echo "<option value='$r_pd[project_dimension_id]' selected>$r_pd[project_dimension_name]</option>";
							} else {
								echo "<option value='$r_pd[project_dimension_id]'>$r_pd[project_dimension_name]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">หน่วยงานรับผิดชอบหลัก :</td>
                      <td height="25" colspan="3" align="left"><select name="sub_dept_id" id="sub_dept_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_sd = "select sub_dept_id, sub_dept_name from tb_sub_dept where sub_dept_status = '1'";
						if ($_COOKIE["cook_user_type_id"] == "3") {
							$sql_sd .= " and sub_dept_id in(select sub_dept_id from user_leader2_detail where person_id = \"$_COOKIE[cook_id]\")";
						}
						if ($_COOKIE["cook_user_type_id"] == "4") {
							$sql_sd .= " and sub_dept_id in(select sub_dept_id from user_group_work_detail where person_id = \"$_COOKIE[cook_id]\")";
						}
						if ($_COOKIE["cook_user_type_id"] == "5") {
							$sql_sd .= " and sub_dept_id in(select sub_dept_id from user_work_detail where person_id = \"$_COOKIE[cook_id]\")";
						}
						$sql_sd .= " order by sub_dept_name";
						$result_sd = mysql_query($sql_sd);
						while ($r_sd = mysql_fetch_array($result_sd)) {
							if ($rp['sub_dept_id'] == $r_sd['sub_dept_id']) {
								echo "<option value='$r_sd[sub_dept_id]' selected>$r_sd[sub_dept_name]</option>";
							} else {
								echo "<option value='$r_sd[sub_dept_id]'>$r_sd[sub_dept_name]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">หน่วยงานรับผิดชอบร่วม :</td>
                      <td height="25" colspan="3" align="left"><select name="sub_dept_with_id" id="sub_dept_with_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_sd = "select sub_dept_id, sub_dept_name from tb_sub_dept where sub_dept_status = '1' order by sub_dept_name";
						$result_sd = mysql_query($sql_sd);
						while ($r_sd = mysql_fetch_array($result_sd)) {
							if ($rp['sub_dept_with_id'] == $r_sd['sub_dept_id']) {
								echo "<option value='$r_sd[sub_dept_id]' selected>$r_sd[sub_dept_name]</option>";
							} else {
								echo "<option value='$r_sd[sub_dept_id]'>$r_sd[sub_dept_name]</option>";
							}
						}
						?>
                      </select></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">Email :</td>
                      <td height="25" colspan="3" align="left"><input name="project_email" type="text" id="project_email" style="width:295px;" value="<?php echo $rp['project_email']; ?>" maxlength="250"/>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">เบอร์โทรศัพท์ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_tel" type="text" id="project_tel" style="width:295px;" value="<?php echo $rp['project_tel']; ?>" maxlength="50"/>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">สถานะโครงการ :</td>
                      <td height="25" colspan="3" align="left"><select name="project_status_id" id="project_status_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_ps2 = "select project_status_id, project_status_name from project_status order by project_status_id";
						$result_ps2 = mysql_query($sql_ps2);
						while ($r_ps2 = mysql_fetch_array($result_ps2)) {
							if ($rp['project_status_id'] == $r_ps2['project_status_id']) {
								echo "<option value='$r_ps2[project_status_id]' selected>$r_ps2[project_status_name]</option>";
							} else {
								echo "<option value='$r_ps2[project_status_id]'>$r_ps2[project_status_name]</option>";
							}
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                      <td height="25" colspan="3" align="left" class="textBlackNormal"><input type="submit" name="button" id="button" value="  บันทึก  " />
                        <input name="project_id" type="hidden" id="project_id" value="<?php echo $project_id; ?>" />
                        <input name="st" type="hidden" id="st" value="edit" /></td>
                    </tr>
                  </table>
                  </form></div>
                  		<!--รายละเอียด-->
                        <div id="tabs-2">
                        <script>
						function chkData2() {
							var cf = confirm('ต้องการบันทึกข้อมูลใช่หรือไม่');
							if (cf == true) {
								return true;
							} else {
								return false;
							}
						}
						</script>
                        <form method="post" name="frm2" action="project_save_detail.php" onsubmit="return chkData2()">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="159" height="25" align="right" class="textBlackNormal">หลักการและเหตุผล :</td>
                              <td height="25" colspan="4" align="left"><textarea name="project_reason" id="project_reason" cols="80" style="width:500px;" rows="5"><?php echo $rp['project_reason']; ?></textarea></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">แหล่งงบประมาณ :</td>
                              <td height="25" colspan="4" align="left" class="textBlackNormal">
<script>
function popupAddProjectBudget(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_project_budget_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKProjectBudget() {
	var url = "project_budget_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tBudget");
}
function delProjectBudget(project_id, project_budget_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "project_budget_save.php?project_id=" + encodeURIComponent(project_id) + "&project_budget_id=" + encodeURIComponent(project_budget_id) + "&st=del";
		LoadData(url, "tBudget");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKProjectBudget();
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupAddProjectBudget('<?php echo $project_id; ?>')" id="k2">เพิ่มแหล่งงบประมาณ</a></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">&nbsp;</td>
                              <td height="25" colspan="4" align="left"><span id="tBudget">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">แนวทาง/แผนดำเนินงาน :</td>
                              <td height="25" colspan="4" align="left">
<script>
function popupAddProjectActivity(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_project_activity_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKProjectActivity() {
	var url = "project_activity_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tActivity");
}
function delProjectActivity(project_activity_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "project_activity_save.php?project_activity_id=" + encodeURIComponent(project_activity_id) + "&st=del";
		LoadData(url, "tActivity");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKProjectActivity();
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupAddProjectActivity('<?php echo $project_id; ?>')" id="k2">เพิ่มแนวทาง/แผนดำเนินงาน</a></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" colspan="4" align="left"><span id="tActivity">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">วัตถุประสงค์โครงการ :</td>
                              <td height="25" colspan="4" align="left"><textarea name="project_objective" id="project_objective" cols="80" style="width:500px;" rows="5"><?php echo $rp['project_objective']; ?></textarea></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ตัวชี้วัดผลผลิต :</td>
                              <td height="25" colspan="4" align="left">
<script>
function popupAddPointProduct(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_point_product_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKPointProduct() {
	var url = "point_product_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPointProduct");
}
function delPointProduct(point_product_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "point_product_save.php?point_product_id=" + encodeURIComponent(point_product_id) + "&st=del";
		LoadData(url, "tPointProduct");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKPointProduct();
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupAddPointProduct('<?php echo $project_id; ?>')" id="k2">เพิ่มตัวชี้วัดผลผลิต</a></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">&nbsp;</td>
                              <td height="25" colspan="4" align="left"><span id="tPointProduct">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ตัวชี้วัดผลลัพธ์ :</td>
                              <td height="25" colspan="4" align="left">
<script>
function popupAddPointResult(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_point_result_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKPointResult() {
	var url = "point_result_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPointResult");
}
function delPointResult(point_result_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "point_result_save.php?point_result_id=" + encodeURIComponent(point_result_id) + "&st=del";
		LoadData(url, "tPointResult");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKPointResult();
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupAddPointResult('<?php echo $project_id; ?>')" id="k2">เพิ่มตัวชี้วัดผลลัพธ์</a></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" colspan="4" align="left"><span id="tPointResult">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">กลุ่มเป้าหมาย :</td>
                              <td height="25" colspan="4" align="left"><input name="project_target_group" type="text" id="project_target_group" style="width:500px;" value="<?php echo $rp['project_target_group']; ?>" maxlength="255" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ผู้มีส่วนได้ส่วนเสีย :</td>
                              <td height="25" colspan="4" align="left"><select name="project_interest_id" id="project_interest_id" style="width:300px;">
                                <option value="">--เลือก--</option>
                                <?php
						$sql_pi = "select project_interest_id, project_interest_name from project_interest order by project_interest_id";
						$result_pi = mysql_query($sql_pi);
						while ($r_pi = mysql_fetch_array($result_pi)) {
							if ($rp['project_interest_id'] == $r_pi['project_interest_id']) {
								echo "<option value='$r_pi[project_interest_id]' selected>$r_pi[project_interest_name]</option>";
							} else {
								echo "<option value='$r_pi[project_interest_id]'>$r_pi[project_interest_name]</option>";
							}
						}
						?>
                              </select></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">&nbsp;</td>
                              <td width="130" height="20" align="left" bgcolor="#E9E9E9" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ชื่อ - สกุล</td>
                              <td width="134" align="left" bgcolor="#E9E9E9" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ตำแหน่ง</td>
                              <td width="134" align="left" bgcolor="#E9E9E9" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">email</td>
                              <td width="93" align="left" bgcolor="#E9E9E9" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เบอร์มือถือ</td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ที่ปรึกษาแผนงาน/โครงการ :</td>
                              <td height="25" align="left"><input name="project_adviser_name" type="text" id="project_adviser_name" style="width:130px;" value="<?php echo $rp['project_adviser_name']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_adviser_position" type="text" id="project_adviser_position" style="width:130px;" value="<?php echo $rp['project_adviser_position']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_adviser_email" type="text" id="project_adviser_email" style="width:130px;" value="<?php echo $rp['project_adviser_email']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_adviser_tel" type="text" id="project_adviser_tel" style="width:80px;" value="<?php echo $rp['project_adviser_tel']; ?>" maxlength="30" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">หัวหน้าโครงการ :</td>
                              <td height="25" align="left"><input name="project_responsible_name" type="text" id="project_responsible_name" style="width:130px;" value="<?php echo $rp['project_responsible_name']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_responsible_position" type="text" id="project_responsible_position" style="width:130px;" value="<?php echo $rp['project_responsible_position']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_responsible_email" type="text" id="project_responsible_email" style="width:130px;" value="<?php echo $rp['project_responsible_email']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_responsible_tel" type="text" id="project_responsible_tel" style="width:80px;" value="<?php echo $rp['project_responsible_tel']; ?>" maxlength="30" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ผู้ประสานงานโครงการ :</td>
                              <td height="25" align="left"><input name="project_collaborator_name" type="text" id="project_collaborator_name" style="width:130px;" value="<?php echo $rp['project_collaborator_name']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_collaborator_position" type="text" id="project_collaborator_position" style="width:130px;" value="<?php echo $rp['project_collaborator_position']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_collaborator_email" type="text" id="project_collaborator_email" style="width:130px;" value="<?php echo $rp['project_collaborator_email']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_collaborator_tel" type="text" id="project_collaborator_tel" style="width:80px;" value="<?php echo $rp['project_collaborator_tel']; ?>" maxlength="30" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="right" class="textBlackNormal">ผู้บันทึกข้อมูล :</td>
                              <td height="25" align="left"><input name="project_record_name" type="text" id="project_record_name" style="width:130px;" value="<?php echo $rp['project_record_name']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_record_position" type="text" id="project_record_position" style="width:130px;" value="<?php echo $rp['project_record_position']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_record_email" type="text" id="project_record_email" style="width:130px;" value="<?php echo $rp['project_record_email']; ?>" maxlength="50" /></td>
                              <td height="25" align="left"><input name="project_record_tel" type="text" id="project_record_tel" style="width:80px;" value="<?php echo $rp['project_record_tel']; ?>" maxlength="30" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" colspan="4" align="left" class="textBlackNormal"><input type="submit" name="button3" id="button3" value="  บันทึก  " />
                                <input name="project_id2" type="hidden" id="project_id2" value="<?php echo $project_id; ?>" /></td>
                            </tr>
                          </table>
                          </form>
                        </div>
                        <!--การเบิกจ่าย-->
                        <div id="tabs-3">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal">
<script>
function popupAddPayTarget(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_pay_target_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKPayTarget() {
	var url = "pay_target_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPayTarget");
}
function delPayTarget(pay_target_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "pay_target_save.php?pay_target_id=" + encodeURIComponent(pay_target_id) + "&st=del";
		LoadData(url, "tPayTarget");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKPayTarget();
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupAddPayTarget('<?php echo $project_id; ?>')" id="k2">เพิ่มเป้าหมายการเบิกจ่าย</a></td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tPayTarget">&nbsp;</span></td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal">
<script>
function popupAddPay(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_pay_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKPay() {
	var url = "pay_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPay");
}
function delPay(pay_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "pay_save.php?pay_id=" + encodeURIComponent(pay_id) + "&st=del";
		LoadData(url, "tPay");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKPay();
	} else {
		return false;
	}
}
</script>
                                <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" id="k2" onclick="popupAddPay('<?php echo $project_id; ?>')">เพิ่มรายการเบิกจ่ายจริง</a></td>
                              </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tPay">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td width="155" height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td width="507" height="25" align="left">&nbsp;</td>
                            </tr>
                          </table>
                        </div>
                        <!--ความก้าวหน้าโครงการ-->
                        <div id="tabs-4">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="299" height="25" align="left" class="textBlackNormal">
<script>
function popupProgressActivityAdd(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_activity_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function TransferActivity(project_id) {
	var cf = confirm('ต้องการนำเข้ากิจกรรมจากแผนการดำเนินงานใช่หรือไม่');
	if (cf == true) {
		var url = "transfer_activity.php?project_id=" + encodeURIComponent(project_id);
		LoadData(url, "tActivityProgress");
		alert('นำเข้าข้อมูลเรียบร้อยแล้ว');
		getOKActivityProgress();
		return true;
	} else {
		return false;
	}
}
function getOKActivityProgress() {
	var url = "progress_activity_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tActivityProgress");
}
function editActivityProgress(project_activity_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_activity_edit.php?project_activity_id=" + project_activity_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function delActivityProgress(project_activity_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
	var url = "progress_activity_save.php?project_activity_id=" + project_activity_id + "&st=del";
	LoadData(url, "tActivityProgress");
	alert('ลบข้อมูลเรียบร้อยแล้ว');
	getOKActivityProgress();
	return true;
	} else {
		return false;
	}
}
</script>
<img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" id="k2" onclick="popupProgressActivityAdd('<?php echo $project_id; ?>')">เพิ่มความก้าวหน้าตามกิจกรรม</a></td>
                              <td width="363" height="25" align="right"><img src="images/transfer.png" width="25" height="25" border="0" align="absmiddle" /> <a href="javascript:;" onclick="TransferActivity('<?php echo $project_id; ?>')" id="k2">นำเข้ากิจกรรมจากแผน</a>&nbsp;<img src="images/database_refresh.png" width="16" height="16" border="0" align="absmiddle" /> <a href="javascript:;" id="k2" onclick="getOKActivityProgress()">Refresh</a></td>
                              </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tActivityProgress">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal">&nbsp;</td>
                              </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">
<script>
function popupProgressPointProductAdd(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_point_product_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function TransferPointProduct(project_id) {
	var cf = confirm('ต้องการนำเข้าตัวชี้วัดผลผลิตจากแผนการดำเนินงานใช่หรือไม่');
	if (cf == true) {
		var url = "transfer_point_product.php?project_id=" + encodeURIComponent(project_id);
		LoadData(url, "tPointProductProgress");
		alert('นำเข้าข้อมูลเรียบร้อยแล้ว');
		getOKPointProductProgress();
		return true;
	} else {
		return false;
	}
}
function getOKPointProductProgress() {
	var url = "progress_point_product_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPointProductProgress");
}
function editPointProductProgress(point_product_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_point_product_edit.php?point_product_id=" + point_product_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function delPointProductProgress(point_product_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
	var url = "progress_point_product_save.php?point_product_id=" + point_product_id + "&st=del";
	LoadData(url, "tPointProductProgress");
	alert('ลบข้อมูลเรียบร้อยแล้ว');
	getOKPointProductProgress();
	return true;
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupProgressPointProductAdd('<?php echo $project_id; ?>')" id="k2">เพิ่มความก้าวหน้าตามตัวชี้วัดผลผลิต</a></td>
                              <td height="25" align="right" class="textBlackNormal"><img src="images/transfer.png" width="25" height="25" border="0" align="absmiddle" /> <a href="javascript:;" onclick="TransferPointProduct('<?php echo $project_id; ?>')" id="k2">นำเข้าตัวชี้วัดผลผลิตจากแผน</a>&nbsp;<img src="images/database_refresh.png" width="16" height="16" border="0" align="absmiddle" /> <a href="javascript:;" onclick="getOKPointProductProgress()" id="k2">Refresh</a></td>
                              </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tPointProductProgress">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">
<script>
function popupProgressPointResultAdd(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_point_result_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function TransferPointResult(project_id) {
	var cf = confirm('ต้องการนำเข้าตัวชี้วัดผลลัพธ์จากแผนการดำเนินงานใช่หรือไม่');
	if (cf == true) {
		var url = "transfer_point_result.php?project_id=" + encodeURIComponent(project_id);
		LoadData(url, "tPointResultProgress");
		alert('นำเข้าข้อมูลเรียบร้อยแล้ว');
		getOKPointResultProgress();
		return true;
	} else {
		return false;
	}
}
function getOKPointResultProgress() {
	var url = "progress_point_result_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tPointResultProgress");
}
function editPointResultProgress(point_result_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_progress_point_result_edit.php?point_result_id=" + point_result_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function delPointResultProgress(point_result_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
	var url = "progress_point_result_save.php?point_result_id=" + point_result_id + "&st=del";
	LoadData(url, "tPointResultProgress");
	alert('ลบข้อมูลเรียบร้อยแล้ว');
	getOKPointResultProgress();
	return true;
	} else {
		return false;
	}
}
</script>
                              <img src="images/add.png" width="21" height="21" border="0" align="absmiddle" /> <a href="javascript:;" onclick="popupProgressPointResultAdd('<?php echo $project_id; ?>')" id="k2">เพิ่มความก้าวหน้าตามตัวชี้วัดผลลัพธ์</a></td>
                              <td height="25" align="right"><img src="images/transfer.png" width="25" height="25" border="0" align="absmiddle" /> <a href="javascript:;" onclick="TransferPointResult('<?php echo $project_id; ?>')" id="k2">นำเข้าตัวชี้วัดผลลัพธ์จากแผน</a>&nbsp;<img src="images/database_refresh.png" width="16" height="16" border="0" align="absmiddle" /> <a href="javascript:;" onclick="getOKPointResultProgress()" id="k2">Refresh</a></td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tPointResultProgress">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left">&nbsp;</td>
                            </tr>
                          </table>
                        </div>
                        <!--เอกสาร/รูปภาพ-->
                        <div id="tabs-5">
<script>
function chkFile() {
	var frm = document.frmFile;
	if (frm.fileupload.value == "") {
		alert('กรุณาเลือกไฟล์ที่ต้องการอัพโหลด');
		return false;
	}
	if (frm.file_description.value == "") {
		alert('กรุณาระบุคำอธิบาย');
		frm.file_description.focus();
		return false;
	}
	var cf = confirm('ต้องการบันทึกข้อมูลใช่หรือไม่');
	if (cf == true) {
		return true;
	} else {
		return false;
	}
}
</script>
                        <form method="post" action="file_save.php" enctype="multipart/form-data" name="frmFile" onsubmit="return chkFile()">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="155" height="25" align="left" class="textBlackNormal">ไฟล์เอกสาร / รูปภาพ :</td>
                              <td width="507" height="25" align="left"><input name="fileupload" type="file" id="fileupload" style="width:500px;" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">คำอธิบาย :</td>
                              <td height="25" align="left"><textarea name="file_description" id="file_description" cols="80" style="width:500px;" rows="5"></textarea></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">นามสกุลไฟล์ที่ระบบรองรับ :</td>
                              <td height="25" align="left">jpg, doc, docx, ppt, pptx, xls, xlsx, pdf (ขนาดไม่เกิน 2MB เท่านั้น)</td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left"><input type="submit" name="button5" id="button5" value="  บันทึกไฟล์เอกสาร / รูปภาพ  " />
                                <input name="project_id_file" type="hidden" id="project_id_file" value="<?php echo $project_id; ?>" />
                                <input name="file_st" type="hidden" id="file_st" value="save" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textGreenNormal">ภาพกิจกรรม</td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <tr>
                                    <td width="41%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ภาพกิจกรรม</td>
                                    <td width="52%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">คำอธิบาย</td>
                                    <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_file1 = "select * from tb_project_file where project_id = \"$project_id\" and (ext = 'jpg' or ext = 'jpeg') order by file_id";
								  $result_file1 = mysql_db_query($db, $sql_file1);
								  $i = 1;
								  while ($r_file1 = mysql_fetch_array($result_file1)) {
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo "<a href='files/$r_file1[file_name]' target='_blank'><img src='files/$r_file1[file_name]' width='248' height='185' border='0' /><a>"; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo nl2br($r_file1['file_description']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="file_save.php?file_id=<?php echo $r_file1['file_id']; ?>&file_name=<?php echo $r_file1['file_name']; ?>&project_id_file=<?php echo $project_id; ?>&file_st=del" onclick="return confirm('ต้องการลบภาพกิจกรรมใช่หรือไม่')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while ?>
                                </table></td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textGreenNormal">ไฟล์เอกสาร</td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><table width="100%" border="0" cellspacing="0" cellpadding="2">
                                  <tr>
                                    <td width="41%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ไฟล์เอกสาร</td>
                                    <td width="52%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">คำอธิบาย</td>
                                    <td width="7%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_file2 = "select * from tb_project_file where project_id = \"$project_id\" and ext != 'jpg' and ext != 'jpeg' order by file_id";
								  $result_file2 = mysql_db_query($db, $sql_file2);
								  $i = 1;
								  while ($r_file2 = mysql_fetch_array($result_file2)) {
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php
                                    if ($r_file2['ext'] == "doc" || $r_file2['ext'] == "docx") {
										echo "<img src='images/doc.png' align='absmiddle'>&nbsp;";
									}
									if ($r_file2['ext'] == "pdf") {
										echo "<img src='images/pdf.png' align='absmiddle'>&nbsp;";
									}
									if ($r_file2['ext'] == "xls" || $r_file2['ext'] == "xlsx") {
										echo "<img src='images/excel.jpg' align='absmiddle'>&nbsp;";
									}
									if ($r_file2['ext'] == "ppt" || $r_file2['ext'] == "pptx") {
										echo "<img src='images/ppt.png' align='absmiddle'>&nbsp;";
									}
									echo "<a href='files/$r_file2[file_name]' target='_blank' id='k2'>ไฟล์เอกสาร $i<a>";
									?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo nl2br($r_file2['file_description']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="file_save.php?file_id=<?php echo $r_file2['file_id']; ?>&file_name=<?php echo $r_file2['file_name']; ?>&project_id_file=<?php echo $project_id; ?>&file_st=del" onclick="return confirm('ต้องการลบภาพกิจกรรมใช่หรือไม่')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php $i++; } //end while ?>
                                </table></td>
                              </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left">&nbsp;</td>
                            </tr>
                          </table>
                          </form>
                        </div>
                        <!--ข้อเสนอแนะ-ข้อสั่งการ-->
                        <div id="tabs-6">
                        <form method="post" name="frm6">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td height="25" align="left" class="textGreenNormal" style="border-bottom:1px dotted #CCC;">ปัญหา/อุปสรรค/ข้อจำกัด/ข้อเสนอแนะ</td>
                              <td height="25" align="right" class="textGreenNormal" style="border-bottom:1px dotted #CCC;"><img src="images/database_refresh.png" width="16" height="16" border="0" align="absmiddle" /> <a href="javascript:;" id="k2" onclick="getOKProblem()">Refresh</a></td>
                              </tr>
<script>
function popupAddProblem(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_problem_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKProblem() {
	var url = "problem_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tProblem");
}
function delProblem(problem_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "problem_save.php?problem_id=" + encodeURIComponent(problem_id) + "&st=del";
		LoadData(url, "tProblem");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKProblem();
	} else {
		return false;
	}
}
</script>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal"><img src="images/add.png" width="21" height="21" align="absmiddle" /> <a href="javascript:;" onclick="popupAddProblem('<?php echo $project_id; ?>')" id="k2">เพิ่มการแจ้งปัญหา</a></td>
                              <td height="25" align="right" class="textBlackNormal">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tProblem">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal">&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textGreenNormal" style="border-bottom:1px dotted #CCC;">ข้อสั่งการ</td>
                              <td height="25" align="right" class="textGreenNormal" style="border-bottom:1px dotted #CCC;"><img src="images/database_refresh.png" width="16" height="16" border="0" align="absmiddle" /> <a href="javascript:;" id="k2" onclick="getOKCommand()">Refresh</a></td>
                            </tr>
<script>
function popupAddCommand(project_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_command_add.php?project_id=" + project_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function getOKCommand() {
	var url = "command_list.php?project_id=<?php echo $project_id; ?>";
	LoadData(url, "tCommand");
}
function delCommand(command_id) {
	var cf = confirm('ต้องการลบข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "command_save.php?command_id=" + encodeURIComponent(command_id) + "&st=del";
		LoadData(url, "tCommand");
		alert('ลบข้อมูลเรียบร้อยแล้ว');
		getOKCommand();
	} else {
		return false;
	}
}
function popupAnswerCommand(command_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_command_answer_add.php?command_id=" + command_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
function popupCommandDetail(command_id) {
	var str = Math.random();
	w = screen.availWidth;
	h = screen.availHeight;
	var popW = 550, popH = 400;
	var leftPos = (w-popW)/2, topPos = (h-popH)/2;
	window.open("popup_command_detail.php?command_id=" + command_id, "loadorder", "width=" + popW + ", height=" + popH + ", top=" + topPos + ", left=" + leftPos + ", menubar=no, resizeable=no, toolbar=no, scrollbars=yes");
}
</script>
							<?php if ($_COOKIE["cook_user_type_id"] != "5") { ?>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal"><img src="images/add.png" align="absmiddle" /> <a href="javascript:;" onclick="popupAddCommand('<?php echo $project_id; ?>')" id="k2">เพิ่มข้อสั่งการ</a></td>
                              <td height="25" align="right" class="textBlackNormal">&nbsp;</td>
                            </tr>
                            <?php } ?>
                            <tr>
                              <td height="25" colspan="2" align="left" class="textBlackNormal"><span id="tCommand">&nbsp;</span></td>
                              </tr>
                            <tr>
                              <td width="204" height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td width="458" height="25" align="left">&nbsp;</td>
                            </tr>
                          </table>
                          </form>
                        </div>
                        <!--ผลการตรวจสอบ-->
                        <div id="tabs-7">
                        <form name="frmApprove">
                          <table width="670" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="155" height="25" align="left" class="textBlackNormal">ผลการตรวจสอบข้อมูล</td>
                              <td width="507" height="25" align="left">
<script>
function saveApprove(project_id) {
	var frm = document.frmApprove;
	var project_approve = 0;
	if (frm.project_approve[1].checked == true) {
		project_approve = 1;
	}
	var approve_date = frm.approve_date.value;
	var url = "project_approve_save.php?project_id=" + encodeURIComponent(project_id) + "&project_approve=" + project_approve + "&approve_date=" + encodeURIComponent(approve_date);
	QueryData(url);
}
</script>
                              <label>
                                <input type="radio" name="project_approve" id="radio" value="0" <?php if ($rp['project_approve'] == "" || $rp['project_approve'] == "0") { echo "checked"; } ?> />
                                ยังไม่ยืนยัน</label>&nbsp;
                                <label>
                                  <input type="radio" name="project_approve" id="radio2" value="1" <?php if ($rp['project_approve'] == "1") { echo "checked"; } ?> />
                                  ยืนยันข้อมูล</label></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">วันที่ตรวจสอบข้อมูล</td>
                              <td height="25" align="left"><input name="approve_date" type="text" id="datepicker-th-5" style="width:80px;" maxlength="10"  value="<?php if ($rp['approve_date'] != "") { echo FormatDateSlash($rp['approve_date']); } ?>" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left"><input type="button" name="button7" id="button7" value="  บันทึก  " onclick="saveApprove('<?php echo $project_id; ?>')" /></td>
                            </tr>
                            <tr>
                              <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                              <td height="25" align="left">&nbsp;</td>
                            </tr>
                          </table>
                          </form>
                          <?php mysql_close($conn); ?>
                        </div>
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