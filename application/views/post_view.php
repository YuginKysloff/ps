<!-- Blog -->
<section id="blog" class="updatable">

    <article>
        <div class="container">

            <div class="row">
                <div class="col-xs-12"><h2 class="header">Категория: Щенки</h2></div>
            </div>

            <div class="row post">
                <div class="col-md-9">

                    <!-- Post -->
                    <div class="eachpost">
                        <div class="title">
                            <div class="centered"><div><h2><?= $post['blog_post_title'];?></h2></div></div>
                            <div class="clearfix"></div>
                            <p><?=date('d-m-Y',$post['blog_post_date']);?>
                                <!--                                <i class="icon-dot"></i> Posted by Storeowner <i class="icon-dot"></i> 1 Comment-->
                            </p>
                        </div>

                        <div class="post-img">
                            <img src="<?= $post['blog_post_img'];?>" alt="<?= $post['blog_post_title'];?>">
                        </div>
                        <?=$post['blog_post_article'];?>
                    </div>
                    <!-- end Post -->

                    <!--                        <script type="text/javascript" src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js" charset="utf-8"></script>-->
                    <script type="text/javascript" src="//yastatic.net/share2/share.js" charset="utf-8" async="async">
                    </script>
                    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter"
                         data-description="<?php echo character_limiter($post['blog_post_article'],200);?>">
                    </div>



                </div>
                <aside class="col-md-3">

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <h3><?= $settings['set_blog_title'];?></h3>
                            <?= $settings['set_blog'];?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <h3>Популярные статьи</h3>
                            <? foreach($pop_posts as $item):?>
                            <a href="/blog/<?= $item['blog_post_slug'];?>">
                                <div class="recent-news">
                                    <img src="<?= $item['blog_post_img'];?>" alt="<?= $item['blog_post_title'];?>">
                                    <h5 href="/blog/<?= $item['blog_post_slug'];?>"><?= $item['blog_post_title'];?></h5>
                                    <?=character_limiter($item['blog_post_article'], 60);?>
                                </div>
                            </a>
                            <?endforeach;?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12">
                            <h3><i class="icon-list"></i> Категории</h3>
                            <div class="list-group">
                                <? foreach($categories as $item):?>
                                    <a href="#" class="list-group-item"><?= $item['blog_cat_name'];?><i class="icon-right-open pull-right"></i></a>
                                <?endforeach;?>
                            </div>
                        </div>
                    </div>

                    <!--                    <div class="row">-->
                    <!--                        <div class="col-xs-12 col-sm-6 col-md-12">-->
                    <!--                            <h3><i class="icon-calendar"></i> Archive</h3>-->
                    <!--                            <div class="list-group">-->
                    <!--                                <a href="#" class="list-group-item">January 2013</a>-->
                    <!--                                <a href="#" class="list-group-item">December 2012</a>-->
                    <!--                                <a href="#" class="list-group-item">November 2012</a>-->
                    <!--                                <a href="#" class="list-group-item">October 2012</a>-->
                    <!--                                <a href="#" class="list-group-item">September 2012</a>-->
                    <!--                            </div>-->
                    <!--                        </div>-->
                    <!--                    </div>-->


                </aside>
            </div>

        </div>
    </article>

</section>
<!-- end Blog -->
