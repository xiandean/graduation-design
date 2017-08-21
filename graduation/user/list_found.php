<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};
if(isset($_GET['class'])&&$_GET['class']!='all'){
	$classId=$_GET['class'];
	$table='found left join class on found.l_class=class.id';
	$condition="where class.id=$classId";
	$classPara="class=$classId&";
}else{
	$classId=0;
	$table='found';
	$condition='';
	$classPara='class=all&';
}
$smarty=new SmartyProject();
$params = array(
    'table'=>$table, #(必须)
    'pageNow'  =>$pageNow,  #(必须)
    'pageRows' =>12, #(可选) 默认为15
    'condition'=>$condition
);

$sepPage = new page($params);
$page=$sepPage->showData();
$smarty->assign('page',$page);
$smarty->assign('classPara',$classPara);
$smarty->assign('classId',$classId);
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('title','list_found');
$smarty->display('user/list_found.tpl');
?>