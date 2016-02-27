<div id="content">
    <section id="gallery" class="updatable">

        <!-- begin Our Puppies -->
        <article class="puppies">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12"><h2>Наши собаки</h2></div>
                </div>


                <div class="row">
                    <div class="col-xs-12">
                        <ul class="filters">
                            <li data-filter="all" class="active">Все</li>
                            <li data-filter="male">Мальчики</li>
                            <li data-filter="famale">Девочки</li>
                            <li data-filter="feature">Распродажа</li>
                            <li data-filter="top">Резерв</li>
                        </ul>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="grid">
                            <ul>
                                <? foreach($dogs as $item):?>
                                    <li class="<? if($item['dog_gender'] == 0) echo 'famale'; else echo 'male';?>">
                                        <a href="/dogs/<?=$item['dog_slug'];?>">
                                            <div class="more">
                                                <i class="icon-search pull-right"></i>
                                                <!--											<span class="wks">--><?// if($item['dog_gender'] == 0) echo 'девочка'; else echo 'мальчик';?><!--</span>-->
                                                <span class="wks"><?=$item['dog_breed'];?></span>
                                            </div>
                                            <img src="<?=$item['dog_img'];?>" alt="<?=$item['dog_name'];?>"/>
                                            <span class="name"><?=$item['dog_name'];?></span>
                                        </a>
                                    </li>
                                <?endforeach;?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="center-pag">
                            <div>
                                <ul class="pagination">
                                    <?php echo $this->pagination->create_links();?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </article>
        <!-- end Our Puppies -->

    </section>

</div>
