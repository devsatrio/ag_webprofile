<script type="text/javascript">
$(document).ready(function(){
	$('form[name=tambah').submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'<?= base_url("admin/menu/do_tambah_menu")?>',
			data:$(this).serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				var no=$('tr:last').find('.nomor').html();
				no    =parseInt(no)+1;
				var row="<tr><td class='hidden'><span class='hidden id_halaman'>"+data.id_halaman+"</span><span class='hidden id_menu'>"+data.id+"</span></td><td class='nomor'>"+no+"</td><td class='nama'>"+data.nama_menu+"</td><td>"+data.halaman+"</td><td><button class='btn btn-warning btn-xs' onclick='edit_menu($(this))'> Edit </button> <a class='btn btn-danger btn-xs' onclick='return hapus($(this))'> Hapus </a></td></tr>";
				$('table > tbody').append(row);
				$('#tambah').modal('hide');
			}
		})
	});
	
});
var row;
function hapus(x){
	var konfirm=confirm("Apakah Anda Ingin Menghapus");
	if(konfirm){
		var id=x.parent().parent().find('.id_menu').html();
		$.ajax({
			url:'<?= base_url("admin/menu/hapus")?>',
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
	var nama_menu	=row.find('.nama').html();
	var halaman		=row.find('.id_halaman').html();
	var id_menu		=row.find('.id_menu').html();
	$('form[name=edit] > .form-group > input[name=nama_menu]').val(nama_menu);
	$('form[name=edit] > .form-group > select').val(halaman);
	$('form[name=edit] > .form-group > input[type=hidden]').val(id_menu);
	$('#edit').modal('show');	
}
function submit_edit(){
	$.ajax({
		url:'<?= base_url("admin/menu/edit_menu")?>',
		dataType:'json',
		type:'post',
		data:$('form[name=edit]').serialize(),
		success:function(data){
			row.find('.nama').html(data.nama_menu);
			row.find('.halaman').html(data.halaman);
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
                                              <h4 class="modal-title">Edit Menu</h4>
                                          </div>
                                          <div class="modal-body">
                                          	<form role="form" name="edit" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Menu</label>
                                                      <input type="text" class="form-control" name="nama_menu">
                                                      <input type="hidden" name="id_menu" />
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Halaman</label>
                                                      <select class="form-control" name="halaman">
                                                      	<option value="0">--Pilih Halaman Yang Dimasukkan--</option>
														<?php
													  	foreach($halaman as $hal){?>
															<option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option>                                                      	<?php }?>
                                                      </select>
                                                      * Boleh Tidak Diisi
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
                                              <h4 class="modal-title">Tambah Menu</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form role="form" name="tambah" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Menu</label>
                                                      <input type="text" class="form-control" name="nama_menu">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Halaman</label>
                                                      <select class="form-control" name="halaman">
                                                      	<option value="0">--Pilih Halaman Yang Dimasukkan--</option>
														<?php
													  	foreach($halaman as $hal){?>
															<option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option>                                                      	<?php }?>
                                                      </select>
                                                      * Boleh Tidak Diisi
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
                  	Menu
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" data-toggle="modal" href="#tambah" style="margin-bottom:20px;">Tambah Menu</a>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Menu</th>
                                    <th>Halaman</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=1;
                                    foreach($menu as $menu){?>	
                                    	<tr>
                                        	<td class="hidden"><span class="id_menu"><?= $menu->id?></span><span class="hidden id_halaman"><?= $menu->id_halaman?></span></td>
                                        	<td class="nomor"><?= $no?></td>
                                            <td class="nama"><?= $menu->nama_menu?></td>
                                            <td class="halaman"><?= $this->master->get_halaman($menu->id_halaman);?></td>
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