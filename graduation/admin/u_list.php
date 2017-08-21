<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};

if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	if(isset($_GET['type'])&&$_GET['type']==0){
		$type=$_GET['type'];
		$condition="where (sign(locate('$keyword',name))+sign(locate('$keyword',id))+sign(locate('$keyword',phone))+sign(locate('$keyword',email))+sign(locate('$keyword',address)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==1){
		$type=$_GET['type'];
		$condition="where (sign(locate('$keyword',id)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==2){
		$type=$_GET['type'];
		$condition="where (sign(locate('$keyword',name)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==3){
		$type=$_GET['type'];
		$condition="where (sign(locate('$keyword',phone)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==4){
		$type=$_GET['type'];
		$condition="where (sign(locate('$keyword',email)))>0";
	}
	$params = array(
	    'table'=>'user', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'condition'=>$condition,
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'id'
	);
}else{
	$type=0;
	$keyword='';
	$params = array(
	    'table'=>'user', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'id'
	);
}
if(!isset($_GET['type'])){
	$type=0;
}
$smarty=new SmartyProject();
$sepPage = new page($params);
$page=$sepPage->showData();
if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	if($page['list']){
		foreach($page['list'] as $key=>$value){
			foreach($value as $key2=>$value2){
				//print_r($value2."<br>");
				if($key2!='id'){
					$value2=str_ireplace($keyword, "<font color='#ff0000'>".$keyword."</font>", $value2);
						//echo $content."<br>";
					$page['list'][$key][$key2]=$value2;
				}
				
			}
		}
	}
}


$smarty->assign('page',$page);
$smarty->assign('keyword',$keyword);
$smarty->assign('type',$type);

// print_r($page);
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('title','u_list');
$smarty->display('admin/u_list.tpl');
?>