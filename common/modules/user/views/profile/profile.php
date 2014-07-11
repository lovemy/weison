<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
$this->breadcrumbs=array(
	UserModule::t("Profile"),
);
$this->menu=array(
	((UserModule::isAdmin())
		?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin'))
		:array()),
    array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
    array('label'=>UserModule::t('Edit'), 'url'=>array('edit')),
    array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
    array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
);
?><h1><?php echo UserModule::t('Your profile'); ?></h1>

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="success">
	<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>


<div class="view">

    <b><?php echo CHtml::encode($model->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($model->username); ?>
	<br />

	<?php 
		$profileFields=ProfileField::model()->forOwner()->sort()->findAll();
		if ($profileFields) {
			foreach($profileFields as $field) {
				//echo "<pre>"; print_r($profile); die();
			?>
	    <b><?php echo CHtml::encode(UserModule::t($field->title)); ?>:</b>
    	<?php echo (($field->widgetView($profile))?$field->widgetView($profile):CHtml::encode((($field->range)?Profile::range($field->range,$profile->getAttribute($field->varname)):$profile->getAttribute($field->varname)))); ?>
        <br/>
	<?php
			}//$profile->getAttribute($field->varname)
		}
	?>

	<b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($model->email); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('create_at')); ?>:</b>
	<?php echo CHtml::encode($model->create_at); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('lastvisit_at')); ?>:</b>
	<?php echo CHtml::encode($model->lastvisit_at); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
    <?php echo CHtml::encode(User::itemAlias("UserStatus",$model->status)); ?>
	<br/>
</div>