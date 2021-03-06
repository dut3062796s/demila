<?php
// +----------------------------------------------------------------------
// | Demila [ Beautiful Digital Content Trading System ]
// +----------------------------------------------------------------------
// | Copyright (c) 2015 http://demila.org All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Email author@demila.org
// +----------------------------------------------------------------------

_setView ( ROOT_PATH . "/apps/" . $_GET ['m'] . "/admin/addGroup.php" );
_setTitle ( $langArray ['edit'] );

	if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
		refresh('?m='.$_GET['m'].'&c=list', 'INVALID ID', 'error');
	}

	$cms = new groups();
	
	if(isset($_POST['edit'])) {
		$status = $cms->edit ($_GET['id']);
		if ($status !== true) {
			abr('error', $status);
		} else {
			refresh ( "?m=" . $_GET ['m'] . "&c=groups", $langArray ['edit_complete'] );
		}
	}else {
		$_POST = $cms->get($_GET['id']);
		$_POST['rights'] = unserialize($_POST['rights']);
	}
require_once ROOT_PATH.'/apps/lists/leftlist_admin.php';
?>