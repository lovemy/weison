<?php
$this->breadcrumbs=array(
	'站点基本信息'=>array('view'),
);

	$this->menu=array(
		array('label'=>'修改站点基本信息','url'=>array('update')),	
	);
	?>


<div class="view">


	<?php echo CHtml::encode($model->getAttributeLabel('frontend_icon')); ?>:
	<?php echo CHtml::encode($model->frontend_icon); ?>
	<br />

	<?php echo CHtml::encode($model->getAttributeLabel('frontend_logo')); ?>:
	<?php echo CHtml::encode($model->frontend_logo); ?>
	<br />

	<?php echo CHtml::encode($model->getAttributeLabel('backend_icon')); ?>:
	<?php echo CHtml::encode($model->backend_icon); ?>
	<br />

	<?php echo CHtml::encode($model->getAttributeLabel('backend_logo')); ?>:
	<?php echo CHtml::encode($model->backend_logo); ?>
	<br />

	<?php echo CHtml::encode($model->getAttributeLabel('frontend_name')); ?>:
	<?php echo CHtml::encode($model->frontend_name); ?>
	<br />

	<?php echo CHtml::encode($model->getAttributeLabel('backend_name')); ?>:
	<?php echo CHtml::encode($model->backend_name); ?>
	<br />

	
	<?php echo CHtml::encode($model->getAttributeLabel('copyright')); ?>:
	<?php echo CHtml::encode($model->copyright); ?>
	<br />

</div>