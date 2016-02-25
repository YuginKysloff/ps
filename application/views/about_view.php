<div id="content">
    <section id="team" class="updatable">

        <!-- begin Team -->
        <article class="team">
            <div class="container">
<!--                <header><h2>Наша команда</h2></header>-->

                <div class="row">
                    <div class="title">
                        <div class="centered"><div><h2><?= $settings['set_about_title'];?></h2></div></div>
                        <?= $settings['set_about'];?>
                        <hr>
                    </div>
                </div>

                  <? $i = 1; foreach($team as $item):?>

                    <div class="col-sm-6 col-md-3 <? if(($i != 1) AND ($i != 4)) echo 'col-md-offset-1'; $i++;?>">
                        <div class="thumbnail">
                            <img src="<?= $item['team_img']?>" alt="<?= $item['team_name']?>">
                            <div class="caption">
                                <h3><?= $item['team_name']?></h3>
                                <span><?= $item['team_position']?></span>
                                <hr>
                                <p><?= $item['team_desc']?> <br />
                                <hr>
                            </div>
                        </div>
                    </div>

                <? endforeach;?>

            </div>
        </article>

        <article class="team">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2><?= $settings['set_shop_title'];?></h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $settings['set_shop'];?>
                    </div>
                    <div class="col-md-6">
                        <a href="#" class="social pinterest pull-right">
                            <i class="icon-pinterest"></i>
                        </a>
                        <a href="#" class="social linkedin pull-right">
                            <i class="icon-linkedin"></i>
                        </a>
                        <a href="#" class="social gplus pull-right">
                            <i class="icon-gplus"></i>
                        </a>
                        <a href="#" class="social twitter pull-right">
                            <i class="icon-twitter"></i>
                        </a>
                        <a href="#" class="social facebook pull-right">
                            <i class="icon-facebook"></i>
                        </a>
                    </div>
                </div>
            </div>
        </article>
        <!-- end Team -->
    </section>
</div>
