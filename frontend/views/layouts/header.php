<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' =>Core::getSiteParam('frontend_name'),
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => true,
        'fluid' => false,
        'htmlOptions' => array('class'=>'navbar-fixed-top'),
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
            	'type' => 'navbar',
                'items' => array(
                    array('label' => '首 页', 'url' => Yii::app()->createUrl('site/index'), 'active' => Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'index'),
                    array('label' => '图 表', 'url' => Yii::app()->createUrl('site/charts'),'active' => Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'charts'),
                    array('label' => '帮 助', 'url' => Yii::app()->createUrl('site/help'),'active' => Yii::app()->controller->id == 'site' && Yii::app()->controller->action->id == 'help'),
                ),
            ),
            '<form class="navbar-form navbar-left" action="/" method="post">
             <input type="hidden" name="_csrf" value="YS1EYlBVNy4ITjISPW1HAzBOcFIYNGJULGN1JCJtYkIJSjcECR4HXQ=="><div class="input-group"><input type="text" class="form-control" name="q" placeholder="全站搜索"><span class="input-group-btn"><button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search" style="height:20px;line-height:20px; vertical-align:middle;"></i></button></span></div></form>',
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => '登 录', 'url' => Yii::app()->createUrl('user/login'),'visible'=>Yii::app()->user->isGuest),
                    array('label' => '注 册', 'url' => Yii::app()->createUrl('user/registration'),'visible'=>Yii::app()->user->isGuest),
                    '---',
                    array(
                        'label' =>Yii::app()->user->id ? (Core::getUser(Yii::app()->user->id)->profile->nickname ? Core::getUser(Yii::app()->user->id)->profile->nickname : Yii::app()->user->name) : '',
                        'url' => '#',
                        'items' => array(
                            array('label' => '个人主页','icon'=>'glyphicon glyphicon-user', 'url' => Yii::app()->createUrl('user/profile'), 'active'=>Yii::app()->controller->id == 'profile' && Yii::app()->controller->action->id == 'profile'),       
                            array('label' => '账户设置','icon'=>'glyphicon glyphicon-cog', 'url' => Yii::app()->createUrl('user/profile/edit'), 'active'=>Yii::app()->controller->id == 'profile' && Yii::app()->controller->action->id == 'edit'),                            
                            array('label' => '退 出', 'icon'=>'glyphicon glyphicon-log-out', 'url' => Yii::app()->createUrl('user/logout')),                                                       
                        ),
                        'visible'=>!Yii::app()->user->isGuest,
                    ),                    
                ),
            ),
            Yii::app()->user->id  ?  '<img src="'.Core::getUser(Yii::app()->user->id)->profile->avatar_sm.'" class="pull-right" style="width:30px;height:30px;margin-top:8px;" />' : '',
        ),
    )
);
