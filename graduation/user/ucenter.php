<?php
require "isLogin.php";
if(empty($_SESSION['uid'])){
	header("Location:login.php");
}
require "../common/class/smarty.php";
require "../common/class/db.php";
$db=new DB;
$smarty=new SmartyProject();
if(!isset($_GET['p'])||$_GET['p']=='user_info'){
	$p='user_info';
	$sql="select name,email,phone,address,img from user where id=$uid";
	$userinfo=$db->get_one($sql);
	$smarty->assign('userinfo',$userinfo);
}else if($_GET['p']=='reset_psw'){
	$p='reset_psw';
}else{
	$p='list';
	if(isset($_GET['action'])){
		$action=$_GET['action'];
	}else{
		$action='';
	}
	require "../common/class/sepPage.php";
	if(isset($_GET['page'])){
		$pageNow=$_GET['page'];
	}else{
		$pageNow=1;
	};
	if($action=='pulling'||$action==''){
		$sql="CREATE TEMPORARY TABLE atmp_table(pull_id int(11),state int(11),similar Float,type int(1),l_id int(11),l_name varchar(255),l_feature varchar(255),l_desc varchar(255),l_img varchar(255),p_date date) default charset utf8 COLLATE utf8_general_ci";
	    $db->query($sql);

	    $sql2="INSERT into atmp_table select pull.pull_id,pull.state,pull.similar,1 as type,lost.l_id,lost.l_name,lost.l_feature,lost.l_desc,lost.l_img,lost.p_date from (pull left join found on r_id=found.l_id) left join lost on s_id=lost.l_id where l_type=0 and found.u_id=$uid";
		$db->query($sql2);

		$sql3="INSERT into atmp_table select pull.pull_id,pull.state,pull.similar,0 as type,found.l_id,found.l_name,found.l_feature,found.l_desc,found.l_img,found.p_date from (pull left join lost on r_id=lost.l_id) left join found on s_id=found.l_id where l_type=1 and lost.u_id=$uid";
		$db->query($sql3);

		$table='atmp_table';

		$params = array(
		    'table'=>$table, #(必须)
		    'pageNow'  =>$pageNow,  #(必须)
		    'pageRows' =>4,
		    'select'=>"*",
		    'order'=>"state,similar desc,pull_id"
		);
		$sepPage = new page($params,$db);

		$page=$sepPage->showData();
		//print_r($page['list']);
		$smarty->assign('page',$page);
	}else if($action=='working'){
		$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),l_feature varchar(255),l_desc varchar(255),l_img varchar(255),p_date date) default charset utf8 COLLATE utf8_general_ci";
	    $db->query($sql);

	    $sql2="INSERT into atmp_table select 1 as type,l_id,l_name,l_feature,l_desc,l_img,p_date from lost left join class on lost.l_class=class.id where u_id=$uid";
		$db->query($sql2);

		$sql3="INSERT into atmp_table select 0 as type,l_id,l_name,l_feature,l_desc,l_img,p_date from found left join class on found.l_class=class.id where u_id=$uid";
		$db->query($sql3);

		$table='atmp_table';

		$params = array(
		    'table'=>$table, #(必须)
		    'pageNow'  =>$pageNow,  #(必须)
		    'pageRows' =>4,
		    'select'=>"*",
		    'order'=>"p_date desc,l_id"
		);
		$sepPage = new page($params,$db);
		$page=$sepPage->showData();
		if(count($page['list'])>0){
			foreach ($page['list'] as $key => $value) {
				// print_r($page['list']);
				$l_id=$value['l_id'];
				$type=$value['type'];
				$sql4="select name as u_name,phone,xs_context,xs_date from xiansuo left join user on xiansuo.s_id=user.id where r_id=$uid and xiansuo.l_id=$l_id and xiansuo.l_type=$type";
				$xs=$db->get_all($sql4);
				if(count($xs)>0){
					$page['list'][$key]['xs']=$xs;
				}else{
					$page['list'][$key]['xs']='';
				}
			}
		}
		//print_r($page['list']);
		$smarty->assign('page',$page);
	}else if($action=='waiting'){
		$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),l_feature varchar(255),l_desc varchar(255),l_img varchar(255),p_date date,u_name varchar(255),u_phone varchar(255),u_email varchar(255),u_address varchar(255)) default charset utf8 COLLATE utf8_general_ci";
	    $db->query($sql);

	    $sql2="INSERT into atmp_table select 1 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_name,u_phone,u_email,u_address from lost left join class on lost.l_class=class.id";
		$db->query($sql2);

		$sql3="INSERT into atmp_table select 0 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_name,u_phone,u_email,u_address from found left join class on found.l_class=class.id";
		$db->query($sql3);

		$table='atmp_table';

		$params = array(
		    'table'=>"$table left join result on $table.l_id=result.l_id and $table.type=result.l_type", #(必须)
		    'pageNow'  =>$pageNow,  #(必须)
		    'pageRows' =>4,
		    'select'=>"*",
		    'order'=>"p_date desc,result.l_id",
		    'condition'=>"where result.u_id=$uid and result.state!=2"
		);
		$sepPage = new page($params,$db);
		$page=$sepPage->showData();
		$smarty->assign('page',$page);
	}else if($action=='records'){
		// $sql="CREATE TEMPORARY TABLE atmp_table(l_name varchar(255),l_type int(1)l_feature varchar(255),l_img varchar(2u_name varchar(255),u_phone varchar(255),u_email varchar(255),u_address varchar(255)) default charset utf8 COLLATE utf8_general_ci";
	 //    $db->query($sql);

	 //    $sql2="INSERT into atmp_table select 1 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_name,u_phone,u_email,u_address from lost left join class on lost.l_class=class.id";
		// $db->query($sql2);

		// $sql3="INSERT into atmp_table select 0 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_name,u_phone,u_email,u_address from found left join class on found.l_class=class.id";
		// $db->query($sql3);

		// $table='atmp_table';
		$params = array(
		    'table'=>"renling left join user on (renling.rl_uid=user.id and u_id=$uid) or (renling.u_id=user.id and renling.rl_uid=$uid)", #(必须)
		    'pageNow'  =>$pageNow,  #(必须)
		    'pageRows' =>4,
		    'select'=>"*",
		    'order'=>"renling.rl_date desc,renling.id",
		    'condition'=>"where u_id=$uid or rl_uid=$uid"
		);
		$sepPage = new page($params,$db);
		$page=$sepPage->showData();
		$smarty->assign('page',$page);
	}
	
	$smarty->assign('action',$action);

}

$smarty->assign('p',$p);
$smarty->assign('uid',$uid);
$smarty->assign('username',$username);
$smarty->assign('headImg',$headImg);
$smarty->display('user/ucenter.tpl');
?>