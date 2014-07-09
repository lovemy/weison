<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl."/images/cnwin_ico.png"; ?>" type="image/x-icon"/>
		<!-- blueprint CSS framework -->
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
		<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
		<![endif]-->

		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
		
		<?php echo $this->renderPartial('application.views.layouts.header',array()); ?>
					
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span2">			
					<?php
						if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index') 
					    	echo $this->renderPartial('application.views.layouts.navbar',array()); 
					    else
					    	echo $this->renderPartial('application.views.layouts.nav',array()); 
					?>
				</div>
				<div class="span10">
				     <?php if(isset($this->breadcrumbs)):?>
						<?php if(!(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index')){ ?>
						<div class="breadcrumb" style="background: #dddddd;">
							<?php $this->widget('zii.widgets.CBreadcrumbs', array(
								'links'=>$this->breadcrumbs,
							)); ?><!-- breadcrumbs -->
						</div>
						<?php } ?>
					<?php endif?>

					<?php echo $content; ?>

					<div class="clear"></div>
				</div>
			</div>
		</div>

		<?php echo $this->renderPartial('application.views.layouts.footer',array()); ?>

	</body>
</html>
