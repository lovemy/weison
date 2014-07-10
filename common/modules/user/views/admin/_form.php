<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'test-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">带<span class="required">*</span>为必填内容.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->passwordFieldGroup($model,'password',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

	<?php echo $form->dropDownListGroup($model,'superuser',array('widgetOptions'=>array('data'=>User::itemAlias('AdminStatus'), 'htmlOptions'=>array()))); ?>

	<?php echo $form->dropDownListGroup($model,'status',array('widgetOptions'=>array('data'=>User::itemAlias('UserStatus'), 'htmlOptions'=>array()))); ?>

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

<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? '创 建' : '保 存',
		)); ?>
</div>

<?php $this->endWidget(); ?>
