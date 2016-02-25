<div id="content">
    <section id="gallery" class="updatable">

        <!-- begin Our Puppies -->
        <article class="puppies">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12"><h2>Наши щенки</h2></div>
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
                                <? foreach($pets as $item):?>
                                    <li class="<? if($item['pet_gender'] == 0) echo 'famale'; else echo 'male';?>
                                    <? if($item['pet_discount'] == 1) echo 'feature';?>
                                    <? if($item['pet_status'] == 0) echo 'top';?>">
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
