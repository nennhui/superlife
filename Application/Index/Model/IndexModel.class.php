<?php
namespace Index\Model;
use Think\Model;


/**
* 
*/
class IndexModel extends Model{
	protected $connection='DB_CONf';
	protected $trueTableName='t_article';


	public function ArticalSave(){
		$sql=' * from user ';
		$rs=$this->getRows($sql);
		return $rs;

	}
	/**
	* 活动列表
	*/
	public function ArticleList($type){
		$whereis="";
		if (!empty($type)){ 
			$whereis="where type=".$type;
		}
		$sql='select a.create_time,a.article_title,a.type,a.article_content,a.id,a.create_time,b.user_name from t_article as a join t_user as b on a.user_id=b.id '.$whereis;
		// echo $sql;
		$rs=$this->getRows($sql);
		return $rs;

	}
	/**
	* 获取评论列表
	*/

	public function Answerlist($id){
		$sql="select a.answer_content,b.user_name  from t_answer as a join t_user as b on a.answer_id=b.id where article_id ='".$id."'";
		$rs=$this->getRows($sql);
		return $rs; 
	}
	/**
	* 文章类型列表
	*/
	public function typeList(){
		$sql=' select * from t_article_type ';
		// echo $sql;
		$rs=$this->getRows($sql);
		return $rs;

	}
	/**
	* 获取文章详情
	*/
	public function ArticleId($id){

		$sql='select * from t_article where id= '.$id;
		$rs=$this->getRows($sql);
		return $rs[0];
	}
	/**
	* 判断用户是否存在
	*/
	public function resourcelist($startpage,$endpage){
		$sql="select * from  user limit  ".$startpage. ",".$endpage ;
		// echo $sql;
		$rs=$this->getRows($sql);
		return $rs;
	}



}
