
			<input type="hidden" name="ctype" value="<?php echo $ctype; ?>">
		<table class="table table-bordered" id="ProductTMP">
		<thead>
		<tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <?php if ($ctype == 1) : ?>
                  <th>Price</th>
                  <?php else : ?>
                  <th>Price Seller</th>
                  <?php endif; ?>
                  <th>QTY</th>
                  <th></th>
		</tr>
		</thead>
		<tbody>
				<?php
				$tprice = 0;
				$tqty = 0;
				foreach($products as $k => $v) :
				?>
				<tr idnya="<?php echo $v -> pid; ?>">
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <?php if ($ctype == 1) : ?>
                  <td data-price="<?php echo $v -> pprice; ?>"><?php echo __get_rupiah($v -> pprice,1); ?></td>
                  <?php else : ?>
                  <td data-price="<?php echo $v -> ppriceseller; ?>"><?php echo __get_rupiah($v -> ppriceseller,1); ?></td>
                  <?php endif; ?>
				<td><input data-price="<?php echo ($ctype == 1 ? $v -> pprice : $v -> ppriceseller); ?>" type="number" value="<?php echo ($type == 1 ? '1' : $v -> tqty); ?>" name="products[<?php echo ($type == 2 ? $v -> tid : $v -> pid); ?>]" class="form-control qtyproduct" style="width:100px;"></td>
				<td style="text-align:center;"><a href="javascript:void(0);" id="dellist" idnya="<?php echo $v -> pid; ?>"><i class="fa fa-times"></i></a></td>
                </tr>
                <?php $tprice+= ($type == 1 ? ($ctype == 1 ? $v -> pprice : $v -> ppriceseller) : ($ctype == 1 ? $v -> pprice : $v -> ppriceseller) * $v -> tqty); ?>
                <?php $tqty+= ($type == 1 ? 1 : $v -> tqty); endforeach; ?>
		</tbody>
		<tfoot>
		<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		<td class="totalpriceproduct"><?php echo __get_rupiah($tprice,1); ?></td>
		<td class="totalqtyproduct"><?php echo $tqty; ?></td>
		<td></td>
		</tr>
		</tfoot>
		</table>
<script type="text/javascript">
$('a#dellist').click(function(){
	var idnya = $(this).attr('idnya');
	$('tr[idnya='+idnya+']').remove();
	<?php if ($type == 2) : ?>
	var data = {'pid' : idnya, 'did' : <?php echo $did; ?>};
	<?php else : ?>
	var data = {'pid' : idnya};
	<?php endif; ?>
	$.post('<?php echo site_url('order/order_products_delete/' . $type); ?>', data,
	function(datas) {
		
	});
	$('.qtyproduct').change(function(){
		//~ $('.totalqtyproduct').append();
	});
});

$('input[type="number"]').bind('change click keypress keyup',function(){
	var totalqty = 0;
	$('input[type="number"]').each(function(index){
		totalqty += ($(this).val() == '' ? 0 : parseInt($(this).val()));
	})
	$('.totalqtyproduct').html(totalqty);
});
</script>
