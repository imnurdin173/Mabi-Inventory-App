<?php
$page_title = "Beranda";
$page = basename($_SERVER["PHP_SELF"]);
include("template/header.php");
?> 

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active"><?php echo $page_title; ?></li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-md-8 col-sm-12 col-xs-12">
            <div class="panel panel-info panel-widget">
                <div class="row no-padding" style="margin-top: 20px;">
                    <div class="col-sm-3 col-md-2 col-xs-12 col-lg-2 widget-left">
                        <svg class="glyph stroked male user"><use xlink:href="#stroked-male-user"></use></svg>
                    </div>
                    <div class="col-sm-9 col-md-10 col-xs-12 col-lg-10 widget-right" style="padding:0 0 0 10px;">
                        <h4 style="margin-top:5px;">Selamat datang, <?php echo $fullname; ?></h4>
                        <h5>Username : <a href="#"><?php echo $username; ?></a></h5>
                        <h5>Email: <a href="#"><?php echo $email; ?></a></h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12">
            <div class="panel panel-orange panel-widget">
                <div class="row no-padding" style="margin-top: 20px;">
                    <div class="col-sm-3 col-md-4 col-xs-12 col-lg-3 widget-left">
                        <svg class="glyph stroked clock"><use xlink:href="#stroked-clock"/></svg>
                    </div>
                    <div class="col-sm-9 col-md-8 col-xs-12 col-lg-9 widget-right" style="padding:0 0 0 10px;">

                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('d-m-Y');
                        switch (date('l')) {
                            case 'Monday':$today = "Senin";
                                break;
                            case 'Tuesday':$today = "Selasa";
                                break;
                            case 'Wednesday':$today = "Rabu";
                                break;
                            case 'Thursday':$today = "Kamis";
                                break;
                            case 'Friday':$today = "Jum'at";
                                break;
                            case 'Saturday':$today = "Sabtu";
                                break;
                            case 'Sunday':$today = "minggu";
                                break;
                        }

                        $waktu = date('h:i:s a');
                        $a = date('h');
                        $m = date('a');
                        if (($a >= 3) && ($a <= 11) && ($m == 'am')) {
                            $say = "Selamat Siang";
                        } else if (($a >= 1) && ($a <= 11) && ($m == 'pm')) {
                            $say = "Selamat Siang";
                        } else if (($a > 11) && ($a <= 15)) {
                            $say = "Selamat Siang !!";
                        } else if (($a >= 3) && ($a <= 6) && ($m == 'pm')) {
                            $say = "Selamat Sore";
                        } else if (($a > 15) && ($a <= 18)) {
                            $say = "Selamat Sore !!";
                        } else {
                            $say = "Selamat Malam";
                        }
                        ?>
                        <h4 style="color:green;"><?php echo $say; ?> </h4>
                        <h5 style=""><?php echo $today . ", " . $tgl; ?> </h5>
                        <h5 style="margin-top:-2px;" id="time-part"></h5>
                    </div>

                </div>
            </div>
        </div>

    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="quick-tips-body">
                    <div class="col-md-12" style="color:white;margin-top:15px;margin-left:-40px;font-size:20px;">Quick Tips!</div>
                    <div class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><a href="#"><svg class="glyph stroked male user" style="margin-bottom: -20px;"><use xlink:href="#stroked-male-user"/></svg><p>input penyedia</p></a></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><a href="#"><svg class="glyph stroked clipboard with paper" style="margin-bottom: -20px;"><use xlink:href="#stroked-clipboard-with-paper"/></svg><p>input Inventaris</p></a></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><a href="#"><svg class="glyph stroked table" style="margin-bottom: -20px;"><use xlink:href="#stroked-table"/></svg><p>input Transaksi</p></a></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><svg class="glyph stroked chevron right"><use xlink:href="#stroked-chevron-right"/></svg></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"><a href="#"><svg class="glyph stroked download" style="margin-bottom: -20px;"><use xlink:href="#stroked-download"/></svg><p>Export Data ke Ms.Excel</p></a></div>
                    <div class="col-md-2 col-sm-2 col-xs-2"></div>
                    <div class="col-md-1 col-sm-1 col-xs-1"></div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Data Barang Terbaru</div>
                <div class="panel-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Harga</th>
                                <th>Tanggal ditambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($barangbaru as $bbr) {
                                ?>
                            <td><?php echo $bbr->namaBarang; ?></td>
                            <td><?php echo $bbr->harga; ?></td>
                            <td><?php echo $bbr->tanggal; ?></td>

                            </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4 ">

            <div class="panel panel-orange">
                <div class="panel-heading dark-overlay"><span style="font-size:20px;"  class="glyphicon glyphicon-warning-sign"></span>Perlu Diketahui!</div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <li class="todo-list-item">
                            <p style="color:black; line-height: 150%;font-style: italic;font-size:12px;">Jika anda menghapus <b>data Penyedia</b>, maka <b>data inventaris</b> dan <b>data transaksi</b> yang berhubungan dengan data tersebut akan otomatis terhapus.<br><br>Untuk mencegah hal tersebut: <br> - pastikan data yang akan dihapus tidak sedang terhubung dengan data lainnya. <br>- Rekomendasi penghapusan data adalah <b>Data Transaksi</b> &#62 <b>Data Inventaris</b> &#62 <b>Data Penyedia</b>.  </p>     
                        </li>
                        <li class="todo-list-item">

                        </li>

                    </ul>
                </div>
            </div> <!-- endPanel blue -->

            <div class="panel panel-blue">
                <div class="panel-heading dark-overlay"><svg class="glyph stroked clipboard-with-paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg>Total Data yang Tersimpan</div>
                <div class="panel-body">
                    <ul class="todo-list">
                        <li class="todo-list-item">

                            <label>Data Penyedia</label>
                            <div class="pull-right action-buttons">
                                <?php
                                $query = $this->db->query('SELECT * FROM penyedia_t');
                                echo $query->num_rows();
                                ?>
                            </div>
                        </li>
                        <li class="todo-list-item">
                            <label>Data Inventaris</label>
                            <div class="pull-right action-buttons">
                                <?php
                                $query = $this->db->query('SELECT * FROM inventory_t');
                                echo $query->num_rows();
                                ?>
                            </div>
                        </li>
                        <!--                        <li class="todo-list-item">
                                                    <label for="checkbox">Data Transaksi</label>
                                                    <div class="pull-right action-buttons">
                        <?php
                        $query = $this->db->query('SELECT * FROM transaksi_t');
                        echo $query->num_rows();
                        ?>    
                                                    </div>
                                                </li>-->
                        <li class="todo-list-item">
                            <label>Data User</label>
                            <div class="pull-right action-buttons">
                                <?php
                                $query = $this->db->query('SELECT * FROM user_t');
                                echo $query->num_rows();
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> <!-- endPanel blue -->
        </div>

    </div> <!-- endrow -->

    <?php include("template/footer.php"); ?>

