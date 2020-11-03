<?php

/**
 _  \_/ |\ | /пп\ \  / /\    |пп) |_п \  / /пп\ |  |   |┤п|п` | /пп\ |\ | 
 п  /п\ | \| \__/  \/ /--\   |пп\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/
 
function ShowLoginPage()
{
	global $USER, $LNG;
	if(isset($_REQUEST['admin_pw']) && md5($_REQUEST['admin_pw']) == $USER['password']) {
		$_SESSION['admin_login']	= md5($_REQUEST['admin_pw']);
		redirectTo('admin.php');
	}

	$template	= new template();

	$template->assign_vars(array(	
		'adm_login'			=> $LNG['adm_login'],
		'adm_password'			=> $LNG['adm_password'],
		'adm_absenden'			=> $LNG['adm_absenden'],
	));
	$template->show('adm/LoginPage.tpl');
}
?>