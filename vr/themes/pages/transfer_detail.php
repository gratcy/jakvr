  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Distribution
        <small>Transfer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Transfer Detail</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Request <?php echo $detail[0] -> rno; ?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
              <table class="table table-bordered table-striped">
                <thead>
				  <tr><th>Date</th><th><?php echo __get_date($detail[0] -> tdate,2); ?></th></tr>
                  <tr><th>Transfer No.</th><th><?php echo $detail[0] -> tno; ?></th></tr>
                  <tr><th>Request No.</th><th><?php echo $detail[0] -> rno; ?></th></tr>
                  <tr><th>Branch</th><th>From <?php echo $detail[0] -> bfrom; ?> to <?php echo $detail[0] -> bto; ?></th></tr>
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
