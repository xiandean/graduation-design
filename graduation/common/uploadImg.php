<?php 
/**2010-6-22
 * $data 数组类型    包含以下变量
 -------------------------------
 * $img_dir            上传图片的目录 config/config.upload.php $upload.config['imgpath']
 * $max_file_size    单位m(兆)，默认：1m
 * $type_array        允许的上传的图片类型(默认：image/pjpeg、image/jpeg、image/gif)
 **/
if(!isset($_SESSION)) session_start();
header("content-type:text/html; charset=utf-8;");
require_once "configs/config.upload.php";
function upload($data){
    if(!$data['file']){
        echo '<script>parent.alert("请选择图片！");</script>';exit;
    }
  
    if(!$data['img_dir']){
        echo '<script>parent.alert("图片上传目录不能为空！");</script>';exit;
    }
    if(!isset($data['max_file_size'])){
        $data['max_file_size'] = 5*1024 * 1024;
    }else{
        $data['max_file_size'] = $data['max_file_size'] * 1024 * 1024;
    }
    if(!isset($data['type_array'])){
        $data['type_array'] = array('image/pjpeg', 'image/jpeg', 'image/gif','image/png');
    }
    if(!isset($data['sub_type'])){
        $data['sub_type'] = 'upload';
    }
    $imgpath = '';
  
    
    if(!in_array($data['file']['type'], $data['type_array'])){
        echo '<script>parent.alert("稿件类型不匹配，请上传.jpg、.gif和.png格式的图片！");</script>';exit;
    }
    if($data['file']['size'] > $data['max_file_size']){
        echo '<script>parent.alert("您上传的稿件过大，请选择2m以下的图片上传！");</script>';exit;
    }
    if(!is_dir($data['img_dir'])){
        @mkdir($data['img_dir'], 0777, true);
    }
    $extend = pathinfo($data['file']['name']);  
    $extend = '.'.strtolower($extend["extension"]);  
    date_default_timezone_set('PRC');
    $imgpath  = $data['img_dir'].'/'.date('Ymdhis', time()).rand(100, 999).'big'.$extend;
    $isupload  = move_uploaded_file($data['file']['tmp_name'], $imgpath);
    $imgpath  ="../common/".$imgpath;
    if(!$isupload){
        echo '<script>parent.alert("稿件上传失败，请尝试重新上传！");</script>';exit;
    }else{
        if(isset($_SESSION['imgpath']) && $_SESSION['imgpath']){
            if(is_file($_SESSION['imgpath'])){
                $b = unlink($_SESSION['imgpath']);//删除大图
            }
            $img_small = str_replace("big","",$_SESSION['imgpath']);
            if(is_file($img_small)){
                $c = unlink($img_small);//删除文件小图
            }
            unset($_SESSION['imgpath']);
        }
        // echo '<script>parent.alert("稿件上传成功！");</script>';
    }
    /* $_SESSION['name']        = $data['file']['name'];*/
    $_SESSION['imgpath'] = $imgpath;
    if(isset($_GET['type'])&&$_GET['type']=='headIcon'){
        require_once "class/resizeimage.php";
        $resizeimage = new resizeimage($imgpath,"100", "100", "1","0");
        return $resizeimage ->dstimg;
    }else{
        require_once "class/resizeimage.php";
        $resizeimage = new resizeimage($imgpath,"250", "200", "1","0");
        return $resizeimage ->dstimg;
    }
    
}


/*test_start*/
if(isset($_FILES['file'])){
    $data = array( 'file' => $_FILES['file'],'img_dir' =>  $upload_config["imgPath"]);
    $imgpath = upload($data);
    echo "<script>parent.stopSend('$imgpath');</script>";
}

?> 