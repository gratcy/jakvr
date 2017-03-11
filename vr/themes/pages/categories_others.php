  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Categories
        <small>Categories</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Categories</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('CategoriesExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('categories_others/categories_others_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Category</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($categories as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> cdesc; ?></td>
                  <td><?php echo __get_status($v -> cstatus,1); ?></td>
                  <td>
			<?php if (__get_roles('CategoriesExecute')) : ?>
					<a href="<?php echo site_url('categories_others/categories_others_update/' . $v -> cid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('categories_others/categories_others_delete/' . $v -> cid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
            <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Category</th>
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
