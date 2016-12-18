<?php 
    $ci =& get_instance();;
?>
<link rel="stylesheet" type="text/css" href="<?= base_url()?>assets/js/bootstrap-datepicker/css/bootstrap-datepicker.css">
<script src="<?= base_url()?>assets/js/typeahead.bundle.js" type="text/javascript"></script>
<style type="text/css">
.tt-query {
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
     -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
          box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}

.tt-hint {
  color: #999
}

.tt-menu {    /* used to be tt-dropdown-menu in older versions */
  width: 422px;
  margin-top: 4px;
  padding: 4px 0;
  background-color: #fff;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  -webkit-border-radius: 4px;
     -moz-border-radius: 4px;
          border-radius: 4px;
  -webkit-box-shadow: 0 5px 10px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 10px rgba(0,0,0,.2);
          box-shadow: 0 5px 10px rgba(0,0,0,.2);
}

.tt-suggestion {
  padding: 3px 20px;
  line-height: 24px;
}

.tt-suggestion.tt-cursor,.tt-suggestion:hover {
  color: #fff;
  background-color: #0097cf;

}

.tt-suggestion p {
  margin: 0;
}
</style>
<div class="content">

    <div class="panel panel-success">
        <div class="panel-heading">
            <h5 class="panel-title">Form <?php echo $button ?> Shu</h5>
            <div class="heading-elements">
                <ul class="icons-list">
                    <li><a data-action="collapse"></a></li>
                </ul>
            </div>
        </div>

        <div class="panel-body"> 
            <div class="row">
                <div class="col-md-4">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="char">No Anggota <?php echo form_error('noanggota') ?></label>
                    <input type="text" class="form-control typeahead" name="noanggota" id="noanggota" placeholder="No Anggota" value="<?php echo $noanggota; ?>" />
                </div>
                <div class="form-group">
                    <label for="date">Tgl <?php echo form_error('tgl') ?></label>
                    <input type="text" class="form-control tanggal" name="tgl" id="tgl" placeholder="Tgl" value="<?php echo $tgl; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Jumlah Total Transaksi Anggota<?php echo form_error('jml_shu_keseluruhan') ?></label>
                    <input type="text" readonly="readonly" class="form-control" name="jml_shu_keseluruhan" id="jml_shu_keseluruhan" placeholder="Jml Shu Keseluruhan" value="<?php echo $jml_shu_keseluruhan; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Jumlah Total Transaksi koperasi</label>
                    <input type="text" readonly="readonly" class="form-control" id="jml_transaksi_koperasi" value="<?= $transaksi_kop ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Laba <?php echo form_error('laba') ?></label>
                    <input type="number" class="form-control" name="laba" id="laba" placeholder="Laba" value="<?php echo $laba; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Jml Shu Diterima <?php echo form_error('jml_shu_diterima') ?></label>
                    <input type="text" class="form-control" name="jml_shu_diterima" id="jml_shu_diterima" placeholder="Jml Shu Diterima" value="<?php echo $jml_shu_diterima; ?>" />
                </div>
                <input type="hidden" name="id_shu" value="<?php echo $id_shu; ?>" /> 
                <button type="submit" class="btn btn-success"><?php echo $button ?></button> 
                <a href="<?php echo site_url('shu') ?>" class="btn btn-default">Cancel</a>
            </form>
                </div>


                <div class="col-md-8" id="total_transaksi">
                </div>

            </div>

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
        $("#noanggota").keyup(function(e){
            var isi = $(e.target).val();
            $(e.target).val(isi.toUpperCase());
        });
        //perhitungan
        function updateHarga()
        {
            var laba = parseFloat($("#laba").val());
            var jml_shu_keseluruhan = parseFloat($("#jml_shu_keseluruhan").val());
            var jml_transaksi_koperasi = parseFloat($("#jml_transaksi_koperasi").val());
            var shu =  ( jml_shu_keseluruhan / jml_transaksi_koperasi ) * laba ;
            $("#jml_shu_diterima").val(shu);    
        }
        $(document).on("change, keyup", "#laba", updateHarga);
    });

    var anggota = <?php echo $anggota_data ?>;
    var data_anggota = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('noanggota', 'namaanggota'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        local: anggota
    });
    data_anggota.initialize();

    $('.typeahead').typeahead(
        {
           hint: true,
           highlight: true,
           minLength: 1
        } , 
        {
            name: 'noanggota',
            display: function(item) {
                return item.noanggota; 
            },
            source: data_anggota.ttAdapter(),
            limit: 10 ,
            suggestion: function(data) {
                return '<div>'+ data.noanggota +'</div>'
            }

        }
    );
    $('.typeahead').on('typeahead:selected', function (e, datum) {
        var link_transaksi = '<?php echo base_url("shu/getdata_transaksi/")  ?>'+datum.noanggota;
        var link_total = '<?php echo base_url("shu/get_total/")  ?>'+datum.noanggota;

        var table = '<center><h2>Data Transaksi Anggota</h2><table class="table datatable-responsive table-sm table-striped"><tr><th>No.</th><th>Tanggal</th><th>Nama Barang</th><th>Jumlah</th></tr>';
       
        $.getJSON(link_transaksi, function(data) {
            var i=1;
            $.each(data ,function(index, el) {
                table += ('<tr>');
                table += ('<td>' + i++ + '</td>');
                table += ('<td>' + el.tgl + '</td>');
                table += ('<td>' + el.nama_barang + '</td>');
                table += ('<td>' + el.jumlah + '</td>');
                table += ('</tr>');
                //console.log(el);
            });
            $.getJSON(link_total, function(data_total) {
                table += '<tr style="background-color:yellow">';
                if (data_total.total_transaksi == null) {
                    table += ('<td colspan="4">Belum Bertransaksi</td>');            
                    table += '</tr>';
                    $("#jml_shu_keseluruhan").val(0);
                } else {
                    table += ('<td colspan="3"> Total</td>');
                    table += ('<td>' +data_total.total_transaksi + '</td>');
                    $("#jml_shu_keseluruhan").val(data_total.total_transaksi);
                }
                table += '</tr>';
                table += '</table></center>';
                $("#total_transaksi").html(table);

            }); 

        }); 
    });
</script>