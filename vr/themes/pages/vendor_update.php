  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Vendor
        <small>Update Vendor</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Vendor</a></li>
        <li class="active"><a href="#">Update Vendor</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Vendor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php $phone = explode('*',$detail[0] -> vphone); ?>
            <form class="form-horizontal" action="<?php echo site_url('vendor/vendor_update'); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Vendor</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Vendor Name" value="<?php echo $detail[0] -> vname; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Phone" class="col-sm-2 control-label">Phone</label>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone" placeholder="Phone I" value="<?php echo isset($phone[0]) ? $phone[0] : ''; ?>">
                  </div>
                  <div class="col-sm-5">
                    <input type="text" name="phone[]" class="form-control" id="Phone2" placeholder="Phone II" value="<?php echo isset($phone[1]) ? $phone[1] : ''; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Country" class="col-sm-2 control-label">Country</label>

                  <div class="col-sm-10">
					  <select name="country" class="form-control" id="Country">
                    <?php echo $country; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Province" class="col-sm-2 control-label">Province</label>

                  <div class="col-sm-10">
					<select name="province" class="form-control" id="Province">
                    <?php echo $province; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="City" class="col-sm-2 control-label">City</label>

                  <div class="col-sm-10">
					<select name="city" class="form-control" id="City">
                    <?php echo $city; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Address" class="col-sm-2 control-label">Address</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="addr" class="form-control" id="Address" placeholder="Address"><?php echo $detail[0] -> vaddr; ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> vstatus,2); ?>
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
