
<!-- Footer -->
<footer>

    <!-- begin Contact -->
    <article class="contact">
        <div id="map"></div>
        <div id="contact_bg">
            <div class="container">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="title">
                            <div class="centered"><div><h2>Наши контакты</h2></div></div>
                            <p>Вы можете позвонить нам  по любому вопросу или заказать обратный звонок, а если Вы рядом, Добро пожаловать в гости!</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-6">
                        <address>
                            <i class="icon-home"></i> <?=$settings['set_address']?><br>
                            <i class="icon-phone"></i> <?=$settings['set_phone']?><br>
                            <i class="icon-mail"></i> <a href="mailto:<?=$settings['set_email']?>"><?=$settings['set_email']?></a><br>
                            <i class="icon-vkontakte"></i> <noindex><a rel="nofollow" href="http://<?=$settings['set_vk']?>" target="_blank"><?=$settings['set_vk']?></a></noindex>
<!--                            <i class="icon-twitter"></i> Twitter:  <a href="#">twitter.com/company</a><br />-->
                        </address>
                    </div>

                    <div class="col-sm-6">
                        <form class="form-inline" role="form" id="contact-form" method="post" accept-charset="utf-8">
                            <p><?php echo $this->session->flashdata('message');?></p>
                            <div class="form-group pull-left">
                                <label class="sr-only" for="name">Имя</label>
                                <input type="text" class="form-control" id="call_name" placeholder="Имя" name="call_name" required>
                            </div>

                            <div class="form-group pull-right">
                                <label class="sr-only" for="email">Email</label>
                                <input type="tel" class="form-control" id="call_tel" placeholder="Телефон" name="call_tel" required>
                            </div>

                            <textarea class="form-control pull-left" rows="8" name="call_message" placeholder="Сообщение"></textarea>
                            <input type="hidden" name="call_date" value="<?php echo date("U");?>">

                            <input type="submit" class="btn btn-default pull-right" name="submit" value="Отправить">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </article>
    <!-- end Contact -->

    <div class="bottom-foot">
        <p>© <?=date('Y')?> <?=$settings['set_company']?>. All rights reserved.<br>
            <noindex><a rel="nofollow" href="https://vk.com/id293065641" target="_blank">By Yugin Kysloff</a></noindex>
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

<!-- Gmaps -->
<script src="http://maps.google.com/maps/api/js" ></script>
<script src="/js/gmaps.js" ></script>

<!-- Custom -->
<script src="/js/script.js"  ></script>

<!-- ======================= End JQuery libs ======================= -->

</body>
</html>