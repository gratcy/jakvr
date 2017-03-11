		<table class="table table-bordered" id="ProductTMP">
		<thead>
		<tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <th>Price Base</th>
                  <?php endif; ?>
                  <th>QTY</th>
				<?php if ($rtype != 2) : ?>
                  <th></th>
                  <?php endif; ?>
		</tr>
		</thead>
		<tbody>
				<?php
				$tqty = 0;
				foreach($products as $k => $v) :
				?>
				<tr idnya="<?php echo $v -> pid; ?>">
                  <td><?php echo $v -> cname; ?></td>
                  <td><?php echo $v -> bname; ?></td>
                  <td><?php echo $v -> pname; ?></td>
                  <td><?php echo $v -> pdesc; ?></td>
                  <td><?php echo __get_rupiah($v -> pprice,1); ?></td>
				  <?php if (__get_roles('ProductPriceBase')) : ?>
                  <td><?php echo __get_rupiah($v -> ppricebase,1); ?></td>
                  <?php endif; ?>
				<td><input type="number" value="<?php echo ($type == 1 ? 1 : $v -> rqty); ?>" name="products[<?php echo ($type == 2 ? $v -> rid : $v -> pid); ?>]" class="form-control" style="width:100px;" <?php echo ($rtype == 2 ? 'readonly' : '')?>></td>
				<?php if ($rtype != 2) : ?>
				<td style="text-align:center;">
					<a href="javascript:void(0);" id="dellist" idnya="<?php echo $v -> pid; ?>"><i class="fa fa-times"></i></a>
				</td>
				<?php endif; ?>
                </tr>
                <?php $tqty+= ($type == 1 ? 1 : $v -> rqty); endforeach; ?>
		</tbody>
		<tfoot>
		<tr>
		<td>Total</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td class="totalqtyproduct"><?php echo $tqty; ?></td>
		<?php if ($rtype != 2) : ?>
		<td></td>
		<?php endif; ?>
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
	$.post('<?php echo site_url('receiving/receiving_products_delete/' . $type); ?>', data,
	function(datas) {
		
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
