<?php

class AvatarController extends Controller
{

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('uploadimg','cropimg'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
						//'roles'=>array('认证商家'),
				
						'actions'=>array(),
		
						'users'=>array('@'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	

	/**
	 * index page.
	 */
	public function actionIndex()
	{
		$profile = Profile::model()->findByPk(Yii::app()->user->id);		
		$this->render('index',array('profile'=>$profile));
	}

	public function actionUploadimg(){
		if(isset($_POST["PHPSESSID"]))session_id($_POST["PHPSESSID"]);
		if(!empty($_FILES['Filedata'])){			
			$upload = new UploadFile();
			$upload->maxSize =1*1024*1024; // 设置附件上传大小不超过2MB
	        $upload->allowExts = array ('jpg', 'gif', 'png', 'jpeg' ); // 设置附件上传类型
	        $dir= Yii::app()->params['imgFolder'].'/avatar/tmp/';
	       // $upload->savePath = '../../../../cnwin/img/upload/photo/tmp/'.date('Ymd').'/';
	        $upload->saveRule='uniqid';
	        if(!is_dir($dir)){
				mkdir($dir, 0777);
	        }
	        $upload->savePath = $dir;
			if($upload->upload()) {	
				$info =$upload->getUploadFileInfo();
				$url=$info[0]['savepath'].$info[0]['savename'];
				//$str=str_replace('upload','', Yii::app()->params['uploadUrl']);
				$url=Yii::app()->params['imgUrl']."/".str_replace(Yii::app()->params['imgFolder'],'',$url);					// 上传错误提示错误信息
				$data["status"]="1";
				$data["data"]=$url;
			}else{
				$data["status"]="0";
				$data['info']=$upload->getErrorMsg();
			}
		}else{
			$data["status"]="0";
			$data['info']='请选择图片';
		}
		echo  json_encode($data);
		exit;
	}
	
	//裁剪并保存用户头像
	public function actionCropimg(){
		//图片裁剪数据
		$params = $_POST;						//裁剪参数
		if(!isset($params) && empty($params)){
			return;
		}	
		//头像目录地址
		//$path= './Uploads/images/photo/'.date('Ymd').'/';
		$path= Yii::app()->params['imgFolder'].'/avatar/'.date('Ymd').'/';
		$dir= Yii::app()->params['imgFolder'];
        if(!is_dir($path)){
			mkdir($path, 0777);
        }
		$pic=$path.date("YmddHis").rand(1000,9999);
		//import('ORG.Util.Image.ThinkImage');
		//
		$Think_img = new ThinkImage(THINKIMAGE_GD); //THINKIMAGE_IMAGICK
		//'http://img.cnwin.com/2143.jpg'
		//裁剪原图
		$params['src']=$dir.str_replace(Yii::app()->params['imgUrl'],'',$params['src']);
		//print_r($params['src']);exit();
		$ext=$this->get_extension($params['src']);
		//die($params['src']);
		$n['photo']=$pic.'.'.$ext;
		$n['photo_60']=$pic.'_60.'.$ext;
		$n['photo_100']=$pic.'_100.'.$ext;
		$Think_img->open($params['src'])->crop($params['w'],$params['h'],$params['x'],$params['y'])->save($n['photo']);
		$Think_img->open($n['photo'])->thumb(60,60, 1)->save($n['photo_60']);
		$Think_img->open($n['photo'])->thumb(100,100, 1)->save($n['photo_100']);
		$profile=Profile::model()->findByPk(Yii::app()->user->id);
				
		$profile->avatar_sm=Yii::app()->params['imgUrl'].'/'.str_replace($dir, '', $n['photo_60']);
		$profile->avatar_bg=Yii::app()->params['imgUrl'].'/'.str_replace($dir, '', $n['photo_100']);
		$profile->save();
		Yii::app()->user->setFlash('profileMessage','头像上传成功');
		$url=$this->createUrl('avatar/index');
		$this->redirect($url);							
		/*$n['photo']=str_replace('../','./',$n['photo']);
		$n['photo_60']=str_replace('../','./',$n['photo_60']);
		$n['photo_100']=str_replace('../','./',$n['photo_100']);
		M('users_meta')->where(array('uid'=>$_SESSION['user']['id']))->save($n);*/
		//$this->success('上传头像成功');
	}


	function get_extension($file){
		$arr=explode('.', $file);
		return strtolower(end($arr));
	}
	
}
