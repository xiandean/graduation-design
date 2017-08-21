<?php
require "isLogin.php";
require "../common/class/smarty.php";
require "../common/class/sepPage.php";
$smarty=new SmartyProject();
$page='';
$condition='';
$para='';
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
	$condition.=" and l_date between '$date1' and '$date2'";
	$para.="&date1=$date1&date2=$date2";
}else{
	$date1='';
	$date2='';
}


function getmicrotime(){
	list($usec,$sec)=explode(" ",microtime());
	return ((float)$usec+(float)$sec);
}

if(isset($words)){
	$keywords=$words;
	$time_start=getmicrotime();
	if(!$sub){
		$smarty->assign('keywords',$para.'&keywords='.$words);
	}else{
		$smarty->assign('keywords',$para.'&sub-keywords='.$words);
	}
	if($words){
		require "../common/class/scws.php";
		$key_arr=scws($keywords);
	}else{
		$key_arr='';
	}
	$keywords=explode(' ',$key_arr);
	
	// print_r($keywords);
	$percent=1/count($keywords);
	require_once "../common/class/db.php";
    $db=new DB;
	$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),l_feature varchar(255),l_desc varchar(255),l_img varchar(255),l_date date,l_class int(11),p_date date,count float(11)) default charset utf8 COLLATE utf8_general_ci";
    $db->query($sql);
	
	
	if($type==1||$type==2){
		$sign="sign(locate('$keywords[0]',lost.l_name))*$percent+sign(locate('$keywords[0]',class.name))*$percent*0.8+sign(locate('$keywords[0]',lost.l_feature))*$percent*0.6+sign(locate('$keywords[0]',lost.l_desc))*$percent*0.5";
		for($i=1,$len=count($keywords);$i<$len;$i++){
			$sign.="+sign(locate('$keywords[$i]',lost.l_name))*$percent+sign(locate('$keywords[$i]',class.name))*$percent*0.8+sign(locate('$keywords[$i]',lost.l_feature))*$percent*0.6+sign(locate('$keywords[$i]',lost.l_desc))*$percent*0.5";
		}
		$table="lost left join class on lost.l_class=class.id";
		if($keywords){
			$condition1="where $sign>=0.2".$condition;
		}else{
			$condition1="where 1=1".$condition;
		}
	    $sql2="INSERT into atmp_table select 0 as type,l_id,l_name,l_feature,l_desc,l_img,l_date,l_class,p_date,$sign as count from $table $condition1";
	    $db->query($sql2);
	}
	
	if($type==1||$type==3){
		$sign2="sign(locate('$keywords[0]',found.l_name))*$percent+sign(locate('$keywords[0]',class.name))*$percent*0.8+sign(locate('$keywords[0]',found.l_feature))*$percent*0.6+sign(locate('$keywords[0]',found.l_desc))*$percent*0.5";
		for($i=1,$len=count($keywords);$i<$len;$i++){

			$sign2.="+sign(locate('$keywords[$i]',found.l_name))*$percent+sign(locate('$keywords[$i]',class.name))*$percent*0.8+sign(locate('$keywords[$i]',found.l_feature))*$percent*0.6+sign(locate('$keywords[$i]',found.l_desc))*$percent*0.5";
		}
	    $table2="found left join class on found.l_class=class.id";
	    if($keywords){
			$condition2="where $sign2>=0.2".$condition;
		}else{
			$condition2="where 1=1".$condition;
		}
	    $sql3="INSERT into atmp_table select 1 as type,l_id,l_name,l_feature,l_desc,l_img,l_date,l_class,p_date,$sign2 as count from $table2 $condition2";
	    $db->query($sql3);
	}
    
	$params = array(
	    'table'=>'atmp_table', #(必须)
	    'pageNow'  =>$pageNow,  #(必须)
	    'pageRows' =>12, #(可选) 默认为15d
	    //'condition'=>$condition,
	    'select'=>"*",
	    'order'=>"count desc,p_date"
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
	
}
	
	
	

if(isset($words)){
	$keys=$words;
}else{
	$keys='';
}


$smarty->assign('page',$page);
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->assign('type',$type);
$smarty->assign('keys',$keys);
$smarty->assign('sub',$sub);
$smarty->assign('class',$class);
$smarty->assign('date1',$date1);
$smarty->assign('date2',$date2);
$smarty->display('user/search.tpl');
?>