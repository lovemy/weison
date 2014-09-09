<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'site-setting-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">带<span class="required">*</span>为必填内容.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldGroup($model,'frontend_icon',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'frontend_logo',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_icon',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_logo',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'frontend_name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->textFieldGroup($model,'backend_name',array('widgetOptions'=>array('htmlOptions'=>array('maxlength'=>128)))); ?>

	<?php echo $form->redactorGroup($model,'copyright',
		array('widgetOptions'=>array('editorOptions'=>array(
			'lang' => 'zh_cn',
			'toolbar' => true,
			'iframe' => true,
			'mobile'=> true,		
			'imageUpload'=>'../upload',		        
			'imageGetJson'=>'http://admin.weison.com/images.json',	
			'plugins' => array(
				'fullscreen',       
			),   
		), 'htmlOptions'=>array('maxlength'=>128)))); 
	?>		

	<div class="form-actions">
		<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=> '保 存',
		)); ?>
	</div>

<?php $this->endWidget(); ?>