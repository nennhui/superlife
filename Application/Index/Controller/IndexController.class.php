<?php
namespace Index\Controller;
use Think\Controller;
class IndexController extends Controller {
		public function _initialize() {
		/*****检查登录态****/
		// isLoginStatus();

		$this->index = D('Index');
		$this->assign("menu_path",ROOT_PATH.'');
	}

    public function index(){
    	$rs=$this->index->ArticleList();
    	$this->assign("data",$rs);
    	$this->display("index");
    }
    public function articleId(){
    	$id=I('id','');
    	// echo $id;
    	$rs=$this->index->ArticleId($id);
    	// $this->show("hello");
    	$this->assign('data',$rs[0]);
    	$this->display("article");
    }
    public function articleedit(){
    	$this->display("articleedit");
    }
    public function save(){
    	$title=I('title','');
    	$content=I('content','','addslashes');
    	$data=array(
    		"article_title" =>$title,
    		"article_content" =>$content,
    		);
    	$rs=$this->index->data($data)->add();
    	$this->ajaxReturn(array("code"=>-1,'message'=>"提交成功"));
    }

    public function updata(){
		$ss=$_FILES["upfile"];
		$file = $ss['tmp_name'];
		$type_tmp= explode('.', $ss['name']);
		$length=count($type_tmp);
		$type=$type_tmp[($length-1)];
		echo $file;
		$newfile = ROOT_PATH."/res/upfile/".time().".".$type; //必须有写入权限
		// echo $newfile;
		  if (file_exists($file) == false)
		  {
		   die ('文件不在,无法复制');
		  }
		  $result = copy($file, $newfile);
		  if ($result == false)
		  {
		   echo '复制失败';
		  }

    	// echo $a['size'];
    	$this->ajaxReturn(array('code'=>-1));
    }


	public function downfile(){
			$url="C:/wamp/wamp/www/res/upfile/pangolin.rar";
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename='.basename($url));
			header('Content-Transfer-Encoding: binary');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Pragma: public');
			header('Content-Length: ' . filesize($url));
			readfile($url);
	}

}
