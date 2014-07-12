<?php
$this->breadcrumbs=array(
	'Site Settings'=>array('view'),	
	'Update',
);

	$this->menu=array(
		array('label'=>'站点基本信息','url'=>array('view')),	
	);
	?>

	<h1>Update SiteSetting <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>