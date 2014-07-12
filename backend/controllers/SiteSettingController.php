<?php

class SiteSettingController extends Controller
{
	/**
	* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	* using two-column layout. See 'protected/views/layouts/column2.php'.
	*/
	public $layout='//layouts/column2';

	/**
	* @return array action filters
	*/
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	public function accessRules()
	{
		return array(			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array(),
				'users'=>array('@'),
			),
			
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	* Displays a particular model.
	* @param integer $id the ID of the model to be displayed
	*/
	public function actionView()
	{
		$model = SiteSetting::model()->find();
		$this->render('_view',array(
			'model'=>$model,
		));
	}



	/**
	* Updates a particular model.
	* If update is successful, the browser will be redirected to the 'view' page.
	* @param integer $id the ID of the model to be updated
	*/
	public function actionUpdate()
	{
		$model=SiteSetting::model()->find();


		if(isset($_POST['SiteSetting']))
		{
			$model->attributes=$_POST['SiteSetting'];
			if($model->save())
				$this->redirect(array('view'));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}


}
