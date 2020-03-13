<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dinas Arsip dan Perpustakaan</title>
<meta name="keywords" content="HTML5,CSS3,HTML,Template,Multi-Purpose,M_Adnan,Corporate Theme,Medikal,Health Care,Medikal - Health Care & Medical HTML5 Template">
<meta name="author" content="">

<!-- FONTS ONLINE -->
<link href='http://fonts.googleapis.com/css?family=Raleway:500,600,700,100,800,900,400,200,300' rel='stylesheet' type='text/css'>

<link href="<?php echo base_url()?>assets/baru/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/style_tangsel.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/styles-2.13.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/responsive.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/animate.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url()?>assets/baru/css/ionicons.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="https://www.kedirikota.go.id/home_res/js/instafeed.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!--MAIN STYLE-->

</head>
<body>


<!-- Page Wrap ===========================================-->
<div id="wrap"> 
  
  <!-- HEADER ===========================================-->
  <header class="navbar-fixed-top">
    <!-- <div class="container">  -->
      <!--======= LOGO =========-->
      <!-- <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""></a> </div> -->
      <div class="logo"> <a href="#"><img src="<?php echo base_url()?>assets/images/1.png" alt="" ></a> </div>
      <!--======= NAVIGATION =========-->
      <nav>
        <ul id="ownmenu" class="ownmenu">
          <li><a href="<?= base_url() ?>">Home</a></li>
          <?php $urut=1;
            foreach($menu as $menu){                    
                if($menu->id_halaman!=0)
                    $link=base_url("read/".$menu->id_halaman."/".$menu->bentuk_halaman."/".str_replace(array("/"),"",$menu->nama_halaman).".html");
                else
                    $link="#";
                ?>          
                <li class="dropdown"><a href="<?= $link;?>" class="c-link dropdown-toggle"><?= $menu->nama_menu?></a>
                    <ul class="dropdown">
                    <?php
                        foreach($this->master->get_submenu($menu->id) as $submenu){?>
                          <li><a href="<?= base_url("read/".$submenu->id_halaman."/".$submenu->bentuk_halaman."/".$submenu->nama_halaman.".html");?>"><?= $submenu->nama_submenu?></a></li>
                        <?php 
                        }
                        echo "</li>";
                                                
                          ?>
                          </ul>
                </li>
                <?php }?>

                <li><a href="#">Arsip</a>
                    <ul class="dropdown">
                          <!-- <li><a href="<?php echo base_url("read/galleri_arsip")?>">Pencarian data arsip</a></li> -->
                          <li><a href="<?php echo base_url("read/galleri_arsip")?>">Berita dan Galeri</a></li>
                    </ul>
                </li>
                <li><a href="#">Perpustakaan</a>
                    <ul class="dropdown">
                          <li><a href="<?php echo base_url("read/pendaftaran_member")?>">Pendaftaran Anggota</a></li>
                          <li><a href="<?php echo base_url("read/galleri_perpus")?>">Berita dan Galeri</a></li>
                    </ul>
                </li>

                <li><a href="<?php echo base_url("read/kritiksaran")?>">Kritik Saran</a></li> 
                <li><a href="<?php echo base_url("read/download")?>">Download Center</a></li>

          <!-- <li><a href="02-about-us.html">About us </a>
            <ul class="dropdown">
              <li><a href="02-about-us.html">About</a></li>
              <li><a href="02-about-us-1.html">About 2</a></li>
            </ul>
          </li>
          <li><a href="services.html">SERVICES </a>
            <ul class="dropdown">
              <li><a href="services.html">SERVICES</a></li>
              <li><a href="services-1.html">SERVICES 2</a></li>
            </ul>
          </li>
          <li><a href="03-department.html">Department </a> </li>
          <li><a href="05-doctors.html">Gallery </a>
            <ul class="dropdown">
              <li><a href="gallery.html">GALLERY</a></li>
              <li><a href="gallery-2-col.html">GALLERY 2 col</a></li>
              <li><a href="gallery-3-col.html">GALLERY 3 col</a></li>
              <li><a href="gallery-4-col.html">GALLERY 4 col</a></li>
            </ul>
          </li>
          <li><a href="12-contact.html">Contact</a> </li> -->
        </ul>
      </nav>
    <!-- </div> -->
    
  </header>
