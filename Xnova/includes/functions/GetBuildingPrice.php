<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if(!defined('INSIDE')) die('Hacking attempt!'); 

	function GetBuildingPrice ($USER, $CurrentPlanet, $Element, $Incremental = true, $ForDestroy = false)
	{
		global $buld, $rese, $removea, $removeb, $pricelist, $resource, $USER, $PLANET, $pluslevel, $PLANETA;
//////////////////////////////////////////////////	
if($rese == 1)		{$CurrentQueue  		= unserialize($USER['b_tech_queue']);}
if($buld == 1)		{$CurrentQueue  		= unserialize($PLANET['b_building_id']);}

if (!empty($CurrentQueue)&& $removea == 0) {
	$pluslevel = 0;	
if ($removeb == 1) {$pluslevel--;}
    foreach($CurrentQueue AS $ligne)
    {
 $PLANETA = $ligne[4] ;
if($ligne[0] == $Element)
        {
            $pluslevel++;
		
        }
    }
}	
//////////////////////////////////////////////////	
	
		
		if ($Incremental)
			$level = (isset($CurrentPlanet[$resource[$Element]])) ? $CurrentPlanet[$resource[$Element]] : $USER[$resource[$Element]];
// si dévelloppement d'un élément			
$level  = $level + $pluslevel;

		$array = array('metal', 'crystal', 'deuterium', 'norio', 'darkmatter', 'energy_max');
		foreach ($array as $ResType)
		{
			
			if ($USER['geologe'] >= 1) {
			$cost[$ResType] = $Incremental ? floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)) : floor($pricelist[$Element][$ResType]);
			$porcentaje = $cost[$ResType] * 20 / 100;
			$cost[$ResType] = $cost[$ResType] - $porcentaje;
			} else {
			$cost[$ResType] = $Incremental ? floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)) : floor($pricelist[$Element][$ResType]);
			}

			if ($ForDestroy == true)
				$cost[$ResType] /= 2;
		}
		
		return ($cost);
	}
?>