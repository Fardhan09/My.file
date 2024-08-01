<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="box box-widget" style="margin-top: 50px;">
     <div class="box-header with-border">
          <h2 class="text-center" style="padding-bottom: 10px;">WELCOME TO SISTEM REKOMENDASI</h2>
     </div>
</div>

<?php if (empty($data)) : ?>
     <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4 style="margin-top: 8px;"><i class="icon fa fa-close"></i> Hasil Rekomendasi Tidak Ditemukan</h4>
     </div>
<?php endif ?>

<div class="row">
     <div class="col-sm-12" style="margin-top: 30px; margin-bottom: -40px;">
          <div class="alert alert-success alert-dismissible">
               <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <h4 style="margin-top: 8px;"><i class="icon fa fa-checked"></i> Hasil Rekomendasi</h4>
          </div>
     </div>
     <?php foreach ($data as $v) : ?>
          <div class="col-md-4" style="margin-top: 50px;">
               <!-- Widget: user widget style 1 -->
               <div class="box box-widget widget-user-2">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-primary">
                         <div class="widget-user-image">
                              <img class="img-circle" src="/gmb/paket/ <?= $v['gambar']; ?>" alt="User Avatar">
                         </div>
                         <!-- /.widget-user-image -->
                         <h3 class="widget-user-username"><?= strtoupper($v['nama_paket']); ?></h3>
                         <h5 class="widget-user-desc"><?= $v['kategori']; ?> Wedding</h5>
                    </div>
                    <div class="box-footer no-padding">
                         <ul class="nav nav-stacked">
                              <li><a href="#">Alamat <span class="pull-right"><?= ucwords($v['alamat']); ?></span></a></li>
                              <li><a href="#">Tempat <span class="pull-right"><?= ucwords($v['lokasi']); ?></span></a></li>
                              <li><a href="#">Tata rias & Busana <span class="pull-right"><i style="color: <?= $v['rias_busana'] == 1 ? 'blue' : 'red'; ?>;" class="<?= $v['rias_busana'] == 1 ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></i></span></a></li>
                              <li><a href="#">Dekorasi<span class="pull-right"><i style="color: <?= $v['dekorasi'] == 1 ? 'blue' : 'red'; ?>;" class="<?= $v['dekorasi'] == 1 ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></i></span></a></li>
                              <li><a href="#">Catering<span class="pull-right"><i style="color: <?= $v['catering'] == 1 ? 'blue' : 'red'; ?>;" class="<?= $v['catering'] == 1 ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></i></span></a></li>
                              <li><a href="#">Dokumentasi<span class="pull-right"><i style="color: <?= $v['dokumentasi'] == 1 ? 'blue' : 'red'; ?>;" class="<?= $v['dokumentasi'] == 1 ? 'glyphicon glyphicon-ok' : 'glyphicon glyphicon-remove'; ?>"></i></span></a></li>
                         </ul><br>
                         <a href="/user/detail_paket/<?= $v['id_paket']; ?>" class="btn btn-block btn-md btn-primary">Baca selengkapnya</a>
                    </div>
               </div>
               <!-- /.widget-user -->
          </div>
     <?php endforeach ?>
</div>
<div class="row">
     <div class="col-sm-5">
     </div>
     <div class="col-sm-7 text-right" style="padding-right: 30px;">
          <?= $pager->links('atribut_dasar', 'all_pager'); ?>
     </div>
</div>

<?= $this->endSection(); ?>