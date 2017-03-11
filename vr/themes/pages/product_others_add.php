  <script type="text/javascript" src="<?php echo themes_url('plugins/ckeditor/ckeditor.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo themes_url('plugins/ckeditor/samples/js/sample.js'); ?>"></script>
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
            <form class="form-horizontal" action="<?php echo site_url('product_others/product_others_add'); ?>" method="post" enctype="multipart/form-data">
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
                  <label for="Product" class="col-sm-2 control-label">Product</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="Product" placeholder="Product Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Guarentee (days)</label>
                  <div class="col-sm-2">
                    <input type="number" name="guarentee" class="form-control" id="Guarentee" placeholder="Days">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Weight" class="col-sm-2 control-label">Weight (gram)</label>
                  <div class="col-sm-2">
                    <input type="number" name="weight" class="form-control" id="Weight" placeholder="Gram">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Product Image</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="img">
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
				<div class="box-header with-border">
				  <h3 class="box-title">Product Variation</h3>
				</div>
				<br />
                <div class="variation">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Variation (1)</label>
                  <div class="col-sm-9">
					<button type="button" class="btn btn-primary AddVariation">Add Variation</button>
                  </div>
                  <div class="col-sm-1"></div>
                </div>
                
                <div class="form-group">
                  <label for="SKU" class="col-sm-2 control-label">SKU</label>
                  <div class="col-sm-10">
                    <input type="text" name="sku[0]" class="form-control" id="SKU" placeholder="SKU">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Product" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="vname[0]" class="form-control" id="Name" placeholder="Variation Name">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Color" class="col-sm-2 control-label">Color</label>

                  <div class="col-sm-10">
					  <select name="color[0]" class="form-control" id="Color">
                    <?php echo $color; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price[0]" class="form-control" id="Price" onkeyup="formatharga(this.value,this)" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceBase" class="col-sm-2 control-label">Price Base</label>
                  <div class="col-sm-10">
                    <input type="text" name="pricebase[0]" class="form-control" id="PriceBase" onkeyup="formatharga(this.value,this)" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceSeller" class="col-sm-2 control-label">Price Seller</label>
                  <div class="col-sm-10">
                    <input type="text" name="priceseller[0]" class="form-control" id="PriceSeller" onkeyup="formatharga(this.value,this)" autocomplete="off">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="desc[0]" class="form-control editor1" id="editor" placeholder="Description"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Variation Images</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="vimg[0][]" multiple>
                  </div>
                </div>
			  </div>
			  </div>
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
	initSample();
	
	function addVariation(i) {
		html = '<div class="wew_'+i+'">';
		html += '<div class="form-group">';
		html += '<label class="col-sm-2 control-label">Variation ('+i+')</label>';
		html += '<div class="col-sm-9">';
		html += '</div>';
		html += '<div class="col-sm-1"><a href="javascript:void(0);" onclick="$(\'.wew_'+i+'\').remove();"><i class="fa fa-times"></i></a></div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="SKU" class="col-sm-2 control-label">SKU</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="text" name="sku['+i+']" class="form-control" id="SKU" placeholder="SKU">';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Product" class="col-sm-2 control-label">Name</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="text" name="vname['+i+']" class="form-control" id="Name" placeholder="Variation Name">';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Color" class="col-sm-2 control-label">Color</label>';
		html += '<div class="col-sm-10">';
		html += '<select name="color['+i+']" class="form-control chzn-select" id="Color">';
		html += '<?php echo $color; ?>';
		html += '</select>';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Price" class="col-sm-2 control-label">Price</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="text" name="price['+i+']" class="form-control" id="Price" onkeyup="formatharga(this.value,this)" autocomplete="off">';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="PriceBase" class="col-sm-2 control-label">Price Base</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="text" name="pricebase['+i+']" class="form-control" id="PriceBase" onkeyup="formatharga(this.value,this)" autocomplete="off">';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="PriceSeller" class="col-sm-2 control-label">Price Seller</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="text" name="priceseller['+i+']" class="form-control" id="PriceSeller" onkeyup="formatharga(this.value,this)" autocomplete="off">';
		html += '</div>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Description" class="col-sm-2 control-label">Description</label>';
		html += '<div class="col-sm-10">';
		html += '<textarea type="text" name="desc['+i+']" class="form-control editor" id="editor'+i+'" placeholder="Description"></textarea>';
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Guarentee" class="col-sm-2 control-label">Variation Images</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="file" class="form-control" name="vimg['+i+'][]" multiple>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		return html;
	}
	
	var i = 2;
	$('.AddVariation').click(function(){
		$('.variation').append(addVariation(i));
			$('select').chosen();
			CKEDITOR.replace('editor'+i, CKEDITOR.config);
		++i;
	});
</script>
