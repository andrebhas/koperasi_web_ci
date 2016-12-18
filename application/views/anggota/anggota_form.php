<?php 
    $ci =& get_instance();;
?>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-datepicker/css/bootstrap-datepicker.css">

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Anggota</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="varchar">Namaanggota <?php echo form_error('namaanggota') ?></label>
                    <input type="text" class="form-control" name="namaanggota" id="namaanggota" placeholder="Namaanggota" value="<?php echo $namaanggota; ?>" />
                </div>
				<div class="form-group">
                    <label for="char">Jenis Kelamin <?php echo form_error('jk') ?></label>
                    <select class="form-control" name="jk" id="jk">
                        <option value=""> Pilih . . .</option>
                        <option value="L" <?php if($jk){ echo "selected";} ?>>Laki Laki</option>
                        <option value="P" <?php if($jk){ echo "selected";} ?>>Perempuan</option>
                    </select>
                </div>
				<div class="form-group">
                    <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
                </div>
				<div class="form-group">
                    <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
                    <input type="text" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
                </div>
				<div class="form-group">
                    <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
                </div>
				<div class="form-group">
                    <label for="char">Hp <?php echo form_error('hp') ?></label>
                    <input type="text" class="form-control" name="hp" id="hp" placeholder="Hp" value="<?php echo $hp; ?>" />
                </div>
				<div class="form-group">
                    <label for="char">Noidentitas <?php echo form_error('noidentitas') ?></label>
                    <input type="text" class="form-control" name="noidentitas" id="noidentitas" placeholder="Noidentitas" value="<?php echo $noidentitas; ?>" />
                </div>
				<input type="hidden" name="noanggota" value="<?php echo $noanggota; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('anggota') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>

<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
     $(document).ready(function () {
        $('#tgl_lahir').datepicker({
            format: "yyyy-mm-dd",
            autoclose:true
        });
    });
</script>