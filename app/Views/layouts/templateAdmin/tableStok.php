<?php $i=1 + (2 * ($page - 1)); foreach($data_produk as $d){?>
          <tr>
            <th scope='row'><?= $i ?></th>
            <td><?= $d['nama_produk'] ?></td> 
            <td><?= $d['warna_kaos'] ?></td>
            <td><?= $d['size_kaos'] ?></td>
            <td><?= $d['jumlah_stok'] ?></td>
            <td><?= $d['kategori'] ?></td>
            <td><form action='url16'  method='POST' class='d-inline'>
                <?= csrf_field(); ?>
                <input type='hidden' name='_method' value='DELETE'>
                <a type='button' class='btn btn-danger btn-sm col-4' onclick=deletStok(<?= $d['id_stok'] ?>) >DELET</a>
                </form>
                <a type='button' class='btn btn-primary btn-sm col-4' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick=updateStokModal(<?= $d['id_stok'] ?>) id='update'>EDIT</a>
            </td>
          </tr>
        <?php $i++; }?>