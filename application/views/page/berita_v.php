<!--======= CONTENT =========-->
  <div class="content fix-nav-space">     
    <!--======= Blog =========-->
    <section class="blog blog-pages">
      <div class="container"> 
        <div class="tittle tittle-2">
        <br>
        <h3>Berita</h3>
        <hr>
      </div>
        
        <!--======= Blog POST =========-->
        <ul>
          <?php foreach ($berita as $dat) { ?>

          <!-- Blog Post 1 -->
          <li class="row"> 
            <!-- Post Image -->
            <div class="col-md-7 text-center">
              <div class="post-img"> <img class="img-responsive" src="<?php echo base_url()?>gambar/post/<?= $dat->gambar ?>" alt="" > </div>
            </div>
            
            <!-- Post Text Sec -->
            <div class="col-md-5">
              <div class="text-section text-center"> <a href="#."><?= $dat->judul ?></a> <span>post by <strong>Admin</strong> on <strong><?= date_format(date_create($dat->tanggal), 'd-m-Y') ?></strong></span>
                <hr>
                <p><?= substr(strip_tags($dat->isi),0,100) ?></p>
                <a href="<?= base_url("read/detail")."/".str_replace("-","/",$dat->tanggal)."/".$dat->id_kategori."/".$dat->id_post."/".$dat->judul.".html"?>" class="btn btn-1">View more</a> </div>
            </div>
          </li>

          <?php } ?>
          
        </ul>
        
        <!--======= PAGINATION =========-->
        <!-- <nav>
          <ul class="pagination">
            <li class="active"><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">...</a></li>
            <li><a href="#">8</a></li>
            <li><a href="#">9</a></li>
          </ul>
        </nav> -->
      </div>
    </section>

  </div>