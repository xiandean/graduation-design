<?php
	session_start();
	header('Content-type: text/html;charset=UTF-8');
	require "../../common/class/db.php";
  require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(!isset($_GET['l_id']) && !isset($_GET['l_type'])){
		$uid=$_SESSION['uid'];
		$sql="CREATE TEMPORARY TABLE atmp_table(type int(1),l_id int(11),l_name varchar(255),u_id int(11),u_name varchar(255),r_id int(11)) default charset utf8 COLLATE utf8_general_ci";
    	$db->query($sql);
    	$sql2="INSERT into atmp_table select 0 as type,found.l_id,found.l_name,result.u_id,found.u_name,result.r_id from result left join found on result.l_id=found.l_id where found.u_id=$uid  and result.l_type=0 and result.state!=2";
	    $db->query($sql2);
	    $sql3="INSERT into atmp_table select 1 as type,lost.l_id,lost.l_name,result.u_id,lost.u_name,result.r_id from result left join lost on result.l_id=lost.l_id where lost.u_id=$uid  and result.l_type=1 and result.state!=2";
	    $db->query($sql3);
		$sql4="select atmp_table.l_id,atmp_table.l_name,atmp_table.type,atmp_table.u_id,atmp_table.r_id,validation.q_id,validation.question,validation.answer,q_manage.u_answer from (validation left join q_manage on validation.q_id=q_manage.q_id) right join atmp_table on validation.l_id=atmp_table.l_id and validation.l_type=atmp_table.type and q_manage.u_id=atmp_table.u_id where validation.question is null or (validation.question is not null and u_answer is not null) order by atmp_table.r_id desc,q_manage.id desc";
  		//$sql4="select * from atmp_table";
  		$rs=$db->get_all($sql4);
  		if($rs){
  			//$dataArray=array("l_id"=>$l_id,"u_id"=>$uid,"l_type"=>$l_type,"state"=>1);
  			//$rs2=$db->insert('result',$dataArray);
  			foreach ($rs as $key => $value) {
  				$answer_uid=$value['u_id'];
  				$sql5="select name from user where id=$answer_uid";
  				$rs2=$db->get_one($sql5);
  				$rs[$key]['u_name']=$rs2['name'];
  			}
  			$data=array("error"=>0,"msg"=>"验证获取成功！",'validations'=>$rs);
        // echo count($rs);
  		}else{
  			$data=array("error"=>1,"msg"=>"暂无验证！");
  		}
  		//$data=array("error"=>0,"msg"=>"验证通过！");
	}else if(isset($_GET['l_id']) && isset($_GET['l_type'])){

	}
	echo json_encode($data);
	/*header('Location:index.php');*/

?>