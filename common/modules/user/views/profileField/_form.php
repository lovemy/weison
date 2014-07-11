

<div id="dialog-form" title="<?php echo UserModule::t('Widget parametrs'); ?>">
	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="value">Value</label>
		<input type="text" name="value" id="value" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>



<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'test-form',
	'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">带<span class="required">*</span>为必填内容.</p>

    <?php echo $form->errorSummary($model); ?>  

	<?php echo (($model->id)?$form->textFieldGroup($model,'varname',array('widgetOptions'=>array('htmlOptions'=>array('readonly'=>'true')))):$form->textFieldGroup($model,'varname',array('widgetOptions'=>array('htmlOptions'=>array())))); ?>
    <p class="hint"><?php echo UserModule::t("Allowed lowercase letters and digits."); ?></p>		

	<?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('Field name on the language of "sourceLanguage".'); ?></p>
	
	<?php echo (($model->id)? $form->textFieldGroup($model,'field_type',array('widgetOptions'=>array('htmlOptions'=>array('readonly'=>'true')))) : $form->dropDownListGroup($model,'field_type',array('widgetOptions'=>array('data'=>ProfileField::itemAlias('field_type'), 'htmlOptions'=>array())))); ?>
	<p class="hint"><?php echo UserModule::t('Field type column in the database.'); ?></p>

	<?php echo (($model->id)? $form->textFieldGroup($model,'field_size',array('widgetOptions'=>array('htmlOptions'=>array('readonly'=>'true')))) : $form->textFieldGroup($model,'varname',array('widgetOptions'=>array('htmlOptions'=>array())))); ?>
	<p class="hint"><?php echo UserModule::t('Field size column in the database.'); ?></p>

	<?php echo $form->textFieldGroup($model,'field_size_min',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('The minimum value of the field (form validator).'); ?></p>

	<?php echo $form->dropDownListGroup($model,'required',array('widgetOptions'=>array('data'=>ProfileField::itemAlias('required'), 'htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('Required field (form validator).'); ?></p>

	<?php echo $form->textFieldGroup($model,'match',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t("Regular expression (example: '/^[A-Za-z0-9\s,]+$/u')."); ?></p>

	<?php echo $form->textFieldGroup($model,'range',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('Predefined values (example: 1;2;3;4;5 or 1==One;2==Two;3==Three;4==Four;5==Five).'); ?></p>

	<?php echo $form->textFieldGroup($model,'error_message',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('Error message when you validate the form.'); ?></p>
	
	<?php echo $form->textFieldGroup($model,'other_validator',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('file'=>array('types'=>'jpg, gif, png'))))); ?></p>

	<?php echo (($model->id)? $form->textFieldGroup($model,'default',array('widgetOptions'=>array('htmlOptions'=>array('readonly'=>'true')))) : $form->textFieldGroup($model,'varname',array('widgetOptions'=>array('htmlOptions'=>array())))); ?>
	<p class="hint"><?php echo UserModule::t('The value of the default field (database).'); ?></p>

	<?php 
	list($widgetsList) = ProfileFieldController::getWidgets($model->field_type);		
	echo $form->dropDownListGroup($model,'widget',array('widgetOptions'=>array('data'=>$widgetsList, 'htmlOptions'=>array('id'=>'widgetlist')))); ?>		
	<p class="hint"><?php echo UserModule::t('Widget name.'); ?></p>
    
    <?php echo $form->textFieldGroup($model,'widgetparams',array('widgetOptions'=>array('htmlOptions'=>array('id'=>'widgetparams')))); ?>
	<p class="hint"><?php echo UserModule::t('JSON string (example: {example}).',array('{example}'=>CJavaScript::jsonEncode(array('param1'=>array('val1','val2'),'param2'=>array('k1'=>'v1','k2'=>'v2'))))); ?></p>

	<?php echo $form->textFieldGroup($model,'position',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
	<p class="hint"><?php echo UserModule::t('Display order of fields.'); ?></p>

	<?php echo $form->dropDownListGroup($model,'visible',array('widgetOptions'=>array('data'=>ProfileField::itemAlias('visible'), 'htmlOptions'=>array('id'=>'widgetlist')))); ?>		


<div class="form-actions">
	<?php $this->widget('booster.widgets.TbButton', array(
			'buttonType'=>'submit',
			'context'=>'primary',
			'label'=>$model->isNewRecord ? '创 建' : '保 存',
		)); ?>
</div>

<?php $this->endWidget(); ?>