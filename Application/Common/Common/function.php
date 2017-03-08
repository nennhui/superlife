<?php

	function islogin(){
	    if( !isset($_SESSION['name'])){
	        header('Location:/index.html');}
	    }
	/**
	* 查询ip
	*/  	    
	function index(){
	    	if (isset($_SERVER)){
	    		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
	    			$arr=explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
	    			foreach ($arr as $ip) {
	    				$ip=trim($ip);
	    				if ($ip!='unknown'){
	    					$realip=$ip;
	    					break;
	    				}
	    			}
	    		}

	    		elseif (isset($_SERVER['HTTP_CLIENT_IP']))
	        	{
	            	$realip = $_SERVER['HTTP_CLIENT_IP'];
		        }
		        else
		        {
		            if (isset($_SERVER['REMOTE_ADDR']))
		            {
		                $realip = $_SERVER['REMOTE_ADDR'];
		            }
		            else
		            {
		                $realip = '0.0.0.0';
		            }
		        }
		    }
		    else
		    {
		        if (getenv('HTTP_X_FORWARDED_FOR'))
		        {
		            $realip = getenv('HTTP_X_FORWARDED_FOR');
		        }
		        elseif (getenv('HTTP_CLIENT_IP'))
		        {
		            $realip = getenv('HTTP_CLIENT_IP');
		        }
		        else
		        {
		            $realip = getenv('REMOTE_ADDR');
		        }
		    }

		    return $realip;
	    }


	/**
	* 查询方法封装
	*/   
	function getRows($sql){

			$this->execute("SET NAMES utf8");
			$rs = $this->query($sql);
			return $rs;
		}
	/**
	* 更新方法封装
	*/     
	function exeSql($sql,$parse=false){
			
			$this->execute("SET NAMES utf8");

			$rs = $this->execute($sql,$parse=false);
			return $rs;
		}