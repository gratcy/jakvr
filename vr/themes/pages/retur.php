  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales &amp; Purchase JakVR
        <small>Return</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Return Order</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Return Order JakVR</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('ReturnExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('retur/retur_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> New Return Order</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bretured table-striped">
                <thead>
                <tr>
                  <th>Return No.</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Reffer</th>
                  <th>QTY</th>
                  <th>Total</th>
                  <th>Description</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($retur as $k => $v) :
				$createdby = json_decode($v -> tcreatedby, true);
				$approvedby = json_decode($v -> tapprovedby, true);
				?>
                <tr>
                  <td><?php echo $v -> tno; ?> <br /> (<?php echo __get_transaction_type($v -> ttype,1); ?>)</td>
                  <td><?php echo __get_date($v -> tdate,6); ?></td>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> reffer; ?></td>
                  <td><?php echo $v -> tqty; ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> ttotal,1); ?></td>
                  <td><?php echo $v -> tdesc; ?></td>
                  <td><?php echo $createdby['unick']; ?></td>
                  <td><?php echo ($v -> tstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> tstatus,1)); ?></td>
                  <td>
					<a href="javascript:void(0);" onclick="print_data('<?php echo site_url('retur/faktur/' . $v -> tid); ?>');"><i class="fa fa-print"></i></a>
					  <?php if ($v -> tstatus == 3) : ?>
					<a href="<?php echo site_url('retur/retur_detail/' . $v -> tid); ?>"><i class="fa fa-check"></i></a>
					  <?php else: ?>
			<?php if (__get_roles('ReturnExecute')) : ?>
					<a href="<?php echo site_url('retur/retur_update/' . $v -> tid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('retur/retur_delete/' . $v -> tid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
					<?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Retur No.</th>
                  <th>Date</th>
                  <th>Customer</th>
                  <th>Reffer</th>
                  <th>QTY</th>
                  <th>Total</th>
                  <th>Description</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
