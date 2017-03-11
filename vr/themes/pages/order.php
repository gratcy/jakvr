  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales &amp; Purchase JakVR
        <small>Order</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Purchase Order</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Purchase Order JakVR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('OrderExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('order/order_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> New Purchase Order</a>
			</h3>
            <?php endif; ?>
            </div>
            <form action="<?php echo site_url('order/order_approved_all'); ?>" name="approvedAll" method="post">
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Order No.</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>QTY</th>
                  <th>Ammount</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th>Description</th>
                  <th>Created By</th>
                  <th style="width:70px">Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($order as $k => $v) :
				$createdby = json_decode($v -> tcreatedby, true);
				$approvedby = json_decode($v -> tapprovedby, true);
				?>
                <tr>
                  <td>
					  <?php if ($v -> tstatus != 3 && $v -> tstatus == 1) : ?>
					  <input type="checkbox" value="<?php echo $v -> tid; ?>" name="apv[]">
					  <?php endif; ?>
                  </td>
                  <td><?php echo $v -> tno; ?> <br /> (<?php echo __get_transaction_type($v -> ttype,1); ?>)</td>
                  <td><?php echo __get_date($v -> tdate,6); ?></td>
                  <td><?php echo $v -> cname; ?> <br /> <?php echo $v -> reffer; ?></td>
                  <td><?php echo $v -> tqty; ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> tammount,1); ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> tdiscount,1); ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> ttotal,1); ?></td>
                  <td><?php echo $v -> tdesc; ?></td>
                  <td><?php echo $createdby['unick']; ?> <br /> (<?php echo ($v -> tstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> tstatus,1)); ?>)</td>
                  <td style="text-align:center;margin:0 auto;width:50px">
					<a href="javascript:void(0);" onclick="print_data('<?php echo site_url('order/faktur/' . $v -> tid); ?>');" title="Print Faktur"><i class="fa fa-print"></i></a>
					  <?php if ($v -> tstatus == 3) : ?>
					<a href="<?php echo site_url('order/order_detail/' . $v -> tid); ?>"><i class="fa fa-check"></i></a>
					  <?php else: ?>
					<?php if (__get_roles('OrderExecute')) : ?>
					<?php if (__get_roles('OrderApproved')) : ?>
					<a href="<?php echo site_url('order/order_approved/' . $v -> tid); ?>"><i class="fa fa-hand-o-up"></i></a>
					<?php endif; ?>
					<a href="<?php echo site_url('order/order_update/' . $v -> tid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('order/order_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
					<?php endif; ?>
					<?php endif; ?>
					<a href="javascript:void(0);" onclick="print_data('<?php echo site_url('order/deliveryorder/' . $v -> tid); ?>');" title="Print DO"><i class="fa fa-print"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Order No.</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>QTY</th>
                  <th>Ammount</th>
                  <th>Discount</th>
                  <th>Total</th>
                  <th>Description</th>
                  <th>Created By</th>
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
$('.submit-approved').click(function(){
	$('form[name="approvedAll"]').submit();
});
</script>
