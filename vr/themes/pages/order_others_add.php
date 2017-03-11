  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Purchase Order KoekMuraH
        <small>New Purchase Order KoekMuraH</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Purchase Order</a></li>
        <li class="active"><a href="#">New Purchase Order KoekMuraH</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">New Purchase Order KoekMuraH</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('order_others/order_others_add'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Date</label>

                  <div class="col-sm-10">
                    <input type="text" name="dateorder" class="form-control" id="DateTimePicker" placeholder="Date Order" value="<?php echo date('d/m/Y H:i');?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Transaction Code</label>

                  <div class="col-sm-10">
                    <input type="text" name="tcode" class="form-control" id="tcode" placeholder="Transaction Code">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceBase" class="col-sm-2 control-label">Price Base</label>
                  <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="pricebase" class="form-control" id="PriceBase" placeholder="Price Base">
                  </div>
                </div>
                <div class="form-group">
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
                    <input type="text" name="ino" class="form-control" id="ino" placeholder="Invoice No.">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-2 control-label">Customer</label>

                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Customer Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Phone" class="col-sm-2 control-label">Phone</label>

                  <div class="col-sm-10">
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="Customer Phone">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" autocomplete="off" name="price" class="form-control" id="Price" placeholder="Price">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Note</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Note"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status(1,2); ?>
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
