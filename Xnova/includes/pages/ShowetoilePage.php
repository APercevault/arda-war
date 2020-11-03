<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

function ShowetoilePage()
{
	global $USER, $PLANET, $LNG, $LANG;

	$PlanetRess = new ResourceUpdate();
	$PlanetRess->CalcResource();
	$PlanetRess->SavePlanetToDB();

	$template	= new template();


	
	$template->assign_vars(array(

		'pe_porte' => $LNG['pe_porte'],
		'pe_construction' => $LNG['pe_construction'],
		'mercado_negro'		=> $LNG['mercado_negro'],
		'comerciante'	=> $LNG['comerciante'],
		'bonus' => $LNG['bonus_n'],
		'mercado_negro_desc'		=> $LNG['mercado_negro_desc'],
		'comerciante_desc'	=> $LNG['comerciante_desc'],
		'bonus_desc' => $LNG['bonus_n_desc'],
	));
	
	$template->show("porte/porte_etoil.tpl");
}
?>