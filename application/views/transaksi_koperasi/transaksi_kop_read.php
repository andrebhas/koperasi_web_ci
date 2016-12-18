<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Transaksi_kop Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Tgl</td><td><?php echo $tgl; ?></td>
                </tr>
				<tr>
                    <td>Noanggota</td><td><?php echo $noanggota; ?></td>
                </tr>
				<tr>
                    <td>Id Jenis</td><td><?php echo $id_jenis; ?></td>
                </tr>
				<tr>
                    <td>Jumlah</td><td><?php echo $jumlah; ?></td>
                </tr>
				<tr>
                    <td>User Id</td><td><?php echo $user_id; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('transaksi_koperasi') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>