<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<h1><?php echo UserModule::t("Registration"); ?><span class="pull-right" style="font-size:20px;margin-top:10px;"><a href="<?php echo Yii::app()->createUrl('user/login');?>">已有账户,去登录</a></span></h1>

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('booster.widgets.TbActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,	
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data',
		'class'=>'panel panel-default',
		'style'=>'padding:20px;',
		),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	
	<?php echo $form->errorSummary(array($model,$profile)); ?>
	
	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	
	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	
	<?php echo $form->passwordFieldGroup($model,'verifyPassword',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	
	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>	
	
<?php 
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	
		
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownListGroup($profile,$field->varname,array('widgetOptions'=>array('data'=>Profile::range($field->range), 'htmlOptions'=>array())));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textFieldGroup($profile,$field->varname,array('widgetOptions'=>array('htmlOptions'=>array())));
			// echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		?>		
			<?php
			}
		}
	?>
	<?php if (UserModule::doCaptcha('registration')): ?>

		<?php echo $form->textFieldGroup($model,'verifyCode',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
		<?php $this->widget('CCaptcha'); ?>
	<?php endif; ?>
	
	<br/>
	<?php $this->widget(
	    'booster.widgets.TbButton',
	    array('buttonType' => 'submit', 'label' => '注 册', 'context' => 'success','size'=>'large','htmlOptions'=>array('class'=>'btn-block'))
	);?>	

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>