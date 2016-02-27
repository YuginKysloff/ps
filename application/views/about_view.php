<div id="content">
    <section id="team" class="updatable">

        <!-- begin Team -->
        <article class="team">
            <div class="container">
                <div class="row">
                    <div class="title">
                        <div class="centered">
                            <div><h2><?= $settings['set_about_title']; ?></h2></div>
                        </div>
                        <?= $settings['set_about']; ?>
                        <hr>
                    </div>
                </div>
                <? $i = 1;
                foreach ($team as $item): ?>
                    <div class="col-sm-6 col-md-3 <? if (($i != 1) AND ($i != 4)) echo 'col-md-offset-1';
                    $i++; ?>">
                        <div class="thumbnail">
                            <img src="<?= $item['team_img'] ?>" alt="<?= $item['team_name'] ?>">
                            <div class="caption">
                                <h3><?= $item['team_name'] ?></h3>
                                <span><?= $item['team_position'] ?></span>
                                <hr>
                                <p><?= $item['team_desc'] ?> <br/>
                                <hr>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
        </article>
        <!-- end Team -->
    </section>
</div>
