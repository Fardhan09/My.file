<?php if (empty($data)) {
     die();
} ?>
<table style="margin-bottom: 100px;" class="table table-bordered">
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
          <?php $no = 1;
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