<?php

/**
 * SinaLoginController.php
 * oauth2.0 connect components for qq
 * @author: hbma <mhb@cnwin.com>
 * Date: 03/19/14
 * Time: 3:21 PM
 */

class SinaLoginController extends Controller
{
	// public $layout = '//layouts/login';

	/**
	 * qq登录
	 */
	public function actionIndex()
	{		
		
		if (Yii::app()->user->isGuest) {
			if(isset($_GET['code']) && isset($_GET['state'])){
				$token= json_decode(Sina::getAccessToken($_GET['code'], $_GET['state']));
				$accessToken = $token->access_token;
				$uid = $token->uid;
				$sinaUser = SinaUsers::model()->find('uid = :uid',array(':uid'=>$uid));
				if(!$sinaUser){
				              $userInfo = json_decode(Sina::getUserInfo($accessToken,$uid));				              
				    	//首次进入创建网站的用户
				    	$user = new User;
				    	$user->username = 'su_'.$uid;
				    	if($user->save(false)){
				    		//存qq登录表
				    		$sinaUser = new SinaUsers;
				    		$sinaUser->user_id = $user->id;
				    		$sinaUser->uid = $uid;
				    		$sinaUser->access_token = $accessToken;
				    		$sinaUser->update_at = date('Y-m-d H:i:s');
				    		$sinaUser->save(false);
				    		//存网站用户的属性表
				    		$profile = new Profile;
				    		$profile->user_id = $user->id;				    		
				    		$profile->nickname = $userInfo->name;
				    		$profile->gender = $userInfo->gender == 'm' ? "男" : "女";				    		
				    		$profile->avatar_bg = $userInfo->avatar_hd;
				    		$profile->avatar_sm = $userInfo->avatar_large;
				    		$profile->save(false);
				    		//自动登录
				    		$identity=UserIdentity::createAuthenticatedIdentity($user);
						$identity->authenticate();				
						if(Yii::app()->user->login($identity,'')){
							$this->redirect(Yii::app()->user->returnUrl);
						}
				    	}
				}else{
					//更新qq登录表
					$sinaUser->access_token = $accessToken;
					$sinaUser->update_at = date('Y-m-d H:i:s');
					$sinaUser->save(false);
					//查询用户自动登录
					$user = User::model()->findByPk($sinaUser->user_id);
					$identity=UserIdentity::createAuthenticatedIdentity($user);
					$identity->authenticate();				
					if(Yii::app()->user->login($identity,'')){
						$this->redirect(Yii::app()->user->returnUrl);
					}
				}
			    
			}
		} else
			$this->redirect(Yii::app()->user->returnUrl);			
	}

}