<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
	$this->breadcrumbs=array(
		UserModule::t("Profile")=>array('profile'),
		UserModule::t("Edit"),
	);
	$this->menu=array(
		((UserModule::isAdmin())?array('label'=>UserModule::t('Manage Users'), 'url'=>array('/user/admin')):array()),
		array('label'=>UserModule::t('List User'), 'url'=>array('/user')),
	    	array('label'=>UserModule::t('Profile'), 'url'=>array('/user/profile')),
	    	array('label'=>UserModule::t('Change password'), 'url'=>array('changepassword')),
	    	array('label'=>UserModule::t('Logout'), 'url'=>array('/user/logout')),
	);
?>

<div class="row">
    	
    	<div class="col-lg-3">
	              <?php echo $this->renderPartial('common.modules.user.views.layouts.avatar_info',array()); ?>
		<?php echo $this->renderPartial('common.modules.user.views.layouts.nav',array()); ?>	        	   
	</div>

	<div class="col-lg-9">
		<?php echo $this->renderPartial('common.modules.user.views.layouts.tab',array()); ?>

                            <!--省市联动菜单JS开始-->
		<script type"text/javascript">
			<?php 
				$city = Cities::model()->find('cityid = :cid',array(':cid'=>$profile->city));
			?>
		 	$(function(){
		   		var city = "<?php echo $city ? $city->city : '';?>";   		
		   		if(city){
		   			var province = "<?php echo isset($city->province) ? $city->province->shortname : '';?>";	
		   		}else{
		   			var province = '';   			
		   		}   		
		   		$('#pid option').filter(function(i){
					if($(this).text() == province) {
						$(this).attr("selected", "selected");
					}
				});

				var pid = $("#pid").val();     
				var _url="<?php echo $this->createUrl('dynamicCity');?>";             
				$.ajax({
					type:'post',
					url:_url,         
					data:{'pid':pid},                   
					success:function(msg){ 
						$('#city').html(msg);
						$('#city option').filter(function(i){
							if($(this).text() == city) {
								$(this).attr("selected", "selected");               
							}
						});
					},
					error:function(){
						alert('请求超时,请重试');
					}
				})              
		   	})
		</script>
		<!--省市联动菜单JS结束-->
		<br/>
		<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
			'id'=>'test-form',
			'enableAjaxValidation'=>false,
			'type'=>'horizontal',
		)); ?>				
			<?php if(Yii::app()->user->hasFlash('profileMessage')){ ?>
				<div class="alert in fade alert-success">
					<a href="#" class="close" data-dismiss="alert">×</a>
					<?php echo Yii::app()->user->getFlash('profileMessage');?>
				</div>
			<?php } ?>

			<p class="help-block">带<span class="required">*</span>为必填内容.</p>

    			<?php echo $form->errorSummary($model); ?>	
     
    			<?php echo $form->textFieldGroup($model,'username',array('widgetOptions'=>array('htmlOptions'=>array('disabled'=>true)))); ?>	

			<?php echo $form->textFieldGroup($model,'email',array('widgetOptions'=>array('htmlOptions'=>array()))); ?>	

			<?php 
				$profileFields=Profile::getFields();
				if ($profileFields) {
					foreach($profileFields as $field) {
					?>
			
				
				<?php 
				if ($widgetEdit = $field->widgetEdit($profile)) {
					echo $widgetEdit;
				} elseif ($field->range) {
					echo $form->dropDownListGroup($profile,$field->varname,array('widgetOptions'=>array('data'=>Profile::range($field->range), 'htmlOptions'=>array())));
				} elseif ($field->field_type=="TEXT") {
					echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
				} else {
					if($field->varname != 'avatar_bg' && $field->varname != 'avatar_sm')
						if($field->varname == 'gender'){ ?>
						     <div class="form-group">
						     		<label class="col-sm-3 control-label" for="Profile_gender">性别</label>
						     		<div class="col-sm-9">
						     			<input id="ytProfile_gender" type="hidden" value="" name="Profile[gender]">
						     			<span id="Profile_gender">
								     		<input placeholder="性别" id="Profile_gender_0" value="0" type="radio" name="Profile[gender]"  <?php if($profile->gender==Profile::GENDER_MALE){?>checked="checked"<?php } ?>>男 &nbsp;&nbsp;&nbsp;&nbsp;
										<input placeholder="性别" id="Profile_gender_1" value="1" type="radio" name="Profile[gender]" <?php if($profile->gender==Profile::GENDER_FEMALE){?>checked="checked"<?php } ?>>女
									</span>
								</div>
							</div>
						<?php } 
						else if($field->varname == 'born')
						 echo $form->datePickerGroup(
							$profile,
							'born',
							array(
								'widgetOptions' => array(
									'options' => array(
										'language' => 'zh-CN',
										'orientation' => 'left bottom',
									),
								),
								'wrapperHtmlOptions' => array(
									'class' => 'col-sm-5',
								),
								// 'hint' => 'Click inside! This is a super cool date field.',
								'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
							)
						); 
						else if($field->varname != 'province' && $field->varname != 'city')
							echo $form->textFieldGroup($profile,$field->varname,array('widgetOptions'=>array('htmlOptions'=>array())));			
						else{  ?>										
									<?php if($field->varname =='province'){ ?>
									     <div class="form-group">
											<label class="col-sm-3 control-label" for="Profile_province">所在地</label>
											<div class="col-sm-9 row">
							               <div class="col-sm-3 col-xs-6">
								               <?php echo CHtml::dropDownList('Profile[province]', '', CHtml::listData(Provinces::model()->findAll(),'provinceid','shortname'),array('empty'=>'-选择省-',
								                     'id' => 'pid',  
								                     'class' => 'form-control',                        
								                     'ajax' => array(
								                     'type'=>'POST', //request type
								                     'url'=>$this->createUrl('dynamicCity'),
								                     'update'=>'#city', //selector to update
								                     'data'=>array(Yii::app()->request->csrfTokenName=>Yii::app()->request->getCsrfToken(),'pid'=>'js:$("#pid").val()')
											   ) )
											); ?>
										</div>        
						               <?php } ?>
						               <?php if($field->varname =='city'){ ?>
						               		<div class="col-sm-3 col-xs-6">
					    						<?php echo CHtml::dropDownList('Profile[city]','', array(''=>'-选择市-'),array('id'=>'city','class' => 'form-control')); ?>
					    					    </div>
					    						</div>
										</div>	
					    				<?php } ?>					
				          <?php }				
				}
				?>		
					<?php
					}
				}
			?>
			<div class="form-actions">
				<?php $this->widget('booster.widgets.TbButton', array(
					'buttonType'=>'submit',
					'context'=>'primary',
					'htmlOptions'=>array('style'=>'margin-left:220px;'),
					'label'=>$model->isNewRecord ? '创 建' : '保 存',
				)); ?>
			</div>

		<?php $this->endWidget(); ?>
    </div>
</div>