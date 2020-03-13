<script type="text/javascript">
function hapus(x){
	var konfirm=confirm("Yakin Ingin Menghapus Ini ?");
	if(konfirm){
		var id=x.parent().parent().find('.id').html();
		$.post('<?= base_url("admin/post/hapus")?>/'+id).done(function(){
			x.parent().parent().remove()
		});
	}
}
</script>
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Halaman
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" href="<?= base_url("admin/post/tambah")?>" style="margin-bottom:20px;">Tambah Post</a>
                  <form action="<?= base_url("admin/post/cari")?>" method="post" class="form-inline">
                  <div class="form-group">
                  	<select name="kategori" class="form-control">
                        <?php
						foreach($kategori as $kat){?>
                        <option value="<?= $kat->id_kategori?>" <?= ($kat->id_kategori==$id_kategori) ? "selected":""?>><?= $kat->nama_kategori?></option>
                        <?php }?>
                    </select>
                  </div>
                  <div class="form-group">
                  	<button type="submit" class="btn btn-primary" name="cari"><i class=" icon-search"></i> Cari</button>
                  </div>
                  </form>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Tanggal</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=1;
									foreach($data as $data){?>
                                    <tr>
										<td class="id hidden"><?= $data->id_post?></td>
                                    	<td><?= $no?></td>
                                        <td><?= $data->judul?></td>
                                        <td><?= $data->nama_kategori?></td>
                                        <td><?= $data->tanggal?></td>
                                        <td>
                                        <a href="<?= base_url("admin/post/edit")."/".$data->id_post?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="javascript:void(null)" onclick="hapus($(this))" class="btn btn-danger btn-xs">hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++;}?>
                                </tbody>
                            </table>
                            <?= $halaman?>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>