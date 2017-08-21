<?php
	
	session_start();
	require "../../common/class/db.php";
	require "../../common/class/ajaxguolv.php";
	$db=new DB;
	$name = $_POST['name'];
	$password = md5($_POST['password']);
	$mobile = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$img=$_POST['imgpath'];
	$sql = "select * from user where name='{$name}'";
	$rs = $db->query($sql);
	if($db->num_rows($rs)>0){
		/*echo "<script type='text/javascript'> alert('该用户名已经被注册'); history.back();</script>";*/
		$data=array("error"=>2,"msg"=>"该用户名已被注册！");
		echo json_encode($data);
		exit();
	}
	if(isset($_SESSION['imgpath']) && $_SESSION['imgpath']){
        unset($_SESSION['imgpath']);
    }
	$dataArray=array( 'name'=>$name, 'password'=>$password, 'phone'=>$mobile, 'email'=>$email, 'address'=>$address, 'img'=>$img );
	$rs=$db->insert('user',$dataArray);
	
	if($rs){
		
		/*echo "<script type='text/javascript'> alert('注册成功！'); </script>";*/
		/*header('Location:index.php');*/
		$data=array("error"=>0,"msg"=>"注册成功！");
		echo json_encode($data);
	}else{
		/*echo "<script type='text/javascript'> alert('对不起！注册失败！');history.back(); </script>";*/
		$data=array("error"=>1,"msg"=>"对不起！注册失败！");
		echo json_encode($data);
	}

?>
