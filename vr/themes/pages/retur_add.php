  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Return JakVR
        <small>New Return Order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Return</a></li>
        <li class="active"><a href="#">New Return Order</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-bretur">
              <h3 class="box-title">New Return Order</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('retur/retur_add'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Transaction Type</label>

                  <div class="col-sm-10">
					 <?php echo __get_transaction_type(1,2); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="dateorder" class="form-control" id="DateTimePicker" placeholder="Date Order" value="<?php echo date('d/m/Y H:i');?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Customer</label>

                  <div class="col-sm-10">
					  <select name="customer" class="form-control" id="Customer">
                    <?php echo $customer; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group reffer">
                  <label for="Reffer" class="col-sm-2 control-label">Reffer</label>

                  <div class="col-sm-10">
					  <select name="reffer" class="form-control" id="Reffer">
                    <?php echo $reffer; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status(0,2); ?>
                  </div>
                  </div>
                </div>

				<hr />
				<div id="Products"></div>
				<hr />
				<br />
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                &nbsp;
                <a href="<?php echo site_url('retur/retur_list_products/1'); ?>" id="AddProduct" class="btn bg-green">Add Product</a>
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

<script>
$( document ).ajaxComplete(function() {
	$('input[type="number"]').bind('change click keypress keyup',function(){
		var total = 0;
		$('.qtyproduct').each(function(key, val) {
			total += parseInt($(val).val()) * parseInt($(val).attr('data-price'));
		});
		$('.totalpriceproduct').html(hood_price(total, 0));
	});
});
$(document).ready(function(){
	$('input[name="ttype"]').click(function(){
		if ($(this).prop('checked') == true && $(this).val() == 0) $('.reffer').hide();
		else $('.reffer').show();
		
		$("#Reffer").trigger("chosen:updated");
		$(".chosen-container").css("width","100%");
	});
	
	$('div#Products').load('<?php echo site_url('retur/retur_products'); ?>');
	$("#AddProduct").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	
	$('a#fancybox-close').click(function(){
		$('div#Products').load('<?php echo site_url('retur/retur_products'); ?>');
	});
	
	$.fancybox.originalClose = $.fancybox.close;
	$.fancybox.close = function() {
		$('div#Products').load('<?php echo site_url('retur/retur_products'); ?>');
		$.fancybox.originalClose();
	}
});
</script>
