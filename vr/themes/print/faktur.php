<html>
<title>Faktur</title>
<style>
html,body{margin:0;padding:0;font-size:9px}
table{font-size:9px;border-collapse:collapse;margin:0;padding:0;}
table th {border:1px solid #000;margin:0;padding:0;}
table td {margin:0;padding:0;}
table > tfoot > tr > td{border-top:1px solid #000;margin:0;padding:0;}
</style>
<body>
            <!-- Right side column. Contains tde navbar and content of tde page -->
            <aside class="right-side">                
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
<div class="box box-primary">

                                <!-- form start -->
                                    <div class="box-body">
										<div style="text-align:left;font-weight:bold;font-size:8px">
									JAKVR
              <br />
									MAL CIPUTRA Lt.2 NO. U03
              <br /> GROGOL PETAMBURAN <br /> JAKARTA BARAT
              <br />
									TELP: 081 7190 021
									</div>
              <br />
									<div  style="border-bottom:1px solid #000"></div>
              <br />
									<table border="0" style="border-collapse: collapse;">
                <thead>
				  <tr><td style="font-weight:bold;">Date</td><td style="">: <?php echo __get_date($detail[0] -> tdate,1); ?></td></tr>
				  <?php if ($detail[0] -> tcid > 0) : ?>
                  <tr><td style="font-weight:bold;">Customer</td><td style="">: <?php echo $detail[0] -> cname; ?></td></tr>
                  <?php endif; ?>
                  <tr><td style="font-weight:bold;">Transaction No.</td><td style="">: <?php echo $detail[0] -> tno; ?></td></tr>
				  <?php if ($detail[0] -> tdesc) : ?>
                  <!--<tr><td style="font-weight:bold;">Description</td><td style="">: <?php echo ($detail[0] -> tdesc ? $detail[0] -> tdesc : '-'); ?></td></tr>-->
                  <?php endif; ?>
                  <tr><td style="font-weight:bold;">Staff</td><td style="">: <?php echo $this -> privileges -> sesresult['unick']; ?></td></tr>
                </tr>
                </thead>
                </tbody>
              </table>
              <br />

									<div  style="border-bottom:1px solid #000"></div>
				<table border="0" style="border-collapse: collapse;width:100%">
                <thead>
                <tr>
                  <td style="width:30%"></td>
                  <td></td>
                </tr>
                </thead>
                <tbody>
				<?php
				$tqty = 0;
				$tprice = 0;
				foreach($products as $k => $v) : ?>
                <tr>
                  <td><?php echo $v -> pname; ?> <br /> <?php echo $v -> cwarranty; ?> days of warranty</td>
                  <td><?php echo $v -> tqty; ?> x <?php echo __get_rupiah(($v -> harga / $v -> tqty),1); ?></td>
                </tr>
                <?php
                $tprice += $v -> harga;
                $tqty += $v -> tqty;
                endforeach;
                ?>
                </tbody>
                <tfoot>
                <tr>
                  <td style="border: none;font-weight:bold;">Total</td>
                  <td style="border: none;font-weight:bold;"><?php echo __get_rupiah($tprice,1); ?></td>
                </tr>
                <tr>
                  <td style="border: none;font-weight:bold;">Discount</td>
                  <td style="border: none;font-weight:bold;"><?php echo ($detail[0] -> tdiscount > 0 ? __get_rupiah($detail[0] -> tdiscount,1) : '-'); ?></td>
                </tr>
                <tr>
                  <td style="font-weight:bold;border-top: 1px solid #000">Grand Total</td>
                  <td style="font-weight:bold;border-top: 1px solid #000"><?php echo __get_rupiah($detail[0] -> ttotal,1); ?></td>
               </tr>
                </tfoot>
                </table>
              <br />
              <p style="text-align:left">
				  <i>The Best of Virtual Reality Technology</i>
				  <br />
				  <i>JAKVR.COM</i>
              </p>
                                        <div class="form-group">
											
                                        </div>
                            </div>
                        </div>
                    </div>

                </section><!-- /.content -->
            </aside><!-- /.right-side -->


</body>
</html>
