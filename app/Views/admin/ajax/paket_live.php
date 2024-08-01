<?php if (empty($data)) {
     die();
} ?>
<table class="table table-bordered">
     <tbody>
          <tr>
               <th style="width: 10px">No</th>
               <th>Nama Paket</th>
               <th>Alamat</th>
               <th style="width: 25%"></th>
          </tr>
          <?php $no = 1;
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