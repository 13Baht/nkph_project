<?php
include "config.php";
$responsibility_id = $_GET['responsibility_id'];
$rand1 = $_GET['rand1'];
$sql = "select target_id, target_name from target where responsibility_id = '$responsibility_id' and target_status = '1'";
$result = mysql_query($sql);
echo "<select name=\"target_id\" id=\"target_id\" style=\"width:300px;\">";
echo "<option value=''>--เลือก--</option>";
echo "<option value='0'>ไม่สอดคล้องโดยตรง</option>";
while ($r = mysql_fetch_array($result)) {
	echo "<option value='$r[target_id]'>$r[target_name]</option>";
}
echo "</select>";
?>