<link rel="stylesheet" type="text/css"
    href="<?= base_url("tpl_admin")?>/assets/bootstrap-datepicker/css/datepicker.css" />
<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Tambah Post
            </header>
            <div class="panel-body">
                <form method="post" action="<?= base_url("admin/post/do_tambah")?>" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Judul</label>
                            <input type="text" class="form-control" name="judul" required autofocus />
                        </div>
                        <div class="col-lg-6">
                            <label>Tanggal</label>
                            <input type="text" class="form-control default-date-picker" name="tanggal"
                                value="<?php echo date('Y-m-d');?>" readonly />
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-lg-6">
                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <?php
								foreach($kategori as $kat){?>
                                <option value="<?= $kat->id_kategori?>"><?= $kat->nama_kategori?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-6">
                            <label>Gambar</label>
                            <input type="file" class="form-control" name="gambar" />
                        </div>
                    </div>
                    <br>
                    <div class="form-group">
                        <label>Isi</label>
                        <textarea class="form-control ckeditor" name="isi" rows="8"></textarea>
                    </div>
                    <div class="row">
                        <div class=" col-lg-4">
                            <label>Tampilkan Di Beranda</label><br />
                            <input type="checkbox" name="tampil" /> Centang untuk menampilkan di beranda
                        </div>

                    </div>
                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success"> Simpan</button>
                        <button type="reset" onclick="history.go(-1)" class="btn btn-warning">Batal</button>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>
<script src="<?= base_url()?>tpl_admin/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>tpl_admin/tinymce/tinymce.dev.js"></script>
<script type="text/javascript" src="<?= base_url()?>tpl_admin/assets/bootstrap-datepicker/js/bootstrap-datepicker.js">
</script>
<script src="<?= base_url()?>tpl_admin/customjs/formpost.js"></script>