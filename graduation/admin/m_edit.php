<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/db.php";
$db=new DB;
if(isset($_GET['id'])){
	$id=$_GET['id'];
	
}else{
	$id=$mid;

};
$sql="select * from admin where id=$id";
$rs=$db->get_one($sql);
if($rs){
	$m=$rs;
}else{
	$m='';
}
$smarty=new SmartyProject();
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('m',$m);
$smarty->assign('title','m_list');
$smarty->display('admin/m_edit.tpl');
?>