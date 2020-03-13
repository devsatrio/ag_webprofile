
 <div style="height: 90px"></div>

  <div class="home-3">
    <div id="banner" class="bnr-2">
      <div class="flex-banner">
        <ul class="slides">
          <!--======= SLIDER =========-->
          <?php foreach ($slider as $value) { ?>
         
          <li> <img src="<?php echo base_url()?>gambar/slider/<?= $value->url_gambar ?>" alt="" >
            <div class="container"> 
            </div>
          </li>

          <?php } ?>
        </ul>
      </div>
    </div>
  </div>
    
  <!--======= CONTENT =========-->
  <div class="content"> 

    <!--======= Blog =========-->
    <section class="blog">
      <div class="container"> 
        <!--======= TITTLE =========-->
        <div class="tittle tittle-2">
          <h3>Berita</h3>
          <hr>
        </div>
        
        <!--======= Blog POST 2nd ROW =========-->
        <ul class="row">
          
          <!-- Blog Post 2 -->

          <?php 
          $rel=0;
          foreach ($berita as $dat){            
              if($rel==1){?>
              <li class="col-md-4"> 
            <!-- Post Text Sec -->
            <div class="text-section text-center"> <a href="<?= base_url("read/detail")."/".str_replace("-","/",$dat->tanggal)."/".$dat->id_kategori."/".$dat->id_post."/".$dat->judul.".html"?>"?><?= $dat->judul ?></a><span><strong><?= date_format(date_create($dat->tanggal), 'd-m-Y') ?></strong></span>
              <hr>
              <p><?= $dat->judul ?></p>
            </div>
            <!-- Post Image -->
            <div class="post-img down"> <img class="img-responsive" src="<?php echo base_url()?>gambar/post/<?= $dat->gambar ?>" alt="" > </div>
          </li>                

             <?php }else{
            ?>
             <li class="col-md-4"> 
            <!-- Post Image -->
            <div class="post-img up"> <img class="img-responsive" src="<?php echo base_url()?>gambar/post/<?= $dat->gambar ?>" alt="" > </div>
            <!-- Post Text Sec -->
            <div class="col-md-12 text-section text-center"> <a href="<?= base_url("read/detail")."/".str_replace("-","/",$dat->tanggal)."/".$dat->id_kategori."/".$dat->id_post."/".$dat->judul.".html"?>"><?= $dat->judul ?></a> <span><strong><?= $dat->tanggal ?></strong></span>
              <hr>
              <p>
              <?= $dat->judul ?></p>
            </div>
          </li>
       <?php 
          }
        $rel++;
       }?>
          <!-- Blog Post 4 -->
          
        </ul>
      </div>
    </section>
   
</div>

 
<div class="container">
      <div class="accordion col-md-8 wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <div class="cleaner_h40"></div> 
        <div class="accordion-section">
          <div class="accordion-section">
            <a class="accordion-section-title" href="">Link Terkait <i class="glyphicon glyphicon-chevron-down"></i></a>
            <br /><br />
            <center>
            <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="https://kedirikota.go.id/" target="_blank"><img src="<?php echo base_url()?>assets/images/pemkot-kediri.png" title="" /></a></div>
              <center><h3>Kota Kediri</h3></center>
            </div>

            <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="http://inlis.kedirikota.go.id:8123/inlislite3/opac/" target="_blank"><img src="<?php echo base_url()?>assets/images/inlis.jpg" title="" /></a></div>
              <center><h3>Pencarian Buku</h3></center>
            </div>

            <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="<?php echo base_url("read/pendaftaran_member")?>" target="_blank"><img src="<?php echo base_url()?>assets/images/daftar.jpg" title="" /></a></div>
              <center><h3>Pendaftaran Member</h3></center>
            </div>

            <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="https://play.google.com/store/apps/details?id=id.kubuku.ppdkediri" target="_blank"><img src="<?php echo base_url()?>assets/images/epusda.jpg" title="" /></a></div>
              <center><h3>Epusda Kota kediri</h3></center>
            </div>
            </center>
          </div>
        </div>

        </div>

        <div class="accordion col-md-4 wow zoomIn" data-wow-duration="1.5s" data-wow-delay="0.1s">
        <div class="cleaner_h40"></div>     
        <div class="accordion-section">
          <div class="accordion-section">
            <a class="accordion-section-title" href="">Users <i class="glyphicon glyphicon-chevron-down"></i></a>
            <div id="accordion-1" class="accordion-section-content">
              <div class="menu_right">
                <li>Hari ini : <?php echo $pengunjung; ?></p>
                  Total : <?php echo $totalpengunjung->jum ?></p>
                  Pengunjung Online : <?php echo $pengunjungonline; ?></p>
                </li>  <br/>

              </div>
            </div>
          </div>
        </div>   

      </div>
  </div> 
      

    <div class="container">
      <div class="col-md-12">
        <center>
          <video width="1000" height="600" controls>
        <source src="<?php echo base_url()?>gambar/vieos.mp4" type="video/mp4">
        </video> 
          <!-- <img src="<?php echo base_url()?>gambar/4.jpg" alt="" > -->
        </center>
      </div>
    </div> 

  <div class="container">
    <div class="col-sm-6 cont-grid-one yes_magr" id='grafik'>
      <a class='icon-box' src=''>
        <img src="<?php echo base_url()?>assets/images/blue-tail.png" alt='->' />
        KEGIATAN ARSIP
      </a>

      <!-- <div id="container1" style="min-width: 310px; height: 400px; margin: 0 auto"></div> -->
      <div class="cleaner_h30"></div>
        <?php foreach ($galleri_arsip as $galeri2) { ?>
          <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="<?php echo base_url("read/galleri")?>">
            <img src="<?= base_url("gambar/galeri")."/".$galeri2->gambar?>" title="" /></a></div>
          </div>
        <?php  } ?>  
    </div>
    
    <div class="col-sm-6 cont-grid-one yes_magr" id='grafik'>
      <a class='icon-box' src=''>
        <img src="<?php echo base_url()?>assets/images/blue-tail.png" alt='->' />
        KGIATAN PERPUSTAKAAN
      </a>
       <div class="cleaner_h30"></div>
        <?php foreach ($galleri_perpus as $galeri2) { ?>
          <div class="border-photo-gallery">
            <div class="hide-photo-gallery">
              <a href="<?php echo base_url("read/galleri")?>">
            <img src="<?= base_url("gambar/galeri")."/".$galeri2->gambar?>" title="" /></a></div>
          </div>
        <?php  } ?>  
    </div>  
  </div > 


    
    <!--======= Contact Info =========-->
    <section class="contact-info">
      <div class="container"> 
        
        
      </div>
    </section>
  </div>


  
  