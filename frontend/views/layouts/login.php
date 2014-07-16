<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="language" content="en" />
        <link rel="icon" href="<?php echo Yii::app()->request->baseUrl."/images/cnwin_ico.png"; ?>" type="image/x-icon"/>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

	<body>
	    <?php echo $this->renderPartial('application.views.layouts.header',array()); ?>
	    		
		<div class="container">			
			<div class="row">	
			    <br/><br/><br/><br/><br/>	    
				<div class="col-md-6 col-md-offset-3">
					<?php echo $content; ?>
				</div>
			</div>
		</div>

		<?php echo $this->renderPartial('application.views.layouts.footer',array()); ?>

	</body>
</html>
