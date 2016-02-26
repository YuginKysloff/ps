<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Define Charset -->
	<meta charset="utf-8"/>

	<!-- Page Title -->
	<title><?=$settings['set_company'].' - '.$title;?></title>

	<!-- Metatags-->
	<meta name="description" content="<?php echo $settings['set_desc'];?>">
	<meta name="keywords" content="<?php echo $settings['set_tags'];?>">

	<!-- Responsive Metatag -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	   
	<!-- CSS -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">

	<!-- Slider Revolution -->
	<link rel="stylesheet" href="/plugins/revolution/css/settings.css">

    <!-- Font icons -->
    <link rel="stylesheet" href="/font/css/fontello.css" >
    <!--[if IE 7]>
    <link rel="stylesheet" href="/font/css/fontello-ie7.css" ><![endif]-->

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,700,500&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Lobster&subset=latin,cyrillic' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="/plugins/grid/css/component.css" />
	
	<!-- Custom CSS -->
	<link rel="stylesheet" href="/css/styles.css" />
	
	<!-- Custom Media-Queties -->
	<link rel="stylesheet" href="/css/media-queries.css" />

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>        
	<![endif]-->

	<!-- Media queries -->
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
</head>


<body>

<!-- Header -->
<header>
<nav class="navbar">
<div class="container">
	<!-- Brand and toggle get grouped for better mobile display -->
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">
			<h1><?=$settings['set_company'];?></h1>
<!--			<img src="img/logo.png" alt="Logo" />-->
		</a>
	</div>
	
	<!-- Collect the nav links, forms, and other content for toggling -->
	<div class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<? $i=1; foreach($menu as $item):?>
				<li <?php if(((string)$this->uri->segment(1) === $item['menu_slug'])
							OR (((string)$this->uri->segment(1) === '')
							AND ($i++ == 1))):?>class="active"<?php endif;?>>
					<a href="/<?=$item['menu_slug'];?>"><?=$item['menu_name'];?></a>
				</li>
			<? endforeach;?>
		</ul>

		<div class="navbar-form navbar-right">
			<div class="form-group">
				<a href="/pets/cart">
					<span class="input-group-btn">
						<button class="btn" type="button"><i class="icon-basket"></i><span><?= $count;?></span></button>
					</span>
				</a>
			</div>
		</div>

	</div><!--/.nav-collapse -->
</div>
</nav>
</header>
<!-- end Header -->