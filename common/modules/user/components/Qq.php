<?php

/**
 * Qq.php
 * oauth2.0 connect components for qq
 * @author: hbma <mhb@cnwin.com>
 * Date: 03/19/14
 * Time: 3:21 PM
 */

class Qq{

	const APPID = '101145780';
	const APPKEY = 'a9931aaa3c79b21ccd4ba297cfe88a65';
	const REDIRECT_URI = 'http://t.niulanqian.com/user/qqLogin';

	/**
	 * 获取code,供以后获取accessToken使用
	 */
	public static function getAuthorizeCodeURL()
	{
		$state = md5(rand(5, 10));
        		Yii::app()->session->add('qq_state',$state);        
		$params = array();
		$params['response_type'] = 'code';
		$params['client_id'] = self::APPID;
		$params['redirect_uri'] = self::REDIRECT_URI;		
		$params['state'] = $state;		
		return "https://graph.qq.com/oauth2.0/authorize" . "?" . http_build_query($params);
	}
    
    	/**
	 * 获取accessToken,供以后获取用户信息
	 */
	public static function getAccessToken($code, $state)
	{
		if(Yii::app()->session['qq_state'] == $state){
			$params['grant_type'] = 'authorization_code';
	        		$params['client_id'] = self::APPID;
			$params['client_secret'] = self::APPKEY;
	    		$params['code']	= $code;
	    		$params['redirect_uri'] = self::REDIRECT_URI;
	    		$url = "https://graph.qq.com/oauth2.0/token" . "?" . http_build_query($params);
	    		$str =  self::getSubmit($url);	
	    		preg_match('/access_token=(.*?)&/ms',$str,$p); 
			if(isset($p[1]))
				return $accessToken = trim($p[1]);
			else
				return false;
		}else{
			return false;
		}
	}
	
	/**
	 * 由于accessToken有效期为30天，故需要续期
	 */
	public static function refreshAaccessToken($refreshToken)
	{
		$params['grant_type'] = 'refresh_token';
		$params['client_id'] = self::APPID;
		$params['client_secret'] = self::APPKEY;
		$params['refresh_token'] = $refreshToken;
		$url = 'https://graph.qq.com/oauth2.0/token' . "?" . http_build_query($params);
		return self::getSubmit($url);
	}

    	/**
    	 * 获取用户openId
    	 */
   	 public static function getOpenId($accessToken)
   	 {
    		$url = 'https://graph.qq.com/oauth2.0/me' . "?" . "access_token=" . $accessToken;    	
    		$str = self::getSubmit($url);
		preg_match('/openid":"(.*?)"}/ms',$str,$p); 
		if(isset($p[1]))
			return $openid = trim($p[1]);
		else
			return false;
	 }

    	/**
     	* 获取用户信息
     	*/
    	public static function getUserInfo($accessToken ,$openid)
    	{
	    	$params['access_token'] = $accessToken;
	    	$params['oauth_consumer_key'] = self::APPID;
	    	$params['openid'] = $openid;
	    	$url = 'https://graph.qq.com/user/get_user_info'."?".http_build_query($params);
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
}
