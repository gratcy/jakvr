  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sales &amp; Purchase JakVR
        <small>Order Detail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Order Detail</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Order <?php echo $detail[0] -> tno; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
              <table class="table table-bordered table-striped">
                <thead>
				  <tr><th>Date</th><th><?php echo __get_date($detail[0] -> tdate,2); ?></th></tr>
                  <tr><th>Type</th><th><?php echo __get_transaction_type($detail[0] -> ttype,1); ?></th></tr>
                  <tr><th>Customer</th><th><?php echo $detail[0] -> cname; ?></th></tr>
                  <?php if ($detail[0] -> ttype == 1) : ?>
                  <tr><th>Reffer</th><th><?php echo $detail[0] -> reffer; ?></th></tr>
                  <?php endif; ?>
                  <tr><th>Doc No.</th><th><?php echo $detail[0] -> tno; ?></th></tr>
                  <tr><th>Description</th><th><?php echo $detail[0] -> tdesc; ?></th></tr>
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
				foreach($products as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <td><?php echo __get_rupiah($v -> pprice,1); ?></td>
                  <td><?php echo $v -> tqty; ?></td>
                </tr>
                <?php
                $tprice += $v -> pprice * $v -> tqty;
                $tqty += $v -> tqty;
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
                <tr>
                  <th>Discount</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><?php echo __get_rupiah($detail[0] -> tdiscount,1); ?></th>
                  <th></th>
                </tr>
                <tr>
                  <th>Grand Total</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><?php echo __get_rupiah($detail[0] -> ttotal,1); ?></th>
                  <th></th>
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
