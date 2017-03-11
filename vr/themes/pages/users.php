  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Users</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('users/users_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add User</a>
			</h3>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
          <th>Group</th>
          <th>Email</th>
          <th>History IP Address</th>
          <th>History Date</th>
          <th>Status</th>
          <th>Action</th>
                </tr>
                </thead>
                <tbody>
		  <?php
		  foreach($users as $k => $v) :
		  $hist = explode('*', $v -> ulastlogin);
		  ?>
                                        <tr>
          <td><?php echo $v -> uname; ?></td>
          <td><?php echo $v -> uemail; ?></td>
          <td><?php echo (isset($hist[0]) && $hist[0] != '' ? long2ip($hist[0]) : ''); ?></td>
          <td><?php echo (isset($hist[1]) && $hist[1] != '' ? __get_date($hist[1],3) : ''); ?></td>
          <td><?php echo __get_status($v -> ustatus,1); ?></td>
											<td>
	<?php if ($v -> uid <> 1) : ?>
              <a href="<?php echo site_url('users/users_update/' . $v -> uid); ?>"><i class="fa fa-pencil"></i></a>
              <a href="<?php echo site_url('users/users_delete/' . $v -> uid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
		<?php endif; ?>
		</td>
										</tr>
        <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
          <th>Group</th>
          <th>Email</th>
          <th>History IP Address</th>
          <th>History Date</th>
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
