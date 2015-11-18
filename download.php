<?php
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/temp1.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- InstanceBeginEditable name="doctitle" -->
<title><?php echo $title_web; ?></title>
<link rel="stylesheet" href="css/jquery.treeview.css" />
<link rel="stylesheet" href="css/screen.css" />	
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/jquery.cookie.js" type="text/javascript"></script>
<script src="js/jquery.treeview.js" type="text/javascript"></script>
<script type="text/javascript" src="js/demo.js"></script>
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
                <td width="707" align="left" background="images/top2.jpg" class="textWhiteBold"><!-- InstanceBeginEditable name="EditRegion3" --><img src="images/download.png" width="30" height="30" align="absmiddle" /> ดาวน์โหลดเอกสาร<!-- InstanceEndEditable --></td>
                <td width="7" align="right"><img src="images/top-right.jpg" width="8" height="45" /></td>
              </tr>
              <tr>
                <td background="images/left.jpg">&nbsp;</td>
                <td align="left"><!-- InstanceBeginEditable name="EditRegion4" -->
                  <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td height="25" colspan="2" align="left"><ul id="browser" class="filetree">
                        <li class="closed"><span class="folder">1. ยุทธศาสตร์เขตบริการสุขภาพที่ 8</span>
                          <ul>
                            <li><span class="file"><a href="doc/1/1-KPI-R8-15.pdf" target="_blank" id="k2">กรอบการประเมินยุทธศาสตร์พัฒนาสุขภาพ เขตบริการสุขภาพที่ 8 ประจำปีงบประมาณ 2557</a></span></li>
                          </ul>
                        </li>
                        <li class="closed"><span class="folder">2. ยุทธศาสตร์พัฒนาสุขภาพจังหวัด ปี 2557</span>
                          <ul>
                            <li><span class="file"><a href="doc/2/2-1-Strategy-map-57.pdf" target="_blank" id="k2">แผนที่ยุทธศาสตร์พัฒนาสุขภาพจังหวัดนครพนม (Strategy Map) ปีงบประมาณ พ.ศ.2556-2560 (ทบทวนปี 2557)</a></span></li>
                            <li><span class="file"><a href="doc/2/2-2-KPI-result-2557.pdf" target="_blank" id="k2"> ตัวชี้วัด น้ำหนัก เป้าหมาย และเกณฑ์การให้คะแนนตามแผนยุทธศาสตร์สุขภาพจังหวัดนครพนม (ประเมินรอบ 6 เดือน) ปี 2557</a></span></li>
                            <li class="closed"><span class="folder">รายละเอียด KPI รายเป้าประสงค์</span>
                              <ul>
                              	<li class="closed"><span class="folder">เป้าประสงค์ที่ 1 (5 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-1-1.pdf" target="_blank" id="k2">1.1 คปสอ.มีกระบวนการดูแลหญิงตั้งครรภ์อย่างมีคุณภาพ ผ่านเกณฑ์คะแนน > 70 คะแนน</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-1-2.pdf" target="_blank" id="k2">1.2 หน่วยบริการสาธารณสุขที่มีคะแนนการประเมินกระบวนการส่งเสริมสุขภาพเด็กและเยาวชนในโรงเรียนระดับดี</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-1-3.pdf" target="_blank" id="k2">1.3 คปสอ.ที่มีคะแนนเฉลี่ยถ่วงน้ำหนักในการดำเนินงานทันตสุขภาพในช่องปาก ระดับ 3 ขึ้นไป</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-1-4.pdf" target="_blank" id="k2">1.4 เด็กอายุ 3 ปี ปราศจากฟันผุ</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-1-5.pdf" target="_blank" id="k2">1.5 เด็กอายุ 12 ปีปราศจากฟันผุ</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 2 (5 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-2-1.pdf" target="_blank" id="k2">2.1 อำเภอที่บรรลุเกณฑ์คุณลักษณะอำเภอควบคุมโรคเข้มแข็งแบบยั่งยืน ผ่านเกณฑ์คะแนน > ร้อยละ 80</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-2-2.pdf" target="_blank" id="k2">2.2 คปสอ.ที่บรรลุเกณฑ์การดำเนินงานป้องกัน แก้ไขปัญหาโรคพยาธิใบไม้ตับและมะเร็งท่อทางเดินน้ำดีตับ ผ่านเกณฑ์คะแนน > ร้อยละ 80
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-2-3.pdf" target="_blank" id="k2">2.3 อำเภอที่มีระดับความความสำเร็จของการดำเนินงานตามแผนงานป้องกัน ควบคุม แก้ไขปัญหาโรคไข้เลือดออก ระดับ 3 ขึ้นไป
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-2-4.pdf" target="_blank" id="k2">2.4 คปสอ.ที่ผ่านเกณฑ์การประเมินการดำเนินงานยาเสพติด ผ่านเกณฑ์คะแนน > 80 คะแนน</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-2-5.pdf" target="_blank" id="k2">2.5 คปสอ. ที่มีการดำเนินงานสร้างสุขภาพดีวิถีชีวิตไทยลดภัยโรคไม่ติดต่อเรื้อรัง ผ่านเกณฑ์คะแนน > ร้อยละ 70
</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 3 (3 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-3-1.pdf" target="_blank" id="k2">3.1 คปสอ.บรรลุเกณฑ์การดำเนินงานอาหารปลอดภัยและอนามัยสิ่งแวดล้อม ผ่านเกณฑ์คะแนน > ร้อยละ 80</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-3-2.pdf" target="_blank" id="k2">3.2 คปสอ.ที่ผ่านเกณฑ์การประเมินกระบวนการดำเนินงานคุ้มครองผู้บริโภคแบบมีส่วนร่วม คะแนนผ่านเกณฑ์ ร้อยละ 80
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-3-3.pdf" target="_blank" id="k2">3.3 คปสอ. ที่ผ่านเกณฑ์การประเมินผลสัมฤทธิ์การดำเนินงานคุ้มครองผู้บริโภคแบบมีส่วนร่วมผ่านเกณฑ์คะแนน ร้อยละ 75
</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 4 (3 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-4-1.pdf" target="_blank" id="k2">4.1 โรงพยาบาลที่มีคะแนนเฉลี่ยถ่วงน้ำหนักของการพัฒนาคุณภาพ ผ่านเกณฑ์คะแนน > 4 คะแนน</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-4-2.pdf" target="_blank" id="k2">4.2 หน่วยบริการสาธารณสุขที่ยังไม่ผ่านการประเมินรับรองจากองค์กรภายนอกมีระดับความสำเร็จในการพัฒนาคุณภาพมาตรฐานสุขศึกษา ระดับ 4 ขึ้นไป
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-4-3.pdf" target="_blank" id="k2">4.3 คปสอ.ที่มีระดับความสำเร็จในการจัดบริการการแพทย์แผนไทย การแพทย์ทางเลือกและการแพทย์พื้นบ้านตามมาตรฐานกระทรวงสาธารณสุข ระดับ 3 ขึ้นไป
</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 5 (2 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-5-1.pdf" target="_blank" id="k2">5.1 คปสอ.ที่มีคะแนนเฉลี่ยถ่วงน้ำหนักของการคุ้มครองสิทธิระบบหลักประกันสุขภาพ ผ่านเกณฑ์คะแนน > 3 คะแนน
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-5-2.pdf" target="_blank" id="k2">5.2 ความสัมฤทธิ์ผลของการดำเนินงานระบบลงทะเบียนผู้มีสิทธิในระบบหลักประกันสุขภาพ</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 6 (1 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-6-1.pdf" target="_blank" id="k2">6.1 ชุมชนผ่านเกณฑ์การประเมินระบบการจัดการสุขภาพภายใต้การมีส่วนร่วม ชุมชนเข็มแข็งเพื่อการปรับเปลี่ยนพฤติกรรมลดโรค
</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 7 (2 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-7-1.pdf" target="_blank" id="k2">7.1 หน่วยงานสาธารณสุขที่มีระดับความสำเร็จของการพัฒนาสมรรถนะ ระดับ 5</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-7-2.pdf" target="_blank" id="k2">7.2 คปสอ.ที่มีระดับความสำเร็จของบุคลากรที่มีความผาสุกในการปฏิบัติราชการ ระดับ 5</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 8 (4 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-8-1.pdf" target="_blank" id="k2">8.1 หน่วยงานสาธารณสุขที่มีระดับความสำเร็จของการวางระบบการควบคุมภายใน ระดับ 5</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-8-2.pdf" target="_blank" id="k2">8.2 หน่วยงานสาธารณสุขที่มีระดับความสำเร็จของการดำเนินการตามมาตรการป้องกันและปราบปรามการทุจริต ระดับ 5
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-8-3.pdf" target="_blank" id="k2">8.3 โรงพยาบาลที่มีคะแนนเฉลี่ยถ่วงน้ำหนักของการพัฒนาระบบบริหารจัดการเพื่อสนับสนุนการบริหารจัดการด้านการเงินการคลัง ผ่านเกณฑ์คะแนน > 3 คะแนน
</a></span></li>
                                        <li><span class="file"><a href="doc/2/2-3-8-4.pdf" target="_blank" id="k2">8.4 หน่วยงานสาธารณสุขที่มีระดับความสำเร็จของการจัดการข้อร้องเรียน  ระดับ 5</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 9 (1 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-9-1.pdf" target="_blank" id="k2">9.1 คปสอ.ที่มีคะแนนเฉลี่ยถ่วงน้ำหนักของการพัฒนาระบบบริหารยุทธศาสตร์สุขภาพ ผ่านเกณฑ์คะแนน 5 คะแนน
</a></span></li>
                                    </ul>
                                </li>
                                <li class="closed"><span class="folder">เป้าประสงค์ที่ 10 (1 ตัวชี้วัด)</span>
                                	<ul>
                                		<li><span class="file"><a href="doc/2/2-3-10-1.pdf" target="_blank" id="k2">10.1 หน่วยบริการสาธารณสุขที่ผ่านเกณฑ์มาตรฐาน การจัดการสารสนเทศสุขภาพ ระดับดีขึ้นไป</a></span></li>
                                    </ul>
                                </li>
                              </ul>
                            </li>
                          </ul>
                        </li>
                        <li class="closed"><span class="folder">3. ยุทธศาสตร์พัฒนาสุขภาพ คปสอ.เมืองนครพนม ปี 2557</span>
                        	<ul>
                            	<li><span class="file"><a href="doc/3/3.pdf" target="_blank" id="k2">แผนที่ทางยุทธศาสตร์สุขภาพ (Strategy Map)  ของอำเภอเมืองนครพนม จังหวัดนครพนม  ปี  2556-2560</a></span></li>
                            	<li class="closed"><span class="folder">รายละเอียด KPI รายเป้าประสงค์</a></span>
                                	<ul>
                              			<li class="closed"><span class="folder">เป้าประสงค์ที่ 1 (5 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-1-1.pdf" target="_blank" id="k2">1.1 หน่วยบริการสาธารณสุขมีกระบวนการดูแลหญิงตั้งครรภ์อย่างมีคุณภาพผ่านเกณฑ์คะแนน >70 คะแนน</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-1-2.pdf" target="_blank" id="k2">1.2 ร้อยละของหน่วยบริการสาธารณสุขที่มีคะแนนการประเมินกระบวนการส่งเสริมสุขภาพเด็กและ     			  เยาวชนในโรงเรียนระดับดี
</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-1-3.pdf" target="_blank" id="k2">1.3 หน่วยบริการสาธารณสุขมีคะแนนเฉลี่ยถ่วงน้ำหนักในการดำเนินงานทันตสุขภาพในช่องปาก ระดับ 3 ขึ้นไป
</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-1-4.pdf" target="_blank" id="k2">1.4 เด็กอายุ 3 ปี ปราศจากฟันผุ</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-1-5.pdf" target="_blank" id="k2">1.5 เด็กอายุ 12 ปีปราศจากฟันผุ</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 2 (6 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-2-1.pdf" target="_blank" id="k2">2.1 หน่วยบริการสาธารณสุขบรรลุเกณฑ์คุณลักษณะตำบลส่งเสริมป้องกันควบคุมโรคและภัยสุขภาพเข้มแข็งแบบยั่งยืน
</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-2-2.pdf" target="_blank" id="k2">2.2 หน่วยบริการสาธารณสุขบรรลุเกณฑ์การดำเนินงานป้องกัน แก้ไขปัญหาโรคพยาธิใบไม้ตับและมะเร็งท่อทางเดินน้ำดีตับผ่านเกณฑ์คะแนน > 80 คะแนน
</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-2-3.pdf" target="_blank" id="k2">2.3 ระดับความสำเร็จการดำเนินการป้องกันควบคุมแก้ไขปัญหาโรคไข้เลือดออก
</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-2-4.pdf" target="_blank" id="k2">2.4 หน่วยงานสาธารณสุขผ่านเกณฑ์การประเมินการดำเนินงานยาเสพติด ผ่านเกณฑ์คะแนน > 80 คะแนน</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-2-5.pdf" target="_blank" id="k2">2.5 หน่วยบริการสาธารณสุขมีการดำเนินงานสร้างสุขภาพดีวิถีชีวิตไทยลดภัยโรคไม่ติดต่อเรื้อรัง ผ่านเกณฑ์คะแนน > ร้อยละ 70</a></span></li>
                                                <li><span class="file"><a href="doc/3/3-2-2-6.pdf" target="_blank" id="k2">2.6 หน่วยบริการสาธารณสุขผ่านเกณฑ์ตัวชี้วัดของโรคติดต่อที่เป็นปัญหาสำคัญในพื้นที่ > 80 คะแนน</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 3 (3 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-3-1.pdf" target="_blank" id="k2">3.1 หน่วยงานสาธารณสุขบรรลุเกณฑ์การดำเนินงานอาหารปลอดภัยและอนามัยสิ่งแวดล้อม ผ่านเกณฑ์คะแนน > ร้อยละ 80</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-3-2.pdf" target="_blank" id="k2">3.2 หน่วยงานสาธารณสุขผ่านเกณฑ์การประเมินกระบวนการดำเนินงานคุ้มครองผู้บริโภคแบบมีส่วนร่วม  คะแนนผ่านเกณฑ์ ร้อยละ 80</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-3-3.pdf" target="_blank" id="k2">3.3 หน่วยงานสาธารณสุขผ่านเกณฑ์การประเมินผลสัมฤทธิ์การดำเนินงานคุ้มครองผู้บริโภคแบบมีส่วนร่วมผ่านเกณฑ์คะแนน ร้อยละ 75</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 4 (3 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-4-1.pdf" target="_blank" id="k2">4.1 โรงพยาบาลมีคะแนนเฉลี่ยถ่วงน้ำหนักของการพัฒนาคุณภาพ ผ่านเกณฑ์คะแนน > 4 คะแนน</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-4-2.pdf" target="_blank" id="k2">4.2 หน่วยบริการสาธารณสุขมีระดับความสำเร็จในการพัฒนาคุณภาพมาตรฐานสุขศึกษา ระดับ 4 ขึ้นไป ในหน่วยบริการที่ยังไม่ผ่านการประเมินรับรองจากองค์กรภายนอก</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-4-3.pdf" target="_blank" id="k2">4.3 หน่วยบริการสาธารณสุขมีระดับความสำเร็จในการจัดบริการการแพทย์แผนไทย การแพทย์ทางเลือกและการแพทย์พื้นบ้านตามมาตรฐานกระทรวงสาธารณสุข ระดับ 3 ขึ้นไป</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 5 (2 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-5-1.pdf" target="_blank" id="k2">5.1 หน่วยบริการสาธารณสุขมีคะแนนเฉลี่ยถ่วงน้ำหนักของการคุ้มครองสิทธิระบบหลักประกันสุขภาพผ่านเกณฑ์คะแนน > 3 คะแนน</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-5-2.pdf" target="_blank" id="k2">5.2 ความสัมฤทธิ์ผลของการดำเนินงานระบบลงทะเบียนผู้มีสิทธิในระบบหลักประกันสุขภาพ 
หน่วยวัด : ระดับความสัมฤทธิ์ผล</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 6 (1 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-6-1.pdf" target="_blank" id="k2">6.1 ชุมชนผ่านเกณฑ์การประเมินระบบการจัดการสุขภาพภายใต้การมีส่วนร่วม ชุมชนเข็มแข็งเพื่อการปรับเปลี่ยนพฤติกรรม ลดโรค</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 7 (3 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-7-1.pdf" target="_blank" id="k2">7.1 หน่วยบริการสาธารณสุขมีระดับความสำเร็จของการพัฒนาสมรรถนะ ระดับ 5</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-7-2.pdf" target="_blank" id="k2">7.2 หน่วยบริการสาธารณสุขมีระดับความสำเร็จของบุคลากรที่มีความผาสุกในการปฏิบัติราชการ ระดับ 5</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-7-3.pdf" target="_blank" id="k2">7.3 หน่วยบริการสาธารณสุขมีระดับความสำเร็จของการจัดการความรู้เพื่อสนับสนุนประเด็นยุทธศาสตร์ (วิชาการ/นวัตกรรม/วิจัย) ระดับ 5</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 8 (4 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-8-1.pdf" target="_blank" id="k2">8.1 หน่วยงานสาธารณสุขมีระดับความสำเร็จของการวางระบบการควบคุมภายใน ระดับ 5</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-8-2.pdf" target="_blank" id="k2">8.2 หน่วยงานสาธารณสุขมีระดับความสำเร็จของการดำเนินการตามมาตรการป้องกันและปราบปรามการทุจริต ระดับ 5</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-8-3.pdf" target="_blank" id="k2">8.3 โรงพยาบาลมีคะแนนเฉลี่ยถ่วงน้ำหนักของการพัฒนาระบบบริหารจัดการเพื่อสนับสนุนการบริหารจัดการด้านการเงินการคลัง ผ่านเกณฑ์คะแนน > 3 คะแนน</a></span></li>
                                        		<li><span class="file"><a href="doc/3/3-2-8-4.pdf" target="_blank" id="k2">8.4 หน่วยงานสาธารณสุขมีระดับความสำเร็จของการจัดการข้อร้องเรียน ระดับ 5</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 9 (1 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-9-1.pdf" target="_blank" id="k2">9.1 หน่วยบริการสาธารณสุขมีการพัฒนาระบบบริหารยุทธศาสตร์สุขภาพ ผ่านเกณฑ์คะแนน 5 คะแนน</a></span></li>
                                    		</ul>
                                		</li>
                                        <li class="closed"><span class="folder">เป้าประสงค์ที่ 10 (1 ตัวชี้วัด)</span>
                                			<ul>
                                				<li><span class="file"><a href="doc/3/3-2-10-1.pdf" target="_blank" id="k2">10.1 หน่วยบริการสาธารณสุขผ่านเกณฑ์มาตรฐานการจัดการสารสนเทศสุขภาพ ระดับดีขึ้นไป</a></span></li>
                                    		</ul>
                                		</li>
                                	</ul>
                                </li>
                            </ul>
                        </li>
                        <li class="closed"><span class="folder">4. ยุทธศาสตร์โรงพยาบาลนครพนม ปี 2557</span>
                        	<ul>
                            	<li><span class="file"><a href="doc/4/4-1.pdf" target="_blank" id="k2">บทนำยุทธศาสตร์</a></span></li>
                                <li><span class="file"><a href="doc/4/4-2.pdf" target="_blank" id="k2">KPI และแผนที่ยุทธศาสตร์</a></span></li>
                                <li class="closed"><span class="folder">รายละเอียด KPI รายเป้าประสงค์</span>
                                	<ul>
                                    	<li><span class="file"><a href="doc/4/4-3-1.pdf" target="_blank" id="k2">เป้าประสงค์ 1 เป็นศูนย์บริการสุขภาพที่มีความเป็นเลิศและเชี่ยวชาญด้านบริการสุขภาพตามยุทธศาสตร์สำคัญและ Service plan ในอนุภูมิภาคอินโดจีน</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-2.pdf" target="_blank" id="k2">เป้าประสงค์ 2 ผู้รับบริการทุกชาติ ทุกภาษา ทุกวัฒนธรรมมีความศรัทธาประทับใจในบริการที่เป็นมิตรและมีมาตรฐาน</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-3.pdf" target="_blank" id="k2">เป้าประสงค์ 3 ระบบบริหารจัดการมีความเป็นเลิศเท่าทันการเปลี่ยนแปลง</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-4.pdf" target="_blank" id="k2">เป้าประสงค์ 4 ระบบสารสนเทศสุขภาพมีประสิทธิภาพเพื่อการบริหารและบริการที่มีคุณภาพมาตรฐาน</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-5.pdf" target="_blank" id="k2">เป้าประสงค์ 5 การสร้างกลไกบูรณาการความร่วมมือภาคีเครือข่าย ในระดับชุมชน ท้องถิ่น จนถึงระดับอนุภาค    อินโดจีน มีการบูรณาการความร่วมมือ เพื่อพัฒนาระบบสุขภาพ</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-6.pdf" target="_blank" id="k2">เป้าประสงค์ 6 บุคลากร มีสมรรถนะสูง มีความสุขในการทำงาน และภาคภูมิใจในองค์กร บนฐานค่านิยมและวัฒนธรรมองค์กรที่เข้มแข็ง</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-7.pdf" target="_blank" id="k2">เป้าประสงค์ 7 การผลิตและพัฒนาบุคลากรทางการแพทย์ที่มีคุณภาพมาตรฐาน</a></span></li>
                                        <li><span class="file"><a href="doc/4/4-3-8.pdf" target="_blank" id="k2">เป้าประสงค์ 8 เป็นองค์กรแห่งการเรียนรู้ และเป็นศูนย์กลางในการสร้างนวตกรรมการบริการสุขภาพ</a></span></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><span class="file"><a href="doc/5.pdf" target="_blank" id="k2">ระเบียบปฏิบัติ ระบบบริหารแผนงานโครงการ โรงพยาบาลนครพนม</a></span></li>
                        <li class="folder"><span class="folder">แบบฟอร์มที่เกี่ยวข้องในระเบียบปฏิบัติ</span>
                        	<ul>
                            	<li><span class="file"><a href="doc/6/6-1-ST01.xlsx" target="_blank" id="k2">ฟอร์มแผนปฏิบัติราชการประจำปี</a></span></li>
                                <li><span class="file"><a href="doc/6/6-2-ST02.doc" target="_blank" id="k2">ฟอร์มเสนอโครงการอนุมัติ</a></span></li>
                                <li><span class="file"><a href="doc/6/6-3-ST03.doc" target="_blank" id="k2">ฟอร์มรายงานสรุปโครงการ</a></span></li>
                                <li><span class="file"><a href="doc/6/6-4-Sample.doc" target="_blank" id="k2">ตัวอย่างการเขียนโครงการ</a></span></li>
                            </ul>
                        </li>
                      </ul></td>
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