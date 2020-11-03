<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if(!defined('INSIDE')) die('Hacking attempt!');

function ShowDarkmatterPage()
{
    global $USER, $PLANET, $LNG, $LANG, $db;
    $PlanetRess = new ResourceUpdate();
    $PlanetRess->CalcResource();
    $PlanetRess->SavePlanetToDB();

    $template    = new template();
    $Mode = $_GET['pack'];
    $darkmatter = $USER['darkmatter'];
	$norio = $PLANET['norio'];
	$norio1 = 1000000;
	$norio2 = 10000000;
	$norio3 = 100000000;
	$norio4 = 1000000000;
	$norio1_darkmatter = 1000;
	$norio2_darkmatter = 10000;
	$norio3_darkmatter = 100000;
	$norio4_darkmatter = 1000000;

#PACK 1
if( $Mode == 'norio1' && $norio >= $norio1){
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter+" .$norio1_darkmatter ." WHERE id= '".$USER['id']."';");
$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$norio1." WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message("<font color=lime size=4><b>".$LNG['dm_pack_ok'],"?page=materiaoscura",4);
                exit;    
} elseif($norio < $norio1 && $Mode == 'norio1') {
$template->message("<font color=red size=4><b>".$LNG['dm_pack_no'],"?page=materiaoscura",4);                
exit;    
}

	
#PACK 2
if( $Mode == 'norio2' && $norio >= $norio2){
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter+" .$norio2_darkmatter ." WHERE id= '".$USER['id']."';");
$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$norio2." WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message("<font color=lime size=4><b>".$LNG['dm_pack_ok'],"?page=materiaoscura",4);
                exit;    
} elseif($norio < $norio2 && $Mode == 'norio2') {
$template->message("<font color=red size=4><b>".$LNG['dm_pack_no'],"?page=materiaoscura",4);                
exit;    
}

#PACK 3
if( $Mode == 'norio3' && $norio >= $norio3){
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter+" .$norio3_darkmatter ." WHERE id= '".$USER['id']."';");
$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$norio3." WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message("<font color=lime size=4><b>".$LNG['dm_pack_ok'],"?page=materiaoscura",4);
                exit;    
} elseif($norio < $norio3 && $Mode == 'norio3') {
$template->message("<font color=red size=4><b>".$LNG['dm_pack_no'],"?page=materiaoscura",4);                
exit;    
}

#PACK 4
if( $Mode == 'norio4' && $norio >= $norio4){
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter+" .$norio4_darkmatter ." WHERE id= '".$USER['id']."';");
$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$norio4." WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message("<font color=lime size=4><b>".$LNG['dm_pack_ok'],"?page=materiaoscura",4);
                exit;    
} elseif($norio < $norio4 && $Mode == 'norio4') {
$template->message("<font color=#FF0000 size=4><b>".$LNG['dm_pack_no'],"?page=materiaoscura",4);                
exit;    
}



$template->assign_vars(array(

		'dm_pack_norio' => $LNG['dm_pack_norio'],
		'de_materia' => $LNG['de_materia'],
		'comprar' => $LNG['packs_comprar'],
		'caja' => $LNG['caja'],
		'c_norio' => $norio,
		'norio1' => $norio1,
		'norio2' => $norio2,
		'norio3' => $norio3,
		'norio4' => $norio4,
		'cantidad_norio1' => pretty_number($norio1),
		'cantidad_norio1_materia' => pretty_number($norio1_darkmatter),
		'cantidad_norio2' => pretty_number($norio2),
		'cantidad_norio2_materia' => pretty_number($norio2_darkmatter),
		'cantidad_norio3' => pretty_number($norio3),
		'cantidad_norio3_materia' => pretty_number($norio3_darkmatter),
		'cantidad_norio4' => pretty_number($norio4),
		'cantidad_norio4_materia' => pretty_number($norio4_darkmatter),
    ));
    $template->show("darkmatter_page.tpl");
}
?>