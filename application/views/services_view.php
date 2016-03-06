<div>
    <section>
        <!-- Our Services -->
        <article class="services">
            <div class="container">
<!--                <header><h2>Наши услуги</h2></header>-->
                <div class="row">
                    <div class="title">
                        <div class="centered"><div><h2><?= $settings['set_serv_title'];?></h2></div></div>
                        <?= $settings['set_serv'];?>
                        <hr>
                    </div>
                </div>
                <? foreach($services as $item):?>
                <div class="row service">
                    <div class="col-md-7">
                        <h2><?= $item['serv_name'];?></h2>
                        <?= $item['serv_desc'];?>
<!--                        <a href="#">&srarr; View Pricing Table</a>-->
                    </div>
                    <div class="col-md-5">
                        <img src="<?= $item['serv_img'];?>" alt="<?= $item['serv_name'];?>">
                        <p>Цена - <strong><?= $item['serv_price'];?></strong> руб.</p>
                    </div>
                </div>
                <? endforeach;?>
<!--                <div class="row service">-->
<!--                    <div class="col-md-12 visible-xs visible-sm">-->
<!--                        <h2>Kennel &amp; Boarding</h2>-->
<!--                    </div>-->
<!--                    <div class="col-md-5"><img src="img/services/services02.jpg" alt="//"></div>-->
<!--                    <div class="col-md-7">-->
<!--                        <h2 class="visible-md visible-lg">Kennel &amp; Boarding</h2>-->
<!--                        <p>Our high-end luxury <strong class="highlight">Doggie Suites</strong> are all equipped with flat screen for your pet's enjoyment. Our facility was designed to offer you pet the most exclusive and unique experience, a perfect alternative to a caged boarding kennel.</p>-->
<!--                        <a href="#">&srarr; View Pricing Table</a>-->
<!--                    </div>-->
<!--                </div>-->
            </div>
        </article>
        <!-- end Our Services -->

    </section>

</div>
