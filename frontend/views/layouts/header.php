 


 <div class="header">
          <div class="header-top">
               <div class="cw_content">  
                 <a href="<?php echo yii::app()->createUrl('site/index');?>"><div class="header-logo f_l"></div></a>
                 <ul class="xmh_zsx weiruan f_l">
                    <li><a href="<?php echo yii::app()->params['frontendUrl'].'/site/index';?>" class="current">首页</a></li>
                     <li><a href="<?php echo yii::app()->params['shangjiUrl'].'/project/index';?>" target="_blank">商机</a></li>
                     <li><a href="<?php echo yii::app()->params['showUrl'].'/site/index';?>" target="_blank" >V秀</a></li>

                 </ul>

                 <!--  <ul class="xmh_zsx weiruan f_l">
                     <li><a href="#">首页</a></li>
                     <li><a href="#">商机汇</a></li>
                     <li><a href="#" class="current">V秀</a></li>
                 </ul>
 -->


                 <script type="text/javascript">
               //        $('.xmh_zsx a').mouseover(function(){
               // var $thisA = $(this);
               // $('.xmh_zsx a').removeClass('current');
               // $thisA.addClass('current');
              
              })
                 </script>
                 <div class="header-search f_l">
                      
                      
                        
                           <form method="get" action="<?php echo Yii::app()->createUrl('project/search');?>" target="_blank">
                        
                       <div class="search_box f_l">
                            <div class="f_l search_box_in">
                              <input type="text" name="keywords" placeholder='搜索牛拦钱网项目库' class="inputStyle01_1" />
                          </div>
                          <div class="search_but f_l">
                            <input  type="image" src="<?php echo Yii::app()->request->baseUrl;?>/images/newIndex/search_but.gif" />                         
                      
                          </div>
                       </div>
                      </form>  
                       
                 </div>
                   <div class="header-login weiruan f_r">
                       <ul>
                          
                                           <?php if(!Yii::app()->user->isGuest){?>
                        <li><a href="<?php echo yii::app()->params['userUrl'].'/profile/index';?> "  style="padding-right:0px;"><span class="shuzi"> <?php echo Yii::app()->user->name;?></span></a></li>
      
              <!-- <i class="icon-off"></i> -->
              
              </a></li>
                        <?php }else{?>     

                             <li><a href="<?php echo Yii::app()->createUrl('user/login')?>"><span>登录</span></a></li>
                             
                             <li><a href="<?php echo Yii::app()->createUrl('user/registration')?>"><span>注册</span></a></li>
                             <?php }?>
                                
                            <!-- <li><a href="http://wpa.qq.com/msgrd?v=3&uin=472320378%20%20%20%20%20%20%20%20&site=qq&menu=yes"><span>客服</span></a></li> -->
                       </ul>    
                    </div>
                    <!--<div class="cl"></div>-->
              </div>


              
          </div>