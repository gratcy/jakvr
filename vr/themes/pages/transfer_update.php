  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distribution
        <small>Update Transfer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Transfer</a></li>
        <li class="active"><a href="#">Update Transfer</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Transfer</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-approved" action="<?php echo site_url('transfer/transfer_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Rno" class="col-sm-2 control-label">Request</label>
                  <div class="col-sm-10">
					  <select name="rno" class="form-control" id="Rno">
                    <?php echo $rno; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Description"><?php echo $detail[0] -> tdesc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> tstatus,2); ?>
                  </div>
                  </div>
                </div>

				<div id="Products"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                &nbsp;
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
				<?php if (__get_roles('DistributionTransferApproved')) : ?>
                <button type="button" class="btn btn-danger pull-right" style="margin-right:3px" id="approved">Approved</button>
                <?php endif; ?>
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

<script>
$(document).ready(function(){
	$('#Rno').change(function(){
		$('div#Products').load('<?php echo site_url('request/request_products/'); ?>' + $(this).val());
	});
	$('#Rno').change();
	
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
});
</script>
