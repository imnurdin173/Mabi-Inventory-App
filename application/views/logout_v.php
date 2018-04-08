<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Logout Area</title>

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
                            <p>Terima kasih, Anda telah keluar dari sistem. Jika ingin kembali masuk ke sistem, silahkan login kembali</p>

                            <a href="<?php echo site_url('login') ?>" class="btn btn-primary">Login</a>
                            atau
                            <a href="http://google.com/" class="btn btn-default">Keluar</a>


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