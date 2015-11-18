<?php
include "config.php";
$year_budget_id = $_GET['year_budget_id'];
$rand1 = $_GET['rand1'];
$sql = "select responsibility_id, responsibility_name from responsibility where responsibility_year = '$year_budget_id' and responsibility_status = '1'";
$result = mysql_query($sql);
echo "<select name=\"responsibility_id\" id=\"responsibility_id\" style=\"width:300px;\" onchange=\"qTarget(this.value)\">";
echo "<option value=''>--เลือก--</option>";
echo "<option value='0'>ไม่สอดคล้องโดยตรง</option>";
while ($r = mysql_fetch_array($result)) {
	echo "<option value='$r[responsibility_id]'>$r[responsibility_name]</option>";
}
echo "</select>";
?>