<html>
<title>Delivery Order</title>
<style>
html,body{margin:0;padding:0;font-size:14px;font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;font-style: normal;font-variant: normal;line-height: 16px;}
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
											<b>Pengirim:</b><br />
											<div style="font-size:12px">
									JAKVR
              <br />
									MAL CIPUTRA Lt.2 NO. U03
              <br /> GROGOL PETAMBURAN <br /> JAKARTA BARAT
              <br />
									TELP: 081 7190 021
									</div>
									<div style="clear:both;height:5px"></div>
				  <?php
				  $phone = explode('*',$detail[0] -> cphone);
					$addr = str_replace(',',', ',$detail[0] -> tdoaddr);
					$addr = str_replace("\n\n","\n",$addr);
				  $addr = explode(' ', $addr);
				  $raddr = '';
				  $i = 1;
				  foreach($addr as $k => $v) :
					if ($i % 3 == 0) {
						$raddr .= " " . $v . "<br />";
					}
					else {
						if (strlen($v) > 10)
						$raddr .= " " . $v . "<br />";
						else
						$raddr .= " " . $v;
					}
				  ++$i;
				  endforeach;
				  ?>
				  <b>Penerima:</b>
					<br />
				  <?php echo $detail[0] -> cname; ?>
					<br />
				  <?php echo $phone[0]; ?>
									<div style="clear:both;height:5px"></div>
                <div style="width:150px;text-transform: uppercase;">
				  <b>Alamat:</b>
					<br />
				  <?php echo $raddr; ?>
									<div style="clear:both;height:5px"></div>
				  </div>
				  <b>Informasi Pengiriman:</b>
					<br />
				  <?php echo $detail[0] -> doinfo; ?>
									<div style="clear:both;height:5px"></div>
				  <b>Daftar Produk:</b>
					<br />
				<?php
				$tqty = 0;
				$tprice = 0;
				foreach($products as $k => $v) : ?>
                <?php echo $v -> tqty; ?> QTY, <?php echo $v -> pname; ?><br />
                <?php
                endforeach;
                ?>

              <p style="text-align:left;font-size:12px">
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
