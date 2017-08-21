<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else{
		$uid=$_SESSION['uid'];
		$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),l_feature varchar(255),l_desc varchar(255),l_img varchar(255),p_date date,u_id int(11)) default charset utf8 COLLATE utf8_general_ci";
	    $db->query($sql);

	    $sql2="INSERT into atmp_table select 1 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_id from lost  where u_id=$uid";
		$db->query($sql2);

		$sql3="INSERT into atmp_table select 0 as type,l_id,l_name,l_feature,l_desc,l_img,p_date,u_id from found where u_id=$uid";
		$db->query($sql3);

		$sql4="select count(*) as total from atmp_table left join pull on atmp_table.l_id=pull.r_id and pull.l_type=type where pull.state=0";
		$pull=$db->get_one($sql4);
		//print_r($pull);

		$sql5="select count(*) as total from atmp_table left join result on atmp_table.l_id=result.l_id and result.l_type=atmp_table.type where result.state=1";
		$validation=$db->get_one($sql5);
		//print_r($validation);

		$sql6="select count(*) as total from xiansuo left join atmp_table on atmp_table.l_id=xiansuo.l_id and xiansuo.l_type=atmp_table.type where xiansuo.xs_state=0 and xiansuo.r_id=$uid";
		$xs=$db->get_one($sql6);
		$sql7="select count(*) as total from renling where (rl_uid=$uid and l_type=0 and check_state=0) or (u_id=$uid and l_type=1 and check_state=0)";
		$rl=$db->get_one($sql7);
		// print_r($xs);
		$count=$pull['total']+$validation['total']+$xs['total']+$rl['total'];
		if($count>0)
			$data=array("error"=>0,"msg"=>"您有新消息！","count"=>$count,"pull"=>$pull['total'],"validation"=>$validation['total'],"xs"=>$xs['total'],"rl"=>$rl['total']);
		else
			$data=array("error"=>1,"msg"=>"暂无新消息！","count"=>0);
	}
	echo json_encode($data);
?>
