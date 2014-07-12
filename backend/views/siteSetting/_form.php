<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'site-setting-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'frontend_icon',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'frontend_logo',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_icon',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_logo',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'frontend_name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'copyright',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>256)))); ?>

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
