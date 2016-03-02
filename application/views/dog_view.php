<section id="spuppie">

    <!-- begin Our Puppies -->
    <article class="container">
        <div class="row">
            <div class="title">
                <div class="centered">
                    <div><h2><?= $dog['dog_name']; ?></h2></div>
                </div>
                <br>
            </div>
        </div>

        <div class="row">
            <div class="col-md-7">
                <div class="item active pet-img">
                    <img src="<?= $dog['dog_img']; ?>" alt="<?= $dog['dog_name']; ?>">
                </div>
            </div>
            <div class="col-md-5">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-12">
                        <ul class="features">
                            <li><strong>Порода:</strong><?= $dog['breed_name']; ?></li>
                            <li><strong>Дата рождения:</strong><?= date('d-m-Y', $dog['dog_birthday']); ?></li>
                            <li>
                                <strong>Пол:</strong><? if ($dog['dog_gender'] == 0) echo 'женский'; else echo 'мужской'; ?>
                            </li>
                            <li><strong>Описание:</strong><?= $dog['dog_desc']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <article>
            <div class="row">
                <div class="title">
                    <div class="centered">
                        <div><h2>Раскладка</h2></div>
                    </div>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <?= $dog['dog_genealogy']; ?>
                </div>
            </div>
        </article>
    </article>

    <!-- end Our Puppies -->

</section>
