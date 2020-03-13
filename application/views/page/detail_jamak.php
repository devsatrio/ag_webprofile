<section id="doctor-section" class="doctor-details get-quote">
      <div class="container pt-60">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 pl-60 pl-sm-15">
              <div>
                <h3><?= $data->judul?></h3>
                <div class="post-info"><a href="#"><span class="fa fa-user"></span> Admin</a> &ensp;&ensp; <a href="#"><span class="fa fa-clock-o"></span> <?= date_format(date_create($data->tanggal), 'd-m-Y') ?></a></div>
                                    <p><?= $data->isi?></p>
              </div>
              
              
            </div>
            <div class="col-md-3 col-sm-4 col-xs-12">
                    <aside class="sidebar">
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="sidebar-title"><h3>Berita Terbaru</h3></div>
                        <?php foreach($latest as $terbaru){ ?>
                        <div class="post">
                            <div class="post-thumb"><a href="<?= base_url("read/detail")."/".str_replace("-","/",$terbaru->tanggal)."/".$terbaru->id_kategori."/".$terbaru->id_post."/".$terbaru->judul.".html"?>"><img src="<?= base_url("gambar/post")."/".$terbaru->gambar ?>" alt="">
                                </a></div>
                            <h6><a href="<?= base_url("read/detail")."/".str_replace("-","/",$terbaru->tanggal)."/".$terbaru->id_kategori."/".$terbaru->id_post."/".$terbaru->judul.".html"?>"><?= $terbaru->judul ?></a></h6>
                        </div>
                        <?php } ?>
                    </aside>
                </div>
          </div>
        </div>
      </div>
    </section>
