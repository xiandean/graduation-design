<?php

class page{
    public     $first_row;        //起始行数
 
    public     $list_rows;        //列表每页显示行数
     
    protected  $total_pages;      //总页数
 
    protected  $total_rows;       //总行数
     
    protected  $now_page;         //当前页数
    
    protected  $table;

    protected  $condition;

    protected  $select;

    protected  $order;

    public function __construct($data = array(),$db='')
    {
        if($db){
            $this->db=$db;
        }else{
            require_once "../common/class/db.php";
            $this->db=new DB;
        }
        
        $this->table=!empty($data['table']) ? $data['table'] : '';
        $this->condition=!empty($data['condition']) ? $data['condition'] : '';
        $this->select=!empty($data['select']) ? $data['select'] : '*';
        $this->order=!empty($data['order']) ? $data['order'] : 'p_date';
        $this->total_rows = $this->getCount($this->table,$this->condition);
        /*$this->parameter         = !empty($data['parameter']) ? $data['parameter'] : '';*/
        $this->list_rows         = !empty($data['pageRows']) && $data['pageRows'] <= 100 ? $data['pageRows'] : 15;
        $this->total_pages       = ceil($this->total_rows / $this->list_rows);
     
        /* 当前页面 */
        if(!empty($data['pageNow']))
        {
            $this->now_page = intval($data['pageNow']);
        }else{
            $this->now_page   = 1;
        }
        $this->now_page   = $this->now_page <= 0 ? 1 : $this->now_page;
     
         
        if(!empty($this->total_pages) && $this->now_page > $this->total_pages)
        {
            $this->now_page = $this->total_pages;
        }
        $this->first_row = $this->list_rows * ($this->now_page - 1);
    }   
     

    protected function getCount($table,$condition=''){
       
        $sql="select count(*) as total from $table $condition";
        $result= $this->db->query($sql);
        $count=mysql_result($result,0,'total');
        return $count;
    }

    protected function getData($table,$condition='',$select='',$order=''){
        $sql="select $select from $table $condition order by $order desc limit $this->first_row,$this->list_rows";
        $list= $this->db->get_all($sql);
        return $list;
    }

    protected function up_page()
    {
        if($this->now_page != 1)
        {
            return $this->now_page - 1;
        }else{
            return 0;    
        }
    }
     
    protected function down_page()
    {
        if($this->now_page < $this->total_pages)
        {
            return $this->now_page + 1;
        }
        return $this->total_pages+1;
    }
 
 
    
    public function showData()
    {
        if($this->total_pages > 0)
        {
            $return = array();
            $list=$this->getData($this->table,$this->condition,$this->select,$this->order);
            $return['list']=$list;
            $return['count']=$this->total_rows;
            $return['pageNow']=$this->now_page;
            $return['pageTotal']=$this->total_pages;
            $return['pageRows']= $this->list_rows;
            $return['pageNav']=array();
            if($this->up_page()!=0){
                $return['pageNav'][0]=array('class'=>'pager-prev','text'=>'上一页','pageIndex'=>$this->up_page());
            }
            for($i = 1;$i<=$this->total_pages;$i++)
            {
                if($i == $this->now_page)
                {
                    $return['pageNav'][$i]=array('class'=>'pageNow','text'=>$i,'pageIndex'=>$i);
                }
                else
                {
                    if($this->now_page-$i>=4 && $i != 1)
                    {
                        $return['pageNav'][$i]=array('class'=>'pageLess','text'=>'...','pageIndex'=>$this->now_page-3);
                        $i = $this->now_page-3;
                    }
                    else
                    {
                        if($i >= $this->now_page+3 && $i != $this->total_pages)
                        {
                            $return['pageNav'][$i]=array('class'=>'pageMore','text'=>'...','pageIndex'=>$this->now_page+3);
                            $i = $this->total_pages;
                        }
                        $return['pageNav'][$i]=array('class'=>'','text'=>$i,'pageIndex'=>$i);
                    }
                }
            }
            if($this->down_page()!=$this->total_pages+1){
                $return['pageNav'][$this->total_pages+1]=array('class'=>'pager-next','text'=>'下一页','pageIndex'=>$this->down_page());
            }
            return $return;
        }
    }    
}
?>

<!-- $params = array(
    'table'=>'lost', #表名(必须)
    'now_page'  =>$_GET['p'],  #url?p=?(必须)
    'list_rows' =>10, #每一页记录数(可选) 默认为15
    'condition'=>'where l_id<40' #查询条件，如‘id<50’,可选
);

$sepPage = new page($params);
$page=$sepPage->showData();
//$page.list 当前页的记录
//$page.count 全部记录
//$page.pageTotal 共多少页
//$page.pageRows  每页多少条记录
//$page.pageNow  当前为第几页
//$page.pageNav 分页页数导航条数据
 -->