<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $brandName = "MABI";?>
        <title><?php echo $brandName;?> : <?php echo $page_title; ?></title>

        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/balloon.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/dataTables.bootstrap.min.css');?>" rel="stylesheet">
        

        <!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->

    </head>

    <body>

        <div id="div1" style="position: absolute;"></div>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <a class="navbar-brand" href="#"><span style="font-weight:500;font-style: bold;"><?php echo $brandName;?> </span><span>INVENTORY</span></a>
            <form role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
            </form>
            <ul class="nav menu">
                <li <?php if ($page == "home") echo 'class="active"'; ?>><a href="<?php echo site_url('home'); ?>">Beranda<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
                <li <?php if (($page == "penyedia")or ( $page == "input_penyedia")) echo 'class="active"'; ?>><a href="<?php echo site_url('penyedia'); ?>">Penyedia<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a></li>
                <li <?php if (($page == "data_inventory")or ( $page == "input_inventory")) echo 'class="active"'; ?>><a href="<?php echo site_url('data_inventory'); ?>">Inventaris<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a></li>
                <li <?php if (($page == "data_transaksi")or ( $page == "input_transaksi")) echo 'class="active"'; ?>><a href="<?php echo site_url('input_transaksi'); ?>">Transaksi<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-list-alt"></span></a></li>			

                <li role="presentation" class="divider"></li>
                <li class="parent <?php if (($page == "setting")or ( $page == "register_c")) echo 'active'; ?>" ><a href="<?php echo site_url('register_c'); ?>"><span data-toggle="<?php if (($page == "register_c")) echo 'collapse' ?>" href="#sub-item-1" data-balloon="klik 2x,ke submenu " data-balloon-pos="right">Pengaturan<span  style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-cog"></span></a>
                    <ul class="children collapse" id="sub-item-1">
                        <li <?php if ($page == "setting") echo 'class="active"'; ?>>
                            <a class="" href="<?php echo site_url('register_c'); ?>"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Tambah User</a>
                            
                        </li>
                        <li>
                            <a class="" href="<?php echo site_url('setting')?>"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Kelola Akun</a>
                        </li> 
                        <li>
                            <a class="" href="<?php echo site_url('about')?>"><svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg>Tentang Aplikasi</a>
                        </li>
                    </ul>
                </li> <!-- akhir dropdown -->

                <li ><a href="" data-toggle="modal" data-target="#squarespaceModal">Log Out<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon glyphicon glyphicon-off"></span></a></li>
            </ul>

            <!-- line modal -->
            <div class="modal fade" id="squarespaceModal" tabindex="1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true" style="margin-top:200px;">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">

                            <h3 class="modal-title" id="lineModalLabel">Anda yakin ingin Keluar?</h3>
                        </div>
                        <div class="modal-body">
                            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
                                <div class="btn-group col-md-4" role="group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Kembali</button>
                                </div>

                                <div class="btn-group col-md-4" role="group">
                                    <button type="button" id="saveImage" class="btn btn-danger" data-action="logout" role="button" onclick="location.href = '<?php echo site_url('logout') ?>'">Keluar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- akhir line modal -->


            <div class="attribution">Created by <a href="http://instagram.com/alimnurd173_/" target="_blank">Tel-U Students</a></div>
        </div><!--/.sidebar-->
