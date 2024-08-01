<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="modal fade" id="modal-tambah-paket" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Tambah Daftar Paket Tema Wedding</h4>
               </div>
               <div class="modal-body">
                    <div class="box box-widget">
                         <!-- form start -->
                         <form class="form-horizontal" action="/admin/save_paket/tambah" method="post">
                              <div class="box-body">
                                   <div class="form-group <?= $validation->hasError('nama_paket') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Paket (Tema)</label>

                                        <div class="col-sm-9">
                                             <input value="<?= set_value('nama_paket'); ?>" type="text" name="nama_paket" class="form-control">
                                             <span class="help-block"><?= $validation->getError('nama_paket'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('alamat') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>

                                        <div class="col-sm-9">
                                             <input value="<?= set_value('alamat'); ?>" type="text" name="alamat" class="form-control">
                                             <span class="help-block"><?= $validation->getError('alamat'); ?></span>
                                        </div>
                                   </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                                   <button type="submit" class="btn btn-primary pull-right" style="margin-left: 20px;">Simpan</button>
                                   <button data-dismiss="modal" class="btn btn-default pull-right">Batal</button>
                              </div>
                              <!-- /.box-footer -->
                         </form>
                    </div>
               </div>
          </div>
          <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-edit-paket" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Paket</h4>
               </div>
               <div class="modal-body">
                    <div class="box box-widget">
                         <!-- form start -->
                         <form class="form-horizontal" action="/admin/save_paket/edit" method="post">
                              <input type="hidden" name="id_paket" id="edit-id-paket">
                              <div class="box-body">
                                   <div class="form-group <?= $validation->hasError('edit_nama_paket') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Nama Paket</label>

                                        <div class="col-sm-9">
                                             <input id="edit-nama-paket" value="<?= set_value('edit_nama_paket'); ?>" type="text" name="edit_nama_paket" class="form-control">
                                             <span class="help-block"><?= $validation->getError('edit_nama_paket'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('edit_alamat') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Alamat</label>

                                        <div class="col-sm-9">
                                             <input id="edit-alamat" value="<?= set_value('edit_alamat'); ?>" type="text" name="edit_alamat" class="form-control">
                                             <span class="help-block"><?= $validation->getError('edit_alamat'); ?></span>
                                        </div>
                                   </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                                   <button type="submit" class="btn btn-primary pull-right" style="margin-left: 20px;">Simpan</button>
                                   <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Batal</button>
                              </div>
                              <!-- /.box-footer -->
                         </form>
                    </div>
               </div>
          </div>
          <!-- /.modal-content -->
     </div>
     <!-- /.modal-dialog -->
</div>

<div class="modal fade" id="modal-delete-paket" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Delete Paket</h4>
               </div>
               <div class="modal-body">
                    <div class="box box-widget">
                         <!-- form start -->
                         <form class="form-horizontal" action="/admin/delete_paket" method="post">
                              <?= csrf_field(); ?>
                              <input type="hidden" name="_method" value="DELETE">
                              <input type="hidden" name="id_paket" id="delete-id-paket">
                              <!-- /.box-body -->
                              <div class="box-footer">
                                   <button type="submit" class="btn btn-danger pull-right" style="margin-left: 20px;">Hapus</button>
                                   <button type="button" data-dismiss="modal" class="btn btn-default pull-right">Batal</button>
                              </div>
                              <!-- /.box-footer -->
                         </form>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="box box-widget widget-user" style="margin-top: 50px;">
     <!-- Add the bg color to the header using any of the bg-* classes -->
     <div class="widget-user-header bg-primary">
          <h3 style="padding-top: 15px;" class="widget-user-username">Sistem Rekomendasi Pemilihan Desain Wedding</h3>
          <h5 class="widget-user-desc">Admin</h5>
     </div>
     <div class="box-footer">
          <div class="row">
               <div class="col-sm-12">
                    <div class="box box-widget">
                         <div class="box-header with-border">
                              <h3 class="box-title">Paket Terdaftar</h3>
                              <div class="row">
                                   <div class="col-sm-6">
                                        <div class="input-group" style="margin-top: 15px;">
                                             <input type="text" placeholder="Cari Nama Paket (Tema)" id="p-key" class="form-control input-sm">
                                             <span class="input-group-btn">
                                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Cari</button>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                              <br><br>
                              <?php if (session()->getFlashdata('pesan')) {
                                   echo "<h6 class='pesan-singkat alert alert-success' style='margin-top: 20px;'>";
                                   echo session()->getFlashdata('pesan');
                                   echo "</h6>";
                              } else if (session()->getFlashdata('gagal')) {
                                   echo "<h6 class='pesan-singkat alert alert-danger' style='margin-top: 20px;'>";
                                   echo session()->getFlashdata('gagal');
                                   echo "</h6>";
                              } ?>
                              <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-paket">Tambah Paket (Tema)</button>
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                              <div id="containerPaket"></div>
                              <table class="table table-bordered">
                                   <tbody>
                                        <tr>
                                             <th style="width: 10px">No</th>
                                             <th>Nama Paket (Tema)</th>
                                             <th>Alamat</th>
                                             <th style="width: 25%"></th>
                                        </tr>
                                        <?php $no = 1 + ($per_halaman * ($page_looping - 1));
                                        foreach ($data as $v) : ?>
                                             <tr>
                                                  <td><?= $no++; ?></td>
                                                  <td><?= $v['nama_paket']; ?></td>
                                                  <td><?= $v['alamat']; ?></td>
                                                  <td style="text-align: right;">
                                                       <a class="btn btn-info btn-sm" href="/admin/detail_paket/<?= $v['id_paket']; ?>">Detail</a>
                                                       <!-- ######################################### -->
                                                       <button id="to-edit" data-id="<?= $v['id_paket']; ?>" data-nama="<?= $v['nama_paket']; ?>" data-alamat="<?= $v['alamat']; ?>" data-toggle="modal" data-target="#modal-edit-paket" class="btn btn-warning btn-sm">Edit</button>
                                                       <!-- ######################################### -->
                                                       <button id="to-delete" data-id="<?= $v['id_paket']; ?>" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modal-delete-paket">Hapus</button>
                                                  </td>
                                             </tr>
                                        <?php endforeach ?>
                                   </tbody>
                              </table>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-5">
                              <div style="padding-left: 10px;" class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Menampilkan 1 sampai <?= $row_count < 10 ? $row_count : 10; ?> dari <?= $row_count; ?> data</div>
                         </div>
                         <div class="col-sm-7 text-right" style="padding-right: 30px;">
                              <?= $pager->links('paket', 'all_pager'); ?>
                         </div>
                    </div>
               </div>
               <!-- /.col -->
          </div>
          <!-- /.row -->
     </div>
</div>

<script type="text/javascript">
     var pKey = document.getElementById("p-key");
     var containerPaket = document.getElementById("containerPaket");
     pKey.addEventListener("click", function() {
          pKey.addEventListener("keyup", function() {
               //objek AJAX;
               var xhr = new XMLHttpRequest();
               //cek kesiapan AJAX;
               xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                         containerPaket.innerHTML = xhr.responseText;
                    }
               }
               //exsekusi AJAX;
               xhr.open("GET", "/admin/paket_search_with_ajax/" + pKey.value, true);
               xhr.send();
          });
     });
</script>

<?= $this->endSection(''); ?>