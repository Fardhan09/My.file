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
                              <h3 class="box-title">Detail Paket</h3>
                         </div>
                    </div>
                    <div class="row" style="margin:auto;">
                         <div class="col-sm-12">
                              <div class="box box-widget widget-user">
                                   <!-- Add the bg color to the header using any of the bg-* classes -->
                                   <div class="widget-user-header bg-black" style="height: 680px; background: url('/gmb/paket/<?= $data['gambar']; ?>') top center; background-size: cover;">
                                        <h3 class="widget-user-username"><?= ucwords($data['nama_paket']); ?></h3>
                                        <h5 class="widget-user-desc"><?= ucwords($data['kategori']); ?> Wedding</h5>
                                   </div>
                                   <div class="box-footer">
                                        <div class="box-body table-responsive no-padding">
                                             <table class="table table-hover">
                                                  <tbody>
                                                       <tr>
                                                            <td>Tipe Ruangan</td>
                                                            <td><?= ucwords($data['kategori'] == 'indoor' ? 'Inddor / Dalam Ruangan (Gedung)' : 'Outdoor / Luar Ruangan'); ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Jumlah Undangan</td>
                                                            <td><?= number_format($data['undangan'], 0, '.', '.') . " Orang"; ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Lokasi Pelaksanaan</td>
                                                            <td><?= ucwords($data['lokasi']); ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Deskripsi</td>
                                                            <td><?= $data['deskripsi']; ?></td>
                                                       </tr>
                                                       <tr>
                                                            <td>Paket Rias & Busana</td>
                                                            <td>
                                                                 <?= $data['rias_busana'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?><br><br>
                                                                 <?= ($data['rias_busana'] == 1 ? "Paket : <br> <pre>$data[paket_rias_busana]</pre>" : ''); ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>Paket Dekorasi</td>
                                                            <td>
                                                                 <?= $data['dekorasi'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?><br><br>
                                                                 <?= ($data['dekorasi'] == 1 ?  "Paket : <br> <pre>$data[paket_dekorasi]</pre>" : ''); ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>Paket Catering</td>
                                                            <td>
                                                                 <?= $data['catering'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?><br><br>
                                                                 <?= ($data['catering'] == 1 ? "Paket : <br> <pre> $data[paket_catering]</pre>" : ''); ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>Paket Dokumentasi</td>
                                                            <td>
                                                                 <?= $data['dokumentasi'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?><br><br>
                                                                 <?= ($data['dokumentasi'] == 1 ? "Paket : <br>" . "<pre>$data[paket_dokumentasi]</pre>" : ''); ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>MC (Pembawa Acara)</td>
                                                            <td>
                                                                 <?= $data['mc_resepsi'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>Orgen Tunggal (Hiburan)</td>
                                                            <td>
                                                                 <?= $data['orgen_tunggal'] == 1 ? 'YA' : '<span style="color: red; text-decoration: underline;">TIDAK</span>'; ?>
                                                            </td>
                                                       </tr>
                                                       <tr>
                                                            <td>Harga Paket</td>
                                                            <td>
                                                                 <?= "Rp " . number_format($data['harga'], 2, '.', ','); ?>
                                                            </td>
                                                       </tr>
                                                  </tbody>
                                             </table>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<?= $this->endSection(''); ?>