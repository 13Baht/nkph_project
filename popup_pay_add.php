<?php
include "chk_cookie.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>เพิ่มข้อมูลการเบิกจ่าย</title>
<link rel="stylesheet" type="text/css" href="css/mycss-popup.css"/>
<script src="js/myjs.js"></script>
<script>
function OnOK(){
	eval("self.opener.getOKPay()");
	window.close();	
}
function saveData() {
	var frm = document.frm1;
	var pay_type_id = frm.pay_type_id.value;
	var budget_from_id = frm.budget_from_id.value;
	var pay_date = frm.pay_date.value;
	var pay_unit = frm.pay_unit.value;
	var pay_money = frm.pay_money.value;
	var pay_total = frm.pay_total.value;
	var project_id = frm.project_id.value;	
	if (pay_type_id == "") {
		alert('กรุณาเลือกหมวดค่าใช้จ่าย');
		frm.pay_type_id.focus();
		return false;
	}
	var have_sub_type = frm.have_sub_type.value;
	var have_sub_type_text = frm.have_sub_type_text.value;
	var pay_type_sub_id = '';
	if (have_sub_type == "1") {
		pay_type_sub_id = frm.pay_type_sub.value;
	}
	var pay_type_text = '';
	if (have_sub_type_text == "1") {
		pay_type_text = frm.pay_type_text.value;
		if (pay_type_text == "") {
			alert('กรุณาระบุชื่อรายการค่าใช้จ่าย');
			frm.pay_type_text.focus();
			return false;
		}
	}
	if (budget_from_id == "") {
		alert('กรุณาเลือกแหล่งงบประมาณ');
		frm.budget_from_id.focus();
		return false;
	}
	if (pay_date == "") {
		alert('กรุณาระบุวันที่เบิกจ่าย');
		frm.pay_date.focus();
		return false;
	}
	if (pay_unit == "") {
		alert('กรุณาระบุจำนวนหน่วย');
		frm.pay_unit.focus();
		return false;
	}
	if (pay_money == "") {
		alert('กรุณาระบุจำนวนเงินที่เบิกต่อหน่วย');
		frm.pay_money.focus();
		return false;
	}
	if (pay_total == "") {
		alert('กรุณาระบุจำนวนเงินรวม');
		frm.pay_total.focus();
		return false;
	}
	if (parseInt(pay_total) > parseInt(frm.cc.value)) {
		alert('จำนวนเงินที่เหลือในงบ ไม่พอเบิกจ่าย');
		return false;
	}
	var cf = confirm('ต้องการบันทึกข้อมูลใช่หรือไม่');
	if (cf == true) {
		var url = "pay_save.php?project_id=" + encodeURIComponent(project_id) + "&pay_type_id=" + encodeURIComponent(pay_type_id) + "&pay_type_sub_id=" + pay_type_sub_id + "&pay_type_text=" + encodeURIComponent(pay_type_text) + "&budget_from_id=" + encodeURIComponent(budget_from_id) + "&pay_date=" + encodeURIComponent(pay_date) + "&pay_unit=" + encodeURIComponent(pay_unit) + "&pay_money=" + encodeURIComponent(pay_money) + "&pay_total=" + encodeURIComponent(pay_total) + "&st=save";
		LoadData(url, "tSave");
		alert('บันทึกข้อมูลเรียบร้อยแล้ว');
		OnOK();
	} else {
		return false;
	}
}
function LoadSubType(pay_type_id) {
	var url = 'pay_type_sub_list.php?pay_type_id=' + pay_type_id;
	LoadData(url, 'tSubPayType');
}
</script>
</head>

<body>
<?php
$project_id = $_GET['project_id'];
include "config.php";
?>
<table width="500" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="25" colspan="2" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">เพิ่มรายการเบิกจ่ายงบประมาณ</td>
  </tr>
  <tr>
    <td colspan="2" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;">
    <form name="frm1">
    <table width="100%" border="0" cellspacing="0" cellpadding="2">
      <tr>
        <td width="27%" height="25" align="left">หมวดค่าใช้จ่าย :</td>
        <td width="73%" height="25" align="left"><select name="pay_type_id" id="pay_type_id" style="width:300px;" onchange="LoadSubType(this.value)">
                                <option value="">--เลือก--</option>
                                <?php
						$sql_pay = "select pay_type_id, pay_type_name, have_sub_type from pay_type order by order_no";
						$result_pay = mysql_query($sql_pay);
						while ($r_pay = mysql_fetch_array($result_pay)) {
							echo "<option value='$r_pay[pay_type_id]'>$r_pay[pay_type_name]</option>";
						}
						?>
            </select>
          <span class="textRedSmall">*</span></td>
      </tr>
      <tr>
        <td colspan="2" align="left"><span id="tSubPayType"></span></td>
        </tr>
      <tr>
        <td height="25" align="left">จากแหล่งงบ :</td>
        <td height="25" align="left">
  <script>
function CheckPay(project_id, budget_from_id) {
	var url = "check_pay.php?project_id=" + encodeURIComponent(project_id) + "&budget_from_id=" + encodeURIComponent(budget_from_id);
	LoadData(url, "tCheck");
}
</script>
          <select name="budget_from_id" id="budget_from_id" style="width:170px;" onchange="CheckPay('<?php echo $project_id; ?>', this.value)">
            <option value="">--เลือก--</option>
            <?php
						$sql_bf = "select tpd.budget_from_id, bf.budget_from_name
from tb_project_budget tpd inner join budget_from bf on tpd.budget_from_id = bf.budget_from_id
where tpd.project_id = '$project_id' order by tpd.budget_from_id";
						$result_bf = mysql_query($sql_bf);
						while ($r_bf = mysql_fetch_array($result_bf)) {
							echo "<option value='$r_bf[budget_from_id]'>$r_bf[budget_from_name]</option>";
						}
						?>
            </select>
          <span class="textRedSmall">*</span><span id="tCheck"></span></td>
      </tr>
      <tr>
        <td height="25" align="left">วันที่เบิกจ่าย :</td>
        <td height="25" align="left"><link rel="stylesheet" href="css/base/jquery.ui.all.css">
                        <script type="text/javascript" src="js/jquery-1.8.0.js"></script>
              <script type="text/javascript" src="js/jquery-ui-1.8.10.offset.datepicker.min.js"></script>
              <script type="text/javascript" src="js/dp.js"></script>
              <style type="text/css">
			/*demo page css
			body{ font: 80% "Trebuchet MS", sans-serif; margin: 50px;}*/
			.demoHeaders { margin-top: 2em; }
			#dialog_link {padding: .4em 1em .4em 20px;text-decoration: none;position: relative;}
			#dialog_link span.ui-icon {margin: 0 5px 0 0;position: absolute;left: .2em;top: 50%;margin-top: -8px;}
			ul#icons {margin: 0; padding: 0;}
			ul#icons li {margin: 2px; position: relative; padding: 4px 0; cursor: pointer; float: left;  list-style: none;}
			ul#icons span.ui-icon {float: left; margin: 0 4px;}
			ul.test {list-style:none; line-height:30px;}
		</style><input name="pay_date" type="text" id="datepicker-th-1" style="width:100px;" maxlength="10" value="<?php echo $d1; ?>" />
		<span class="textRedSmall">*</span></td>
      </tr>
<script>
function sumData() {
	var frm = document.frm1;
	var total = 0;
	if (frm.pay_unit.value != "" && frm.pay_money.value != "") {
		total = frm.pay_unit.value * frm.pay_money.value;
	}
	frm.pay_total.value = total;
}
</script>
      <tr>
        <td height="25" align="left">จำนวนหน่วย :</td>
        <td height="25" align="left"><input name="pay_unit" type="text" id="pay_unit" style="width:100px;" maxlength="10" onkeyup="sumData()" onblur="sumData()" />
          <span class="textRedSmall">*</span></td>
      </tr>
      <tr>
        <td height="25" align="left">จำนวนเงินต่อหน่วย :</td>
        <td height="25" align="left"><input name="pay_money" type="text" id="pay_money" style="width:100px;" maxlength="10" onkeyup="sumData()" onblur="sumData()" />
          <span class="textRedSmall">*</span></td>
      </tr>
      <tr>
        <td height="25" align="left">จำนวนเงินรวม :</td>
        <td height="25" align="left"><input name="pay_total" type="text" id="pay_total" style="width:100px;" maxlength="10" />
          <span class="textRedSmall">*</span></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><input type="button" name="button" id="button" value="  บันทึกข้อมูล  " onclick="saveData()" />
          <input type="button" name="button2" id="button2" value="  ยกเลิก  " onclick="OnOK()" />
          <input name="project_id" type="hidden" id="project_id" value="<?php echo $project_id; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="left">&nbsp;</td>
        <td height="25" align="left"><span class="textRedSmall" id="tSave">&nbsp;</span></td>
      </tr>
    </table></form></td>
  </tr>
</table>
</body>
</html>
