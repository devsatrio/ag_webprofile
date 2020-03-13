<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Tambah User
            </header>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url('admin/user/do_tambah')?>" onsubmit="return validasi()">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input class="form-control" type="text" name="telp" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="Admin">Admin</option>
                            <option value="Super Admin">Super Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="password" required>
                    </div>

                    <div class="form-group">
                        <label>Konfirmasi Password</label>
                        <input class="form-control" type="password" name="kpasword" id="kpassword" required>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success"> Tambah</button>
                            <button type="reset" onclick="history.go(-1)" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>
<script src="<?php echo base_url('tpl_admin/customjs/validasiuser.js');?>"></script>