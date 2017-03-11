  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Item Receiving
        <small>Receiving</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Item Receiving Detail</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Item Receiving <?php echo $detail[0] -> rdocno; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
              <table class="table table-bordered table-striped">
                <thead>
				  <tr><th>Date</th><th><?php echo __get_date($detail[0] -> rdate,2); ?></th></tr>
                  <tr><th>Vendor</th><th><?php echo $detail[0] -> vname; ?></th></tr>
                  <tr><th>Doc No.</th><th><?php echo $detail[0] -> rdocno; ?></th></tr>
                  <tr><th>Description</th><th><?php echo $detail[0] -> rdesc; ?></th></tr>
                  <tr><th>Status</th><th><span class="label label-primary">Approved</span></th></tr>
                </tr>
                </thead>
                </tbody>
              </table>
              <p>&nbsp;</p>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>QTY</th>
                </tr>
                </thead>
                <tbody>
				<?php
				$tqty = 0;
				$tprice = 0;
				foreach($products as $k => $v) :
				?>
                <tr>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <td><?php echo __get_rupiah($v -> pprice,1); ?></td>
                  <td><?php echo $v -> rqty; ?></td>
                </tr>
                <?php
                $tprice += $v -> pprice * $v -> rqty;
                $tqty += $v -> rqty;
                endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Total</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><?php echo __get_rupiah($tprice,1); ?></th>
                  <th><?php echo $tqty; ?></th>
                </tr>
                </tfoot>
              </table>
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Back!</button>
              </div>
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
