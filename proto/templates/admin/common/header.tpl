<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Administrator Dashboard | AwesomeBookShop</title>

  <!-- Bootstrap -->
  <link href="{$BASE_URL}vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{$BASE_URL}vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="{$BASE_URL}vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="{$BASE_URL}vendors/iCheck/skins/flat/green.css" rel="stylesheet">

  <!-- bootstrap-progressbar -->
  <link href="{$BASE_URL}vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{$BASE_URL}vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
  <!-- bootstrap-daterangepicker -->
  <link href="{$BASE_URL}vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{$BASE_URL}css/admin/custom.min.css" rel="stylesheet">

</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="?page=home" class="site_title"><i class="fa fa-paw"></i> <span>Administrador</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{$BASE_URL}images/admin/img.jpg" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bem vindo,</span>
              <h2>Tiago Miguel Alves Campos</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>Geral</h3>
              <ul class="nav side-menu">
                <li><a><i class="fa fa-home"></i> Páginas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{$BASE_URL}pages/admin/home.php">Página inicial</a></li>
                    <li><a href="{$BASE_URL}pages/admin/clients.php">Clientes</a></li>
                    <li><a href="{$BASE_URL}pages/admin/workers.php">Funcionários</a></li>
                    <li><a href="{$BASE_URL}pages/admin/admins.php">Administradores</a></li>
                    <li><a href="{$BASE_URL}pages/admin/comments.php">Comentários</a></li>
                    <li><a href="{$BASE_URL}pages/admin/logs_clients.php">Logs Clientes</a></li>
                  </ul>
                </li>
                  <!--
                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=form">General Form</a></li>
                      <li><a href="?page=form_advanced">Advanced Components</a></li>
                      <li><a href="?page=form_validation">Form Validation</a></li>
                      <li><a href="?page=form_wizards">Form Wizard</a></li>
                      <li><a href="?page=form_upload">Form Upload</a></li>
                      <li><a href="?page=form_buttons">Form Buttons</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=general_elements">General Elements</a></li>
                      <li><a href="?page=media_gallery">Media Gallery</a></li>
                      <li><a href="?page=typography">Typography</a></li>
                      <li><a href="?page=icons">Icons</a></li>
                      <li><a href="?page=glyphicons">Glyphicons</a></li>
                      <li><a href="?page=widgets">Widgets</a></li>
                      <li><a href="?page=invoice">Invoice</a></li>
                      <li><a href="?page=inbox">Inbox</a></li>
                      <li><a href="?page=calendar">Calendar</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=tables">Tables</a></li>
                      <li><a href="?page=tables_dynamic">Table Dynamic</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=chartjs">Chart JS</a></li>
                      <li><a href="?page=chartjs2">Chart JS2</a></li>
                      <li><a href="?page=morisjs">Moris JS</a></li>
                      <li><a href="?page=echarts">ECharts</a></li>
                      <li><a href="?page=other_charts">Other Charts</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=fixed_sidebar">Fixed Sidebar</a></li>
                      <li><a href="?page=fixed_footer">Fixed Footer</a></li>
                    </ul>
                  </li>
                -->
              </ul>
            </div>
              <!--
              <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="?page=e_commerce">E-commerce</a></li>
                      <li><a href="?page=projects">Projects</a></li>
                      <li><a href="?page=project_detail">Project Detail</a></li>
                      <li><a href="?page=contacts">Contacts</a></li>
                      <li><a href="?page=profile">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="pages/admin/page_403.html">403 Error</a></li>
                      <li><a href="pages/admin/page_404.html">404 Error</a></li>
                      <li><a href="pages/admin/page_500.html">500 Error</a></li>
                      <li><a href="?page=plain_page">Plain Page</a></li>
                      <li><a href="pages/admin/login.html">Login Page</a></li>
                      <li><a href="?page=pricing_tables">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="?page=level2">Level Two</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="?page=level2">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>
                  <li><a href="{$BASE_URL}javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div>
            -->
          </div>


          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="pages/admin/login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="{$BASE_URL}javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="{$BASE_URL}images/admin/img.jpg" alt="">Tiago Miguel Alves Campos
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="{$BASE_URL}javascript:;"> Perfil</a></li>
                  <li>
                    <a href="{$BASE_URL}javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Definições</span>
                    </a>
                  </li>
                  <li><a href="{$BASE_URL}javascript:;">Ajuda</a></li>
                  <li><a href="{$BASE_URL}pages/admin/login.html"><i class="fa fa-sign-out pull-right"></i> Sair</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="{$BASE_URL}javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="{$BASE_URL}images/admin/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>Manuel Pereira Lopes</span>
                        <span class="time"> 3 minutos a trás</span>
                      </span>
                      <span class="message">
                        Adicionou um novo produto na loja
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{$BASE_URL}images/admin/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>Manuel Pereira Lopes</span>
                        <span class="time"> 4 minutos a trás</span>
                      </span>
                      <span class="message">
                        Adicionou um novo produto na loja
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{$BASE_URL}images/admin/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>Manuel Pereira Lopes</span>
                        <span class="time"> 5 minutos a trás</span>
                      </span>
                      <span class="message">
                        Adicionou um novo produto na loja
                      </span>
                    </a>
                  </li>
                  <li>
                    <a>
                      <span class="image"><img src="{$BASE_URL}images/admin/img.jpg" alt="Profile Image" /></span>
                      <span>
                        <span>Manuel Pereira Lopes</span>
                        <span class="time"> 6 minutos a trás</span>
                      </span>
                      <span class="message">
                        Adicionou um novo produto na loja
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>Ver todos alertas</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
        <!-- /top navigation -->