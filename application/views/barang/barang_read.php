<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Barang Detail</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
        
            <table class="table">
				<tr>
                    <td>Nama Barang</td><td><?php echo $nama_barang; ?></td>
                </tr>
				<tr>
                    <td>Harga</td><td><?php echo $harga; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('barang') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>