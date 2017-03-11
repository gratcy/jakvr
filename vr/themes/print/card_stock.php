<html>
<title>Stock Card</title>
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
									<h2 style="border-bottom:1px solid #000">JakVR - Card Stock</h2>
									
									<table border="0" style="border-collapse: collapse;width:35%">
									<tr><td>Date</td><td>: <?php echo date('d  M  Y');?></td></tr>
									<tr><td>Product</td><td>: <?php echo $detail[0]->pname; ?></td></tr>
									<tr><td>Stock Begining</td><td>: <?php echo $detail[0] -> istockbegining; ?></td></tr>
									</table>
									<br />
                                        <div class="form-group">
										<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="border:1px solid #000;padding:3px;">
										<th style="border:1px solid #000;padding:3px;width:5%;">No.</th>
										<th style="border:1px solid #000;padding:3px;">Date</th>
										<th style="border:1px solid #000;padding:3px;">Trans No.</th>
										<th style="border:1px solid #000;padding:3px;">Customer</th>
										<th style="border:1px solid #000;padding:3px;width:10%;">In</th>
										<th style="border:1px solid #000;padding:3px;width:10%;">Out</th>
										<th style="border:1px solid #000;padding:3px;width:10%;">Process</th>
										<th style="border:1px solid #000;padding:3px;width:10%;">Stock Left</th>
										</tr>
										</thead>
										<tbody>
										<?php
										$i = 1;
										$tgl = '';
										$totalkeluar = 0;
										$proccess = 0;
										$tproccess = 0;
										$tmasuk = 0;
										$tkeluar = 0;
										$rmasuk = 0;
										$rkeluar = 0;
										$sisa = 0;
										$sbegining = (int) $detail[0] -> istockbegining;
										foreach($data as $k => $v) :
										if ($i == 1) $sisa = $sbegining;
										if ($v -> approved == 1) {
											$masuk = ($v -> transtype == 3 && $v -> treject == 0 || $v -> transtype == 5 || $v -> transtype == 7 ? $v -> tqty : 0);
											$keluar = ($v -> transtype == 1 || $v -> transtype == 8 ? $v -> tqty : 0);

											$proccess = 0;
										}
										else {
											$rmasuk = ($v -> transtype == 4 && $v -> treject == 0 || $v -> transtype == 6 ? $v -> tqty : 0);
											$rkeluar = ($v -> transtype == 2 ? $v -> tqty : 0);
											$masuk = 0;
											$keluar = 0;
											$proccess = $v -> tqty;
											$tproccess += $v -> tqty;
										}
										
										if ($keluar > 0) {
											$sisa += (floatval('-'.$keluar) + $masuk);
										}
										else {
											$sisa -= $keluar;
											$sisa += $masuk;
										}
										if ($rkeluar > 0) {
											$sisa -= $proccess;
										}
										else {
											$sisa += $rmasuk;
										}
										?>
										<tr style="border:1px solid #000;padding:3px;">
										<td style="border:1px solid #000;padding:3px;"><?php echo $i; ?>.</td>
										<td style="border:1px solid #000;padding:3px;">
										<?php
										$date = __get_date($v -> tdate,1);
										if($tgl <> $date){
											$tgl = $date;
											echo $tgl;
										}
										?>
										</td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tno; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> cname; ?></td>
										<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($masuk ? $masuk : '-');?></td>
										<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($keluar ? $keluar : '-');?></td>
										<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($proccess ? $proccess : '-');?></td>
										<td style="border:1px solid #000;text-align:center;padding:3px;"><?php echo ($sisa ? $sisa : '-');?></td>
										</tr>
										<?php
										++$i;
										$tmasuk += $masuk;
										$tkeluar += $keluar;
										endforeach;
										?>
										<tbody>
										<tfoot>
										<tr style="border:1px solid #000;">
											<th colspan="4" style="border:1px solid #000;padding:3px;">Total</th>
											<th style="border:1px solid #000;padding:3px;"><?php echo $tmasuk; ?></th>
											<th style="border:1px solid #000;padding:3px;"><?php echo $tkeluar; ?></th>
											<th style="border:1px solid #000;padding:3px;"><?php echo $tproccess; ?></th>
											<th style="border:1px solid #000;padding:3px;"><?php echo $sisa; ?></th>
										</tr>
										</tfoot>
										</table>
					
                                        </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


</body>
</html>
