<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/ 

if(!defined('INSIDE')) die('Hacking attempt!');

	function IsElementBuyable ($USER, $PLANET, $Element, $Incremental = true, $ForDestroy = false)
	{
		global $buld, $rese, $pricelist, $resource, $pluslevel, $buldo;
//////////////////////////////////////////////////	
if($rese == 1)		{$CurrentQueue  		= unserialize($USER['b_tech_queue']);}
if($buld == 1)		{$CurrentQueue  		= unserialize($PLANET['b_building_id']);}
if (!empty($CurrentQueue)) {
	$pluslevel = 0;
    foreach($CurrentQueue AS $ligne)
    {
if($ligne[0] == $Element)
        {
            $pluslevel++;
		
        }
    }
}	
//////////////////////////////////////////////////		
		include_once(ROOT_PATH . 'includes/functions/IsVacationMode.php');

	    if (IsVacationMode($USER))
	       return false;

		if ($Incremental)
			$level  = isset($PLANET[$resource[$Element]]) ? $PLANET[$resource[$Element]] : $USER[$resource[$Element]];
// si dévelloppement d'un élément			
$level  = $level + $pluslevel;
		$array    = array('metal', 'crystal', 'deuterium', 'norio', 'energy_max', 'darkmatter');

		foreach ($array as $ResType)
		{
			if (empty($pricelist[$Element][$ResType]))
				continue;
			
			$cost[$ResType] = $Incremental ? floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)) : floor($pricelist[$Element][$ResType]);

			
			if($USER['geologe'] >= 1)
$cost[$ResType] = $cost[$ResType] - ($cost[$ResType] * 20 / 100);
			
			if ($ForDestroy == true)
				$cost[$ResType]  = floor($cost[$ResType] / 2);

			if ((isset($PLANET[$ResType]) && $cost[$ResType] > $PLANET[$ResType]) || (isset($USER[$ResType]) && $cost[$ResType] > $USER[$ResType]))
				return false;
		}
		if ($level >= $pricelist[$Element]['max'] and $buldo > 0) return false;
		return true;
	}

?>