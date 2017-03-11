  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users Group
        <small>Group</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Users Group</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users Group</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('users/users_group_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Users Group</a>
			</h3>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th>Group Name</th>
				  <th>Description</th>
				  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				  <?php foreach($group as $k => $v) : ?>
				<tr>
				  <td><?php echo $v -> uname; ?></td>
				  <td><?php echo $v -> udesc; ?></td>
				  <td><?php echo __get_status($v -> ustatus,1); ?></td>
				  <td>
					 <?php if ($v -> uid <> 1) : ?>
					  <a href="<?php echo site_url('users/users_group_update/' . $v -> uid); ?>"><i class="fa fa-pencil"></i></a>
					  <a href="<?php echo site_url('users/users_group_delete/' . $v -> uid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
					  <?php endif; ?>
				  </td>
				</tr>
				<?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Group Name</th>
                  <th>Description</th>
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
