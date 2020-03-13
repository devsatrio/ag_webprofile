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
                  	Member Area
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" href="<?= base_url("admin/member/export")?>" style="margin-bottom:20px;">Export Excel</a>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>NIK/NIM</th>
                                    <th>Nama</th>
                                    <th>Hp</th>
                                    <th>Berkas</th>
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
                                        <td><?= $data->nik?></td>
                                        <td><?= $data->nama?></td>
                                        <td><?= $data->hp?></td>
                                        <td>
                                          <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;">
                                            
                                        <img src="<?= base_url("gambar/member")."/".$data->gambar?>" title="" />
                                          </div>
                                        </td>
                                        <td>  
                                        <!-- <a href="javascript:void(null)" onclick="hapus($(this))" class="btn btn-danger btn-xs">hapus</a> -->
                                        <button class="col-sm-5 btn btn-primary" href="" onclick="edit(<?= $data->id_member ?>)"> Detail <i class="halflings-icon white edit"></i> </button>
                                        
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

<div class="modal fade bs-example-modal-lg" id="popup_" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content c-square">
        <div class="modal-header"> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myLargeModalLabel">Data</h4>
        </div>
        <div class="modal-body">
        <table class="table">
          <tr>
            <td width="30%" align="left">NIK</td>
            <td width="10%"></td>
            <td align="left"  >
              <input type="text" id="nik_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Nama</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="nama_p" class="form-control" readonly="">
            </td>
          </tr>
          
          <tr>
            <td width="30%" align="left">Alamat</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="alamat_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Tanggal</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="tgl_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Tempat Lahir</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="tempat_lhr_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Tanggal Lahir</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="tgl_lhr_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Jenis Kelamin</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="jenkel_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Kelurahan</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="kelurahan_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">rt</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="rt_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">rw</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="rw_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">kecamatan</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="kecamatan_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">kota</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="kota_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">propinsi</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="propinsi_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">hp</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="hp_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">agama</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="agama_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">pekerjaan</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="pekerjaan_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">namainstitusi</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="namainstitusi_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">Alamatinstitusi</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="alamatinstitusi_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">prodi</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="prodi_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">kelas</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="kelas_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">email</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="email_p" class="form-control" readonly="">
            </td>
          </tr>
          <tr>
            <td width="30%" align="left">ibukandung</td>
            <td width="10%"></td>
            <td align="left">
              <input type="text" id="ibukandung_p" class="form-control" readonly="">
            </td>
          </tr>



        </table>
        </form>
        </div>
        <div class="modal-footer">
            <!-- <button type="button" id="update_data" class='btn btn-default btn-block' >Update</button> -->
        </div>
        </div>
    </div>
</div>


<div class="modal fade bs-example-modal-lg" id="" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
                    <td width="20%" align="left">NIK</td>
                    <td width="20%"></td>
                    <td align="left" id="nik">
                      <input type="text" name="nik" id="nik" placeholder="Nama Pengguna" required>
                    </td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Nama</td>
                    <td width="20%"></td>
                    <td align="left" id="nama"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Alamat</td>
                    <td width="20%"></td>
                    <td align="left" id="alamat_p"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Nama Pemohon</td>
                    <td width="20%"></td>
                    <td align="left" id="nama_pemohon_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Jenis Kelamin</td>
                    <td width="20%"></td>
                    <td align="left" id="jenis_kelamin_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Pekerjaan Pemohon</td>
                    <td width="20%"></td>
                    <td align="left" id="pekerjaan_pemohon_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Desa Pemohon</td>
                    <td width="20%"></td>
                    <td align="left" id="desa_pemohon_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Kecamatan Pemohon</td>
                    <td width="20%"></td>
                    <td align="left" id="kecamatan_pemohon_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Kabupaten / Kota</td>
                    <td width="20%"></td>
                    <td align="left" id="kabupaten_pemohon_popup"></td>
                  </tr>
                  <tr>
                    <td width="20%" align="left">Provinsi</td>
                    <td width="20%"></td>
                    <td align="left" id="propinsi_pemohon_popup"></td>
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
                url: "<?= base_url() ?>admin/member/get_data/"+id,
                type: 'get',
                dataType: 'json',
                success: function(response){
                  $("#id_p").val(response.id_member);
                  $("#tgl_p").val(response.tgl);
                  $("#nik_p").val(response.nik);
                  $("#nama_p").val(response.nama);
                  $("#tempat_lhr_p").val(response.tempat_lhr);
                  $("#tgl_lhr_p").val(response.tgl_lhr);
                  $("#jenkel_p").val(response.jenkel);
                  $("#alamat_p").val(response.alamat);
                  $("#kelurahan_p").val(response.kelurahan);
                  $("#rt_p").val(response.rt);
                  $("#rw_p").val(response.rw);
                  $("#kecamatan_p").val(response.kecamatan);
                  $("#kota_p").val(response.kota);
                  $("#propinsi_p").val(response.propinsi);
                  $("#hp_p").val(response.hp);
                  $("#agama_p").val(response.agama);
                  $("#pekerjaan_p").val(response.pekerjaan);
                  $("#namainstitusi_p").val(response.namainstitusi);
                  $("#alamatinstitusi_p").val(response.alamatinstitusi);
                  $("#prodi_p").val(response.prodi);
                  $("#kelas_p").val(response.kelas);
                  $("#email_p").val(response.email);
                  $("#ibukandung_p").val(response.ibukandung);
                  $("#namakeluarga_p").val(response.namakeluarga);
                  $("#statuskeluarga_p").val(response.statuskeluarga);
                  $("#hpkeluarga_p").val(response.hpkeluarga);                }
              });
            }
            $("#popup_").modal("show");
          }
  </script>