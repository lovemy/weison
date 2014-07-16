<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">	 
	    <a class="navbar-brand" href="<?php echo Yii::app()->createUrl('site/index');?>"><img src="<?php echo Core::getSiteParam('frontend_logo');?>" style="height:30px;"/></a>
	    <ul class="nav navbar-nav">
	        <li <?php if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index'){?> class="active" <?php } ?>><a href="<?php echo Yii::app()->createUrl('site/index');?>" class="smothscroll">首 页</a></li>
	        <li <?php if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'charts'){?> class="active" <?php } ?>><a href="<?php echo Yii::app()->createUrl('site/charts');?>" class="smothscroll">图表展示</a></li>
	        <li <?php if(Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'help'){?> class="active" <?php } ?>><a href="<?php echo Yii::app()->createUrl('site/help');?>" class="smothscroll">帮助中心</a></li>	        
	    </ul>
	    <ul class="nav navbar-nav pull-right">
	        <?php if(Yii::app()->user->isGuest){ ?>
	    	<li><a href="<?php echo Yii::app()->createUrl('user/registration');?>" class="smothscroll">注 册</a></li>
	        <li><a href="<?php echo Yii::app()->createUrl('user/login');?>" class="smothscroll">登 录</a></li>	        
	        <?php } else{ ?>
	        	<li><a href="<?php echo Yii::app()->createUrl('user/login');?>" class="smothscroll"><?php echo Yii::app()->user->name;?></a></li>	        	     
	        <?php } ?>
	    </ul>
    </div>
</div>