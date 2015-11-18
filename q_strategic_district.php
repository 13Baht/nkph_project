<?php
include "config.php";
$year_budget_id = $_GET['year_budget_id'];
$rand1 = $_GET['rand1'];
$sql = "select strategic_district_id, strategic_district_name from strategic_district where strategic_district_year = '$year_budget_id' and strategic_district_status = '1'";
$result = mysql_query($sql);
echo "<select name=\"strategic_district_id\" id=\"strategic_district_id\" style=\"width:300px;\">";
echo "<option value=''>--เลือก--</option>";
echo "<option value='0'>ไม่สอดคล้องโดยตรง</option>";
while ($r = mysql_fetch_array($result)) {
	echo "<option value='$r[strategic_district_id]'>$r[strategic_district_name]</option>";
}
echo "</select>";
?>