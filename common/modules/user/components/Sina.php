<?php

/**
 * SinaConnect.php
 * oauth2.0 connect components for sina
 * @author: hbma <mhb@cnwin.com>
 * Date: 03/19/14
 * Time: 3:21 PM
 */

class Sina{

	const APPID = '3339557939';
	const APPKEY = 'ae86803016d136ef11ff3fcc0ec8c9d7';
	const REDIRECT_URI = 'http://t.niulanqian.com/user/sinaLogin';	

	/**
	 * 获取code,供以后获取accessToken使用
	 *@param
	 * client_id 必填 string 申请应用时分配的AppKey
	 * redirect_uri 必填 string 授权回调地址，站外应用需与设置的回调地址一致，站内应用需填写canvas page的地址
	 * scope 非必填 string 申请scope权限所需参数，可一次申请多个scope权限，用逗号分隔
	 * state 非必填 string 用于保持请求和回调的状态，在回调时，会回传该参数
    	 * display 非必填 string	授权页面的终端类型
	 * forcelogin 非必填 boolean	是否强制用户重新登录，true：是，false：否。默认false。
	 * language 非必填 string 授权页语言，缺省为中文简体版，en为英文版
	 */
	public static function getAuthorizeCodeURL()
	{
		$state = md5(rand(5, 10));
       		Yii::app()->session->add('sina_state',$state);        
		$params = array();
		$params['client_id'] = self::APPID;
		$params['redirect_uri'] = self::REDIRECT_URI;		
		$params['response_type'] = 'code';		
		$params['state'] = $state;		
		return "https://api.weibo.com/oauth2/authorize" . "?" . http_build_query($params);
	}
    
    	/**
	 * 获取accessToken
	 * 返回accessToken，uid
	 * 注意，新浪很变态，虽然是说用post提交，但参数还得是get形式，串在url里
	 */
	public static function getAccessToken($code, $state)
	{		
		if(Yii::app()->session['sina_state'] == $state){
			$params['grant_type'] = 'authorization_code';
	        		$params['client_id'] = self::APPID;
			$params['client_secret'] = self::APPKEY;
		    	$params['code']	= $code;
		    	$params['redirect_uri'] = self::REDIRECT_URI;
		    	$url = "https://api.weibo.com/oauth2/access_token" . "?" . http_build_query($params);
		    	return self::postSubmit($url,$params);
		}else{
			return false;
		}
	}
	
	/**
	 * 查询用户access_token的授权相关信息
	 * 包括授权时间，过期时间和scope权限
	 * 注意，新浪很变态，虽然是说用post提交，但参数还得是get形式，串在url里
	 */
	public static function getTokenInfo($accessToken)
	{		
		$url = 'https://api.weibo.com/oauth2/get_token_info' . "?access_token=".$accessToken;
		return self::postSubmit($url,'');
	}


	/**
	 * 授权回收接口，帮助开发者主动取消用户的授权
	 */
	public static function cancleOath($accessToken)
	{
		$url = 'https://api.weibo.com/oauth2/revokeoauth2' . "?access_token=".$accessToken;
		return self::getSubmit($url);
	} 
    

	/**
	 * 获取用户信息
 	* access_token  string	采用OAuth授权方式为必填参数
 	* uid 需要查询的用户ID
 	* 未通过审核，只能在管理中心添加测试号
 	*/
	public static function getUserInfo($accessToken ,$uid)
	{
	    	$params['access_token'] = $accessToken;    	
	    	$params['uid'] = $uid;
	    	$url = 'https://api.weibo.com/2/users/show.json'."?".http_build_query($params);
	    	return self::getSubmit($url);
	}

	/**
    	* 利用curl的模拟get提交数据
     	*/
	public static function getSubmit($url)
	{
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}


	/**
	 * 利用curl模拟post提交数据
	 */
	public static function postSubmit($url,$data)
	{	
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		$result = curl_exec($ch);
		curl_close($ch);
		return $result;
	}
}