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

$title = 'Blog - Fiit VR Indonesia';
$keywords = 'Jual FiitVR, Jual Kacamata VR, Jual Fiit VR, Jual Fiit VR Termurah dan terbaik, FiitVR 2N, FiitVR 2F, FiitVR 3F, Virtual Reality';
$description = 'Kumpulan artikel mengenai Fiit VR. FiitVR Kacamata VR Terbaik.';
$ogimg = 'http://fiitvr.id/assets/logo.png';
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
		header('location: http://fiitvr.id/blog');
		die;
	}
	$title = $post[0]['title'] . ' | Fiit VR Indonesia';
	$keywords = $post[0]['title'];
	$description = __text_cuts(strip_tags($post[0]['excerpt']),160);
	$ogimg = $post[0]['thumbnail_images']['full']['url'];
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">    
  <head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<!-- InstanceBeginEditable name="head" -->  
<!--
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
-->
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
    <link href="/assets/lib.min.css" rel="stylesheet" type="text/css" />
<link href="/assets/page_contact.min.css" rel="stylesheet" type="text/css" />
  
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<link rel="bookmark" href="/favicon.ico">
    <script type="text/javascript" src="/assets/jquery.js"></script>
<script type="text/javascript" src="/assets/lib.min.js"></script>
  
<script type="text/javascript" language="javascript">
$(document).ready(function(){

$('#elem-FrontColumns_navigation01-1464773953300 ul> li:eq(4) a').addClass("current");
})
</script>
    <!-- InstanceEndEditable -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-97140766-3', 'auto');
  ga('send', 'pageview');

</script>
  </head>  
  <body  id="contact"> 
    <div class="pageWidth" id="box_root"> 
      <!-- 头部导航开始 -->  
      <div id="box_header"> 
        <div id="box_header_sub1"> 
          <div id="box_header_sub1_sub1"> 
            <div id="box_header_sub1_sub1_sub1"> 
              <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464773901369" name="说明页">  
                <div id="FrontSpecifies_show01-1464773901369" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit">
       <div id="hotline">
	<p>+62 817 190 021</p>
</div>
<div id="change">
</div></div>
</div> 
              </div>
            </div>  
            <div id="box_header_sub1_sub1_sub2"> 
              <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464773916660" name="说明页">  
                <div id="FrontSpecifies_show01-1464773916660" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit">
       <div id="topicon">
	<div class="topiconimg">
		<img src="/assets/img/topicon.png" />
		<div class="topicona">
			<a href="http://jakvr.com/" target="_blank">JakVR</a></div>
	</div>
</div></div>
</div> 
              </div>
            </div>  
            <div class="clearBoth"></div> 
          </div> 
        </div>  
        <div id="box_header_sub2"> 
          <div id="box_header_sub2_sub1"> 
            <div id="box_header_sub2_sub1_sub1"> 
              <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464773933430" name="说明页">  
                <div id="FrontSpecifies_show01-1464773933430" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit">
       <a href="/"><img src="/assets/logo.png" /></a> <script>
$(document).ready(function(){
$("#box_left_sub3 UL LI:eq(0)").css("background","url(/assets/img/rc_icon22.png) no-repeat center");
$("#box_left_sub3 UL LI:eq(1)").css("background","url(/assets/img/rc_icon32.png) no-repeat center");
$("#box_left_sub3 UL LI:eq(2)").css("background","url(/assets/img/rc_icon42.png) no-repeat center");
})
</script>
<link href="/assets/animate.css" rel="stylesheet" type="text/css" />
<script src="/assets/wow.min.js"></script><script> 
if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
new WOW().init();
};
</script>
<script language="javascript" type="text/javascript">
$(document).ready(function(){
  $(".FrontColumns_navigation01-d2_c1 UL.nav-first LI:eq(0)").addClass("nav_hot");
  $(".FrontColumns_navigation01-d2_c1 UL.nav-first LI:eq(3)").addClass("nav_hot2");
}) 
</script></div>
</div> 
              </div>
            </div>  
            <div id="box_header_sub2_sub1_sub2"> 
              <div xmlns="" class="columnSpace" id="elem-FrontColumns_navigation01-1464773953300" name="栏目导航">  
                <script type="text/javascript">
	//<![CDATA[
	FrontColumns_navigation01['FrontColumns_navigation01-1464773953300_init'] = function (){
		FrontColumns_navigation01.d2ddlevelsmenu.init("d2menubar_FrontColumns_navigation01-1464773953300", "topbar");
	}
	$(FrontColumns_navigation01['FrontColumns_navigation01-1464773953300_init']);
	// ]]>
</script>
<div id="FrontColumns_navigation01-1464773953300" class="FrontColumns_navigation01-d2_c1"><div id="d2menubar_FrontColumns_navigation01-1464773953300" class="mattblackmenu">
		<ul class="nav-first">
			<li class="first nav_hot">
						<a href="http://fiitvr.id/fiitvr-pro3f" title="3F">
							3F</a>
						</li>
				<li>
						<a href="http://fiitvr.id/fiitvr-pro2n" title="2N">
							2N</a>
						</li>
				<li>
						<a href="http://fiitvr.id/fiitvr-pro2s" title="2F">
							2F</a>
						</li>
				<li>
						<a href="http://fiitvr.id/resource" title="Download">
							Download</a>
						</li>
				<li>
						<a href="http://fiitvr.id/blog" title="Blog">
							Blog</a>
						</li>
				<li>
						<a href="http://fiitvr.id/about-us" title="About Us">
							Tentang Kami</a>
						</li>
				<li>
						<a href="http://fiitvr.id/contact-us" title="Contact Us">
							Hubungi Kami</a>
						</li>
				<li class="last"></li>	
			</ul>
	</div>
			</div> 
              </div>
            </div>  
            <div class="clearBoth"></div> 
          </div> 
        </div> 
      </div>  
      <!-- 头部导航结束 -->  
      <div id="box_main"> 
        <!--InstanceBeginEditable name="box_main"-->  
        <!-- 一列栏目开始 -->  
        <div id="box_left"> 
          <div id="box_left_sub3"> 
            <div xmlns="" class="columnSpace" id="elem-FrontPublic_breadCrumb01-1465181258686" name="面包屑">  
              <div id="FrontPublic_breadCrumb01-1465181258686" class="FrontPublic_breadCrumb01-d1_c1"><div>
				  
<?php
if ($read && !empty($slug)) {
?>
	<a href="/" target="_self" >Home</a> <a style="padding-left:0;" href="/blog" target="_self" >>&nbsp;Blog</a> >&nbsp;<?php echo $post[0]['title']; ?></div>
<?php
}
else {
?>
	<a href="/" target="_self" >Home</a> >&nbsp;Blog</div>
	<?php
	}
	?>
</div> 
            </div>
          </div>  
          <div id="box_left_sub4"> 
            <div xmlns="" class="columnSpace" id="elem-FrontComContent_detail01-1465181351839" name="通用内容详细信息">  
              <div id="FrontComContent_detail01-1465181351839" class="FrontComContent_detail01-d1_c1"><div class="content">
  	<div class="describe htmledit">
  		<div class="FrontComContent_detail01-1465181351839_htmlbreak" id="FrontComContent_detail01-1465181351839_cont_1"
				style="display: block;">
				
<?php
if ($read && !empty($slug)) {
?>
				<div id="contactcs">
	<p>
		<span style="font-size: 24px;"><?php echo $post[0]['title']; ?></span></p>
		<p>&nbsp;</p>
		<p><?php echo date('d/m/Y',strtotime($post[0]['date']))?> | Posted by <?php echo $post[0]['author']['name']; ?></p>
            </ul>
		<p>&nbsp;</p>

            <p><?php echo __text_cuts($post[0]['content'],1000);?></p>
            <p>&nbsp;</p>
<p class="aligncenter"><a target="_blank" href="http://jakvr.com/<?php echo $post[0]['slug']; ?>" title="JakVR | <?php echo $post[0]['title']?>">Readmore at JakVR.Com</a></p>
<hr />
<p class="aligncenter" style="text-align:center"><a href="http://fiitvr.id/blog" title="Back to Blog"><b>Back to Blog</b></a></p>
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

				<div id="contactcs" style="border-bottom:1px solid #333;padding:10px">
	<p>
		<span style="font-size: 24px;"><?php echo $v['title']; ?></span></p>
		<div style="padding:5px"><p><?php echo date('d/m/Y',strtotime($v['date']))?> | Posted by <?php echo $v['author']['name']; ?></p></div>
		<div style="padding:15px"><p style="text-align:center;margin:0 auto"><a href="http://fiitvr.id/blog/<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>"><img alt="<?php echo $v['title']; ?>" title="<?php echo $v['title']; ?>" src="<?php echo $v['thumbnail_images']['full']['url']; ?>" /></a></p></div>
		<p>&nbsp;</p>
            <p><?php echo strip_tags($v['excerpt']); ?></p>
            <p><a href="http://fiitvr.id/blog/<?php echo $v['slug']; ?>" title="<?php echo $v['title']; ?>">Readmore...</a></p>
</div>
<p>&nbsp;</p>
<?php
}

}
?>
</div>
		</div>
  </div>
  </div> 
            </div>
          </div> 
        </div>  
        <!-- 一列栏目结束 -->  
        <div class="clearBoth"></div>  
        <!--InstanceEndEditable--> 
      </div>  
      <!-- 底部版权开始 -->  
      <div id="box_footer"> 
        <div id="box_footer_sub1"> 
          <div id="box_footer_sub1_sub1"> 
            <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464774445741" name="说明页">  
              <div id="FrontSpecifies_show01-1464774445741" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit">
       <div id="ftnav01">
	<div id="ftnav1">
		<p>
			<a href="http://fiitvr.id/about-us">Tentang Kami</a></p>
	</div>
	<div id="ftnav2">
		<p>
			<a href="http://fiitvr.id/about-us">Tentang FiitVR.Id</a><br>
			<a href="http://fiitvr.id/contact-us">Marketing</a><br>
			<a href="http://fiitvr.id/contact-us">Distributor</a><br>
			<a href="http://fiitvr.id/blog">Blog</a><br>
			<a href="http://fiitvr.id/contact-us">Hubungi Kami</a><br>
	</div>
</div>
<div id="ftnav02">
	<div id="ftnav1">
		<p>
			<a href="http://fiitvr.id/fiitvr-pro2n">Produk</a></p>
	</div>
	<div id="ftnav2">
		<p>
			<a href="http://fiitvr.id/fiitvr-pro2n">FIIT VR 2N</a><br>
			<a href="http://fiitvr.id/fiitvr-pro2s">FIIT VR 2S</a><br>
			<a href="http://fiitvr.id/fiitvr-pro3f">FIIT VR 3F</a><br>
	</div>
</div>
<div id="ftnav03">
	<div id="ftnav1">
		<p>
			<a href="http://fiitvr.id/resource">Download</a></p>
	</div>
	<div id="ftnav2">
		<p>
			<a href="http://fiitvr.id/resource">VR Movies</a><br>
			<a href="http://fiitvr.id/resource">VR Games</a><br>
			<a href="http://fiitvr.id/resource">APP Downloads</a></p>
	</div>
</div>
<div id="ftnav03">
	<div id="ftnav1">
		<p>
			<a href="#">Online Store</a></p>
	</div>
	<div id="ftnav2">
		<p>
			<a target="_blank" href="https://www.tokopedia.com/koekmurah/?keyword=fiit+vr">TokoPedia</a><br>
			<a target="_blank" href="https://www.bukalapak.com/koekmurah">BukaLapak</a><br>
			<a target="_blank" href="http://www.lazada.co.id/fiitvr/?boost=3&jakvr&sort=popularity&viewType=gridView&fs=1">Lazada</a><br>
			<a target="_blank" href="https://shopee.co.id/shop/6994756/search/?shopCollection=3681279">Shoope</a><br>
			<a target="_blank" href="https://www.blibli.com/merchant/jakvr/KOH-30863">Blibli</a><br>
			<a target="_blank" href="http://www.elevenia.co.id/store/koektech">Elevenia</a><br>
	</div>
</div>
<div id="ftnav04">
	<div id="ftnav1">
		<p>
			<a href="http://fiitvr.id/" title="Kacamata FiiT VR - Fiit VR Indonesia">FiitVR.Id</a></p>
	</div>
	<div id="ftnav2">
		<p>
			Tel：+62 817 190 021<br>
			E-mail：<a body="" href="mailto:adrysunarto@jakvr.com" subject="">adrysunarto@jakvr.com</a><br>
			Website：<a href="http://www.fiitvr.id/" title="Kacamata FiiT VR - Fiit VR Indonesia" target="_blank">www.fiitvr.id</a></p>
	</div>
</div></div>
</div> 
            </div>
          </div>  
          <div id="box_footer_sub1_sub2"> 
            <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464774415794" name="说明页">  
              <div id="FrontSpecifies_show01-1464774415794" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit"></div>
</div> 
            </div>
          </div>  
          <div class="clearBoth"></div> 
        </div>  
        <div id="box_footer_sub2"> 
          <div id="box_footer_sub2_sub1"> 
            <div xmlns="" class="columnSpace" id="elem-FrontSpecifies_show01-1464774436750" name="说明页">  
              <div id="FrontSpecifies_show01-1464774436750" class="FrontSpecifies_show01-d3_c1"><div class="describe htmledit">
       <p>
	&copy; 2017 FiitVR.Id All Rights Reserved. (Unofficial Website FiitVR)</p></div>
</div> 
            </div>
          </div>  
          <div id="box_footer_sub2_sub2"> 
            <!-- JiaThis Button BEGIN -->  
            <div class="jiathis_style_32x32"> 
<!--
              <a class="jiathis_button_twitter" title="Share to Twitter"><span class="jiathis_txt jtico jtico_twitter"></span></a>  
              <a class="jiathis_button_fb" title="Share on Facebook"><span class="jiathis_txt jtico jtico_fb"></span></a>  
              <a class="jiathis_button_google" title="Share on Google"><span class="jiathis_txt jtico jtico_google"></span></a>  
              <a class="jiathis_button_tsina" title="Share on Sina Weibo"><span class="jiathis_txt jtico jtico_tsina"></span></a> 
-->
              <a href="https://www.facebook.com/Jakvrcom/" class="jiathis_button_fb" title="Share on Facebook"><span class="jiathis_txt jtico jtico_fb"></span></a>  
              <a href="https://plus.google.com/+JakvrGadget" class="jiathis_button_google" title="Share on Google"><span class="jiathis_txt jtico jtico_google"></span></a>    
              <a href="https://www.instagram.com/jakvr/" class="jiathis_button_tsina" title="Share on Instagram"><span class="jiathis_txt jtico jtico_tsina"></span></a>
            </div>  
                        <script type="text/javascript">
var jiathis_config={
    summary:"",
    shortUrl:false,
    hideMore:false
}
$(function(){
    $(".jiathis_button_fb").attr("title","Share on Facebook");
    $(".jiathis_button_google").attr("title","Share on Google");
    $(".jiathis_button_tsina").attr("title","Share on Instagram");
});
</script>                          <script charset="utf-8" src="./assets/jia.js" type="text/javascript"></script><script type="text/javascript" src="./assets/plugin.client.js" charset="utf-8"></script>  
            <!-- JiaThis Button END -->           </div>            <div class="clearBoth"></div>         </div>       </div>  
      <!-- 底部版权结束 -->     </div>   <div id="elem-FrontPublic_wisher01-2014"></div><div id="1501475306684" class="jquery-lightbox-overlay" style="position: fixed; top: 0px; left: 0px; opacity: 0.6; display: none; z-index: 99998;"></div><div class="jquery-lightbox-move" style="position: absolute; z-index: 99999; top: -999px;"><div class="jquery-lightbox jquery-lightbox-mode-image"><div class="jquery-lightbox-border-top-left"></div><div class="jquery-lightbox-border-top-middle"></div><div class="jquery-lightbox-border-top-right"></div><a class="jquery-lightbox-button-close" href="http://fiitvr.id/#close"><span>Close</span></a><div class="jquery-lightbox-navigator"><a class="jquery-lightbox-button-left" href="http://fiitvr.id/#"><span>Previous</span></a><a class="jquery-lightbox-button-right" href="http://fiitvr.id/#"><span>Next</span></a></div><div class="jquery-lightbox-buttons"><div class="jquery-lightbox-buttons-init"></div><a class="jquery-lightbox-button-left" href="http://fiitvr.id/#"><span>Previous</span></a><a class="jquery-lightbox-button-max" href="http://fiitvr.id/#"><span>Maximize</span></a><div class="jquery-lightbox-buttons-custom"></div><a class="jquery-lightbox-button-right" href="http://fiitvr.id/#"><span>Next</span></a><div class="jquery-lightbox-buttons-end"></div></div><div class="jquery-lightbox-background"></div><div class="jquery-lightbox-html"></div><div class="jquery-lightbox-border-bottom-left"></div><div class="jquery-lightbox-border-bottom-middle"></div><div class="jquery-lightbox-border-bottom-right"></div></div></div></body></html>
