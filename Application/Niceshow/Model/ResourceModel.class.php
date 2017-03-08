<?php
namespace Niceshow\Model;
use Think\Model;


/**
* 
*/
class ResourceModel extends Model{
	protected $connection='DB_CONf';
	protected $trueTableName='user';


	public function fff(){
		$sql='select * from user ';
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
