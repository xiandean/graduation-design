<?php
require "isLogin.php";
require "../common/class/smarty.php";

$smarty=new SmartyProject();


$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('title','about');
$smarty->display('user/about.tpl');
?>