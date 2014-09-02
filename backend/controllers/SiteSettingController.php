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
	// public function filters()
	// {
	// 	return array(
	// 		'accessControl', // perform access control for CRUD operations
	// 	);
	// }

	/**
	* Specifies the access control rules.
	* This method is used by the 'accessControl' filter.
	* @return array access control rules
	*/
	// public function accessRules()
	// {
	// 	return array(			
	// 		array('allow', // allow authenticated user to perform 'create' and 'update' actions
	// 			'actions'=>array(),
	// 			'users'=>array('@'),
	// 		),
			
	// 		array('deny',  // deny all users
	// 			'users'=>array('*'),
	// 		),
	// 	);
	// }

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

	public function actionUpload()
	{
		$dir = '/home/wwwroot/weison/img/upload/';

		$_FILES['file']['type'] = strtolower($_FILES['file']['type']);

		if ($_FILES['file']['type'] == 'image/png'
		|| $_FILES['file']['type'] == 'image/jpg'
		|| $_FILES['file']['type'] == 'image/gif'
		|| $_FILES['file']['type'] == 'image/jpeg'
		|| $_FILES['file']['type'] == 'image/pjpeg')
		{
			// setting file's mysterious name
			$filename = md5(date('YmdHis')).'.jpg';		    

			// copying
			move_uploaded_file($_FILES['file']['tmp_name'], $dir.$filename);

			//更新图片库
			$key = $_FILES['file']['name'];
			$backendImgJsonFile = Yii::app()->params['backendImgJsonFile'];
			if(!file_exists($backendImgJsonFile)){
				touch($backendImgJsonFile);		    	
			}		
			$contents = json_decode(file_get_contents($backendImgJsonFile));
			$imgExist = false;
			if(is_array($contents)){
				foreach($contents as $v){
					if($v->key === $key){
						$imgExist = true;
					}			
				}
				if(!$imgExist){
					$index = count($contents);
					$imgArray = json_decode(json_encode(array(array('thumb'=>Yii::app()->params['imgUrl'].'/upload/'.$filename,'image'=>Yii::app()->params['imgUrl'].'/upload/'.$filename,'title'=>'image '.($index+1),'folder'=>'upload','key'=>$key))));
					$contents = json_encode(array_merge($contents,$imgArray));				
					$handle = fopen($backendImgJsonFile, 'w');
					fwrite($handle, $contents);
					fclose($handle);
				}
			}else{
				$contents = json_encode(array(array('thumb'=>Yii::app()->params['imgUrl'].'/upload/'.$filename,'image'=>Yii::app()->params['imgUrl'].'/upload/'.$filename,'title'=>'image 1','folder'=>'upload','key'=>$key)));
				$handle = fopen($backendImgJsonFile, 'w');
				fwrite($handle, $contents);
				fclose($handle);
			}											 
			   
			// displaying file
			$array = array(
				'filelink' => "http://img.weison.com/upload/".$filename,
			);
			echo stripslashes(json_encode($array));
		}
	}

}