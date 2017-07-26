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

$title = 'BoboVR News - BoboVR Indonesia';
$keywords = 'BoboVR News, BOBOVR Z4, Jual BoboVR Murah, VR, Virtual Reality, Google Cardboard, Oculus Rift, Smartphone VR, Smartphone';
$description = 'BoboVR News updates about BoboVR technnology, Review, Tutorial, Setup etc';
$ogimg = 'http://bobovr.id/assets/img/xz_logoen.jpg';
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
		header('location: http://bobovr.id/news');
		die;
	}
	$title = $post[0]['title'] . ' | BoboVR Indonesia';
	$keywords = $post[0]['title'];
	$description = __text_cuts(strip_tags($post[0]['excerpt']),160);
	$ogimg = $post[0]['thumbnail_images']['full']['url'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?php echo $title; ?></title>
    <meta name="keywords" content="<?php echo $keywords; ?>">
    <meta name="description" content="<?php echo $description; ?>">
    <meta property="og:url" content="http://bobovr.id<?php echo $_SERVER['REQUEST_URI']; ?>" />
    <meta property="fb:app_id" content="183162455414859" />
    <meta property="fb:admins" content="100000149676767" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $title; ?>" />
    <meta property="og:image" content="<?php echo $ogimg; ?>" />
    <meta property="og:site_name" content="gamesir.id" />
    <meta property="og:description" content="<?php echo $description; ?>" />
<link rel="shortcut icon" href="/favico.ico" type="image/x-icon">
<link rel="bookmark" href="/favico.ico">
<link type="text/css" rel="stylesheet" href="/assets/style.css?v2" />
<link type="text/css" rel="stylesheet" href="/assets/twentytwenty.css">
<link type="text/css" href="/assets/bootstrap.min.css" rel="stylesheet" />
<script type="text/javascript" src="/assets/jquery.js"></script>
<script type="text/javascript" src="/assets/bootstrap.min.js"></script>
<style type="text/css">
.twentytwenty-container { width: 100%; height: 470px; margin: 0 auto; font-family: arial;}
.twentytwenty-container img{ width:100%; margin:0 auto;}

.flexslider { position: relative; height:650px; overflow: hidden; background: url(assets/img/loading.gif) 50% no-repeat;}
.slides { position: relative; z-index: 1;}
.slides li { height:580px;}
.slides li p{ padding-top:540px; color:#666;}
.flex-control-nav { position: absolute; bottom: 10px; z-index: 2; width: 100%; text-align: center;}
.flex-control-nav li { display: inline-block; width: 14px; height: 14px; margin: 0 5px; *display: inline; zoom: 1;}
.flex-control-nav a { display: inline-block; width: 14px; height: 14px; line-height: 40px; overflow: hidden; background: url(assets/img/z4_dot.png) right 0 no-repeat; cursor: pointer;}
.flex-control-nav .flex-active { background-position: 0 0;}
.news_conrt{padding-left:35px;}
</style>
</head>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97140766-2', 'auto');
  ga('send', 'pageview');

</script>
<body>

<style type="text/css">
.navigation-up .navigation-v3 li{float:left; margin:0 15px;}
.navigation-up .navigation-v3 .nav-up-selected{ color:#75a208; border-bottom:4px solid #92cb09;}
.navigation-up .navigation-v3 .nav-up-selected-inpage{ color:#75a208; border-bottom:4px solid #92cb09; padding:0 5px; margin:0 20px;}
.navigation-up .navigation-v3 li h2{font-weight:normal; font-size:16px;}
.navigation-up .navigation-v3 li h2 a{ margin:0 1px; display:inline-block; height:50px; line-height:50px; font-family:"microsoft yahei"; color:#333;}
.navigation-up .navigation-v3 li h2 a:hover{color:#75a208;}
.navigation-down{position:absolute;top:85px;left:0px;width:100%; background:#FFF;}
.navigation-down .nav-down-menu{width:100%;margin:0;background:#fff; position:fixed;border-bottom:1px solid #e7e7e7}
.navigation-down .nav-down-menu .navigation-down-inner{margin:auto;width:100%;position:relative}

.menu_xial{ width:42%; float:right; height:auto; overflow:hidden; padding:5px 10px; margin:0}
.menu_xial li{ float:left; padding:10px; font-size:13px;}
.menu_xial li a{ color:#999; padding:5px;}
.menu_xial li a:hover{ color:#75a208; text-decoration:underline;}
.menu_xial li img{ border:none; padding-bottom:10px;}
.menu_xial li p{ font-size:15px; text-align:center; padding-right:10px; padding-bottom:5px;}
.menu_xial li p span{ text-align:center; color:#fff;}
</style>
<script type="text/javascript">
$(document).ready(function(){
	var qcloud={};
	$('[_t_nav]').hover(function(){
		var _nav = $(this).attr('_t_nav');
		clearTimeout( qcloud[ _nav + '_timer' ] );
		qcloud[ _nav + '_timer' ] = setTimeout(function(){
		$('[_t_nav]').each(function(){
		$(this)[ _nav == $(this).attr('_t_nav') ? 'addClass':'removeClass' ]('nav-up-selected');
		});
		$('#'+_nav).stop(true,true).slideDown(200);
		}, 150);
	},function(){
		var _nav = $(this).attr('_t_nav');
		clearTimeout( qcloud[ _nav + '_timer' ] );
		qcloud[ _nav + '_timer' ] = setTimeout(function(){
		$('[_t_nav]').removeClass('nav-up-selected');
		$('#'+_nav).stop(true,true).slideUp(200);
		}, 150);
	});
});
</script>

<!--头部 开始-->
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">

	<div class="navigation-up">
		<div class="navigation-inner">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/"><img src="/assets/img/xz_logoen.jpg" border="0"></a>
		</div>
        	<!--menu start-->
		<div class="collapse navigation-v3 navbar-collapse">        
			<ul class="nav navbar-nav navbar-right">
					<li class="nav-up-selected-inpage" _t_nav="home">
						<h2>
							<a href="http://bobovr.id/">HOME</a>
						</h2>
					</li>
					<li class="" _t_nav="productx1">
						<h2>
							<a href="http://bobovr.id/z5">Z5<img src="/assets/img/index_new.jpg" style="margin-bottom:10px;" /></a>
						</h2>
					</li>
					<li class="" _t_nav="productx1">
						<h2>
							<a href="http://bobovr.id/x1">X1<img src="/assets/img/index_new.jpg" style="margin-bottom:10px;" /></a>
						</h2>
					</li>

					<li class="" _t_nav="">
						<h2>
							<a href="http://bobovr.id/s2">S2<img src="/assets/img/index_new.jpg" style="margin-bottom:10px;" /></a>
						</h2>
					</li>
					<li class="" _t_nav="product">
						<h2>
							<a href="http://bobovr.id/z4-mini">BOBOVR Z4 / MINI</a>
						</h2>

					</li>
					<li class="" _t_nav="solution">
						<h2>
							<a href="http://bobovr.id/download">DOWNLOAD</a>
						</h2>
					</li>
					<li class="" _t_nav="etalase">
						<h2>
							<a href="javascript:void(0);">ETALASE</a>
						</h2>
					</li>
					<li _t_nav="support">
						<h2>
							<a href="http://bobovr.id/contact-us">HUBUNGI KAMI</a>
						</h2>
					</li>
                                     
				</ul>
			</div>
            <!--menu end-->
		</div>
	</div>
    
	<div class="navigation-down">
		<div id="product" class="nav-down-menu menu-1" style="display: block;" _t_nav="product">
			<div class="navigation-down-inner">
				<ul class="menu_xial">
                	<li style="margin-left:0px;"><a href="http://bobovr.id/z4-mini">BOBOVR Z4 MINI</a></li>
                       <li><a href="http://bobovr.id/bobovr-z4/">BOBOVR Z4</a></li>
                	<li><a href="http://bobovr.id/bobovr-z4-specification">PARAMETER</a></li>
                </ul>
			</div>
		</div>
		<div id="solution" class="nav-down-menu menu-3 menu-1" style="display: none;" _t_nav="solution">
			<div class="navigation-down-inner">
				<ul class="menu_xial">
                	<li style="margin-left:260px;"><a href="http://bobovr.id/download">IOS</a></li>
                	<li><a href="http://bobovr.id/download">Android</a></li>
                </ul>
			</div>
		</div>
		<div id="etalase" class="nav-down-menu menu-2 menu-1" style="display: none;" _t_nav="etalase">
			<div class="navigation-down-inner">
				<ul class="menu_xial">
			<li><a href="https://www.tokopedia.com/koekmurah/etalase/virtual-reality" target="_blank">Tokopedia</a></li>
          	<li><a href="https://www.bukalapak.com/koekmurah" target="_blank">Bukalapak</a></li>
          	<li><a href="http://www.lazada.co.id/gamesir/?boost=3&jakvr&sort=popularity&viewType=gridView&fs=1" target="_blank">Lazada</a></li>
          	<li><a href="https://shopee.co.id/shop/6994756/search/?shopCollection=3681279" target="_blank">Shopee</a></li>
                </ul>
			</div>
		</div>
		</div>
	</div>
</div>
</div>
<!--头部 结束-->




<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<div class="clear"></div>
<?php
if (!$read && empty($slug)) {
?>
<div style="text-align:center"><h1>BoboVR News</h1></div>
<?php
}
?>
<div class="news_bg">
	<div class="news_bga">
  
				<?php
if ($read && !empty($slug)) {
?>
<div class="xqy_bgal">
        	<h2><?php echo $post[0]['title']?></h2>
            <ul class="xqy_bgaltime">
            	<li class="tico"><?php echo date('d/m/Y',strtotime($post[0]['date']))?></li>
            	<li class="ticoa">Posted by <?php echo $post[0]['author']['name']; ?></li>
            	<li class="ticob">Permalink</li>
            </ul>
            <h4><?php echo $post[0]['title']?></h4>
            
<br />
<p class="list-group-item-text">
	<a href="http://bobovr.id/news/<?php echo $post[0]['slug']; ?>" title="<?php echo $post[0]['title']; ?>"><img style="width:100%" src="<?php echo $post[0]['thumbnail_images']['full']['url']; ?>" title="<?php echo $v['title']; ?>" alt="<?php echo $v['title']; ?>"></a>
</p>
<br />
            <p><?php echo __text_cuts($post[0]['content'],1000);?></p>
            
            <p>&nbsp;</p>
<p class="aligncenter"><a target="_blank" href="http://jakvr.com/<?php echo $post[0]['slug']; ?>" title="JakVR | <?php echo $post[0]['title']?>">Readmore at JakVR.Com</a></p>
<hr />
<p class="aligncenter" style="text-align:center"><a href="http://bobovr.id/news" title="Back to News"><b>Back to News</b></a></p>

        </div>
<?php
}
else {
?>
<?php
$str = file_get_contents('tmp/tmp.json');
$arr = json_decode($str, true);
foreach($arr['posts'] as $k => $v) {
?>
        <div class="news_con">
        	<div class="news_conl">
            	<a href="http://bobovr.id/news/<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>"><img alt="<?php echo $v['title']; ?>" title="<?php echo $v['title']; ?>" src="<?php echo $v['thumbnail_images']['full']['url']; ?>" /></a>
            </div>
        	<div class="news_conr">
            	<h4><a href="http://bobovr.id/news/<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>"><?php echo $v['title']; ?></a></h4>
                <p><?php echo strip_tags($v['excerpt']); ?></p>
                <div class="news_conrt">
                    <ul>
                        <li class="icoa"><?php echo date('d/m/Y',strtotime($v['date'])); ?></li>
                        <li class="icob"><a href="#">Posted by <?php echo $v['author']['name']; ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
<?php
}
?>
<?php
}
?>
    </div>
</div>

<div style="clear:both"></div>
<p>&nbsp;</p>
<div class="index_foot">
    <div class="container">
	<div class="index_foota">
    	<div class="index_footal index_footalen">
        	<ul>
            	<li><a href="http://bobovr.id/contact-us/">HUBUNGI KAMI</a></li>
                 <li><a href="https://www.tokopedia.com/koekmurah/etalase/virtual-reality">ETALASE</a></li>
            	<li><a href="http://bobovr.id/news/">NEWS</a></li>
            </ul>
            <p>ICP filing number: DKI Jakarta ICP +62 817 190 021  </p>
            <p>&copy; 2017 BoboVR Indonesia | Unofficial Website BoboVR</p>
        </div>
    	<div class="index_footar">
        	<ul>
            	<li class="lxc"><img src="/assets/img/index_mail.png" /></li>
            	<li class="lxd">adrysunarto@jakvr.com</li>
            </ul>
        </div>
    </div>
    </div>
</div>
<script type="text/javascript" src="/assets/backtop.js"></script>
<div class="soc_med">
  <ul class="clearenter">
    <li>
      <a href="https://www.facebook.com/jakvrcom"><img src="http://rss.indogamers.com/system/views/default/images/side_fb.jpg"></a>
      <div class="show_soc_med">
        <span>
          <div class="fb-like fb_iframe_widget" data-href="https://www.facebook.com/jakvrcom" data-width="300" data-layout="standard" data-action="like" data-show-faces="false" data-share="false" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=1778992242382976&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fjakvrcom&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=300"><span style="vertical-align: bottom; width: 300px; height: 20px;"><iframe name="ff375429d9f9bc" width="300px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v2.7/plugins/like.php?action=like&amp;app_id=1778992242382976&amp;channel=http%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F_dMxoUH0Bax.js%3Fversion%3D42%23cb%3Df6efe115970c9c%26domain%3Djakvr.com%26origin%3Dhttp%253A%252F%252Fjakvr.com%252Ff9309661c25894%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fwww.facebook.com%2Fjakvrcom&amp;layout=standard&amp;locale=en_US&amp;sdk=joey&amp;share=false&amp;show_faces=false&amp;width=300" style="border: none; visibility: visible; width: 300px; height: 20px;" class=""></iframe></span></div>
        </span>
      </div>
    </li>
    <li>
      <a href="https://instagram.com/jakvr"><img src="http://jakvr.com/wp-content/uploads/2017/01/Instagram.png"></a>
      <div class="show_soc_med" style="width: 280px;">
        <span>
          <a href="https://www.instagram.com/jakvr/" class="" data-show-count="true">Follow @jakvr</a>
        </span>
      </div>
    </li>
    <li>
      <a href="https://plus.google.com/JakvrGadget"><img src="http://rss.indogamers.com/system/views/default/images/side_plus.jpg"></a>
      <div class="show_soc_med">
        <span>
          <div id="___page_0" style="text-indent: 0px; margin: 0px; padding: 0px; background: transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 300px; height: 106px;"><iframe ng-non-bindable="" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 300px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 106px;" tabindex="0" vspace="0" width="100%" id="I0_1492538199045" name="I0_1492538199045" src="https://apis.google.com/u/0/_/widget/render/page?usegapi=1&amp;href=https%3A%2F%2Fplus.google.com%2F%2BJakvrGadget&amp;layout=landscape&amp;rel=publisher&amp;origin=http%3A%2F%2Fjakvr.com&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.en.TZG5CT2iX2s.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Frs%3DAGLTcCPeqiX9n5v1QkE75Er_x0NQeANiwg#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1492538199045&amp;parent=http%3A%2F%2Fjakvr.com&amp;pfname=&amp;rpctoken=35056314" data-gapiattached="true" title="+Badge"></iframe></div>
        </span>
      </div>
    </li>
  </ul>
</div>
</body>
</html>
