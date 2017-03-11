		<table class="table table-bordered" id="ProductTMP">
		<thead>
		<tr>
                  <th>Category</th>
                  <th>Brand</th>
                  <th>Product</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>QTY</th>
                  <th></th>
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
				<td><input type="number" value="<?php echo ($type == 1 ? 1 : $v -> rqty); ?>" name="products[<?php echo ($type == 2 ? $v -> rid : $v -> pid); ?>]" class="form-control" style="width:100px;"></td>
				<td style="text-align:center;"><a href="javascript:void(0);" id="dellist" idnya="<?php echo $v -> pid; ?>"><i class="fa fa-times"></i></a></td>
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
	$.post('<?php echo site_url('request/request_products_delete/' . $type); ?>', data,
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
