<?php
namespace Org\Util;
use Think\Db;

class WxPay {

	private $curl_timeout = 300;

	public function _set_sign($params){
		$str = '';
		
		if(!empty($params)){
			
			ksort($params);
			
			foreach($params as $key=> $val){
				$str .= $key.'='.$val.'&';
			}

			$str .= 'key='.C('WX_PAY_SECRET');
		}
		return strtoupper(md5($str));
	}

	private function _set_xml($params){
		$xml = '';

		if(!empty($params)){
			$xml .= '<xml>';
			foreach($params as $key=> $val){
				$xml .= '<'.$key.'>'.$val.'</'.$key.'>';
			}
			
			$xml .= '</xml>';
		}
		return $xml;
	}

	/**
	 * curl post 请求
	 * @param $url
	 * @param $post_data
	 * @return
	 */
	private function _url_post($url, $xml_data){
		
		$header[] = "Content-type: text/xml";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml_data);
		$output = curl_exec($ch);
		curl_close($ch);
		return $output;
	}

	/**
	 * 
	 * 统一下单，WxPayUnifiedOrder中out_trade_no、body、total_fee、trade_type必填
	 * appid、mchid、spbill_create_ip、nonce_str不需要填入
	 * @param WxPayUnifiedOrder $inputObj
	 * @param int $timeOut
	 * @throws WxPayException
	 * @return 成功时返回，其他抛异常
	 */
	public function unifiedOrder($data, $timeOut = 6)
	{
		$url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
		//检测必填参数
		if(empty($data['out_trade_no'])) {
			return array('code'=>0, 'err'=>"缺少统一支付接口必填参数out_trade_no！");
		}else if(empty($data['body'])){
			return array('code'=>0, 'err'=>"缺少统一支付接口必填参数body！");
		}else if(empty($data['total_fee'])) {
			return array('code'=>0, 'err'=>"缺少统一支付接口必填参数total_fee！");
		}else if(empty($data['trade_type'])) {
			return array('code'=>0, 'err'=>"缺少统一支付接口必填参数trade_type！");
		}
		
		//关联参数
		if($data['trade_type'] == "JSAPI" && empty($data['openid'])){
			return array('code'=>0, 'err'=>"统一支付接口中，缺少必填参数openid！trade_type为JSAPI时，openid为必填参数！");
		}
		if($data['trade_type'] == "NATIVE" && empty($data['product_id'])){
			return array('code'=>0, 'err'=>"统一支付接口中，缺少必填参数product_id！trade_type为JSAPI时，product_id为必填参数！");
		}
		
		//异步通知url未设置，则使用配置文件中的url
		if(empty($data['notify_url'])){
			return array('code'=>0, 'err'=>"统一支付接口中，缺少必填参数notify_url！");
		}
		
		$data['spbill_create_ip'] = $_SERVER['REMOTE_ADDR'];	//终端ip
		$data['nonce_str']= $this->getNonceStr();		//随机字符串

		//签名
		$sign= $this->_set_sign($data);

		$data['sign'] = $sign;
		
		$xml_data = $this->_set_xml($data);
		
		$startTimeStamp = $this->getMillisecond();//请求开始时间
		$response = $this->postXmlCurl($xml_data, $url, false, $timeOut);
		$rs_arr = $this->FromXml($response);
		
		if($rs_arr['result_code'] == 'SUCCESS'){
			return $rs_arr['prepay_id'];
		}else{
			return false;
		}
	}

	/**
	 * 
	 * 产生随机字符串，不长于32位
	 * @param int $length
	 * @return 产生的随机字符串
	 */
	public function getNonceStr($length = 32) 
	{
		$chars = "abcdefghijklmnopqrstuvwxyz0123456789";  
		$str ="";
		for ( $i = 0; $i < $length; $i++ )  {  
			$str .= substr($chars, mt_rand(0, strlen($chars)-1), 1);  
		} 
		return $str;
	}

	/**
	 * 以post方式提交xml到对应的接口url
	 * 
	 * @param string $xml  需要post的xml数据
	 * @param string $url  url
	 * @param bool $useCert 是否需要证书，默认不需要
	 * @param int $second   url执行超时时间，默认30s
	 * @throws WxPayException
	 */
	private static function postXmlCurl($xml, $url, $useCert = false, $second = 30)
	{		
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $second);
		
		//如果有配置代理这里就设置代理
		/*if(C('CURL_PROXY_HOST') != "0.0.0.0" 
			&& C('CURL_PROXY_PORT') != 0){
			curl_setopt($ch,CURLOPT_PROXY, C('CURL_PROXY_HOST'));
			curl_setopt($ch,CURLOPT_PROXYPORT, C('CURL_PROXY_PORT'));
		}*/
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,TRUE);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,2);//严格校验
		//设置header
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		//要求结果为字符串且输出到屏幕上
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
	
		if($useCert == true){
			//设置证书
			//使用证书：cert 与 key 分别属于两个.pem文件
			curl_setopt($ch,CURLOPT_SSLCERTTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLCERT, C('SSLCERT_PATH'));
			curl_setopt($ch,CURLOPT_SSLKEYTYPE,'PEM');
			curl_setopt($ch,CURLOPT_SSLKEY, C('SSLKEY_PATH'));
		}
		//post提交方式
		curl_setopt($ch, CURLOPT_POST, TRUE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		//运行curl
		$data = curl_exec($ch);
		//返回结果
		if($data){
			curl_close($ch);
			return $data;
		} else { 
			$error = curl_errno($ch);
			curl_close($ch);
			return false;
		}
	}

	/**
	 * 获取毫秒级别的时间戳
	 */
	private static function getMillisecond()
	{
		//获取毫秒的时间戳
		$time = explode ( " ", microtime () );
		$time = $time[1] . ($time[0] * 1000);
		$time2 = explode( ".", $time );
		$time = $time2[0];
		return $time;
	}

	/**
	 * 
	 * 构造获取code的url连接
	 * @param string $redirectUrl 微信服务器回跳的url，需要url编码
	 * 
	 * @return 返回构造好的url
	 */
	public function __CreateOauthUrlForCode($redirectUrl)
	{
		$urlObj["appid"] = C('appid');
		$urlObj["redirect_uri"] = "$redirectUrl";
		$urlObj["response_type"] = "code";
		$urlObj["scope"] = "snsapi_userinfo";
		$urlObj["state"] = "STATE"."#wechat_redirect";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://open.weixin.qq.com/connect/oauth2/authorize?".$bizString;
	}

	/**
	 * 
	 * 拼接签名字符串
	 * @param array $urlObj
	 * 
	 * @return 返回已经拼接好的字符串
	 */
	private function ToUrlParams($urlObj)
	{
		$buff = "";
		foreach ($urlObj as $k => $v)
		{
			if($k != "sign"){
				$buff .= $k . "=" . $v . "&";
			}
		}
		
		$buff = trim($buff, "&");
		return $buff;
	}

	/**
	 * 
	 * 通过code从工作平台获取openid机器access_token
	 * @param string $code 微信跳转回来带上的code
	 * 
	 * @return openid
	 */
	public function GetOpenidFromMp($code)
	{
		$url = $this->__CreateOauthUrlForOpenid($code);
		//初始化curl
		$ch = curl_init();
		//设置超时
		curl_setopt($ch, CURLOPT_TIMEOUT, $this->curl_timeout);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		/*if(C('CURL_PROXY_HOST') != "0.0.0.0" 
			&& C('CURL_PROXY_PORT') != 0){
			curl_setopt($ch,CURLOPT_PROXY, C('CURL_PROXY_HOST'));
			curl_setopt($ch,CURLOPT_PROXYPORT, C('CURL_PROXY_PORT'));
		}*/
		//运行curl，结果以jason形式返回
		$res = curl_exec($ch);
		curl_close($ch);
		//取出openid
		$data = json_decode($res,true);
		$this->data = $data;
		$openid = $data['openid'];
		return $openid;
	}

	/**
	 * 
	 * 构造获取open和access_toke的url地址
	 * @param string $code，微信跳转带回的code
	 * 
	 * @return 请求的url
	 */
	public function __CreateOauthUrlForOpenid($code)
	{
		$urlObj["appid"] = C('appid');
		$urlObj["secret"] = C('appsecret');
		$urlObj["code"] = $code;
		$urlObj["grant_type"] = "authorization_code";
		$bizString = $this->ToUrlParams($urlObj);
		return "https://api.weixin.qq.com/sns/oauth2/access_token?".$bizString;
	}
	
	/**
     * 将xml转为array
     * @param string $xml
     * @throws WxPayException
     */
	public function FromXml($xml)
	{	
		if(!$xml){
			return false;
		}
        //将XML转为array
        //禁止引用外部xml实体
        libxml_disable_entity_loader(true);
        $this->values = json_decode(json_encode(simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA)), true);		
		return $this->values;
	}
}