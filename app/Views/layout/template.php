<!DOCTYPE html>
<html>

<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title><?= $title; ?></title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <link rel="stylesheet" href="/lib/adminlte2/bower_components/bootstrap/dist/css/bootstrap.min.css">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="/lib/adminlte2/bower_components/font-awesome/css/font-awesome.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="/lib/adminlte2/bower_components/Ionicons/css/ionicons.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="/lib/adminlte2/dist/css/AdminLTE.min.css">
     <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
     <link rel="stylesheet" href="/lib/adminlte2/dist/css/skins/skin-blue.min.css">

     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

     <!-- Google Font -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->

<body class="hold-transition skin-blue layout-top-nav">

     <div class="modal fade bs-profile-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
          <div class="modal-dialog modal-lg">
               <div class="modal-content">

                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                         </button>
                         <h4 class="modal-title" id="myModalLabel2">Edit Profil</h4>
                    </div>
                    <div class="modal-body">
                         <div class="x_panel">
                              <div class="x_content">
                                   <form method="POST" action="/admin/save_user/<?= session()->get('email'); ?>" class="form-horizontal form-label-left" novalidate="">
                                        <input type="hidden" name="url_before_this" value="<?= \Config\Services::uri()->getPath(); ?>">
                                        <div class="item form-group <?= $validation->hasError('nama') ? 'has-error' : ''; ?>">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama <span class="required">*</span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" data-validate-words="2" name="nama" placeholder="" value="<?= session()->get('username'); ?>" required="required" type="text">
                                                  <span class="help-block" style="display: inline-block; margin-top: 10px !important;"><?= $validation->getError('nama'); ?></span>
                                             </div>
                                        </div>
                                        <div class="item form-group <?= $validation->hasError('email') ? 'has-error' : ''; ?>">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="email" id="email" name="email" required="required" value="<?= session()->get('email'); ?>" class="form-control col-md-7 col-xs-12">
                                                  <span class="help-block" style="display: inline-block; margin-top: 10px !important;"><?= $validation->getError('email'); ?></span>
                                             </div>
                                        </div>
                                        <div class="item form-group <?= $validation->hasError('password') ? 'has-error' : ''; ?>">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="password">Password <span class="required">*</span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="password" id="password" name="password" data-validate-linked="email" placeholder="Abaikan jika password tidak dirubah" required="required" class="form-control col-md-7 col-xs-12">
                                                  <span class="help-block" style="display: inline-block; margin-top: 10px !important;"><?= $validation->getError('password'); ?></span>
                                             </div>
                                        </div>
                                        <div class="item form-group <?= $validation->hasError('repassword') ? 'has-error' : ''; ?>">
                                             <label class="control-label col-md-3 col-sm-3 col-xs-12" for="repassword">Konfirmasi Password <span class="required">*</span>
                                             </label>
                                             <div class="col-md-6 col-sm-6 col-xs-12">
                                                  <input type="password" id="repassword" name="repassword" data-validate-linked="email" placeholder="Abaikan jika password tidak dirubah" required="required" class="form-control col-md-7 col-xs-12">
                                                  <span class="help-block" style="display: inline-block; margin-top: 10px !important;"><?= $validation->getError('repassword'); ?></span>
                                             </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                             <div class="col-md-6 col-md-offset-3">
                                                  <button type="button" data-dismiss="modal" class="btn btn-default">Batal</button>
                                                  <button style="margin-left: 20px;" id="send" type="submit" class="btn btn-primary">Simpan</button>
                                             </div>
                                        </div>
                                   </form>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </div>

     <div class="modal fade" id="modal-default" style="display: none;">
          <div class="modal-dialog">
               <div class="modal-content">
                    <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                         <h4 class="modal-title">Sistem Rekomendasi Pernikahan</h4>
                    </div>
                    <div class="modal-body">
                         <p>Keluar Sekarang</p>
                    </div>
                    <div class="modal-footer">
                         <button type="button" class="btn btn-sm btn-default pull-left" data-dismiss="modal">Batal</button>
                         <a href="/auth/logout"> <button type="button" class="btn btn-sm btn-primary">Keluar</button> </a>
                    </div>
               </div>
               <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
     </div>

     <div class="wrapper">

          <header class="main-header">
               <nav class="navbar navbar-static-top">
                    <div class="container">
                         <div class="navbar-header">
                              <a href="../../index2.html" class="navbar-brand"><b>SRDW</b></a>
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                   <i class="fa fa-bars"></i>
                              </button>
                         </div>

                         <?php $segment = \Config\Services::uri()->getSegment(2) ?>

                         <!-- Collect the nav links, forms, and other content for toggling -->
                         <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                              <ul class="nav navbar-nav">
                                   <!-- User -->
                                   <?php if (session()->get('user_role') != 1) : ?>
                                        <li class="<?= $segment == 'home' ? 'active' : ''; ?>"><a href="/user/home">Home</a></li>
                                        <li class="<?= $segment == 'rekomendasi' ? 'active' : ''; ?>"><a href="/user/rekomendasi">Rekomendasi</a></li>
                                        <!-- Admin -->
                                   <?php endif ?>
                                   <?php if (session()->get('user_role') == 1) : ?>
                                        <li class="<?= $segment == 'home' ? 'active' : ''; ?>"><a href="/admin/home">Paket Tema Wedding</a></li>
                                        <li class="<?= $segment == 'attribut_dasar' ? 'active' : ''; ?>"><a href="/admin/attribut_dasar">Attribut</a></li>
                                        <li class="<?= $segment == 'akun' ? 'active' : ''; ?>"><a href="/admin/akun">Akun</a></li>
                                   <?php endif ?>
                              </ul>
                         </div>
                         <!-- /.navbar-collapse -->
                         <!-- Navbar Right Menu -->
                         <div class="navbar-custom-menu">
                              <ul class="nav navbar-nav">
                                   <!-- User Account Menu -->
                                   <li class="dropdown user user-menu">
                                        <!-- Menu Toggle Button -->
                                        <a role="button" data-toggle="modal" data-target=".bs-profile-modal-lg">
                                             <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                             <span><?= ucwords(session()->get('username')); ?></span>
                                        </a>
                                   </li>
                                   <li style="display: <?= !session()->get('username') ? 'none' : ''; ?>;">
                                        <a href="" data-toggle="modal" data-target="#modal-default"><i class="fa fa-power-off"></i></a>
                                   </li>
                                   <li style="display: <?= !session()->get('username') ? '' : 'none'; ?>;">
                                        <a href="/auth/login"><i class="fa fa-sign-in"></i></a>
                                   </li>
                              </ul>
                         </div>
                         <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
               </nav>
          </header>
          <!-- Full Width Column -->
          <div class="content-wrapper">
               <div class="container">
                    <!-- Main content -->
                    <section class="content">
                         <?= $this->renderSection('content'); ?>
                    </section>
                    <!-- /.content -->
               </div>
               <!-- /.container -->
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
               <div class="container">
                    <strong>Copyright &copy; <?= date('Y', time()); ?>. </strong> Sistem Rekomendasi.Fardan Hidayat_170103066
               </div>
               <!-- /.container -->
          </footer>
     </div>
     <!-- ./wrapper -->

     <!-- jQuery 3 -->
     <script src="/lib/adminlte2/bower_components/jquery/dist/jquery.min.js"></script>
     <!-- Bootstrap 3.3.7 -->
     <script src="/lib/adminlte2/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- AdminLTE App -->
     <script src="/lib/adminlte2/dist/js/adminlte.min.js"></script>

     <!-- MY JS -->
     <script src="/js/main.js"></script>
</body>

</html>