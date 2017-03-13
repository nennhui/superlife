<?php
namespace User\Model;
use Think\Model;


/**
* 
*/
class UserModel extends Model{
	protected $connection='DB_CONf';
	protected $trueTableName='t_user';


	public function fff(){
		$sql='select * from user ';
		$rs=$this->getRows($sql);
		return $rs;

	}
	/**
	* 判断用户账号密码是否正确
	*/
	public function isright_user($name,$pass){
		$rsl=false;
		$sql="select * from  t_user where user_name= '".$name."' and  user_pass ='" .$pass."'";
		// echo $sql;
		$rs=$this->getRows($sql);
		if(!empty($rs[0]['id'])) {
			$rsl=$rs;
		}
		return $rsl;
		
		
	}
	/**
	* 判断用户是否存在
	*/
	public function isset_name($name){
		$rsl=false;
		$sql="select * from  t_user where user_name= '".$name."'";
		// echo $sql;
		$rs=$this->getRows($sql);
		if(!empty($rs[0]['id'])) {
			$rsl=$rs;
		}
		return $rsl;
		
		
	}


}
