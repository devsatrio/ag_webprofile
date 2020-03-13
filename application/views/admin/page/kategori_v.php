<script type="text/javascript">
$(document).ready(function(){
	$('form[name=tambah').submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'<?= base_url("admin/kategori/do_tambah_kategori")?>',
			data:$(this).serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				var nomor=$('tr:last').find('.nomor').html();
				nomor	=parseInt(nomor)+1;
				var row="<tr><td class='hidden id_kategori'>"+data.id+"</td><td class='nomor'>"+nomor+"</td><td class='kategori'>"+data.nama_kategori+"</td><td><button class='btn btn-warning btn-xs' onclick='edit_menu($(this))'>Edit</button> <a class='btn btn-danger btn-xs' onclick='return hapus($(this))'>Hapus</a></td></tr>";
				$('table > tbody').append(row);
				$('#edit').modal('hide');
			}
		})
	});
	
});
var row;
function hapus(x){
	var konfirm=confirm("Apakah Anda Ingin Menghapus");
	if(konfirm){
		var id=x.parent().parent().find('.id_kategori').html();
		$.ajax({
			url:'<?= base_url("admin/kategori/hapus")?>',
			dataType:'html',
			data:'id='+id,
			type:'post',
			success:function(){
				x.parent().parent().remove();
			}
		})
	}
	return false;
}
function edit_menu(x){
	row	=x.parent().parent();
	var nama_kategori	=row.find('.kategori').html();
	var id_kategori		=row.find('.id_kategori').html();
	$('form[name=edit] > .form-group > input[name=nama_kategori]').val(nama_kategori);
	$('form[name=edit] > .form-group > input[name=id_kategori').val(id_kategori);
	$('#edit').modal('show');	
}
function submit_edit(){
	$.ajax({
		url:'<?= base_url("admin/kategori/edit_kategori")?>',
		dataType:'json',
		type:'post',
		data:$('form[name=edit]').serialize(),
		success:function(data){
			row.find('.kategori').html(data.nama_kategori);
		},
		error:function(e){
			alert("Kesalahan");
		}
	});
	$('#edit').modal('hide');	
}
</script>
      <!--main content start-->
      						<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                              <h4 class="modal-title">Edit Submenu</h4>
                                          </div>
                                          <div class="modal-body">
                                          	<form role="form" name="edit" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Kategori</label>
                                                      <input type="text" class="form-control" name="nama_kategori">
                                                      <input type="hidden" name="id_kategori" />
                                                  </div>
                                                  <button type="button" class="btn btn-default" onclick="submit_edit()">Submit</button>
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
                                              <h4 class="modal-title">Tambah Kategori</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form role="form" name="tambah" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Kategori</label>
                                                      <input type="text" class="form-control" name="nama_kategori">
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
                  	Submenu
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" data-toggle="modal" href="#tambah" style="margin-bottom:20px;">Tambah Kategori</a>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=1;
                                    foreach($kategori as $kat){?>	
                                    	<tr>
                                        	<td class="hidden id_kategori"><?= $kat->id_kategori?></td>
                                        	<td class="nomor"><?= $no?></td>
                                            <td class="kategori"><?= $kat->nama_kategori?></td>
                                            <td>
                                            <button class="btn btn-warning btn-xs" onclick="edit_menu($(this))">Edit</button>
                                            <a class="btn btn-danger btn-xs" onclick="return hapus($(this))">Hapus</a>
                                            </td>
										</tr>
                                    <?php	$no++;}?>
                                </tbody>
                            </table>
                  </div>
              </section>
              <!-- page end-->
          </section>
      </section>