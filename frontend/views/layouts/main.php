<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
        <link rel="icon" href="<?php echo Core::getSiteParam('frontend_icon');?>" type="image/x-icon"/>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->params['frontendUrl'];?>/css/styles.css">	
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
		
		<?php echo $this->renderPartial('application.views.layouts.header',array()); ?>
					
		<div class="container">
			<div class="row">
			    <?php $isIndex = Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index';?>
				<div class="col-md-12">
				    <?php if(isset($this->breadcrumbs)):?>
						<?php if(!(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index')){ ?>
						<br/>
						<?php $this->widget('booster.widgets.TbBreadcrumbs', array(
							'links'=>$this->breadcrumbs,
						)); ?>
						
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
