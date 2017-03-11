  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Inventory
        <small>Inventory</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Inventory</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Inventory</h3>
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
                  <th>Stock Return</th>
                  <th>Stock Reject</th>
                  <th>Stock Final</th>
                  <th>Adjust (+)</th>
                  <th>Adjust (-)</th>
                  <th>Stock Process</th>
                  <th>Stock Left</th>
				  <th>Card Stock</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$amin = 0;
				$aplus = 0;
				foreach($inventory as $k => $v) :
				$process = (int) str_replace('-','',__get_order_stock_process($v -> ipid, $this -> privileges -> sesresult['ubid']));
				$left = $v -> istock - $process;
				$aplus = __get_adjustment($v -> iid, 1, $this -> privileges -> sesresult['ubid']);
				$amin = __get_adjustment($v -> iid, 2, $this -> privileges -> sesresult['ubid']);
				?>
                <tr>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> istockbegining; ?></td>
                  <td><?php echo $v -> istockin; ?></td>
                  <td><?php echo $v -> istockout; ?></td>
                  <td><?php echo $v -> istockreturn; ?></td>
                  <td><?php echo $v -> istockreject; ?></td>
                  <td><?php echo $v -> istock; ?></td>
                  <td><?php echo $aplus; ?></td>
                  <td><?php echo $amin; ?></td>
                  <td><?php echo $process; ?></td>
                  <td><?php echo $left; ?></td>
				  <td>
				  <a href="javascript:void(0);" onclick="print_data('<?php echo site_url('inventory/card_stock/' . $v -> ipid ); ?>', 'Print Kartu Stok');"><i class="fa fa-book"></i></a>
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
                  <th>Stock Return</th>
                  <th>Stock Reject</th>
                  <th>Stock Final</th>
                  <th>Adjust (+)</th>
                  <th>Adjust (-)</th>
                  <th>Stock Process</th>
                  <th>Stock Left</th>
				  <th>Card Stock</th>
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
