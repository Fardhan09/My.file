<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="register-box" style="margin-top: 0; margin-bottom: 0;">
     <div class="register-logo">
          <a><b>Register</b></a>
     </div>

     <div class="register-box-body">
          <p class="login-box-msg">Membuat Akun</p>
          <?php
          if (session()->getFlashdata('pesan')) {
               echo "<div class='alert alert-success pesan-singkat alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-check'></i>Berhasil Disimpan</h4>
                    <a href='/auth/login' style='text-decoration: none;'>Login Sekarang</a>
               </div>";
          }
          if (session()->getFlashdata('gagal')) {
               echo "<div class='alert alert-danger pesan-singkat alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i>Gagal Disimpan</h4>
                    Silahkan Periksa kembali
               </div>";
          }
          ?>

          <form action="/auth/save_akun" method="post">
               <div class="form-group has-feedback <?= $validation->hasError('username') ? 'has-error' : ''; ?>">
                    <input name="username" value="<?= set_value('username'); ?>" type="text" class="form-control" placeholder="Nama Lengkap">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('username'); ?></span>
               </div>
               <div class="form-group has-feedback <?= $validation->hasError('email') ? 'has-error' : ''; ?>">
                    <input name="email" value="<?= set_value('email'); ?>" type="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('email'); ?></span>
               </div>
               <div class="form-group has-feedback <?= $validation->hasError('phone') ? 'has-error' : ''; ?>">
                    <input name="phone" value="<?= set_value('phone'); ?>" type="number" class="form-control" placeholder="No telepon">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('phone'); ?></span>
               </div>
               <div class="form-group has-feedback <?= $validation->hasError('password') ? 'has-error' : ''; ?>">
                    <input name="password" type="password" class="form-control" placeholder="Kata Sandi">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('password'); ?></span>
               </div>
               <div class="form-group has-feedback <?= $validation->hasError('repassword') ? 'has-error' : ''; ?>">
                    <input name="repassword" type="password" class="form-control" placeholder="Ulangi Kata Sandi">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('repassword'); ?></span>
               </div>
               <div class="row">
                    <!-- /.col -->
                    <div class="col-sm-12">
                         <button type="submit" class="btn btn-primary btn-block btn-flat">Simpan</button>
                    </div>
                    <!-- /.col -->
               </div>
          </form><br><br>

          <a href="/auth/login" class="text-center">Masuk Sekarang</a>
     </div>
     <!-- /.form-box -->
</div>

<?= $this->endSection(); ?>