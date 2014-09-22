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
	
	
	public static function getPassed($update_time)
	{
		$now_str = time();
		$update_str = strtotime($update_time);
		$passed_str = abs($now_str - $update_str);		
		if($passed_str<60){
			$res = $passed_str."秒前";
		}else if($passed_str>=60 && $passed_str<60*60){
			$res = floor($passed_str/60)."分钟前";
		}else if($passed_str>=60*60 && $passed_str<60*60*24){
			$res = floor($passed_str/(60*60))."小时前";
		}else if($passed_str>=60*60*24 && $passed_str<60*60*24*30){
			$res = floor($passed_str/(60*60*24))."天前";
		}else if($passed_str>=60*60*24*30 && $passed_str<60*60*24*30*12){
			$res = floor($passed_str/(60*60*24*30))."个月前";
		}else{
			$res = date("Y年m月d日",strtotime($update_time));
		}
		return $res;
	}
}
