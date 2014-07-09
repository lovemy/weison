<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo isset($this->title) ? $this->title : "牛拦钱网";?></title>
<meta name="keywords" content="<?php echo isset($this->keywords) ? $this->keywords : "牛拦钱网,牛拦钱,项目库，好项目";?>">
<meta name="description" content="<?php echo isset($this->description) ? Core::cutstr(trim(strip_tags($this->description)), 150) : "牛拦钱网,网罗天下好项目";?>">
<link rel="icon" href="<?php echo Yii::app()->request->baseUrl."/images/cnwin_ico.png"; ?>" type="image/x-icon"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap-responsive.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap-responsive.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl;?>/css/bootstrap.min.css"/>

<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/index.css" type="text/css" />
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl;?>/css/use.css" type="text/css" />
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/main.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/sdcms.photo.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/jquery.soChange-min.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/countUp.js"></script>




</head> 
<body>

<div class="row-fluid">

	<?php echo $this->renderPartial('application.views.layouts.header',array()); ?>

	<div id="mainmenu">
		
	</div><!-- mainmenu -->
	
    

       <?php //if(isset($this->breadcrumbs)):?>
		<?php // $this->widget('zii.widgets.CBreadcrumbs', array(
			//'links'=>$this->breadcrumbs,
		//)); ?><!-- breadcrumbs -->
	<?php //endif?>
	<?php echo $content; ?>

	<div class="clear"></div>

	<?php echo $this->renderPartial('application.views.layouts.footer',array()); ?>

</div><!-- page -->

</body>
</html>
