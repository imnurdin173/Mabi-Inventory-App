<?php $page_title = "Setting";$page = basename($_SERVER["PHP_SELF"]); $subpage = "pengaturandasar"; include("template/header.php"); ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">			
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
				<li class="active"><?php echo $page_title;?></li>
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
					<div class="panel-heading">Manage Account
                                        </div>
					<div class="panel-body">
						<div class="col-md-6">
                                                    <form role="form" method="post" action="<?php echo site_url('setting/update')?>">
							
								<div class="form-group">
									<label>Input Old Password</label>
                                                                        <input type="password"  class="form-control" name="oldPass" placeholder="">
								</div>
								<div class="form-group">
									<label>Input New Password</label>
                                                                        <input type="password" class="form-control" name="password" placeholder="">
								</div>																
								<div class="form-group">
									<label>Re-type new password</label>
                                                                        <input type="password" class="form-control" name="renewPass" placeholder="">
								</div>
								
								<button type="submit" class="btn btn-primary">Submit</button>
								<button type="reset" class="btn btn-default">Reset</button>
							
                                                        </form>
                                                    <?php
                                                    if(validation_errors()){
                                                    ?>
                                                    <div class="alert alert-danger alert-dismissible" role="alert">
                                                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                      <strong><?php echo validation_errors(); ?></strong>
                                                    </div>
                                                    <?php } ?>
                                                    <?php
                                                      if($this->session->flashdata('msg')) {
                                                    ?> 
                                                      <div class="alert alert-success alert-dismissible" role="alert">
                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button> 
                                                          <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                                      </div>
                                                      <?php } ?>
                                                    </div>
					</div>
				</div>
			</div><!-- /.col-->
		</div><!--/.row-->
		
		
	</div>	<!--/.main-->


<?php include("template/footer.php");?>



