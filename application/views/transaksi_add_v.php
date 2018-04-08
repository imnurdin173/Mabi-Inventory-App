<?php
$page_title = "Input Transaksi";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
            <li><a href="<?php site_url('index.php/data_transaksi'); ?>">Transaksi</a></li>

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
                    Input Data Transaksi
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/data_transaksi') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/input_transaksi') ?>'">Tambah Data</button>

                </div>
                <d                <div class="panel-body">

                        <div class="col-md-6">    
                            <form role="form" method="post" action="<?php echo site_url('input_transaksi/insert'); ?>">

                                <div class="form-group">
                                    <label>Nama Barang</label>

                                    <select class="form-control"  name="Barang">
                                        <option value="none">- Masukan Barang - </option>
                                        <?php foreach ($data_inv as $inv) { ?>
                                            <option value="<?php echo $inv->idBarang; ?>"><?php echo $inv->namaBarang; ?> (<?php echo $inv->namaPenyedia; ?>)</option>

                                        <?php } ?>
                                    </select>                                    
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Barang</label>
                                    <input class="form-control" name="quantity" placeholder="Masukan jumlah barang ... ">
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

                        <div class="col-md-12"><hr></div>
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Penyedia</th>
                                        <th>Harga satuan</th>
                                        <th>Discount</th>
                                        <th>Harga Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($transaksi as $as) {
                                        ?>
                                        <tr>
                                            <td><?php echo $as->idBarang; ?></td>
                                            <td><?php echo $as->namaBarang; ?></td>                      
                                            <td><?php echo $as->namaPenyedia; ?></td>
                                            <td><?php echo $as->harga; ?></td>
                                            <td><?php echo $as->discount; ?></td>
                                            <td><?php $h_total = ($as->harga * $as->quantity)-($as->harga*($as->discount / 100)); echo $h_total; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

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

