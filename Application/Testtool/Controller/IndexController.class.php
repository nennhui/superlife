<?php
namespace Testtool\Controller;
use Think\Controller;
use Testtool\Model\IndexModel ;
class IndexController extends Controller {
    public function _initialize() {
          // $this->doc = D('index');
    }
    public function index(){
     // $doc = D('index');
      // $doc=new IndexModel();
      $rs=$this->doc->fff();
      $this->assign("name",$rs);
      $this->assign("ss",$rs[1]['username']);
      $this->display("index");

    }

    public function jiekou(){


    	$this->display("jiekou");
    }
    public function aja(){

    	foreach ($pa as $key => $value) {
    		echo "key".$key.'value'.$value;
    	}
    	
    	$this->ajaxReturn(array('a'=>1,'b'=>2));
    }
}