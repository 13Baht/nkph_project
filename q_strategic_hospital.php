<?php
include "config.php";
$year_budget_id = $_GET['year_budget_id'];
$rand1 = $_GET['rand1'];
$sql = "select strategic_hospital_id, strategic_hospital_name from strategic_hospital where strategic_hospital_year = '$year_budget_id' and strategic_hospital_status = '1'";
$result = mysql_query($sql);
echo "<select name=\"strategic_hospital_id\" id=\"strategic_hospital_id\" style=\"width:300px;\">";
echo "<option value=''>--เลือก--</option>";
echo "<option value='0'>ไม่สอดคล้องโดยตรง</option>";
while ($r = mysql_fetch_array($result)) {
	echo "<option value='$r[strategic_hospital_id]'>$r[strategic_hospital_name]</option>";
}
echo "</select>";
?>