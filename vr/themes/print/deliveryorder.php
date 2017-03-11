<html>  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo themes_url('bootstrap/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('dist/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo themes_url('plugins/chosen/chosen.min.css'); ?>">
  <script type="text/javascript" src="<?php echo themes_url('plugins/jQuery/jquery.min.js'); ?>"></script>
<script src="<?php echo themes_url('plugins/chosen/chosen.jquery.min.js'); ?>"></script>
<title>Delivery Order</title>
<body>
            <form class="form-horizontal" action="<?php echo site_url('order/deliveryorder/' . $id); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
              <div class="box-body">
                <div class="form-group">
                  <label for="tno" class="col-sm-3 control-label">Trans No.</label>

                  <div class="col-sm-9">
                    <input type="text" disabled name="tno" class="form-control" id="tno" placeholder="Trans No" value="<?php echo $detail[0] -> tno; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Customer" class="col-sm-3 control-label">Customer</label>

                  <div class="col-sm-9">
					  <select name="customer" class="form-control" id="Customer" disabled>
                    <option><?php echo $detail[0] -> cname; ?></option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="DO" class="col-sm-3 control-label">Delivery Information</label>

                  <div class="col-sm-9">
					  <select name="do" class="form-control" id="DO">
                     <?php echo $do;?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-3 control-label">Address</label>

                  <div class="col-sm-9">
                    <textarea type="text" name="addr" class="form-control" id="Address" placeholder="Address"><?php echo $detail[0] -> tdoaddr;?></textarea>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="button" onclick="javascript:window.close();" class="btn btn-default">Cancel</button>
                <button type="submit" class="btn btn-info pull-right">Print</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <script>
            $(document).ready(function(){
				$('.form-horizontal select').chosen({search_contains: true, no_results_text: "Oops, nothing found!"});
			});
            </script>
</body>
</html>
