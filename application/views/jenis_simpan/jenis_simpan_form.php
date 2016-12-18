<?php 
    $ci =& get_instance();;
?>

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Jenis Simpanan</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="varchar">Jenis Simpanan <?php echo form_error('jenis_simpanan') ?></label>
                    <input type="text" class="form-control" name="jenis_simpanan" id="jenis_simpanan" placeholder="Jenis Simpanan" value="<?php echo $jenis_simpanan; ?>" />
                </div>
				<div class="form-group">
                    <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
				<input type="hidden" name="id_jenis" value="<?php echo $id_jenis; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('jenis_simpan') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>