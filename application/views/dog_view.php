<section id="spuppie">

    <!-- begin Our Puppies -->
    <article>
        <div class="container">
<!--            <div class="row">-->
<!--                <div class="col-xs-12"><h2 class="header">Щенок на продажу</h2></div>-->
<!--            </div>-->
            <div class="row">
                <div class="title">
                    <div class="centered"><div><h2><?= $pet['pet_name'];?></h2></div></div>
<!--                    <p>--><?//= $pet['pet_breed'];?><!--</p>-->
                    <br>
                </div>
            </div>

            <div class="row">
                <div class="col-md-7">
<!--                    <div id="carousel-puppie" class="carousel slide" data-ride="carousel" data-interval="false">-->

                        <!-- Wrapper for slides -->
<!--                        <div class="carousel-inner">-->
                            <?// foreach($images as $item):?>
                            <div class="item active pet-img">
                                <img src="<?= $pet['pet_img'];?>" alt="<?= $pet['pet_name'];?>">
                            </div>
                            <? //endforeach;?>
<!--                        </div>-->
<!--                    </div>-->
                </div>
                <div class="col-md-5">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-12">

                            <p><?= $pet['pet_desc'];?></p>
                            <ul class="features">
                                <li><strong>Порода:</strong><?= $pet['pet_breed'];?></li>
                                <li><strong>Дата рождения:</strong><?= date('d-m-Y',$pet['pet_birthday']);?></li>
                                <li><strong>Пол:</strong><?if($pet['pet_gender'] == 0)echo 'женский'; else echo 'мужской';?></li>
                                <li><strong>Документы:</strong><?if($pet['pet_docs'] == 1)echo 'да'; else echo 'нет';?></li>
                                <li><strong>Вакцинация:</strong><?if($pet['pet_vactination'] == 1)echo 'да'; else echo 'нет';?></li>
                                <li><strong>Цена:</strong><span class="price"><?= $pet['pet_price'];?> руб.</span></li><br>
                                <li>
                                    <? if($pet['pet_status'] == 1):?>
                                        <a href="/pets/add_to_basket/<?= $pet['pet_id'];?>/<?= $pet['pet_slug'];?>" class="btn btn-default">Добавить в корзину</a>
                                    <? else:?>
                                        <p>В резерве</p>
                                        <a disabled="' href="/pets/add_to_basket/<?= $pet['pet_id'];?>/<?= $pet['pet_slug'];?>" class="btn btn-default">Добавить в корзину</a>
                                    <? endif;?>
                                </li>
                            </ul>
                            <p class="text-success"><?= $this->session->flashdata('msg');?></p>
                        </div>

<!--                        more photo slider-->
<!--                        <div class="col-xs-12 col-sm-6 col-md-12">-->
<!---->
<!--                            <div id="carousel-thumb-puppie" class="carousel slide" data-ride="carousel" data-interval="false">-->
                                <!-- Wrapper for slides -->
<!--                                <div class="carousel-inner">-->
<!--                                    <div class="item active">-->
<!--                                        <ol>-->
<!--                                            <li data-target="#carousel-puppie" data-slide-to="0" class="active thumb"><img src="img/spuppie/spuppie01.jpg" alt="//"></li>-->
<!--                                            <li data-target="#carousel-puppie" data-slide-to="1" class="thumb"><img src="img/spuppie/spuppie02.jpg" alt="//"></li>-->
<!--                                            <li data-target="#carousel-puppie" data-slide-to="2" class="thumb"><img src="img/spuppie/spuppie03.jpg" alt="//"></li>-->
<!--                                        </ol>-->
<!--                                    </div>-->
<!--                                    <div class="item">-->
<!--                                        <ol>-->
<!--                                            <li data-target="#carousel-puppie" data-slide-to="3" class="active thumb"><img src="img/spuppie/spuppie04.jpg" alt="//"></li>-->
<!--                                            <li data-target="#carousel-puppie" data-slide-to="4" class="thumb"><img src="img/spuppie/spuppie05.jpg" alt="//"></li>-->
<!--                                        </ol>-->
<!--                                    </div>-->
<!--                                </div>-->

                                <!-- Controls -->
<!--                                <div class="controls">-->
<!--                                    <a class="left carousel-control" href="#carousel-thumb-puppie" data-slide="prev">-->
<!--                                        <i class="icon-left-open"></i>-->
<!--                                    </a>-->
<!--                                    <span clasS="more-img">Еще фото</span>-->
<!--                                    <a class="right carousel-control" href="#carousel-thumb-puppie" data-slide="next">-->
<!--                                        <i class="icon-right-open"></i>-->
<!--                                    </a>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->

                    </div>

                </div>
            </div>
        </div>
    </article>


    <article>
        <div class="container">
            <div class="row">
                <div class="col-xs-12"><h2 class="header">Больше щенков</h2></div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="grid">
                        <ul class="">
                            <? foreach($pets as $item):?>
                                <li class="<? if($item['pet_gender'] == 0) echo 'famale'; else echo 'male';?>">
                                    <a href="/pets/<?=$item['pet_slug'];?>">
                                        <div class="more">
                                            <i class="icon-search pull-right"></i>
                                            <span class="price"><?=$item['pet_price'];?> руб.</span>
                                            <span class="wks"><?=round((time() - $item['pet_birthday'])/604800, 1);?> нед</span>
                                            <span class="txt"><? if($item['pet_gender'] == 0) echo 'девочка'; else echo 'мальчик';?></span>
                                        </div>
                                        <?if($item['pet_discount'] == 1) echo '<span class="tag sale"><span>sale</span></span>';?>
                                        <?if($item['pet_status'] == 0) echo '<span class="tag sold"><span>sold</span></span>';?>
                                        <img src="<?=$item['pet_img'];?>" alt="<?=$item['pet_breed'];?>"/>
                                        <span class="name"><?=$item['pet_name'];?></span>
                                    </a>
                                </li>
                            <?endforeach;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </article>
    <!-- end Our Puppies -->

</section>
