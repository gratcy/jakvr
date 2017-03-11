  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Add New Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active"><a href="#">Add New Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Add New Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('product/product_add'); ?>" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="Category" class="col-sm-2 control-label">Category</label>

                  <div class="col-sm-10">
					  <select name="cid" class="form-control" id="Category">
                    <?php echo $categories; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Brand" class="col-sm-2 control-label">Brand</label>

                  <div class="col-sm-10">
					  <select name="bid" class="form-control" id="Brand">
                    <?php echo $brand; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Product Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" onkeyup="formatharga(this.value,this)" autocomplete="off" name="price" class="form-control" id="Price" placeholder="Price">
                  </div>
                </div>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                <div class="form-group">
                  <label for="PriceBase" class="col-sm-2 control-label">Price Base</label>
                  <div class="col-sm-10">
                    <input type="text" onkeyup="formatharga(this.value,this)" autocomplete="off" name="pricebase" class="form-control" id="PriceBase" placeholder="Price Base">
                  </div>
                </div>
                  <?php endif; ?>
                <div class="form-group">
                  <label for="PriceSeller" class="col-sm-2 control-label">Price Seller</label>
                  <div class="col-sm-10">
                    <input type="text" onkeyup="formatharga(this.value,this)" autocomplete="off" name="priceseller" class="form-control" id="PriceSeller" placeholder="Price Seller">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>

                  <div class="col-sm-10">
                    <textarea type="text" name="desc" class="form-control" id="Description" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status(0,2); ?>
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
