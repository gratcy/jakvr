<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>JakVR Transaction Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/AdminLTE.min.css'); ?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/skins/_all-skins.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/iCheck/flat/blue.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/morris/morris.css'); ?>">
  <!-- jvectormap -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/datepicker/datepicker3.css'); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/daterangepicker/daterangepicker.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('plugins/datetimepicker/jquery.datetimepicker.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('plugins/chosen/chosen.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('plugins/jQueryUI/jquery-ui-1.10.3.custom.min.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo themes_url('plugins/fancybox/fancybox/jquery.fancybox.css'); ?>" media="screen" />

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
<!-- jQuery 2.2.3 -->
<link rel="icon" type="image/png" href="<?php echo themes_url('dist/img/favicon.png'); ?>">
  <script type="text/javascript" src="<?php echo themes_url('plugins/jQuery/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo themes_url('plugins/fancybox/fancybox/jquery.mousewheel-3.0.6.pack.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo themes_url('plugins/fancybox/fancybox/jquery.fancybox.pack.js'); ?>"></script>
  <script type="text/javascript">
  var SITE_URL = '<?php echo site_url(); ?>';
  </script>
</head>
<body class="hold-transition skin-red fixed sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url(); ?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>j</b>VR</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Jak</b>VR</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-file-o"></i>
              <span class="label label-success"><?php echo __get_new_product(); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo __get_new_product(); ?> new products</li>
              <li style="height:40px">
                <ul class="menu">
				<li class="footer"><a href="<?php echo site_url('product'); ?>">View all</a></li>
				</ul>
				</li>
              </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><?php echo __get_order_unapproved($this -> privileges -> sesresult['ubid']); ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have <?php echo __get_order_unapproved($this -> privileges -> sesresult['ubid']); ?> order un approved</li>
              <li style="height:40px">
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
				<li class="footer"><a href="<?php echo site_url('order'); ?>">View all</a></li>
                </ul>
              </li>
            </ul>
          </li>

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo themes_url('dist/img/no-avatar.png'); ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this -> privileges -> sesresult['uemail']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo themes_url('dist/img/no-avatar.png'); ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $this -> privileges -> sesresult['uemail']; ?>
                  <small>Member since <?php echo date('M Y',$this -> privileges -> sesresult['uregdate']); ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo site_url('settings'); ?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout'); ?>" class="btn btn-default btn-flat" onclick="return confirm('<?php echo $this -> privileges -> sesresult['uemail']; ?>, are you sure you want to logout?');">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
