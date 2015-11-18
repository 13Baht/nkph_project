function Inint_AJAX() {
   try { return new ActiveXObject("Msxml2.XMLHTTP");  } catch(e) {} //IE
   try { return new ActiveXObject("Microsoft.XMLHTTP"); } catch(e) {} //IE
   try { return new XMLHttpRequest();          } catch(e) {} //Native Javascript
   alert("XMLHttpRequest not supported");
   return null;
};
function LoadPage(url, target, id) {
     var req = Inint_AJAX();
	 var target = document.getElementById(target);
     target.innerHTML = "<center><br><img src='images/loading.gif'><br><br><span class='textBlackNormal'>กำลังเชื่อมต่อกับข้อมูล กรุณารอสักครู่ครับ...</span></center>";
     req.onreadystatechange = function () {
          if (req.readyState == 4) {
               if (req.status == 200) {
                    target.innerHTML = req.responseText; //แสดงผล แทนรูปรอโหลด
               }
          }
     };
	 var rand1 = Math.random();
	 var url = url + "?rand1=" + rand1 + "&id=" + encodeURIComponent(id);
     req.open("GET", url, true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
function LoadPage2(url, target, id1, id2) {
     var req = Inint_AJAX();
	 var target = document.getElementById(target);
     target.innerHTML = "<center><br><img src='images/loading.gif'><br><br><span class='textBlackNormal'>กำลังเชื่อมต่อกับข้อมูล กรุณารอสักครู่ครับ...</span></center>";
     req.onreadystatechange = function () {
          if (req.readyState == 4) {
               if (req.status == 200) {
                    target.innerHTML = req.responseText; //แสดงผล แทนรูปรอโหลด
               }
          }
     };
	 var rand1 = Math.random();
	 var url = url + "?rand1=" + rand1 + "&id1=" + encodeURIComponent(id1) + "&id2=" + encodeURIComponent(id2);
     req.open("GET", url, true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
/*ใช้ตัวนี้*/
function LoadData(url, target) {
     var req = Inint_AJAX();
	 var target = document.getElementById(target);
     target.innerHTML = "<center><br><img src='images/loading.gif'><br><br><span class='textBlackNormal'>กำลังเชื่อมต่อกับข้อมูล กรุณารอสักครู่ครับ...</span></center>";
     req.onreadystatechange = function () {
          if (req.readyState == 4) {
               if (req.status == 200) {
                    target.innerHTML = req.responseText; //แสดงผล แทนรูปรอโหลด
               }
          }
     };
	 var rand1 = Math.random();
	 var url = url + "&rand1=" + rand1;
     req.open("GET", url, true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
function QueryData(url) {
     var req = Inint_AJAX();
     req.onreadystatechange = function () {
          if (req.readyState == 4) {
               if (req.status == 200) {
                    alert('บันทึกข้อมูลเรียบร้อยแล้ว');
               }
          }
     };
	 var rand1 = Math.random();
	 var url = url + "&rand1=" + rand1;
     req.open("GET", url, true);
     req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); // set Header
     req.send(null); //ส่งค่า
}
function LoadArea(url, target1) {
	$(target1).innerHTML = "<center><br><img src='images/loading.gif'><br><br><span class='textBlackNormal'>กำลังเชื่อมต่อกับข้อมูล กรุณารอสักครู่ครับ...</span></center>";
	var rand1 = Math.random();
	var url = url + "&rand1=" + rand1;
	new Ajax.Updater(target1, url, { method: "get" } );
}
function popup(url, name, windowWidth, windowHeight) {  
    myleft = (screen.width)?(screen.width - windowWidth) / 2:100;
    mytop = (screen.height)?(screen.height - windowHeight) / 2:100;  
    properties = "width="+windowWidth+",height="+windowHeight;
    properties +=",scrollbars=yes, top="+mytop+",left="+myleft;
    window.open(url, name, properties);
}  
