  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Stock
        <small>Stock</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Report Stock</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
						<form action="<?php echo site_url('reportstock'); ?>" method="post" class="form-horizontal" target="_blank">
                        <div class="col-xs-6">
                                        <div class="form-group">
                                            <label>Format:</label><br>
                                            Print <input name="format" checked type="radio" value="1">
                                            Excel <input name="format" type="radio" value="2">
                                        </div>
                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datesort" name="datesort" autocomplete="off" value="<?php echo $from . ' - ' . $to; ?>" />
                                        </div><!-- /.input group -->
                                    </div><!-- /.form group -->
                                        <div class="form-group">
                                            <label>Product:</label>
											<select id="product" multiple data-placeholder="Choose Product" class="form-control" name="pid[]">
												<?php echo $products; ?>
                                            </select>
                                        </div>
                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
										<button class="btn btn-default" type="button" onclick="location.href='javascript:history.go(-1);'">Back</button>
                                    </div>
						</div>
						</form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
$('input[name="type[]"]').click(function(){
	if ($(this).prop('checked') && $(this).val() == 3) {
		$('input[name="type[]"]').prop('checked', true);
	}
	if ($(this).prop('checked') == false && $(this).val() == 3) {
		$('input[name="type[]"]').prop('checked', false);
	}
});
</script>
