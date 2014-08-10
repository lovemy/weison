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
			    $ql = QqLogin::model()->find('openid = :openid',array(':openid'=>$openid));
			    if($ql){
			    	$ql->update_at = date("Y-m-d H:i:s");
			    	if($ql->save(false)){
			    		$user = $ql->user;
			    		$this->autoLogin($user);
			    	}			    	
			    }else{
			    	$user = new User;
			    	$user->username = 'u'.rand(0000,9999).rand(00,11);
			    	if($user->save(false)){	    		
			    		$ql = new QqLogin;			    		
			    		$ql->openid = $openid;
			    		$ql->access_token = $accessToken;
			    		$ql->user_id = $user->id;			    		
			    		$ql->update_at = date("Y-m-d H:i:s");					    		
			    		if($ql->save(false)){
			    			$user = $ql->user;
					    	$this->autoLogin($user);
			    		}
			    	}

			    }
			}
		} else
			$this->redirect(Yii::app()->controller->module->returnUrl);			
	}

}