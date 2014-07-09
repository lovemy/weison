<?php switch($error['code']){
        case 404 :
	        echo "
	    	<p style='color: red;font-size: 20px;padding-top:20px;'>您要查看的页面不存在或已删除！</p>
			<p style='padding-top:20px;'>请检查您输入的网址是否正确</p>
			<p style='padding:20px;'>您可以回到 <a href=".Yii::app()->createUrl('site/index')."  style='color:blue;'>网站首页</a> </p>";
        break;
} ?>