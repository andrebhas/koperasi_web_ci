<?php 
    $ci =& get_instance();;
?>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-datepicker/css/bootstrap-datepicker.css">
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Transaksi_kop</h5>
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
                    <input type="text" class="form-control tanggal" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                </div>
				<div class="form-group">
                    <label for="char">No Anggota <?php echo form_error('noanggota') ?></label>
                    <select class="form-control" name="noanggota" id="noanggota" >
                        <option value="">Pilih . . . </option>
                        <?php foreach ($anggota_data as $a): ?>
                            <option value="<?= $a->noanggota ?>" <?php if($noanggota){echo " selected ";} ?> > <?php echo $a->noanggota." - ".$a->namaanggota ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
				<div class="form-group">
                    <label for="varchar">Nama Barang  <?php echo form_error('id_jenis') ?></label>
                    <select class="form-control" name="id_jenis" id="id_jenis">
                        <option>Pilih...</option>
                        <?php foreach ($barang_data as $b): ?>
                            <option value="<?= $b->id_jenis ?>" <?php if($id_jenis){echo "selected";} ?> > <?= $b->nama_barang.' - '.$b->harga ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="int">jumlah <?php echo form_error('jmlh') ?></label>
                    <input type="number" class="form-control" id="jml" />
                </div>
				<div class="form-group">
                    <label for="int">Tatal Harga <?php echo form_error('jumlah') ?></label>
                    <input readonly="readonly" type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Jumlah" value="<?php echo $jumlah; ?>" />
                </div>
                
                <input type="hidden" class="form-control" name="user_id" id="user_id" placeholder="User Id" value="<?php echo $user->id; ?>" />
				<input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
				<button type="submit" class="btn btn-success"><?php echo $button ?></button> 
				<a href="<?php echo site_url('transaksi_koperasi') ?>" class="btn btn-default">Cancel</a>
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

        function updateHarga()
        {
            var jml = parseFloat($("#jml").val());

            //var e = $("#id_jenis");
            var id_jenis = $("#id_jenis").val();

            var link = '<?php echo base_url("transaksi_koperasi/test/") ?>'+id_jenis;
            
            $.getJSON(link, function(data) {
                var harga = data['harga'];
                var total_harga = harga * jml;
                $("#jumlah").val(total_harga);
            }); 
            
        }
        $(document).on("change, keyup", "#jml", updateHarga);

    });
</script>