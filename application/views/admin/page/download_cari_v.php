<script type="text/javascript">
function hapus(x){
  var konfirm=confirm("Yakin Ingin Menghapus Ini ?");
  if(konfirm){
    var id=x.parent().parent().find('.id').html();
    $.post('<?= base_url("admin/download/hapus")?>/'+id).done(function(){
      x.parent().parent().remove()
    });
    $.post('<?= base_url("admin/download/hapus_file")?>/'+id).done(function(){
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
                    Daftar File
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" href="<?= base_url("admin/download/tambah")?>" style="margin-bottom:20px;">Tambah File</a>
                  <form action="<?= base_url("admin/download/cari")?>" method="get" class="form-inline">
                  <div class="form-group">
                    <input type="text" class="form-control" name="produk" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="cari"><i class=" icon-search"></i> Cari</button>
                  </div>
                  </form>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Peraturan</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                  <?php
                  $no=$this->uri->segment(4)+1;
                  foreach($data as $data){?>
                                    <tr>
                                      <td class="id hidden"><?= $data->id_download?></td>
                                      <td><?= $no?></td>
                                        <td><?= $data->peraturan?></td>
                                        <td><?= substr(strip_tags($data->deskripsi),0,100)?></td>
                                        <td>
                                        <a href="<?= base_url("admin/download/edit")."/".$data->id_download?>" class="btn btn-warning btn-xs">Edit</a>
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