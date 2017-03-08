<?php
namespace User\Controller;
use Think\Controller;
class UserController extends Controller {
    public function _initialize() {
      $this->user = D('User');
      $s=session('name');
      // if (!isset($s)) 


    }
    public function islogin(){

     // $doc = D('index');
      // $doc=new IndexModel();
      $rs=$this->index->fff();
      $this->assign("name",$rs);
      $this->assign("ss",$rs[1]['username']);
      $this->display("index");

    }


    /**
     *  用户登录
     *
     **/
    public function login(){
      $name=I('name');
      $password=I('pass');
      $rs=$this->user->login($name,$password);
      if(!$rs){
        $this->ajaxReturn(array('code'=>-1,'message'=>"账号或者密码不正确"));

      }
      else{
        session("name",$name);
        session("id",$rs[0]['id']);
        // cookie('name',$name);
        $this->ajaxReturn(array('code'=>1,'message'=>"成功"));
      }
       	
    }


    /**
     *  用户退出
     *
     **/

    public function logout(){

      session(null); 
      redirect('/index/index/index');
    }



    /**
     *  包装执行接口
     *
     **/
    public  function index(){
    islogin();
    
    $this->display("test");

    }
    public function test(){
      $this->display("login");
    }
    public  function aja(){

    	foreach ($pa as $key => $value) {
    		echo "key".$key.'value'.$value;
    	}
    	
    	$this->ajaxReturn(array('a'=>1,'b'=>2));
    }
}