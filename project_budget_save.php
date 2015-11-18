<?php
session_start();
include "chk_cookie.php";
$project_budget_id = date("YmdHis")."-".session_id();
$project_id = $_GET['project_id'];
$budget_from_id = $_GET['budget_from_id'];
$budget_from_orther = $_GET['budget_from_orther'];
$budget_money = $_GET['budget_money'];
$st = $_GET['st'];
$rand1 = $_GET['rand1'];
include "config.php";
if ($st == "save") {
	$sql = "insert into tb_project_budget(project_budget_id, project_id, budget_from_id, budget_from_orther, budget_money) values(\"$project_budget_id\", \"$project_id\", \"$budget_from_id\", \"$budget_from_orther\", \"$budget_money\")";
}
if ($st == "del") {
	$project_budget_id = $_GET['project_budget_id'];
	$sql = "delete from tb_project_budget where project_budget_id = \"$project_budget_id\"";
}
$result = mysql_query($sql);
$sqlu = "update tb_project set budget_from_id = (select if(budget_from_id is not null, budget_from_id, '')
from tb_project_budget where project_id = \"$project_id\" order by budget_money desc, budget_from_id limit 1)
where project_id = \"$project_id\"";
$resultu = mysql_query($sqlu);
echo "Save OK!";
?>