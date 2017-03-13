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
	public function id(){
		$config =C('editor_config');
		if(isset($_REQUEST['action']) && ($_REQUEST['action']=='uploadimage')){


			$fileTypes = array('jpg','jpeg','gif','png','JPG','JPEG','GIF','PNG'); // File extensions

			$filesize = $_FILES['upfile']['size'];


			$tempFile = $_FILES['upfile']['tmp_name'];
			$fileParts = pathinfo($_FILES['upfile']['name']);
			$targetPath = C('PRO_IMG_PATH');
			$targetName = 'neng_'.uniqid().'.'.$fileParts['extension'];
			$newfile = ROOT_PATH."/res/upfile/".$targetName;
			if($filesize > 500*1024){
				$this->ajaxReturn(array('code'=>'-1', 'message'=>'图片过大，请调整图片大小'), 'JSON');	
			}
			if (!in_array($fileParts['extension'], $fileTypes))
			{
				$this->ajaxReturn(array('code'=>'-1', 'message'=>'格式不正常'), 'JSON');
			}
			move_uploaded_file($tempFile,$newfile);
			$result = array(
				'state' => 'SUCCESS',
				'url'	 => '/res/upfile/'.$targetName,
				'type'	 => $fileParts['extension'],
				'title'  => $targetName
					);
			$this->ajaxReturn($result, 'JSON');

		}
		else{
			$this->ajaxReturn($config, 'JSON');
			}	
	}
	public function articleshow(){

		$articleid=I('articleid','','intval');
		$data=$this->index->ArticleId($articleid);
		$answerlist=$this->index->Answerlist($articleid);
		$answer_num=count($answerlist);
		$this->assign('num',$answer_num);
		$this->assign('data',$data);
		$this->assign('id',$articleid);
		$this->assign('answerlist',$answerlist);
		$this->display("articleshow");
	}

    public function index(){
    	$type=I("type",'');
    	$rs=$this->index->ArticleList($type);
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
    	$rs=$this->index->typeList();
    	$this->assign('typelist',$rs);
    	$this->display("articleedit");
    }
    public function save(){
    	$content=I('content','','addslashes');
    	$content=stripslashes($content);
    	$type=I('type','');
    	$title=I('title','');
    	$data=array(
    		"user_id" =>$_SESSION["id"],
    		"article_content" =>$content,
    		"type" =>$type,
    		"article_title" =>$title,
    		);
    	$rs=$this->index->data($data)->add();
    	$this->ajaxReturn(array("code"=>1,'message'=>"提交成功"));
    }
    public function ff(){
    	$this->display("test");
    }
    public function updata(){
		$ss=$_FILES["upfile"];
		$file = $ss['tmp_name'];
		$type_tmp= explode('.', $ss['name']);
		$length=count($type_tmp);
		$type=$type_tmp[($length-1)];
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
