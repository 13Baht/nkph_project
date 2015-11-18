<?php
include "chk_cookie.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
include "config.php";
$sql = "insert into tb_project_point_product_progress(point_product_id, project_id, point_product, point_product_unit, point_product_target) select tpp.*
from tb_project_point_product tpp
left outer join tb_project_point_product_progress tppp on tpp.point_product_id = tppp.point_product_id
where tpp.project_id = \"$project_id\"
and tppp.point_product_id is null";
$result = mysql_query($sql);
echo "Save OK!";
?>