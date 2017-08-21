<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/db.php";
$db=new DB;
if(isset($_GET['id'])){
	$id=$_GET['id'];
}else{
	exit;
};
$sql="select * from user where id=$id";
$rs=$db->get_one($sql);
if($rs){
	$u=$rs;
}else{
	$u='';
}
$smarty=new SmartyProject();
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('u',$u);
$smarty->assign('title','u_list');
$smarty->display('admin/u_edit.tpl');
?>