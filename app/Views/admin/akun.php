<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

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
                              <h3 class="box-title">Akun Terdaftar</h3>
                              <div class="row">
                                   <div class="col-sm-6">
                                        <div class="input-group" style="margin-top: 15px;">
                                             <input type="text" placeholder="Cari Nama User" id="a-key" class="form-control input-sm">
                                             <span class="input-group-btn">
                                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Cari</button>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
                    <div class="row">
                         <div class="col-sm-12">
                              <div id="containerAkun"></div>
                              <table class="table table-bordered">
                                   <tbody>
                                        <tr>
                                             <th style="width: 10px">No</th>
                                             <th>Nama</th>
                                             <th>Email</th>
                                             <th>No Telepon</th>
                                             <th>Alamat</th>
                                             <th style="width: 25%"></th>
                                        </tr>
                                        <?php $no = 1 + ($per_halaman * ($page_looping - 1));
                                        foreach ($data as $v) : ?>
                                             <tr>
                                                  <td><?= $no++; ?></td>
                                                  <td><?= ucwords($v['username']); ?></td>
                                                  <td><?= $v['email']; ?></td>
                                                  <td><?= $v['phone']; ?></td>
                                                  <td><?= $v['alamat']; ?></td>
                                                  <td style="text-align: right;">
                                                       <button class="btn btn-danger btn-sm">Hapus</button>
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
                              <?= $pager->links('users', 'all_pager'); ?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<script type="text/javascript">
     var aKey = document.getElementById("a-key");
     var containerAkun = document.getElementById("containerAkun");
     aKey.addEventListener("click", function() {
          aKey.addEventListener("keyup", function() {
               //objek AJAX;
               var xhr = new XMLHttpRequest();
               //cek kesiapan AJAX;
               xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                         containerAkun.innerHTML = xhr.responseText;
                    }
               }
               //exsekusi AJAX;
               xhr.open("GET", "/admin/akun_search_with_ajax/" + aKey.value, true);
               xhr.send();
          });
     });
</script>

<?= $this->endSection(''); ?>