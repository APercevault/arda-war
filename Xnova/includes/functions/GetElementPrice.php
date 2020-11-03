<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

function GetElementPrice ($USER, $PLANET, $Element, $USERfactor = true, $level = false)
	{
		global $buld, $rese, $pricelist, $resource, $LNG, $dpath, $pluslevel;
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
	if ($ligne[4] == 'destroy'){$pluslevel++;}
}	
//////////////////////////////////////////////////			
		//if ($USERfactor) // OLD CODE
		if ($USERfactor && ($level === false)) // FIX BY JSTAR
			$level = ($PLANET[$resource[$Element]]) ? $PLANET[$resource[$Element]] : $USER[$resource[$Element]];
// si dévelloppement d'un élément			
$level  = $level + $pluslevel;
		$is_buyeable = true;

		$array = array(
			'metal'      => $LNG['Metal'],
			'crystal'    => $LNG['Crystal'],
			'deuterium'  => $LNG['Deuterium'],
			'norio'      => $LNG['Norio'],
			'energy_max' => $LNG['Energy'],
		    'darkmatter' => $LNG['Darkmatter'],
		);
				if($USER['raza'] == 0) {
                    $skin_raza = "gultra";
                } elseif ($USER['raza'] == 1) {
						$skin_raza = "voltra";
                }
     $text = "";  
	foreach ($array as $ResType => $ResTitle) {
         if ($pricelist[$Element][$ResType] != 0) { 
             if ($USERfactor) { 
				if($USER['geologe'] >= 1) {
					$coste =  floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)); 
					$porcentaje = $coste * 20 / 100;
					$cost = $coste - $porcentaje;
                } else {
					$cost = floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)); 
				}
             } else { 
			 if($USER['geologe'] >= 1) {
                $coste =  floor($pricelist[$Element][$ResType]); 
				$porcentaje = $coste * 20 / 100;
				$cost = $coste -$porcentaje;
				} else {
				 $cost = floor($pricelist[$Element][$ResType]); 	
             } }
			
			if ($cost > $PLANET[$ResType])
            {
				if($USER['geologe'] >= 1) {
					$coste = "<b style=color:red;>" . pretty_number ($cost) . " (-20%)</b>";
				} else {
					$coste = "<b style=color:red;>" . pretty_number ($cost) . "</b>";
				}
               $is_buyeable = false;
            }	else {
				if($USER['geologe'] >= 1) {
					$coste = "<b style=color:lime;>" . pretty_number($cost) . " (-20%)</b> ";
				} else {
					$coste = "<b style=color:lime;>" . pretty_number($cost) . "</b> ";
				}
			}
			} 
         if ($pricelist[$Element][$ResType] != 0) {
       $text .= "<img style=\"padding-left:2px;padding-bottom:1px;padding-top:2px;float:left;\" src=styles/theme/" .$skin_raza ."/adds/" .$ResType .".jpg class=\"tooltip\" name=\"" .$ResTitle .": " .$coste ."\" width=\"30\" height=\"20\" />";					
         } 
     }
	 $text .= "";
     return $text; 
 }  
 
?>