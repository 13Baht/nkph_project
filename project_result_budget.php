<?php
$year_budget = $_GET['year_budget'];
$budget_from_id = $_GET['budget_from_id'];
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>สรุปโครงการตามแหล่งงบประมาณ</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
</head>

<body>
<table width="100%" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td height="25" align="left" class="textBlackBold">สรุปรายการโครงการแยกตามแหล่งงบประมาณ<?php
    $sql_bg = "select budget_from_name from budget_from where budget_from_id = '$budget_from_id'";
	$result_bg = mysql_query($sql_bg);
	$r_bg = mysql_fetch_row($result_bg);
	echo "&nbsp;$r_bg[0]";
	?></td>
  </tr>
  <tr>
    <td height="25" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="3%" rowspan="2" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลำดับ</td>
        <td width="27%" rowspan="2" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">หน่วยงาน / โครงการ</td>
        <td height="25" colspan="3" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">การดำเนินโครงการ</td>
        <td height="25" colspan="4" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">งบประมาณ</td>
        </tr>
      <tr>
        <td width="8%" height="25" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ยังไม่เสร็จ</td>
        <td width="8%" height="25" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">เสร็จสิ้น</td>
        <td width="10%" height="25" align="center" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">รวม</td>
        <td width="11%" height="25" align="right" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ทั้งหมด</td>
        <td width="11%" align="right" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">เบิกจ่าย</td>
        <td width="11%" height="25" align="right" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">ร้อยละ(เบิกจ่าย)</td>
        <td width="11%" height="25" align="right" bgcolor="#E5E5E5" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">คงเหลือ</td>
      </tr>
<?php
$sql_sd = "select tp.sub_dept_id, tsd.sub_dept_name
from tb_project tp
left outer join tb_sub_dept tsd on tp.sub_dept_id = tsd.sub_dept_id
left outer join tb_project_budget tpb on tp.project_id = tpb.project_id
where tp.year_budget_id = '$year_budget' and tpb.budget_from_id = '$budget_from_id'
group by tp.sub_dept_id order by tsd.sub_dept_name";
$result_sd = mysql_query($sql_sd);
$i = 1;
$sum_project_no_complete = 0;
$sum_project_complete = 0;
$sum_project_money = 0;
while ($r_sd = mysql_fetch_array($result_sd)) {
	//โครงการที่ยังไม่เสร็จ
	$sql_no_complete = "select count(distinct(tp.project_id)) cc
from tb_project tp
left outer join tb_project_activity_progress tpap on tp.project_id = tpap.project_id
left outer join tb_project_budget tpb on tp.project_id = tpb.project_id
where tp.year_budget_id = '$year_budget' and tpb.budget_from_id = '$budget_from_id'
and tp.sub_dept_id = '$r_sd[sub_dept_id]'
and (tpap.result = '' or tpap.result is null)";
	$result_no_complete = mysql_query($sql_no_complete);
	$r_no_complete = mysql_fetch_row($result_no_complete);
	//โครงการที่เสร็จแล้ว
	$sql_complete = "select count(distinct(tp.project_id)) cc
from tb_project tp
left outer join tb_project_activity_progress tpap on tp.project_id = tpap.project_id
left outer join tb_project_budget tpb on tp.project_id = tpb.project_id
where tp.year_budget_id = '$year_budget' and tpb.budget_from_id = '$budget_from_id'
and tp.sub_dept_id = '$r_sd[sub_dept_id]'
and tpap.result != '' and tpap.result is not null
having sum(tpap.activity_weight) = 100";
	$result_complete = mysql_query($sql_complete);
	$r_complete = mysql_fetch_row($result_complete);
	$sum_project_no_complete += $r_no_complete[0];
	$sum_project_complete += $r_complete[0];
	//เงินทั้งหมด
	$sql_m_all = "select sum(tpb.budget_money) m_all
from tb_project_budget tpb inner join tb_project tp on tpb.project_id = tp.project_id
where tp.year_budget_id = '$year_budget' and tpb.budget_from_id = '$budget_from_id'
and tp.sub_dept_id = '$r_sd[sub_dept_id]'";
	$result_m_all = mysql_query($sql_m_all);
	$r_m_all = mysql_fetch_row($result_m_all);
	$sum_project_money += $r_m_all[0];
?>
      <tr>
        <td height="25" align="center" bgcolor="#EBFFCC" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $i++; ?></td>
        <td height="25" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo "$r_sd[sub_dept_name]"; ?></td>
        <td height="25" align="center" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_no_complete[0], 0); ?></td>
        <td height="25" align="center" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_complete[0], 0); ?></td>
        <td height="25" align="center" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
						  echo number_format(($r_no_complete[0] + $r_complete[0]), 0);
						  ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_m_all[0], 2); ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //เบิกจ่ายแล้ว
						  $sqlp = "select sum(tpp.pay_total) m_pay
from tb_project_pay tpp
inner join tb_project tp on tpp.project_id = tp.project_id
where tpp.budget_from_id = '$budget_from_id' and tp.year_budget_id = '$year_budget'
and tp.sub_dept_id = '$r_sd[sub_dept_id]'";
						$resultp = mysql_query($sqlp);
						$rp = mysql_fetch_row($resultp);
						echo number_format($rp[0], 2);
						$sum_project_pay += $rp[0];
						  ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //ร้อยละ เบิกจ่าย
						  $person_pay = "0";
						  if ($r_m_all[0] != "") {
						  	$person_pay = ($rp[0] * 100) / $r_m_all[0];
						  }
						  echo number_format($person_pay, 2);
						  ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //เหลือจ่าย
						  $mm = $r_m_all[0] - $rp[0];
						  echo number_format($mm, 2);
						  ?></td>
      </tr>
      <?php
	  //ข้อมูลโครงการ
	  $sql_project = "select tp.project_id, tp.project_name, sum(tpb.budget_money) money_project
	  from tb_project tp
	  left outer join tb_project_budget tpb on tp.project_id = tpb.project_id
	  where tp.year_budget_id = '$year_budget' and tp.sub_dept_id = '$r_sd[sub_dept_id]'
	  and tpb.budget_from_id = '$budget_from_id'
	  group by tp.project_id order by tp.project_id";
	  $result_project = mysql_query($sql_project);
	  $ii = 1;
	  while ($r_project = mysql_fetch_array($result_project)) {
		  //ตรวจสอบโครงการว่าดำเนินการเสร็จหรือไม่
		$sql_status_project = "select sum(tpap.activity_weight) ss
	from tb_project_activity_progress tpap
	where tpap.project_id = '$r_project[project_id]'
	and tpap.result != '' and tpap.result is not null";
		$result_status_project = mysql_query($sql_status_project);
		$r_status_project = mysql_fetch_row($result_status_project);
		
	  ?>
      <tr>
        <td height="25" align="center" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
        <td height="25" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo "<a href='project_detail.php?project_id=$r_project[project_id]' id='k2' target='_blank'>".$ii++.". $r_project[project_name]</a>"; ?></td>
        <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
        if ($r_status_project[0] != "100") {
			echo "<img src='images/check.png' border='0'>";
		}
		?></td>
        <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
        if ($r_status_project[0] == "100") {
			echo "<img src='images/check.png' border='0'>";
		}
		?></td>
        <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_project['money_project'], 2); ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $sqlp_project = "select sum(tpp.pay_total) m_pay
from tb_project_pay tpp
where tpp.project_id = '$r_project[project_id]' and tpp.budget_from_id = '$budget_from_id'";
						$resultp_project = mysql_query($sqlp_project);
						$rp_project = mysql_fetch_row($resultp_project);
						echo number_format($rp_project[0], 2);
						  ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //ร้อยละ เบิกจ่าย
						  $person_pay_project = "0";
						  if ($r_project['money_project'] != "") {
						  	$person_pay_project = ($rp_project[0] * 100) / $r_project['money_project'];
						  }
						  echo number_format($person_pay_project, 2);
						  ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //เหลือจ่าย
						  $mm_project = $r_project['money_project'] - $rp_project[0];
						  echo number_format($mm_project, 2);
						  ?></td>
      </tr>
		<?php
	  } //end while project
} //end while sd ?>
      <tr>
        <td height="25" colspan="2" align="center" bgcolor="#E3FFBB" class="textBlackBold" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-right:1px solid #CCC;">รวม</td>
        <td height="25" align="center" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_no_complete, 0); ?></td>
        <td height="25" align="center" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_complete, 0); ?></td>
        <td height="25" align="center" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $total_project = $sum_project_no_complete + $sum_project_complete;
						  echo number_format($total_project, 0);
						  ?></td>
        <td height="25" align="right" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_money, 2); ?></td>
        <td height="25" align="right" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($sum_project_pay, 2); ?></td>
        <td height="25" align="right" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          $total_persen = "0";
						  if ($sum_project_money != "0") {
							  $total_persen = ($sum_project_pay * 100) / $sum_project_money;
						  }
						  echo number_format($total_persen, 2);
						  ?></td>
        <td height="25" align="right" bgcolor="#E3FFBB" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php
                          //รวมเหลือจ่าย
						  $money_result = $sum_project_money - $sum_project_pay;
						  echo number_format($money_result, 2);
						  ?></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="25" align="left">&nbsp;</td>
  </tr>
</table>
</body>
</html>