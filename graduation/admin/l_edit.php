<?php
require "isLogin.php";
if(!$mid){
	header("Location:m_login.php");
}
if(!isset($_GET['l_id'])||!isset($_GET['type'])){
	//echo "<script> history.back(); </script>";
	exit;
}
require "../common/class/smarty.php";
require "../common/class/db.php";
$l_id=$_GET['l_id'];
$type=$_GET['type'];
if($type==0){
	$table='found';
}else if($type==1){
	$table='lost';
}
$db=new DB;
$sql="select l_name,l_class,l_feature,l_desc,l_place,l_img,l_date,u_id,u_name,u_phone,u_email,u_address,ct_state,p_date,question,answer,answer_type from $table left join validation on validation.l_id=$table.l_id where $table.l_id=$l_id";
$lostinfo=$db->get_all($sql);
if(count($lostinfo)<1){
	//echo "<script> history.back(); </script>";
	exit;
}
$smarty=new SmartyProject();
$smarty->assign('mid',$mid);
$smarty->assign('l_id',$l_id);
$smarty->assign('type',$type);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('lostinfo',$lostinfo);
$smarty->assign('title','list');
$smarty->display('admin/l_edit.tpl');
?>