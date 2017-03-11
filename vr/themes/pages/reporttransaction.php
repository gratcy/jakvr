  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Transaction
        <small>Transaction</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Report Transaction</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Transaction</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
						<form action="<?php echo site_url('reporttransaction'); ?>" method="post" class="form-horizontal" target="_blank">
                        <div class="col-xs-12">
                <div class="form-group">
					<div class="col-xs-6">
                  <label>Branch</label><br>
					 <?php echo __get_branch($this -> privileges -> sesresult['ubid'],3); ?>
                </div>
					<div class="col-xs-6">
                  <label>Transaction Format</label><br>
					 <?php echo __get_transaction_type(0,2,2); ?>
                </div>
                </div>
                <div class="form-group">
					<div class="col-xs-6">
				<label>Transaction Type:</label><br>
				<input name="type[]" type="checkbox" value="4" /> All <br>
				<input name="type[]" type="checkbox" value="0" checked> Purchase Order (JakVR) <br>
				<input name="type[]" type="checkbox" value="3"> Purchase Order (KoekMuraH) <br>
                </div>
					<div class="col-xs-6"><br>
				<input name="type[]" type="checkbox" value="1"> Retur Order <br>
				<input name="type[]" type="checkbox" value="2"> Receiving <br>
                </div>
                </div>
                <div class="form-group">
					<div class="col-xs-6">
                  <label>User</label>
					  <select name="user[]" multiple class="form-control" id="User">
                    <?php echo $user; ?>
                    </select>
                    </div>
					<div class="col-xs-6">
                  <label>Reffer</label>
					  <select name="reffer[]" multiple class="form-control" id="Reffer">
                    <?php echo $reffer; ?>
                    </select>
                    </div>
                </div>
                <div class="form-group" >
											<div class="col-xs-6">
                    <label>Approval</label>
						<select class="form-control" name="approval">
						<option value=2 >All</option>
						<option value=1 >Yes</option>
						<option value=0 >No</option>
						</select>
                </div>
											<div class="col-xs-6">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datesort" name="datesort" autocomplete="off" value="<?php echo $from . ' - ' . $to; ?>" />
                                        </div>
                                        </div>
                                        </div>
                                        <!-- /.input group -->
                                        <div class="form-group">
											<div class="col-xs-6">
                                            <label>Report Type:</label><br>
                                            All <input name="rtype" checked type="radio" value="1">
                                            Grouping Transaction <input name="rtype" type="radio" value="2">
                                            Grouping User <input name="rtype" type="radio" value="3">
                                        </div>
											<div class="col-xs-6">
                                            <label>Format:</label><br>
                                            Print <input name="format" checked type="radio" value="1">
                                            Excel <input name="format" type="radio" value="2">
                                        </div>
                                        </div>
                                        <div class="form-group">
											<div class="col-xs-6">
                                            <label>Product:</label>
											<select id="product" multiple data-placeholder="Choose Product" class="form-control" name="pid[]">
												<?php echo $products; ?>
                                            </select>
											</div>
											<div class="col-xs-6">
                                            <label>Customer:</label>
											<select id="customer" multiple data-placeholder="Choose Customer" class="form-control" name="cid[]">
												<?php echo $customers; ?>
                                            </select>
                                        </div>
                                        </div>
										<?php if (__get_roles('ProductPriceBase')) : ?>
                                        <div class="form-group">
											<div class="col-xs-6">
                                            <label>Commission (Netto more than):</label>
                                            <input type="text" id="netto" style="text-align:right" placeholder="Filter Netto" class="form-control" name="netto">
											</div>
                                        </div>
                                        <?php endif; ?>
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
	if ($(this).prop('checked') && $(this).val() == 4) {
		$('input[name="type[]"]').prop('checked', true);
	}
	if ($(this).prop('checked') == false && $(this).val() == 4) {
		$('input[name="type[]"]').prop('checked', false);
	}
});
</script>
