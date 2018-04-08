<?php $page_title = "Data Tabel Transaksi";$page = basename($_SERVER["PHP_SELF"]); include("template/header.php"); ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"></use></svg></a></li>
				<li><a href="#">Transaksi</a></li>
                                <li class="active"><a href="#"><?php echo $page_title;?></a></li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header"><?php echo $page_title;?></h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-heading">Tabel data Transaksi
                                        <button type="submit" class="btn btn-default pull-right" style="margin:0 4px 0 4px;" onclick="location.href='<?php echo base_url('index.php/data_transaksi')?>'">Lihat Tabel</button>
                                        <button type="submit" class="btn btn-success pull-right" style="margin:0 4px 0 4px;" onclick="location.href='<?php echo base_url('index.php/input_transaksi')?>'">Tambah Data</button>
                                        </div>
                                    
					<div class="panel-body">
               <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>idBarang</th>
                  <th>Nama Barang</th>
                  <th>Harga Barang</th>
                  <th>Penyedia</th>
                  <th>Jumlah</th>
                  <th>Disc (%) </th>
                  <th>Harga Total</th>
                  <th>Operation</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                    $cekcek=0;
                      foreach ($transaksi as $as) {
                  ?>
                      <tr>
                        <td><?php echo $as->idBarang; ?></td>
                        <td><?php echo $as->namaBarang; ?></td>
                        <td>Rp. <?php echo $as->harga; ?></td>
                        <td><?php echo $as->namaPenyedia; ?></td>
                        <td><?php echo $as->quantity; ?></td>
                        <td><?php echo $as->discount;?></td>
                        <td><?php $h_total = ($as->harga * $as->quantity)-($as->harga*($as->discount / 100)); echo $h_total; ?></td>
                        
                        <td>
                            <!--<a href="data_transaksi/edit/<?php echo $as->idBarang; ?>" class="btn btn-primary btn-xs">Ubah</a>
                            --><a href="data_transaksi/remove/<?php echo $as->idBarang; ?>" class="btn btn-danger btn-xs">Hapus</a>
                            
                        </td>
                      </tr>
                   <?php
                      $cekcek = $cekcek + $h_total;
                      }
                      ?>
                </tbody>
              </table>
                   <div class="pull-right">
                        <!--<button type="submit" class="btn btn-info" data-balloon="Simpan" data-balloon-pos="up"><span class="glyphicon glyphicon-save"></span></button>-->
                        <button type="submit" class="btn btn-danger" data-balloon="Bersihkan Tabel" data-balloon-pos="up" onclick="location.href='<?php echo base_url('index.php/data_transaksi/truncate_tabel')?>'"><span class="glyphicon glyphicon-trash"></span></button>
                        <button type="submit" class="btn btn-primary" data-balloon="Export ke Excel" data-balloon-pos="up " onclick="location.href='<?php echo base_url('index.php/data_transaksi/export')?>'"><span class="glyphicon glyphicon-export"></span></button>
                    </div>
                   <div class="panel-heading"></div>
              <h3 class="box-title pull-right">Total :
                          <span class="label label-warning" style="font-size:24px;"> Rp. <?php echo number_format($cekcek) ?> </span> </h3>
            </div>
            <!-- /.box-body -->
                                        </div>
                                </div>
                        </div>
	</div>	<!--/.main-->


<?php include("template/footer.php");?>


        