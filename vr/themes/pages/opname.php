  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock Opname
        <small>Opname</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Stock Opname</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock Opname</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Stock Begining</th>
                  <th>Stock In</th>
                  <th>Stock Out</th>
                  <th>Stock Final</th>
                  <th>Stock Process</th>
                  <th>Stock Left</th>
				  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($opname as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> istockbegining; ?></td>
                  <td><?php echo $v -> istockin; ?></td>
                  <td><?php echo $v -> istockout; ?></td>
                  <td><?php echo $v -> istock; ?></td>
                  <td>0</td>
                  <td>0</td>
				  <td>
			<?php if (__get_roles('OpnameExecute')) : ?>
					<a href="<?php echo site_url('opname/opname_update/' . $v -> ipid); ?>"><i class="fa fa-pencil"></i></a>
            <?php endif; ?>
				  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Product</th>
                  <th>Stock Begining</th>
                  <th>Stock In</th>
                  <th>Stock Out</th>
                  <th>Stock Final</th>
                  <th>Stock Process</th>
                  <th>Stock Left</th>
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
