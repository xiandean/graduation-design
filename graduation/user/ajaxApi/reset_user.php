<?php
	
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	$name = $_POST['name'];
/*	$password = md5($_POST['password']);*/
	$mobile = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$img=$_POST['imgpath'];
	if(isset($_SESSION['imgpath']) && $_SESSION['imgpath']){
        unset($_SESSION['imgpath']);
    }
	$dataArray=array( 'name'=>$name, 'phone'=>$mobile, 'email'=>$email, 'address'=>$address, 'img'=>$img );
	$uid=$_SESSION['uid'];
	$rs=$db->update('user',$dataArray,"id={$uid}");
	
	if($rs){
		/*echo "<script type='text/javascript'> alert('注册成功！'); </script>";*/
		/*header('Location:index.php');*/
		$data=array("error"=>0,"msg"=>"修改成功！");
		$_SESSION['username']=$name;
		if($img) $_SESSION['headImg']=$img;
		echo json_encode($data);
	}else{
		/*echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";*/
		$data=array("error"=>1,"msg"=>"修改失败！");
		echo json_encode($data);
	}

?>
