<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login Area</title>

        <!-- Bootstrap -->
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/welcome.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/balloon.css') ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="container"  style="margin-top:100px;">

            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <?php
                            if (validation_errors()) {
                                ?>
                                <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <strong><?php echo validation_errors(); ?></strong>
                                </div>
                                <?php
                            }
                            echo form_open('login', 'class="myclass"');
                            ?>

                            <div class="form-group">

                                <label>Username</label>
                                <input class="form-control" id="username" placeholder="Nama Pengguna" name="username">

                            </div>
                            <div class="form-group">

                                <label>Password</label>
                                <input type="password" class="form-control" id="password" placeholder="Kata Sandi" name="password">

                            </div>
                            <?php echo form_submit('login', 'Login', 'class="btn btn-primary"') ?>
                            <a class="btn btn-link" data-balloon="Silahkan hubungi Admin untuk registrasi akun baru" data-balloon-pos="up">Daftar</a>
                            <?php echo form_close() ?>

                        </div>

                    </div>
                    <div class="footerlogin">
                        <h3>&COPY;2017 | Created by <a href="#" style="color:white;text-decoration: none;" data-balloon="Dibuat oleh Mahasiswa Fakultas Informatika, Alimnurd173_ dan Hafizha30" data-balloon-pos="up">Telkom University's Student</a></h3>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>

        </div>

        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        
        
    </body>
</html>