<style>
.chosen-container { width: 100%!important; }
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Customers
        <small>Update Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Customers</a></li>
        <li class="active"><a href="#">Update Customer</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Customer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $phone = explode('*',$detail[0] -> cphone); ?>
            <form class="form-horizontal" action="<?php echo site_url('customer/customer_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Customer</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Customer Name" value="<?php echo $detail[0] -> cname; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone" placeholder="Phone I" value="<?php echo isset($phone[0]) ? $phone[0] : ''; ?>">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone2" placeholder="Phone II" value="<?php echo isset($phone[1]) ? $phone[1] : ''; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" name="email" class="form-control" id="Email" placeholder="Email Customer" value="<?php echo $detail[0] -> cemail; ?>">
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
                    <?php echo $province; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="City" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
					<select name="city" class="form-control" id="City">
                    <?php echo $city; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="addr" class="form-control" id="Address" placeholder="Address"><?php echo $detail[0] -> caddr; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Customer Type</label>
                  <div class="col-sm-10">
					<?php echo __get_customer_type($detail[0] -> ctype,2); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> cstatus,2); ?>
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
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
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
</div>

<script type="text/javascript">
$('document').ready(function(){
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
	});
	
	<?php if ($detail[0] -> caddr != '') : ?>
	$( ".show-hide" ).click();
	<?php endif;?>
})
</script>
