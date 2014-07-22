<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Change password");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Change password"),
);
?>

<h1><?php echo UserModule::t("Change password"); ?></h1>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('class'=>'panel panel-default','style'=>'padding:20px;'),
)); ?>

<?php echo $form->errorSummary($fmodel); ?>
	
	<?php echo $form->passwordFieldGroup($fmodel,'password',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>	
	<?php echo $form->passwordFieldGroup($fmodel,'verifyPassword',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>		

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'保存修改',
			)); ?>
	</div>

<?php $this->endWidget(); ?>