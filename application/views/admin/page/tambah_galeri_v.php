<link rel="stylesheet" type="text/css" href="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="<?= base_url("tpl_admin")?>/js/advanced-form-components.js"></script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Tambah Galeri
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  	<form method="post" action="<?= base_url("admin/galeri/do_tambah")?>" enctype="multipart/form-data">
                    <div class="row">
                    	<div class=" col-lg-4">
                        <label>Judul</label>
                    	   <input type="text" class="form-control" name="judul" />
                      </div>

                      <div class=" col-lg-4">
                        <label>Tampilkan Di Beranda</label><br />
                          <input type="checkbox" name="tampil" /> * Centang untuk menampilkan di beranda
                      </div>

                    </div>
                    <div class="row">
                      <div class="col-lg-4">
                          <label>Kategori</label>
                            <select class="form-control" name="kategori">
                              <?php
                                foreach($kategori as $kat){?>
                                  <option value="<?= $kat->id_kategori?>"><?= $kat->nama_kategori?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                    	<label>Keterangan</label>
                    	<textarea class="form-control" name="keterangan" rows="6"></textarea>
					         </div>
                    <div class="row">
                    	<div class="col-lg-4">
                        <label>Gambar</label>
                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                                  <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                      <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" />
                                                  </div>
                                                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                  <div>
                                                   <span class="btn btn-white btn-file">
                                                   <span class="fileupload-new"><i class="icon-paper-clip"></i> Select image</span>
                                                   <span class="fileupload-exists"><i class="icon-undo"></i> Change</span>
                                                   <input type="file" class="default" name="gambar" />
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                    <div class="col-lg-4">
                   		<button type="submit" class="btn btn-success"> Tambah</button> 
                        <a href="<?= base_url("admin/post")?>" class="btn btn-warning">Batal</a>
						</div>
                    </div>
                    </form>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>