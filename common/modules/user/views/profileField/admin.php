<?php
$this->breadcrumbs=array(
	UserModule::t('Profile Fields')=>array('admin'),
	UserModule::t('Manage'),
);
$this->menu=array(
    array('label'=>UserModule::t('Create Profile Field'), 'url'=>array('create')),
    array('label'=>UserModule::t('Manage Profile Field'), 'url'=>array('admin')),
    array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('profile-field-grid', {
        data: $(this).serialize()
    });
    return false;
});
");

?>
<h1><?php echo UserModule::t('Manage Profile Fields'); ?></h1>

<p><span>
您可以使用 (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
或者 <b>=</b>) 等操作符进行搜索.
</span></p>

<?php //echo CHtml::link(UserModule::t('高级搜索'),'#',array('class'=>'search-button btn btn-success')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
   // 'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name'=>'varname',
			'type'=>'raw',
			'value'=>'UHtml::markSearch($data,"varname")',
		),
		array(
			'name'=>'title',
			'value'=>'UserModule::t($data->title)',
		),
		array(
			'name'=>'field_type',
			'value'=>'$data->field_type',
			'filter'=>ProfileField::itemAlias("field_type"),
		),
		'field_size',
		//'field_size_min',
		array(
			'name'=>'required',
			'value'=>'ProfileField::itemAlias("required",$data->required)',
			'filter'=>ProfileField::itemAlias("required"),
		),
		//'match',
		//'range',
		//'error_message',
		//'other_validator',
		//'default',
		'position',
		array(
			'name'=>'visible',
			'value'=>'ProfileField::itemAlias("visible",$data->visible)',
			'filter'=>ProfileField::itemAlias("visible"),
		),
		//*/
		array(
			'class'=>'booster.widgets.TbButtonColumn',
			'htmlOptions'=>array(
               'width'=>'100',               
               // 'style'=>'text-align:center',
        	)
		),
	),
)); ?>
