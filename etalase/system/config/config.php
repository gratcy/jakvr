<?php
$conf['newmodule'] = false;
$conf['pathmodule'] = array('views' => BASEPATH . 'views',
							'helpers' => BASEPATH . 'helpers',
							'models' => BASEPATH . 'models',
							'libraries' => BASEPATH . 'libraries',
							'errors' => BASEPATH . 'errors',
							'controllers' => BASEPATH . 'controllers'
							);
$conf['pathview'] = 'default';
$conf['site'] = array('__url' => 'http://localhost:1515/', '__tpl' => 'http://localhost:1515/system/views/'.$conf['pathview'].'/', 'title' => 'JakVR - Gadget Solution', 'desc' => 'Gadget Solution');
$conf['product_images'] = array('__url' => 'http://localhost:1212/upload/');
$conf['upload'] = array('path' => FPATH, 'type' => array('product' => 'system/upload/product/', 'media' => 'system/upload/media/'));

define('SALT','ddv21sd5dv56sd51');
