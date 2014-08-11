<?php
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => null, // null or 'inverse'
        'brand' =>"&nbsp;&nbsp;&nbsp;&nbsp;".Core::getSiteParam('frontend_name'),
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => true,
        'fluid' => true,
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
            '<form class="navbar-form navbar-left" action=""><div class="form-group"><input type="text" class="form-control" placeholder="搜 索"></div></form>',
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
                            array('label' => '个人信息', 'url' => Yii::app()->createUrl('user/profile')),       
                            array('label' => '退 出', 'url' => Yii::app()->createUrl('user/logout')),                                                       
                        ),
                        'visible'=>!Yii::app()->user->isGuest,
                    ),                    
                ),
            ),
            Yii::app()->user->id  ?  '<img src="'.Core::getUser(Yii::app()->user->id)->profile->avatar_sm.'" class="pull-right" style="width:30px;height:30px;margin-top:8px;" />' : '',
        ),
    )
);