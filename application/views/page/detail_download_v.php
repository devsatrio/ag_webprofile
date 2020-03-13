<section class="pt-60 minheight" data-bg-color="#f1f1f1">
        <div class="auto-container pb-35">
            <div class="row clearfix">
                <div class="col-md-8 col-sm-8 col-xs-12 content-side">
                    <div class="sec-title">
                        <h2><?= $data->peraturan ?></h2>
                        <h4><?= $data->deskripsi ?></h4>
                        <div class="line"></div>
                    </div>

                    <section class="blog-section style-two">
                        <div class="row clearfix">
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $no = 1;
                            foreach($file as $data){ ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><a href="<?= base_url("home/download")."/".$data->nama_file ?>"><?php echo $data->nama_file; ?></a></td>
                                </tr>
                            <?php $no++; } ?>
                            </tbody>
                            </table> 
                                                  
                        </div>
                    </section>
                </div>
                <div class="col-md-1 "></div>
                <div class="col-md-3 col-sm-4 col-xs-12 content-side">
                <aside class="sidebar">
                    <div class="widget links-widget">
                            <h3>Link Lainnya</h3>
                            <ul>
                            <?php foreach($lain as $lain){ ?>
                                <li><a href="<?= base_url("read/detail_file")."/".$lain->id_download."/".$lain->peraturan.".html" ?>"><?= $lain->peraturan ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                </aside>
                </div>
            </div>
        </div>
    </section>

