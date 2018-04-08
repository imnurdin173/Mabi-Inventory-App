<?php
$page_title = "Data Inventaris";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></a></li>
            <li><a href="<?php site_url('index.php/data_inventory'); ?>">Inventaris</a></li>

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
                    Tabel Data Iventaris
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/data_inventory') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/input_inventory') ?>'">Tambah Data</button>

                </div>
                <div class="panel-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Barang</th>
                                <th>Nama Barang</th>
                                <th>Nama Penyedia</th>
                                <th>Harga satuan</th>
                                <th>Discount</th>
                                <th>Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data_inv as $inv) {
                                ?>
                                <tr>
                                    <td><?php echo $inv->idBarang; ?></td>
                                    <td><?php echo $inv->namaBarang; ?></td>
                                    <td><?php echo $inv->namaPenyedia; ?></td>
                                    <td>Rp. <?php echo $inv->harga; ?></td>
                                    <td><?php echo $inv->discount; ?> %</td>
                                    <td>
                                    <a href="data_inventory/edit/<?php echo $inv->idBarang?>" class="btn btn-primary btn-xs">Ubah</a>
                                    <a href="data_inventory/hapus/<?php echo $inv->idBarang?>" class="btn btn-danger btn-xs">Hapus</a>
                                </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!--/.row-->


<?php include("template/footer.php"); ?>

