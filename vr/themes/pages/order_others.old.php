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
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
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
                  <th>Note</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($order_others as $k => $v) :
				$createdby = json_decode($v -> tcreatedby, true);
				$approvedby = json_decode($v -> tapprovedby, true);
				?>
                <tr>
                  <td>
					  <?php if ($v -> tstatus != 3 && $v -> tstatus == 1) : ?>
					  <input type="checkbox" value="<?php echo $v -> tid; ?>" name="apv[]">
					  <?php endif; ?>
                  </td>
                  <td><?php echo __get_date($v -> tdate,3); ?></td>
                  <td><?php echo $v -> tcode; ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> tpricebase,1); ?></td>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> tinv; ?></td>
                  <td><?php echo $v -> tname; ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> tprice,1); ?></td>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <td><?php echo __get_rupiah(($v -> tprice-$v -> tpricebase)-$v -> tdiscount,1); ?></td>
                  <?php endif; ?>
                  <td class="tresi" idnya="<?php echo $v -> tid; ?>"><?php echo $v -> tresi; ?></td>
                  <td class="tdesc" idnya="<?php echo $v -> tid; ?>"><?php echo $v -> tdesc; ?></td>
                  <td><?php echo $createdby['unick']; ?> <br /> (<?php echo ($v -> tstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> tstatus,1)); ?>)</td>
                  <td>
			<?php if (__get_roles('OrderExecute')) : ?>
					  <?php if ($v -> tstatus != 3) : ?>
				<?php if (__get_roles('OrderApproved')) : ?>
					<a href="<?php echo site_url('order_others/order_others_approved/' . $v -> tid); ?>"><i class="fa fa-hand-o-up"></i></a>
					<?php endif; ?>
					<a href="<?php echo site_url('order_others/order_others_update/' . $v -> tid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('order_others/order_others_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
					<?php else: ?>
					<a href="#"><i class="fa fa-check"></i></a>
					<?php endif; ?>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
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
$('.tresi').click(function(){
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

$('.submit-approved').click(function(){
	$('form[name="approvedAll"]').submit();
});
</script>
