<?php if (empty($data)) {
     die();
} ?>
<table style="margin-bottom: 100px;" class="table table-bordered">
     <tbody>
          <tr>
               <th style="width: 10px">No</th>
               <th>Nama</th>
               <th>Email</th>
               <th>No Telepon</th>
               <th>Alamat</th>
               <th style="width: 25%"></th>
          </tr>
          <?php $no = 1;
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