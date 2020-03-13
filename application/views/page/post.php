<section class="pt-60" data-bg-color="#f1f1f1">
        <div class="auto-container pb-35">
            <div class="sec-title">
                <h2>Berita dan Agenda</h2>
                <div class="line"></div>
            </div>
            <div class="row clearfix">
                <div class="col-md-9 col-sm-8 col-xs-12 content-side">
                    <section class="blog-section style-two">
                        <div class="row clearfix">
                            <?php
                 foreach ($data as $data) { ?>
                            <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 blog-post wow fadeInRight" data-wow-delay="600ms" data-wow-duration="1500ms">
                                <article class="inner-box">
                                    <div class="image"><a href="<?= base_url("read/".$data->id_post."/4/".$data->judul.".html") ?>"><img src="<?= base_url("gambar/post")."/".$data->gambar ?>" alt=""></a></div>
                                    <div class="post-title"><h2><a href="<?= base_url("read/".$data->id_post."/4/".$data->judul.".html") ?>"><?= $data->judul ?></a></h2></div>
                                    <div class="post-info"><span class="fa fa-clock-o"></span><?= date_format(date_create($data->tanggal),'d-m-Y') ?>&ensp;&ensp;<span class="fa fa-envelope-o"></span> &ensp; <?= $data->nama_kategori ?></div>
                                    <div class="post-desc"><p><?= substr(strip_tags($data->isi),0,300) ?></p></div>
                                    <div class="more-link"><a class="theme-btn read-more" href="<?= base_url("read/".$data->id_post."/4/".$data->judul.".html") ?>">Selengkapnya</a></div>
                                </article>
                            </div>
                            <?php }?>                               
                        </div>
                    </section>
                </div>

                <div class="col-md-3 col-sm-4 col-xs-12">
                    <aside class="sidebar">
                        <div class="widget recent-posts wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                        <div class="sidebar-title"><h3>Berita Terbaru</h3></div>
                        <?php foreach($latest as $terbaru){ ?>
                        <div class="post">
                            <div class="post-thumb"><a href="#"><img src="<?= base_url("gambar/post")."/".$terbaru->gambar ?>" alt="Berita">
                                </a></div>
                            <h6><a href="#"><?= $terbaru->judul ?></a></h6>
                        </div>
                        <?php } ?>
                    </aside>
                </div>
            </div>
        </div>
        <div align="center">
            <nav aria-label="Page navigation">
                <?= $halaman;?>
            </nav>
        </div>
    </section>



    <!-- ============================================================================= ---->













