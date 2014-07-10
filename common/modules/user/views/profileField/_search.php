<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

        <?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'varname',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'title',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>        

        <?php echo $form->dropDownListGroup($model,'field_type', array('widgetOptions'=>array('data'=> ProfileField::itemAlias('field_type'), 'htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'field_size',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'field_size_min',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>        

        <?php echo $form->dropDownListGroup($model,'required', array('widgetOptions'=>array('data'=> ProfileField::itemAlias('required'), 'htmlOptions'=>array()))); ?>
         
        <?php echo $form->textFieldGroup($model,'match',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'range',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'error_message',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'other_validator',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'default',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'widget',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'widgetparams',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>
        
        <?php echo $form->textFieldGroup($model,'position',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->dropDownListGroup($model,'visible', array('widgetOptions'=>array('data'=> ProfileField::itemAlias('visible'), 'htmlOptions'=>array()))); ?>
        
    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context'=>'primary',
            'label'=>'搜 索',
        )); ?>
    </div>

<?php $this->endWidget(); ?>