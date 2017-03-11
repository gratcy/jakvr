  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Daily Report
        <small>Daily Report</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="#">Daily Report</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Daily Report</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <?php echo __get_error_msg(); ?>
            
            <div class="box-header">
		    <h3 class="box-title">
			<a href="<?php echo site_url('dailyreport/dailyreport_add'); ?>" class="btn btn-default"><i class="fa fa-plus"></i> Add Daily Report</a>
			</h3>
            </div>
              <table id="sTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Date</th>
				  <?php if ($this -> privileges -> sesresult['ugid'] == 1) : ?>
                  <th>User</th>
                  <?php endif;?>
                  <th>Subject</th>
                  <th>Report</th>
                  <th>Notes</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach($dailyreport as $k => $v) : ?>
                <tr>
                  <td><?php echo __get_date($v -> rdate,3); ?></td>
				  <?php if ($this -> privileges -> sesresult['ugid'] == 1) : ?>
                  <td><?php echo $v -> unick; ?></td>
                  <?php endif;?>
                  <td><?php echo $v -> rsubject; ?></td>
                  <td><?php echo $v -> rreport; ?></td>
                  <td class="tnotes" idnya="<?php echo $v -> rid; ?>"><?php echo $v -> rnotes; ?></td>
                  <td><?php echo ($v -> rstatus == 3 ? 'Approved' : __get_status($v -> rstatus,1)); ?></td>
                  <td>
					  <?php if ($v -> rstatus != 3) : ?>
					  <?php if ($v -> ruid == $this -> privileges -> sesresult['uid']) : ?>
					<a href="<?php echo site_url('dailyreport/dailyreport_update/' . $v -> rid); ?>"><i class="fa fa-pencil"></i></a>
					<a href="<?php echo site_url('dailyreport/dailyreport_delete/' . $v -> rid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a>
					<?php else: ?>
					<a href="#"><i class="fa fa-minus"></i></a>
					<?php endif; ?>
					<?php else: ?>
					<a href="#"><i class="fa fa-check"></i></a>
					<?php endif; ?>
                  </td>
                </tr>
                <?php endforeach; ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>Date</th>
				  <?php if ($this -> privileges -> sesresult['ugid'] == 1) : ?>
                  <th>User</th>
                  <?php endif;?>
                  <th>Subject</th>
                  <th>Report</th>
                  <th>Notes</th>
                  <th>Status</th>
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
<script type="text/javascript">
<?php
if ($this -> privileges -> sesresult['ugid'] == 1) {			
?>
$('.tnotes').click(function(){
	var rR = $(this);
	var valR = $(this).html();
	var idnya = $(this).attr('idnya');
	var patt = /tinputnotes/i;
	if (patt.test(valR)) {
		
	}
	else {
		$(this).html('<input class="tinputnotes form-control" style="width:150px" type="text" name="tnotes['+$(this).attr('idnya')+']" value="'+valR+'">');
		$(".tinputnotes", this).keyup(function(event){
			var uNotes = $(this).val();
			if(event.keyCode == 13){
				$.post('<?php echo site_url('dailyreport/dailyreport_update_one'); ?>', {value: $(this).val(), idnya: idnya}).done(function(res) {
					if (res == -1) {
						rR.html(uNotes);
					}
				});
			}
		});
	}
});
<?php
}
?>
</script>
