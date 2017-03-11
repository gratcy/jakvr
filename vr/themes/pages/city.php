  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        City
        <small>City</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">City</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">City</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('CityExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('city/city_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add City</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Country</th>
                  <th>Province</th>
                  <th>City</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($city as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> country; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo __get_status($v -> cstatus,1); ?></td>
                  <td>
			<?php if (__get_roles('CityExecute')) : ?>
					<a href="<?php echo site_url('city/city_update/' . $v -> cid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('city/city_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Country</th>
                  <th>Province</th>
                  <th>City</th>
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
