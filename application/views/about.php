<?php $page_title = "Tentang Aplikasi";
$page = basename($_SERVER["PHP_SELF"]);
$subpage = "pengaturandasar";
include("template/header.php"); ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked tag"><use xlink:href="#stroked-tag"/></svg></a></li>
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
                <div class="panel-heading">MABI Inventory
                </div>
                <div class="panel-body">
                    <p>MABI Inventory adalah aplikasi yang digunakan sebagai alat pencatatan data Barang. <br>Dibuat pada Tahun 2017 oleh Mahasiswa magang Telkom University.
                        <br><br>
                        
                    </p>
                </div>
            </div>
        </div><!-- /.col-->
    </div>


</div>	<!--/.main-->


<?php include("template/footer.php"); ?>



