<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");

$this->breadcrumbs=array(
	UserModule::t("Profile") => array('/user/profile'),
	UserModule::t("Change password"),
);

$this->menu=array(
	((UserModule::isAdmin())?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')):array()),
	array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
	array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
	array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
	array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?>

<div class="row">
    	
    	<div class="col-lg-3">
	              <?php echo $this->renderPartial('common.modules.user.views.layouts.avatar_info',array()); ?>
		<?php echo $this->renderPartial('common.modules.user.views.layouts.nav',array()); ?>	        	   
	</div>

	<div class="col-lg-9">
		<?php echo $this->renderPartial('common.modules.user.views.layouts.tab',array()); ?>

		<h1><?php //echo UserModule::t("Change password"); ?></h1>

		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
			'id'=>'changepassword-form',
			'enableAjaxValidation'=>true,
			'type'=>'horizontal',
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); ?>

			<?php if(Yii::app()->user->hasFlash('profileMessage')){ ?>
				<div class="alert in fade alert-success">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<?php echo Yii::app()->user->getFlash('profileMessage');?>
				</div>
			<?php } ?>

			<p class="help-block">带<span class="required">*</span>为必填内容.</p>

			<?php echo $form->errorSummary($model); ?>
	
			<?php echo $form->passwordFieldGroup($model,'oldPassword',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

			<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

			<?php echo $form->passwordFieldGroup($model,'verifyPassword',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	
			<div class="form-actions">
				<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					'htmlOptions'=>array('style'=>'margin-left:220px;'),
					'context'=>'primary',
					'label'=>'保存修改',
				)); ?>
			</div>

		<?php $this->endWidget(); ?>

	</div>
</div>