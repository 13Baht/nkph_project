<?php
$project_id = $_GET['project_id'];
include "config.php";
include "myclass.php";
$sql = "select tp.project_name, tp.begin_date, tp.end_date, tp.project_reason, tp.project_objective, tp.project_target_group, tp.project_responsible_name, tp.project_responsible_position, tp.project_collaborator_name, tp.project_collaborator_position, tsd.sub_dept_name, sp.strategic_province_name, sh.strategic_hospital_name, tg.target_name, sum(tpb.budget_money) money_project
from tb_project tp
left outer join tb_sub_dept tsd on tp.sub_dept_id = tsd.sub_dept_id
left outer join strategic_province sp on tp.strategic_province_id = sp.strategic_province_id and tp.year_budget_id = sp.strategic_province_year
left outer join strategic_hospital sh on tp.strategic_hospital_id = sh.strategic_hospital_id and tp.year_budget_id = sh.strategic_hospital_year
left outer join target tg on tp.target_id = tg.target_id and tp.year_budget_id = tg.target_year
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
<title>รายละเอียดโครงการ</title>
<link rel="stylesheet" type="text/css" href="css/mycss_print.css"/>
</head>

<body>
<table width="1000" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="center" class="fontBold18" style="border-bottom:1px solid #000;">รายงานสรุปผลโครงการ</td>
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
        <td width="12%" align="left" class="fontBold16">หน่วยงานรับผิดชอบ</td>
        <td width="88%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['sub_dept_name']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="15%" align="left" class="fontBold16">ประเด็นยุทธศาสตร์จังหวัด</td>
        <td width="85%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['strategic_province_name']; ?></td>
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
        <td width="16%" align="left" class="fontBold16">หัวหน้าโครงการ</td>
        <td width="2%" align="left" class="fontBold16">ชื่อ</td>
        <td width="32%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_responsible_name']; ?></td>
        <td width="5%" align="left" class="fontBold16">ตำแหน่ง</td>
        <td width="45%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_responsible_position']; ?></td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="16%" align="left" class="fontBold16">ผู้ประสานงานโครงการ</td>
        <td width="2%" align="left" class="fontBold16">ชื่อ</td>
        <td width="32%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_collaborator_name']; ?></td>
        <td width="5%" align="left" class="fontBold16">ตำแหน่ง</td>
        <td width="45%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_collaborator_position']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" style="border-bottom:1px solid #000;" height="5"></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" align="left" valign="top" class="fontBold16">1. หลักการและเหตุผล</td>
        <td width="86%" align="left" valign="top" style="border-bottom:1px dotted #999;"><?php echo nl2br($r['project_reason']); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" align="left" valign="top" class="fontBold16">2. วัตถุประสงค์โครงการ</td>
        <td width="86%" align="left" valign="top" style="border-bottom:1px dotted #999;"><?php echo nl2br($r['project_objective']); ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" align="left" class="fontBold16">3. กลุ่มเป้าหมาย</td>
        <td width="90%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php echo $r['project_target_group']; ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="14%" align="left" class="fontBold16">4. ระยะเวลาดำเนินการ</td>
        <td width="86%" align="left" style="border-bottom:1px dotted #999;">&nbsp;<?php
        if ($r['begin_date'] != "" and $r['begin_date'] != "0000-00-00") {
			echo FormatDateFull($r['begin_date'])." - ";
		}
		if ($r['end_date'] != "" and $r['end_date'] != "0000-00-00") {
			echo FormatDateFull($r['end_date']);
		}
		?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">5. รายละเอียดกิจกรรมที่ได้ดำเนินงาน</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="fontBold16">
        <td width="85%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">กิจกรรม</td>
        <td width="15%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ผลงาน</td>
      </tr>
      <?php
	  $sql_tpap = "select activity_name, result from tb_project_activity_progress where project_id = \"$project_id\"";
	  $result_tpap = mysql_query($sql_tpap);
	  $i = 1;
	  while ($r_tpap = mysql_fetch_array($result_tpap)) {
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php echo $i++.". ".$r_tpap['activity_name']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpap['result']; ?></td>
      </tr>
      <?php } //end while tpap ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">6. ผลผลิต / ผลลัพธ์ และเป้าหมาย</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="fontBold16">
        <td width="55%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ผลผลิต</td>
        <td width="15%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">หน่วยนับ</td>
        <td width="15%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">เป้าหมาย</td>
        <td width="15%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ผลงาน</td>
      </tr>
      <?php
	  $sql_tppp = "select point_product, point_product_unit, point_product_target, result from tb_project_point_product_progress where project_id = \"$project_id\" order by point_product_id";
	  $i = 1;
	  $result_tppp = mysql_db_query($db, $sql_tppp);
	  while ($r_tppp = mysql_fetch_array($result_tppp)) {
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php echo $i++.". ".$r_tppp['point_product']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tppp['point_product_unit']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tppp['point_product_target']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tppp['result']; ?></td>
      </tr>
      <?php } //end while point_product_progress ?>
      <tr class="fontBold16">
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">ผลลัพธ์</td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;">หน่วยนับ</td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;">เป้าหมาย</td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;">ผลงาน</td>
      </tr>
      <?php
	  $sql_tpps = "select point_result, point_result_unit, point_result_target, result from tb_project_point_result_progress where project_id = \"$project_id\" order by point_result_id";
	  $result_tpps = mysql_db_query($db, $sql_tpps);
	  $i = 1;
	  while ($r_tpps = mysql_fetch_array($result_tpps)) {
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php echo $i++.". ".$r_tpps['point_result']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpps['point_result_unit']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpps['point_result_target']; ?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_tpps['result']; ?></td>
      </tr>
      <?php } //end while point_result ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">7. สรุปการเบิกจ่ายงบประมาณโครงการ</td>
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
      <tr>
        <td align="center">&nbsp;</td>
        <td align="left">เบิกจ่ายทั้งสิ้น</td>
        <td align="right" class="fontBold16" style="border-bottom:1px dotted #999;"><?php
        //รวมเบิกจ่ายทั้งสิ้น
		$sql_total_pay = "select sum(pay_total) cc from tb_project_pay where project_id = '$project_id'";
		$result_total_pay = mysql_query($sql_total_pay);
		$r_total_pay = mysql_fetch_row($result_total_pay);
		echo number_format($r_total_pay[0], 2);
		?>&nbsp;&nbsp;</td>
        <td colspan="4" align="left">บาท&nbsp;&nbsp;รายละเอียด ดังนี้</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td height="5" align="left"></td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="fontBold16">
        <td width="57%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">รายละเอียดค่าใช้จ่าย (จำนวนหน่วย X บาท)</td>
        <td width="28%" align="center" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">แหล่งงบประมาณ</td>
        <td width="15%" align="right" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">รวมค่าใช้จ่าย (บาท)</td>
      </tr>
      <?php
	  //รายละเอียดการเบิกจ่าย
	  $sql_pay = "select tpp.pay_id, tpp.pay_type_sub_id, tpp.pay_type_text, tpp.pay_unit, tpp.pay_money, tpp.pay_total, pt.pay_type_name, pts.pay_type_sub_name
from tb_project_pay tpp
left outer join pay_type_sub pts on tpp.pay_type_sub_id = pts.pay_type_sub_id
left outer join pay_type pt on tpp.pay_type_id = pt.pay_type_id
where tpp.project_id = '$project_id'";
		$result_pay = mysql_query($sql_pay);
		$total_pay = 0;
		while ($r_pay = mysql_fetch_array($result_pay)) {
			$total_pay += $r_pay['pay_total'];
	  ?>
      <tr>
        <td align="left" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">&nbsp;<?php
		if ($r_pay['pay_type_sub_id'] != "0") {
			echo $r_pay['pay_type_sub_name'];
		} else {
        	echo $r_pay['pay_type_text'];
		}
		echo " ( $r_pay[pay_unit] x ".number_format($r_pay['pay_money'], 2)." )";
		?></td>
        <td align="center" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo $r_pay['pay_type_name']; ?></td>
        <td align="right" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo number_format($r_pay['pay_total'], 2); ?>&nbsp;&nbsp;</td>
      </tr>
      <?php } //end while r_pay ?>
      <tr>
        <td colspan="2" align="center" class="fontBold16" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;">รวม</td>
        <td align="right" class="fontBold16" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo number_format($total_pay, 2); ?>&nbsp;&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">8. ปัญหาอุปสรรค และข้อเสนอแนะ</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr class="fontBold16">
        <td width="7%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ลำดับ</td>
        <td width="47%" align="left" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ปัญหา / อุปสรรค</td>
        <td width="46%" align="left" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">ข้อเสนอแนะ</td>
      </tr>
      <?php
	  //ปัญหา ข้อเสนอแนะ
		$sql_pb = "select text_problem, text_problem_suggestion from tb_project_problem where project_id = '$project_id' order by problem_id";
		$result_pb = mysql_query($sql_pb);
		$i = 1;
		while ($r_pb = mysql_fetch_array($result_pb)) {
	  ?>
      <tr>
        <td align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;"><?php echo $i++; ?></td>
        <td align="left" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo nl2br($r_pb['text_problem']); ?></td>
        <td align="left" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo nl2br($r_pb['text_problem_suggestion']); ?></td>
      </tr>
      <?php } //end while r_pb ?>
    </table></td>
  </tr>
  <tr>
    <td align="left" class="fontBold16">9. ภาพการดำเนินกิจกรรม พร้อมคำอธิบาย</td>
  </tr>
  <tr>
    <td align="left"><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr class="fontBold16">
        <td width="61%" align="center" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">รูปภาพ</td>
        <td width="39%" align="left" style="border-bottom:1px solid #999; border-right:1px solid #999; border-top:1px solid #999;">คำอธิบาย</td>
      </tr>
      <?php
	  //รูปภาพ
		$sql_file1 = "select * from tb_project_file where project_id = '$project_id' and (ext = 'jpg' or ext = 'jpeg') order by file_id";
		$result_file1 = mysql_db_query($db, $sql_file1);
		$i = 1;
		while ($r_file1 = mysql_fetch_array($result_file1)) {
	  ?>
      <tr>
        <td align="center" valign="top" style="border-bottom:1px solid #999; border-left:1px solid #999; border-right:1px solid #999;"><?php echo "<img src='files/$r_file1[file_name]' width='500' height='379' border='0' />"; ?></td>
        <td align="left" valign="top" style="border-bottom:1px solid #999; border-right:1px solid #999;"><?php echo nl2br($r_file1['file_description']); ?></td>
      </tr>
      <?php } //end while r_file1 ?>
    </table></td>
  </tr>
  <tr>
    <td align="left">&nbsp;</td>
  </tr>
</table>
</body>
</html>