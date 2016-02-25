<!-- Footer -->
<footer>

	<!-- begin Contact -->
	<article class="contact">
		<div id="contact_bg">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<address class="center">
							<ul class="address">
								<li>
									<i class="icon-home"></i> <?=$settings['set_address']?>
								</li>
								<li>
									<i class="icon-phone"></i> <?=$settings['set_phone']?>
								</li>
								<li>
									<i class="icon-mail"></i> <a href="mailto:<?=$settings['set_email']?>"><?=$settings['set_email']?></a>
								</li>
								<li>
									<i class="icon-vkontakte"></i> <a href="http://<?=$settings['set_vk']?>" target="_blank"><?=$settings['set_vk']?></a>
								</li>
							</ul>
						</address>
					</div>
				 </div>
			 </div>
		</div>
	</article>
	<!-- end Contact -->

	<div class="bottom-foot">
		<p>© <?=date('Y')?> <?=$settings['set_company']?>. All rights reserved.<br>
			<a href="https://vk.com/id293065641" target="_blank">By Yugin Kysloff</a>
		</p>
	</div>

</footer>   
<!-- end Footer --> 

<a href="#" class="scrollup"><i class="icon-up-open"></i></a>



	<!-- ======================= JQuery libs =========================== -->

		<!-- jQuery -->
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
		<script>window.jQuery || document.write("<script src=\"/plugins/jQuery/jquery-2.1.4.min.js\"")</script>
		
		<!-- Respond.js media queries for IE8 -->
		<script src="/js/respond.min.js"></script>
		
		<!-- Bootstrap-->
		<script src="/bootstrap/js/bootstrap.min.js" ></script>

		<!-- Placeholder.js http://widgetulous.com/placeholderjs/ -->
		<!--[if lt IE 9]>
		<script src="/js/placeholder.js" ></script>
		<script>Placeholder.init();</script>
		<![endif]-->

		<!-- Slider Revolution -->
		<script src="/plugins/revolution/js/jquery.themepunch.plugins.min.js"></script>
		<script src="/plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>

		<!-- grid -->
		<script src="/plugins/grid/js/modernizr.custom.js"></script>
		<script src="/plugins/grid/js/classie.js"></script>
		<script src="/plugins/grid/js/thumbnailGridEffects.js"></script>

		<!-- BlockUI -->
		<script src="/js/jquery.blockUI.js"></script>
		
		<!-- scrollTo -->
		<script src="/js/jquery.scrollTo-1.4.3.1-min.js"></script>

		<!-- Custom -->
		<script src="/js/script.js"  ></script>

	<!-- ======================= End JQuery libs ======================= -->
</body>
</html>