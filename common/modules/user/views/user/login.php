<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<h1><?php echo UserModule::t("Login"); ?><span class="pull-right" style="font-size:20px;margin-top:10px;"><a href="<?php echo Yii::app()->createUrl('user/registration');?>">还没有账户,去注册</a></span></h1>

<?php 
$form = $this->beginWidget(
    'booster.widgets.TbActiveForm',
    array(
        'id' => 'verticalForm',
        'htmlOptions' => array('class'=>'panel panel-default',
		'style'=>'padding:20px;',), // for inset effect
    )
);
 
echo $form->textFieldGroup($model, 'username');
echo $form->passwordFieldGroup($model, 'password');
echo $form->checkboxGroup($model, 'rememberMe');
echo "<div class=\"row\">
  <div class=\"col-md-6\">";  
$this->widget(
    'booster.widgets.TbButton',
    array('buttonType' => 'submit', 'label' => '登 录', 'size' => 'large', 'context' => 'primary','htmlOptions'=>array('class'=>'btn-block'))
);
echo "</div>
<div class=\"col-md-6\">
  <h4><a href=\"".Yii::app()->createUrl('user/recovery')."\">忘记密码，现在找回</a></h4>
</div></div>";
 
$this->endWidget();
unset($form);?>