<?php
namespace Index\Model;
use Think\Model;


/**
* 
*/
class AnswerModel extends Model{
	protected $connection='DB_CONf';
	protected $trueTableName='t_answer';



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




}
