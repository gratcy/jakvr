  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Report Stock Opname
        <small>Opname</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Report Stock Opname</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Report Stock Opname</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
						<form action="<?php echo site_url('reportopname/sortreport/'); ?>" method="post">
                        <div class="col-xs-6">

                                    <div class="form-group">
                                        <label>Date range:</label>
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="text" class="form-control pull-right" id="datesort" name="datesort" autocomplete="off" value="<?php echo $from . ' - ' . $to; ?>" />
                                        </div><!-- /.input group -->
                        <button class="btn text-muted text-center btn-danger" type="submit" style="float: right;top: -34px;position: relative;z-index: 999;">Go!</button>
                                    </div><!-- /.form group -->
						</div>
						</form>
            <div class="box-header">
            </div>
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Stock Begining</th>
                  <th>Stock In</th>
                  <th>Stock Out</th>
                  <th>Stock Final</th>
                  <th>Adjust (-)</th>
                  <th>Adjust (+)</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($reportopname as $k => $v) : ?>
                <tr>
                  <td><?php echo __get_date($v -> odate,1); ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> ostockbegining; ?></td>
                  <td><?php echo $v -> ostockin; ?></td>
                  <td><?php echo $v -> ostockout; ?></td>
                  <td><?php echo $v -> ostock; ?></td>
                  <td><?php echo $v -> oadjustmin; ?></td>
                  <td><?php echo $v -> oadjustplus; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
                  <th>Product</th>
                  <th>Stock Begining</th>
                  <th>Stock In</th>
                  <th>Stock Out</th>
                  <th>Stock Final</th>
                  <th>Adjust (-)</th>
                  <th>Adjust (+)</th>
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
