<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
require "../common/class/db.php";
$db=new DB;
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};

$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),u_id int(11),u_name varchar(255),r_id int(11)) default charset utf8 COLLATE utf8_general_ci";
$db->query($sql);
$sql2="INSERT into atmp_table select 0 as type,found.l_id,found.l_name,result.u_id,found.u_name,result.r_id from result left join found on result.l_id=found.l_id where result.l_type=0 and result.state!=2";
$db->query($sql2);
$sql3="INSERT into atmp_table select 1 as type,lost.l_id,lost.l_name,result.u_id,lost.u_name,result.r_id from result left join lost on result.l_id=lost.l_id where result.l_type=1 and result.state!=2";
$db->query($sql3);
//$sql4="select atmp_table.l_id,atmp_table.l_name,atmp_table.type,atmp_table.u_id,atmp_table.r_id,validation.q_id,validation.question,validation.answer,q_manage.u_answer from (validation left join q_manage on validation.q_id=q_manage.q_id) right join atmp_table on validation.l_id=atmp_table.l_id where validation.question is null or (validation.question is not null and u_answer is not null) order by atmp_table.r_id desc,q_manage.id desc";
//$rs=$db->get_all($sql4);


if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	if(isset($_GET['type'])&&$_GET['type']==0){
		$type=$_GET['type'];
		$condition=" and (sign(locate('$keyword',l_name))+sign(locate('$keyword',question))+sign(locate('$keyword',answer))+sign(locate('$keyword',u_answer))+sign(locate('$keyword',u_name)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==1){
		$type=$_GET['type'];
		$condition=" and (sign(locate('$keyword',l_name))+sign(locate('$keyword',validation.l_id)))>0";
	}
	if(isset($_GET['type'])&&$_GET['type']==2){
		$type=$_GET['type'];
		$condition=" and (sign(locate('$keyword',user.name)))>0";
	}
	
	$params = array(
	    'table'=>'((validation left join q_manage on validation.q_id=q_manage.q_id) right join atmp_table on validation.l_id=atmp_table.l_id) left join user on user.id=q_manage.u_id', #(必须)
	    'select'=>"atmp_table.l_id,atmp_table.l_name,atmp_table.type,atmp_table.u_id,atmp_table.r_id,validation.q_id,validation.question,validation.answer,q_manage.u_answer,name as u_name,q_manage.id",
	    'pageNow'  =>$pageNow,  #(必须)
	    'condition'=>"where validation.question is not null and u_answer is not null".$condition,
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'atmp_table.r_id desc,q_manage.id'
	);
}else{
	$type=0;
	$keyword='';
	$params = array(
	    'table'=>'((validation left join q_manage on validation.q_id=q_manage.q_id) right join atmp_table on validation.l_id=atmp_table.l_id) left join user on user.id=q_manage.u_id', #(必须)
	    'select'=>"atmp_table.l_id,atmp_table.l_name,atmp_table.type,atmp_table.u_id,atmp_table.r_id,validation.q_id,validation.question,validation.answer,q_manage.u_answer,name as u_name,q_manage.id",
	    'pageNow'  =>$pageNow,  #(必须)
	    'condition'=>"where validation.question is not null and u_answer is not null",
	    'pageRows' =>12, #(可选) 默认为15
    	'order'=>'atmp_table.r_id desc,q_manage.id'
	);
}



if(!isset($_GET['type'])){
	$type=0;
}
$smarty=new SmartyProject();
$sepPage = new page($params,$db);
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
$smarty->assign('title','answer');
$smarty->display('admin/a_list.tpl');
?>