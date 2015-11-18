<link rel="stylesheet" type="text/css" href="css/mycss-popup.css">
<?php
$rand1 = $_GET['rand1'];
$year_budget = $_GET['year_budget'];
include "config.php";
?>
<?php  if ($_COOKIE["cook_user_type_id"] != "2" && $_COOKIE["cook_user_type_id"] != "") { //ถ้าไม่ใช่ ผอ. ?>
<span class="textBlackBold">รายงานข้อสั่งการใหม่</span>
<table width="704" border="0" cellspacing="0" cellpadding="1">
  <tr class="textBlackBold">
    <td width="46" height="25" align="center" bgcolor="#C6E8FF" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลำดับ</td>
    <td width="225" height="25" align="center" bgcolor="#C6E8FF" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ชื่อโครงการ</td>
    <td width="157" height="25" align="center" bgcolor="#C6E8FF" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ข้อสั่งการ</td>
    <td width="131" height="25" align="center" bgcolor="#C6E8FF" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">สั่งการโดย</td>
    <td width="135" height="25" align="center" bgcolor="#C6E8FF" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">วันที่สั่งการ</td>
  </tr>
  <?php
  //ข้อสั่งการ
  $sql_cm = "select tpc.project_id, tpc.text_command, tpc.user_command, tpc.date_command, tp.project_name
  from tb_project_command tpc
  inner join tb_project tp on tpc.project_id = tp.project_id
  where (tpc.answer_command_user = '' or tpc.answer_command_user is null)";
  if ($_COOKIE["cook_user_type_id"] == "3") {
		$sql_cm .= " and tp.sub_dept_id in(select sub_dept_id from user_leader2_detail where person_id = \"$_COOKIE[cook_id]\")";
  }
  if ($_COOKIE["cook_user_type_id"] == "4") {
		$sql_cm .= " and tp.sub_dept_id in(select sub_dept_id from user_group_work_detail where person_id = \"$_COOKIE[cook_id]\")";
  }
  if ($_COOKIE["cook_user_type_id"] == "5") {
		$sql_cm .= " and tp.sub_dept_id in(select sub_dept_id from user_work_detail where person_id = \"$_COOKIE[cook_id]\")";
  }
  $sql_cm .= " order by tpc.date_command";
  $result_cm = mysql_query($sql_cm);
  $i = 1;
  while ($r_cm = mysql_fetch_array($result_cm)) {
  ?>
  <tr>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $i++; ?></td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $r_cm['project_name']; ?></td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo "<a href='project_manage.php?project_id=$r_cm[project_id]' id='k2'>".nl2br($r_cm['text_command'])."</a>"; ?></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $r_cm['user_command']; ?></td>
    <td height="25" align="center" style="border-bottom:1px solid #CCC;"><?php echo $r_cm['date_command']; ?></td>
  </tr>
  <?php } //end while ข้อสั่งการ ?>
</table>
<br />
<?php } //end ถ้าไม่ใช่ ผอ. ?>
<table width="704" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                          <td width="172" rowspan="2" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">แหล่งงบประมาณ</td>
                          <td height="25" colspan="3" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">การดำเนินโครงการ</td>
                          <td height="25" colspan="4" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC;">งบประมาณ</td>
                          </tr>
                        <tr class="textBlackBold">
                          <td width="63" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ยังไม่เสร็จ</td>
                          <td width="62" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">เสร็จสิ้น</td>
                          <td width="62" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">รวม</td>
                          <td width="100" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ทั้งหมด</td>
                          <td width="102" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">เบิกจ่าย</td>
                          <td width="45" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ร้อยละ</td>
                          <td width="98" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC;">เหลือจ่าย</td>
                        </tr>
                        <?php
						$sum_project_no_complete = 0;
						$sum_project_complete = 0;
						$sum_project_money = 0;
						$sqlb = "select bf.budget_from_id, bf.budget_from_name from budget_from bf order by bf.budget_from_id";
						$resultb = mysql_query($sqlb);
						while ($rb = mysql_fetch_array($resultb)) {
							//โครงการที่ยังไม่เสร็จ
							$sql_no_complete = "select count(distinct(tp.project_id)) cc
from tb_project tp
left outer join tb_project_activity_progress tpap on tp.project_id = tpap.project_id
where tp.year_budget_id = '$year_budget' and tp.budget_from_id = '$rb[budget_from_id]'
and (tpap.result = '' or tpap.result is null)";
							$result_no_complete = mysql_query($sql_no_complete);
							$r_no_complete = mysql_fetch_row($result_no_complete);
							//โครงการที่เสร็จแล้ว
							$sql_complete = "select count(distinct(tp.project_id)) cc
from tb_project tp
left outer join tb_project_activity_progress tpap on tp.project_id = tpap.project_id
where tp.year_budget_id = '$year_budget' and tp.budget_from_id = '$rb[budget_from_id]'
and tpap.result != '' and tpap.result is not null
having sum(tpap.activity_weight) = 100";
							$result_complete = mysql_query($sql_complete);
							$r_complete = mysql_fetch_row($result_complete);
							$sum_project_no_complete += $r_no_complete[0];
							$sum_project_complete += $r_complete[0];
							//เงินทั้งหมด
							$sql_m_all = "select sum(tpb.budget_money) m_all
from tb_project_budget tpb inner join tb_project tp on tpb.project_id = tp.project_id
where tp.year_budget_id = '$year_budget' and tpb.budget_from_id = '$rb[budget_from_id]'";
							$result_m_all = mysql_query($sql_m_all);
							$r_m_all = mysql_fetch_row($result_m_all);
							$sum_project_money += $r_m_all[0];
						?>
                        <tr onmouseover="this.style.backgroundColor='#E3FFBB'" onmouseout="this.style.backgroundColor=''">
                          <td height="25" align="left" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo "<a href='project_result_budget.php?year_budget=$year_budget&budget_from_id=$rb[budget_from_id]' target='_blank' id='k2'>$rb[budget_from_name]</a>"; ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_no_complete[0], 0); ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_complete[0], 0); ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
						  echo number_format(($r_no_complete[0] + $r_complete[0]), 0);
						  ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_m_all[0], 2); ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $sqlp = "select sum(tpp.pay_total) m_pay
from tb_project_pay tpp
inner join tb_project tp on tpp.project_id = tp.project_id
where tpp.budget_from_id = '$rb[budget_from_id]' and tp.year_budget_id = '$year_budget'";
						$resultp = mysql_query($sqlp);
						$rp = mysql_fetch_row($resultp);
						echo number_format($rp[0], 2);
						$sum_project_pay += $rp[0];
						  ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //ร้อยละ เบิกจ่าย
						  $person_pay = "0";
						  if ($r_m_all[0] != "") {
						  	$person_pay = ($rp[0] * 100) / $r_m_all[0];
						  }
						  echo number_format($person_pay, 2);
						  ?></td>
                          <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC;"><?php
                          //เหลือจ่าย
						  $mm = $r_m_all[0] - $rp[0];
						  echo number_format($mm, 2);
						  ?></td>
                        </tr>
                        <?php } //end while dept ?>
                        <tr>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">รวม</td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_no_complete, 0); ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_complete, 0); ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $total_project = $sum_project_no_complete + $sum_project_complete;
						  echo number_format($total_project, 0);
						  ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_money, 2); ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_pay, 2); ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $total_persen = "0";
						  if ($sum_project_money != "0") {
							  $total_persen = ($sum_project_pay * 100) / $sum_project_money;
						  }
						  echo number_format($total_persen, 2);
						  ?></td>
                          <td height="25" align="center" bgcolor="#FFE7CE" class="textBlackBold" style="border-bottom:1px solid #CCC;"><?php
                          //รวมเหลือจ่าย
						  $money_result = $sum_project_money - $sum_project_pay;
						  echo number_format($money_result, 2);
						  ?></td>
                        </tr>
                      </table>
<br />
<span class="textBlackBold">ข้อมูลโครงการแยกตามความสอดคล้องยุทธศาสตร์</span><br />
<table width="704" border="0" cellspacing="0" cellpadding="1">
  <tr class="textBlackBold">
    <td width="53" height="25" align="center" bgcolor="#CBFFB3" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลำดับ</td>
    <td width="647" height="25" align="left" bgcolor="#CBFFB3" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC;">รายการ</td>
  </tr>
  <tr>
    <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">1</td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC;"><a href="project_strategic_province_list.php?year_budget=<?php echo $year_budget; ?>" target="_blank" id="k2">ประเด็นยุทธศาสตร์พัฒนาสุขภาพจังหวัด</a></td>
  </tr>
  <tr>
    <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">2</td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC;"><a href="project_strategic_district_list.php?year_budget=<?php echo $year_budget; ?>" target="_blank" id="k2">ประเด็นยุทธศาสตร์พัฒนาสุขภาพอำเภอ</a></td>
  </tr>
  <tr>
    <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">3</td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC;"><a href="project_responsibility_list.php?year_budget=<?php echo $year_budget; ?>" target="_blank" id="k2">พันธกิจโรงพยาบาล</a></td>
  </tr>
  <tr>
    <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">4</td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC;"><a href="project_strategic_hospital_list.php?year_budget=<?php echo $year_budget; ?>" target="_blank" id="k2">ประเด็นยุทธศาสตร์โรงพยาบาล</a></td>
  </tr>
  <tr>
    <td height="25" align="center" class="textBlackNormal" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">5</td>
    <td height="25" align="left" style="border-bottom:1px solid #CCC;"><a href="project_target_list.php?year_budget=<?php echo $year_budget; ?>" target="_blank" id="k2">เป้าประสงค์โรงพยาบาล</a></td>
  </tr>
</table>
<br />
<table width="704" border="0" cellspacing="0" cellpadding="0">
  <tr class="textBlackBold">
    <td height="25" align="center" bgcolor="#F0FFC4">โครงการ</td>
    <td height="25" align="center" bgcolor="#FFDDEE">การเบิกจ่าย</td>
  </tr>
  <tr>
    <td width="352" align="center"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="FusionCharts_1" width="335" height="225" id="FusionCharts_1" >
			<param name="movie" value="charts/Pie2D.swf" />
			<param name="FlashVars" value="&dataXML=<chart caption='' subcaption='' xaxisname='bbbb' yaxisname='aaaa' palette='4' formatNumberScale='0' >
	<set label='ยังไม่เสร็จ' value='<?php echo $sum_project_no; ?>' />
	<set label='เสร็จสิ้น' value='<?php echo $sum_project_yes; ?>' />
</chart>&chartWidth=450&chartHeight=300">
			<param name="quality" value="high" />
			<embed src="charts/Pie2D.swf" flashVars="&dataXML=<chart caption='' subcaption='' xaxisname='bbbb' yaxisname='aaaa' palette='4' formatNumberScale='0' >
	<set label='ยังไม่เสร็จ' value='<?php echo $sum_project_no; ?>' />
	<set label='เสร็จสิ้น' value='<?php echo $sum_project_yes; ?>' />
</chart>&chartWidth=450&chartHeight=300" quality="high" width="335" height="225" name="FusionCharts_1" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object></td>
    <td width="352" align="center"><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" name="FusionCharts_1" width="335" height="225" id="FusionCharts_1" >
			<param name="movie" value="charts/Pie2D.swf" />
			<param name="FlashVars" value="&dataXML=<chart caption='' subcaption='' xaxisname='bbbb' yaxisname='aaaa' palette='5' formatNumberScale='0' >
	<set label='เบิกจ่าย' value='<?php echo $sum_project_pay; ?>' />
	<set label='เหลือจ่าย' value='<?php echo $money_result; ?>' />
</chart>&chartWidth=450&chartHeight=300">
			<param name="quality" value="high" />
			<embed src="charts/Pie2D.swf" flashVars="&dataXML=<chart caption='' subcaption='' xaxisname='bbbb' yaxisname='aaaa' palette='5' formatNumberScale='0' >
	<set label='เบิกจ่าย' value='<?php echo $sum_project_pay; ?>' />
	<set label='เหลือจ่าย' value='<?php echo $money_result; ?>' />
</chart>&chartWidth=450&chartHeight=300" quality="high" width="335" height="225" name="FusionCharts_1" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object></td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td align="center">&nbsp;</td>
  </tr>
</table>
<?php  mysql_close($conn); ?>