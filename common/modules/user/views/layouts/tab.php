<ul id="w0" class="nav nav-tabs">
	<li <?php if(Yii::app()->controller->id == 'profile' && Yii::app()->controller->action->id == 'edit'){ ?>class="active" <?php } ?>><a href="<?php echo $this->createUrl('profile/edit');?>">个人信息</a></li>
	<li <?php if(Yii::app()->controller->id == 'avatar'){ ?>class="active" <?php } ?>><a href="<?php echo Yii::app()->createUrl('user/avatar');?>">修改头像</a></li>
	<li <?php if(Yii::app()->controller->id == 'profile' && Yii::app()->controller->action->id == 'changepassword'){ ?>class="active" <?php } ?>><a href="<?php echo Yii::app()->createUrl('user/profile/changepassword');?>">修改密码</a></li>
</ul>