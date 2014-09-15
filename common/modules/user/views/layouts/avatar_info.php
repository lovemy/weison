 <?php 
	$user = Core::getUser(Yii::app()->user->id);
	if($user){
?>
	<div class="well">
		<div class="media">

			<div class="pull-left">
				<img class="media-object img-rounded" src="<?php echo $user->profile->avatar_bg;?>" alt="" style="width: 100px; height: 100px;">
			</div>                
			<div class="media-body">
				<h4><span class="glyphicon glyphicon-user male" title="" data-toggle="tooltip" data-original-title=""></span><?php echo $user->profile->nickname ? $user->profile->nickname : $user->username ;?> </h4>
				<span class="glyphicon glyphicon-home"></span> <a href="#">个人主页</a><br>
				<span class="glyphicon glyphicon-cog"></span> <a href="<?php echo $this->createUrl('profile/edit');?>">帐户设置</a><br>
				<span class="glyphicon glyphicon-camera"></span> <a href="<?php echo Yii::app()->createUrl('user/avatar');?>">修改头像</a>
			</div>
		</div>
	        <!-- <div class="media-footer">
	            <a href="/user/22110/follow">关注(1)</a>                <em>|</em> 
	            <a href="/user/22110/fans">粉丝(1)</a>                <em>|</em>
	            <a href="/rule">积分(125)</a>            </div> -->
	</div>
<?php } ?>