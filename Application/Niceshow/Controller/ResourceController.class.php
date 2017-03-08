<?php
namespace Niceshow\Controller;
use Think\Controller;
class ResourceController extends Controller {
    public function _initialize() {
      $this->user = D('Resource');
      $s=session('name');
      // if (!isset($s)) 
    }


    /**
     *  资源首页
     *
     **/
    public function index(){
      // $this->assign("menu_path",ROOT_PATH);
      $page=I("page",1);
      $this->assign("menu_path",'C:\wamp\wamp\www\menu.html');
      $total=$this->user->count(id);
      $total_num=ceil($total/20);
      $rs=$this->user->resourcelist(($page-1)*20,$page*20);
      $this->assign("number",$rs);
      $this->assign("page_num",$total_num);
      $this->display('index');

    }

}