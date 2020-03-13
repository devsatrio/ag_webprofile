<?php
$id_kat	=$this->uri->segment(6);
if($id_kat==1) $kategori="Berita Lainnya";
else	$kategori="Agenda Lainnya";
?>

<!--======= CONTENT =========-->
  <div class="content fix-nav-space"> 

    <div class="container"> 
        <div class="tittle tittle-2">
        <br><br><br><br><br>
        <h3><?= $data->judul?></h3>
        <hr>
      </div>
    
    <!--======= SUB BANNER =========-->
    <!-- <section class="sub-banner" data-stellar-background-ratio="0.5">
      <div class="overlay">
        <div class="container">
          <h3><?= $data->judul?></h3>
          <ol class="breadcrumb">
            <li><a href="#">Beranda</a></li>
            <li class="active"><?= $data->judul?></li>
          </ol>
        </div>
      </div>
    </section> -->
    
    <!--======= DETAIL PAGE =========-->
    <div class="dep-detail-page blog single-post">
      <div class="container">
        <div class="row">
          <div class="col-sm-8"> 
            
            <!--======= Images =========-->
            <div class="img-single"> <img class="img-responsive" src="<?php echo base_url()?>gambar/post/<?= $data->gambar?>" alt="" ></div>
            
            <!--======= Deneral Information =========-->
            <div class="detail-sec">
               <p><?= $data->isi?></p>              
            </div>
            
            
          </div>



          
          <!--======= SIDE BAR =========-->
          <div class="col-sm-4">
            <div class="side-bar"> 
                
             <div class="latest-tweet">
                <h5><?= $kategori?></h5>
                <ul>
                  <?php
                    foreach($lainya as $berita){?>
                    <li>
                    <a href="<?= base_url("read/detail")."/".str_replace("-","/",$berita->tanggal)."/".$berita->id_kategori."/".$berita->id_post."/".$berita->judul.".html"?>">-<?= $berita->judul?></a></li>
                    <?php }?>
                
                </ul>
              </div>
 
                      
            </div>
          </div>
          <!-- Side bar end --> 


        </div>
      </div>
    </div>
        
  </div>
 





