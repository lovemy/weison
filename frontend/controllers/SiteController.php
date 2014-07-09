<?php
/**
 * SiteController.php
 *
 * @author: hbma <hbma@terdon.com>
 * Date: 7/22/14
 * Time: 1:41 PM
 */

class SiteController extends Controller {
	/**
	 * @return array list of action filters (See CController::filter)
	 */
	public function filters() {
		return array('accessControl');
	}

	public $layout = '//layouts/column2';
	/**
	 * @return array rules for the "accessControl" filter.
	 */
	public function accessRules() {
		return array( 
		array('allow', // Allow registration form for anyone
			'actions' => array('login', 'logout', 'captcha', 'error', 'test'), ), 
		array('allow', // Allow all actions for logged in users ("@")
			'users' => array('*'), ), 
		array('deny'), // Deny anything else
		);
	}
	/**
	 *
	 * @return array actions
	 */
	public function actions() {
		return array('captcha' => array('class' => 'CCaptchaAction', 'backColor' => 0xFFFFFF, 'foreColor' => 0x0099CC, ), 'page' => array('class' => 'CViewAction', ), );
	}

	/**
	 * Renders index page
	 */
	public function actionIndex() 
	{
	 	$this->render('index');
	}

	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error){  
	        if(Yii::app()->request->isAjaxRequest)  
	            echo $error['message'];
	        else{	        	       
	            $this->render('error',array('error'=>$error));	        	
	        }  	
	    }  
	}
}
