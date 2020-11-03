<?php

GLOBAL $LNG,  $db;

// lit BDD table xxxx_config la valeur de "changer_vue"	
$changer_vue2 = $db->query ("SELECT changer_vue FROM ".CONFIG." ",'config');
$changer_vue3 = $db->fetch_array($changer_vue2);
$changer_vue = $changer_vue3['changer_vue'];

if($_GET['mode'] == 7)
{
$changer_vue = $changer_vue +1 ; if ($changer_vue > 1){$changer_vue = 0 ;}
              $db->query("UPDATE ".CONFIG." SET `changer_vue`='".$changer_vue."' ", "config");	
			  
}
unset($_GET['mode']);
if ($changer_vue <= 0){
	$meta = 2;

	
	}	
if ($changer_vue >= 1){
	$meta = 3;
	}
	$template	= new template();
		$template->assign_vars(array(
			'meta2'				=> $LNG['meta2'],
			'meta3'				=> $LNG['meta3'],
			'lm_galaxy'			=> $LNG['lm_galaxy'],
			'meta'				=> $meta,
));		

	$template->show("meta/meta.tpl");	
?>