<?php $page_title = "Data Transaksi";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg></a></li>
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
                <div class="panel-heading">Perhitungan data Inventaris
                    <button type="submit" class="btn btn-primary">Tambah data</button>
                    <button type="submit" class="btn btn-warning" onclick="location.href = '<?php echo base_url('index.php/transaksi2_data') ?>'">Lihat Tabel</button>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <form role="form" method="post" action="<?php echo site_url('transaksi2_input/insert') ?>">

                            <div class="form-group">
                                <label>Kode Barang</label>
                                <input class="form-control" name="idBarang" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input class="form-control" name="namaBarang" placeholder="">
                            </div>																
                            <div class="form-group">
                                <label>Harga Satuan</label>
                                <input class="form-control" name="harga" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input class="form-control" name="quantity" placeholder="">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>

                        </form>
                        <?php
                        if (validation_errors()) {
                            ?>
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <strong><?php echo validation_errors(); ?></strong>
                            </div>
                        <?php } ?>
                        <?php
                        if ($this->session->flashdata('msg')) {
                            ?> 
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                            </div>
<?php } ?>
                    </div>
                </div>
            </div>
        </div><!-- /.col-->
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>idBarang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Total</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cekcek = 0;
                                foreach ($data_inv as $as) {
                                    ?>
                                    <tr>
                                        <td><?php echo $as->idBarang; ?></td>
                                        <td><?php echo $as->namaBarang; ?></td>
                                        <td><?php echo $as->harga; ?></td>
                                        <td><?php echo $as->quantity; ?></td>
                                        <td><?php echo $as->harga_total; ?></td>
                                        <td>
                                            <a href="transaksi2_data/remove/<?php echo $as->idBarang; ?>" class="btn btn-danger btn-xs">Hapus</a>

                                        </td>
                                    </tr>
                                    <?php
                                    $cekcek = $cekcek + $as->harga_total;
                                }
                                ?>
                            </tbody>
                        </table>
                        <h3 class="box-title pull-right">Total :
                            <span class="label label-warning" style="font-size:24px;"> Rp. <?php echo number_format($cekcek) ?> </span> </h3>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </div>	<!--/.row table-->


</div>	<!--/.main-->


<?php include("template/footer.php"); ?>


