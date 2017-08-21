<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/db.php";
$db=new DB;

if(isset($_POST['title'])&&isset($_POST['content'])){
	date_default_timezone_set('PRC');
    $p_date=date('Y-m-d');
	$rs=$db->insert('announce',array('title'=>$_POST['title'],'context'=>$_POST['content'],'p_date'=>$p_date,'u_name'=>$mname));
	if($rs){
		header('location: n_list.php');
	}
}
$smarty=new SmartyProject();
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('title','note');
$smarty->display('admin/p_note.tpl');
?>