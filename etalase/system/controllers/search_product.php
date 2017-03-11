<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class search_product extends controller {
	function __construct() {
		parent::controller();
		parent::database();
		parent::module('models', 'models_products');
	}
	
	function execute() {
		global $conf;
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Pragma: no-cache");
		$keyword = addslashes($this -> rg -> post('keyword'));
		if ($keyword) {
			$ck = $this -> models_products -> __get_variation($keyword);
			if ($ck) {
			$color = $this -> models_products -> __get_variation_color_list($ck['pid']);
			$images = $this -> models_products -> __get_images_variation($ck['pvid']);
			$cl = '';
			$res = '
				<!-- Navigation -->
				<nav class="site-nav">
					<h3 class="visually-hidden">Navigation</h3>
					<ul id="menu">';
					while($r = $this -> db -> result_sql($color)) :
						if ($ck['color'] == $r['cname'])
							$res .= '<li class="active"><a href="#'.__replace_link($r['cname']).'" title="'.$r['pname'].'">'.ucwords($r['cname']).'</a></li>';
						else
							$res .= '<li><a href="#'.__replace_link($r['cname']).'" title="'.$r['pname'].'">'.ucwords($r['cname']).'</a></li>';
						$cl .= '<li><a href="javascript:void(0);" title="'.$r['pname'].'"><span style="display:block;background-color:'.$r['cdesc'].';border:1px solid #ccc;height:25px;width:25px"></span></a></li>';
					endwhile;
					$res.= '
					</ul>
				</nav>

				<!-- Main content -->
				<div id="main">
						<!-- Section About -->
						<section id="'.__replace_link($ck['color']).'" class="main-section">
							<h1 class="title-product">'.$ck['vname'].'</h1>
							<h4>Informasi Produk :</h4>
							<table border="0" class="info-product">
							<tr><td style="width:30%">SKU</td><td style="width:2%">:</td><td> '.$ck['psku'].'</td></tr>
							<tr><td>Berat</td><td>:</td><td> '.__get_weight($ck['pweight']).'</td></tr>
							<tr><td>Garansi</td><td>:</td><td> '.__get_guarantee($ck['pguarantee']).'</td></tr>
							<tr><td>Pilihan Warna</td><td>:</td><td> <ul class="color-list">'.$cl.'</ul></td></tr>
							</table>
							
								<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:600px;height:400px;overflow:hidden;visibility:hidden;">
			<!-- Loading Screen -->
			<div data-u="loading" style="position:absolute;top:0px;left:0px;background-color:rgba(0,0,0,0.7);">
				<div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				<div style="position:absolute;display:block;background:url(\''.$conf['site']['__tpl'].'/assets/loading.gif\') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
			</div>
			<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:600px;height:300px;overflow:hidden;">';
						$res .= '
				<div>
					<img data-u="image" src="'.$conf['product_images']['__url'].$ck['pimg'].'" />
					<div data-u="thumb">
						<img src="'.$conf['product_images']['__url'].$ck['pimg'].'" />
					</div>
				</div>';
					while($r = $this -> db -> result_sql($images)) :
			$res .= '
				<div>
					<img data-u="image" src="'.$conf['product_images']['__url'].$r['pimages'].'" />
					<div data-u="thumb">
						<img src="'.$conf['product_images']['__url'].$r['pimages'].'" />
					</div>
				</div>';
				endwhile;
			 $res .= '
			</div>
			<!-- Thumbnail Navigator -->
			<div data-u="thumbnavigator" class="jssort16" style="position:absolute;left:0px;bottom:0px;width:600px;height:100px;" data-autocenter="1">
				<!-- Thumbnail Item Skin Begin -->
				<div data-u="slides" style="cursor: default;">
					<div data-u="prototype" class="p">
						<div data-u="thumbnailtemplate" class="t"></div>
					</div>
				</div>
			</div>
			<div data-u="navigator" class="jssorb03" style="bottom:116px;right:16px;">
				<div data-u="prototype" style="width:21px;height:21px;">
					<div data-u="numbertemplate"></div>
				</div>
			</div>
		</div>
		
							<h1>Overview of '.$ck['vname'].'</h1><br />
		<div class="product-desc">'.$ck['vdesc'].'</div>
						</section>
						<h2 class="related-items">Related Items</h2>
						<ul class="all-variation">';
						$random = $this -> models_products -> __get_random_product($ck['pname']);
						while($r = $this -> db -> result_sql($random)) :
							$res .= '<li><a href="javascript:void(0);" title="'.$r['pname'].'"><img src="'.$conf['product_images']['__url'].$r['pimages'].'"></a><span class="variation-title">'.$r['pname'].'</span><span class="variation-price">'.__get_rupiah($r['pprice'],1).'</span></li>';
						endwhile;
						$res .= '</ul>
				</div>';
				$res .= '<script>
				jgtContentTabs();
				product_ajax_click(\'color-list\');
				product_ajax_click(\'all-variation\');
				</script>';
			__ajax_doaction($res);
		}
		}
	}
}
