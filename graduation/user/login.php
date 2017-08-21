<?php
require "isLogin.php";
if(isset($_SESSION['uid'])&&!empty($_SESSION['uid'])){
	header('Location:index.php');
}
require "../common/class/smarty.php";
$smarty=new SmartyProject();
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->display('user/login.tpl');
?>