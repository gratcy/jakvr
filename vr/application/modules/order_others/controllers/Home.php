<?php
/* -*- tab-width: 2; indent-tabs-mode: nil; c-basic-offset: 2 -*- */

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MX_Controller {
	function __construct() {
		parent::__construct();
		$this -> load -> model('order_others_model');
		$this -> load -> library('reffer/reffer_lib');
	}

	function index() {
		if ($_REQUEST) {
			//~ header('Content-type: application/json');
			$order = $this -> input -> get('order');
			$search = $this -> input -> get('search');
			$page = (int) $this -> input -> get('draw');
			$start = (int) $this -> input -> get('start');
			$length = ($this -> input -> get('length') ? (int) $this -> input -> get('length') : 25);
			$offset = $start;
			$data = array();
			$order_others = $this -> order_others_model -> __get_order_others($search['value'], $order, $offset, $length);
			$rtotal = $this -> order_others_model -> __get_total_order_others($search['value']);
			foreach($order_others as $k => $v) :
				$createdby = json_decode($v -> tcreatedby, true);
				$approvedby = json_decode($v -> tapprovedby, true);
				$edit = '';
				if (__get_roles('OrderExecute')) :
					if ($v -> tstatus != 3) :
					if (__get_roles('OrderApproved')) :
						$edit .= '<a href="'.site_url('order_others/order_others_approved/' . $v -> tid).'"><i class="fa fa-hand-o-up"></i></a>';
					endif;
						$edit .= '<a href="'.site_url('order_others/order_others_update/' . $v -> tid).'"><i class="fa fa-pencil"></i></a>';
						$edit .= '<a href="'.site_url('order_others/order_others_delete/' . $v -> tid).'" onclick="return confirm(\'Are you sure you want to delete this item?\');"><i class="fa fa-times"></i></a>';
					else :
						$edit .= '<a href="#"><i class="fa fa-check"></i></a>';
					endif;
				endif;
				if (__get_roles('ProductPriceBase'))
					$data[] = array('<input type="checkbox" value="'.$v -> tid.'" name="apv[]">', __get_date($v -> tdate,3),$v -> tcode, __get_rupiah($v -> tpricebase,1),$v -> cname,$v -> tinv,$v -> tname,__get_rupiah($v -> tprice,1),__get_rupiah(($v -> tprice-$v -> tpricebase)-$v -> tdiscount,1),$v -> tresi,$v -> tdesc,$createdby['unick'] . '<br /> ('.($v -> tstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> tstatus,1)).')', $edit);
				else
					$data[] = array('<input type="checkbox" value="'.$v -> tid.'" name="apv[]">', __get_date($v -> tdate,3),$v -> tcode, __get_rupiah($v -> tpricebase,1),$v -> cname,$v -> tinv,$v -> tname,__get_rupiah($v -> tprice,1),$v -> tresi,$v -> tdesc,$createdby['unick'] . '<br /> ('.($v -> tstatus == 3 ? 'Approved by ' . $approvedby['unick'] : __get_status($v -> tstatus,1)).')', $edit);
			endforeach;
			echo json_encode(array('data' => $data, 'recordsTotal' => $rtotal, 'recordsFiltered' => $rtotal, 'draw' => (!$page ? 1 : $page)));die;
		}
		else
			$this->load->view('pages/order_others', array());
	}
	
	function order_others_add() {
		if ($_POST) {
			$name = $this -> input -> post('name', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$tcode = $this -> input -> post('tcode', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$price = $this -> input -> post('price', TRUE);
			$pricebase = $this -> input -> post('pricebase', TRUE);
			$price = (int) str_replace(array(',','.'),array('',''), $price);
			$pricebase = (int) str_replace(array(',','.'),array('',''), $pricebase);
			$ino = $this -> input -> post('ino', TRUE);
			$resi = $this -> input -> post('resi', TRUE);
			$reffer = (int) $this -> input -> post('reffer');
			$status = (int) $this -> input -> post('status');
			
			if (!$name || !$desc || !$pricebase || !$price || !$reffer) {
				__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
				redirect(site_url('order_others' . '/' . __FUNCTION__));
			}
			else {
				if ($this -> order_others_model -> __check_duplicate_invoice($ino) > 0) {
					__set_error_msg(array('error' => 'No. Invoice double !!!'));
					redirect(site_url('order_others' . '/' . __FUNCTION__));
				}
				else {
					$arr = array('treffer' => $reffer, 'tdate' => strtotime($dateorder), 'tname' => $name, 'tphone' => $phone, 'tcode' => $tcode, 'tpricebase' => $pricebase, 'tprice' => $price, 'tinv' => $ino, 'tresi' => $resi, 'tdesc' => $desc, 'tstatus' => $status, 'tcreatedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					if ($this -> order_others_model -> __insert_order_others($arr)) {
						__set_error_msg(array('info' => 'Data berhasil ditambahkan.'));
						redirect(site_url('order_others'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal menambahkan data !!!'));
						redirect(site_url('order_others'));
					}
				}
			}
		}
		else {
			$view['reffer'] = $this -> reffer_lib -> __get_reffer(0);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function order_others_update($id) {
		if ($_POST) {
			$id = (int) $this -> input -> post('id');
			$app = (int) $this -> input -> post('app');
			$name = $this -> input -> post('name', TRUE);
			$phone = $this -> input -> post('phone', TRUE);
			$dateorder = $this -> input -> post('dateorder', TRUE);
			$dateorder = str_replace('/','-', $dateorder);
			$tcode = $this -> input -> post('tcode', TRUE);
			$desc = $this -> input -> post('desc', TRUE);
			$price = $this -> input -> post('price', TRUE);
			$pricebase = $this -> input -> post('pricebase', TRUE);
			$discount = $this -> input -> post('discount', TRUE);
			$price = (int) str_replace(array(',','.'),array('',''), $price);
			$pricebase = (int) str_replace(array(',','.'),array('',''), $pricebase);
			$discount = (int) str_replace(array(',','.'),array('',''), $discount);
			$ino = $this -> input -> post('ino', TRUE);
			$resi = $this -> input -> post('resi', TRUE);
			$reffer = (int) $this -> input -> post('reffer');
			$status = (int) $this -> input -> post('status');
			
			if ($id) {
				if (!$name || !$desc || !$pricebase || !$price || !$reffer) {
					__set_error_msg(array('error' => 'Data yang anda masukkan tidak lengkap !!!'));
					redirect(site_url('order_others' . '/' . __FUNCTION__ . '/' . $id));
				}
				else {
					if ($app == 1) $status = 3;
					$arr = array('treffer' => $reffer, 'tdate' => strtotime($dateorder), 'tname' => $name, 'tphone' => $phone, 'tcode' => $tcode, 'tpricebase' => $pricebase, 'tprice' => $price, 'tdiscount' => $discount, 'tinv' => $ino, 'tresi' => $resi, 'tdesc' => $desc, 'tstatus' => $status, 'tmodifiedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					
					if ($app == 1) $arr += array('tapprovedby' => json_encode(array('uid' => $this -> privileges -> sesresult['uid'], 'unick' => $this -> privileges -> sesresult['unick'], 'tdate' => time())));
					if ($this -> order_others_model -> __update_order_others($id, $arr)) {	
						__set_error_msg(array('info' => 'Data berhasil diubah.'));
						redirect(site_url('order_others'));
					}
					else {
						__set_error_msg(array('error' => 'Gagal mengubah data !!!'));
						redirect(site_url('order_others'));
					}
				}
			}
			else {
				__set_error_msg(array('error' => 'Kesalahan input data !!!'));
				redirect(site_url('order_others'));
			}
		}
		else {
			$view['id'] = $id;
			$view['detail'] = $this -> order_others_model -> __get_order_others_detail($id);
			$view['reffer'] = $this -> reffer_lib -> __get_reffer($view['detail'][0] -> treffer);
			$this->load->view('pages/'.__FUNCTION__, $view);
		}
	}
	
	function order_others_delete($id) {
		if ($this -> order_others_model -> __delete_order_others($id)) {
			__set_error_msg(array('info' => 'Data berhasil dihapus.'));
			redirect(site_url('order_others'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal hapus data !!!'));
			redirect(site_url('order_others'));
		}
	}
	
	function order_others_update_resi($id) {
		$tresi = $this -> input -> post('tresi');
		$idnya = $this -> input -> post('idnya');
		
		if ($id == $idnya) {
			$this -> order_others_model -> __update_order_others($id, array('tresi' => $tresi));
			echo '-1';
		}
		else
			echo '1';
	}
	
	function order_others_update_one($id) {
		$type = (int) $this -> input -> post('type');
		$idnya = $this -> input -> post('idnya');
		$value = $this -> input -> post('value');
		
		$key = '';
		if ($type == 1) $key = 'tdesc';
		
		if ($key && $id == $idnya) {
			$this -> order_others_model -> __update_order_others($id, array($key => $value));
			echo '-1';
		}
		else
			echo '1';
	}
	
	function order_others_approved($id) {
		$id = (int) $id;
		if ($id) {
			$this -> order_others_model -> __update_order_others($id, array('tstatus' => 3));
			__set_error_msg(array('info' => 'Data berhasil di approved.'));
			redirect(site_url('order_others'));
		}
		else {
			__set_error_msg(array('error' => 'Gagal approve data !!!'));
			redirect(site_url('order_others'));
		}
	}
	
	function order_others_approved_all() {
		$apv = $this -> input -> post('apv');
		if (count($apv) > 0) {
			foreach($apv as $k => $v)
				$this -> order_others_model -> __update_order_others($v, array('tstatus' => 3));
			
			__set_error_msg(array('info' => 'Data berhasil di approved.'));
			redirect(site_url('order_others'));
		}
		else {
			__set_error_msg(array('error' => 'Tidak ada data yang dipilih !!!'));
			redirect(site_url('order_others'));
		}
	}
}
