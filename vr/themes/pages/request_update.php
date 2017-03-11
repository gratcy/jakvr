  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distribution
        <small>Update Request</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Request</a></li>
        <li class="active"><a href="#">Update Request</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Request</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-approved" action="<?php echo site_url('request/request_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="BranchFrom" class="col-sm-2 control-label">From</label>
                  <div class="col-sm-3">
					  <select name="bfrom" class="form-control" id="BranchFrom" disabled>
                    <?php echo $bfrom; ?>
                    </select>
                  </div>
                  <label for="BranchTo" class="col-sm-2 control-label">To</label>
                  <div class="col-sm-3">
					  <select name="bto" class="form-control" id="BranchTo">
                    <?php echo $bto; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Description"><?php echo $detail[0] -> rdesc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> rstatus,2); ?>
                  </div>
                  </div>
                </div>

				<div id="Products"></div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                &nbsp;
                <a href="<?php echo site_url('request/request_list_products/2/' . $id); ?>" id="AddProduct" class="btn bg-green">Add Product</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
				<?php if (__get_roles('DistributionRequestApproved')) : ?>
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
	$('div#Products').load('<?php echo site_url('request/request_products/' . $id); ?>');
	$("#AddProduct").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Products').load('<?php echo site_url('request/request_products/' . $id); ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Products').load('<?php echo site_url('request/request_products/' . $id); ?>');
		$.fancybox.originalClose();
	}
	
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
});
</script>
