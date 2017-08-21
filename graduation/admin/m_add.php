<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};

$table='admin';



$smarty=new SmartyProject();
$params = array(
    'table'=>$table, #(必须)
    'pageNow'  =>$pageNow,  #(必须)
    'pageRows' =>10, #(可选) 默认为15
    'order'=>'id'
);

$sepPage = new page($params);
$page=$sepPage->showData();
$smarty->assign('page',$page);
$smarty->assign('title','m_list');
// print_r($page);
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->display('admin/m_add.tpl');
?>