<script type="text/javascript">
function hapus(x){
    var konfirm=confirm("Yakin Ingin Menghapus Ini ?");
    if(konfirm){
        var id=x.parent().parent().find('.id').html();
        $.post('<?= base_url("admin/list_aduan/hapus")?>/'+id).done(function(){
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
                    Kotak Saran
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                    <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Isi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no=1;
                                    foreach($data as $val){?>
                                    <tr>
                                        <td class="id hidden"><?= $val->id_aduan?></td>
                                        <td><?=$no?></td>
                                        <td><?=$val->nama?></td>
                                        <td><?=$val->isi?></td>
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