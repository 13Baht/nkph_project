<?php
$year_budget = $_GET['year_budget'];
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_web; ?></title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
</head>

<body>
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" align="left" class="textBlackBold">โครงการแยกตามประเด็นยุทธศาสตร์โรงพยาบาล ปีงบประมาณ <?php echo $year_budget; ?></td>
  </tr>
  <tr>
    <td height="25" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr class="textBlackBold">
        <td width="44%" height="25" align="left" bgcolor="#E5E5E5" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ยุทธศาสตร์ / แผนงานโครงการ</td>
        <td width="16%" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">หน่วยงานรับผิดชอบหลัก</td>
        <td width="10%" height="25" align="right" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">จำนวนงบประมาณ</td>
        <td width="10%" height="25" align="right" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เบิกจ่ายงบประมาณแล้ว</td>
        <td width="10%" height="25" align="right" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">งบประมาณคงเหลือ</td>
        <td width="10%" height="25" align="center" bgcolor="#E5E5E5" style="border-bottom:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">สถานะโครงการ</td>
      </tr>
      <?php
	  //ยุทธศาสตร์โรงพยาบาล
	  $sql_strategic_hospital = "select sh.strategic_hospital_id, sh.strategic_hospital_name, sum(tp.project_money) sum_money_strategic_hospital
from strategic_hospital sh
left outer join tb_project tp on sh.strategic_hospital_id = tp.strategic_hospital_id
where sh.strategic_hospital_year = '$year_budget' and sh.strategic_hospital_status = '1'
group by sh.strategic_hospital_id";
	  $result_strategic_hospital = mysql_query($sql_strategic_hospital);
	  while ($r_strategic_hospital = mysql_fetch_array($result_strategic_hospital)) {
		  //รวมเบิกจ่ายแล้วตามยุทธศาสตร์
		  $sql_sum_pay_strategic = "select sum(tpp.pay_total) sum_pay_strategic
from tb_project_pay tpp
inner join tb_project tp on tpp.project_id = tp.project_id
where tp.strategic_hospital_id = '$r_strategic_hospital[strategic_hospital_id]'";
		  $result_sum_pay_strategic = mysql_query($sql_sum_pay_strategic);
		  $r_sum_pay_strategic = mysql_fetch_row($result_sum_pay_strategic);
		  $money_result_strategic = $r_strategic_hospital['sum_money_strategic_hospital'] - $r_sum_pay_strategic[0];
	  ?>
      <tr>
        <td height="25" bgcolor="#EBFFCC" class="textBlackBold" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $r_strategic_hospital['strategic_hospital_name']; ?></td>
        <td height="25" align="center" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
        <td height="25" align="right" bgcolor="#EBFFCC" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_strategic_hospital['sum_money_strategic_hospital'], 2); ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_sum_pay_strategic[0], 2); ?></td>
        <td height="25" align="right" bgcolor="#EBFFCC" class="textBlackBold" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($money_result_strategic, 2); ?></td>
        <td height="25" bgcolor="#EBFFCC" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;</td>
      </tr>
      <?php
	  //ข้อมูลโครงการ
	  $sql_project = "select tp.project_id, tp.project_name, tsd.sub_dept_name, ps.project_status_name, sum(tp.project_money) sum_money_project
from tb_project tp
left outer join tb_sub_dept tsd on tp.sub_dept_id = tsd.sub_dept_id
left outer join project_status ps on tp.project_status_id = ps.project_status_id
where tp.strategic_hospital_id = '$r_strategic_hospital[strategic_hospital_id]'
group by tp.project_id
order by tp.project_id";
	  $result_project = mysql_query($sql_project);
	  $i = 1;
	  while ($r_project = mysql_fetch_array($result_project)) {
		  //รวมเบิกจ่ายในโครงการ
		  $sql_pay_project = "select sum(tpp.pay_total) sum_pay_project
from tb_project_pay tpp
where tpp.project_id = '$r_project[project_id]'";
		  $result_pay_project = mysql_query($sql_pay_project);
		  $r_pay_project = mysql_fetch_row($result_pay_project);
		  $money_project_result = $r_project['sum_money_project'] - $r_pay_project[0];
	  ?>
      <tr>
        <td height="25" style="border-left:1px solid #CCC; border-bottom:1px solid #CCC; border-right:1px solid #CCC;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php
        echo ($i++).". ";
		echo "<a href='project_detail.php?project_id=$r_project[project_id]' target='_blank' id='k2'>$r_project[project_name]</a>";
		?></td>
        <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $r_project['sub_dept_name']; ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_project['sum_money_project'], 2); ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($r_pay_project[0], 2); ?></td>
        <td height="25" align="right" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo number_format($money_project_result, 2); ?></td>
        <td height="25" align="center" style="border-bottom:1px solid #CCC; border-right:1px solid #CCC;"><?php echo $r_project['project_status_name']; ?></td>
      </tr>
      <?php
	  } //end whlie โครงการ
	  } //end while ยุทธศาสตร์โรงพยาบาล
	  ?>
    </table></td>
  </tr>
  <tr>
    <td height="25" align="left">&nbsp;</td>
  </tr>
</table>
</body>
</html>