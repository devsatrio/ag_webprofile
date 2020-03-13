<script type="text/javascript">
function hapus(x){
	var konfirm=confirm("Yakin Ingin Menghapus Ini ?");
	if(konfirm){
		var id=x.parent().parent().find('.id').html();
		$.post('<?= base_url("admin/slider/hapus")?>/'+id).done(function(){
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
                  	Galeri
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" href="<?= base_url("admin/slider/tambah")?>" style="margin-bottom:20px;">Tambah Slider</a>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Keterangan</th>
                                    <th>Gambar</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=1;
									foreach($data as $data){?>
                                    <tr>
                                    	<td class="id hidden"><?= $data->id?></td>
                                    	<td><?= $no?></td>
                                        <td><?= $data->keterangan?></td>
                                        <td><?= $data->url_gambar?></td>
                                        <td>
                                        <a href="javascript:void(null)" onclick="hapus($(this))" class="btn btn-danger btn-xs">hapus</a>
                                        </td>
                                    </tr>
                                    <?php $no++;}?>
                                </tbody>
                            </table>
                            <?= $page?>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>