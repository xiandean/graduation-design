<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
require "../common/class/db.php";

$smarty=new SmartyProject();
// print_r($page);
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('title','index');
$smarty->display('admin/index.tpl');
?>