  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distribution
        <small>Request</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Request</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Distribution Request</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('DistributionRequestExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('request/request_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Request</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Request No.</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Description</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php
				foreach($request as $k => $v) :
				$createdby = json_decode($v -> rcreatedby, true);
				$approvedby = json_decode($v -> rapprovedby, true);
				?>
                <tr>
                  <td><?php echo __get_date($v -> rdate,1); ?></td>
                  <td><?php echo $v -> rno; ?></td>
                  <td><?php echo $v -> bfrom; ?></td>
                  <td><?php echo $v -> bto; ?></td>
                  <td><?php echo $v -> rdesc; ?></td>
                  <td><?php echo $createdby['unick']; ?></td>
                  <td><?php echo ($v -> rstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> rstatus,1)); ?></td>
                  <td>
					<?php if ($v -> rstatus != 3) : ?>
			<?php if (__get_roles('DistributionRequestExecute')) : ?>
					<a href="<?php echo site_url('request/request_update/' . $v -> rid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('request/request_delete/' . $v -> rid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
					<?php else : ?>
					<a href="<?php echo site_url('request/request_detail/' . $v -> rid); ?>"><i class="fa fa-check"></i></a>
					<?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Request No.</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Description</th>
                  <th>Created By</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
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
