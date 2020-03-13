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
                  	Tambah Slider
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  	<form method="post" action="<?= base_url("admin/slider/do_tambah")?>" enctype="multipart/form-data">
                  <div class="form-group">
                    	<label>Judul</label>
                      <input class="form-control" type="text" name="judul" required>
				           </div>

                   <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="keterangan" rows="6"></textarea>
                   </div>

                   <div class="form-group">
                      <label>Link</label>
                      <input placeholder="Masukkan Alamat Link" class="form-control" type="text" name="link">
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
                                                   <input type="file" class="default" name="gambar" required/>
                                                   </span>
                                                      <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="icon-trash"></i> Remove</a>
                                                  </div>
                                              </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:5px;">
                    <div class="col-lg-4">
                   		<button type="submit" class="btn btn-success"> Tambah</button> 
                        <a href="<?= base_url("admin/slider")?>" class="btn btn-warning">Batal</a>
						</div>
                    </div>
                    </form>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>