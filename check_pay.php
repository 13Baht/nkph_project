<?php
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
$budget_from_id = $_GET['budget_from_id'];
include "config.php";
//เงินในแหล่งงบ
$sql = "select budget_money from tb_project_budget where project_id = '$project_id' and budget_from_id = '$budget_from_id'";
$result = mysql_query($sql);
$r = mysql_fetch_row($result);
//รวมเงินที่เบิกแล้ว
$sql2 = "select sum(pay_total) cc from tb_project_pay where project_id = '$project_id' and budget_from_id = '$budget_from_id'";
$result2 = mysql_query($sql2);
$r2 = mysql_fetch_row($result2);
//เงินเหลือ
$m_result = $r[0] - $r2[0];
echo "<input type='hidden' name='cc' id='cc' value='$m_result' />";
?>