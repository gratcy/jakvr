<script src="<?php echo themes_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'); ?>" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo themes_url('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>" />

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Report
        <small>Update Daily Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Daily Report</a></li>
        <li class="active"><a href="#">Update Daily Report</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Daily Report</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-approved" action="<?php echo site_url('dailyreport/dailyreport_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="datereport" class="form-control" id="DateTimePicker" placeholder="Date Report" value="<?php echo date('d/m/Y H:i', $detail[0] -> rdate);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Subject</label>

                  <div class="col-sm-10">
                    <input type="text" name="subject" class="form-control" value="<?php echo $detail[0] -> rsubject; ?>" id="inputEmail3" placeholder="Daily Report Subject">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Report</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="report" class="form-control textarea" id="Report" placeholder="Report"><?php echo $detail[0] -> rreport; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> rstatus,2); ?>
                  </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
                <button type="button" class="btn btn-danger pull-right" style="margin-right:3px" id="approved">Approved</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<script>
$(document).ready(function(){
	$('.textarea').wysihtml5();
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
});
</script>
