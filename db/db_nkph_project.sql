/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : db_nkph_project

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2014-02-20 23:59:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `budget_from`
-- ----------------------------
DROP TABLE IF EXISTS `budget_from`;
CREATE TABLE `budget_from` (
  `budget_from_id` int(1) NOT NULL default '0',
  `budget_from_name` varchar(30) default NULL,
  PRIMARY KEY  (`budget_from_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of budget_from
-- ----------------------------
INSERT INTO `budget_from` VALUES ('1', 'เงินบำรุงโรงพยาบาล');
INSERT INTO `budget_from` VALUES ('2', 'เงินบำรุง คปสอ.เมือง');
INSERT INTO `budget_from` VALUES ('3', 'เงินบำรุงงบประมาณ(คลัง)');
INSERT INTO `budget_from` VALUES ('4', 'เงินประกันสังคม');
INSERT INTO `budget_from` VALUES ('5', 'เงิน UC');
INSERT INTO `budget_from` VALUES ('6', 'เงินกองทุนบริจาค');
INSERT INTO `budget_from` VALUES ('7', 'มูลนิธิโรงพยาบาล');
INSERT INTO `budget_from` VALUES ('8', 'อื่นๆ');

-- ----------------------------
-- Table structure for `pay_type`
-- ----------------------------
DROP TABLE IF EXISTS `pay_type`;
CREATE TABLE `pay_type` (
  `pay_type_id` int(1) NOT NULL default '0',
  `pay_type_name` varchar(20) default NULL,
  PRIMARY KEY  (`pay_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pay_type
-- ----------------------------
INSERT INTO `pay_type` VALUES ('1', 'ค่าตอบแทน');
INSERT INTO `pay_type` VALUES ('2', 'ค่าใช้สอย');
INSERT INTO `pay_type` VALUES ('3', 'ค่าสาธารณูปโภค');
INSERT INTO `pay_type` VALUES ('4', 'ค่าใช้จ่ายอื่นๆ');

-- ----------------------------
-- Table structure for `project_dimension`
-- ----------------------------
DROP TABLE IF EXISTS `project_dimension`;
CREATE TABLE `project_dimension` (
  `project_dimension_id` int(1) NOT NULL default '0',
  `project_dimension_name` varchar(30) default NULL,
  PRIMARY KEY  (`project_dimension_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_dimension
-- ----------------------------
INSERT INTO `project_dimension` VALUES ('1', 'ประสิทธิภาพ');
INSERT INTO `project_dimension` VALUES ('2', 'ประสิทธิผล');
INSERT INTO `project_dimension` VALUES ('3', 'คุณภาพบริการ');
INSERT INTO `project_dimension` VALUES ('4', 'การพัฒนาองค์กร');

-- ----------------------------
-- Table structure for `project_interest`
-- ----------------------------
DROP TABLE IF EXISTS `project_interest`;
CREATE TABLE `project_interest` (
  `project_interest_id` int(1) NOT NULL default '0',
  `project_interest_name` varchar(20) default NULL,
  PRIMARY KEY  (`project_interest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_interest
-- ----------------------------
INSERT INTO `project_interest` VALUES ('1', 'ประชาชนและชุมชน');
INSERT INTO `project_interest` VALUES ('2', 'ผู้มารับบริการ');
INSERT INTO `project_interest` VALUES ('3', 'เจ้าหน้าที่โรงพยาบาล');

-- ----------------------------
-- Table structure for `project_status`
-- ----------------------------
DROP TABLE IF EXISTS `project_status`;
CREATE TABLE `project_status` (
  `project_status_id` int(1) NOT NULL default '0',
  `project_status_name` varchar(30) default NULL,
  PRIMARY KEY  (`project_status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_status
-- ----------------------------
INSERT INTO `project_status` VALUES ('1', 'ยังไม่ดำเนินการ');
INSERT INTO `project_status` VALUES ('2', 'กำลัง/อยู่ระหว่างดำเนินการ');
INSERT INTO `project_status` VALUES ('3', 'สิ้นสุดโครงการ(ปกติ)');
INSERT INTO `project_status` VALUES ('4', 'ยุติโครงการก่อนแผน');

-- ----------------------------
-- Table structure for `project_style`
-- ----------------------------
DROP TABLE IF EXISTS `project_style`;
CREATE TABLE `project_style` (
  `project_style_id` int(1) NOT NULL default '0',
  `project_style_name` varchar(30) default NULL,
  PRIMARY KEY  (`project_style_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of project_style
-- ----------------------------
INSERT INTO `project_style` VALUES ('1', 'โครงการระยะสั้น');
INSERT INTO `project_style` VALUES ('2', 'โครงการระยะยาว(ต่อเนื่อง)');

-- ----------------------------
-- Table structure for `quarter`
-- ----------------------------
DROP TABLE IF EXISTS `quarter`;
CREATE TABLE `quarter` (
  `quarter_id` int(1) NOT NULL default '0',
  `quarter_name` varchar(20) default NULL,
  PRIMARY KEY  (`quarter_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of quarter
-- ----------------------------
INSERT INTO `quarter` VALUES ('1', 'ไตรมาสที่ 1');
INSERT INTO `quarter` VALUES ('2', 'ไตรมาสที่ 2');
INSERT INTO `quarter` VALUES ('3', 'ไตรมาสที่ 3');
INSERT INTO `quarter` VALUES ('4', 'ไตรมาสที่ 4');

-- ----------------------------
-- Table structure for `responsibility`
-- ----------------------------
DROP TABLE IF EXISTS `responsibility`;
CREATE TABLE `responsibility` (
  `responsibility_id` varchar(7) NOT NULL default '',
  `responsibility_name` varchar(250) default NULL,
  `responsibility_year` int(4) default NULL,
  `responsibility_status` varchar(1) default NULL,
  PRIMARY KEY  (`responsibility_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of responsibility
-- ----------------------------
INSERT INTO `responsibility` VALUES ('2557-01', 'พันธกิจ 1', '2557', '1');
INSERT INTO `responsibility` VALUES ('2557-02', 'พันธกิจ 2', '2557', '1');
INSERT INTO `responsibility` VALUES ('2557-03', 'พันธกิจ 3', '2557', '1');

-- ----------------------------
-- Table structure for `spend_type`
-- ----------------------------
DROP TABLE IF EXISTS `spend_type`;
CREATE TABLE `spend_type` (
  `spend_type_id` int(1) NOT NULL default '0',
  `spend_type_name` varchar(20) default NULL,
  PRIMARY KEY  (`spend_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of spend_type
-- ----------------------------
INSERT INTO `spend_type` VALUES ('1', 'เบิกเงิน');
INSERT INTO `spend_type` VALUES ('2', 'ยืมเงิน');

-- ----------------------------
-- Table structure for `strategic_district`
-- ----------------------------
DROP TABLE IF EXISTS `strategic_district`;
CREATE TABLE `strategic_district` (
  `strategic_district_id` varchar(7) NOT NULL default '',
  `strategic_district_name` varchar(250) default NULL,
  `strategic_district_year` int(4) default NULL,
  `strategic_district_status` varchar(1) default NULL,
  PRIMARY KEY  (`strategic_district_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategic_district
-- ----------------------------
INSERT INTO `strategic_district` VALUES ('2557-01', 'ประเด็นยุทธศาสตร์อำเภอ 1', '2557', '1');
INSERT INTO `strategic_district` VALUES ('2557-02', 'ประเด็นยุทธศาสตร์อำเภอ 2', '2557', '1');

-- ----------------------------
-- Table structure for `strategic_hospital`
-- ----------------------------
DROP TABLE IF EXISTS `strategic_hospital`;
CREATE TABLE `strategic_hospital` (
  `strategic_hospital_id` varchar(7) NOT NULL default '',
  `strategic_hospital_name` varchar(250) default NULL,
  `strategic_hospital_year` int(4) default NULL,
  `strategic_hospital_status` varchar(1) default NULL,
  PRIMARY KEY  (`strategic_hospital_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategic_hospital
-- ----------------------------
INSERT INTO `strategic_hospital` VALUES ('2557-01', 'ประเด็นยุทธศาสตร์โรงพยาบาล 1', '2557', '1');
INSERT INTO `strategic_hospital` VALUES ('2557-02', 'ประเด็นยุทธศาสตร์โรงพยาบาล 2', '2557', '1');

-- ----------------------------
-- Table structure for `strategic_province`
-- ----------------------------
DROP TABLE IF EXISTS `strategic_province`;
CREATE TABLE `strategic_province` (
  `strategic_province_id` varchar(7) NOT NULL default '',
  `strategic_province_name` varchar(250) default NULL,
  `strategic_province_year` int(4) default NULL,
  `strategic_province_status` varchar(1) default NULL,
  PRIMARY KEY  (`strategic_province_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of strategic_province
-- ----------------------------
INSERT INTO `strategic_province` VALUES ('2557-01', 'ประเด็นยุทธศาสตร์จังหวัด 1', '2557', '1');
INSERT INTO `strategic_province` VALUES ('2557-02', 'ประเด็นยุทธศาสตร์จังหวัด 2', '2557', '1');

-- ----------------------------
-- Table structure for `s_status`
-- ----------------------------
DROP TABLE IF EXISTS `s_status`;
CREATE TABLE `s_status` (
  `status_id` varchar(1) NOT NULL default '',
  `status_name` varchar(20) default NULL,
  PRIMARY KEY  (`status_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of s_status
-- ----------------------------
INSERT INTO `s_status` VALUES ('0', 'ปิดการใช้งาน');
INSERT INTO `s_status` VALUES ('1', 'เปิดใช้งาน');

-- ----------------------------
-- Table structure for `target`
-- ----------------------------
DROP TABLE IF EXISTS `target`;
CREATE TABLE `target` (
  `target_id` varchar(7) NOT NULL default '',
  `responsibility_id` varchar(7) default NULL,
  `target_name` varchar(250) default NULL,
  `target_year` int(4) default NULL,
  `target_status` varchar(1) default NULL,
  PRIMARY KEY  (`target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of target
-- ----------------------------
INSERT INTO `target` VALUES ('2557-01', '2557-01', 'เป้าประสงค์ 1', '2557', '1');
INSERT INTO `target` VALUES ('2557-02', '2557-01', 'เป้าประสงค์ 2', '2557', '1');
INSERT INTO `target` VALUES ('2557-03', '2557-02', 'เป้าประสงค์ 3', '2557', '1');
INSERT INTO `target` VALUES ('2557-04', '2557-02', 'ทดสอบระบบ', '2557', '1');

-- ----------------------------
-- Table structure for `tb_dept`
-- ----------------------------
DROP TABLE IF EXISTS `tb_dept`;
CREATE TABLE `tb_dept` (
  `dept_id` varchar(10) NOT NULL default '',
  `dept_name` varchar(150) default NULL,
  `dept_status` int(1) default NULL,
  `last_date` date default NULL,
  `last_time` time default NULL,
  `user_update` int(11) default NULL,
  PRIMARY KEY  (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_dept
-- ----------------------------
INSERT INTO `tb_dept` VALUES ('A', 'ฝ่ายบริหารทั่วไป', '1', '2011-05-12', '10:33:45', '1');
INSERT INTO `tb_dept` VALUES ('B', 'กลุ่มเทคนิคบริการ', '1', '2011-05-12', '10:33:58', '1');
INSERT INTO `tb_dept` VALUES ('C', 'กลุ่มงานเวชกรรมสังคม', '1', '2011-05-12', '10:34:10', '1');
INSERT INTO `tb_dept` VALUES ('D', 'กลุ่มการพยาบาล', '1', '2011-05-12', '10:34:24', '1');
INSERT INTO `tb_dept` VALUES ('E', 'กลุ่มพัฒนาระบบบริการสุขภาพ', '1', '2011-05-12', '10:34:40', '1');
INSERT INTO `tb_dept` VALUES ('F', 'กลุ่มงานเภสัชกรรม', '1', '2011-05-12', '10:34:52', '1');

-- ----------------------------
-- Table structure for `tb_project`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project`;
CREATE TABLE `tb_project` (
  `project_id` varchar(50) NOT NULL default '',
  `year_budget_id` int(4) default NULL,
  `project_name` varchar(250) default NULL,
  `budget_from_id` int(1) default NULL,
  `project_money` double(15,0) default NULL,
  `spend_type_id` int(1) default NULL,
  `begin_date` date default NULL,
  `end_date` date default NULL,
  `project_area` varchar(250) default NULL,
  `strategic_province_id` varchar(7) default NULL,
  `strategic_district_id` varchar(7) default NULL,
  `strategic_hospital_id` varchar(7) default NULL,
  `responsibility_id` varchar(7) default NULL,
  `target_id` varchar(7) default NULL,
  `project_style_id` int(1) default NULL,
  `project_dimension_id` int(1) default NULL,
  `sub_dept_id` varchar(10) default NULL,
  `project_email` varchar(250) default NULL,
  `project_tel` varchar(50) default NULL,
  `project_reason` text,
  `project_objective` text,
  `project_target_group` varchar(255) default NULL,
  `project_interest_id` int(1) default NULL,
  `project_adviser_name` varchar(50) default NULL,
  `project_adviser_position` varchar(50) default NULL,
  `project_adviser_email` varchar(50) default NULL,
  `project_adviser_tel` varchar(30) default NULL,
  `project_responsible_name` varchar(50) default NULL,
  `project_responsible_position` varchar(50) default NULL,
  `project_responsible_email` varchar(50) default NULL,
  `project_responsible_tel` varchar(30) default NULL,
  `project_collaborator_name` varchar(50) default NULL,
  `project_collaborator_position` varchar(50) default NULL,
  `project_collaborator_email` varchar(50) default NULL,
  `project_collaborator_tel` varchar(30) default NULL,
  `project_record_name` varchar(50) default NULL,
  `project_record_position` varchar(50) default NULL,
  `project_record_email` varchar(50) default NULL,
  `project_record_tel` varchar(30) default NULL,
  `project_persen` int(3) default NULL,
  `project_approve` int(1) default NULL,
  `approve_date` date default NULL,
  `insert_date` datetime default NULL,
  `update_date` datetime default NULL,
  `user_update` varchar(50) default NULL,
  `project_status_id` int(1) default NULL,
  PRIMARY KEY  (`project_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project
-- ----------------------------
INSERT INTO `tb_project` VALUES ('20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '2557', 'โครงการจัดซื้อครูภัณฑ์สำนักงาน', '1', '60000', '1', '2013-10-01', '2013-10-31', 'โรงพยาบาลนครพนม', '2557-01', '2557-01', '2557-01', '2557-01', '2557-01', '2', '1', 'E008', 'king.nkp@gmail.com', '4002', 'โดยการกรอกข้อความ', '', '', '1', 'ทดสอบ', 'ระบบ', 'king.nkp@gmail.com', '0874293966', '', '', '', '', '', '', '', '', '', '', '', '', '50', '1', '2013-12-25', '2013-10-14 16:21:28', '2013-12-26 14:04:34', 'Administrator', '3');
INSERT INTO `tb_project` VALUES ('20131104153714-52cdd189385e25e6302d510931526502', '2557', 'sssss', '1', '5000', '1', '2013-11-04', '2013-11-04', 'sddfdsf', '0', '0', '0', '2557-01', '2557-01', '1', '1', 'B001', 'ddd', '111', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2013-11-04 15:37:14', null, 'Administrator', '1');

-- ----------------------------
-- Table structure for `tb_project_activity`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_activity`;
CREATE TABLE `tb_project_activity` (
  `project_activity_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `activity_name` varchar(255) default NULL,
  `activity_weight` double(4,0) default NULL,
  `activity_begin_date` date default NULL,
  `activity_end_date` date default NULL,
  PRIMARY KEY  (`project_activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_activity
-- ----------------------------
INSERT INTO `tb_project_activity` VALUES ('20131017235945-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'จัดประชุมชี้แจง', '30', '2013-10-01', '2013-12-31');
INSERT INTO `tb_project_activity` VALUES ('20131018000006-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'อบรมผู้ใช้งาน', '20', '2014-01-01', '2014-01-31');
INSERT INTO `tb_project_activity` VALUES ('20131025133434-3698ede454e8f1bb7c7368aecd393ddb', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'ตรวจคัดกรอง', '50', '2013-10-09', '2013-10-24');

-- ----------------------------
-- Table structure for `tb_project_activity_progress`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_activity_progress`;
CREATE TABLE `tb_project_activity_progress` (
  `project_activity_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `activity_name` varchar(255) default NULL,
  `activity_weight` double(4,0) default NULL,
  `activity_begin_date` date default NULL,
  `activity_end_date` date default NULL,
  `result` varchar(50) default NULL,
  PRIMARY KEY  (`project_activity_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_activity_progress
-- ----------------------------
INSERT INTO `tb_project_activity_progress` VALUES ('20131018000006-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'อบรมผู้ใช้งาน', '20', '2014-01-01', '2014-01-31', '15');
INSERT INTO `tb_project_activity_progress` VALUES ('20131017235945-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'จัดประชุมชี้แจง', '30', '2013-10-01', '2013-12-31', '30');
INSERT INTO `tb_project_activity_progress` VALUES ('20131025133434-3698ede454e8f1bb7c7368aecd393ddb', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'ตรวจคัดกรอง', '50', '2013-10-09', '2013-10-24', null);

-- ----------------------------
-- Table structure for `tb_project_budget`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_budget`;
CREATE TABLE `tb_project_budget` (
  `project_budget_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `budget_from_id` int(1) default NULL,
  `budget_from_orther` varchar(255) default NULL,
  `budget_money` double default NULL,
  PRIMARY KEY  (`project_budget_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_budget
-- ----------------------------
INSERT INTO `tb_project_budget` VALUES ('20131017230721-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '1', '', '50000');
INSERT INTO `tb_project_budget` VALUES ('20140124145332-d9cee63c28f9158e5fe750a36cd6f8ba', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '8', 'ทดสอบ', '10000');
INSERT INTO `tb_project_budget` VALUES ('20131227204136-e941b17b599e06fa240d082b09a52e57', '20131104153714-52cdd189385e25e6302d510931526502', '1', '', '5000');

-- ----------------------------
-- Table structure for `tb_project_command`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_command`;
CREATE TABLE `tb_project_command` (
  `command_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `text_command` text,
  `user_command_id` varchar(13) default NULL,
  `user_command` varchar(50) default NULL,
  `date_command` datetime default NULL,
  `answer_command_text` text,
  `answer_command_user` varchar(50) default NULL,
  `answer_command_date` datetime default NULL,
  PRIMARY KEY  (`command_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_command
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_project_file`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_file`;
CREATE TABLE `tb_project_file` (
  `file_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `file_name` varchar(60) default NULL,
  `file_description` varchar(255) default NULL,
  `ext` varchar(10) default NULL,
  PRIMARY KEY  (`file_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_file
-- ----------------------------
INSERT INTO `tb_project_file` VALUES ('20131015002021-5e5903e0ca71d60142f1a5647ec64ee6', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '20131015002021-5e5903e0ca71d60142f1a5647ec64ee6.jpg', 'ก่อนดำเนินโครงการ', 'jpg');
INSERT INTO `tb_project_file` VALUES ('20131022140742-41c007c274289363a95b7db0b8029d80', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '20131022140742-41c007c274289363a95b7db0b8029d80.xlsx', 'fsfsdf', 'xlsx');

-- ----------------------------
-- Table structure for `tb_project_pay`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_pay`;
CREATE TABLE `tb_project_pay` (
  `pay_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `pay_type_id` int(1) default NULL,
  `pay_type_text` varchar(255) default NULL,
  `budget_from_id` int(1) default NULL,
  `pay_date` date default NULL,
  `pay_unit` double default NULL,
  `pay_money` double default NULL,
  `pay_total` double default NULL,
  PRIMARY KEY  (`pay_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_pay
-- ----------------------------
INSERT INTO `tb_project_pay` VALUES ('20131227134601-e941b17b599e06fa240d082b09a52e57', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '2', 'จัดทำเอกสาร', '1', '2013-12-27', '20', '1000', '20000');
INSERT INTO `tb_project_pay` VALUES ('20131226151032-e941b17b599e06fa240d082b09a52e57', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '1', 'ทดสอบระบบ', '1', '2013-12-26', '1', '5000', '5000');
INSERT INTO `tb_project_pay` VALUES ('20131227214310-e941b17b599e06fa240d082b09a52e57', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '1', 'กหดหก', '1', '2013-12-27', '500', '50', '25000');
INSERT INTO `tb_project_pay` VALUES ('20140124090952-be8e5eeb2ec5455068dac9c9add4637c', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', '4', 'ทดสอบ', '8', '2014-01-24', '1', '8000', '8000');

-- ----------------------------
-- Table structure for `tb_project_pay_target`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_pay_target`;
CREATE TABLE `tb_project_pay_target` (
  `pay_target_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `quarter_id` int(1) default NULL,
  `percen_pay` double default NULL,
  `target_money` double default NULL,
  PRIMARY KEY  (`pay_target_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_pay_target
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_project_point_product`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_point_product`;
CREATE TABLE `tb_project_point_product` (
  `point_product_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `point_product` varchar(255) default NULL,
  `point_product_unit` varchar(20) default NULL,
  `point_product_target` varchar(10) default NULL,
  PRIMARY KEY  (`point_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_point_product
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_project_point_product_progress`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_point_product_progress`;
CREATE TABLE `tb_project_point_product_progress` (
  `point_product_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `point_product` varchar(255) default NULL,
  `point_product_unit` varchar(20) default NULL,
  `point_product_target` varchar(10) default NULL,
  `result` varchar(50) default NULL,
  PRIMARY KEY  (`point_product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_point_product_progress
-- ----------------------------
INSERT INTO `tb_project_point_product_progress` VALUES ('20131120095109-abcba1381579cc45985ea66d9c894b90', '20131104153714-52cdd189385e25e6302d510931526502', 'ปปป', 'ปป', '10', '15');

-- ----------------------------
-- Table structure for `tb_project_point_result`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_point_result`;
CREATE TABLE `tb_project_point_result` (
  `point_result_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `point_result` varchar(255) default NULL,
  `point_result_unit` varchar(20) default NULL,
  `point_result_target` varchar(10) default NULL,
  PRIMARY KEY  (`point_result_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_point_result
-- ----------------------------
INSERT INTO `tb_project_point_result` VALUES ('20131017230308-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'ผลลัพธ์ดำเนินงาน', 'ครั้ง', '10');

-- ----------------------------
-- Table structure for `tb_project_point_result_progress`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_point_result_progress`;
CREATE TABLE `tb_project_point_result_progress` (
  `point_result_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `point_result` varchar(255) default NULL,
  `point_result_unit` varchar(20) default NULL,
  `point_result_target` varchar(10) default NULL,
  `result` varchar(50) default NULL,
  PRIMARY KEY  (`point_result_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_point_result_progress
-- ----------------------------
INSERT INTO `tb_project_point_result_progress` VALUES ('20131017230308-8bc52acb2cd29860d8e00066610f6eac', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'ผลลัพธ์ดำเนินงาน', 'ครั้ง', '10', null);
INSERT INTO `tb_project_point_result_progress` VALUES ('20131120113422-abcba1381579cc45985ea66d9c894b90', '20131014162128-5e5903e0ca71d60142f1a5647ec64ee6', 'ทดสอบระบบ', 'คน', '50', '');

-- ----------------------------
-- Table structure for `tb_project_problem`
-- ----------------------------
DROP TABLE IF EXISTS `tb_project_problem`;
CREATE TABLE `tb_project_problem` (
  `problem_id` varchar(50) NOT NULL default '',
  `project_id` varchar(50) default NULL,
  `text_problem` text,
  `text_problem_suggestion` text,
  `user_problem_id` varchar(13) default NULL,
  `user_problem` varchar(50) default NULL,
  `date_problem` datetime default NULL,
  PRIMARY KEY  (`problem_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_project_problem
-- ----------------------------

-- ----------------------------
-- Table structure for `tb_sub_dept`
-- ----------------------------
DROP TABLE IF EXISTS `tb_sub_dept`;
CREATE TABLE `tb_sub_dept` (
  `sub_dept_id` varchar(10) NOT NULL default '',
  `dept_id` varchar(10) default NULL,
  `sub_dept_name` varchar(150) default NULL,
  `caller` varchar(50) default NULL,
  `coop_name` varchar(50) default NULL,
  `sub_dept_tel` varchar(30) default NULL,
  `sub_dept_status` int(1) default NULL,
  `last_date` date default NULL,
  `last_time` time default NULL,
  `user_update` int(11) default NULL,
  PRIMARY KEY  (`sub_dept_id`),
  KEY `IX_m_dept_1` (`dept_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tb_sub_dept
-- ----------------------------
INSERT INTO `tb_sub_dept` VALUES ('A001', 'A', 'ฝ่ายบริหารทั่วไป', 'นายประสิทธิ์   ใจกล้า', 'นายประสิทธิ์   ใจกล้า', '1168', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A002', 'A', 'ฝ่ายโภชนาการ', 'นางจิราภรณ์  แสงสุวรรณ', 'นางจิราภรณ์  แสงสุวรรณ', '2267', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A003', 'A', 'งานรักษาความปลอดภัย', 'นายถนอม   โพธิ์พรหม', 'นายถนอม   โพธิ์พรหม', '1112', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A004', 'A', 'งานอาคารสถานที่', 'นายฐากร   ปิติกะวงษ์', 'นายฉัตรชัย  ไมยลาภ', '1105', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A005', 'A', 'กลุ่มงานพัฒนาทรัพยากรบุคคล', 'นายวิมล ใจช่ว่ง', 'นายวิมล ใจช่วง', '1101', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A006', 'A', 'งานพัสดุ', 'นางแววตา  บรรจง', 'นายจิราภิวัฒน์   แสงสุวรรณ', '1162', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A007', 'A', 'งานการเงิน', 'นางสุภาพ รอดชมภู', 'นางสุภาพ รอดชมภู', '1011', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A008', 'A', 'งานยานพาหนะ', 'นายชีวิน  นิ่มนคร', 'นายชีวิน  นิ่มนคร', '1115', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A009', 'A', 'งานห้องผู้อำนวยการ', 'นายประสิทธิ์   ใจกล้า', 'นายประสิทธิ์   ใจกล้า', '1132', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A010', 'A', 'ร้านอาหารสวัสดิการ', 'นายประสิทธิ์   ใจกล้า', 'นายประสิทธิ์   ใจกล้า', '1168', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B001', 'B', 'กลุ่มงานทันตกรรม', 'นายกฤติเดช   สายศิลปี', 'นายกฤติเดช   สายศิลปี', '1127', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B002', 'B', 'กลุ่มงานรังสีวิทยา  X-Ray', 'น.ส.นันทิยา  โรจนพงษ์', 'น.ส.นันทิยา  โรจนพงษ์', '1147', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B003', 'B', 'กลุ่มงานจิตเวช', 'นางจุฑามาศ   วังทะพันธ์', 'นางจุฑามาศ   วังทะพันธ์', '1152', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B004', 'B', 'งานพยาธิวิทยา', 'นายพิชัย   ทองธราดล', 'นายพิชัย   ทองธราดล', '1140', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B005', 'B', 'งานบริการโลหิตวิทยา', 'นางมยุรี   มิลินทจินดา', 'นางมยุรี   มิลินทจินดา', '3015', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B006', 'B', 'งานกายภาพบำบัด', 'นางวรรณพร   ทองปรีชา', 'นางวรรณพร   ทองปรีชา', '1157', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B007', 'B', 'งานกายอุปกรณ์', 'นายอินสอน    จันทร์หลวง', 'นายอินสอน    จันทร์หลวง', '1158', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B008', 'B', 'งานแพทย์แผนไทย', 'นางวีรวรรณ    อ่อนมณี', 'นางวีรวรรณ    อ่อนมณี', '3022', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('B009', 'B', 'องค์กรแพทย์', 'นางสาวสุภาวดี  วังใจ', 'นางสาวสุภาวดี  วังใจ', '1125', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C001', 'C', 'งานสังคมสงเคาะห์', 'นางนันท์วลี   คะนานทอง', 'นางนันท์วลี   คะนานทอง', '1153', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C002', 'C', 'อาชีวเวชกรรม', 'นางสมถวิล   ศรีประดิษฐ์', 'นางสมถวิล   ศรีประดิษฐ์', '1138', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C003', 'C', 'วสค. งานส่งเสริมสุขภาพ', 'นางสาวพันธุมาศ    พูนพานิชย์', 'นางสาวพันธุมาศ    พูนพานิชย์', '2263', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C004', 'C', 'วสค. งานควบคุมโรคติดต่อ', 'นางสาวสกนธ์วรรณ   เติมทานาม', 'นางสาวสกนธ์วรรณ   เติมทานาม', '2264', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C005', 'C', 'วสค. งานบริการสุขภาพชุมชน (PCU)', 'นางมาลี   เลาหวิโรจน์', 'นางมาลี   เลาหวิโรจน์', '2263', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C006', 'C', 'ฝ่ายสุขศึกษาและประชาสัมพันธ์', 'นายไกรลาศ   โกษาแสง', 'นายไกรลาศ   โกษาแสง', '1139', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D001', 'D', 'ฝ่ายการพยาบาล', 'นางพวงทอง  ไชยตา', 'นายนัฐวุฒิ  นันทิยงค์', '4444', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D002', 'D', 'งานตัดเย็บเสื้อผ้า', 'นางสาวทศพร   เรืองสิทธิ์', 'นางสาวทศพร   เรืองสิทธิ์', '1116', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D003', 'D', 'งานซักฟอก', 'นางสุรัตน์   เรือนแก้ว', 'นางสุรัตน์   เรือนแก้ว', '3027', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D004', 'D', 'งานหน่วยจ่ายกลาง', 'นางบัวหอม   ศรีเบ็ญจา', 'นางบัวหอม   ศรีเบ็ญจา', '1137', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D005', 'D', 'งานห้องผ่าตัด', 'นางสาวสหพร   ดีเหมาะ', 'นางสาวสหพร   ดีเหมาะ', '1196', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D006', 'D', 'งานห้องคลอด', 'นางพรศิริ   เสนศิริ', 'นางพรศิริ   เสนศิริ', '1184', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D007', 'D', 'งานวิสัญญีพยาบาล', 'นางสาวพิน   ศิริสวัสดิ์', 'นางสาวพิน   ศิริสวัสดิ์', '1199', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D008', 'D', 'งานหอผู้ป่วยสูติ-นรีเวชกรรม', 'นางลักษณา  ญาตินิยม', 'นางลักษณา  ญาตินิยม', '1185', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D009', 'D', 'งานผู้ป่วยนอก  OPD', 'นางสุจิตรา   สร้อยสุวรรณ', 'นางสุจิตรา   สร้อยสุวรรณ', '1170, 1180', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D010', 'D', 'งานผู้ป่วยอุบัติเหตุและฉุกเฉิน  ER', 'นางกุสุมา   พรหมสวิศาสตร์', 'นางกุสุมา   พรหมสวิศาสตร์', '1198', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D011', 'D', 'งานหน่วยไตเทียม', 'นางกมลรัตน์   เอี่ยมสำราญ', 'นางกมลรัตน์   เอี่ยมสำราญ', '2257', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D012', 'D', 'งานหอผู้ป่วยหนักผู้ใหญ่  (ICU  ผู้ใหญ่)', 'นางสาวสุดใจ   ศรีสงค์', 'นางสาวสุดใจ   ศรีสงค์', '1190', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D013', 'D', 'งานห้องผู้ป่วยหนักเด็ก  (ICU  เด็ก)', 'นางศิริกร   นิ่มนคร', 'นางศิริกร   นิ่มนคร', '1191', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D014', 'D', 'งานหอผู้ป่วยอายุรกรรมชาย', 'นางวราภรณ์   วงษ์ภูธร', 'นางวราภรณ์    วงษ์ภูธร', '1188', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D015', 'D', 'งานหอผู้ป่วยอายุรกรรมหญิง', 'นางนวลตา   โพธิ์สว่าง', 'นางนวลตา   โพธิ์สว่าง', '1189', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D016', 'D', 'งานหอผู้ป่วยศัลยกรรมชาย', 'นางบุญร่วม   ปริปุณณะ', 'นางบุญร่วม    ปริปุณณะ', '1178', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D017', 'D', 'งานหอผู้ป่วยศัลยกรรมหญิง', 'นางพูลสุข    จันทรโคตร', 'นางพูลสุข    จันทรโคตร', '1179', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D018', 'D', 'งานหอผู้ป่วยศัลยกรรมกระดูก', 'นางจันทร์จิรัฐธ์    เสือทอง', 'นางจันทร์จิรัฐธ์    เสือทอง', '1186', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D019', 'D', 'งานหอผู้ป่วยพิเศษ 1', 'นางสาวอรพินท์   สว่าง', 'นางสาวอรพินท์   สว่าง', '1193', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D020', 'D', 'งานหอผู้ป่วยพิเศษ 2', 'นางรัชฎาภรณ์   จันทร์ธานี', 'นางรัชฎาภรณ์   จันทร์ธานี', '1194', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D021', 'D', 'งานหอผู้ป่วยพิเศษ 3', 'นางเพียงเพ็ญ    สร้อยสุวรรณ', 'นางเพียงเพ็ญ    สร้อยสุวรรณ', '2251', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D022', 'D', 'งานหอผู้ป่วยเด็ก  1', 'นางวนิดา   แสนพุก', 'นางวนิดา   แสนพุก', '1181', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D023', 'D', 'งานหอผู้ป่วยเด็ก  2', 'นางพรรณผกา    อุเทศพรรัตนกุล', 'นางพรรณผกา    อุเทศพรรัตนกุล', '1183', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D024', 'D', 'งานหอผู้ป่วย ตา หู คอ จมูก', 'นางวิระพร   อ่อนนิ่ม', 'นางวิระพร    อ่อนนิ่ม', '1187', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D025', 'D', 'งาน  IC', 'นางชูวัฒนา   ชาระ', 'นางชูวัฒนา   ชาระ', '22588', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D026', 'D', 'ศูนย์  CMC', 'นางสาวศิรดา   วิพัทนะพร', 'นางสาวศิรดา   วิพัทนะพร', '3022', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D027', 'D', 'รพ. นครพนมสาขา 1  สวนชมโขง', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D028', 'D', 'รพ. นครพนมสาขา 2  ท้ายเมือง', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E001', 'E', 'ศึกษาอบรม', 'นางสาวศิลปะกร   อาจวิชัย', 'นางสาวศิลปะกร   อาจวิชัย', '1128', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E002', 'E', 'งานเวชนิทัศน์และโสตทัศนศึกษา', 'นายเวชสิทธิ์   เหมะธุลินทร์', 'นายเวชสิทธิ์   เหมะธุลินทร์', '1121', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E003', 'E', 'ห้องบัตร', 'นางพิณทิพย์    ซ้ายกลาง', 'นางพิณทิพย์    ซ้ายกลาง', '1150', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E004', 'E', 'งานเวชระเบียน', 'นางสมศรี   วิริยะพันธ์', 'นางสมศรี    วิริยะพันธ์', '1151', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E005', 'E', 'ศูนย์จัดเก็บรายได้', null, null, '3021', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E006', 'E', 'ศูนย์  HA', 'นางกุสุมา   พรหมสวิศาสตร์', 'นางกุสุมา    พรหมสวิศาสตร์', '2261', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E007', 'E', 'งานห้องสมุด', 'นางขวัญจิตร   อัสการ', 'นางขวัญจิตร   อัสการ', '1120', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E008', 'E', 'ศูนย์คอมพิวเตอร์', 'นายจิตติศักดิ์     สุวัณณกีฎะ', 'นายจิตติศักดิ์     สุวัณณกีฎะ', '2253', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('F001', 'F', 'กลุ่มงานเภสัชกรรม  ห้องจ่ายยา  OPD', 'นายวิชิต   เหล่าวัฒนาถาวร', 'นางสาวศิรานันท์   พลเหี้ยมหาญ', '1131', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('F002', 'F', 'กลุ่มงานเภสัชกรรม  ห้องจ่ายยา   IPD ', 'นายวิชิต   เหล่าวัฒนาถาวร', 'นางสาวศิรานันท์   พลเหี้ยมหาญ', '1133', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('F003', 'F', 'กลุ่มงานเภสัชกรรม  งานผลิดยาน้ำ', 'นายวิบูลย์    อยู่ยงวัฒนา', 'นายวิบูลย์    อยู่ยงวัฒนา', '1134', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('F004', 'F', 'กลุ่มงานเภสัชกรรม  คลังยา - จัดซื้อ', 'นางน้อย   ตันสุวรรณ', 'นางน้อย   ตันสุวรรณ', '1136', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D029', 'D', 'ศูนย์เปล', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D030', 'D', 'EMS', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D031', 'D', 'ทีม PCT สูติกรรม', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D032', 'D', 'ทีม PCT ศัลยกรรม', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D033', 'D', 'ทีม PCT อายุรกรรม', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D034', 'D', 'ทีม PCT กุมารเวชกรรม', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D035', 'D', 'ทีม PCT ศัลยกรรมออร์โธปิดิกส์', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D036', 'D', 'ทีม PCT หู ตา คอ จมูก', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D037', 'D', 'ทีม EQM', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D038', 'D', 'ทีม RM', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D039', 'D', 'ทีม ENV', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D040', 'D', 'ทีม IC', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D041', 'D', 'ทีม IM', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D042', 'D', 'ทีมคณะกรรมการยา PTC', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('C007', 'C', 'วสค.', 'เวชกรรมสังคม', 'เวชกรรมสังคม', null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('D043', 'D', 'ตึกพิเศษสงฆ์อาพาธ', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('E009', 'E', 'พรส.', null, null, null, '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A011', 'A', 'งานตรวจสอบภายในและนิติการ', 'นายประกาศ แสงใส', 'นายประกาศ แสงใส', '1089', '1', null, null, null);
INSERT INTO `tb_sub_dept` VALUES ('A012', 'A', 'กลุ่มงานบัญชี', 'นางสาวลำใย ตางาม', 'นางสาวลำใย ตางาม', '1010', '1', null, null, null);

-- ----------------------------
-- Table structure for `user_admin`
-- ----------------------------
DROP TABLE IF EXISTS `user_admin`;
CREATE TABLE `user_admin` (
  `person_id` varchar(13) NOT NULL default '',
  `user_login` varchar(20) default NULL,
  `pass_login` varchar(20) default NULL,
  `user_name` varchar(50) default NULL,
  PRIMARY KEY  (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_admin
-- ----------------------------
INSERT INTO `user_admin` VALUES ('admin', 'admin', 'admin', 'Administrator');

-- ----------------------------
-- Table structure for `user_group_work`
-- ----------------------------
DROP TABLE IF EXISTS `user_group_work`;
CREATE TABLE `user_group_work` (
  `person_id` varchar(13) NOT NULL default '',
  PRIMARY KEY  (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_group_work
-- ----------------------------
INSERT INTO `user_group_work` VALUES ('1490300009822');

-- ----------------------------
-- Table structure for `user_group_work_detail`
-- ----------------------------
DROP TABLE IF EXISTS `user_group_work_detail`;
CREATE TABLE `user_group_work_detail` (
  `person_id` varchar(13) default NULL,
  `sub_dept_id` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_group_work_detail
-- ----------------------------
INSERT INTO `user_group_work_detail` VALUES ('1490300009822', 'E008');
INSERT INTO `user_group_work_detail` VALUES ('1490300009822', 'E004');
INSERT INTO `user_group_work_detail` VALUES ('1490300009822', 'E003');

-- ----------------------------
-- Table structure for `user_leader1`
-- ----------------------------
DROP TABLE IF EXISTS `user_leader1`;
CREATE TABLE `user_leader1` (
  `person_id` varchar(13) NOT NULL default '',
  `user_login` varchar(20) default NULL,
  `user_pass` varchar(20) default NULL,
  `full_name` varchar(50) default NULL,
  PRIMARY KEY  (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_leader1
-- ----------------------------
INSERT INTO `user_leader1` VALUES ('3330200149972', 'somkid', '10711', 'น.พ.สมคิด สุริยเลิศ');

-- ----------------------------
-- Table structure for `user_leader2`
-- ----------------------------
DROP TABLE IF EXISTS `user_leader2`;
CREATE TABLE `user_leader2` (
  `person_id` varchar(13) NOT NULL default '',
  PRIMARY KEY  (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_leader2
-- ----------------------------
INSERT INTO `user_leader2` VALUES ('3102000171871');
INSERT INTO `user_leader2` VALUES ('3489900157240');

-- ----------------------------
-- Table structure for `user_leader2_detail`
-- ----------------------------
DROP TABLE IF EXISTS `user_leader2_detail`;
CREATE TABLE `user_leader2_detail` (
  `person_id` varchar(13) default NULL,
  `sub_dept_id` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_leader2_detail
-- ----------------------------
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'C005');
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'C004');
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'C003');
INSERT INTO `user_leader2_detail` VALUES ('3102000171871', 'E008');
INSERT INTO `user_leader2_detail` VALUES ('3102000171871', 'E005');
INSERT INTO `user_leader2_detail` VALUES ('3102000171871', 'E004');
INSERT INTO `user_leader2_detail` VALUES ('3102000171871', 'E003');
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'C007');
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'D027');
INSERT INTO `user_leader2_detail` VALUES ('3489900157240', 'D028');
INSERT INTO `user_leader2_detail` VALUES ('3102000171871', 'C001');

-- ----------------------------
-- Table structure for `user_type`
-- ----------------------------
DROP TABLE IF EXISTS `user_type`;
CREATE TABLE `user_type` (
  `user_type_id` int(1) NOT NULL default '0',
  `user_type_name` varchar(20) default NULL,
  `orderby` int(1) default NULL,
  PRIMARY KEY  (`user_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_type
-- ----------------------------
INSERT INTO `user_type` VALUES ('1', 'ผู้ดูแลระบบ', '5');
INSERT INTO `user_type` VALUES ('2', 'ผู้อำนวยการ', '4');
INSERT INTO `user_type` VALUES ('3', 'รองผู้อำนวยการ', '3');
INSERT INTO `user_type` VALUES ('4', 'หัวหน้ากลุ่มงาน', '2');
INSERT INTO `user_type` VALUES ('5', 'หน่วยงาน / ทีม', '1');

-- ----------------------------
-- Table structure for `user_work`
-- ----------------------------
DROP TABLE IF EXISTS `user_work`;
CREATE TABLE `user_work` (
  `person_id` varchar(13) NOT NULL default '',
  PRIMARY KEY  (`person_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_work
-- ----------------------------
INSERT INTO `user_work` VALUES ('');
INSERT INTO `user_work` VALUES ('1490300009822');

-- ----------------------------
-- Table structure for `user_work_detail`
-- ----------------------------
DROP TABLE IF EXISTS `user_work_detail`;
CREATE TABLE `user_work_detail` (
  `person_id` varchar(13) default NULL,
  `sub_dept_id` varchar(10) default NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_work_detail
-- ----------------------------
INSERT INTO `user_work_detail` VALUES ('1490300009822', 'E008');

-- ----------------------------
-- Table structure for `year_budget`
-- ----------------------------
DROP TABLE IF EXISTS `year_budget`;
CREATE TABLE `year_budget` (
  `year_budget_id` int(4) NOT NULL,
  PRIMARY KEY  (`year_budget_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of year_budget
-- ----------------------------
INSERT INTO `year_budget` VALUES ('2556');
INSERT INTO `year_budget` VALUES ('2557');
