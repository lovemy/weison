<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Restore");
$this->breadcrumbs=array(
	UserModule::t("Login") => array('/user/login'),
	UserModule::t("Restore"),
);
?>

<h1><?php echo UserModule::t("Restore"); ?></h1>

<?php if(Yii::app()->user->hasFlash('recoveryMessage')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('recoveryMessage'); ?>
</div>
<?php else: ?>

<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'recovery-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($fmodel); ?>
	
	<?php echo $form->textFieldGroup($fmodel,'login_or_email',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>	
	<p class="hint"><?php echo UserModule::t("Please enter your login or email addres."); ?></p>

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
				'buttonType'=>'submit',
				'context'=>'primary',
				'label'=>'找回密码',
			)); ?>
	</div>

<?php $this->endWidget(); ?>
<?php endif; ?>