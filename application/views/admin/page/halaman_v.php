<script type="text/javascript">
$(document).ready(function(){
	$('form[name=tambah').submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'<?= base_url("admin/halaman/do_tambah_halaman")?>',
			data:$(this).serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				if(data.bentuk_halaman==1){
					href="<a class='btn btn-xs btn-primary' href='<?= base_url("admin/halaman/edit_tunggal/")?>"+data.id+"'>Lihat Artikel</a>";
				}else{
					href="<a class='btn btn-xs btn-primary' href='<?= base_url("admin/halaman/edit_jamak/")?>"+data.id+"'>Lihat Artikel</a>";
				}
				var no=$('tr:last').find('.nomor').html();
				no    =parseInt(no)+1;
				var row="<tr><td class='nomor'>"+no+"<span class='hidden'>"+data.id+"</span></td><td class='nama'>"+data.nama_halaman+"</td><td class='bentuk'>"+data.bentuk+"<span class='hidden bentuk_halaman'>"+data.bentuk_halaman+"</span></td><td><button class='btn btn-warning btn-xs' onClick='edit_halaman($(this))'>Edit</button> <a class='btn btn-danger btn-xs' onclick='return hapus($(this))'>Hapus</a> "+href+"</td></tr>";
				$('table > tbody').append(row);
				$('#tambah').modal('hide');
				if(data.bentuk_halaman==1){
					window.location='<?= base_url("admin/halaman/edit_tunggal")?>/'+data.id;
				}else{
					window.location='<?= base_url("admin/halaman/edit_jamak")?>/'+data.id;
				}
			}
		})
	});
});

var row;
function hapus(x){
	var konfirm=confirm("Apakah Anda Ingin Menghapus");
	if(konfirm){
		var id=x.parent().parent().find('.id_halaman').html();
		$.post('<?= base_url("admin/halaman/hapus")?>/'+id)
		.done(function(){
			x.parent().parent().remove();
		});
	}
	return false;
}
function edit_halaman(x){
	row			=x.parent().parent();
	var nama	=row.find('.nama').html();
	var bentuk	=row.find('.bentuk_halaman').html();
	var id		=row.find('.id_halaman').html();
	$('form[name=edit] > .form-group > input[name=nama_halaman]').val(nama);
	$('form[name=edit] > .form-group > input[type=hidden]').val(id);
	$('form[name=edit] > .form-group > select').val(bentuk);
	$('#edit').modal('show');
}

function submit_edit(){
	$.ajax({
		url:'<?= base_url("admin/halaman/edit_halaman")?>',
		dataType:'json',
		type:'post',
		data:$('form[name=edit]').serialize(),
		success:function(data){
			row.find('.nama').html(data.nama_halaman);
			row.find('.bentuk').html(data.bentuk);
			row.find('.bentuk_halaman').html(data.bentuk_halaman);
			$('#edit').modal('hide');
		},
		error:function(e){
			alert("Kesalahan");
		}
	});
}
</script>

      <!--main content start-->
      						<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Modal Tittle</h4>
                                          </div>
                                          <div class="modal-body">
                                          	<form role="form" name="edit" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Halaman</label>
                                                      <input type="text" class="form-control" name="nama_halaman">
                                                      <input type="hidden" name="id_halaman" />
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Bentuk</label>
                                                      <select class="form-control" name="bentuk">
                                                      	<option value="1">Tunggal</option>
                                                        <option value="2">Jamak</option>
                                                      </select>
                                                  </div>
                                                  <button type="button" onclick="submit_edit();" class="btn btn-default">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              
                              <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Tambah Halaman</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form role="form" name="tambah" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Halaman</label>
                                                      <input type="text" class="form-control" name="nama_halaman">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Bentuk</label>
                                                      <select class="form-control" name="bentuk">
                                                      	<option value="1">Tunggal</option>
                                                        <option value="2">Jamak</option>
                                                      </select>
                                                  </div>
                                                  <button type="submit" class="btn btn-default">Submit</button>
                                              </form>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <section class="panel">
                  <header class="panel-heading">
                  	Halaman
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" data-toggle="modal" href="#tambah" style="margin-bottom:20px;">Tambah Halaman</a>
                  <form action="" method="post" class="form-inline">
                  <div class="form-group">
                  	<input type="text" name="nama_halaman" placeHolder="nama halaman" class="form-control" />
                  </div>
                  <div class="form-group">
                  	<select name="bentuk" class="form-control">
                        <option value="1">Tunggal</option>
                        <option value="2">Jamak</option>
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
                                    <th>Nama Halaman</th>
                                    <th>Bentuk Halaman</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=1;
                                    foreach($halaman as $hal){?>	
                                    	<tr>
                                        	<td class="hidden"><span class="hidden id_halaman"><?= $hal->id_halaman?></span><span class="hidden bentuk_halaman"><?= $hal->bentuk_halaman?></span></td>
                                        	<td class="nomor"><?= $no?></td>
                                            <td class="nama"><?= $hal->nama_halaman?></td>
                                            <td class="bentuk"><?= ($hal->bentuk_halaman==1) ? "Tunggal":"Jamak";?></td>
                                            <td>
                                            <button class="btn btn-warning btn-xs" onClick="edit_halaman($(this))">Edit</button>
                                            <a class="btn btn-danger btn-xs" onclick="return hapus($(this))">Hapus</a>
                                            <a class="btn btn-primary btn-xs" href="<?= $hal->bentuk_halaman==1 ? base_url("admin/halaman/edit_tunggal/".$hal->id_halaman) : base_url("admin/halaman/edit_jamak/".$hal->id_halaman)?>">Lihat Artikel</a>
                                            </td>
										</tr>
                                    <?php	$no++;}?>
                                </tbody>
                            </table>
                            <?= $page?>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>