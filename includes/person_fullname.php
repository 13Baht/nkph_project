<?php
if ($_COOKIE["cook_user_type_id"] == "3" || $_COOKIE["cook_user_type_id"] == "4" || $_COOKIE["cook_user_type_id"] == "5") {
	$sql_person = "select p2.prefix_name, p.person_firstname, p.person_lastname from personal p left outer join prefix p2 on p.person_prefix = p2.prefix_id where p.person_id = \"$_COOKIE[cook_id]\"";
	$result_person = mysql_db_query($db2, $sql_person);
	$r_person = mysql_fetch_array($result_person);
	$fullname = $r_person['prefix_name'].$r_person['person_firstname']." ".$r_person['person_lastname'];
}
if ($_COOKIE["cook_user_type_id"] == "1") {
	$fullname = "Administrator";
}
if ($_COOKIE["cook_user_type_id"] == "2") {
	$sql_person = "select full_name from user_leader1";
	$result_person = mysql_db_query($db, $sql_person);
	$r_person = mysql_fetch_row($result_person);
	$fullname = $r_person[0];
}
?>