<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ |5
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|Core.
 * @author: Copyright (C) 2011 by Brayan Narvaez (Prinick) developer of xNova Revolution
 * @author web: http://www.bnarvaez.com
 * @link: http://www.xnovarev.com
 * @Basic version of mod by noonn

 * @package 2Moons
 * @author Slaver <slaver7@gmail.com>
 * @copyright 2009 Lucky <douglas@crockford.com> (XGProyecto)
 * @copyright 2011 Slaver <slaver7@gmail.com> (Fork/2Moons)
 * @license http://www.gnu.org/licenses/gpl.html GNU GPLv3 License
 * @version 1.3 (2011-01-21)
 * @link http://code.google.com/p/2moons/

 * Please do not remove the credits
*/

if(!defined('INSIDE')) die('Hacking attempt!');

function ShowBonusPage()
{
    global $USER, $PLANET, $LNG, $LANG, $db, $Chance,$pricelist;
    $PlanetRess = new ResourceUpdate();
    $PlanetRess->CalcResource();
    $PlanetRess->SavePlanetToDB();
	error_reporting(0);

    $template    = new template();
    $Mode = $_GET['pack'];
    $darkmatter = $USER['darkmatter'];
	$norium = $PLANET['norio'];


//calcul pour les mines
			$Element = 1 ;  // mine metal(metal)
			$ResType = 'metal' ;
			$level  = $PLANET[metal_mine];
			$cost_mine_metal_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_metal_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);
			
			
			$Element = 2 ;  // mine silicium(metal)
			$ResType = 'metal' ;
			$level  = $PLANET[crystal_mine];
			$cost_mine_silicium_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_silicium_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);
			

			$Element = 3 ;  // mine deuterium(metal)
			$ResType = 'metal' ;
			$level  = $PLANET[deuterium_sintetizer];
			$cost_mine_deuterium_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_deuterium_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);
			
			
			$Element = 2 ;  // mine norio(metal)
			$ResType = 'metal' ;
			$level  = $PLANET[norio_mine];
			$cost_mine_norio_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_norio_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);
			

			$Element = 4 ;  // panneau solaire(metal)
			$ResType = 'metal' ;
			$level  = $PLANET[solar_plant];
			$cost_mine_solaire_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);	
			$ResType = 'crystal' ;
			$cost_mine_solaire_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);

			
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $cost_mine	= ($cost_mine_metal_metal +	$cost_mine_silicium_metal + $cost_mine_deuterium_metal + $cost_mine_norio_metal + $cost_mine_solaire_metal + $cost_mine_metal_crystal + 
		$cost_mine_silicium_crystal + $cost_mine_deuterium_crystal + $cost_mine_norio_crystal + $cost_mine_solaire_crystal)*COST_STOCK ; 
			
			if($USER['geologe'] >= 1)
$cost_mine = $cost_mine - ($cost_mine * 20 / 100);
			
//////////////////////////////////////////////////////////////////////////////////////



//calcul pour les entrepôts
			$Element = 22 ;  // stock metal(metal)converti en norio
			$ResType = 'metal' ;
			$level  = $PLANET[metal_store];
			$cost_mine_metal_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			
			$Element = 23 ;  // stock silicium(metal) converti en norio
			$ResType = 'metal' ;
			$level  = $PLANET[crystal_store];
			$cost_mine_silicium_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_silicium_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);

			$Element = 24 ;  // stock deutrium(metal)converti en norio
			$ResType = 'metal' ;
			$level  = $PLANET[deuterium_store];
			$cost_mine_deuterium_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);
			$ResType = 'crystal' ;
			$cost_mine_deuterium_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);			

			$Element = 25 ;  // stock norio(metal)converti en norio
			$ResType = 'metal' ;
			$level  = $PLANET[norio_store];
			$cost_mine_norio_metal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*METAL_FOR_NORIO);	
			$ResType = 'crystal' ;
			$cost_mine_norio_crystal =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)*SILICIUM_FOR_NORIO);			
			
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 $cost_stor	= ($cost_mine_metal_metal +	$cost_mine_silicium_metal + $cost_mine_deuterium_metal + $cost_mine_norio_metal + $cost_mine_metal_crystal + 
		$cost_mine_silicium_crystal + $cost_mine_deuterium_crystal + $cost_mine_norio_crystal)*2 ;
			
			if($USER['geologe'] >= 1)
$cost_stor = $cost_stor - ($cost_stor * 20 / 100);		
//////////////////////////////////////////////////////////////////////////////////////	

	$cost_lune = COST_LUNE;
	$cost_case = COST_CASE;
	$case		= NMB_CASE;
$case_pack_descr = $LNG['case_pack_descr'] . $case . $LNG['case_pack_descr1'];

if (($norium - $cost_mine) >= 0 and $cost_mine >=100){$cost_minea = 1 ;}
if (($norium - $cost_stor) >= 0 and $cost_stor >=100){$cost_stora = 1 ;}
if (($darkmatter - $cost_lune) >= 0 ){$cost_lunea = 1 ;}
if (($darkmatter - $cost_case) >= 0 ){$cost_casea = 1 ;}

#Pack mine contre norium
$planet_field_current 		= $PLANET['field_current'];
$planet_field_max 			= CalculateMaxPlanetFields($PLANET);
if( $Mode == 'mineros' && $planet_field_current + 5 > $planet_field_max ){
	$template->message($LNG['bn_pack_no_case'],"?page=bonus",4);
                exit; 
	}
	
if( $Mode == 'mineros' && $norium >= $cost_mine ){

$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$cost_mine ." WHERE `galaxy`='".$PLANET['galaxy']."'AND `system` ='".$PLANET['system']."'AND `planet` ='".$PLANET['planet']."' AND `planet_type` ='".$PLANET['planet_type']."'",'planets');
$aendern = $db->query("UPDATE ".PLANETS." SET metal_mine=metal_mine+1,
											  crystal_mine=crystal_mine+1,
											  deuterium_sintetizer=deuterium_sintetizer+1,
											  solar_plant=solar_plant+1,
											  norio_mine=norio_mine+1
                               WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message($LNG['bn_pack_ok'],"?page=bonus",4);
                exit;    
} 

#Pack de stockage contre norium
$planet_field_current 		= $PLANET['field_current'];
$planet_field_max 			= CalculateMaxPlanetFields($PLANET);
if( $Mode == 'almacenes' && $planet_field_current + 5 > $planet_field_max ){
	$template->message($LNG['bn_pack_no_case'],"?page=bonus",4);
                exit; 
	}
if( $Mode == 'almacenes' && $norium >= $cost_stor ){

$aendern = $db->query("UPDATE ".PLANETS." SET norio=norio-" .$cost_stor ." WHERE `galaxy`='".$PLANET['galaxy']."'AND `system` ='".$PLANET['system']."'AND `planet` ='".$PLANET['planet']."' AND `planet_type` ='".$PLANET['planet_type']."'",'planets');
$aendern = $db->query("UPDATE ".PLANETS." SET metal_store=metal_store+1,
											  crystal_store=crystal_store+1,
											  deuterium_store=deuterium_store+1,
										  	  norio_store=norio_store+1
                               WHERE `galaxy`='".$PLANET['galaxy']."'
                               AND `system` ='".$PLANET['system']."'
                               AND `planet` ='".$PLANET['planet']."'
                               AND `planet_type` ='".$PLANET['planet_type']."'
                               ",'planets');

$template->message($LNG['bn_pack_ok'],"?page=bonus",4);
                exit;    
} 


#Pack lune contre matière noire
if( $Mode == 'plune' && $darkmatter >= $cost_lune ){
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter-" .$cost_lune ." WHERE id= '".$USER[id]."';");	

		$maxtemp    = $MoonPlanet['temp_max'] - mt_rand(10, 45);
		$mintemp    = $MoonPlanet['temp_min'] - mt_rand(10, 45);
		$FieldMax	= mt_rand(35, 75);
			$Diameter	= floor(pow(mt_rand(10, 20) + 3 * $Chance, 0.5) * 1000);		
				$PlanetID  	= request_var('add_moon', 0);



				$Universe		= $PLANET['universe'];
				$Galaxy		= $PLANET['galaxy'];
				$System		= $PLANET['system'];
				$Planet		= $PLANET['planet'];
				$id_owner	= $PLANET['id_owner'];

			
		$SQL  = "INSERT INTO ".PLANETS." SET ";
		#$SQL .= "`name` = '".( ($MoonName == '') ? $LNG['fcm_moon'] : $MoonName )."', ";
		$SQL .= "`name` = '".$LNG['fcm_moon']."', ";
		$SQL .= "`id_owner` = '".$id_owner."', ";
		$SQL .= "`universe` = '".$Universe."', ";
		$SQL .= "`galaxy` = '".$Galaxy."', ";
		$SQL .= "`system` = '".$System."', ";
		$SQL .= "`planet` = '".$Planet."', ";
		$SQL .= "`last_update` = '".TIMESTAMP."', ";
		$SQL .= "`planet_type` = '3', ";
		$SQL .= "`image` = 'mond', ";
		$SQL .= "`diameter` = '".$Diameter."', ";
		$SQL .= "`field_max` = '".$FieldMax."', ";
		$SQL .= "`temp_min` = '".$mintemp."', ";
		$SQL .= "`temp_max` = '".$maxtemp."', ";
		$SQL .= "`metal` = '0', ";
		$SQL .= "`metal_perhour` = '0', ";
		$SQL .= "`metal_max` = '".BASE_STORAGE_SIZE."', ";
		$SQL .= "`crystal` = '0', ";
		$SQL .= "`crystal_perhour` = '0', ";
		$SQL .= "`crystal_max` = '".BASE_STORAGE_SIZE."', ";
		$SQL .= "`deuterium` = '0', ";
		$SQL .= "`deuterium_perhour` = '0', ";
		$SQL .= "`deuterium_max` = '".BASE_STORAGE_SIZE."',";
		$SQL .= "`norio` = '0', ";
		$SQL .= "`norio_perhour` = '0', ";
		$SQL .= "`norio_max` = '".BASE_STORAGE_SIZE."'; ";
		$db->query($SQL);
		
		$SQL  = "UPDATE ".PLANETS." SET ";
		$SQL .= "`id_luna` = '".$db->GetInsertID()."' ";
		$SQL .= "WHERE ";
		$SQL .= "`universe` = '".$Universe."' AND ";
		$SQL .= "`galaxy` = '".$Galaxy."' AND ";
		$SQL .= "`system` = '".$System."' AND ";
		$SQL .= "`planet` = '".$Planet."' AND ";
		$SQL .= "`planet_type` = '1';";				
		$db->query($SQL);		

$template->message($LNG['bn_pack_ok'],"?page=bonus",4);
                exit;    
} 

#Pack cases contre matière noire
if( $Mode == 'pcase' && $darkmatter >= $cost_case ){
	$tcase = $PLANET['field_max'] + $case ;
				$Universe		= $PLANET['universe'];
				$Galaxy		= $PLANET['galaxy'];
				$System		= $PLANET['system'];
				$Planet		= $PLANET['planet'];	
$aendern = $db->query("UPDATE ".USERS." SET darkmatter=darkmatter-" .$cost_case ." WHERE id= '".$USER[id]."';");	
		$SQL  = "UPDATE ".PLANETS." SET ";
		$SQL .= "`field_max` = '".$tcase."' ";
		$SQL .= "WHERE ";
		$SQL .= "`universe` = '".$Universe."' AND ";
		$SQL .= "`galaxy` = '".$Galaxy."' AND ";
		$SQL .= "`system` = '".$System."' AND ";
		$SQL .= "`planet` = '".$Planet."' AND ";
		$SQL .= "`planet_type` = '1';";				
		$db->query($SQL);

$template->message($LNG['bn_pack_ok'],"?page=bonus",4);
                exit;  
} 
$template->assign_vars(array(

			'lune_avec' => $LNG['lune_avec'],
			'cost_casea' => $cost_casea,
			'cost_case' => $cost_case,
		'case_pack'	=> $LNG['case_pack'],
		'case_pack_descr'	=> $case_pack_descr,	
			'id_luna' => $PLANET['id_luna'],	

			'cost_minea' => $cost_minea,
			'cost_stora' => $cost_stora,



			'cost_lunea' => $cost_lunea,
			'cost_lune' => $cost_lune,
		'lune_pack'	=> $LNG['lune_pack'],
		'lune_pack_descr'	=> $LNG['lune_pack_descr'],			
		'timepressource'					=> $time_p_ressource,
		'timepmine'					=> $time_p_mine,
		'timepstockage'					=> $time_p_stockage,
		'timepdefense'					=> $time_p_defense,
		'timeptechno'					=> $time_p_techno,
		'packs_norium' => $LNG['packs_norium'],
		'mo_lang' => $LNG['packs_darkmatter'],
		'en_venta' => $LNG['packs_en_venta'],
		'comprar' => $LNG['packs_comprar'],
		'coste' => $LNG['packs_coste'],

		'cost_mine' => $cost_mine,
		'al_back' => $LNG['al_back'],	
		'minas_pack'	=> $LNG['minas_pack'],
		'minas_pack_descr'	=> $LNG['minas_pack_descr'],
		'cost_stor' => $cost_stor,
		'almacenes_pack'	=> $LNG['almacenes_pack'],
		'almacenes_pack_descr'	=> $LNG['almacenes_pack_descr'],


    ));
    $template->show("bonus_page.tpl");
}
?>