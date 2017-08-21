<?php
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	if(empty($_SESSION['uid'])){
		$data=array("error"=>2,"msg"=>"请先登陆！");
	}else if(isset($_POST['action'])&&$_POST['action']=='checked'){
		$uid=$_SESSION['uid'];
		$l_id=$_POST['l_id'];
		$l_type=$_POST['l_type'];
		$table=$l_type==0?"found":"lost";
		$p_uid=$db->get_one("select u_id from $table where l_id=$l_id");
		if($p_uid['u_id']==$uid){
			$data=array("error"=>999,"msg"=>"您是发布者，操作无效！");
			echo json_encode($data);
			exit;
		}
  		$sql="select * from result where l_id=$l_id and u_id=$uid and l_type=$l_type";
  		$rs=$db->get_one($sql);
  		if(!$rs){
  			$dataArray=array("l_id"=>$l_id,"u_id"=>$uid,"l_type"=>$l_type,"state"=>1);
  			$rs2=$db->insert('result',$dataArray);
  		}
  		$data=array("error"=>0,"msg"=>"验证通过！");
	}else if(isset($_POST['action'])&&$_POST['action']=='question'){
		$uid=$_SESSION['uid'];
		$arr_id=$_POST['q_id'];
		$arr_answer=$_POST['answer'];
		$flag=true;
		$over=false;
		require "../../common/class/checkSimilar.php";
	    $lcs = new LCS();
	    $arr_similar=array();
		for($i=0,$len=count($arr_id);$i<$len;$i++){
			$q_id=$arr_id[$i];
			$q_answer=$arr_answer[$i];
			$sql="select * from validation where q_id=$q_id";
			$rs=$db->get_one($sql);
			$l_id=$rs['l_id'];
			$l_type=$rs['l_type'];
			$table=$l_type==0?"found":"lost";
			$p_uid=$db->get_one("select u_id from $table where l_id=$l_id");
			if($p_uid['u_id']==$uid){
				$data=array("error"=>999,"msg"=>"您是发布者，操作无效！");
				echo json_encode($data);
				exit;
			}
			if($rs['answer_type']==0){
				$result=$rs['answer']==$q_answer? true:false;
			}else{
				
	      		$similar=$lcs->getSimilar($rs['answer'],$q_answer,true);
	      		$result=$similar>=0.66?true:false;
	      		$arr_similar[$i]=$similar;
			}
      		if(!$result){
      			$flag=false;
      			$sql2="select * from q_manage where q_id=$q_id and u_id=$uid";
				$rs2=$db->get_one($sql2);
				if($rs2){
					if($rs2['a_count']>=4){
						$over=true;
					}		
					$dataArray=array("a_count"=>$rs2['a_count']+1);
					$db->update('q_manage',$dataArray,"q_id=$q_id and u_id=$uid");	
				}else{
					$dataArray=array("q_id"=>$q_id,"u_id"=>$uid,"a_count"=>1);
					$db->insert('q_manage',$dataArray);
				}
			}else{
				$sql2="select * from q_manage where q_id=$q_id and u_id=$uid";
				$rs2=$db->get_one($sql2);
				if($rs2){
					if($rs2['a_count']>=4){
						$over=true;
				
					}else{
						$dataArray=array("q_id"=>$q_id,"u_id"=>$uid,"u_answer"=>$q_answer);
						$rs3=$db->update('q_manage',$dataArray,"q_id=$q_id and u_id=$uid");
					}
					
				}else{
					$dataArray=array("q_id"=>$q_id,"u_id"=>$uid,"a_count"=>0,"u_answer"=>$q_answer);
					$rs3=$db->insert('q_manage',$dataArray);
				}
			}
      	}
      	if($over){
			$data=array("error"=>4,"msg"=>"回答超过了5次！","similar"=>$arr_similar);
      	}else if(!$flag){
      		$data=array("error"=>1,"msg"=>"回答错误！您还有".(4-$rs2['a_count'])."次回答机会","similar"=>$arr_similar);
      	}else{
      		$l_id=$rs['l_id'];
      		$l_type=$rs['l_type'];
      		$sql3="select * from result where l_id=$l_id and u_id=$uid and l_type=$l_type";
      		$rs4=$db->get_one($sql3);
      		if(!$rs4){
				
      			$dataArray=array("l_id"=>$l_id,"u_id"=>$uid,"l_type"=>$l_type,"state"=>1);
      			$rs5=$db->insert('result',$dataArray);
      		}
      		$data=array("error"=>0,"msg"=>"验证通过！","similar"=>$arr_similar);
      	}
      	
	}
	echo json_encode($data);
	/*header('Location:index.php');*/

?>