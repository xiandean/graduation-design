<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
$smarty=new SmartyProject();


$para='?';
if(isset($_GET['keyword'])&&!empty($_GET['keyword'])){
	$keyword=$_GET['keyword'];
	if(isset($_GET['opt'])&&$_GET['opt']==0){
		$opt=$_GET['opt'];
		$condition0="where (sign(locate('$keyword',rl_uid))+sign(locate('$keyword',l_name))+sign(locate('$keyword',u_id))+sign(locate('$keyword',l_feature)))>0";
		// $condition0="";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==1){
		$opt=$_GET['opt'];
		$condition0="where (sign(locate('$keyword',l_name)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==2){
		$opt=$_GET['opt'];
		$condition0="where (sign(locate('$keyword',l_feature)))>0";
	}
	if(isset($_GET['opt'])&&$_GET['opt']==3){
		$opt=$_GET['opt'];
		$condition0="where (sign(locate('$keyword',rl_uid)))>0";
	}if(isset($_GET['opt'])&&$_GET['opt']==4){
		$opt=$_GET['opt'];
		$condition0="where (sign(locate('$keyword',u_id)))>0";
	}
	
	$para.="opt={$opt}&keyword={$keyword}";
}else{
	$opt=0;
	$keyword='';
	$condition0='';
	$para.="opt=0";
}
if(!isset($_GET['opt'])){
	$opt=0;
}





$page='';
$condition='';
$words='';
if(isset($_GET['page'])){
	$pageNow=$_GET['page'];
}else{
	$pageNow=1;
};
if(isset($_GET['type'])){
	$type=$_GET['type'];
}else{
	$type=1;
};
$para.="&type={$type}";
if(isset($_GET['keywords'])){
	$words=$_GET['keywords'];
}
if(isset($_GET['sub-keywords'])){
	$words=$_GET['sub-keywords'];
	$sub=true;
}else{
	$sub=false;
}
if(isset($_GET['class'])&&$_GET['class']){
	$class=$_GET['class'];
	$condition.=" and l_class=$class";
	$para.="&class=$class";
}else{
	$class=0;
}
if(isset($_GET['date1'])&&$_GET['date1']&&isset($_GET['date2'])&&$_GET['date2']){
	$date1=$_GET['date1'];
	$date2=$_GET['date2'];
	$condition.=" and rl_date between '$date1' and '$date2'";
	$para.="&date1=$date1&date2=$date2";
}else{
	$date1='';
	$date2='';
}


function getmicrotime(){
	list($usec,$sec)=explode(" ",microtime());
	return ((float)$usec+(float)$sec);
}

// if(isset($words)){
	$keywords=$words;
	$time_start=getmicrotime();
	if(!$sub){
		$smarty->assign('keywords',$para.'&keywords='.$words);
	}else{
		$smarty->assign('keywords',$para.'&sub-keywords='.$words);
	}
	if($words){
		require "class/scws.php";
		$key_arr=scws($keywords);
	}else{
		$key_arr='';
	}
	$keywords=explode(' ',$key_arr);
	
	// print_r($keywords);
	$percent=1/count($keywords);
	require_once "../common/class/db.php";
    $db=new DB;
	$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),id int(11),rl_uid int(11),l_name varchar(255),l_feature varchar(255),l_img varchar(255),rl_date date,count float(11),u_id int(11)) default charset utf8 COLLATE utf8_general_ci";
    $db->query($sql);
	
	
	if($type==1||$type==2){

		$sign="sign(locate('$keywords[0]',renling.l_name))*$percent+sign(locate('$keywords[0]',renling.l_feature))*$percent*0.6";
		for($i=1,$len=count($keywords);$i<$len;$i++){

			$sign.="+sign(locate('$keywords[$i]',renling.l_name))*$percent+sign(locate('$keywords[$i]',renling.l_feature))*$percent*0.6";
		}
		$table="renling";
		if($keywords){
			$condition1="where $sign>=0.5".$condition." and l_type=0";
		}else{
			$condition1="where 1=1".$condition." and l_type=0";
		}
	    $sql2="INSERT into atmp_table select 0 as type,id,rl_uid,l_name,l_feature,l_img,rl_date,$sign as count,u_id from $table $condition1";
	    $db->query($sql2);
	}
	
	if($type==1||$type==3){

		$sign2="sign(locate('$keywords[0]',renling.l_name))*$percent+sign(locate('$keywords[0]',renling.l_feature))*$percent*0.6";
		for($i=1,$len=count($keywords);$i<$len;$i++){

			$sign2.="+sign(locate('$keywords[$i]',renling.l_name))*$percent+sign(locate('$keywords[$i]',renling.l_feature))*$percent*0.6";
		}
	    $table2="renling";
	    if($keywords){
			$condition2="where $sign2>=0.5".$condition." and l_type=1";
		}else{
			$condition2="where 1=1".$condition." and l_type=1";
		}
	    $sql3="INSERT into atmp_table select 1 as type,id,rl_uid,l_name,l_feature,l_img,rl_date,$sign2 as count,u_id from $table2 $condition2";
	    $db->query($sql3);
	}
    
	$params = array(
	    'table'=>'atmp_table', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'pageRows' =>20, #(可选) 默认为15d
	    //'condition'=>$condition,
	    'select'=>"*",
	    'condition'=>$condition0,
	    'order'=>"count desc,rl_date"
	);
	
	$sepPage = new page($params,$db);
	$page=$sepPage->showData();
	if($page['list']){
		foreach($page['list'] as $key=>$value){
			foreach($value as $key2=>$value2){
				//print_r($value2."<br>");
				if($key2!='l_img'){
					for($k=0;$k<count($keywords);$k++){
						$value2=str_ireplace($keywords[$k], "<font color='#ff0000'>".$keywords[$k]."</font>", $value2);
						//echo $content."<br>";
					}
					$value2=str_ireplace($keyword, "<font color='#ff0000'>".$keyword."</font>", $value2);
					$page['list'][$key][$key2]=$value2;
				}
				
			}
		}
	}

	// $time_end=getmicrotime();
	// $time=$time_end-$time_start;
	// echo '<br>搜索用时：'.$time.'秒'.'<br>';
	// echo '匹配度排序： ';
	// if($page['list']){
	// 	foreach($page['list'] as $key=>$value){
	// 	echo $value['count']." ";
	// }
	
// }
	
	
	

if(isset($words)){
	$keys=$words;
}else{
	$keys='';
}

$smarty->assign('keyword',$keyword);
$smarty->assign('opt',$opt);
$smarty->assign('page',$page);
$smarty->assign('mid',$mid);
$smarty->assign('mname',$mname);
$smarty->assign('mheadImg',$mheadImg);
$smarty->assign('title','renling');
$smarty->assign('type',$type);
$smarty->assign('keys',$keys);
$smarty->assign('sub',$sub);
$smarty->assign('date1',$date1);
$smarty->assign('date2',$date2);
$smarty->display('admin/rl_list.tpl');
?>