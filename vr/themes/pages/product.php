  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
        <small>Products</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Products</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
			<?php if (__get_roles('ProductExecute')) : ?>
		    <h3 class="box-title">
			<a href="<?php echo site_url('product/product_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Product</a>
			</h3>
            <?php endif; ?>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Price Base</th>
                  <?php endif; ?>
                  <th>Price Seller</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($product as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <td class="aprice"><?php echo __get_rupiah($v -> pprice,1); ?></td>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <td class="aprice"><?php echo __get_rupiah($v -> ppricebase,1); ?></td>
                  <?php endif; ?>
                  <td class="aprice"><?php echo __get_rupiah($v -> ppriceseller,1); ?></td>
                  <td><?php echo __get_status($v -> pstatus,1); ?></td>
                  <td>
				  <?php if (__get_roles('ProductExecute')) : ?>
					<a href="<?php echo site_url('product/product_update/' . $v -> pid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('product/product_delete/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
                  <?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Price Base</th>
                  <?php endif; ?>
                  <th>Price Seller</th>
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
