<?php

/**
 * QqLoginController.php
 * oauth2.0 connect components for qq
 * @author: hbma <mhb@cnwin.com>
 * Date: 03/19/14
 * Time: 3:21 PM
 */

class QqLoginController extends Controller
{
	// public $layout = '//layouts/login';

	/**
	 * qq登录
	 */
	public function actionIndex()
	{		
		
		if (Yii::app()->user->isGuest) {
			if(isset($_GET['code']) && isset($_GET['state'])){
				$accessToken = Qq::getAccessToken($_GET['code'], $_GET['state']);
				$openid = Qq::getOpenId($accessToken);
				$qqUser = QqUsers::model()->find('openid = :openid',array(':openid'=>$openid));
				if(!$qqUser){
				              $userInfo = json_decode(Qq::getUserInfo($accessToken ,$openid));				    	
				    	//首次进入创建网站的用户
				    	$user = new User;
				    	$user->username = 'qu_'.strtolower($openid);
				    	if($user->save(false)){
				    		//存qq登录表
				    		$qqUser = new QqUsers;
				    		$qqUser->user_id = $user->id;
				    		$qqUser->openid = $openid;
				    		$qqUser->access_token = $accessToken;
				    		$qqUser->update_at = date('Y-m-d H:i:s');
				    		$qqUser->save(false);
				    		//存网站用户的属性表
				    		$profile = new Profile;
				    		$profile->user_id = $user->id;
				    		$profile->nickname = $userInfo->nickname;
				    		$profile->gender = $userInfo->gender;
				    		$profile->born = $userInfo->year;
				    		$profile->avatar_bg = $userInfo->figureurl_qq_2;
				    		$profile->avatar_sm = $userInfo->figureurl_qq_1;
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
					$qqUser->access_token = $accessToken;
					$qqUser->update_at = date('Y-m-d H:i:s');
					$qqUser->save(false);
					//查询用户自动登录
					$user = User::model()->findByPk($qqUser->user_id);
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