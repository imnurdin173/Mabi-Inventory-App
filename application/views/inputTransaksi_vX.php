<?php
$page_title = "Input Data Transaksi LAMA";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ol>
    </div><!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $page_title; ?></h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">haha <?php echo $fullname; ?></div>
                <div class="panel-body">
                    <div class="col-md-6">
<?php echo form_open('input/option', 'role="form"') ?>

                        <div class="form-group col-md-8" style="float:none;">
                            <label>Nama Barang</label>

                            <select class="form-control" onchange="$('#harga_satuan').val(this.value)">
                                <option selected="selected" value="no   ne">- Masukan Barang - </option>
                                <?php foreach ($pil as $ops) { ?>
                                    <option value="<?php echo $ops->harga ?>"><?php echo $ops->namaBarang; ?></option>
<?php } ?>
                            </select>
                            <!--<input class="form-control typeahead tt-query" placeholder="Cari Barang ..." type="text" name="typeahead" autocomplete="off" spellcheck="false">  -->    
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kuantitas Barang</label>
<?php $kuantitas = 0; ?>
                            <input id="kuantitas"  class="form-control" value="<?php $kuantitas; ?>" placeholder="..."> 
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group col-md-6" style="float: none;">
                            <label>Harga Satuan</label><br>
                            <div style="float:left;margin:8px 0 10px 0;">IDR</div>
<?php $ops->harga = 0; ?>
                            <input id="harga_satuan" class="form-control" value="<?php echo $ops->harga ?>" style="float:right; width: 85%;left:40%;" disabled>

                            <br>
                        </div>
                        <div class="form-group col-md-6" style="float: none;">
                            <label style="margin-left:-20px;">Harga Total</label><br>
                            <div style="float:left;margin:8px 0 10px 0;">IDR</div>
<?php $harga_total = 0; ?>
                            <input id="harga_total" class="form-control" value="<?php echo $ops->harga * $kuantitas ?>" style="float:right; width: 85%;left:40%;" disabled>
                            <br>	
                        </div>		
                    </div>
                    <div class="form-group col-md-12" style="top:10px;">
                        <button type="submit" class="btn btn-primary">Add</button>
                        <button type="reset" class="btn btn-default">Reset</button>                
                    </div>
<?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table id="tableInput" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Quantity</th>
                                <th>Harga Total</th>
                            </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>

</div><!--/.main -->


<script>
    $(document).ready(function () {
        $("#harga_satuan").change(function () {
            $.ajax({type: 'POST',
                data: {keyname: $('#harga_satuan option:selected').val()}
            });
        });
    });

    $(document).ready(function () {
        $("harga_total")
    });

    $(document).ready(function () {
        $("#harga_total").change(function () {
            $.ajax({type: 'POST',
                data: {keyname: $('#harga_total input:selected').val()}
            });
        });
    });
</script>

<?php include("template/footer.php"); ?>

