  <script type="text/javascript" src="<?php echo themes_url('plugins/ckeditor/ckeditor.js'); ?>"></script>
  <script type="text/javascript" src="<?php echo themes_url('plugins/ckeditor/samples/js/sample.js'); ?>"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Update Product</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Product</a></li>
        <li class="active"><a href="#">Update Product</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <?php echo __get_error_msg(); ?>
            
           <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Update Product</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="<?php echo site_url('product_others/product_others_update'); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
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
                    <input type="text" name="name" class="form-control" id="Product" placeholder="Product Name" value="<?php echo stripslashes($detail[0] -> pname); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Guarentee (days)</label>
                  <div class="col-sm-2">
                    <input type="number" name="guarentee" class="form-control" id="Guarentee" placeholder="Days" value="<?php echo $detail[0] -> pguarantee; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Weight" class="col-sm-2 control-label">Weight (gram)</label>
                  <div class="col-sm-2">
                    <input type="number" name="weight" class="form-control" id="Weight" placeholder="Gram" value="<?php echo $detail[0] -> pweight; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Product Image</label>
					<input type="hidden" name="timg" value="<?php echo $detail[0] -> pimg; ?>">
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="img">
                    <br />
                  <?php
					echo '<a id="product_image" href="'.site_url('upload/'.$detail[0] -> pimg).'" title="'.$detail[0] -> pname.'" target="_blank"> <img title="'.$detail[0] -> pname.'" src="'.site_url('upload/'.$detail[0] -> pimg).'" style="width:150px;border:1px solid #ccc"></a>';
                  ?>
                  </div>
                  
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">Status</label>

                  <div class="col-sm-10">
                    <div class="checkbox">
					  <?php echo __get_status($detail[0] -> pstatus,2); ?>
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
				<?php foreach($subdetail as $k => $v) : ?>
				<br />
				<input type="hidden" name="pid[<?php echo $v -> pid; ?>]" value="<?php echo $v -> pid; ?>">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Variation (<?php echo ($k+1); ?>)</label>
                  <div class="col-sm-9">
					  <?php if ($k == 0) : ?>
					<button type="button" class="btn btn-primary AddVariation">Add Variation</button>
					<?php endif; ?>
                  </div>
                  <div class="col-sm-1"><a href="<?php echo site_url('product_others/product_others_delete/2/' . $v -> pid); ?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-times"></i></a></div>
                </div>
                
                <div class="form-group">
                  <label for="SKU" class="col-sm-2 control-label">SKU</label>
                  <div class="col-sm-10">
                    <input type="text" name="sku[<?php echo $v -> pid; ?>]" class="form-control" id="SKU" placeholder="SKU" value="<?php echo $v -> psku; ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Product" class="col-sm-2 control-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="vname[<?php echo $v -> pid; ?>]" class="form-control" id="Name" placeholder="Variation Name" value="<?php echo stripslashes($v -> pname); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Color" class="col-sm-2 control-label">Color</label>

                  <div class="col-sm-10">
					  <select name="color[<?php echo $v -> pid; ?>]" class="form-control" id="Color">
                    <?php echo $color[$v -> pid]; ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Price" class="col-sm-2 control-label">Price</label>
                  <div class="col-sm-10">
                    <input type="text" name="price[<?php echo $v -> pid; ?>]" class="form-control" id="Price" onkeyup="formatharga(this.value,this)" autocomplete="off" value="<?php echo __get_rupiah($v -> pprice,2); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceBase" class="col-sm-2 control-label">Price Base</label>
                  <div class="col-sm-10">
                    <input type="text" name="pricebase[<?php echo $v -> pid; ?>]" class="form-control" id="PriceBase" onkeyup="formatharga(this.value,this)" autocomplete="off" value="<?php echo __get_rupiah($v -> ppricebase,2); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="PriceSeller" class="col-sm-2 control-label">Price Seller</label>
                  <div class="col-sm-10">
                    <input type="text" name="priceseller[<?php echo $v -> pid; ?>]" class="form-control" id="PriceSeller" onkeyup="formatharga(this.value,this)" autocomplete="off" value="<?php echo __get_rupiah($v -> ppriceseller,2); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label for="Description" class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <textarea type="text" name="desc[<?php echo $v -> pid; ?>]" class="form-control editor" id="editor<?php echo ($k == 0 ? "" : $k);?>" placeholder="Description"><?php echo stripslashes($v -> pdesc); ?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Guarentee" class="col-sm-2 control-label">Variation Images</label>
                  <div class="col-sm-10">
                    <input type="file" class="form-control" name="vimg[<?php echo $v -> pid; ?>][]" multiple>
                  <?php
                  $rsubImg = $this -> product_others_model -> __get_product(3, $v -> pid);
                  foreach($rsubImg as $ks => $vs)
					echo '<a id="product_image" href="'.site_url('upload/'.$vs -> pimages).'" title="'.$v -> pname.'" target="_blank"> <img title="'.$v -> pname.'" src="'.site_url('upload/'.$vs -> pimages).'" style="width:150px;border:1px solid #ccc"></a>';
                  ?>
                  </div>
                </div>
                <?php endforeach; ?>
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
	$("a#product_image").fancybox();
	initSample();
	
	function addVariation(i) {
		html = '<div class="wew_'+i+'">';
		html += '<br />';
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
		html += '<?php echo $color[0]; ?>';
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
		html += '</div>';
		html += '<div class="form-group">';
		html += '<label for="Guarentee" class="col-sm-2 control-label">Variation Images</label>';
		html += '<div class="col-sm-10">';
		html += '<input type="file" class="form-control" name="vimg['+i+'][]" multiple>';
		html += '</div>';
		html += '</div>';
		html += '</div>';
		return html;
	}
	
				<?php foreach($subdetail as $k => $v) : ?>
				<?php if ($k > 0) {?>
					CKEDITOR.replace('editor<?php echo $k; ?>', CKEDITOR.config);
				<?php } ?>
				<?php endforeach; ?>
	var i = <?php echo count($subdetail) + 1;?>;
	$('.AddVariation').click(function(){
		$('.variation').append(addVariation(i));
			$('select').chosen();
			CKEDITOR.replace('editor'+i, CKEDITOR.config);
		++i;
	});
</script>
