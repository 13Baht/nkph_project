<?php
$project_id = $_GET['project_id'];
include "config.php";
include "myclass.php";
$sql = "select tp.year_budget_id, tp.project_name, tp.begin_date, tp.end_date, tp.project_area, tp.project_reason, tp.project_objective, tp.project_target_group, tp.project_responsible_name, tp.project_responsible_position, tp.project_collaborator_name, tp.project_collaborator_position, tp.project_collaborator_tel, sh.strategic_hospital_name, tg.target_name, tsd.sub_dept_name, sum(tpb.budget_money) money_project
from tb_project tp
left outer join strategic_hospital sh on tp.strategic_hospital_id = sh.strategic_hospital_id and tp.year_budget_id = sh.strategic_hospital_year
left outer join target tg on tp.target_id = tg.target_id and tp.year_budget_id = tg.target_year
left outer join tb_sub_dept tsd on tp.sub_dept_id = tsd.sub_dept_id
left outer join tb_project_budget tpb on tp.project_id = tpb.project_id
where tp.project_id = \"$project_id\"
group by tp.project_id";
$result = mysql_query($sql);
$r = mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>แบบฟอร์มโครงการ</title>
<link rel="stylesheet" type="text/css" href="css/mycss_print.css"/>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="fontBold18" style="border-bottom:1px solid #000;">แบบฟอร์มโครงการ</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7%" align="left" class="fontBold16">ชื่อโครงการ</td>
        <td width="93%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_name']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="18%" align="left" class="fontBold16">ประเด็นยุทธศาสตร์โรงพยาบาล</td>
        <td width="82%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['strategic_hospital_name']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="7%" align="left" class="fontBold16">เป้าประสงค์</td>
        <td width="93%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['target_name']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="12%" align="left" class="fontBold16">หน่วยงานรับผิดชอบ</td>
        <td width="88%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['sub_dept_name']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="18%" align="left" valign="top" class="fontBold16">หัวหน้าโครงการ</td>
        <td width="82%" align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" align="left" class="fontBold16">ชื่อ</td>
            <td width="97%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_responsible_name']; ?></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7%" align="left" class="fontBold16">ตำแหน่ง</td>
            <td width="93%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_responsible_position']; ?></td>
          </tr>
        </table></td>
      </tr>
      <tr>
        <td align="left" valign="top" class="fontBold16">ผู้ประสานงานโครงการ</td>
        <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="3%" align="left" class="fontBold16">ชื่อ</td>
            <td width="97%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_collaborator_name']; ?></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7%" align="left" class="fontBold16">ตำแหน่ง</td>
            <td width="93%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_collaborator_position']; ?></td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="10%" align="left" class="fontBold16">สถานที่ติดต่อ</td>
            <td width="90%" align="left" style="border-bottom:1px dotted #999;">&nbsp;</td>
          </tr>
        </table>
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="7%" align="left" class="fontBold16">โทรศัพท์</td>
            <td width="93%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_collaborator_tel']; ?></td>
          </tr>
        </table></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">1. หลักการและเหตุผล</td>
  </tr>
  <tr>
    <td align="left"><?php echo nl2br($r['project_reason']); ?></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">2. วัตถุประสงค์ของโครงการ (ทั่วไป)</td>
  </tr>
  <tr>
    <td align="left"><?php echo nl2br($r['project_objective']); ?></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">3. กลุ่มเป้าหมายที่ได้รับประโยชน์จากโครงการ</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r['project_target_group']; ?></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">4. พื้นที่ดำเนินการ</td>
  </tr>
  <tr>
    <td align="left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $r['project_area']; ?></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">5. ผลผลิต/ผลลัพธ์ และเป้าหมาย</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="fontBold16">
        <td width="66%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ตัวชี้วัด</td>
        <td width="17%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">หน่วยนับ</td>
        <td width="17%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">เป้าหมาย</td>
        </tr>
      <tr>
        <td colspan="3" align="left" class="fontNormalItalic" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">ตัวชี้วัดผลผลิต</td>
        </tr>
      <?php
	  $sql_tppp = "select point_product, point_product_unit, point_product_target from tb_project_point_product where project_id = \"$project_id\" order by point_product_id";
	  $i = 1;
	  $result_tppp = mysql_db_query($db, $sql_tppp);
	  while ($r_tppp = mysql_fetch_array($result_tppp)) {
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php echo $i++.". ".$r_tppp['point_product']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tppp['point_product_unit']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tppp['point_product_target']; ?></td>
        </tr>
      <?php } //end while point_product ?>
      <tr>
        <td colspan="3" align="left" class="fontNormalItalic" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">ตัวชี้วัดผลลัพธ์</td>
        </tr>
      <?php
	  $sql_tpps = "select point_result, point_result_unit, point_result_target from tb_project_point_result where project_id = \"$project_id\" order by point_result_id";
	  $result_tpps = mysql_db_query($db, $sql_tpps);
	  $i = 1;
	  while ($r_tpps = mysql_fetch_array($result_tpps)) {
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php echo $i++.". ".$r_tpps['point_result']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpps['point_result_unit']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpps['point_result_target']; ?></td>
        </tr>
      <?php } //end while point_result ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">6. แนวทาง/แผนการดำเนินงาน</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr class="fontBold16">
                                    <td width="62%" height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999;">กิจกรรม</td>
                                    <td width="10%" height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999;">ค่าน้ำหนัก (%)</td>
                                    <td width="14%" height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999;">วันเริ่มต้น</td>
                                    <td width="14%" height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999; border-right:1px solid #999;">วันสิ้นสุด</td>
        </tr>
                                  <?php
								  $sql_pa = "select * from tb_project_activity where project_id = '$project_id'";
								  $result_pa = mysql_query($sql_pa);
								  $total_activity_weight = 0;
								  while ($r_pa = mysql_fetch_array($result_pa)) {
									  $total_activity_weight += $r_pa['activity_weight'];
								  ?>
                                  <tr>
                                    <td height="25" style="border-bottom:1px solid #999; border-left:1px solid #999;"><?php echo $r_pa['activity_name']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;"><?php echo $r_pa['activity_weight']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;"><?php echo FormatDateShort($r_pa['activity_begin_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;"><?php echo FormatDateShort($r_pa['activity_end_date']); ?></td>
                                  </tr>
                                  <?php } //end while budget_from ?>
                                  <tr class="textBlackNormal">
                                    <td height="25" align="center" class="fontBold16" style="border-bottom:1px solid #999; border-left:1px solid #999;">รวม</td>
                                    <td height="25" colspan="3" align="center" class="fontBold16" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;"><?php echo number_format($total_activity_weight, 2); ?></td>
                                  </tr>
</table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">7. ระยะเวลาดำเนินการ</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="2%" align="right">&nbsp;</td>
        <td width="4%" align="left" class="fontBold16">ตั้งแต่</td>
      <td width="25%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php
      if ($r['begin_date'] != "" and $r['begin_date'] != "0000-00-00") {
			echo FormatDateFull($r['begin_date']);
		}
	  ?></td>
        <td width="2%" align="left" class="fontBold16">ถึง</td>
        <td width="29%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php
		if ($r['end_date'] != "" and $r['end_date'] != "0000-00-00") {
			echo FormatDateFull($r['end_date']);
		}
		?></td>
        <td width="38%">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" align="left"></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="52%" rowspan="2" align="center" class="fontBold16" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999;">กิจกรรม</td>
        <td colspan="12" align="center" class="fontBold16" style="border-bottom:1px solid #999; border-left:1px solid #999; border-top:1px solid #999; border-right:1px solid #999;">ระยะเวลาดำเนินการ ปีงบประมาณ <?php echo $r['year_budget_id']; ?></td>
        </tr>
      <tr>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ต.ค.<br /><?php echo substr(($r['year_budget_id'] - 1), 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">พ.ย.<br /><?php echo substr(($r['year_budget_id'] - 1), 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ธ.ค.<br /><?php echo substr(($r['year_budget_id'] - 1), 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ม.ค.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ก.พ.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">มี.ค.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">เม.ย.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">พ.ค.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">มิ.ย.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ก.ค.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">ส.ค.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
        <td width="4%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">ก.ย.<br /><?php echo substr($r['year_budget_id'], 2, 2); ?></td>
      </tr>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;</td>
      </tr>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999;">&nbsp;</td>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">8. งบประมาณโครงการ</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="4%" align="center">&nbsp;</td>
        <td width="15%" align="left">งบประมาณตามโครงการ</td>
        <td width="16%" align="right" class="fontBold16" style="border-bottom:1px dotted #999;"><?php echo number_format($r['money_project'], 2); ?>&nbsp;&nbsp;</td>
        <td width="6%" align="left">บาท</td>
        <td colspan="3" align="left">แหล่งงบประมาณ</td>
      </tr>
      <?php
	  //รายการแหล่งงบประมาณ
	  $sql_bf = "select bf.budget_from_name, tpb.budget_from_orther, tpb.budget_money
	  from tb_project_budget tpb
	  inner join budget_from bf on tpb.budget_from_id = bf.budget_from_id
	  where tpb.project_id = '$project_id'
	  order by tpb.budget_from_id";
	  $result_bf = mysql_query($sql_bf);
	  while ($r_bf = mysql_fetch_array($result_bf)) {
	  ?>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;&nbsp;&nbsp;</td>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td width="18%" align="left">&nbsp;&nbsp;-&nbsp;<?php echo $r_bf['budget_from_name']; ?></td>
        <td width="14%" align="right" style="border-bottom:1px dotted #999;"><?php echo number_format($r_bf['budget_money'], 2); ?>&nbsp;&nbsp;</td>
        <td width="27%" align="left">บาท</td>
      </tr>
      <?php } //end while แหล่งงบประมาณ ?>
    </table></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
  <tr>
    <td align="right"><table width="500" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="110" align="right">ลงชื่อ</td>
        <td width="222" style="border-bottom:1px dotted #999;">&nbsp;</td>
        <td width="168" align="left">ผู้เสนอโครงการ</td>
      </tr>
      <tr>
        <td align="right">(</td>
        <td align="center" style="border-bottom:1px dotted #999;"><?php echo $r['project_responsible_name']; ?></td>
        <td align="left">)</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">ลงชื่อ</td>
        <td style="border-bottom:1px dotted #999;">&nbsp;</td>
        <td align="left">ผู้เห็นชอบโครงการ</td>
      </tr>
      <tr>
        <td align="right">(</td>
        <td style="border-bottom:1px dotted #999;">&nbsp;</td>
        <td align="left">)</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>อนุมัติ ดำเนินการตามระเบียบราชการ</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">&nbsp;</td>
        <td>&nbsp;</td>
        <td align="left">&nbsp;</td>
      </tr>
      <tr>
        <td align="right">ลงชื่อ</td>
        <td style="border-bottom:1px dotted #999;">&nbsp;</td>
        <td align="left">ผู้อนุมัติโครงการ</td>
      </tr>
      <tr>
        <td align="right">(</td>
        <td style="border-bottom:1px dotted #999;">&nbsp;</td>
        <td align="left">)</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
</table>
</body>
</html>