<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Jenis_simpan Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Jenis Simpanan</td><td><?php echo $jenis_simpanan; ?></td>
                </tr>
				<tr>
                    <td>Jumlah</td><td><?php echo $jumlah; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('jenis_simpan') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>