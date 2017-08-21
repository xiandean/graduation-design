<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};
require "../common/class/db.php";
$db=new DB;
$sql="CREATE TEMPORARY TABLE atmp_table(pull_id int(11),l_type int(1),state int(11),s_id int(11),s_name varchar(255),s_feature varchar(255),s_uname varchar(255),s_uid int(11),r_id int(11),r_name varchar(255),r_feature varchar(255),r_uname varchar(255),r_uid int(11),similar int(11)) default charset utf8 COLLATE utf8_general_ci";
$db->query($sql);
$sql2="select * from pull where l_type=0";
$rs2=$db->get_all($sql2);

if($rs2){
	foreach ($rs2 as $key => $value) {
		$l_id=$value['s_id'];
		$sql3="select l_id,l_name,l_feature,u_name,u_id from lost where l_id=$l_id";
		$rs3=$db->get_one($sql3);
		$f_id=$value['r_id'];
		$sql4="select l_id,l_name,l_feature,u_name,u_id from found where l_id=$f_id";
		$rs4=$db->get_one($sql4);
		$rs2[$key]['s_name']=$rs3['l_name'];
		$rs2[$key]['s_feature']=$rs3['l_feature'];
		$rs2[$key]['s_uname']=$rs3['u_name'];
		$rs2[$key]['s_uid']=$rs3['u_id'];
		$rs2[$key]['r_name']=$rs4['l_name'];
		$rs2[$key]['r_feature']=$rs4['l_feature'];
		$rs2[$key]['r_uname']=$rs4['u_name'];
		$rs2[$key]['r_uid']=$rs4['u_id'];
		$db->insert('atmp_table',$rs2[$key]);
	}
}

if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	if(isset($_GET['opt'])&&$_GET['opt']==0){
		$opt=$_GET['opt'];
		$condition="where (sign(locate('$keyword',s_name))+sign(locate('$keyword',s_feature))+sign(locate('$keyword',s_uname))+sign(locate('$keyword',r_name))+sign(locate('$keyword',r_feature))+sign(locate('$keyword',r_uname)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==1){
		$opt=$_GET['opt'];
		$condition="where (sign(locate('$keyword',s_name))+sign(locate('$keyword',s_id)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==2){
		$opt=$_GET['opt'];
		$condition="where (sign(locate('$keyword',r_name))+sign(locate('$keyword',r_id)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==3){
		$opt=$_GET['opt'];
		$condition="where (sign(locate('$keyword',s_uname))+sign(locate('$keyword',s_uid)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==4){
		$opt=$_GET['opt'];
		$condition="where (sign(locate('$keyword',r_uname))+sign(locate('$keyword',r_uid)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==5){
		$opt=$_GET['opt'];
		$condition="where similar>=$keyword";
	}
	//$sql2="select * from pull $condition";
	//$rs2=$db->get_all($sql2);
	
	
	$params = array(
	    'table'=>'atmp_table', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'condition'=>$condition,
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'pull_id'
	);
}else{
	$opt=0;
	$keyword='';
	$params = array(
	    'table'=>'atmp_table', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'pull_id'
	);
}
if(!isset($_GET['opt'])){
	$opt=0;
}
$smarty=new SmartyProject();
$sepPage = new page($params,$db);
$page=$sepPage->showData();

if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	if($page['list']){
		foreach($page['list'] as $key=>$value){
			foreach($value as $key2=>$value2){
				//print_r($value2."<br>");
				if($key2!='id'){
					$value2=str_ireplace($keyword, "<font color='#ff0000'>".$keyword."</font>", $value2);
						//echo $content."<br>";
					$page['list'][$key][$key2]=$value2;
				}
				
			}
		}
	}
}


$smarty->assign('page',$page);
$smarty->assign('keyword',$keyword);
$smarty->assign('opt',$opt);

// print_r($page);
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('title','pull');
$smarty->display('admin/pull_list.tpl');
?>