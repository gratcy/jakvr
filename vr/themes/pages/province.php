  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Province
        <small>Province</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Province</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Province</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('province/province_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Province</a>
			</h3>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Country</th>
                  <th>Province</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($province as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo __get_status($v -> pstatus,1); ?></td>
                  <td>
					<a href="<?php echo site_url('province/province_update/' . $v -> pid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('province/province_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Country</th>
                  <th>Province</th>
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
