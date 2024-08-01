<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="box box-widget" style="margin-top: 50px;">
     <div class="box-header with-border">
          <h2 class="text-center" style="padding-bottom: 10px;">WELCOME TO SISTEM REKOMENDASI</h2>
     </div>
</div>

<div class="row">
     <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="box box-widget">
               <div class="box box-widget">
                    <div class="box-body">
                         <img class="img-responsive pad" width="100%" src="/gmb/welcome.jpg" alt="Photo">
                    </div>
               </div>
          </div>
     </div>
     <div class="col-lg-6 col-md-6 col-xs-12">
          <div class="box box-widget">
               <div class="box-header with-border">
                    <h3 class="box-title">Cari Rekomendasi</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="/user/hitung" method="POST">
                    <div class="box-body">
                         <div class="form-group">
                              <label for="exampleInputEmail1">Alamat</label>
                              <input name="alamat" type="text" class="form-control" id="exampleInputEmail1" placeholder="Masukan Alamat">
                         </div>
                         <div class="form-group">
                              <label>Kategori</label>
                              <select name="kategori" class="form-control">
                                   <option>Indoor</option>
                                   <option>Outdoor</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">Jumlah Undangan</label>
                              <input name="undangan" type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukan Jumlah Undangan">
                         </div>
                         <div class="form-group">
                              <label>MC Resepsi / Pembawa Acara</label>
                              <select name="mc" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label>Paket Tata Rias & Busana</label>
                              <select name="rias_busana" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label>Paket Catering</label>
                              <select name="catering" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label>Paket Dekorasi</label>
                              <select name="dekorasi" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label>Paket Dokumentasi</label>
                              <select name="dokumentasi" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label>Paket Hiburan ( Orgen Tunggal )</label>
                              <select name="orgen" class="form-control">
                                   <option>Ya</option>
                                   <option>Tidak</option>
                              </select>
                         </div>
                         <div class="form-group">
                              <label for="exampleInputPassword1">Harga</label>
                              <input name="harga" type="number" class="form-control" id="exampleInputPassword1" placeholder="Masukan Harga">
                         </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                         <button type="submit" class="btn btn-primary">Cari</button>
                    </div>
               </form>
          </div>
     </div>
</div>

<?= $this->endSection(); ?>