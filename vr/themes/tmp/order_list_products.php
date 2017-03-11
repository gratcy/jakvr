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
			<form action="<?php echo site_url('order/order_products_add/' . $type); ?>" method="post">
			<input type="hidden" name="did" value="<?php echo $did; ?>">
			<input type="hidden" name="ctype" value="<?php echo $ctype; ?>">
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th></th>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <?php if ($ctype == 1) : ?>
                  <th>Price</th>
                  <?php else : ?>
                  <th>Price Seller</th>
                  <?php endif; ?>
                  <th>Stock Final</th>
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
                  <?php if ($ctype == 1) : ?>
                  <td><?php echo __get_rupiah($v -> pprice,1); ?></td>
                  <?php else : ?>
                  <td><?php echo __get_rupiah($v -> ppriceseller,1); ?></td>
                  <?php endif; ?>
                  <td><?php echo $v -> istock; ?></td>
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
                  <?php if ($ctype == 1) : ?>
                  <th>Price</th>
                  <?php else : ?>
                  <th>Price Seller</th>
                  <?php endif; ?>
                  <th>Stock Final</th>
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
    $("#sTable").DataTable({"pageLength": 100,"paging": false});
  });
</script>
