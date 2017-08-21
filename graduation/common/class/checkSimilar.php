<?php 
// header('Content-type: text/html;charset=UTF-8');
class LCS {
    var $str1;
    var $str2;
    var $c = array();
    /*返回串一和串二的最长公共子序列
*/  
    //private $_excludeArr = array('的','了','和','呢','啊','哦','恩','嗯','吧');
    function getLCS($str1, $str2, $len1 = 0, $len2 = 0) {
        $str1=$this->dualDecom($str1);
        $str2=$this->dualDecom($str2);
        $this->str1 = $str1;
        $this->str2 = $str2;
        if ($len1 == 0) $len1 = mb_strlen($str1,'utf-8');
        if ($len2 == 0) $len2 = mb_strlen($str2,'utf-8');
        $this->initC($len1, $len2);
        return $this->printLCS($this->c, $len1 - 1, $len2 - 1);
    }
    /*返回两个串的相似度
*/
    function getSimilar($str1, $str2, $standard=false) {
    	$str1=$this->dualDecom($str1);
    	$str2=$this->dualDecom($str2);
        $len1 = mb_strlen($str1,'utf-8');
        $len2 = mb_strlen($str2,'utf-8');
        if($len1==0||$len2==0){
            return 0;
        }
        $len = mb_strlen($this->getLCS($str1, $str2, $len1, $len2),'utf-8');
        //return $len * 2 / ($len1 + $len2);
        //echo $this->getLCS($str1, $str2, $len1, $len2);
        //echo $len.'  '.$len1.'  '.$len2.'<br>';
        if(!$standard){
            if($len1<$len2){
                return $len/$len1;
            }else{
                return $len / $len2;
            }
        }else{
            return $len * 2 / ($len1 + $len2);
        }
        
        
    }
    function initC($len1, $len2) {
        for ($i = 0; $i < $len1; $i++) $this->c[$i][0] = 0;
        for ($j = 0; $j < $len2; $j++) $this->c[0][$j] = 0;
        for ($i = 1; $i < $len1; $i++) {
            for ($j = 1; $j < $len2; $j++) {
                if (mb_substr($this->str1, $i,1,'utf-8') == mb_substr($this->str2, $j,1,'utf-8')) {
                    $this->c[$i][$j] = $this->c[$i - 1][$j - 1] + 1;
                } else if ($this->c[$i - 1][$j] >= $this->c[$i][$j - 1]) {
                    $this->c[$i][$j] = $this->c[$i - 1][$j];
                } else {
                    $this->c[$i][$j] = $this->c[$i][$j - 1];
                }
            }
        }
    }
    function printLCS($c, $i, $j) {
        if ($i == 0 || $j == 0) {
            if (mb_substr($this->str1, $i,1,'utf-8') == mb_substr($this->str2, $j,1,'utf-8')) return mb_substr($this->str2, $j,1,'utf-8');
            else return "";
        }
        if (mb_substr($this->str1, $i,1,'utf-8') == mb_substr($this->str2, $j,1,'utf-8')) {
            return $this->printLCS($this->c, $i - 1, $j - 1).mb_substr($this->str2, $j,1,'utf-8');
        } else if ($this->c[$i - 1][$j] >= $this->c[$i][$j - 1]) {
            return $this->printLCS($this->c, $i - 1, $j);
        } else {
            return $this->printLCS($this->c, $i, $j - 1);
        }
    }

    function dualDecom($str)
    {
        preg_match_all("/[a-zA-z0-9]+/",$str,$eg);//英文单独分离出来
        //所有汉字后添加ASCII的0字符,此法是为了排除特殊中文拆分错误的问题
        $str = preg_replace("/[\x80-\xff]{3}/","\\0".chr(0x00),$str);
        //拆分的分割符
        $search = array(",", "/", "\\", ".", ";", ":", "\"", "!", "~", "`", "^", "(", ")", "?", "-", "\t", "\n", "'", "<", ">", "\r", "\r\n","$", "&", "%", "#", "@", "+", "=", "{", "}", "[", "]", "：", "）", "（", "．", "。", "，", "！", "；", "“", "”", "‘", "’", "［", "］", "、", "—", "　", "《", "》", "－", "…", "【", "】",'的','了','和','呢','啊','哦','呀','恩','嗯','吧','色');
        //替换所有的分割符为空格
        $str = str_replace($search,' ',$str);
        //用正则匹配半角单个字符或者全角单个字符,存入数组$ar
        preg_match_all("/[\x80-\xff]+?\\x00/",$str,$ar);
        $ar = $ar[0];
        //去掉$ar中ASCII为0字符的项目
        $ar_new=array();
        for ( $i = 0; $i < count($ar); $i++ )
        if ($ar[$i] != chr(0x00)) $ar_new[]=$ar[$i];
        $ar = $ar_new;
        unset($ar_new);
        $oldsw = 0;
        //把连续的半角存成一个数组下标,或者全角的每2个字符存成一个数组的下标
        for ( $ar_str = '', $i = 0; $i < count($ar); $i++)
        {
        $sw=mb_strlen($ar[$i],'utf-8');
             if ( $i > 0 and $sw != $oldsw) $ar_str.="";
             
                $oldsw=$sw;
                $ar_str.= $ar[$i];
            
         
         
        }
        //去掉连续的空格
        $ar_str = trim(preg_replace("# {1,}#i"," ",$ar_str));
        $ar_str = preg_replace("/[^\s\x{4e00}-\x{9fa5}]/u",'',$ar_str);
        $rst = $ar_str;
        if(!empty($eg)){
            foreach($eg[0] as $val){$rst.= "$val";}
        }
        return $rst;
    }
}



// $lcs = new LCS();
// require "class/db.php";
// $sql="select concat(l_name,l_feature,l_place,l_date) as concat from found where l_id=21";
// $sql2="select *,concat(l_name,l_feature,l_place,l_date) as concat from lost";
// $db=new DB;
// $rs=$db->get_one($sql);
// $rs2=$db->get_all($sql2);
// // print_r($rs);
// // //返回最长公共子序列
// // echo $lcs->getLCS("钱包黑色，皮包质","钱包LV，皮质");
// // //返回相似度
// foreach ($rs2 as $key => $value) {
// 	// echo $rs['concat'].'  '.$value['concat'].'  ';
// 	echo $lcs->getSimilar($rs['concat'],$value['concat'])."<br>";
// }
