  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/skins/_all-skins.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/chosen/chosen.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('plugins/iCheck/flat/blue.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/morris/morris.css'); ?>">
  <!-- jvectormap -->
  <script type="text/javascript" src="<?php echo themes_url('plugins/jQuery/jquery.min.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo themes_url('plugins/chosen/chosen.jquery.min.js'); ?>"></script>
<style>
.chosen-container { width: 100%!important; }
</style>
  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('customer/customer_quick_add'); ?>" method="post">
            <input type="hidden" id="lastid" name="lastid" value="<?php echo $lastid; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Customer Type</label>
                  <div class="col-sm-10">
					<?php echo __get_customer_type(1,2); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Customer</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Customer Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone" placeholder="Phone I">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone2" placeholder="Phone II">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="addr" class="form-control" id="Address" placeholder="Address"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="Email" placeholder="Email Customer">
                  </div>
                </div>
                <div style="display:none" class="show-more">
                <div class="form-group">
                  <label for="Country" class="col-sm-2 control-label">Country</label>

                  <div class="col-sm-10">
					  <select name="country" class="form-control" id="Country">
                    <?php echo $country; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Province" class="col-sm-2 control-label">Province</label>

                  <div class="col-sm-10">
					<select name="province" class="form-control" id="Province">
						  
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="City" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
					<select name="city" class="form-control" id="City">
						  
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status(1,2); ?>
                  </div>
                  </div>
                </div>
</div>
                  <div class="col-sm-12">
			<p style="text-align:center;margin:0 auto">
			<span class="pull-right-container show-hide" style="cursor:pointer">
				view more <br />
              <i class="fa fa-angle-down cursornya"></i> 
            </span>
            </p>
              </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" class="btn btn-default close-cancel">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
<script type="text/javascript">
$('document').ready(function(){
	$('.close-cancel').click(function(){
		parent.jQuery.fancybox.close()
	});
	$( ".show-hide" ).click(function(){
		$('.show-more').slideToggle( "slow", function() {
			$("#Country").chosen({ width:"95%" });
			if($(".show-more").is(":hidden")) {
				$('.cursornya').addClass('fa-angle-down');
				$('.cursornya').removeClass('fa-angle-up');
			}
			else {
				$('.cursornya').removeClass('fa-angle-down');
				$('.cursornya').addClass('fa-angle-up');
			}
		})
	})
})
</script>
