  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/bootstrap.min.css'); ?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/ionicons.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/datatables/dataTables.bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/skins/_all-skins.min.css'); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/iCheck/flat/blue.css'); ?>">
  <!-- Morris chart -->
  <link rel="stylesheet" href="<?php echo themes_url('plugins/morris/morris.css'); ?>">
  <!-- jvectormap -->
  <script type="text/javascript" src="<?php echo themes_url('plugins/jQuery/jquery.min.js'); ?>"></script>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
        <div class="box-body">
	<?php echo __get_error_msg(); ?>
			<form action="<?php echo site_url('receiving/receiving_products_add/' . $type); ?>" method="post">
			<input type="hidden" name="did" value="<?php echo $did; ?>">
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Price Base</th>
                  <?php endif; ?>
                </tr>
                </thead>
                <tbody>
				<?php foreach($products as $k => $v) : ?>
                <tr>
					<td><input type="checkbox" value="<?php echo $v -> pid; ?>" name="pid[]"></td>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <td><?php echo __get_rupiah($v -> pprice,1); ?></td>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <td><?php echo __get_rupiah($v -> ppricebase,1); ?></td>
                  <?php endif; ?>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Price Base</th>
                  <?php endif; ?>
                </tr>
                </tfoot>
              </table>
<button type="submit" class="btn btn-info"> <i class="fa fa-save"></i> Save</button>
</form>
</div>
</div>
</div>
</div>
</section>


<script src="<?php echo themes_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script>
  $(function () {
    $("#sTable").DataTable();
  });
</script>
