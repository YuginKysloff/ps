<div id="content">
	<section id="home" class="updatable">
		
		<!-- Slider -->
		<article class="bannercontainer">
			<div class="banner ">
				<ul>
					<? foreach($slides as $item):?>
						<li data-transition="<?=$item['slide_mode'];?>" data-slotamount="1">
							<img src="<?=$item['slide_url'];?>" alt="<?=$item['slide_name'];?>" />
							<div
								class="caption lfb "
								data-x="left"
								data-y="top"
								data-speed="1000"
								data-start="500"
								data-easing="easeOutBack"
							>
								<p class="slider_title"><span><?=$item['slide_name'];?></span>
									<?=$item['slide_desc'];?></p>
								<a href="<?=$item['slide_button_url'];?>" class="">Подробнее...</a>
							</div>
						</li>
					<? endforeach;?>
				</ul>
			</div>
		</article>
		<!-- End Slider -->
		<!-- begin Our Reputation -->
		<article class="reputation">
			<div class="container">
				<header><h2>Наши достижения</h2></header>

				<div class="row">
					<div class="col-md-12">
						<div id="carousel-reputation" class="carousel slide" data-ride="carousel">
							<!--         Wrapper for slides-->
							<div class="carousel-inner">
								<?$i=0;?>
								<? foreach($diploms as $item):?>
									<div class="item <? if($i == 0) echo 'active';?>">
										<img src="<?=$item['diplom_img'];?>" alt="<?=$item['diplom_name'];?>">
										<p>"<?=$item['diplom_desc'];?>"</p>
										<span><?=$item['diplom_date'];?></span>
									</div>
									<?$i++;?>
								<? endforeach;?>
							</div>

							<!--         Controls-->
							<a class="left carousel-control" href="#carousel-reputation" data-slide="prev">
								<i class="icon-left-open"></i>
							</a>
							<a class="right carousel-control" href="#carousel-reputation" data-slide="next">
								<i class="icon-right-open"></i>
							</a>
						</div>
					</div>
				</div>

			</div>
		</article>
		<!-- end Our Reputation -->
		<!-- Our Puppies -->
		<article class="puppies">
		<div class="container">

			<div class="row">
				<div class="col-xs-12"><h2>Наши собаки</h2></div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="grid">
						<ul>
							<? foreach($dogs as $item):?>
								<li class="<? if($item['dog_gender'] == 0) echo 'famale'; else echo 'male';?>">
									<a href="/dogs">
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

		</div>     
		</article>
		<!-- end Our Puppies -->

		<!-- Our Services -->
		<article class="services">
			<div class="container">
				<div class="row">
					<div class="col-xs-12"><h2>Наши услуги</h2></div>
				</div>
				<? foreach($services as $item):?>
					<div class="row service first">
						<div class="col-md-7">
							<h3><?= $item['serv_name'];?></h3>
							<?= character_limiter($item['serv_desc'],300);?>
						</div>
						<div class="col-md-5">
							<img src="<?= $item['serv_img'];?>" alt="<?= $item['serv_name'];?>">
						</div>
					</div>
				<? endforeach;?>
			</div>
		</article>
		<!-- end Our Services -->
	</section>
</div>
