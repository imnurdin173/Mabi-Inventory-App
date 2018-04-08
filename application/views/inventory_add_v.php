<?php
$page_title = "Input Data Inventaris";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></a></li>
            <li><a href="<?php site_url('index.php/data_inventory'); ?>">Inventaris</a></li>
            <li><a href="<?php site_url('index.php/input_inventory'); ?>">Input Data Inventaris</a></li>

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
                    Input Data Iventaris
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/data_inventory') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/input_inventory') ?>'">Tambah Data</button>

                </div>
                <div class="panel-body">

                    <div class="col-md-6">    
                        <form role="form" method="post" action="<?php echo site_url('input_inventory/insert'); ?>">
<!--                            <div class="form-group">
                                <label>Id Barang</label>
                                <input class="form-control" name="idBarang">
                            </div>-->

                            <div class="form-group">
                                <label>nama Barang</label>
                                <input class="form-control" name="namaBarang" placeholder="masukan nama Barang ... ">
                            </div>

                            <div class="form-group">
                                <label>Nama Penyedia</label>
                                <select class="form-control" name="penyedia">
                                    <option value="none">- Masukan Penyedia - </option>
                                    <?php foreach ($data_penyedia as $pey) { ?>
                                        <option  value="<?php echo $pey->idPenyedia; ?>"><?php echo $pey->namaPenyedia; ?></option>

                                    <?php } ?>
                                </select>  
                            </div>

                            <div class="form-group">
                                <label>Harga Barang</label>
                                <input class="form-control" name="harga" placeholder="masukan Harga satuan ... ">
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


<?php include("template/footer.php"); ?>

