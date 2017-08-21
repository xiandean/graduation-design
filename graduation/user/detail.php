<?php
require "../common/class/smarty.php";
require "isLogin.php";
require "../common/class/db.php";
if(!isset($_GET['l_id'])||!isset($_GET['type'])){
	exit;
}
$l_id=$_GET['l_id'];
$type=$_GET['type'];
$type=='lost'? $table='lost': $table='found';
$type=='lost'? $l_type=1: $l_type=0;
$db=new DB;
$sql="select * from $table left join class on class.id=$table.l_class where $table.l_id=$l_id";
$list= $db->get_one($sql);

if($list['ct_state']==1){
	if(isset($_SESSION['uid'])){
		$sql2="select validation.q_id,validation.question,validation.answer,q_manage.u_answer from validation left join q_manage on validation.q_id=q_manage.q_id and q_manage.u_id=$uid where validation.l_id=$l_id and validation.l_type=$l_type";
		$question=$db->get_all($sql2);
	}else{
		$sql2="select validation.q_id,validation.question,validation.answer from validation where validation.l_id=$l_id and validation.l_type=$l_type";
		$question=$db->get_all($sql2);
	}
	
	// print_r($question);
}else{
	$question='';
}

$smarty=new SmartyProject();
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('list',$list);
$smarty->assign('question',$question);
$smarty->assign('type',$type);
$smarty->assign('l_type',$l_type);
$smarty->display('user/detail.tpl');
	

?>
