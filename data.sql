# Host: localhost  (Version: 5.1.50-community-log)
# Date: 2016-04-27 17:53:56
# Generator: MySQL-Front 5.3  (Build 4.214)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "admin"
#

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `qq` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(100) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "admin"
#

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','21232f297a57a5a743894a0e4a801fc3','13533319825','','xiandean123@163.com','上海','../common/upload_img/20160228110426396.jpg'),(34,'管理员','827ccb0eea8a706c4c34a16891f84e7b','13570381209',NULL,'jia123@163.com','广州','../common/upload_img/20160316072706758.jpg'),(35,'陈欣如','e10adc3949ba59abbe56e057f20f883e','13533312365',NULL,'chenxingru@163.com','广外4栋','../common/upload_img/20160424042157241.jpg'),(36,'闲德安','88eaf412dcd1cf17eee0a7f9bef4ab38','13533319825',NULL,'xiandean@163.com','广外8栋605','../common/upload_img/20160424042433430.jpg');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

#
# Structure for table "announce"
#

DROP TABLE IF EXISTS `announce`;
CREATE TABLE `announce` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `context` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

#
# Data for table "announce"
#

/*!40000 ALTER TABLE `announce` DISABLE KEYS */;
INSERT INTO `announce` VALUES (26,'欢迎使用系统','欢迎各位用户使用本寻物及失物招领系统，如遇任何问题，欢迎留言以及通过页脚联系方式与我们取得联系。','2016-03-16','admin'),(27,'请各位用户注意个人隐私','适当地设置“验证问题”不仅可以帮助您屏蔽不必要的干扰信息，更能帮助您保护您个人的信息安全。','2016-03-16','admin'),(28,'系统管理员志愿者征募','本系统属于校内范围的失物认领招领平台，故而需要征募有兴趣进行后台管理的志愿者进行简单的平台维护。','2016-03-16','admin'),(29,'公益捐赠','考虑到有些失物长时间无人认领，我们现在征求大家对于是否举行线下认领大会的意见，请大家在留言板留下你的意见。','2016-03-16','admin'),(30,'公益之行','为增进平台用户间的联系，我们考虑在近期举办相关的线下系列活动，请大家密切关注本站信息更新。','2016-03-16','admin');
/*!40000 ALTER TABLE `announce` ENABLE KEYS */;

#
# Structure for table "class"
#

DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

#
# Data for table "class"
#

/*!40000 ALTER TABLE `class` DISABLE KEYS */;
INSERT INTO `class` VALUES (1,'证件'),(2,'电子产品'),(3,'书籍'),(4,'衣服'),(5,'箱包'),(6,'宠物'),(7,'其他');
/*!40000 ALTER TABLE `class` ENABLE KEYS */;

#
# Structure for table "found"
#

DROP TABLE IF EXISTS `found`;
CREATE TABLE `found` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) NOT NULL DEFAULT '',
  `l_class` int(11) DEFAULT NULL,
  `l_feature` varchar(255) DEFAULT NULL,
  `l_desc` varchar(255) DEFAULT NULL,
  `l_img` varchar(100) DEFAULT NULL,
  `l_place` varchar(100) DEFAULT NULL,
  `l_date` date DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `u_phone` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `ct_state` int(1) unsigned zerofill NOT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=213 DEFAULT CHARSET=utf8;

#
# Data for table "found"
#

/*!40000 ALTER TABLE `found` DISABLE KEYS */;
INSERT INTO `found` VALUES (187,'运动水壶',7,'铁灰色 不锈钢水壶','拾获如图铁灰色不锈钢水壶，请失主前来认领。','../common/upload_img/20160424020511606.jpg','图书馆','2016-03-01',58,'xiandean','13255521225','1528816513@qq.com','广州',1,'2016-04-25'),(188,'移动硬盘',2,'Seagate，1T，有黑色同样大小布包装','在3月9日南校小模法实验楼A302捡到，请失物主人来认领。','../common/upload_img/20160424033030296.jpg','南校小模法实验楼A302','2016-03-09',62,'李李','13318057618','lili123@163.com','广州',1,'2016-04-24'),(190,'钱包',5,'黑色长款','本人在广州宜家捡到一个钱包，里面包括一张身份证，平安银行卡，民生银行卡，中信银行卡和60块钱，失主看见了请联系我。','../common/upload_img/20160316112404772.jpg','广州宜家','2016-03-02',66,'郑郑','13540381290','zhenzhen123@163.com','广州',1,'2016-04-25'),(191,'黄色博美',6,'黄色 雄性','黄村地铁站附近捡到黄色博美一只，公狗,应该已经成年，请看到消息的主人尽快与我联系，带它回家','../common/upload_img/20160424033622697.jpg','地铁黄村站','2016-03-07',68,'王王','13370381290','wangwang123@163.com','广州',1,'2016-04-25'),(192,'钥匙',7,'奔驰车钥匙','驾驶员是2015年12月30日交回公司的，车辆自编号00134.失主请到单位认领。','../common/upload_img/20160424032546106.jpg','出租车','2015-12-30',70,'无名氏','13418057617','longlong@163.com','广州',0,'2016-04-24'),(194,'汽车钥匙',7,'大众，小布熊钥匙链','2015年12月15日晚上在大学城附近捡到一把大众汽车的钥匙，钥匙链上是一只可爱的小布熊。','../common/upload_img/20160424032719175.jpg','大学城','2015-12-15',71,'bobo','13670381290','bobo123@qq.com','广州',0,'2016-04-24'),(196,'学生证',1,'经济学院 陈卫武','拾获中传一同学的学生证，请物主前来认领。','../common/upload_img/20160424022042403.jpg','','2016-03-01',74,'叔叔','13870381290','shushu123@qq.com','广州',1,'2016-04-24'),(198,'校园卡',1,'机械学院王帆','好心人于B区二综捡到机械学院王帆同学校园卡，学号20132188，请这位同学到B二1305教室领取。','../common/upload_img/20160316023621847.jpg','B区二综','2016-02-24',78,'伯仲叔季','18815703822','bozhongshuji@qq.com','广州',0,'2016-03-16'),(199,'身份证',1,'北京户籍','捡到北京户籍身份证一张，请失主来认领。','../common/upload_img/20160316024054330.jpg','','2016-03-02',79,'sister','13550381200','sister123@163.com','广州',0,'2016-03-16'),(200,'联想电脑',2,'白色联想电脑 1t硬盘','丢失白色联想电脑一台，1t硬盘一个。','../common/upload_img/20160316030016131.jpg','广外操场','2016-03-16',82,'陈仲','13534579054','chenzhong@qq.com','广州',1,'2016-04-20'),(201,'小阳伞',7,'折叠式 伞柄水晶装饰','在贝岗街边水果摊上拿错了，请物主联系取回吧。','../common/upload_img/20160424032344697.jpg','贝岗村大街','2016-01-20',88,'杨绛','13545678945','yangjiang@163.com','广州',0,'2016-04-24'),(202,'鸭舌帽',4,'恐龙图纹，深蓝色','放在图书馆桌面上，一转身回来就不见了，不知道谁拿错还是收走了，还是希望知道的人提供线索或是能够联系我。','../common/upload_img/20160316052308924.jpg','广外图书馆','2016-03-15',93,'孝庄皇后','13546578008','xiaozhuang@163.com','广州',0,'2016-04-25'),(204,'公务员教材',3,'一套公务员培训资料，包括申论和行测题库','在教学楼A座上课时捡到一套公务员考试教材，应该是哪个粗心的师兄或是师姐忘在课室的，还望失主来领回去啊，整套教材还蛮贵的。','../common/upload_img/20160316065253692.jpg','教学楼A座','2016-03-15',98,'郭靖','13543897656','guojin123@163.com','广州',1,'2016-04-24'),(208,'行李箱',5,'黑色，20寸','本人在广外的公交站旁边捡到了一个行李箱，行李箱都能丢了，真是太笨了吧，失主看到的话赶快啦！','../common/upload_img/20160425112258352.jpg','广外站','2016-04-18',57,'闲德安','13533316523','xiandean123@163.com','广外8栋605',1,'2016-04-25'),(209,'笔记本',3,'黑色牛皮，四角有破损','本人在教学楼b205捡到了一个黑色的笔记本，本子比较破旧，里面都是一些经济、金融的笔记，感觉对失主比较重要，请失主快快认领。','../common/upload_img/20160425113349891.jpg','教学楼b205','2016-04-01',57,'闲德安','13533316523','xiandean123@163.com','广外8栋605',0,'2016-04-25'),(210,'手链',7,'陶瓷，彩色色块','本人在生活区的校道上捡到的，挺精致、挺漂亮的，应该有什么特殊意义的吧，谁丢了的快来认领啦！！！','../common/upload_img/20160425114245223.jpg','生活区校道','2016-04-19',58,'xiandean','13255521225','1528816513@qq.com','广州',1,'2016-04-25'),(211,'鼠标',2,'苹果，白色','本人在图书馆5楼的计算机上网时发现的，应该是有人上完网后忘记拔了，请有丢失鼠标的同学都过来看一下是不是你们的哦。','../common/upload_img/20160425022534631.jpg','图书馆5楼','2016-04-11',105,'陈欣如','13533324572','chenxinru@163.com','广外4栋',1,'2016-04-25'),(212,'计算器',2,'灰色，普通','本人在教学楼a栋教室上捡到的，应该是有同学忘拿了的，快来认领啦。','../common/upload_img/20160427040339711.jpg','教学楼a栋','2016-04-20',63,'周周','13318067617','zhouzhou123@163.com','广州',1,'2016-04-20'),(213,'sony相机',2,'黑色，新型','本人坐公交时在椅子底下看到的，应该是有同学在坐公交时把相机落在公交车上了，丢失的同学快认领啦！','../common/upload_img/20160427040922558.jpg','公交车','2016-04-27',63,'周周','13318067617','zhouzhou123@163.com','广州',1,'2016-04-20'),(214,'三星手机',2,'三星note1，黑色','本人在图书馆捡到的，请认领','../common/upload_img/20160427041547947.jpg','图书馆','2016-04-26',81,'陈波','18834896570','chenbo123@163.com','广州',1,'2016-04-20'),(215,'小猫',6,'咖啡色，黄白相间','晚上在校道的草坪上看到的，好像有点受伤了，好可怜，主人快来认领啦','../common/upload_img/20160427041958500.png','宿舍外校道','2016-04-24',81,'陈波','18834896570','chenbo123@163.com','广州',0,'2016-04-20'),(216,'眼镜',7,'紫色，全方框','在教学楼b幢205教室捡到的，丢失的同学来认领！！','../common/upload_img/20160427042400839.jpg','教学楼b205','2016-04-26',81,'陈波','18834896570','chenbo123@163.com','广州',0,'2016-04-20'),(217,'帽子',4,'黄色，草帽，黑白带子','本人在操场上捡到的，请丢了帽子的同学看看是不是你们的。','../common/upload_img/20160427042710404.jpg','操场','2016-04-20',81,'陈波','18834896570','chenbo123@163.com','广州',0,'2016-04-20'),(218,'笔记本',3,'花纹，数学笔记','本人在图书馆2楼的桌子上捡到的，请认领','../common/upload_img/20160427042909140.jpg','图书馆2楼','2016-04-27',81,'陈波','18834896570','chenbo123@163.com','广州',0,'2016-04-20'),(219,'外套',4,'黑色，帽子，卫衣','本人在公交上捡到的，应该是有同学落下了','../common/upload_img/20160427043159667.jpg','公交车','2016-04-20',81,'陈波','18834896570','chenbo123@163.com','广州',1,'2016-04-20'),(220,'连衣裙',4,'女式，花纹，轻纱','本人在宿舍楼下的校道旁捡到的，应该是被风吹掉的。','../common/upload_img/20160427043422112.jpg','校道','2016-04-20',81,'陈波','18834896570','chenbo123@163.com','广州',0,'2016-04-20'),(222,'u盘',2,'金仁顿，32g','本人在实验楼c幢上课时看到电脑上插着这个u盘，应该是有同学忘记拔了，请该同学快点来认领啦。','../common/upload_img/20160427054432242.jpg','实验楼c幢','2016-04-28',57,'闲德安','13533316523','xiandean123@163.com','广外8栋605',1,'2016-04-20');
/*!40000 ALTER TABLE `found` ENABLE KEYS */;

#
# Structure for table "jianyi"
#

DROP TABLE IF EXISTS `jianyi`;
CREATE TABLE `jianyi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(11) DEFAULT '',
  `content` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

#
# Data for table "jianyi"
#

/*!40000 ALTER TABLE `jianyi` DISABLE KEYS */;
INSERT INTO `jianyi` VALUES (13,'王安忆','一上来就看到有人在找我捡到的书，连发布启事都省了，不错不错。','2016-03-16'),(14,'斯皮尔伯格','推送很迅速，果然是个好网站嘿嘿嘿','2016-03-16');
/*!40000 ALTER TABLE `jianyi` ENABLE KEYS */;

#
# Structure for table "lost"
#

DROP TABLE IF EXISTS `lost`;
CREATE TABLE `lost` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) NOT NULL DEFAULT '',
  `l_class` int(11) DEFAULT NULL,
  `l_feature` varchar(255) DEFAULT NULL,
  `l_desc` varchar(255) DEFAULT NULL,
  `l_img` varchar(100) DEFAULT NULL,
  `l_place` varchar(100) DEFAULT NULL,
  `l_date` date DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `u_name` varchar(100) DEFAULT NULL,
  `u_phone` varchar(100) DEFAULT NULL,
  `u_email` varchar(100) DEFAULT NULL,
  `u_address` varchar(100) DEFAULT NULL,
  `ct_state` int(1) unsigned zerofill NOT NULL,
  `p_date` date DEFAULT NULL,
  PRIMARY KEY (`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=338 DEFAULT CHARSET=utf8;

#
# Data for table "lost"
#

/*!40000 ALTER TABLE `lost` DISABLE KEYS */;
INSERT INTO `lost` VALUES (316,'背包',5,'黄色斜肩','凌晨2:20左右在广州天河北广州大道交汇处，接到代驾客人（私单），行驶不到500米客人议价没达成交易，下车时忘记拿后座上的包。','../common/upload_img/20160424033304440.jpg','天河北广州大道交叉路口','2016-03-02',61,'孙孙','13357038129','sunsun123@163.com','广州',0,'2016-04-25'),(317,'lumia手机',2,'已破损的微软lumia640','手机是在二月二十四号凌晨丢失的 机器已经很旧 被我摔得差不多了 现在新机价格 六百元左右 但是内有我重要的照片什么的 还希望捡到的人联系我 我愿以新机一台或现金600酬谢','../common/upload_img/20160316105717754.jpg','学校','2016-02-24',63,'周周','13318067617','zhouzhou123@163.com','广州',0,'2016-04-24'),(318,'黑色钱包',5,'长款 黑色 皮革','本人去宜家购物时遗失钱包一个，请有捡到的人联系我。','../common/upload_img/20160424034825828.jpg','广州宜家','2016-03-01',67,'郑正','13338057617','zhengzheng@163.com','广州',0,'2016-04-24'),(319,'贵宾犬',6,'肩高27cm，体重六斤左右，全身奶油色，身穿灰色外衣','2月29日早上9:00左右丢失贵宾犬一只，肩高27cm，体重六斤左右，全身奶油色，身穿灰色外衣，主人正在找他回家。','../common/upload_img/20160316025015630.jpg','学校宿舍','2016-03-16',80,'陈伯','18835702356','chenbo@163.com','广州',1,'2016-03-16'),(320,'耳机',2,'黑色布袋 iPhone耳机','黑色布袋一个 iPhone耳机一个白色的 搭19路公交车时丢的','../common/upload_img/20160316031226798.jpg','19路公交车','2016-02-23',83,'陈叔','18818057756','chenshu@qq.com','广州',0,'2016-03-16'),(321,'书',3,'数字电路、模拟电路教材，中南大学出版社','在广外西路或贝岗大街新天地段附近遗失书一包，其中有数字电路、模拟电路，中南大学出版社出版，很重要，希望捡到的人联系我或提供线索，谢谢。','../common/upload_img/20160424034120164.jpg','广外西路或贝岗大街新天地段','2016-03-08',84,'陈季','13313045764','chengji@qq.com','广州',1,'2016-04-24'),(322,'书包',5,'佳能数码的运动包','2016年3月4号晚上7点15左右我从体育西打​‌‌车到林和中，下车时拿行李忘记了背包，还望有线索的人联系我。','../common/upload_img/20160424035014252.jpg','出租车','2016-03-04',86,'张恨水','13546578937','zhanghenshui@163.com','广州',1,'2016-04-24'),(323,'雨伞',7,'折叠式 有颗红色水晶','贝岗商业街边的水果摊上不知道谁拿错了，对我挺重要的，还希望拿错的人联系我。','../common/upload_img/20160316040015766.jpg','贝岗商业街','2016-01-20',87,'钱钟书','18813057617','qianzhongshu@163.com','广州',0,'2016-04-24'),(324,'驾驶证',1,'驾驶证及行驶证','本人上午从春江花月小区至华岩龙门阵广场，乘坐413和482路公交车，不慎遗失驾驶证及行驶证。','../common/upload_img/20160424033407760.jpg','413和482路公交车','2016-03-02',89,'张爱玲','13545678934','zhangailing@qq.com','广州',1,'2016-04-24'),(325,'山地车',7,'红黑色，30速.双碟刹.前减震，威廉705车架','于2015.11.15丢失于贝岗村网吧门口，这辆自行车陪了我两年了，很有感情，望找到者速与我联系。','../common/upload_img/20160424034929695.jpg','贝岗村网吧门口','2015-11-15',91,'斯皮尔伯格','18814657489','sipierboge@qq.com','广州',1,'2016-04-21'),(326,'外套',4,'黑色兜帽卫衣 英文logo','在操场时被人拿错黑色兜帽卫衣一件，胸前英文logo，请拾到的人还给我。','../common/upload_img/20160424035314456.jpg','广外操场','2016-03-15',92,'多尔衮','13315897657','duoergun@qq.com','广州',1,'2016-04-24'),(327,'港澳通行证',1,'最新卡式港澳通行证','平时放在钱包里，最近一次去超市还看到，回来就找不着了，可能在超市丢了，希望有线索的人联系我，感谢感谢。','../common/upload_img/20160316052940389.jpg','广外超市','2016-03-16',94,'沈从文','13545768766','shencongwen@qq.com','广州',1,'2016-03-16'),(328,'雨衣',4,'女士 花纹雨衣','在宿舍楼丢失一件如图花纹雨衣还希望有线索或捡到的人联系我。','../common/upload_img/20160424035432587.jpg','广外生活区','2016-03-15',100,'老顽童','13545454567','laowantong@qq.com','广州',0,'2016-04-22'),(330,'水壶',7,'蓝色的','丢失了蓝色水壶。','../common/upload_img/20160424020008279.jpg','图书馆','2016-03-01',57,'闲德安','13533316523','xiandean123@163.com','广外8栋605',0,'2016-04-24'),(331,'钱包',5,'史迪仔，长款，蓝色','在太古汇附近丢失蓝色零钱包一枚，内有两张工行银行卡。形状如图','../common/upload_img/20160425105524694.jpg','太古汇附近','2016-03-01',59,'赵赵','13570381291','zhaozhao123@163.com','广州大学城广外4栋',0,'2016-04-25'),(332,'篮球',7,'红色，slam','在操场上捡到一个篮球，请认领。','../common/upload_img/20160425110051369.jpg','操场','2016-04-11',60,'钱钱','13570381291','qianqian123@163.com','广州大学城',0,'2016-04-25'),(333,'眼镜',7,'大黑框','本人在1饭吃饭时落下的一副眼镜，如果有人捡到的话后联系我，非常感谢。','../common/upload_img/20160425111157251.jpg','1饭','2016-04-01',61,'孙孙','13357038129','sunsun123@163.com','广州',0,'2016-04-25'),(334,'钢笔',3,'灰色，精致，英雄牌子','本人在图书馆自习时，把该钢笔放在桌面上，临走时忘记拿了，发现后回去找时已经找不到了，望有心人捡到的话还给我，无限感谢！！！','../common/upload_img/20160425110854713.jpg','图书馆','2016-04-10',62,'李李','13318057618','lili123@163.com','广州',0,'2016-04-25'),(335,'雨伞',7,'黑色，大，棕色伞柄','本人在a栋上完课后，忘记拿我的雨伞了，之后回去发现已经不在那了，有没有是拿错了的，请还给我吧。','../common/upload_img/20160425111345986.jpg','教学楼A栋','2016-04-05',63,'周周','13318067617','zhouzhou123@163.com','广州',0,'2016-04-25'),(336,'水杯',7,'深灰色，黑色盖子','本人在篮球场打球时放在旁边，打完球后忘记拿了，之后就发现不见了。好可怜哦，我心爱的杯子','../common/upload_img/20160425111744355.jpg','篮球场','2016-04-12',57,'闲德安','13533316523','xiandean123@163.com','广外8栋605',0,'2016-04-25'),(337,'咖啡猫',6,'黄色，小猫','本小猫离家出走！本人宿舍在8栋604，小猫于4月10日离开宿舍后就再也没回来了，望有心人看到的给我提供一下线索，或捡到的可以还给我！','../common/upload_img/20160427033905326.jpg','8栋604','2016-04-10',108,'李长兴','13566651234','lichangxing@163.com','广外8栋604',0,'2016-04-10'),(338,'iphone6s手机',2,'金色，64g，裸机','本人在饭堂吃完饭回到宿舍后发现心爱的手机不见了，应该是吃饭时从裤袋里掉出来了，归还必定重重感谢！！！！','../common/upload_img/20160427034548897.jpg','3饭1楼','2016-04-01',108,'李长兴','13566651234','lichangxing@163.com','广外8栋604',0,'2016-04-10'),(339,'小猫',6,'灰白相间，小','本人的小猫走出宿舍后，走丢了，有心人看到的提供点线索吧，帮帮忙吧！！','../common/upload_img/20160427035125214.jpg','北苑4栋','2016-04-02',64,'吴吴','13317057617','wuwu123@163.com','广州',0,'2016-04-01'),(340,'校园卡',1,'破旧','本人在1饭丢的饭卡，请捡到的同学可以还给我。','../common/upload_img/20160427035715131.jpg','1饭','2016-04-02',64,'吴吴','13317057617','wuwu123@163.com','广州',1,'2016-04-02'),(341,'校园卡',1,'破旧，学号20120401562','本人在1饭2楼丢失了校园卡，学号是20120401562，请捡到我的校卡的同学见到可以还给我，谢谢。','../common/upload_img/20160427053938260.jpg','1饭2楼','2016-04-28',105,'陈欣如','13533324572','chenxinru@163.com','广外4栋',1,'2016-04-20');
/*!40000 ALTER TABLE `lost` ENABLE KEYS */;

#
# Structure for table "pull"
#

DROP TABLE IF EXISTS `pull`;
CREATE TABLE `pull` (
  `pull_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `l_type` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `similar` float DEFAULT NULL,
  PRIMARY KEY (`pull_id`)
) ENGINE=MyISAM AUTO_INCREMENT=978 DEFAULT CHARSET=utf8;

#
# Data for table "pull"
#

/*!40000 ALTER TABLE `pull` DISABLE KEYS */;
INSERT INTO `pull` VALUES (960,190,318,1,0,85.5),(961,318,190,0,0,85.5),(962,323,201,0,1,67),(963,201,323,1,0,67),(968,187,330,1,1,100),(969,330,187,0,0,100),(970,190,331,1,1,65.5),(971,331,190,0,0,65.5),(972,320,213,0,1,61.6667),(973,213,320,1,0,61.6667),(974,339,215,0,1,60.3571),(975,215,339,1,0,60.3571),(976,326,219,0,0,63.9286),(977,219,326,1,0,63.9286);
/*!40000 ALTER TABLE `pull` ENABLE KEYS */;

#
# Structure for table "q_manage"
#

DROP TABLE IF EXISTS `q_manage`;
CREATE TABLE `q_manage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `q_id` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `u_answer` varchar(255) DEFAULT NULL,
  `a_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8;

#
# Data for table "q_manage"
#

/*!40000 ALTER TABLE `q_manage` DISABLE KEYS */;
INSERT INTO `q_manage` VALUES (101,205,60,NULL,2),(107,211,75,'200120401547',0),(109,214,81,'左耳',0),(110,215,85,'陈四',0),(111,217,90,'张爱玲',0),(121,204,63,'黑色绿色',0),(122,205,58,NULL,3),(123,223,58,'1111',1),(125,253,105,NULL,1),(126,254,105,NULL,1);
/*!40000 ALTER TABLE `q_manage` ENABLE KEYS */;

#
# Structure for table "renling"
#

DROP TABLE IF EXISTS `renling`;
CREATE TABLE `renling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(100) DEFAULT NULL,
  `l_type` int(11) DEFAULT NULL,
  `l_img` varchar(255) DEFAULT NULL,
  `l_feature` varchar(255) DEFAULT NULL,
  `rl_uid` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `rl_date` date DEFAULT NULL,
  `check_state` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

#
# Data for table "renling"
#

/*!40000 ALTER TABLE `renling` DISABLE KEYS */;
INSERT INTO `renling` VALUES (40,'校园卡',0,'../common/upload_img/20160316095059666.jpg','广外法学院连蔚',58,57,'2016-03-16',1),(41,'羊城通',0,'../common/upload_img/20160316110947349.jpg','柯南贴图',65,64,'2016-03-16',0),(42,'u盘',0,'','北京数字北京认证有限公司',71,69,'2016-03-16',1),(43,'不锈钢水壶',0,'../common/upload_img/20160316020303338.jpg','不锈钢',73,72,'2016-03-16',1),(44,'钱包',0,'../common/upload_img/20160316022433975.jpg','6百多元钱 多个证件',77,76,'2016-03-16',1),(45,'雨伞',0,'../common/upload_img/20160316053935812.jpg','橘红色 长柄 ',97,96,'2016-03-16',1),(46,'手机',1,'../common/upload_img/20160316071046132.jpg','iPhone 金色',102,101,'2016-03-16',1),(47,'水杯',0,'../common/upload_img/20160412034403345.jpg','蓝色，不锈钢',58,57,'2016-04-12',1);
/*!40000 ALTER TABLE `renling` ENABLE KEYS */;

#
# Structure for table "result"
#

DROP TABLE IF EXISTS `result`;
CREATE TABLE `result` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_id` int(11) DEFAULT NULL,
  `l_type` int(11) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL COMMENT '认领者id',
  `state` int(11) DEFAULT NULL COMMENT '认领状态',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=106 DEFAULT CHARSET=utf8;

#
# Data for table "result"
#

/*!40000 ALTER TABLE `result` DISABLE KEYS */;
INSERT INTO `result` VALUES (84,187,0,63,1),(86,192,0,69,1),(90,196,0,75,1),(92,319,1,81,1),(93,321,1,85,1),(94,323,1,88,1),(95,324,1,90,1),(96,200,0,92,1),(97,326,1,93,1);
/*!40000 ALTER TABLE `result` ENABLE KEYS */;

#
# Structure for table "thanks"
#

DROP TABLE IF EXISTS `thanks`;
CREATE TABLE `thanks` (
  `t_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `context` varchar(255) DEFAULT NULL,
  `u_name` varchar(255) DEFAULT NULL,
  `p_date` date DEFAULT NULL,
  `checked` int(1) DEFAULT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

#
# Data for table "thanks"
#

/*!40000 ALTER TABLE `thanks` DISABLE KEYS */;
INSERT INTO `thanks` VALUES (25,'谢谢拾到校园卡的闲同学','非常感谢拾到校园卡的闲同学把校园卡还给我！','xiandean','2016-03-16',1),(26,'谢谢热心网友帮我寻回公司物品','之前不慎丢失了公司配发的U盘，多亏网站用户帮助才这么快就找了回来。','bobo','2016-03-16',1),(27,'终于找回水壶','一对有意义的纪念水壶，托网友仲仲的福找了回来！','种种','2016-03-16',1),(28,'神奇地找回全副钱包证件','多谢名为“季季”的用户，帮我找回了全套的钱包证件，就连现金也一分不少。','季赢','2016-03-16',1),(29,'马大哈的伞竟然还能找回来哈哈哈','多谢热心的小龙女，马大哈如我还能找回自己随手忘掉的雨伞。','杨过','2016-03-16',1),(30,'我的肾6','本来以为是找不回来了，没想到最后竟然还真找回来了，多谢“鸣凤”！','孔乙己','2016-03-16',1),(31,'我的钱包回来了','非常感谢赵同学帮我找回了我心爱的钱包','哈哈','2016-03-16',1);
/*!40000 ALTER TABLE `thanks` ENABLE KEYS */;

#
# Structure for table "user"
#

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(20) NOT NULL DEFAULT '' COMMENT '手机号',
  `qq` varchar(20) DEFAULT NULL,
  `email` varchar(100) NOT NULL DEFAULT '',
  `address` varchar(255) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;

#
# Data for table "user"
#

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (57,'闲德安','88eaf412dcd1cf17eee0a7f9bef4ab38','13533316523',NULL,'xiandean123@163.com','广外8栋605','../common/upload_img/20160316094830402.jpg'),(58,'xiandean','88eaf412dcd1cf17eee0a7f9bef4ab38','13255521225',NULL,'1528816513@qq.com','广州','../common/upload_img/20160316095326289.jpg'),(59,'赵赵','827ccb0eea8a706c4c34a16891f84e7b','13570381291',NULL,'zhaozhao123@163.com','','../common/upload_img/20160316101901274.jpg'),(60,'钱钱','827ccb0eea8a706c4c34a16891f84e7b','13570381291',NULL,'qianqian123@163.com','广州大学城','../common/upload_img/20160316102452729.jpg'),(61,'孙孙','827ccb0eea8a706c4c34a16891f84e7b','13357038129',NULL,'sunsun123@163.com','广州','../common/upload_img/20160316102932464.jpg'),(62,'李李','827ccb0eea8a706c4c34a16891f84e7b','13318057618',NULL,'lili123@163.com','广州','../common/upload_img/20160316104241977.jpg'),(63,'周周','827ccb0eea8a706c4c34a16891f84e7b','13318067617',NULL,'zhouzhou123@163.com','广州','../common/upload_img/20160316105238900.jpg'),(64,'吴吴','827ccb0eea8a706c4c34a16891f84e7b','13317057617',NULL,'wuwu123@163.com','广州','../common/upload_img/20160316110542771.jpg'),(65,'吴五','827ccb0eea8a706c4c34a16891f84e7b','13318057617',NULL,'wuwu12345@163.com','广州','../common/upload_img/20160316111138620.jpg'),(66,'郑郑','827ccb0eea8a706c4c34a16891f84e7b','13540381290',NULL,'zhenzhen123@163.com','广州','../common/upload_img/20160316112142624.jpg'),(67,'郑正','827ccb0eea8a706c4c34a16891f84e7b','13338057617',NULL,'zhengzheng@163.com','广州','../common/upload_img/20160316112548605.jpg'),(69,'伯伯','827ccb0eea8a706c4c34a16891f84e7b','13318047617',NULL,'bobo123@163.com','广州','../common/upload_img/20160316113819559.jpg'),(70,'无名氏','827ccb0eea8a706c4c34a16891f84e7b','13418057617',NULL,'longlong@163.com','广州','../common/upload_img/20160316012746121.jpg'),(71,'bobo','827ccb0eea8a706c4c34a16891f84e7b','13670381290',NULL,'bobo123@qq.com','广州','../common/upload_img/20160316013652491.jpg'),(72,'仲仲','827ccb0eea8a706c4c34a16891f84e7b','13670381290',NULL,'zhongzhong123@163.com','广州','../common/upload_img/20160316020129840.jpg'),(73,'种种','827ccb0eea8a706c4c34a16891f84e7b','13316057617',NULL,'zhongzhong111@qq.com','广州','../common/upload_img/20160316020511274.jpg'),(74,'叔叔','827ccb0eea8a706c4c34a16891f84e7b','13870381290',NULL,'shushu123@qq.com','广州','../common/upload_img/20160316021256907.jpg'),(75,'蜀黍','827ccb0eea8a706c4c34a16891f84e7b','13570381299',NULL,'shushuh@qq.com','广州','../common/upload_img/20160316021617445.jpg'),(76,'季季','827ccb0eea8a706c4c34a16891f84e7b','15560381290',NULL,'jijij@qq.com','广州','../common/upload_img/20160316022155474.jpg'),(77,'季赢','827ccb0eea8a706c4c34a16891f84e7b','18870381290',NULL,'jiying@qq.com','广州','../common/upload_img/20160316022619301.jpg'),(78,'伯仲叔季','827ccb0eea8a706c4c34a16891f84e7b','18815703822',NULL,'bozhongshuji@qq.com','广州','../common/upload_img/20160316023411647.jpg'),(79,'sister','827ccb0eea8a706c4c34a16891f84e7b','13550381200',NULL,'sister123@163.com','广州','../common/upload_img/20160316023825571.jpg'),(80,'陈伯','827ccb0eea8a706c4c34a16891f84e7b','18835702356',NULL,'chenbo@163.com','广州','../common/upload_img/20160316024557164.jpg'),(81,'陈波','827ccb0eea8a706c4c34a16891f84e7b','18834896570',NULL,'chenbo123@163.com','广州','../common/upload_img/20160316025243822.jpg'),(82,'陈仲','827ccb0eea8a706c4c34a16891f84e7b','13534579054',NULL,'chenzhong@qq.com','广州','../common/upload_img/20160316025504141.jpg'),(83,'陈叔','827ccb0eea8a706c4c34a16891f84e7b','18818057756',NULL,'chenshu@qq.com','广州','../common/upload_img/20160316030804727.png'),(84,'陈季','827ccb0eea8a706c4c34a16891f84e7b','13313045764',NULL,'chengji@qq.com','广州','../common/upload_img/20160316032245485.jpg'),(85,'王安忆','827ccb0eea8a706c4c34a16891f84e7b','18815543678',NULL,'wanganyi@163.com','广州','../common/upload_img/20160316033117959.jpg'),(86,'张恨水','827ccb0eea8a706c4c34a16891f84e7b','13546578937',NULL,'zhanghenshui@163.com','广州','../common/upload_img/20160316035059688.jpg'),(87,'钱钟书','827ccb0eea8a706c4c34a16891f84e7b','18813057617',NULL,'qianzhongshu@163.com','广州','../common/upload_img/20160316035727611.jpg'),(88,'杨绛','827ccb0eea8a706c4c34a16891f84e7b','13545678945',NULL,'yangjiang@163.com','广州','../common/upload_img/20160316040131832.jpg'),(89,'张爱玲','827ccb0eea8a706c4c34a16891f84e7b','13545678934',NULL,'zhangailing@qq.com','广州','../common/upload_img/20160316040548749.jpg'),(90,'胡兰成','827ccb0eea8a706c4c34a16891f84e7b','13546578765',NULL,'hulanchen@qq.com','广州','../common/upload_img/20160316041319351.jpg'),(91,'斯皮尔伯格','827ccb0eea8a706c4c34a16891f84e7b','18814657489',NULL,'sipierboge@qq.com','广州','../common/upload_img/20160316041707806.jpg'),(92,'多尔衮','827ccb0eea8a706c4c34a16891f84e7b','13315897657',NULL,'duoergun@qq.com','广州','../common/upload_img/20160316043948994.jpg'),(93,'孝庄皇后','827ccb0eea8a706c4c34a16891f84e7b','13546578008',NULL,'xiaozhuang@163.com','广州','../common/upload_img/20160316050924557.jpg'),(94,'沈从文','827ccb0eea8a706c4c34a16891f84e7b','13545768766',NULL,'shencongwen@qq.com','广州','../common/upload_img/20160316052532237.jpg'),(95,'丁香姑姑','827ccb0eea8a706c4c34a16891f84e7b','13545677656',NULL,'dingxianggugu@qq.com','广州','../common/upload_img/20160316053112503.jpg'),(96,'小龙女','827ccb0eea8a706c4c34a16891f84e7b','13545556786',NULL,'xiaolongnv@qq.com','广州','../common/upload_img/20160316053433460.jpg'),(97,'杨过','827ccb0eea8a706c4c34a16891f84e7b','13567584657',NULL,'yangguo@qq.com','广州','../common/upload_img/20160316054403793.jpg'),(98,'郭靖','827ccb0eea8a706c4c34a16891f84e7b','13543897656',NULL,'guojin123@163.com','广州','../common/upload_img/20160316063140377.jpg'),(99,'黄蓉','827ccb0eea8a706c4c34a16891f84e7b','18823546756',NULL,'huangrong@163.com','广州','../common/upload_img/20160316065625574.jpg'),(100,'老顽童','81dc9bdb52d04dc20036dbd8313ed055','13545454567',NULL,'laowantong@qq.com','广州','../common/upload_img/20160316070053191.jpg'),(101,'孔乙己','827ccb0eea8a706c4c34a16891f84e7b','13316567546',NULL,'kongyiji@qq.com','广州','../common/upload_img/20160316070753468.jpg'),(102,'鸣凤','827ccb0eea8a706c4c34a16891f84e7b','13545467867',NULL,'mingfeng@qq.com','广州','../common/upload_img/20160316071138349.jpg'),(103,'xian','88eaf412dcd1cf17eee0a7f9bef4ab38','13533319825',NULL,'xiandean123@163.com','605','../common/upload_img/20160321091748305.jpg'),(104,'xiande','1807215e72492dd5fa118a6c6f620af0','13533319825',NULL,'sdfe@163.com','yyaid5',''),(105,'陈欣如','827ccb0eea8a706c4c34a16891f84e7b','13533324572',NULL,'chenxinru@163.com','广外4栋','../common/upload_img/20160425120431425.jpg'),(107,'拾主姓名','e10adc3949ba59abbe56e057f20f883e','13533319825',NULL,'496560094@qq.com','广州大学城广外8栋605','../common/upload_img/20160426122824826.jpg'),(108,'李长兴','827ccb0eea8a706c4c34a16891f84e7b','13566651234',NULL,'lichangxing@163.com','广外8栋604','../common/upload_img/20160427033618200.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

#
# Structure for table "validation"
#

DROP TABLE IF EXISTS `validation`;
CREATE TABLE `validation` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `answer_type` int(11) DEFAULT NULL,
  `l_id` int(11) NOT NULL,
  `l_type` int(11) DEFAULT NULL,
  PRIMARY KEY (`q_id`,`l_id`)
) ENGINE=MyISAM AUTO_INCREMENT=252 DEFAULT CHARSET=utf8;

#
# Data for table "validation"
#

/*!40000 ALTER TABLE `validation` DISABLE KEYS */;
INSERT INTO `validation` VALUES (203,'证件上的学号是？','20120401547',0,186,0),(207,'身份证姓名？','郑十二',0,190,0),(209,'u盘内存大小?','8G',0,193,0),(210,'商标是什么？','一只兔子',0,195,0),(212,'证件姓名为？','季赢',0,197,0),(214,'哪一只耳朵下方有黑色胎记？','左耳',0,319,1),(220,'通行证姓名？','沈从文',0,327,1),(221,'伞柄饰带颜色？','蓝色',1,203,0),(225,'杯子是什么颜色的？','蓝色',0,207,0),(226,'水壶把手颜色？','绿色和黑色',1,187,0),(230,'学生证学号是？','20120401547',0,196,0),(231,'包装上水笔标注的姓名？','李四',0,188,0),(232,'证照姓名？','张爱玲',0,324,1),(233,'狗狗名牌上的姓名？','王汪',0,191,0),(234,'书扉页上的姓名？','陈四',0,321,1),(236,'背包上的名牌写着的名字是？','张恨水',0,322,1),(237,'其中有一边袖子上有个小洞，请问是哪边袖子？','左边',0,326,1),(238,'车把颜色？','黑色',0,325,1),(239,'扉页写的字是什么？','坚持',0,204,0),(241,'该行李箱是什么品牌的？','爱华仕',0,208,0),(242,'里面放着一本书，请问书的名字是什么？','微积分',1,208,0),(243,'手链上有刻着英文字母，请问英文字母哪几个？','XDA',0,210,0),(244,'请问该鼠标是插在哪个电脑（多少号）上的？','26',0,211,0),(245,'请问校卡上的学号是多少？','20120401562',0,340,1),(246,'请问该计算器是在哪个a栋哪个教室丢的？','204',0,212,0),(247,'请问该相机的具体型号是什么？','sony hd400',1,213,0),(248,'请问是在哪路公交上丢的？','801',0,213,0),(249,'请问该手机是在图书馆几楼丢的？（回答：1/2/3/4/5）','3',0,214,0),(250,'请问手机上的锁屏背影是哪个明星？','李易峰',0,214,0),(251,'请问是哪路公交车？','番202',0,219,0),(253,'请问该电脑的用户名是什么？','闲德安',0,200,0),(254,'请问电脑桌面的壁纸是哪个明星？','宋仲基',0,200,0),(256,'请问校园卡上的姓名是？','陈欣如',0,341,1),(257,'请问该u盘是在实验楼c幢的哪个教室丢的？','c205',1,222,0),(258,'请问该u盘插在电脑上时所显示的名字是？','陈欣如',0,222,0);
/*!40000 ALTER TABLE `validation` ENABLE KEYS */;

#
# Structure for table "xiansuo"
#

DROP TABLE IF EXISTS `xiansuo`;
CREATE TABLE `xiansuo` (
  `xs_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_id` int(11) DEFAULT NULL,
  `l_type` int(1) DEFAULT NULL,
  `s_id` int(11) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  `xs_context` varchar(255) DEFAULT NULL,
  `xs_date` date DEFAULT NULL,
  `xs_type` int(1) DEFAULT NULL,
  `xs_state` int(1) unsigned zerofill NOT NULL,
  PRIMARY KEY (`xs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

#
# Data for table "xiansuo"
#

/*!40000 ALTER TABLE `xiansuo` DISABLE KEYS */;
INSERT INTO `xiansuo` VALUES (15,189,0,65,64,'我的我的我的我的我的我的','2016-03-16',0,1),(16,316,1,69,61,'我是那时候的司机，后来我把包交给辖区派出所了，你去那边认领吧。','2016-03-16',0,0),(17,325,1,83,91,'贝岗路口那家自行车店有看到一辆二手的和这个很像，你可以去那里找找。','2016-03-16',0,0),(18,327,1,95,94,'那天在又坑有看到他们的工作人员在问是谁掉的，没人认领的话应该还在超市的。','2016-03-16',0,0),(19,204,0,99,98,'如果上面写着\"坚持！\"那一定是我好基友的。','2016-03-16',0,0),(22,196,0,58,74,'哈喽','2016-04-24',0,0),(23,341,1,57,105,'可以看看饭堂的板报上有没有','2016-04-27',0,0);
/*!40000 ALTER TABLE `xiansuo` ENABLE KEYS */;
