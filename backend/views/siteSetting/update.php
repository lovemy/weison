<?php
$this->breadcrumbs=array(
	'站点基本信息'=>array('view'),	
	'编辑',
);

	$this->menu=array(
		array('label'=>'站点基本信息','url'=>array('view')),	
	);
	?>

	<h1>编辑网站信息</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>