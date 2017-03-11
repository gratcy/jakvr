<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function __get_peti_cash_type($id,$type) {
	if ($type == 1)
		return ($id == 1 ? 'Debit' : 'Credit');
	else
		return ($id == 1 ? 'Debit <input type="radio" checked="checked" name="type" value="1" /> Credit <input type="radio" name="type" value="2" />' : 'Debit <input type="radio" name="type" value="1" /> Credit <input type="radio" checked="checked" name="type" value="2" />');
}
