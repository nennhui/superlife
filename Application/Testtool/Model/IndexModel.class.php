<?php
namespace Testtool\Model;
use Think\Model;


/**
* 
*/
class IndexModel extends Model{
	
	protected $connection='DB_CONf';
	protected $trueTableName='user';
	public function fff(){
		$sql='select * from user ';
		$rs=$this->getRows($sql);
		return $rs;
	}



}
