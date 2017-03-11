  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor
        <small>Vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Vendor</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Vendor</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('vendor/vendor_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add vendor</a>
			</h3>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($vendor as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> vname; ?></td>
                  <td><?php echo $v -> vaddr . ', ' . $v -> cname . ', ' . $v -> pname . ', ' . $v -> city; ?></td>
                  <td><?php echo str_replace('*',' / ', $v -> vphone); ?></td>
                  <td><?php echo __get_status($v -> vstatus,1); ?></td>
                  <td>
					<a href="<?php echo site_url('vendor/vendor_update/' . $v -> vid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('vendor/vendor_delete/' . $v -> vid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
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
