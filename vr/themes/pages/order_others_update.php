  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Order KoekMuraH
        <small>Update Purchase Order KoekMuraH</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase Order</a></li>
        <li class="active"><a href="#">Update Purchase Order KoekMuraH</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Purchase Order KoekMuraH</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal form-approved" action="<?php echo site_url('order_others/order_others_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="dateorder" class="form-control" id="DateTimePicker" placeholder="Date Order" value="<?php echo date('d/m/Y H:i', $detail[0] -> tdate);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Transaction Code</label>

                  <div class="col-sm-10">
                    <input type="text" name="tcode" class="form-control" id="tcode" placeholder="Transaction Code" value="<?php echo $detail[0] -> tcode; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceBase" class="col-sm-2 control-label">Price Base</label>
                  <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="pricebase" class="form-control" id="PriceBase" placeholder="Price Base" value="<?php echo $detail[0] -> tpricebase; ?>">
                  </div>
                </div>
                <div class="form-group reffer">
                  <label for="Reffer" class="col-sm-2 control-label">Reffer</label>

                  <div class="col-sm-10">
					  <select name="reffer" class="form-control" id="Reffer">
                    <?php echo $reffer; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Invoice No.</label>

                  <div class="col-sm-10">
                    <input type="text" name="ino" class="form-control" id="ino" placeholder="Invoice No." value="<?php echo $detail[0] -> tinv; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Customer</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" value="<?php echo $detail[0] -> tname; ?>" id="name" placeholder="Customer Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Phone" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" value="<?php echo $detail[0] -> tphone; ?>" id="phone" placeholder="Customer Phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="price" class="form-control" id="Price" placeholder="Price" value="<?php echo $detail[0] -> tprice; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Resi</label>

                  <div class="col-sm-10">
                    <input type="text" name="resi" class="form-control" id="resi" placeholder="Resi" value="<?php echo $detail[0] -> tresi; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Note</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Note"> <?php echo $detail[0] -> tdesc; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="discount" class="col-sm-2 control-label">Discount</label>
                  <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="discount" class="form-control" id="discount" placeholder="Discount" value="<?php echo $detail[0] -> tdiscount; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> tstatus,2); ?>
                  </div>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:history.go(-1);" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Submit</button>
                &nbsp;
				<?php if (__get_roles('OrderApproved')) : ?>
                <button type="button" class="btn btn-danger pull-right" style="margin-right:3px" id="approved">Approved</button>
            <?php endif; ?>
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
	$('#approved').click(function(){
		$('form.form-approved').append('<input type="hidden" name="app" value="1">');
		$('form.form-approved').submit();
	});
});
</script>
