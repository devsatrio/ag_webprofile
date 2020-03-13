<section id="main-content">
    <section class="wrapper">
        <section class="panel">
            <header class="panel-heading">
                Edit User
            </header>
            <div class="panel-body">
                <form method="post" action="<?php echo base_url('admin/user/do_edit')?>" onsubmit="return validasi()">
                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" value="<?php echo $user->user;?>" autofocus required>
                    </div>

                    <div class="form-group">
                        <label>Nama</label>
                        <input class="form-control" type="text" name="nama" value="<?php echo $user->nama;?>" required>
                        <input type="hidden" name="kode" value="<?php echo $user->id;?>">
                    </div>
                    <div class="form-group">
                        <label>No. Telp</label>
                        <input class="form-control" type="text" name="telp" value="<?php echo $user->notelp;?>" required>
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option value="Admin" <?php if($user->level=='Admin'){ echo "selected"; }?>>Admin</option>
                            <option value="Super Admin" <?php if($user->level=='Super Admin'){ echo "selected"; }?>>Super Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Password Baru*</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    
                    <div class="form-group">
                        <label>Konfirmasi Password Baru*</label>
                        <input class="form-control" type="password" name="kpasword" id="kpassword">
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <button type="submit" class="btn btn-success"> Update</button>
                            <button type="reset" onclick="history.go(-1)" class="btn btn-warning">Batal</button>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </section>
</section>
<script src="<?php echo base_url('tpl_admin/customjs/validasiuser.js');?>"></script>