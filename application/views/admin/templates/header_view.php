<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Панель администратора</title>

    <link rel="shortcut icon" href="/img/favicon.ico">    
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="/dist/css/skins/_all-skins.min.css">

    <link rel="stylesheet" href="/css/admin/style.css">

<!--    <script src="/ckeditor/ckeditor.js"></script>    -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a href="/admin/statistics" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>А</b>П</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Админ</b>Панель</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Переключатель меню</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a aria-expanded="false" href="/admin/users" class="dropdown-toggle">
                  <img src="/img/avatar.jpg" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $user_name;?></span>
                </a>
              </li>
            </ul>
          </div>
        </nav>
      </header>


      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">


          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">МЕНЮ</li>
            <li <?if($this->uri->segment(2) == 'statistics'):?>class="active"<?endif?>>
              <a href="/admin/statistics">
                <i class="fa fa-line-chart"></i> <span>Статистика</span>
                <small class="label pull-right bg-blue"><?php echo $count['visitors'];?></small>                
              </a>
            </li>
            <li <?if($this->uri->segment(2) == 'calls'):?>class="active"<?endif?>>
              <a href="/admin/calls">
                <i class="fa fa-phone"></i> <span>Запросы звонков</span>
                <small class="label pull-right bg-blue"><?php echo $count['calls'];?></small>
              </a>
            </li>
            <li <?if($this->uri->segment(2) == 'users'):?>class="active"<?endif?>>
              <a href="/admin/users">
                <i class="fa fa-user"></i> <span>Пользователи</span>
                <small class="label pull-right bg-blue"><?php echo $count['users'];?></small>
              </a>
            </li>
            <li class="treeview <?if(($this->uri->segment(2) == 'dogs')
                OR ($this->uri->segment(2) == 'services')
                OR ($this->uri->segment(2) == 'breeds')
                OR ($this->uri->segment(2) == 'pets')):?>active<?endif?>">
              <a href="#">
                <i class="fa fa-paw"></i> <span>Животные</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul style="display: none;" class="treeview-menu">
                <li>
                  <a href="/admin/breeds">
                    <i class="fa fa-circle-o"></i> <span>Породы</span>
                    <small class="label pull-right bg-blue"><?php echo $count['breeds'];?></small>
                  </a>
                </li>
                <li>
                  <a href="/admin/dogs">
                    <i class="fa fa-circle-o"></i> <span>Собаки</span>
                    <small class="label pull-right bg-blue"><?php echo $count['dogs'];?></small>
                  </a>
                </li>
                <li>
                  <a href="/admin/pets">
                    <i class="fa fa-circle-o"></i> <span>Щенки</span>
                    <small class="label pull-right bg-blue"><?php echo $count['pets'];?></small>
                  </a>
                </li>
                <li class="">
                  <a href="/admin/services">
                    <i class="fa fa-circle-o"></i> <span>Услуги</span>
                    <small class="label pull-right bg-blue"><?php echo $count['services'];?></small>
                  </a>
                </li>
              </ul>
            </li>
            <li class="treeview <?if(($this->uri->segment(2) == 'about')
                OR ($this->uri->segment(2) == 'slides')
                OR ($this->uri->segment(2) == 'diploms')):?>active<?endif?>">
              <a href="#">
                <i class="fa fa-image"></i> <span>Оформление</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul style="display: none;" class="treeview-menu">
                <li>
                  <a href="/admin/about">
                    <i class="fa fa-circle-o"></i> <span>О компании</span>
                  </a>
                </li>
                <li>
                  <a href="/admin/menu">
                    <i class="fa fa-circle-o"></i> <span>Меню</span>
                  </a>
                </li>
                <li class="">
                  <a href="/admin/slides">
                    <i class="fa fa-circle-o"></i> <span>Слайдер</span>
                    <small class="label pull-right bg-blue"><?php echo $count['slides'];?></small>
                  </a>
                </li>
                <li class="">
                  <a href="/admin/team">
                    <i class="fa fa-circle-o"></i> <span>Команда</span>
                    <small class="label pull-right bg-blue"><?php echo $count['team'];?></small>
                  </a>
                </li>
                <li class="">
                  <a href="/admin/diploms">
                    <i class="fa fa-circle-o"></i> <span>Награды</span>
                    <small class="label pull-right bg-blue"><?php echo $count['diploms'];?></small>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="/admin/logout">
                <i class="fa  fa-sign-out"></i> <span>Выход</span>
                <!-- <small class="label pull-right bg-yellow">12</small> -->
              </a>
            </li>              
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>      