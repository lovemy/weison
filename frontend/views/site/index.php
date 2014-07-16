<br/>
<?php $this->beginWidget(
    'booster.widgets.TbJumbotron',
    array(
        'heading' => 'Hello, world!',
    )
); ?>
 
    <p>This is a simple hero unit, a simple jumbotron-style component for
        calling extra attention to featured
        content or information.</p>
 
    <p><?php $this->widget(
            'booster.widgets.TbButton',
            array(
                'context' => 'primary',
                'size' => 'large',
                'label' => 'Learn more',
            )
        ); ?></p>
 
<?php $this->endWidget(); ?>
</div>



    <div class="marketing">

        <h1>Introducing YiiBooster</h1>

        <p class="marketing-byline">By Yii developers, for Yii developers: YiiBooster is Yii Bootstrap on 'roids.</p>

        <div class="row">
            <div class="col-sm-4">
                <h2>Built with love</h2>

                <p>When we started using the <a target="_blank" href="http://www.yiiframework.com/extension/bootstrap">Yii-Bootstrap</a>
                    library for our own projects to benefit from <a target="_blank" href="http://twitter.github.com/bootstrap/">Twitter
                        Bootstrap's</a> beauty, we fell in love with it. So, to ease the workload of our Yii Framework developers,
                    we built <a target="_blank" href="http://github.com/clevertech/yiiboilerplate">YiiBoilerplate</a> to
                    take advantage of the libraries, as well as, add some great components of our own.
                    When we realized how well the boilerplate is working for us, we decided to share the love
                    with the open-source community.
                </p>
            </div>
            <div class="col-sm-4">
                <h2>For Yii developers</h2>

                <p>YiiBooster is a collection of widgets that will ease the task of developing Yii applications, as well as,
                    giving your application a little boost. Basically, YiiBooster tackles the most common challenges that
                    Yii developers face while trying to enhance their applications. Yes, we are sorry, it is meant for Yii Framework developers only.
                    If you haven't tried this amazing PHP framework, we recommend you <a target="_blank" href="http://www.yiiframework.com">take
                        a good look at it</a>. It will be worth it.</p>
            </div>
            <div class="col-sm-4">
                <h2>Plenty of goodies</h2>

                <p>Not only are we sharing some of our own sweet little components built by our developers, but we also
                    grabbed the very best open source JS plugins out there to build a seriously awesome library of
                    components that you will truly enjoy developing with.  We would like to personally thank <a target="_blank" href="http://www.yiiframework.com/user/4139/">Chris</a>
                    for his excellent work that provided us with a powerful kickstarter to build this library. So what are you waiting for? Check this library out!</p>
            </div>
        </div>
    </div>