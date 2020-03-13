<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                User Management
            </header>
            <div class="panel-body">
                <?php
                if ($this->session->flashdata('msg')=='h'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Dihapus.
                </div>
                <?php }else if($this->session->flashdata('msg')=='i'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Disimpan.
                </div>
                <?php }else if($this->session->flashdata('msg')=='e'){ ?>
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    Data Berhasil Diperbarui.
                </div>
                <?php } ?>
                <a class="btn btn-success" href="<?= base_url("admin/user/tambah")?>">Tambah
                    User</a>

                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No. Telp</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
            					$no=1;
            					foreach($data as $data){?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?php echo $data->nama;?></td>
                                <td><?= $data->user?></td>
                                <td><?php echo $data->notelp;?></td>
                                <td class="text-center"><span
                                        class="badge badge-success"><?php echo $data->level;?></span>
                                </td>
                                <td class="text-center">
                                    <a href="<?php echo base_url('admin/user/edit/'.$data->id)?>"
                                        class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('admin/user/hapus/'.$data->id)?>" onclick="return confirm('Hapus data ?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>
</div>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#example').dataTable();
});
</script>