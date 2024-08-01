<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="login-box">
     <div class="login-logo">
          <a href="../../index2.html"><b>Selamat Datang</b></a>
     </div>
     <!-- /.login-logo -->
     <div class="login-box-body">
          <p class="login-box-msg">Sistem Rekomendasi Pemilihan Desain Wedding</p>
          <?php
          if (session()->getFlashdata('pesan')) {
               echo "<div class='alert alert-success pesan-singkat alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-check'></i>Berhasil Keluar</h4>
                    <a href='/auth/login' style='text-decoration: none;'>Login Sekarang</a>
               </div>";
          }
          if (session()->getFlashdata('gagal')) {
               echo "<div class='alert alert-danger pesan-singkat alert-dismissible'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
                    <h4><i class='icon fa fa-ban'></i>Gagal login</h4>
                    Silahkan Periksa kembali
               </div>";
          }
          ?>

          <form action="/auth/cek_login" method="post">
               <div class="form-group has-feedback <?= $validation->getError('email') ? 'has-error' : ''; ?>">
                    <input name="email" type="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('email'); ?></span>
               </div>
               <div class="form-group has-feedback <?= $validation->getError('password') ? 'has-error' : ''; ?>">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    <span class="help-block" style="color: #f22;"><?= $validation->getError('password'); ?></span>
               </div>
               <button type="submit" class="btn btn-primary btn-block btn-flat">Masuk</button>
          </form><br><br>
          <!-- /.social-auth-links -->
          <a href="/auth/register" class="text-center">Register</a>
     </div>
     <!-- /.login-box-body -->
</div>

<?= $this->endSection(); ?>