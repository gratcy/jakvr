  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Branches
        <small>Branch</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Branch</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Branch</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('BrandExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('branch/branch_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Branch</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Branch</th>
                  <th>Country</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($branch as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> country; ?></td>
                  <td><?php echo $v -> baddr. ', '. $v -> province . ', ' . $v -> city; ?></td>
                  <td><?php echo str_replace('*',' / ',$v -> bphone); ?></td>
                  <td><?php echo __get_status($v -> bstatus,1); ?></td>
                  <td>
			<?php if (__get_roles('BrandExecute')) : ?>
					<a href="<?php echo site_url('branch/branch_update/' . $v -> bid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('branch/branch_delete/' . $v -> bid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Branch</th>
                  <th>Country</th>
                  <th>Address</th>
                  <th>Phone</th>
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
