<?php
if (!defined('BASEPATH')) exit( 'Direct access not allowed !!!' );

class library_xmltoarray {
	function grab_local_data($file) {
		if ( file_exists( $file ) )	{
			$xml = simplexml_load_string(file_get_contents($file), 'SimpleXMLElement', LIBXML_COMPACT | LIBXML_NOCDATA, false);
			return json_decode(json_encode($xml), true);
		}
	}

	function grab_global_data($url) {
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curl_scraped_page = curl_exec($ch);
		$xmlObj = json_decode($curl_scraped_page, true);
		curl_close($ch);
		return $xmlObj;
	}
}
