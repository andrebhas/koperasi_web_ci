<?php 
    $ci =& get_instance();
?>

<div class="content">

    <div class="panel panel-primary">
        <div class="panel-heading">
            <h5 class="panel-title">Shu Detail</h5>
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
                    <td>Jml Shu Diterima</td><td><?php echo $jml_shu_diterima; ?></td>
                </tr>
				<tr>
                    <td>Jml Shu Keseluruhan</td><td><?php echo $jml_shu_keseluruhan; ?></td>
                </tr>
				<tr>
                    <td>Laba</td><td><?php echo $laba; ?></td>
                </tr>
				<tr>
                    <td><a href="<?php echo site_url('shu') ?>" class="btn btn-primary">Back</a></td><td></td>
                </tr>
			</table>
       
       </div>

    </div>
</div>