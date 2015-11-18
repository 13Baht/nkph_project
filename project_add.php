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
                <td width="707" align="left" background="images/top2.jpg" class="textWhiteBold"><!-- InstanceBeginEditable name="EditRegion3" --><img src="images/edit2.png" border="0" align="absmiddle" />เพิ่มข้อมูลโครงการ<!-- InstanceEndEditable --></td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td align="left"><!-- InstanceBeginEditable name="EditRegion4" -->
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
                  <table width="704" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="155" height="25" align="right" class="textBlackNormal">ปีงบประมาณที่ทำโครงการ :</td>
                      <td height="25" colspan="3" align="left"><select name="year_budget_id" id="year_budget_id" style="width:90px;" onchange="q1(this.value)">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_budget = "select year_budget_id from year_budget order by year_budget_id desc";
						$result_budget = mysql_query($sql_budget);
						while ($r_budget = mysql_fetch_array($result_budget)) {
							echo "<option value='$r_budget[year_budget_id]'>$r_budget[year_budget_id]</option>";
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ชื่อแผนงาน/โครงการ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_name" type="text" id="project_name" style="width:500px;" maxlength="250" />
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">งบประมาณ (บาท) :</td>
                      <td height="25" align="left"><input name="project_money" type="text" id="project_money" style="width:80px;"  maxlength="15" />
                        <span class="textRedSmall">*</span></td>
                      <td height="25" align="right" class="textBlackNormal">ประเภทการใช้จ่าย :</td>
                      <td height="25" align="left"><select name="spend_type_id" id="spend_type_id" style="width:84px;">
                        <option value="">--เลือก--</option>
                        <?php
						$sql_spend = "select spend_type_id, spend_type_name from spend_type order by spend_type_id";
						$result_spend = mysql_query($sql_spend);
						while ($r_spend = mysql_fetch_array($result_spend)) {
							echo "<option value='$r_spend[spend_type_id]'>$r_spend[spend_type_name]</option>";
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">วันที่เริ่มต้นโครงการ :</td>
                      <td width="96" height="25" align="left">
                      <link rel="stylesheet" href="css/base/jquery.ui.all.css">
                        <script type="text/javascript" src="js/jquery-1.8.0.js"></script>
                        <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
                        <script type="text/javascript" src="js/dp.js"></script>
                        <link rel="stylesheet" type="text/css" href="css/demos.css"/>
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
		</style><input name="begin_date" type="text" id="datepicker-th-1" style="width:80px;"  maxlength="10" />
		<span class="textRedSmall">*</span></td>
                      <td width="111" align="right" class="textBlackNormal">วันที่สิ้นสุดโครงการ :</td>
                      <td width="326" align="left"><input name="end_date" type="text" id="datepicker-th-2" style="width:80px;"  maxlength="10" />
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">พื้นที่ดำเนินการ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_area" type="text" id="project_area" style="width:295px;" maxlength="250"/>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์จังหวัด :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_province"><select name="strategic_province_id" id="strategic_province_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์อำเภอ :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_district"><select name="strategic_district_id" id="strategic_district_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">ประเด็นยุทธศาสตร์ รพ. :</td>
                      <td height="25" colspan="3" align="left"><span id="tStrategic_hospital"><select name="strategic_hospital_id" id="strategic_hospital_id" style="width:300px;">
                        <option value="">--เลือก--</option>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">พันธกิจ :</td>
                      <td height="25" colspan="3" align="left"><span id="tResponsibility"><select name="responsibility_id" id="responsibility_id" style="width:300px;">
                        <option selected="selected">--เลือก--</option>
                      </select></span>&nbsp;<span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">เป้าประสงค์ :</td>
                      <td height="25" colspan="3" align="left"><span id="tTarget"><select name="target_id" id="target_id" style="width:300px;">
                        <option selected="selected">--เลือก--</option>
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
							echo "<option value='$r_ps[project_style_id]'>$r_ps[project_style_name]</option>";
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
							echo "<option value='$r_pd[project_dimension_id]'>$r_pd[project_dimension_name]</option>";
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
							echo "<option value='$r_sd[sub_dept_id]'>$r_sd[sub_dept_name]</option>";
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
							echo "<option value='$r_sd[sub_dept_id]'>$r_sd[sub_dept_name]</option>";
						}
						?>
                      </select></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">Email :</td>
                      <td height="25" colspan="3" align="left"><input name="project_email" type="text" id="project_email" style="width:295px;" maxlength="250"/>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="right" class="textBlackNormal">เบอร์โทรศัพท์ :</td>
                      <td height="25" colspan="3" align="left"><input name="project_tel" type="text" id="project_tel" style="width:295px;" maxlength="50"/>
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
							echo "<option value='$r_ps2[project_status_id]'>$r_ps2[project_status_name]</option>";
						}
						?>
                      </select>
                        <span class="textRedSmall">*</span></td>
                    </tr>
                    <tr>
                      <td height="25" align="left" class="textBlackNormal">&nbsp;</td>
                      <td height="25" colspan="3" align="left"><input type="submit" name="button" id="button" value="  บันทึก  " />
                        <input name="st" type="hidden" id="st" value="save" /></td>
                    </tr>
                  </table>
                  </form>
                  <?php mysql_close($conn); ?>
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