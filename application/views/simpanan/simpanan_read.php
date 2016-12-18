<?php 
    $ci =& get_instance();
    $ci->load->model('Users_model');
    $ci->load->model('Jenis_simpan_model');
    $ci->load->model('Anggota_model');
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Simpanan Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

        <?php if ($simpanan_data): ?>
                   
            <table class="table datatable-responsive table-sm table-striped" id="mytable">
                <thead>
                    <tr>
                        <th width="50px">No</th>
                        <th>Tanggal</th>
                        <th>No Anggota</th>
                        <td>Nama Anggota</td>
                        <th>jenis Simpanan</th>
                        <th>Jumlah</th>
                        <th>Staff</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                $start = 0;
                foreach ($simpanan_data as $simpanan)
                {
            ?>
                    <tr>
                        <td><?php echo ++$start ?></td>
                        <td><?php echo $simpanan->tgl ?></td>
                        <td><?php echo $simpanan->noanggota ?></td>
                        <td><?php echo $ci->Anggota_model->get_by_id($noanggota)->namaanggota ?></td>
                        <td><?php echo $ci->Jenis_simpan_model->get_by_id($simpanan->id_jenis)->jenis_simpanan ?></td>
                        <td><?php echo $simpanan->jumlah ?></td>
                        <td><?php echo $ci->Users_model->get_by_id($simpanan->user_id)->name  ?></td>
                        <td style="text-align:center" width="200px">
                        <?php 
                            //echo anchor(site_url('simpanan/read/'.$simpanan->id_simpanan),'Detail'); 
                            //echo ' | '; 
                            echo anchor(site_url('simpanan/update/'.$simpanan->id_simpanan),'Update'); 
                            echo ' | '; 
                            echo anchor(site_url('simpanan/delete/'.$simpanan->id_simpanan),'Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                        ?>
                        </td>
                    </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
        <?php else: ?>
            <h3><?php echo $ci->Anggota_model->get_by_id($noanggota)->namaanggota ?> - Belum Melakukan simpanan</h3>
       <?php endif ?>

       </div>

    </div>
</div>