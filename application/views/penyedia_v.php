<?php
$page_title = "Data Penyedia";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
            <li><a href="<?php site_url('index.php/penyedia'); ?>">Penyedia</a></li>

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
                    Tabel Data Penyedia
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/penyedia') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/input_penyedia') ?>'">Tambah Penyedia</button>

                </div>
                <div class="panel-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID Penyedia</th>
                                <th>Nama Penyedia</th>
                                <th>Disc (%)</th>
                                <th>Keterangan</th>
                                <th>Operasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data_penyedia as $penyedia) {
                                ?>
                            <tr>
                                <td><?php echo $penyedia->idPenyedia;?></td>
                                <td><?php echo $penyedia->namaPenyedia;?></td>
                                <td><?php echo $penyedia->discount;?> %</td>
                                <td><?php echo $penyedia->keterangan;?></td>
                                <td>
                                    <a href="penyedia/edit/<?php echo $penyedia->idPenyedia?>" class="btn btn-primary btn-xs">Ubah</a>
                                    <a href="penyedia/hapus/<?php echo $penyedia->idPenyedia?>" class="btn btn-danger btn-xs">Hapus</a>
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

