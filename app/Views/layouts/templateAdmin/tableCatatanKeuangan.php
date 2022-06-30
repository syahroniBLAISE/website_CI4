<?php  $i=1 + (2 * ($page - 1)); foreach($catatan_penjualan as $d){?>
          <tr>
            <th scope='row'><?= $i ?></th>
            <td><?= $d['nama_pelanggan'] ?></td> 
            <td><?= $d['uang_masuk'] ?></td>
            <td><?= $d['uang_keluar'] ?></td>
            <td>
              <?php
            echo $d['time_transaksi'] 
            ?>
            </td>
            <td><?= $d['ket_transaksi'] ?></td>
            <td><form action='url16'  method='POST' class='d-inline'>
                <?= csrf_field(); ?>
                <input type='hidden' name='_method' value='DELETE'>
                <a type='button' class='btn btn-danger btn-sm col-4' onclick=deletPenjualan(<?= $d['id_transaksi'] ?>) >DELET</a>
                </form>
                <a type='button' class='btn btn-primary btn-sm col-4' data-bs-toggle='modal' data-bs-target='#staticBackdrop' onclick=updatePenjualanModal(<?= $d['id_transaksi'] ?>) id='update'>EDIT</a>
            </td>
          </tr>
        <?php $i++; }?>