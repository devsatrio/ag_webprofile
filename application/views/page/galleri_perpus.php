<div class="content fix-nav-space"> 
    <br>

 <section class="gallery-pages">
      <div class="portfolio-wrapper">
        <div class="container"> 
        <div class="tittle tittle-2">
        <br>
        <h3>Galeri Perpustakaan</h3>
        <hr>
      </div>

        <div class="container"> 
        
          <!--======= FILTERS =========-->
          <!-- <ul class="filter">
            <li><a class="active" href="#." data-filter="*">Show All</a></li>
            <li><a href="#" data-filter=".dental">Dental</a></li>
            <li><a href="#" data-filter=".cardiology">Cardiology</a></li>
            <li><a href="#" data-filter=".disabled">For Disabled</a></li>
            <li><a href="#" data-filter=".ophthalmology">Ophthalmology</a></li>
            <li><a href="#" data-filter=".emergency">Emergency</a></li>
          </ul> -->
        </div>
        <div class="container popup-gallery"> 
          
          <!--======= GALLERY ROW =========-->
          <ul class="items gallery-item row">
            <?php
                foreach($galeri as $value){?>
            <!--======= GALLERY IMG 1 =========-->
            <li class="col-sm-3 item cardiology ophthalmology">
              <section> <img class="img-responsive" src="<?php echo base_url()?>gambar/galeri/<?= $value->gambar ?>" alt="">
                <div class="item-over"> <a href="<?php echo base_url()?>gambar/galeri/<?= $value->gambar ?>" class="item-in pa-5">
                  <h5><?= $value->judul ?></h5> </a> </div>
              </section>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </section>


<section class="gallery-pages">
<div class="portfolio-wrapper">
<div class="container"> 

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

        
      </div>
    </section>
    
  </div>

