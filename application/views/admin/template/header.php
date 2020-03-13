<?php
$sesi = $this->session->userdata('login');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>DASHBOARD </title>

    <!-- Bootstrap core CSS -->
    <link href="<?= base_url();?>tpl_admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url();?>tpl_admin/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?= base_url()?>tpl_admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link href="<?= base_url()?>tpl_admin/assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
    <link href="<?= base_url()?>tpl_admin/assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />



    <!-- Custom styles for this template -->
    <link href="<?= base_url();?>tpl_admin/css/style.css" rel="stylesheet">
    <link href="<?= base_url();?>tpl_admin/css/style-responsive.css" rel="stylesheet" />
    
    
    
	<script src="<?= base_url();?>tpl_admin/js/jquery.js"></script>
    <script src="<?= base_url();?>tpl_admin/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?= base_url();?>tpl_admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?= base_url();?>tpl_admin/js/jquery.scrollTo.min.js"></script>
    <script src="<?= base_url();?>tpl_admin/js/respond.min.js" ></script>
    <!--<script src="js/jquery.nicescroll.js" type="text/javascript"></script>-->


    <!--common script for all pages-->
    <script src="<?= base_url();?>tpl_admin/js/common-scripts.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
          <!-- <div class="sidebar-toggle-box">
              <div data-original-title="Toggle Navigation" data-placement="right" class="icon-reorder tooltips"></div>
          </div> -->
          <!--logo start-->
          <a href="index.html" class="logo" >DASH<span>BOARD</span></a>
          <!--logo end-->
          <div class="nav notify-row" id="top_menu">
            <!--  notification start -->
              <!-- settings start -->
          </div>
          <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <!-- <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li> -->
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          <!-- <img alt="" src="<?= base_url("tpl_admin")?>/img/avatar1_small.jpg"> -->
                          <span class="username"><?= $sesi['user']?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <!-- <li><a href="#"><i class=" icon-suitcase"></i>Profile</a></li> -->
                          <!-- <li><a href="<?= base_url("admin/gantiPass")?>"><i class="icon-cog"></i> Settings</a></li> -->
                          <li alignt="center"><a href="<?= base_url("admin/gantiPass")?>">Edit password</a></li>
                          <li><a href="<?= base_url("login/logout")?>"><i class="icon-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
              </ul>
          </div>
      </header>
      <!--header end-->
      <!--sidebar start-->
