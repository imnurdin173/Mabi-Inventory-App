<?php
$page_title = "Edit Transaksi";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
            <li><a href="<?php site_url('index.php/data_transaksi'); ?>">Transaksi</a></li>
            <li><a href="<?php site_url('index.php/data_transaksi'); ?>">Edit Transaksi</a></li>
        </ol>
    </div>	
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $page_title; ?></h1>
        </div>
    </div><!--/.row-->



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Edit Data Transaksi
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/data_transaksi') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/input_transaksi') ?>'">Tambah Data</button>

                </div>
                <d                <div class="panel-body">

                        <div class="col-md-6">   
                            <?php foreach ($transaksi as $as) { ?>
                                <form role="form" method="post" action="<?php echo site_url('input_transaksi/insert'); ?>">

                                    <div class="form-group">
                                        <label>Nama Barang</label>

                                        <select class="form-control"  name="Barang">
                                            <option value="none">- Masukan Barang - </option>
                                            <?php foreach ($data_inv as $inv) { ?>
                                                <option value="<?php if($inv->idBarang == $as->idBarang) echo $inv->idBarang; ?>" selected><?php echo $inv->namaBarang; ?> (<?php echo $inv->namaPenyedia; ?>)</option>

                                            <?php } ?>
                                        </select>                                    
                                    </div>

                                    <div class="form-group">
                                        <label>Jumlah Barang</label>
                                        
                                        <input class="form-control" value="<?php echo $as->quantity; ?>" name="quantity" placeholder="Masukan jumlah barang ... ">
                                        <?php } ?>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="reset" class="btn btn-default">Reset</button>
                                    </div>
                                </form> <!-- end divform -->
                            <?php if (validation_errors()) { ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong><?php echo validation_errors(); ?> </strong>
                                </div>
                            <?php } ?>


                            <?php if ($this->session->flashdata('msg')) { ?> 
                                <div class="alert alert-success alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                    <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                </div>
                            <?php } ?>
                        </div> <!-- end divform -->


                    </div>
            </div> <!-- end panelbody -->
        </div>
    </div>
</div><!--/.row-->

<script>
    $(document).ready(function () {
        $("#harga_satuan").change(function () {
            $.ajax({type: 'POST',
                data: {keyname: $('#harga_satuan option:selected').val()}
            });
        });
    });
</script>

<?php include("template/footer.php"); ?>

