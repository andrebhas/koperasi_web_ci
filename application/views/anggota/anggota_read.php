<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Anggota Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Namaanggota</td><td><?php echo $namaanggota; ?></td>
                </tr>
				<tr>
                    <td>Jk</td><td><?php echo $jk; ?></td>
                </tr>
				<tr>
                    <td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td>
                </tr>
				<tr>
                    <td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td>
                </tr>
				<tr>
                    <td>Alamat</td><td><?php echo $alamat; ?></td>
                </tr>
				<tr>
                    <td>Hp</td><td><?php echo $hp; ?></td>
                </tr>
				<tr>
                    <td>Noidentitas</td><td><?php echo $noidentitas; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('anggota') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>