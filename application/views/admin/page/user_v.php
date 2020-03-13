<script type="text/javascript">
function hapus(x){
	var konfirm=confirm("Yakin Ingin Menghapus Ini ?");
	if(konfirm){
		var id=x.parent().parent().find('.id').html();
		$.post('<?= base_url("admin/user/hapus")?>/'+id).done(function(){
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
                  	User
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <!-- <a class="btn btn-success" href="<?= base_url("admin/user/tambah")?>" style="margin-bottom:20px;">Tambah User</a> -->
                  
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Username</th>
                                    <!-- <th>Kategori</th>
                                    <th>Tanggal</th> -->
                                    <th>Status</th>
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
                                        <td><?= $data->user?></td>
                                        <!-- <td><?= $data->nama_kategori?></td>
                                        <td><?= $data->tanggal?></td> -->
                                        <td>
                                          <?php if ($data->status == '1') { ?>
                                             <span class="badge badge-success">Aktif</span>
                                           <?php } else { echo ""; } ?>
                                        </td>
                                        <td>
                                        <button class="col-sm-5 btn btn-primary" href="" onclick="edit(<?= $data->id ?>)"> Edit<i class="halflings-icon white edit"></i> </button>

                                        <!-- <a href="<?= base_url("admin/user/edit")."/".$data->id?>" class="btn btn-warning btn-xs">Edit</a> 
                                        <a href="javascript:void(null)" onclick="hapus($(this))" class="btn btn-danger btn-xs">hapus</a>-->
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

<div class="modal fade bs-example-modal-lg" id="popup_" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">
          Preview Data
        </h4>
      </div>
      <div class="modal-body no-over">
          <div role="tabpanel" class="form-panel">
            <div class="tab-content">
                <div class="form-horizontal style-form">
                <table class="table table-striped">
                  <tr>
                    <td width="20%" align="left">User</td>
                    <td width="20%"></td>
                    <td align="left" id="nama">
                      <input type="text" class="form-control" name="user" id="user_p" placeholder="Nama Pengguna" required>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Password</td>
                    <td width="20%"></td>
                    <td align="left" id="alamat_p">
                      <input type="text" class="form-control" name="pass" id="pass_p" placeholder="Nama Pengguna" required>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Status</td>
                    <td width="20%"></td>
                    <td align="left" id="nama_pemohon_popup">
                      <input type="text" class="form-control" name="status" id="status_p" placeholder="Nama Pengguna" required>
                    </td>
                  </tr>
                  
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
          // Untuk sunting
          function edit(id){
            $("#id").val(id);
            if(id != ''){
              $.ajax({
                url: "<?= base_url() ?>admin/user/get_data/"+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                  $("#id_p").val(response.id);
                  $("#user_p").val(response.user);
                  $("#pass_p").val(response.pass);
                  $("#status_p").val(response.status);
                }
              });
            }
            $("#popup_").modal("show");
          }
  </script>