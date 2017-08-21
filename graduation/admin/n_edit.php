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
if(isset($_POST['title'])&&isset($_POST['content'])){
	$db->update('announce',array('title'=>$_POST['title'],'context'=>$_POST['content']),"a_id=$id");
}
$sql="select * from announce where a_id=$id";
$rs=$db->get_one($sql);
if($rs){
	$a=$rs;
}else{
	$a='';
}
$smarty=new SmartyProject();
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('a',$a);
$smarty->assign('title','note');
$smarty->display('admin/n_edit.tpl');
?>