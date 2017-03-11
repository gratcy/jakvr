<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('product_others_model');
		$this -> load -> library('brand/brand_lib');
		$this -> load -> library('color/color_lib');
		$this -> load -> library('categories_others/categories_others_lib');
	}

	function index() {
		$view['product_others'] = $this -> product_others_model -> __get_product();
		$this->load->view('pages/product_others', $view);
	}
	
	function product_others_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$weight = (int) $this -> input -> post('weight');
			$cid = (int) $this -> input -> post('cid');
			$bid = (int) $this -> input -> post('bid');
			$status = (int) $this -> input -> post('status');
			$guarentee = (int) $this -> input -> post('guarentee');
			
			$price = $this -> input -> post('price');
			$pricebase = $this -> input -> post('pricebase');
			$priceseller = $this -> input -> post('priceseller');
			$color = $this -> input -> post('color');
			$vname = $this -> input -> post('vname');
			$sku = $this -> input -> post('sku');
			$desc = $this -> input -> post('desc');
			
			$uploaddir = FCPATH . 'upload/';
			if (!$name || !$desc || !$cid || !$bid) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('product_others' . '/' . __FUNCTION__));
			}
			else if (!$weight) {
				__set_error_msg(array('error' => 'Berat harus di isi !!!'));
				redirect(site_url('product_others' . '/' . __FUNCTION__));
			}
			else {
				if (!$_FILES) {
					__set_error_msg(array('error' => 'Gambar harus di upload !!!'));
					redirect(site_url('product_others' . '/' . __FUNCTION__));
				}
				$arr = array('pcid' => $cid, 'pbid' => $bid,'pname' => $name, 'pguarantee' => $guarentee, 'pweight' => $weight, 'pstatus' => $status);
				if ($this -> product_others_model -> __insert_product($arr, 1)) {
					$lastID = $this -> db -> insert_id();
				
					if (preg_match('/jpeg|jpg/i', $_FILES['img']['type'])) $ext = '.jpg';
					else if (preg_match('/gif/i', $_FILES['img']['type'])) $ext = '.gif';
					else $ext = '.png';
					
					$tname = $lastID . '-' . __replace_link($name) . $ext;
					$uploadfile = $uploaddir . $tname;
					
					if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
						__set_error_msg(array('error' => 'Gagal upload gambar !!!'));
						redirect(site_url('product_others' . '/' . __FUNCTION__));
					}
							
					$this -> product_others_model -> __update_product($lastID, array('pimg' => $tname), 1);
					
					foreach($sku as $i => $v) {
						if ($sku[$i]) {
							$pricebase[$i] = str_replace(',','', $pricebase[$i]);
							$price[$i] = str_replace(',','', $price[$i]);
							$priceseller[$i] = str_replace(',','', $priceseller[$i]);
							
							$arr2 = array('ppid' => $lastID, 'psku' => $sku[$i], 'pcolor' => $color[$i], 'pname' => str_replace("'","\'",$vname[$i]), 'pdesc' => str_replace("'","\'",$desc[$i]), 'ppricebase' => $pricebase[$i], 'pprice' => $price[$i], 'ppriceseller' => $priceseller[$i], 'pstatus' => 1);
							$this -> product_others_model -> __insert_product($arr2, 2);
							$vid = $this -> db -> insert_id();
							
							if ($vid > 0) {
								foreach($_FILES['vimg']['name'][$i] as $k2 => $v2) {
									if ($_FILES['vimg']['tmp_name'][$i][$k2]) {
										if (preg_match('/jpeg|jpg/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.jpg';
										else if (preg_match('/gif/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.gif';
										else $ext = '.png';
										
										$tname = $vid . '-' .uniqid(). '-' .time(). '-' . __replace_link($vname[$i]) . $ext;
										$uploadfile = $uploaddir . $tname;
										
										@move_uploaded_file($_FILES['vimg']['tmp_name'][$i][$k2], $uploadfile);
										$this -> product_others_model -> __insert_product(array('pvid' => $vid, 'pimages' => $tname), 3);
									}
								}
							}
						}
					}
					__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
					redirect(site_url('product_others'));
				}
				else {
					__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
					redirect(site_url('product_others'));
				}
			}
		}
		else {
			$view['brand'] = $this -> brand_lib -> __get_brand(0);
			$view['color'] = $this -> color_lib -> __get_color(0);
			$view['categories'] = $this -> categories_others_lib -> __get_categories(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function product_others_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			
			$timg = $this -> input -> post('timg', TRUE);
			$name = $this -> input -> post('name', TRUE);
			$weight = (int) $this -> input -> post('weight');
			$cid = (int) $this -> input -> post('cid');
			$bid = (int) $this -> input -> post('bid');
			$status = (int) $this -> input -> post('status');
			$guarentee = (int) $this -> input -> post('guarentee');
			
			$price = $this -> input -> post('price');
			$pricebase = $this -> input -> post('pricebase');
			$priceseller = $this -> input -> post('priceseller');
			$color = $this -> input -> post('color');
			$vname = $this -> input -> post('vname');
			$sku = $this -> input -> post('sku');
			$desc = $this -> input -> post('desc');
			$pid = $this -> input -> post('pid');
			
			$uploaddir = FCPATH . 'upload/';
			
			if ($id) {
				if (!$name || !$desc || !$cid || !$bid) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('product_others' . '/' . __FUNCTION__ . '/' . $id));
				}
				else if (!$weight) {
					__set_error_msg(array('error' => 'Berat harus di isi !!!'));
					redirect(site_url('product_others' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					$isUpload = false;
					if ($_FILES['img']['tmp_name']) {
						if (preg_match('/jpeg|jpg/i', $_FILES['img']['type'])) $ext = '.jpg';
						else if (preg_match('/gif/i', $_FILES['img']['type'])) $ext = '.gif';
						else $ext = '.png';
						
						$tname = $id . '-' . __replace_link($name) . $ext;
						$uploadfile = $uploaddir . $tname;
						$isUpload = true;
						if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)) {
							__set_error_msg(array('error' => 'Gagal upload gambar !!!'));
							redirect(site_url('product_others' . '/' . __FUNCTION__ . '/' . $id));
						}
						else {
							@unlink($uploaddir . $timg);
						}
					}
					
					$arr = array('pcid' => $cid, 'pbid' => $bid,'pname' => $name, 'pguarantee' => $guarentee, 'pweight' => $weight, 'pstatus' => $status);
					if ($isUpload) $arr += array('pimg' => $tname);
					if ($this -> product_others_model -> __update_product($id, $arr, 1)) {
						foreach($sku as $i => $v) {
							$pricebase[$i] = str_replace(',','', $pricebase[$i]);
							$price[$i] = str_replace(',','', $price[$i]);
							$priceseller[$i] = str_replace(',','', $priceseller[$i]);
							
							if (isset($pid[$i]) && $pid[$i] > 0) {
								$arr2 = array('psku' => $sku[$i], 'pcolor' => $color[$i], 'pname' => str_replace("'","\'",$vname[$i]), 'pdesc' => str_replace("'","\'",$desc[$i]), 'ppricebase' => $pricebase[$i], 'pprice' => $price[$i], 'ppriceseller' => $priceseller[$i], 'pstatus' => 1);
								$this -> product_others_model -> __update_product($pid[$i], $arr2, 2);
								
								foreach($_FILES['vimg']['name'][$i] as $k2 => $v2) {
									if ($_FILES['vimg']['tmp_name'][$i][$k2]) {
										if (preg_match('/jpeg|jpg/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.jpg';
										else if (preg_match('/gif/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.gif';
										else $ext = '.png';
										
										$tname = $vid . '-' .uniqid(). '-' .time(). '-' . __replace_link($vname[$i]) . $ext;
										$uploadfile = $uploaddir . $tname;
										
										@move_uploaded_file($_FILES['vimg']['tmp_name'][$i][$k2], $uploadfile);
										$this -> product_others_model -> __insert_product(array('pvid' => $pid[$i], 'pimages' => $tname), 3);
									}
								}
							}
							else {
								$arr3 = array('ppid' => $id, 'psku' => $sku[$i], 'pcolor' => $color[$i], 'pname' => str_replace("'","\'",$vname[$i]), 'pdesc' => str_replace("'","\'",$desc[$i]), 'ppricebase' => $pricebase[$i], 'pprice' => $price[$i], 'ppriceseller' => $priceseller[$i], 'pstatus' => 1);
								$this -> product_others_model -> __insert_product($arr3, 2);
								$vid = $this -> db -> insert_id();
								
								foreach($_FILES['vimg']['name'][$i] as $k2 => $v2) {
									if ($_FILES['vimg']['tmp_name'][$i][$k2]) {
										if (preg_match('/jpeg|jpg/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.jpg';
										else if (preg_match('/gif/i', $_FILES['vimg']['type'][$i][$k2])) $ext = '.gif';
										else $ext = '.png';
										
										$tname = $vid . '-' .uniqid(). '-' .time(). '-' . __replace_link($vname[$i]) . $ext;
										$uploadfile = $uploaddir . $tname;
										
										@move_uploaded_file($_FILES['vimg']['tmp_name'][$i][$k2], $uploadfile);
										$this -> product_others_model -> __insert_product(array('pvid' => $vid, 'pimages' => $tname), 3);
									}
								}
							}
						}
						
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('product_others'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('product_others'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('product_others'));
			}
		}
		else {
			if (!$id) redirect(site_url('product_others'));
			$view['id'] = $id;
			$view['detail'] = $this -> product_others_model -> __get_product_detail($id);
			$view['subdetail'] = $this -> product_others_model -> __get_product(2,$id);
			$view['brand'] = $this -> brand_lib -> __get_brand($view['detail'][0] -> pbid);
			$view['categories'] = $this -> categories_others_lib -> __get_categories($view['detail'][0] -> pcid);
			$view['color'] = array($this -> color_lib -> __get_color(0));
			foreach($view['subdetail'] as $k => $v) $view['color'][$v -> pid] = $this -> color_lib -> __get_color($v -> pcolor);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function product_others_delete($type,$id) {
		$del = $this -> product_others_model -> __delete_product($id,$type);
		if ($del) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(($type == 1 ? site_url('product_others') : $_SERVER['HTTP_REFERER']));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(($type == 1 ? site_url('product_others') : $_SERVER['HTTP_REFERER']));
		}
	}
}
