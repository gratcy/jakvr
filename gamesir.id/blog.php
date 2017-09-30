<?php
$read = false;
$slug = '';
function __text_cuts($string, $trimLength=50) {
	$string = trim(strip_tags($string));
	$length = strlen($string);
	if ($length > $trimLength) {
		$count = 0;
		$prevCount = 0;
		$array = explode(" ", $string);
		foreach ($array as $word) {
			$count = $count + strlen($word);
			$count = $count + 1;
			if ($count > ($trimLength - 3)) return substr($string, 0, $prevCount) . ".";
			$prevCount = $count;
		}
	}
    else
		return $string;
}

$title = 'Blog GameSir | GameSir Indonesia';
$keywords = 'Jual Gamesir,gamesir,Smartphone Gamepad,Smartphone Controller,game controller,gamepad,bluetooth gamepad,android gamepad,pc controller,controller pc.bluetooth controller,android controller.';
$description = 'Artikel GameSir Cara Setup GameSir, mulai dari HP, PC, PS3 sampai Android TV';
$ogimg = 'http://gamesir.id/assets/img/GameSir-Logo.jpg';
if (isset($_SERVER['PATH_INFO'])) {
	$read = true;
	$slug = substr($_SERVER['PATH_INFO'],1);
}
$str = file_get_contents('tmp/tmp.json');
$arr = json_decode($str, true);
if ($read && !empty($slug)) {
	$post = array();
	foreach($arr['posts'] as $k => $v) {
		if ($v['slug'] == $slug) $post[] = $v;
	}
	if (!$post) {
		header('location: https://blog.gamesir.id/');
		die;
	}
	$title = $post[0]['title'] . ' | GameSir Indonesia';
	$keywords = $post[0]['title'];
	$description = __text_cuts(strip_tags($post[0]['excerpt']),160);
	$ogimg = $post[0]['thumbnail_images']['full']['url'];
}
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <link rel="shortcut icon" href="/favicon.ico">
    <meta property="og:url" content="http://gamesir.id<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="fb:app_id" content="183162455414859" />
    <meta property="fb:admins" content="100000149676767" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:image" content="<?php echo $ogimg; ?>" />
    <meta property="og:site_name" content="gamesir.id" />
    <meta property="og:description" content="<?php echo $description; ?>" />
    <style rel="stylesheet" id="gamesir-styles"></style>
    <script>(function(){function a(){var test = 'test';try{localStorage.setItem(test, test);localStorage.removeItem(test);return true;}catch(e){return false;}}function b(){document.getElementById('gamesir-styles').textContent=localStorage.KufedStylesv1}function c(type){var c=new XMLHttpRequest();c.open("GET",'/assets/css/plugins.min.css',true);c.onload=function(){if(c.status>=200&&c.status<400){if(type){document.getElementById('gamesir-styles').textContent=c.responseText}else{localStorage.KufedStylesv1=c.responseText;b()}}};c.send()}if(a() === true){try{if(localStorage.KufedStylesv1){b()}else{c()}}catch(a){}}else{c(true)}}());</script>
    <link href="/assets/css/style.css?<?php echo time(); ?>" rel="stylesheet">
  </head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97140766-1', 'auto');
  ga('send', 'pageview');

</script>
<style>
.answer {display:none}
.question {cursor:pointer;}
.question > a {color:#000}
.form-group, .pull-right{padding-top:20px;}	
.pull-left, .pull-left > a, .list-inline li a, .list-inline h4{color:#163247;}
.pull-left .earth{background-image:url(/assets/img/earth_blue.png)}
.pull-right li a:hover{color:#00b4ff;}
.blog-desc img, .blog-desc > p > img, .aligncenter {text-align:center;margin:0 auto}
.tw-swapa {text-align:center;margin:0 auto}
.tw-swapa {text-align:center;margin:0 auto}
</style>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/assets/img/logo.png"></a>
        </div>
        <div class="collapse navbar-collapse">        
          <ul class="nav navbar-nav navbar-right">
				<li><a href="/">home</a></li>
			<li> <a href="product_main" >Produk</a></li>
          	<li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);" >Etalase</a>
          	<ul class="dropdown-menu">
			<li><a href="https://www.tokopedia.com/gamesir" target="_blank">Tokopedia</a></li>
          	<li><a href="https://www.bukalapak.com/gamesir" target="_blank">Bukalapak</a></li>
          	<li><a href="http://www.lazada.co.id/gamesir/?boost=3&jakvr&sort=popularity&viewType=gridView&fs=1" target="_blank">Lazada</a></li>
          	<li><a href="https://shopee.co.id/gamesir" target="_blank">Shopee</a></li>
          	</ul>
          	</li>
          	<li> <a href="/faq" class="active">Support</a></li>
          	<li class="active"> <a href="https://blog.gamesir.id/" >Blog</a></li>
          	<li> <a href="/contact-us" >Hubungi Kami</a></li>
                    </ul>   
        </div><!--/.nav-collapse -->
      </div>
    </div>

<div class="wrapper-page"> 
<!-- / .container -->
      <div class="container">
        <div class="row">
			<div class="col-sm-12">
				<?php
if ($read && !empty($slug)) {
?>
<h1><?php echo $post[0]['title']?></h1>
<div class="blog">
<div class="blog-desc" style="color:#444">
<p class="list-group-item-text">
	<span class="pull-right">
	<?php echo $post[0]['author']['name']; ?> | 
	<?php echo date('d/m/Y',strtotime($post[0]['date']))?>
	</span>
<div style="clear:both"></div>
</p>
<br />
<p class="list-group-item-text">
	<a href="https://blog.gamesir.id//<?php echo $post[0]['slug']; ?>" title="<?php echo $post[0]['title']; ?>"><img style="width:100%" src="<?php echo $post[0]['thumbnail_images']['full']['url']; ?>" title="<?php echo $v['title']; ?>" alt="<?php echo $v['title']; ?>"></a>
</p>
<br />
<p><?php echo __text_cuts($post[0]['content'],1000);?></p>
</div>
<p>&nbsp;</p>
<p class="aligncenter"><a target="_blank" href="http://jakvr.com/<?php echo $post[0]['slug']; ?>" title="JakVR | <?php echo $post[0]['title']?>">Readmore at JakVR.Com</a></p>
</div>
<?php
}
else {
?>
<h1>Blog GameSir</h1>
<div class="list-group">
<?php
$str = file_get_contents('tmp/tmp.json');
$arr = json_decode($str, true);
foreach($arr['posts'] as $k => $v) {
?>
<div class="list-group-item">
<a href="https://blog.gamesir.id//<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>"><h4 class="list-group-item-heading"><?php echo $v['title']; ?> <span class="pull-right"><?php echo  $v['author']['name'] . ' | ' . date('d/m/Y',strtotime($v['date']))?></span></h4></a>
<br />
<p class="list-group-item-text aligncenter">
	<a href="https://blog.gamesir.id//<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>"><img style="width:80%" src="<?php echo $v['thumbnail_images']['full']['url']; ?>" title="<?php echo $v['title']; ?>" alt="<?php echo $v['title']; ?>"></a>
</p>
<p class="list-group-item-text">
<?php echo strip_tags($v['excerpt']); ?></p>
<p class="text-right"><a href="https://blog.gamesir.id//<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>">MORE</a></p>
</div>
<?php
}
?>
</div>
<?php
}
?>
        </div>
        </div> <!-- / .row -->
      </div> <!-- / .container -->
      
    </div>

  <!-- Footer -->
    <div class="index-footer">
      <div class="container hidden-xs">
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="col-xs-12 col-sm-3 col-md-3">
    <h4>Product</h4>
    
      <li><a href="http://gamesir.id/g4" title="GameSir G4">G4</a></li><li><a href="http://gamesir.id/t1s" title="GameSir T1s">T1s</a></li><li><a title="GameSir M2" href="http://gamesir.id/product_main">M2</a></li><li><a href="http://gamesir.id/g4s" title="GameSir G4s">G4s</a></li><li><a title="GameSir G3" href="http://gamesir.id/g3">G3</a></li><li><a title="GameSir G3f" href="http://gamesir.id/g3f">G3f</a></li><li><a title="GameSir G3w" href="http://gamesir.id/g3w">G3w</a></li><li><a href="http://gamesir.id/g3v" title="GameSir G3v">G3v</a></li><li><a title="GameSir G3s" href="http://gamesir.id/g3s">G3s</a></li><li><a title="GameSir G2u" href="http://gamesir.id/g2u">G2u</a></li>  </div>
<div class="col-xs-12 col-sm-3 col-md-3">
    <h4>Reviews</h4>
    
<li><a href="http://jakvr.com/gamepad-gamesir-g4/" title="Review Pengguna">Review Pengguna</a></li>
<li><a href="https://www.youtube.com/channel/UCZhblvtYPVNoxR6APnRpbCA" title="Review Video" >Review Video</a></li>
<li><a href="https://blog.gamesir.id/" title="GameSir Blog" >GameSir Blog</a></li>
    </div>
<div class="col-xs-12 col-sm-3 col-md-3">
    <h4>Support</h4>
    
        	<li><a href="http://gamesir.id/faq" title="FAQ" >FAQ</a></li>
<li><a href="http://gamesir.id/tutorial-setup-g3s" title="Setup Tutorial">Setup Tutorial</a></li>
<li><a href="http://jakvr.com/gamesirworld-emulator-happychick/" title="Download APP" >Download APP</a></li>
<li><a href="https://www.tokopedia.com/gamesir" title="Etalase" >Etalase</a></li>
<li><a href="http://gamesir.id/garansi-gamesir" title="Garansi" >Garansi</a></li>
    </div>
<div class="col-xs-12 col-sm-3 col-md-3">
    <h4>About us</h4>
    
        	<li><a href="/about-us" title="Tentang GameSir" >Tentang GameSir</a></li>
<li><a href="http://gamesir.id/contact-us" title="Hubungi Kami" >Hubungi Kami</a></li>
<li><a href="http://gamesir.id/distributor" title="Distributor" >Distributor</a></li>
<li><a href="http://gamesir.id/contact-us" title="Marketing" >Marketing</a></li>
    </div>
    <br />
        </div> <!-- / .row -->
      </div> <!-- / .container -->
    </div>
   </div>
  <footer>
      <div class="container">
        <div class="pull-left">
          <div class="form-group">
            <label class="pull-left"><div class="earth"></div></label>
            <div class="pull-left">
			-<a href="http://gamesir.id/">Indonesia</a> 
            -<a href="http://www.gamesir.hk/" target="_blank">English</a>
            
            </div>
          </div>
        </div>
        <div class="pull-left cpbottom">
          <p class="text-center">Copyright © <?php echo date('Y'); ?> <a href="http://www.gamesir.id" target="_blank" title="GameSir Indonesia"><font color="#FFFFFF">GameSir Indonesia</font></a>. All Rights Reserved</p>
        </div>
        <div class="pull-right">
          <ul class="list-inline">
            <li><h4>Follow Us</h4></li>
            <li><a href="https://www.facebook.com/GameSirIndonesia/"><i class="fa fa-facebook"></i></a></li>
            <li><a href="https://www.instagram.com/gamesir.id/"><i class="fa fa-instagram"></i></a></li>
            <li class="hide"><a href="https://plus.google.com/+JakvrGadget"><i class="fa fa-google-plus"></i></a></li><li><a href="https://twitter.com/gamesirid"><i class="fa fa-twitter"></i></a></li>
            <li><a href="https://www.youtube.com/channel/UCZhblvtYPVNoxR6APnRpbCA"><i class="fa fa-youtube-play"></i></a></li>
          </ul>
        </div>
      </div>
    
    <!-- JavaScript -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/scrolltopcontrol.js"></script>
    <script src="/assets/js/lightbox-2.6.min.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/index.js"></script>
</body>
</html>
