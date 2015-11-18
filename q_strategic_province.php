<?php
include "config.php";
$year_budget_id = $_GET['year_budget_id'];
$rand1 = $_GET['rand1'];
$sql = "select strategic_province_id, strategic_province_name from strategic_province where strategic_province_year = '$year_budget_id' and strategic_province_status = '1'";
$result = mysql_query($sql);
echo "<select name=\"strategic_province_id\" id=\"strategic_province_id\" style=\"width:300px;\">";
echo "<option value=''>--เลือก--</option>";
echo "<option value='0'>ไม่สอดคล้องโดยตรง</option>";
while ($r = mysql_fetch_array($result)) {
	echo "<option value='$r[strategic_province_id]'>$r[strategic_province_name]</option>";
}
echo "</select>";
?>