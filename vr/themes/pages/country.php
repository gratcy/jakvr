  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Country
        <small>Country</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Country</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Country</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('CountryExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('country/country_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Country</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Code</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($country as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> ccode; ?></td>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo __get_status($v -> cstatus,1); ?></td>
                  <td>
			<?php if (__get_roles('CountryExecute')) : ?>
					<a href="<?php echo site_url('country/country_update/' . $v -> cid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('country/country_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Code</th>
                  <th>Country</th>
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
