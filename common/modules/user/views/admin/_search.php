<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

        <?php echo $form->textFieldGroup($model,'id',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'activkey',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'create_at',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->textFieldGroup($model,'lastvisit_at',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>

        <?php echo $form->dropDownListGroup($model,'superuser', array('widgetOptions'=>array('data'=> $model->itemAlias('AdminStatus'), 'htmlOptions'=>array()))); ?>

        <?php echo $form->dropDownListGroup($model,'status', array('widgetOptions'=>array('data'=>$model->itemAlias('UserStatus'), 'htmlOptions'=>array()))); ?>

    <div class="form-actions">
        <?php $this->widget('booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'context'=>'primary',
            'label'=>'Search',
        )); ?>
    </div>

<?php $this->endWidget(); ?>
