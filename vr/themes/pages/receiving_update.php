  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Item Receiving
        <small>Update Item Receiving</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Item Receiving</a></li>
        <li class="active"><a href="#">Update Item Receiving</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Item Receiving</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-approved" action="<?php echo site_url('receiving/receiving_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Vendor" class="col-sm-2 control-label">Receiving Type</label>

                  <div class="col-sm-10">
					<select name="rtype" class="form-control" disabled><?php echo __get_receiving_type($detail[0] -> rtype,2); ?></select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Vendor" class="col-sm-2 control-label">Vendor / Request</label>

                  <div class="col-sm-10">
                        <span id="bp"></span>
                  </div>
                </div>
                <div class="form-group">
                  <label for="DatePicker" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="waktu" class="form-control" value="<?php echo date('d/m/Y',$detail[0] -> rdate)?>" autocomplete="off" id="DatePicker" placeholder="Date Receiving">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Doc No.</label>

                  <div class="col-sm-10">
                    <input type="text" name="docno" class="form-control" id="inputEmail3" value="<?php echo $detail[0] -> rdocno; ?>" placeholder="Doc No.">
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
                <a href="<?php echo site_url('receiving/receiving_list_products/2/' . $id); ?>" id="AddProduct" class="btn bg-green">Add Product</a>
                &nbsp;
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
                <button type="button" class="btn btn-danger pull-right" style="margin-right:3px" id="approved">Approved</button>
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
	$('div#Products').load('<?php echo site_url('receiving/receiving_products/' . $id); ?>/<?php echo $detail[0] -> rtype; ?>');
	$("#AddProduct").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Products').load('<?php echo site_url('receiving/receiving_products/' . $id); ?>/<?php echo $detail[0] -> rtype; ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Products').load('<?php echo site_url('receiving/receiving_products/' . $id); ?>/<?php echo $detail[0] -> rtype; ?>');
		$.fancybox.originalClose();
	}
	
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
})
$(function(){
	$('select[name="rtype"]').change(function(){
		$('span#bp').load('<?php echo site_url('receiving/receiving_types'); ?>/'+$(this).val()+'/<?php echo $detail[0] -> rvendor; ?>');
		if ($(this).val() == 1) {
			$('#AddProduct').show();
			$('input[name="docno"]').val('');
		}
		else {
			$('#AddProduct').hide();
		}
	});
	$('select[name="rtype"]').change();
	
	$( document ).ajaxComplete(function() {
		$('select[name="vendor"]').change(function(){
			if ($('select[name="rtype"] option:selected').val() == 2) {
				$('div#Products').load('<?php echo site_url('receiving/request_products/'); ?>' + $(this).val());
				$('input[name="docno"]').val($('option:selected', this).text());
			}
		});
	});
	$('select[name="vendor"]').change(function(){
		if ($('select[name="rtype"] option:selected', this) == 2) {
			$('div#Products').load('<?php echo site_url('receiving/request_products/'); ?>' + $(this).val());
			$('input[name="docno"]').val($('option:selected', this).text());
		}
	});
});
</script>
