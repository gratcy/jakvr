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
				<td><input readonly type="number" value="<?php echo $v -> rqty; ?>" name="products[<?php echo $v -> pid; ?>]" class="form-control" style="width:100px;"></td>
                </tr>
                <?php $tqty+= $v -> rqty; endforeach; ?>
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
		</tr>
		</tfoot>
		</table>
