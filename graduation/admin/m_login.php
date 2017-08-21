<?php
session_start();
// require "isLogin.php";
if(isset($_SESSION['mid'])&&!empty($_SESSION['mid'])){
	header('Location:index.php');
}
require "../common/class/smarty.php";
$smarty=new SmartyProject();
// $smarty->assign('mid',$mid);
// $smarty->assign('mname',$mname);
// $smarty->assign('mheadImg',$mheadImg);
$smarty->display('admin/m_login.tpl');
?>