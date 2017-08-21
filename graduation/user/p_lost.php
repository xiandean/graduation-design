<?php
require "isLogin.php";
require "../common/class/smarty.php";
if(empty($_SESSION['uid'])){
	echo "<script> alert('请先登陆！');window.location.href='login.php'; </script>";
	exit;
}
require "../common/class/db.php";
$db=new DB;
$sql="select name,phone,email,address from user where id=$uid";
$rs=$db->get_one($sql);
if($rs){
	$userinfo=$rs;
}
$smarty=new SmartyProject();
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('title','p_lost');
$smarty->assign('userinfo',$userinfo);
$smarty->display('user/p_lost.tpl');
?>