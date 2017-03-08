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
	public function ArticleList(){
		$sql=' select a.article_title,a.article_content,a.id,a.create_time,b.user_name from t_article as a join t_user as b on a.user_id=b.id ';
		$rs=$this->getRows($sql);
		return $rs;

	}
	/**
	* 获取文章详情
	*/
	public function ArticleId($id){

		$sql='select * from t_article where id= '.$id;
		echo $sql;
		$rs=$this->getRows($sql);
		return $rs;
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
