<?php
if ($post['format'] == 2) {
	$filename ="reportstock-".date('d-m-Y').".xls";
	header('Content-type: application/vnd.ms-excel; charset=utf-8');
	header('Content-Disposition: attachment; filename='.$filename);
	header("Cache-Control: max-age=0");
	$wew = $post['datesort'];
	$wew = explode(' - ', $wew);
	$from = date('Y-m-d',strtotime($wew[0]));
	$to = date('Y-m-d',strtotime($wew[1]));
	$post['datesort'] = $from . ' - ' . $to;
}
?>
<html>
<title>Report Stock Out</title>
<body>
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
<div class="box box-primary">

                                <!-- form start -->
                                    <div class="box-body">
									<h2 style="border-bottom:1px solid #000">JakVR - Report Stock Out</h2>
									<table border="0" style="border-collapse: collapse;width:35%">
									<tr><td>Date</td><td>: <?php echo $post['datesort'];?></td></tr>
									<tr><td>Branch</td><td>: <?php echo $this -> privileges -> sesresult['ubname']; ?></td></tr>
									<tr><td>Days</td><td>: <?php echo $datediff;?></td></tr>
									</table>
									<br />
                                        <div class="form-group">
										<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="border:1px solid #000;padding:3px;">
										<th style="border:1px solid #000;padding:3px;width:5%;">No.</th>
										<th style="border:1px solid #000;padding:3px;">Product</th>
										<th style="border:1px solid #000;padding:3px;">Stock Process</th>
										<th style="border:1px solid #000;padding:3px;">Stock Final</th>
										<th style="border:1px solid #000;padding:3px;">Stock Left</th>
										<th style="border:1px solid #000;padding:3px;">Out</th>
										<th style="border:1px solid #000;padding:3px;">Average</th>
										<th style="border:1px solid #000;padding:3px;">Count Down (Days)</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$i = 1;
										foreach($data as $k => $v) :
										$process = (int) str_replace('-','',__get_order_stock_process($v -> pid, $this -> privileges -> sesresult['ubid']));
										$left = $v -> istock - $process;
										$avg = ceil($v -> totalout / $datediff);
										?>
										<tr style="border:1px solid #000;padding:3px;">
										<td style="border:1px solid #000;padding:3px;"><?php echo $i; ?>.</td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pname; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $process; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> istock; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $left; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo (int) $v -> totalout; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $avg; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo ceil($avg > 0 ? $left / $avg : 0); ?></td>
										</tr>
										<?php
										++$i;
										endforeach;
										?>
										<tbody>
										</table>
					
                                        </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


</body>
</html>
