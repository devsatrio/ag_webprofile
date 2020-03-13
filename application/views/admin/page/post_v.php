<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Data Post
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
                <a class="btn btn-success" href="<?= base_url("admin/post/tambah")?>">Tambah
                    Data</a>
                <div class="adv-table">
                    <table class="table table-striped" id="example">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Tanggal</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
          					$no=1;
          					foreach($data as $data){ ?>
                            <tr>
                                <td><?= $no++;?></td>
                                <td><?= $data->judul?></td>
                                <td><?= $data->nama_kategori?></td>
                                <td><?= $data->tanggal?></td>
                                <td class="text-center">
                                    <?php if ($data->tampil == '1') { ?>
                                    <span class="badge badge-primary">Tampil di Beranda</span>
                                    <?php } else { echo ""; } ?>
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url("admin/post/edit")."/".$data->id_post?>"
                                        class="btn btn-warning">Edit</a>
                                    <a href="<?php echo base_url('admin/post/hapus/'.$data->id_post)?>"
                                        onclick="return confirm('Hapus data ?');"
                                        class="btn btn-danger">hapus</a>
                                </td>
                            </tr>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </section>
</section>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
    $('#example').dataTable();
});
</script>