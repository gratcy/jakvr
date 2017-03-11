  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Brands
        <small>Brands</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Brands</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Brands</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('BrandExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('brand/brand_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Brand</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Brand</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($brand as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> bdesc; ?></td>
                  <td><?php echo __get_status($v -> bstatus,1); ?></td>
                  <td>
			<?php if (__get_roles('BrandExecute')) : ?>
					<a href="<?php echo site_url('brand/brand_update/' . $v -> bid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('brand/brand_delete/' . $v -> bid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Brand</th>
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
