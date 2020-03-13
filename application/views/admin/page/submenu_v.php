<script type="text/javascript">
$(document).ready(function(){
	$('form[name=tambah').submit(function(e){
		e.preventDefault();
		$.ajax({
			url:'<?= base_url("admin/submenu/do_tambah_menu")?>',
			data:$(this).serialize(),
			type:'post',
			dataType:'json',
			success:function(data){
				var nomor=$('tr:last').find('.nomor').html();
				nomor	=parseInt(nomor)+1;
				var row="<tr><td class='hidden'><span class='id_submenu'>"+data.id+"</span><span class='hidden id_menu'>"+data.id_menu+"</span><span class='id_halaman'>"+data.id_halaman+"</span></td><td class='nomor'>"+nomor+"</td><td class='submenu'>"+data.nama_submenu+"</td><td class='menu'>"+data.menu+"</td><td class='halaman'>"+data.halaman+"</td><td><button class='btn btn-warning btn-xs' onclick='edit_menu($(this))'>Edit</button><a class='btn btn-danger btn-xs' onclick='return hapus($(this))'>Hapus</a></td></tr>";
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
		var id=x.parent().parent().find('.id_submenu').html();
		$.ajax({
			url:'<?= base_url("admin/submenu/hapus")?>',
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
	var nama_submenu=row.find('.submenu').html();
	var halaman		=row.find('.id_halaman').html();
	var id_menu		=row.find('.id_menu').html();
	var id_submenu	=row.find('.id_submenu').html();	
	$('form[name=edit] > .form-group > input[name=nama_submenu]').val(nama_submenu);
	$('form[name=edit] > .form-group > select[name=halaman]').val(halaman);
	$('form[name=edit] > .form-group > select[name=menu]').val(id_menu);
	$('form[name=edit] > .form-group > input[type=hidden]').val(id_submenu);
	$('#edit').modal('show');	
}
function submit_edit(){
	$.ajax({
		url:'<?= base_url("admin/submenu/edit_menu")?>',
		dataType:'json',
		type:'post',
		data:$('form[name=edit]').serialize(),
		success:function(data){
			row.find('.submenu').html(data.nama_submenu);
			row.find('.halaman').html(data.halaman);
			row.find('.menu').html(data.menu);
			row.find('.id_menu').html(data.id_menu);
			row.find('.id_halaman').html(data.id_halaman);
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
                                                      <label>Nama Submenu</label>
                                                      <input type="text" class="form-control" name="nama_submenu">
                                                      <input type="hidden" name="id_submenu" />
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Menu</label>
                                                      <select class="form-control" name="menu">
                                                      	<option value="0">--Pilih Menu Induk--</option>
														<?php
													  	foreach($menu as $hal){?>
															<option value="<?= $hal->id?>"><?= $hal->nama_menu?></option>                                                      	<?php }?>
                                                      </select>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Halaman</label>
                                                      <select class="form-control" name="halaman">
                                                      	<option value="0">--Pilih Halaman--</option>
														<?php
													  	foreach($halaman as $hal){?>
															<option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option>                                                      	<?php }?>
                                                      </select>
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
                                              <h4 class="modal-title">Tambah Submenu</h4>
                                          </div>
                                          <div class="modal-body">
                                              <form role="form" name="tambah" method="post">
                                                  <div class="form-group">
                                                      <label>Nama Submenu</label>
                                                      <input type="text" class="form-control" name="nama_submenu">
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Menu</label>
                                                      <select class="form-control" name="menu">
                                                      	<option value="0">--Pilih Menu Induk--</option>
														<?php
													  	foreach($menu as $hal){?>
															<option value="<?= $hal->id?>"><?= $hal->nama_menu?></option>                                                      	<?php }?>
                                                      </select>
                                                  </div>
                                                  <div class="form-group">
                                                      <label>Halaman</label>
                                                      <select class="form-control" name="halaman">
                                                      	<option value="0">--Pilih Halaman--</option>
														<?php
													  	foreach($halaman as $hal){?>
															<option value="<?= $hal->id_halaman?>"><?= $hal->nama_halaman?></option>                                                      	<?php }?>
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
                  	Submenu
                  </header>
                  <div class="panel-body" style="min-height:500px;">
                  <a class="btn btn-success" data-toggle="modal" href="#tambah" style="margin-bottom:20px;">Tambah Submenu</a>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Submenu</th>
                                    <th>Menu</th>
                                    <th>Halaman</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
									<?php
									$no=$this->uri->segment(4)+1;
                                    foreach($submenu as $menu){?>	
                                    	<tr>
                                        	<td class="hidden"><span class="id_submenu"><?= $menu->id_submenu?></span><span class="hidden id_menu"><?= $menu->id_menu?></span><span class="id_halaman"><?= $menu->id_halaman?></span></td>
                                        	<td class="nomor"><?= $no?></td>
                                            <td class="submenu"><?= $menu->nama_submenu?></td>
                                            <td class="menu"><?= $menu->nama_menu?></td>
                                            <td class="halaman"><?= $menu->nama_halaman?></td>
                                            <td>
                                            <button class="btn btn-warning btn-xs" onclick="edit_menu($(this))">Edit</button>
                                            <a class="btn btn-danger btn-xs" onclick="return hapus($(this))">Hapus</a>
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