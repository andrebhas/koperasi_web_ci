<?php 
    $ci =& get_instance();;
?>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-datepicker/css/bootstrap-datepicker.css">

<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Simpanan</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 

            <form action="<?php echo $action; ?>" method="post">
				<div class="form-group">
                    <label for="date">Tanggal <?php echo form_error('tgl') ?></label>
                    <input type="text" class="form-control tanggal" name="tgl" id="tgl"  value="<?php echo $tgl; ?>" />
                </div>
				<div class="form-group">
                    <label for="char">No Anggota <?php echo form_error('noanggota') ?></label>
                    <select class="form-control" name="noanggota" id="noanggota">
                        <option value="">Pilih. . . </option>
                        <?php foreach ($anggota as $ag): ?>
                            <option value="<?= $ag->noanggota ?>" <?php if($noanggota){ echo "selected";} ?>> <?= $ag->noanggota ?> - <?= $ag->namaanggota ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
				<div class="form-group">
                    <label for="int">Jenis Simpanan <?php echo form_error('id_jenis') ?></label>
                    <select class="form-control" name="id_jenis" id="id_jenis">
                        <option value="">Pilih. . . </option>
                        <?php foreach ($jenis_simpan as $js): ?>
                            <option value="<?= $js->id_jenis ?>" <?php if($id_jenis){echo "selected";} ?>> <?php echo $js->jenis_simpanan ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
				<div class="form-group">
                    <label for="int">Jumlah <?php echo form_error('jumlah') ?></label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
                <input type="hidden" class="form-control" name="user_id" id="user_id" value="<?php echo $user_id; ?>" />
				<input type="hidden" name="id_simpanan" value="<?php echo $id_simpanan; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('simpanan') ?>" class="btn btn-default">Cancel</a>
			</form>
        
        </div>
    </div>
</div>
<script type="text/javascript" src="<?= base_url()?>assets/js/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
     $(document).ready(function () {
        $('.tanggal').datepicker({
            format: "yyyy-mm-dd",
            autoclose:true
        });
    });
</script>