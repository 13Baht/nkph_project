<?php
include "chk_cookie.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
include "config.php";
$sql = "insert into tb_project_activity_progress(project_activity_id, project_id, activity_name, activity_weight, activity_begin_date, activity_end_date) select tpa.*
from tb_project_activity tpa
left outer join tb_project_activity_progress tpap on tpa.project_activity_id = tpap.project_activity_id
where tpa.project_id = \"$project_id\"
and tpap.project_activity_id is null";
$result = mysql_query($sql);
echo "Save OK!";
?>