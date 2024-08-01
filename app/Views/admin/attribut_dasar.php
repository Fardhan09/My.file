<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>

<div class="modal fade" id="modal-edit-atribut" style="display: none;">
     <div class="modal-dialog">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Edit Atribut &nbsp; <span class="badge badge-lg bg-light-blue" style="margin-top: -4px;" id='nama-paket'></span></h4>
               </div>
               <div class="modal-body">
                    <div class="box box-widget">
                         <!-- form start -->
                         <form class="form-horizontal" action="/admin/save_atribut" method="post" enctype="multipart/form-data">
                              <input type="hidden" name="id_atribut" id="id-atribut">
                              <input type="hidden" name="id_atribut_harga" id="id-atribut-harga">
                              <input type="hidden" name="id_paket" id="id-paket">
                              <input type="hidden" name="foto_lama" id="foto-lama">
                              <div class="box-body">
                                   <div class="form-group <?= $validation->hasError('kategori') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Kategori</label>

                                        <div class="col-sm-9">
                                             <select name="kategori" id="kategori" class="form-control">
                                                  <option>Indoor</option>
                                                  <option>Outdoor</option>
                                             </select>
                                             <span class="help-block"><?= $validation->getError('kategori'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('deskripsi') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Deskripsi</label>

                                        <div class="col-sm-9">
                                             <textarea name="deskripsi" id="deskripsi" class="form-control" rows="3"></textarea>
                                             <span class="help-block"><?= $validation->getError('deskripsi'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('undangan') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Undangan</label>

                                        <div class="col-sm-9">
                                             <input id="undangan" type="number" name="undangan" class="form-control">
                                             <span class="help-block"><?= $validation->getError('undangan'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('lokasi') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">lokasi</label>

                                        <div class="col-sm-9">
                                             <input id="lokasi" type="text" name="lokasi" class="form-control">
                                             <span class="help-block"><?= $validation->getError('lokasi'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('mc_resepsi') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Mc Resepsi</label>

                                        <div class="col-sm-9">
                                             <select name="mc_resepsi" id="mc-resepsi" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <span class="help-block"><?= $validation->getError('mc_resepsi'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('rias_busana') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Rias dan Busana</label>

                                        <div class="col-sm-9">
                                             <select onchange="paketRiasBusana()" name="rias_busana" id="rias-busana" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <textarea style="margin-top:20px; display: none;" name="paket_rias_busana" id="paket-rias-busana" placeholder="<?= "Contoh : \n 1. Tata rias & busana pengantin\n 2. Tata rias & busana 2 orang tua\n 3. Tata rias & busana penerima tamu 4 orang\n 4. dan ain-lain..."; ?>" class="form-control" rows="5"></textarea>
                                             <span class="help-block"><?= $validation->getError('rias_busana'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('catering') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Catering</label>

                                        <div class="col-sm-9">
                                             <select onchange="paketCatering()" name="catering" id="catering" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <textarea style="margin-top:20px; display: none;" name="paket_catering" id="paket-catering" placeholder="<?= "Contoh : \n 1. Aneka Pudding\n 2. Aneka Snack\n 3. Aneka softdrink\n 4. dan ain-lain..."; ?>" class="form-control" rows="5"></textarea>
                                             <span class="help-block"><?= $validation->getError('catering'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('dekorasi') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Dekorasi</label>

                                        <div class="col-sm-9">
                                             <select onchange="paketDekorasi()" name="dekorasi" id="dekorasi" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <textarea style="margin-top:20px; display: none;" name="paket_dekorasi" id="paket-dekorasi" placeholder="<?= "Contoh :\n 1. Dekorasi buffe prasmanan 1 set\n 2. Inisial bunga\n 3. Pargola pintu masuk\n 4. dan lain-lain...."; ?>" class="form-control" rows="5"></textarea>
                                             <span class="help-block"><?= $validation->getError('dekorasi'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('dokumentasi') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Dokumentasi</label>

                                        <div class="col-sm-9">
                                             <select onchange="paketDokumentasi()" name="dokumentasi" id="dokumentasi" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <textarea style="margin-top:20px; display: none;" name="paket_dokumentasi" id="paket-dokumentasi" placeholder="<?= "Contoh :\n 1. Mini album\n 2. Vidio shooting\n 3. dan lain-lain..."; ?>" class="form-control" rows="5"></textarea>
                                             <span class="help-block"><?= $validation->getError('dokumentasi'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('orgen_tunggal') ? 'has-error' : ''; ?>">
                                        <label for="inputEmail3" class="col-sm-3 control-label">Orgen Tunggal</label>

                                        <div class="col-sm-9">
                                             <select name="orgen_tunggal" id="orgen" class="form-control">
                                                  <option>Ya</option>
                                                  <option>Tidak</option>
                                             </select>
                                             <span class="help-block"><?= $validation->getError('orgen_tunggal'); ?></span>
                                        </div>
                                   </div>
                                   <div class="form-group <?= $validation->hasError('harga') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label">Harga</label>

                                        <div class="col-sm-9">
                                             <input id="harga" type="number" name="harga" class="form-control">
                                             <span class="help-block"><?= $validation->getError('harga'); ?></span>
                                        </div>
                                   </div>

                                   <div class="form-group <?= $validation->hasError('foto') ? 'has-error' : ''; ?>">
                                        <label for="inputPassword3" class="col-sm-3 control-label"></label>

                                        <div class="col-sm-9">
                                             <div class="widget-user-image">
                                                  <img id="view-foto" class="img-thumbnail preview-add" width="100" src="/gmb/paket/default.png">
                                             </div><br>
                                             <label for="foto-add">Pilih Gambar</label>
                                             <label style="display: none;" class="foto-add-name" for="foto-add">hidden</label>
                                             <input type="file" name="foto" class="input-sm form-control" onchange="previewFotoUploaded('#foto-add', '.foto-add-name', '.preview-add')" id="foto-add">
                                             <span class="help-block"><?= $validation->getError('foto'); ?></span>
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
                              <h3 class="box-title">Atribut Paket</h3>
                              <div class="row">
                                   <div class="col-sm-6">
                                        <div class="input-group" style="margin-top: 15px;">
                                             <input type="text" placeholder="Cari Nama Paket" id="ad-key" class="form-control input-sm">
                                             <span class="input-group-btn">
                                                  <button type="button" class="btn btn-sm btn-primary btn-flat">Cari</button>
                                             </span>
                                        </div>
                                   </div>
                              </div>
                              <?php if (session()->getFlashdata('pesan')) {
                                   echo "<h6 class='pesan-singkat alert alert-success' style='margin-top: 20px;'>";
                                   echo session()->getFlashdata('pesan');
                                   echo "</h6>";
                              } else if (session()->getFlashdata('gagal')) {
                                   echo "<h6 class='pesan-singkat alert alert-danger' style='margin-top: 20px;'>";
                                   echo session()->getFlashdata('gagal');
                                   echo "</h6>";
                              } ?>
                              <!-- <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#modal-tambah-paket">Tambah Paket</button> -->
                         </div>
                         <!-- /.box-header -->
                         <div class="box-body">
                              <div id="containerAtribut"></div>
                              <table class="table table-bordered">
                                   <tbody>
                                        <tr>
                                             <th style="width: 10px">No</th>
                                             <th>Paket</th>
                                             <th>Kategori</th>
                                             <th>Deskripsi</th>
                                             <th>Undangan</th>
                                             <th>Tempat</th>
                                             <th>MC</th>
                                             <th>Rias</th>
                                             <th>Catering</th>
                                             <th>Dekorasi</th>
                                             <th>Dokumentasi</th>
                                             <th>Orgen</th>
                                             <th>Harga</th>
                                             <th style="width: 5%">Aksi</th>
                                        </tr>
                                        <?php $no = 1 + ($per_halaman * ($page_looping - 1));
                                        foreach ($data as $row) : ?>
                                             <tr>
                                                  <td><?= $no++; ?></td>
                                                  <td><?= $row['nama_paket']; ?></td>
                                                  <td><?= $row['kategori'] == null ? '-' : $row['kategori']; ?></td>
                                                  <td> <?= $row['deskripsi'] == null ? '-' : $row['deskripsi']; ?> </td>
                                                  <td> <?= $row['undangan'] == null ? '-' : $row['undangan']; ?> </td>
                                                  <td> <?= $row['lokasi'] == null ? '-' : $row['lokasi']; ?> </td>
                                                  <td style="color: <?= $row['mc_resepsi'] == 1 ? '' : 'red'; ?>;"> <?= $row['mc_resepsi'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td style="color: <?= $row['rias_busana'] == 1 ? '' : 'red'; ?>;"> <?= $row['rias_busana'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td style="color: <?= $row['catering'] == 1 ? '' : 'red'; ?>;"> <?= $row['catering'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td style="color: <?= $row['dekorasi'] == 1 ? '' : 'red'; ?>;"> <?= $row['dekorasi'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td style="color: <?= $row['dokumentasi'] == 1 ? '' : 'red'; ?>;"> <?= $row['dokumentasi'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td style="color: <?= $row['orgen_tunggal'] == 1 ? '' : 'red'; ?>;"> <?= $row['orgen_tunggal'] == 1 ? 'Ya' : 'Tidak'; ?> </td>
                                                  <td> Rp. <?= number_format($row['harga'], 2, ',', '.'); ?> </td>
                                                  <td>
                                                       <!-- ######################################### -->
                                                       <button id="to-edit-atribut" data-id-atribut="<?= $row['id_atribut_dasar']; ?>" data-id-atribut-harga="<?= $row['id_atribut_harga']; ?>" data-id="<?= $row['id_paket']; ?>" data-paket="<?= $row['nama_paket']; ?>" data-kategori="<?= $row['kategori'] == null ? '' : $row['kategori']; ?>" data-deskripsi="<?= $row['deskripsi'] == null ? '' : $row['deskripsi']; ?>" data-undangan="<?= $row['undangan']; ?>" data-lokasi="<?= $row['lokasi']; ?>" data-mc="<?= $row['mc_resepsi']; ?>" data-rias="<?= $row['rias_busana']; ?>" data-paket-rias="<?= $row['paket_rias_busana']; ?>" data-catering="<?= $row['catering']; ?>" data-paket-catering="<?= $row['paket_catering']; ?>" data-dekorasi="<?= $row['dekorasi']; ?>" data-paket-dekorasi="<?= $row['paket_dekorasi']; ?>" data-dokumentasi="<?= $row['dokumentasi']; ?>" data-paket-dokumentasi="<?= $row['paket_dokumentasi']; ?>" data-orgen="<?= $row['orgen_tunggal']; ?>" data-harga="<?= $row['harga']; ?>" data-foto="<?= $row['gambar']; ?>" data-toggle="modal" data-target="#modal-edit-atribut" class="btn btn-warning btn-sm">Edit</button>
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
                              <?= $pager->links('atribut_dasar', 'all_pager'); ?>
                         </div>
                    </div>
               </div>
               <!-- /.col -->
          </div>
          <!-- /.row -->
     </div>
</div>

<script type="text/javascript">
     var adKey = document.getElementById("ad-key");
     var containerAtribut = document.getElementById("containerAtribut");
     adKey.addEventListener("click", function() {
          adKey.addEventListener("keyup", function() {
               //objek AJAX;
               var xhr = new XMLHttpRequest();
               //cek kesiapan AJAX;
               xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                         containerAtribut.innerHTML = xhr.responseText;
                    }
               }
               //exsekusi AJAX;
               xhr.open("GET", "/admin/atribut_search_with_ajax/" + adKey.value, true);
               xhr.send();
          });
     });
</script>

<?= $this->endSection(''); ?>