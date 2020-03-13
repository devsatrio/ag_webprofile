<link rel="stylesheet" type="text/css" href="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<script type="text/javascript" src="<?= base_url("tpl_admin")?>/assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script src="<?= base_url("tpl_admin")?>/js/advanced-form-components.js"></script>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Tambah Link
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  	<form method="post" action="<?= base_url("admin/link/do_tambah")?>" enctype="multipart/form-data">
                  <div class="form-group">
                    	<label>Judul</label>
                      <input class="form-control" type="text" name="judul" required>
				           </div>

                   <div class="form-group">
                      <label>Link</label>
                      <input placeholder="Masukkan Alamat Link" class="form-control" type="text" name="link">
                   </div>

                    
                    <div class="row" style="margin-top:5px;">
                    <div class="col-lg-4">
                   		<button type="submit" class="btn btn-success"> Tambah</button> 
                        <a href="<?= base_url("admin/link")?>" class="btn btn-warning">Batal</a>
						</div>
                    </div>
                    </form>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>