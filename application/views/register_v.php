<?php
$page_title = "Tambah User baru";
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
                    Tambah User Baru
                </div>
                <div class="panel-body">
                    <div class="col-md-6">    
                        <?php
                        echo form_open('register_c', 'class="myclass"');
                        ?>

                        <div class="form-group">
                            <?php
                            echo form_label('Email', 'email');
                            echo form_input('email', '', 'class="form-control" id="email" placeholder="Your Email Address"')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Nama', 'fullname');
                            echo form_input('nama_user', '', 'class="form-control" id="nama_user" placeholder="Nama Pengguna"')
                            ?>
                        </div>

                        <div class="form-group">
                            <?php
                            echo form_label('Username', 'username');
                            echo form_input('username', '', 'class="form-control" id="username" placeholder="Username Pengguna"')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Password', 'password');
                            echo form_password('password', '', 'class="form-control" id="password" placeholder="Kata Sandi"')
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Konfirmasi Password', 'passconf');
                            echo form_password('passconf', '', 'class="form-control" id="password" placeholder="Konfirmasi kata Sandi"')
                            ?>
                        </div>
                        <?php echo form_submit('register_c', 'Register', 'class="btn btn-primary"') ?>
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

                    </div> <!-- end divform -->


                </div>
            </div> <!-- end panelbody -->
        </div> <!-- end panel-default -->
    </div><!--/.row-->

    <?php include("template/footer.php"); ?>





