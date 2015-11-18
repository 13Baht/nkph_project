<?php
include "chk_cookie.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
include "config.php";
$sql = "insert into tb_project_point_result_progress(point_result_id, project_id, point_result, point_result_unit, point_result_target) select tpp.*
from tb_project_point_result tpp
left outer join tb_project_point_result_progress tppp on tpp.point_result_id = tppp.point_result_id
where tpp.project_id = \"$project_id\"
and tppp.point_result_id is null";
$result = mysql_query($sql);
echo "Save OK!";
?>