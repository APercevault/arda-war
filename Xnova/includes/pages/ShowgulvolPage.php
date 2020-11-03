<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

 function ShowgulvolPage()
{
	global $USER, $db, $LNG;
	

	if($USER['raza'] == 0) {
		$db->query("UPDATE ".USERS." SET `raza`= 1 WHERE `id`='".$USER['id']."';");
	}
	else {
		$db->query("UPDATE ".USERS." SET `raza`= 0 WHERE `id`='".$USER['id']."';");
			}
$meta = 1 ;	



	$template	= new template();


	$template	= new template();
		$template->assign_vars(array(
			'meta1'				=> $LNG['meta1'],
			'meta'				=> $meta,
));	
	$template->show("meta/meta.tpl");	
}	
?>