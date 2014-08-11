<?php 
class Core{
	
	public static function getSiteParam($attr)
	{
		$siteSetting = SiteSetting::model()->find();
		if(isset($siteSetting->$attr)){
			return $siteSetting->$attr;
		}else{
			return false;
		}
	}


	public static function getUser($user_id)
	{
		$user = User::model()->findByPk($user_id);
		return $user;
	}
}