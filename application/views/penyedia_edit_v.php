<?php
$page_title = "Edit Data Penyedia";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg></a></li>
            <li><a href="<?php site_url('index.php/penyedia'); ?>">Penyedia</a></li>
            <li class="active"><a href="#"><?php echo $page_title; ?></a></li>
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
                    Input Data
                    <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href = '<?php echo base_url('index.php/penyedia') ?>'">Lihat Tabel</button>
                    <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="#">Tambah Penyedia</button>

                </div>
                <div class="panel-body">

                    <div class="col-md-6">    
                        <?php foreach ($data_penyedia as $penyedia) { ?>
                        <form role="form" method="post" action="<?php echo site_url('insert_penyedia'); ?>">
                            <div class="form-group">
                                <label>Id Penyedia</label>
                                <input class="form-control" name="idPenyedia" value="<?php echo $penyedia->idPenyedia;?>">
                            </div>

                            <div class="form-group">
                                <label>nama Penyedia</label>
                                <input class="form-control" name="namaPenyedia" placeholder="masukan nama penyedia ... " value="<?php echo $penyedia->namaPenyedia;?>">
                            </div>

                            <div class="form-group">
                                <label>Disc(%)</label>
                                <input class="form-control" name="discount" placeholder="masukan angka tanpa simbol(%) ..." value="<?php echo $penyedia->discount;?>">
                            </div>

                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea class="form-control" name="keterangan" placeholder="masukan keterangan (OPSIONAL) ..." value="<?php echo $penyedia->keterangan;?>"></textarea>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-default">Reset</button>
                            </div>
                        </form> <!-- end divform -->
                        <?php } ?>
                        
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
        </div> <!-- end panel-default -->
    </div><!--/.row-->

    <?php include("template/footer.php"); ?>

