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
				<div class="col-xs-12"><h2>Наши щенки</h2></div>
			</div>

			<div class="row">
				<div class="col-xs-12">
					<div class="grid">
						<ul>
							<? foreach($pets as $item):?>
								<li class="<? if($item['pet_gender'] == 0) echo 'famale'; else echo 'male';?>">
									<a href="/pets">
										<div class="more">
											<i class="icon-search pull-right"></i>
											<span class="price"><?=$item['pet_price'];?> руб.</span>
											<span class="wks"><?=round((time() - $item['pet_birthday'])/604800, 1);?> нед</span>
											<span class="txt"><? if($item['pet_gender'] == 0) echo 'девочка'; else echo 'мальчик';?></span>
										</div>
										<?if($item['pet_discount'] == 1) echo '<span class="tag sale"><span>sale</span></span>';?>
										<?if($item['pet_status'] == 0) echo '<span class="tag sold"><span>sold</span></span>';?>
										<img src="<?=$item['pet_img'];?>" alt="<?=$item['pet_breed'];?>"/>
										<span class="name"><?=$item['pet_breed'];?></span>
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
							<h2><?= $item['serv_name'];?></h2>
							<?= $item['serv_desc'];?>
						</div>
						<div class="col-md-5">
							<img src="<?= $item['serv_img'];?>" alt="<?= $item['serv_name'];?>">
						</div>
					</div>
				<? endforeach;?>
			</div>
		</article>
		<!-- end Our Services -->


		<!-- Coupons -->
<!--		<article class="coupons">-->
<!--			<div class="container">-->
<!--				<header><h2>Акционные купоны</h2></header>-->
<!--				-->
<!--				<div class="row">-->
<!--					<div class="title">-->
<!--						<div class="centered"><div><h2>In-Store Printable Coupons</h2></div></div>-->
<!--						<p>We offer all of our customers in-store printable coupons that you can only find online on our website. Check back daily for news deals!</p>-->
<!--						<hr>-->
<!--					</div>-->
<!--				</div>-->
<!--		-->
<!--				<div class="row coupon">-->
<!--					<div class="col-sm-4">-->
<!--						<img src="img/coupons/coupon01.jpg" alt="pet image">-->
<!--					</div>-->
<!--					<div class="col-sm-7">-->
<!--						<span class="expires">expires: 4/11/2014</span>-->
<!--						<h3>Hand Scissor Haircut</h3>-->
<!--						<span class="newnumber">Free</span>-->
<!--						<p>Cats and dogs ejoyment. Our facility was designed to offer your pet the most exclusive and unique experience, a perfect alternative to a caged</p>-->
<!--						<a href="#" class="btn btn-default">Print Code</a>-->
<!--					</div>-->
<!--				</div>-->
<!---->
<!--			</div>     -->
<!--		</article>-->
		<!-- end Coupons -->

	</section>
</div>
