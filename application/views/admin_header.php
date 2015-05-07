<!DOCTYPE html>
<html lang="en">
  <head>
    <title>CA (Certificate Authority) - ADMIN ONLY!</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/icon.png">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/lineicons/style.css">    
    
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/style-responsive.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/js/chart-master/Chart.js"></script>
  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>CA (Certificate Authority) - ADMIN ONLY!</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="<?php echo base_url(); ?>home/logout">Logout</a></li>
                </ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="<?php echo base_url("admin"); ?>"><img src="<?php echo base_url(); ?>assets/img/profile_pict/<?php echo $this->session->userdata('username');?>_.jpg" class="img-circle" width="60"></a></p>
                  <h5 class="centered"><?php echo $this->session->userdata('nama');?></h5>
                  <li class="sub-menu">
                      <a class="examination" href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>CA (Certificate Authority)!</span>
                      </a>
                      <ul  class="sub">
                          <li class="available_exam"><a  href="<?php echo base_url(); ?>admin/list_csr">Lists CSR</a></li>
                      </ul>
                  </li>
            </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->