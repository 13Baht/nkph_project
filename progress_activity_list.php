<?php
include "config.php";
include "myclass.php";
$rand1 = $_GET['rand1'];
$project_id = $_GET['project_id'];
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
                                  <tr>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลำดับ</td>
                                    <td width="29%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">กิจกรรม</td>
                                    <td width="13%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ค่าน้ำหนัก (%)</td>
                                    <td width="13%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">วันเริ่มต้น</td>
                                    <td width="13%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">วันสิ้นสุด</td>
                                    <td width="11%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ผลงาน</td>
                                    <td width="9%" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC;">ลงผลงาน</td>
                                    <td width="6%" height="25" align="center" bgcolor="#E9E9E9" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-top:1px solid #CCC; border-right:1px solid #CCC;">ลบ</td>
                                  </tr>
                                  <?php
								  $sql_cm = "select * from tb_project_activity_progress where project_id = \"$project_id\" order by project_activity_id";
								  $result_cm = mysql_db_query($db, $sql_cm);
								  $i = 1;
								  while ($r_cm = mysql_fetch_array($result_cm)) {
								  ?>
                                  <tr>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $i++; ?></td>
                                    <td height="25" align="left" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['activity_name']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['activity_weight']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo FormatDateSlash($r_cm['activity_begin_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo FormatDateSlash($r_cm['activity_end_date']); ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><?php echo $r_cm['result']; ?></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC;"><a href="javascript:;" onclick="editActivityProgress('<?php echo $r_cm['project_activity_id']; ?>')"><img src="images/edit.png" width="22" height="22" border="0" /></a></td>
                                    <td height="25" align="center" style="border-bottom:1px solid #CCC; border-left:1px solid #CCC; border-right:1px solid #CCC;"><a href="javascript:;" onclick="delActivityProgress('<?php echo $r_cm['project_activity_id']; ?>')" title="ลบ"><img src="images/bin.png" border="0" align="absmiddle" /></a></td>
                                  </tr>
                                  <?php } //end while รายการค่าใช้จ่าย ?>
                                </table>
ผลการดำเนินงาน<br />
<?php
$sql_per = "select sum(activity_weight) cc from tb_project_activity_progress where project_id = \"$project_id\" and result != '' and result is not null";
$result_per = mysql_query($sql_per);
$r_per = mysql_fetch_row($result_per);
?>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" width="264" height="132" id="MyFirstChart" >
          <param name="movie" value="charts/AngularGauge.swf" />
          <param name="wmode" value="transparent" />
          <param name="FlashVars" value="&chartWidth=218&chartHeight=109&DOMId=myChartId&registerWithJS=1&debugMode=0&dataXML=<chart lowerLimit='0' upperLimit='100' lowerLimitDisplay='0' upperLimitDisplay='100' gaugeStartAngle='180' gaugeEndAngle='0' palette='1' numberSuffix='' tickValueDistance='20' showValue='1' decimals='2' editMode='0' majorTMNumber='10' minorTMNumber='3'>
          <colorRange>
      <color minValue='0' maxValue='20' code='FF654F'/>
      <color minValue='20' maxValue='40' code='FF9B8C'/>
      <color minValue='40' maxValue='60' code='F6BD0F'/>
      <color minValue='60' maxValue='80' code='9BCE00'/>
      <color minValue='80' maxValue='100' code='729700'/>
   </colorRange>
   <dials>
      <dial id='CS' value='<?php echo number_format($r_per[0], 2); ?>' rearExtension='10'/>
   </dials>
<styles>
   <definition>
      <style type='font' name='myValueFont' bgColor='F1f1f1' borderColor='999999' />
   </definition>
   <application>
      <apply toObject='Value' styles='myValueFont' />
   </application>
</styles></chart>" width="218" height="109" name="Column3D" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />

<embed src="charts/AngularGauge.swf" flashVars="&chartWidth=218&chartHeight=109&DOMId=myChartId&registerWithJS=1&debugMode=0&dataXML=<chart lowerLimit='0' upperLimit='100' lowerLimitDisplay='0' upperLimitDisplay='100' gaugeStartAngle='180' gaugeEndAngle='0' palette='1' numberSuffix='' tickValueDistance='20' showValue='1' decimals='2' editMode='0' majorTMNumber='10' minorTMNumber='3'>
          <colorRange>
      <color minValue='0' maxValue='20' code='FF654F'/>
      <color minValue='20' maxValue='40' code='FF9B8C'/>
      <color minValue='40' maxValue='60' code='F6BD0F'/>
      <color minValue='60' maxValue='80' code='9BCE00'/>
      <color minValue='80' maxValue='100' code='729700'/>
   </colorRange>
   <dials>
      <dial id='CS' value='<?php echo number_format($r_per[0], 2); ?>' rearExtension='10'/>
   </dials>
<styles>
   <definition>
      <style type='font' name='myValueFont' bgColor='F1f1f1' borderColor='999999' />
   </definition>
   <application>
      <apply toObject='Value' styles='myValueFont' />
   </application>
</styles></chart>"
width="264" height="132" name="Column3D" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
    </object>
