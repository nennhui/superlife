<?php
namespace Index\Controller;
use Think\Controller;
class AnswerController extends Controller {
		public function _initialize() {
		/*****检查登录态****/
		// isLoginStatus();

		$this->answer = D('Answer');
		$this->assign("menu_path",ROOT_PATH.'');
	}
	public function answer(){
		$content=I('content','');
		$id=I('articleid','');
		$data=array( 
			'answer_content' =>$content,
			'answer_id'   =>$_SESSION['id'],
			'article_id'  =>$id,
			);
		$is=array(
			'a' =>1,
			'b' =>2,
			);
		$rs=$this->answer->data($data)->add();
		$this->ajaxReturn(array('code'=>1,'message'=>'提交成功'));
	}

}
