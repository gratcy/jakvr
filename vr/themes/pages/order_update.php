  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Order JakVR
        <small>Update Purchase Order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase Order</a></li>
        <li class="active"><a href="#">Update Purchase Order</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Purchase Order - <?php echo $detail[0] -> tno;?></h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-approved form-horizontal" action="<?php echo site_url('order/order_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="TNO" class="col-sm-2 control-label">Order No.</label>

                  <div class="col-sm-10">
					 
                    <input type="text" name="tno" readonly value="<?php echo $detail[0] -> tno;?>" class="form-control" id="TNO" placeholder="Order No.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Transaction Type</label>

                  <div class="col-sm-10">
					 <?php echo __get_transaction_type($detail[0] -> ttype,2); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="dateorder" class="form-control" id="DateTimePicker" placeholder="Date Order" value="<?php echo date('d/m/Y H:i', $detail[0] -> tdate);?>">
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

				<hr />
				<div id="Products"></div>
				<hr />
				<br />
                <div class="form-group">
                  <label for="Discount" class="col-sm-2 control-label">Discount</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo __get_rupiah($detail[0] -> tdiscount,2);?>" autocomplete="off" name="disc" class="form-control" id="Discount" placeholder="Discount">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Discount" class="col-sm-2 control-label">Grand Total</label>

                  <div class="col-sm-10">
                    <input type="text" value="<?php echo __get_rupiah($detail[0] -> ttotal,2);?>" autocomplete="off" name="grandtotal" class="form-control" id="GrandTotal" placeholder="Grand Total">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                &nbsp;
                <a href="<?php echo site_url('order/order_list_products/2/' . $id.'?ctype=1'); ?>" id="AddProduct" class="btn bg-green">Add Product</a>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
				<?php if (__get_roles('OrderApproved')) : ?>
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
$( document ).ajaxComplete(function() {
	$('input[name="disc"]').bind('change keyup', function(){
		var gtotal = $('.totalpriceproduct').html();
		gtotal = gtotal.replace(/(IDR |\.)/g, '');
		var disc = $(this).val();
		disc = disc.replace(/,/g, '');
		$('input[name="grandtotal"]').val(number_format(parseInt(gtotal)-parseInt(disc), 0, '.', ','));
	});
	$('input[type="number"]').bind('change click keypress keyup',function(){
		var total = 0;
		var disc = $('input[name="disc"]').val();
		disc = disc.replace(/,/g, '');
		$('.qtyproduct').each(function(key, val) {
			total += parseInt($(val).val()) * parseInt($(val).attr('data-price'));
		});
			$('.totalpriceproduct').html(hood_price(total, 0));
			$('input[name="grandtotal"]').val(number_format(parseInt(total) - parseInt(disc), 0, '.', ','));
	});
});
$(document).ready(function(){
	$('input[name="ttype"]').click(function(){
		if ($(this).prop('checked') == true && $(this).val() == 0) $('.reffer').hide();
		else $('.reffer').show();
		
		$("#Reffer").trigger("chosen:updated");
		$(".chosen-container").css("width","100%");
	});
	$('input[name="ttype"][value="<?php echo $detail[0] -> ttype; ?>"]').click();
	
	$("#addCustomer").fancybox({
		'width'				: '50%',
		'height'			: '50%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe',
		  tpl : {
        closeBtn : '<a title="Close Add Customer" class="fancybox-item fancybox-close close-add-customer" href="javascript:;"></a>'
		},
	   afterClose : function(){
		   location.reload();
		   //~ console.log($('.fancybox-iframe').attr('src'));
		//~ $('#Customer').val(2);
        //~ $('#Customer').trigger("chosen:updated");
	   }
	});
	
	$("#AddProduct").fancybox({
		'width'				: '75%',
		'height'			: '100%',
		'autoScale'			: false,
		'transitionIn'		: 'none',
		'transitionOut'		: 'none',
		'type'				: 'iframe'
	});
	$.fancybox.originalClose = $.fancybox.close;
	$('#Customer').change(function(){
        var element = $(this).find('option:selected');
        var buyerType = element.attr("ctype");
        if (buyerType == 0) {
			$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=0'); ?>');
			$('a#fancybox-close').click(function(){
				$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=0'); ?>');
			});
			
			$.fancybox.close = function() {
				$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=0'); ?>');
				$.fancybox.originalClose();
			}
		}
		else {
			$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=1'); ?>');
			
			$('a#fancybox-close').click(function(){
				$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=1'); ?>');
			});
			
			$.fancybox.close = function() {
				$('div#Products').load('<?php echo site_url('order/order_products/' . $id.'?ctype=1'); ?>');
				$.fancybox.originalClose();
			}
		}
	});
	$('#Customer').change();
	
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
});
</script>
