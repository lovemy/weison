
<?php echo "<h2>控制面板</h2>";?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
		<div class="row-fluid">
						<div class="span4">
		<ul class="info">

  <li><a href="#" class="label label-info">数据统计</a> <span class="divider"></span></li>
</ul>

		<div class="span8">
			<ul class="dashboard-list">
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoMerchantsApply/admin');?>"><span class="green" style="float:right;color:red;"><?php echo $merchant_count;?></span>商家总数</a>
				</li>
				
				<li>
					<a href="<?php echo Yii::app()->createUrl('advList/admin');?>"> <span class="green" style="float:right;color:red;"><?php echo $advList_count;?></span><span>广告总数</span></a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('company/admin');?>">公司总数<span class="red" style="float:right;color:red;"><?php echo $company_count ;?></span></a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('user/admin');?>"> <span class="green" style="float:right;color:red;"><?php echo $user_count;?></span>用户总数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('advArea/admin');?>"> <span class="yellow" style="float:right;color:red;"><?php echo $advArea_count;?></span>广告位总数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('liveSchedule/admin');?>"><span class="red" style="float:right;color:red;"><?php echo $liveSchedule_count;?></span>直播节目总数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>">  <span class="blue" style="float:right;color:red;"><?php echo $videoProject_count ;?> </span>视频项目总数</a>
				</li>
			
				
			</ul>	
		</div>
	</div><!--/span-->
		<div class="span4">
		<ul class="info">

  <li><a href="#" class="label">其它统计</a> <span class="divider"></span></li>
</ul>

		<div class="box-content">
			<ul class="dashboard-list">
			   <li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"><span class="red" style="float:right;color:red;"><?php echo $videoProject_hot_count ;?></span>劲爆视频数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"><span class="red" style="float:right;color:red;"><?php echo $videoProject_wonderful_count ;?></span>精彩专题数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoMerchantsApply/admin');?>"><span class="green" style="float:right;color:red;"><?php echo $merchant_nohandle_count;?></span> 未处理商家数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoMerchantsApply/admin');?>"><span class="red" style="float:right;color:red;"><?php echo $merchant_handle_count;?></span> 已处理商家数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"><span class="red" style="float:right;color:red;"><?php echo $videoProject_publish_count ;?></span>已发布视频项目数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"> <span class="green" style="float:right;color:red;"><?php echo $videoProject_nopublish_count;?></span>  未发布视频项目数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>">  <span class="blue" style="float:right;color:red;"><?php echo $videoProject_wait_count ;?> </span>等待审核视频项目数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"> <span class="yellow" style="float:right;color:red;" ><?php echo $videoProject_yes_count;?></span>审核通过视频项目数</a>
				</li>
				<li>
					<a href="<?php echo Yii::app()->createUrl('videoProject/admin');?>"> <span class="green" style="float:right;color:red;"><?php echo $videoProject_no_count;?></span>审核未通过视频项目数</a>
				</li>
				
				
				
			</ul>
		</div>
	</div><!--/span-->
				
	</div>
			<div class="row-fluid">
				<div class="span4">
					<table class="table table-condersed table-striped table-bordered">
						<thead>
						   <tr><th colspan="4" align="center">最新商家</th></tr>
							<tr>
								<td>
									ID
								</td>
								
								<td width="200px;">
									商家留言
								</td>
								<td width="120px;">
									处理状态
								</td>
								<td>
									电话
								</td>
							</tr>
						</thead>
						<tbody>
						<?php  if($merchantinfo){
						         foreach ($merchantinfo as $k=> $v) {?>
													
							<tr>
								<td>
									<?php echo $v->id;?>
								</td>
								<td>
									<?php echo
                                        Core::cutstr($v->content,30);

									 //$v->content;?>
								</td>
								<td>
							<?php 
                                 echo VideoMerchantsApply::itemAlias("HandleStatus",$v->handle_status);
							?>
								</td>
								<td>
								<?php echo $v->phone;?>
								</td>
							</tr>
							<?php }?>
							<td colspan="4"><a  style="float:right;"href="<?php echo yii::app()->createUrl('videoMerchantsApply/admin/');?>">更多</a></td>
						</tbody>
					</table>
					<?php }else{
						   echo "<tr><td colspan='4'>暂无商家</td></tr>";
						}?>
				</div>
				<div class="span8">
					<table class="table table-condersed table-striped table-bordered">
						<thead>
						 <tr><th colspan="7" align="center">最新视频</th></tr>
							<tr>
								<td>
									ID
								</td>
								<td>
									节目名称
								</td>
								<!-- <td>
									缩略图
								</td> -->
								<td>
									所属行业
								</td>
								<td>
									审核状态
								</td>
								<td>
									发布状态
								</td>
								<td>
									项目类别
								</td>
								    
							</tr>
						</thead>
						<tbody>
						<?php  if($videoProjectinfo){
						         foreach ($videoProjectinfo as $k=> $v) {?>
							<tr>
								<td>
									<?php echo $v->id;?>
								</td>
								<td>
									<?php echo $v->name;?>
								</td>
								<!-- <td>
									<?php 

							        //echo //$v->thumbnails;
                                    //echo CHtml::image(Yii::app()->baseUrl."/images/".$v->thumbnails,$v->name,array("width"=>100,"height"=>120));   //这里显示图片
									?>
								</td> -->
								<td>
									<?php 
                                          
                                      echo $v->category->parent->name;

									//echo $v->industry;
									?>
								</td>
								<td>
									<?php echo VideoProject::itemAlias("AuditStatus",$v->audit_status);?>
								</td>
								<td>
									<?php echo VideoProject::itemAlias("ReleaseStatus",$v->release_status);?>
								</td>
								<td>
									<?php echo VideoProject::itemAlias("Type",$v->type);?>
								</td>
							</tr>
							<?php }?>
							<td colspan="7"><a  style="float:right;"href="<?php echo yii::app()->createUrl('videoProject/admin/');?>">更多</a></td>
						</tbody>
					</table>
					<?php }else{
						   echo "<tr><td colspan='7'>暂无视频</td></tr>";
						}?>
				</div>
		
			</div>
			<div class="row-fluid">
				<div class="span4">
					<table class="table table-condersed table-striped table-bordered">
						<thead>
						 <tr><th colspan="4" align="center">最新公司资料</th></tr>
							<tr>
							    <td>
									公司LOGO
								</td>
								<td>
									公司名字
								</td>
								
								<td>
									联系人
								</td>
								<td>
									联系电话
								</td>
							</tr>
						</thead>
						<tbody>
							<?php  if($companyinfo){
						         foreach ($companyinfo as $k=> $v) {?>
							<tr>
							    <td width="200px;">
									<?php 

							        //echo //$v->thumbnails;
                                    echo CHtml::image(Yii::app()->baseUrl."/images/".$v->company_logo,$v->company_name,array("width"=>100,"height"=>120));   //这里显示图片
									?>
								</td>
								<td width="140px;">
									<?php echo $v->company_name;?>
								</td>
								
								<td width="100px;">
									<?php echo $v->company_contact;?>
								</td>
								<td>
									<?php echo $v->company_qq;?>
								</td>
							</tr>
							<?php }?>
							<td colspan="4"><a  style="float:right;"href="<?php echo yii::app()->createUrl('company/admin/');?>">更多</a></td>					
						</tbody>
						
					</table>
					<?php }else{
						   echo "<tr><td colspan='4'>暂无公司资料</td></tr>";
						}?>
				</div>
			<div class="span8">
					<table class="table table-condersed table-striped table-bordered">
						<thead>
						 <tr><th colspan="4" align="center">最新直播节目</th></tr>
							<tr>
								<td>
									缩略图
								</td>
								<td>
									名称
								</td>
								
								<td>
									开始时间
								</td>
								<td>
									结束时间
								</td>
							</tr>
						</thead>
						<tbody>
							<?php  if($liveScheduleinfo){
						         foreach ($liveScheduleinfo as $k=> $v) {?>
							<tr>
							    <td width="120px;">
									<?php 

							        //echo //$v->thumbnails;
                                    echo CHtml::image(Yii::app()->baseUrl."/images/".$v->thumbnails,$v->name,array("width"=>100,"height"=>120));   //这里显示图片
									?>
								</td>
								<td width="100px;">
									<?php echo $v->name;?>
								</td>
								
								<td>
									<?php echo $v->start_time;?>
								</td>
								<td>
									<?php echo $v->end_time;?>
								</td>
							</tr>
							<?php }?>
							<td colspan="4"><a  style="float:right;"href="<?php echo yii::app()->createUrl('liveSchedule/admin/');?>">更多</a></td>					
						</tbody>
						
					</table>
					<?php }else{
						   echo "<tr><td colspan='4'>暂无直播节目</td></tr>";
						}?>
				</div>
			</div>
			
	<div class="row-fluid">
		<div class="span12">
		</div>
	</div>
</div>