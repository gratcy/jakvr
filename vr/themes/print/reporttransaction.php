<?php
error_reporting(0);
$etype = 1;
if ($post['format'] == 2) {
	$filename ="reporttransaction-".date('d-m-Y').".xls";
	header('Content-type: application/vnd.ms-excel; charset=utf-8');
	header('Content-Disposition: attachment; filename='.$filename);
	header("Cache-Control: max-age=0");
	$etype = 5;
	$wew = $post['datesort'];
	$wew = explode(' - ', $wew);
	$from = date('Y-m-d',strtotime($wew[0]));
	$to = date('Y-m-d',strtotime($wew[1]));
	$post['datesort'] = $from . ' - ' . $to;
}
?>
<html>
<title>Report Transaction</title>
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
									<h2 style="border-bottom:1px solid #000">JakVR - Report Transaction</h2>
									
									<table border="0" style="border-collapse: collapse;width:45%">
									<tr><td>Branch</td><td>: <?php echo ($post['branch'] == 1 ? 'Pusat' : ($post['branch'] == 2 ? 'Citraland' : 'All')); ?></td></tr>
									<tr><td>Date</td><td>: <?php echo $post['datesort'];?></td></tr>
									<tr><td>Type</td><td>: <?php echo __get_transactions($post['type']); ?></td></tr>
									<tr><td>Reporting Type</td><td>: <?php echo __get_reporting_type($post['rtype']); ?></td></tr>
									<tr><td>Format</td><td>: <?php echo __get_transaction_type($post['ttype'],1,2); ?></td></tr>
									<tr><td>Approval</td><td>: <?php echo ($post['approval'] == 1 ? 'Yes' : ($post['approval'] == 2 ? 'All' : 'No')); ?></td></tr>
									</table>
									<br />
                                        <div class="form-group">
<?php if ($post['rtype'] == 1) { ?>
										<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="border:1px solid #000;padding:3px;">
										<th style="border:1px solid #000;padding:3px;width:5%;">No.</th>
										<th style="border:1px solid #000;padding:3px;">Date</th>
										<th style="border:1px solid #000;padding:3px;">User</th>
										<th style="border:1px solid #000;padding:3px;">Trans No.</th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<th style="border:1px solid #000;padding:3px;">Invoice No.</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;">Reffer</th>
										<th style="border:1px solid #000;padding:3px;">Descrpiton</th>
										<th style="border:1px solid #000;padding:3px;">Product</th>
										<th style="border:1px solid #000;padding:3px;">Price</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;">Price Base</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;width:5%;">QTY</th>
										<th style="border:1px solid #000;padding:3px;">Bruto</th>
										<th style="border:1px solid #000;padding:3px;">Discount</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;">Netto</th>
										<?php endif; ?>
										</tr>
										</thead>
										<tbody>
										<?php
										$i = 1;
										$tgl = '';
										$tqty = 0;
										$tdiscount = 0;
										$tbruto = 0;
										$tnetto = 0;
										$tprice = 0;
										$tpricebase = 0;
										foreach($data as $k => $v) :
										$createdby = json_decode($v -> createdby);
										?>
										<tr style="border:1px solid #000;padding:3px;">
										<td style="border:1px solid #000;padding:3px;"><?php echo $i; ?>.</td>
										<td style="border:1px solid #000;padding:3px;">
										<?php
										if ($post['format'] == 2)
											$date = date('Y-m-d',$v -> tdate);
										else
											$date = __get_date($v -> tdate,1);
										echo $date;
										//~ if($tgl <> $date){
											//~ $tgl = $date;
											//~ echo $tgl;
										//~ }
										?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $createdby -> unick; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tno; ?></td>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tinv; ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> reffer; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tdesc; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pname; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty),$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tpricebase,$etype); ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $v -> tqty; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty)*$v -> tqty,$etype); ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tdiscount / $v -> ttypeitem,$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(((($v -> tprice/$v -> tqty) - $v -> tpricebase)*$v -> tqty)-$v -> tdiscount,$etype); ?></td>
										<?php endif; ?>
										</tr>
										<?php
										$tqty += $v -> tqty;
										$tdiscount += $v -> tdiscount;
										$tpricebase += $v -> tpricebase;
										$tprice += ($v -> tprice/$v -> tqty);
										$tbruto += ($v -> tprice/$v -> tqty)*$v -> tqty;
										$tnetto += ((($v -> tprice/$v -> tqty)-$v->tpricebase)*$v -> tqty)-$v -> tdiscount;
										++$i;
										endforeach;
										?>
										<tbody>
										<tfoot>
										<tr style="border:1px solid #000;">
											<th colspan="4" style="border:1px solid #000;padding:3px;">Total</th>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tprice, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tpricebase, $etype); ?></th>
											<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $tqty; ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tbruto, $etype); ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tdiscount, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tnetto, $etype); ?></th>
										<?php endif; ?>
										</tr>
										</tfoot>
										</table>
<?php } else if ($post['rtype'] == 2) { ?>
	<?php
	$gqty = 0;
	$gdiscount = 0;
	$gbruto = 0;
	$gnetto = 0;
	$gprice = 0;
	$gpricebase = 0;
	foreach($data as $key => $val) {
	?>
	<?php if ($val) { ?>
		<h2>Transaction: <?php echo $key; ?></h2>
											<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="border:1px solid #000;padding:3px;">
										<th style="border:1px solid #000;padding:3px;width:3%;">No.</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">Date</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">User</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">Trans No.</th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<th style="border:1px solid #000;padding:3px;width:15%;">Invoice No.</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;width:10%;">Reffer</th>
										<th style="border:1px solid #000;padding:3px;width:20%;">Descrpiton</th>
										<th style="border:1px solid #000;padding:3px;width:15%;">Product</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Price</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;width:12%;">Price Base</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;width:3%;">QTY</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Bruto</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Discount</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;width:12%;">Netto</th>
										<?php endif; ?>
										</tr>
										</thead>
										<tbody>
										<?php
										$i = 1;
										$tgl = '';
										$tqty = 0;
										$tdiscount = 0;
										$tbruto = 0;
										$tnetto = 0;
										$tprice = 0;
										$tpricebase = 0;
										foreach($val as $k => $v) :
										$createdby = json_decode($v -> createdby);
										?>
										<tr style="border:1px solid #000;padding:3px;">
										<td style="border:1px solid #000;padding:3px;"><?php echo $i; ?>.</td>
										<td style="border:1px solid #000;padding:3px;">
										<?php
										if ($post['format'] == 2)
											$date = date('Y-m-d',$v -> tdate);
										else
											$date = __get_date($v -> tdate,1);
										if($tgl <> $date){
											$tgl = $date;
											echo $tgl;
										}
										?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $createdby -> unick; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tno; ?></td>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tinv; ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> reffer; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tdesc; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pname; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty),$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tpricebase,$etype); ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $v -> tqty; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty)*$v -> tqty,$etype); ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tdiscount / $v -> ttypeitem,$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(((($v -> tprice/$v -> tqty) - $v -> tpricebase)*$v -> tqty)-$v -> tdiscount,$etype); ?></td>
										<?php endif; ?>
										</tr>
										<?php
										$tqty += $v -> tqty;
										$tdiscount += $v -> tdiscount;
										$tpricebase += $v -> tpricebase;
										$tprice += ($v -> tprice/$v -> tqty);
										$tbruto += ($v -> tprice/$v -> tqty)*$v -> tqty;
										$tnetto += ((($v -> tprice/$v -> tqty)-$v->tpricebase)*$v -> tqty)-$v -> tdiscount;
										
										$gqty += $v -> tqty;
										$gdiscount += $v -> tdiscount;
										$gpricebase += $v -> tpricebase;
										$gprice += ($v -> tprice/$v -> tqty);
										$gbruto += ($v -> tprice/$v -> tqty)*$v -> tqty;
										$gnetto += ((($v -> tprice/$v -> tqty)-$v->tpricebase)*$v -> tqty)-$v -> tdiscount;
										++$i;
										endforeach;
										?>
										<tbody>
										<tfoot>
										<tr style="border:1px solid #000;">
											<th colspan="4" style="border:1px solid #000;padding:3px;">Total</th>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tprice, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tpricebase, $etype); ?></th>
											<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $tqty; ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tbruto, $etype); ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tdiscount, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tnetto, $etype); ?></th>
										<?php endif; ?>
										</tr>
										</tfoot>
										</table>
<?php } ?>
<?php } ?>
										<br />
										<hr style="border: 1px solid #000" />
										<h2>Grand Total</h2>
							<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="padding:3px;">
										<th style="padding:3px;width:3%;"></th>
										<th style="padding:3px;width:5%;"></th>
										<th style="padding:3px;width:5%;"></th>
										<th style="padding:3px;width:5%;"> </th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<th style="padding:3px;width:15%;"></th>
										<?php endif; ?>
										<th style="padding:3px;width:10%;"></th>
										<th style="padding:3px;width:20%;"></th>
										<th style="padding:3px;width:15%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="padding:3px;width:12%;"> </th>
										<?php endif; ?>
										<th style="padding:3px;width:3%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="padding:3px;width:12%;"></th>
										<?php endif; ?>
										</tr>
										</thead>
										<tbody>
										<tr style="border:1px solid #000;">
										<?php if (array_search('3',$post['type']) !== false) : ?>
											<th colspan="8" style="border:1px solid #000;padding:3px;">Grand Total</th>
										<?php else : ?>
											<th colspan="7" style="border:1px solid #000;padding:3px;">Grand Total</th>
										<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gprice, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gpricebase, $etype); ?></th>
											<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $gqty; ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gbruto, $etype); ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gdiscount, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gnetto, $etype); ?></th>
										<?php endif; ?>
										</tr>
											</tbody>
											</table>
<?php } else { ?>
	<?php
	$gqty = 0;
	$gdiscount = 0;
	$gbruto = 0;
	$gnetto = 0;
	$gprice = 0;
	$gpricebase = 0;
	foreach($data as $key => $val) {
	?>
		<h2>Transaction by: <?php echo $val[0] -> createdby; ?></h2>
											<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="border:1px solid #000;padding:3px;">
										<th style="border:1px solid #000;padding:3px;width:3%;">No.</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">Date</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">User</th>
										<th style="border:1px solid #000;padding:3px;width:5%;">Trans No.</th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<th style="border:1px solid #000;padding:3px;width:15%;">Invoice No.</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;width:10%;">Reffer</th>
										<th style="border:1px solid #000;padding:3px;width:20%;">Descrpiton</th>
										<th style="border:1px solid #000;padding:3px;width:15%;">Product</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Price</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;width:12%;">Price Base</th>
										<?php endif; ?>
										<th style="border:1px solid #000;padding:3px;width:3%;">QTY</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Bruto</th>
										<th style="border:1px solid #000;padding:3px;width:12%;">Discount</th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="border:1px solid #000;padding:3px;width:12%;">Netto</th>
										<?php endif; ?>
										</tr>
										</thead>
										<tbody>
										<?php
										$i = 1;
										$tgl = '';
										$tqty = 0;
										$tdiscount = 0;
										$tbruto = 0;
										$tnetto = 0;
										$tprice = 0;
										$tpricebase = 0;
										foreach($val as $k => $v) :
										?>
										<tr style="border:1px solid #000;padding:3px;">
										<td style="border:1px solid #000;padding:3px;"><?php echo $i; ?>.</td>
										<td style="border:1px solid #000;padding:3px;">
										<?php
										if ($post['format'] == 2)
											$date = date('Y-m-d',$v -> tdate);
										else
											$date = __get_date($v -> tdate,1);
										if($tgl <> $date){
											$tgl = $date;
											echo $tgl;
										}
										?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> createdby; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tno; ?></td>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tinv; ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> reffer; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> tdesc; ?></td>
										<td style="border:1px solid #000;padding:3px;"><?php echo $v -> pname; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty),$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tpricebase,$etype); ?></td>
										<?php endif; ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $v -> tqty; ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(($v -> tprice/$v -> tqty)*$v -> tqty,$etype); ?></td>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($v -> tdiscount / $v -> ttypeitem,$etype); ?></td>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<td style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah(((($v -> tprice/$v -> tqty) - $v -> tpricebase)*$v -> tqty)-$v -> tdiscount,$etype); ?></td>
										<?php endif; ?>
										</tr>
										<?php
										$tqty += $v -> tqty;
										$tdiscount += $v -> tdiscount;
										$tpricebase += $v -> tpricebase;
										$tprice += ($v -> tprice/$v -> tqty);
										$tbruto += ($v -> tprice/$v -> tqty)*$v -> tqty;
										$tnetto += ((($v -> tprice/$v -> tqty)-$v->tpricebase)*$v -> tqty)-$v -> tdiscount;
										
										$gqty += $v -> tqty;
										$gdiscount += $v -> tdiscount;
										$gpricebase += $v -> tpricebase;
										$gprice += ($v -> tprice/$v -> tqty);
										$gbruto += ($v -> tprice/$v -> tqty)*$v -> tqty;
										$gnetto += ((($v -> tprice/$v -> tqty)-$v->tpricebase)*$v -> tqty)-$v -> tdiscount;
										++$i;
										endforeach;
										?>
										<tbody>
										<tfoot>
										<tr style="border:1px solid #000;">
											<th colspan="4" style="border:1px solid #000;padding:3px;">Total</th>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
											<th style="border:1px solid #000;padding:3px;"></th>
										<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;"></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tprice, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tpricebase, $etype); ?></th>
											<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $tqty; ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tbruto, $etype); ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tdiscount, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($tnetto, $etype); ?></th>
										<?php endif; ?>
										</tr>
										</tfoot>
										</table>
<?php } ?>
										<br />
										<hr style="border: 1px solid #000" />
										<h2>Grand Total</h2>
							<table border="0" style="border-collapse: collapse;width:100%">
										<thead>
										<tr style="padding:3px;">
										<th style="padding:3px;width:3%;"></th>
										<th style="padding:3px;width:5%;"></th>
										<th style="padding:3px;width:5%;"></th>
										<th style="padding:3px;width:5%;"> </th>
										<?php if (array_search('3',$post['type']) !== false) : ?>
										<th style="padding:3px;width:15%;"></th>
										<?php endif; ?>
										<th style="padding:3px;width:10%;"></th>
										<th style="padding:3px;width:20%;"></th>
										<th style="padding:3px;width:15%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="padding:3px;width:12%;"> </th>
										<?php endif; ?>
										<th style="padding:3px;width:3%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<th style="padding:3px;width:12%;"></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
										<th style="padding:3px;width:12%;"></th>
										<?php endif; ?>
										</tr>
										</thead>
										<tbody>
										<tr style="border:1px solid #000;">
										<?php if (array_search('3',$post['type']) !== false) : ?>
											<th colspan="8" style="border:1px solid #000;padding:3px;">Grand Total</th>
										<?php else : ?>
											<th colspan="7" style="border:1px solid #000;padding:3px;">Grand Total</th>
										<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gprice, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gpricebase, $etype); ?></th>
											<?php endif; ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo $gqty; ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gbruto, $etype); ?></th>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gdiscount, $etype); ?></th>
										<?php if (__get_roles('ProductPriceBase')) : ?>
											<th style="border:1px solid #000;padding:3px;text-align:right;"><?php echo __get_rupiah($gnetto, $etype); ?></th>
										<?php endif; ?>
										</tr>
											</tbody>
											</table>
<?php } ?>
                                        </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


</body>
</html>
