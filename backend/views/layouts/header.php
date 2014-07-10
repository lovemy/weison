<?php 
$this->widget(
    'booster.widgets.TbNavbar',
    array(
        'type' => 'inverse',
        'brand' => Yii::app()->name,
        'brandUrl' => '#',
        'collapse' => true, // requires bootstrap-responsive.css
        'fixed' => false,
        'fluid' => true,
        'items' => array(
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'items' => array(
                    array('label' => '首 页', 'url' => '#', 'active' => true),
                    array('label' => 'Link', 'url' => '#'),
                    array(
                        'label' => 'Dropdown',
                        'url' => '#',
                        'items' => array(
                            array('label' => 'Action', 'url' => '#'),
                            array('label' => 'Another action', 'url' => '#'),
                            array(
                                'label' => 'Something',
                                'url' => '#'
                            ),
                            '---',
                            array('label' => 'NAV HEADER'),
                            array('label' => 'Separated link', 'url' => '#'),
                            array(
                                'label' => 'One more separated link',
                                'url' => '#'
                            ),
                        )
                    ),
                ),
            ),
            '<form class="navbar-form navbar-left" action=""><div class="form-group"><input type="text" class="form-control" placeholder="Search"></div></form>',
            array(
                'class' => 'booster.widgets.TbMenu',
                'type' => 'navbar',
                'htmlOptions' => array('class' => 'pull-right'),
                'items' => array(
                    array('label' => date("Y-m-d H:i:s"), 'url' => '#'),
                    '---',
                    array(
                        'label' => Yii::app()->user->name,
                        'url' => '#',
                        'items' => array(                            
                            array(
                                'label' => '用户相关',
                                'url' => Yii::app()->createUrl('user/profile'),
                            ),
                            '---',
                            array('label' => '退 出', 'url' => Yii::app()->createUrl('user/logout')),
                        )
                    ),
                ),
            ),
        ),
    )
);