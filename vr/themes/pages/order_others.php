  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Order KoekMuraH
        <small>Order KoekMuraH</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Order KoekMuraH</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order KoekMuraH</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('OrderExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('order_others/order_others_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Order</a>
			</h3>
            <?php endif; ?>
            </div>
            <form action="<?php echo site_url('order_others/order_others_approved_all'); ?>" name="approvedAll" method="post">
              <table id="orderOthers" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="checkAll"></th>
                  <th>Date</th>
                  <th>Transcation Code</th>
                  <th>Price Base</th>
                  <th>Reffer</th>
                  <th>Invoice</th>
                  <th>Customer</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Netto</th>
                  <?php endif; ?>
                  <th>Resi</th>
                  <th>Note</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Date</th>
                  <th>Transcation Code</th>
                  <th>Price Base</th>
                  <th>Reffer</th>
                  <th>Invoice</th>
                  <th>Customer</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Netto</th>
                  <?php endif; ?>
                  <th>Resi</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
			<?php if (__get_roles('OrderApproved')) : ?>
		    <h3 class="box-title">
			<a class="btn btn-default submit-approved"><i class="fa fa-hand-o-up"></i> Approved All</a>
			</h3>
            <?php endif; ?>
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

<script type="text/javascript">
$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
$( document ).ajaxComplete(function() {
	$('.tresi').click(function(){
		if ($(this).html() == 'Resi') return false;
		var rR = $(this);
		var valR = $(this).html();
		var idnya = $(this).attr('idnya');
		var patt = /tinputresi/i;
		if (patt.test(valR)) {
			
		}
		else {
			$(this).html('<input class="tinputresi form-control" style="width:150px" type="text" name="tresi['+$(this).attr('idnya')+']" value="'+valR+'">');
			$(".tinputresi", this).keyup(function(event){
				var uResi = $(this).val();
				if(event.keyCode == 13){
					$.post('<?php echo site_url('order_others/order_others_update_resi'); ?>/'+idnya, {tresi: $(this).val(), idnya: idnya}).done(function(res) {
						if (res == -1) {
							rR.html(uResi);
						}
					});
				}
			});
		}
	});

	$('.tdesc').click(function(){
		if ($(this).html() == 'Note') return false;
		var rR = $(this);
		var valR = $(this).html();
		var idnya = $(this).attr('idnya');
		var patt = /tinputdesc/i;
		if (patt.test(valR)) {
			
		}
		else {
			$(this).html('<input class="tinputdesc form-control" style="width:150px" type="text" name="tdesc['+$(this).attr('idnya')+']" value="'+valR+'">');
			$(".tinputdesc", this).keyup(function(event){
				var uDesc = $(this).val();
				if(event.keyCode == 13){
					$.post('<?php echo site_url('order_others/order_others_update_one'); ?>/'+idnya, {value: $(this).val(), idnya: idnya, type: 1}).done(function(res) {
						if (res == -1) {
							rR.html(uDesc);
						}
					});
				}
			});
		}
	});
});

$('.submit-approved').click(function(){
	$('form[name="approvedAll"]').submit();
});
</script>
