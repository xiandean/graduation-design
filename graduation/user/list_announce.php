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
	$params = array(
	    'table'=>'announce', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'condition'=>"where (sign(locate('$keyword',title))+sign(locate('$keyword',context)))>0",
	    'pageRows' =>5 #(可选) 默认为15
	);
}else{
	$keyword='';
	$params = array(
	    'table'=>'announce', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'pageRows' =>5 #(可选) 默认为15
	);
}
// $table='announce';
$smarty=new SmartyProject();
$sepPage = new page($params);
$page=$sepPage->showData();
if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	if($page['list']){
		foreach($page['list'] as $key=>$value){
			foreach($value as $key2=>$value2){
				//print_r($value2."<br>");
				if($key2!='l_img'){
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
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);

$smarty->display('user/list_announce.tpl');
?>