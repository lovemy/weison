<?php 
$this->widget(
    'booster.widgets.TbMenu',
    array(
        'type' => 'list',
        'items' => isset($this->menu) ? $this->menu : array(),
    )
);
?>