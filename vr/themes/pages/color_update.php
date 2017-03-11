  <link rel="stylesheet" href="<?php echo themes_url('plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>">
  <script type="text/javascript" src="<?php echo themes_url('plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Color
        <small>Update Color</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Color</a></li>
        <li class="active"><a href="#">Update Color</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Color</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('color/color_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Name</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" value="<?php echo $detail[0] -> cname; ?>" class="form-control" id="inputEmail3" placeholder="Color Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Hex" class="col-sm-2 control-label">Color</label>
                  <div class="col-sm-4">
					<div id="cp2" class="input-group colorpicker-component">
						<input name="desc" type="text" value="<?php echo $detail[0] -> cdesc; ?>" class="form-control" />
						<span class="input-group-addon"><i></i></span>
					</div>
					</div>
				</div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> cstatus,2); ?>
                  </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
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
$(function() {
	$('#cp2').colorpicker();
});
</script>
