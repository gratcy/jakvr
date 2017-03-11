  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Peti Cash
        <small>Peti Cash</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Peti Cash</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Peti Cash Transaction</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            <form action="<?php echo site_url('peti_cash'); ?>" method="post">
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Date Range:</label>
                  <div class="col-sm-3">
						<input type="text" class="form-control pull-right" id="monthyear" value="<?php echo $monthyear?>" name="monthyear" autocomplete="off" />
                  </div>
                  <div class="col-sm-1">
						<button type="submit" class="btn btn-info pull-right">Sort!</button>
                  </div>
                </div>
                </form>
                <p>&nbsp;</p>
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('peti_cash/peti_cash_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> New Transaction</a>
			</h3>
            </div>
              <table class="table table-bordered table-striped">
                              <thead>
                                <tr>
          <th>Date</th>
          <th>Transaction Type</th>
          <th>Nominal</th>
          <th>Saldo</th>
          <th>Description</th>
                                </tr>
                              </thead>
                              <tbody>
								  
		  <?php
		  foreach($peti_cash as $k => $v) :
		  ?>
                                        <tr>
          <td><?php echo __get_date($v -> pdate,1); ?></td>
          <td><?php echo __get_peti_cash_type($v -> ptype,1); ?></td>
          <td><?php echo __get_rupiah($v -> pnominal,1); ?></td>
          <td><?php echo __get_rupiah($v -> psaldo,1); ?></td>
          <td><?php echo $v -> pdesc; ?></td>
										</tr>
        <?php endforeach; ?>
                              </tbody>
                <tfoot>
                <tr>
          <th>Date</th>
          <th>Transaction Type</th>
          <th>Nominal</th>
          <th>Saldo</th>
          <th>Description</th>
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
