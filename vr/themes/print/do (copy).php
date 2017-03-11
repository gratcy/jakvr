<html>
<title>Delivery Order</title>
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
				<table border="0" style="border-collapse: collapse;">
                  <tr><td style="font-weight:bold;width:100px"></td><td style="">#<?php echo $detail[0] -> tno; ?></td></tr>
                </table>
                <br />
				<table border="0" style="border-collapse: collapse;">
                <thead>
				  <?php if ($detail[0] -> tcid > 0) : ?>
				  <?php
				  $phone = explode('*',$detail[0] -> cphone);
				  $addr = explode(' ', $detail[0] -> tdoaddr);
				  $raddr = '';
				  $i = 1;
				  foreach($addr as $k => $v) :
					if ($i % 3 == 0 && strlen($v) > 3) {
						$raddr .= " " . $v . "<br />";
					}
					else {
						$raddr .= " " . $v;
					}
				  ++$i;
				  endforeach;
				  ?>
                  <tr><td style="font-weight:bold;width:100px">Pengirim</td><td style="">: JakVR</td></tr>
                  <tr><td style="font-weight:bold;">Penerima</td><td style="">: <?php echo $detail[0] -> cname; ?></td></tr>
                  <tr><td style="font-weight:bold;">Telp</td><td style="">: <?php echo $phone[0]; ?></td></tr>
                  <tr><td style="font-weight:bold;">Alamat Tujuan </td><td style="">: <?php echo $raddr; ?></td></tr>
                  <tr><td style="font-weight:bold;">Informasi Pengiriman</td><td style="">: <?php echo $detail[0] -> doinfo; ?></td></tr>
                  <?php endif; ?>
                </thead>
                </tbody>
              </table>
              <br />

									<div  style="border-bottom:1px solid #000"></div>
									Daftar Produk: 
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
                  <td><?php echo $v -> tqty; ?> QTY, <?php echo $v -> pname; ?></td>
                </tr>
                <?php
                endforeach;
                ?>
                </tbody>
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
