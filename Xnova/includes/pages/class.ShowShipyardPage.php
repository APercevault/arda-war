<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/
class ShowShipyardPage
{
	
		public function GetMaxConstructibleElements2($Element)
	{
		global $pricelist, $PLANET, $USER;
		
		

if($pricelist[$Element]['max'] != 0 ){
	$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();	
			$aa = 0 ;
				foreach($BuildArray as $ElementArray) {		
				if($ElementArray[0] == $Element ) {
			$aa = $aa + $ElementArray[1];	
			}
						}	
		$MAX = $pricelist[$Element]['max'] - $aa - $PLANET[$pricelist[$Element]['nom']];

	}
	else {	$MAX =1;}
		return $MAX;
	}	
	
	
		public function GetMaxConstructibleElements1($Element)
	{
		global $pricelist, $PLANET, $USER;
		
		

if($pricelist[$Element]['max'] != 0 ){
		$MAX = $pricelist[$Element]['max'] - $PLANET[$pricelist[$Element]['nom']];

}
else {	$MAX =1;}
		return $MAX;
	}
	
	public function GetMaxConstructibleElements($Element)
	{
		global $pricelist, $PLANET, $USER, $resource;
		
		if ($pricelist[$Element]['darkmatter'] != 0)
		{
			if($USER['geologe']==1)
				$pricelist[$Element]['darkmatter'] -=  $pricelist[$Element]['darkmatter'] * 20 / 100;
			$MAX[]				= floor($USER['darkmatter'] / $pricelist[$Element]['darkmatter']);
		}
		if ($pricelist[$Element]['metal'] != 0)
		{
			if($USER['geologe']==1)
				$pricelist[$Element]['metal'] -=  $pricelist[$Element]['metal'] * 20 / 100;
			$MAX[]				= floor($PLANET['metal'] / $pricelist[$Element]['metal']);
		}
		if ($pricelist[$Element]['crystal'] != 0)
		{
			if($USER['geologe']==1)
				$pricelist[$Element]['crystal'] -=  $pricelist[$Element]['crystal'] * 20 / 100;
			$MAX[]				= floor($PLANET['crystal'] / $pricelist[$Element]['crystal']);
		}
		if ($pricelist[$Element]['deuterium'] != 0)
		{
			if($USER['geologe']==1)
				$pricelist[$Element]['deuterium'] -=  $pricelist[$Element]['deuterium'] * 20 / 100;
			$MAX[]				= floor($PLANET['deuterium'] / $pricelist[$Element]['deuterium']);
		}		
		if ($pricelist[$Element]['norio'] != 0)
		{
			if($USER['geologe']==1)
				$pricelist[$Element]['norio'] -=  $pricelist[$Element]['norio'] * 20 / 100;
			$MAX[]				= floor($PLANET['norio'] / $pricelist[$Element]['norio']);
		}		


		if ($pricelist[$Element]['energy_max'] != 0)
			$MAX[]				= floor($PLANET['energy_max'] / $pricelist[$Element]['energy_max']);
		
	$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();   if ($Element == 502 or $Element == 503)
                        {
					
						$Misiles	 		= array();
						$Misiles[502]		= $PLANET[$resource[502]];
						$Misiles[503]		= $PLANET[$resource[503]];
						$SiloSize      		= $PLANET[$resource[44]];
						$MaxMissiles   		= $SiloSize * 10;

						foreach($BuildArray as $ElementArray) {
							if(isset($Misiles[$ElementArray[0]]))
								$Misiles[$ElementArray[0]] += $ElementArray[1];
                        }
                                
                                $ActuMissiles  = $Misiles[502] + (2 * $Misiles[503]);
                                $MissilesSpace = max(0, $MaxMissiles - $ActuMissiles);
                                
                                if($Element == 502)
                                        $Count =  $MissilesSpace;
                                else
                                        $Count = floor($MissilesSpace / 2);

                                $MAX[] = $Count;
                        }		
		
if($pricelist[$Element]['max'] != 0 ){
	
			$aa = 0 ;
				foreach($BuildArray as $ElementArray) {		
				if($ElementArray[0] == $Element ) {
			$aa = $aa + $ElementArray[1];	
			}
						}	
		$MAX[] = $pricelist[$Element]['max'] - $aa - $PLANET[$pricelist[$Element]['nom']];

	}
		return min($MAX);
	}

	public function GetElementRessources($Element, $Count)
	{
		global $pricelist;

		$ResType['metal']     	= ($pricelist[$Element]['metal']     * $Count);
		$ResType['crystal']  	= ($pricelist[$Element]['crystal']   * $Count);
		$ResType['deuterium'] 	= ($pricelist[$Element]['deuterium'] * $Count);
		$ResType['norio'] 	    = ($pricelist[$Element]['norio'] * $Count);
		$ResType['darkmatter'] 	= ($pricelist[$Element]['darkmatter'] * $Count);

		return $ResType;
	}
		
	public function CancelAuftr($CancelArray) 
	{
		global $USER, $PLANET;
		$ElementQueue = unserialize($PLANET['b_hangar_id']);
		foreach ($CancelArray as $ID => $Auftr)
		{
			if($Auftr == 0)
				$PLANET['b_hangar']	= 0;
				
			$ElementQ	= $ElementQueue[$Auftr];
			$Element	= $ElementQ[0];
			$Count		= $ElementQ[1];
				
			$Resses					= $this->GetElementRessources($Element, $Count);	
			$PLANET['metal']		+= $Resses['metal']			* 0.6;
			$PLANET['crystal']		+= $Resses['crystal']		* 0.6;
			$PLANET['deuterium']	+= $Resses['deuterium']		* 0.6;
			$PLANET['norio']	    += $Resses['norio']		    * 0.6;
			$USER['darkmatter']		+= $Resses['darkmatter']	* 0.6;
			
						if($USER['geologe'] >= 1)
			{
				$Resses['metal'] -= $Resses['metal']*20/100;
				$Resses['crystal'] -= $Resses['crystal']*20/100;
				$Resses['deuterium'] -= $Resses['deuterium']*20/100;
				$Resses['darkmatter'] -= $Resses['darkmatter']*20/100;
			}
			
			unset($ElementQueue[$Auftr]);
		}
		#$PLANET['b_hangar_id']	= serialize(array_values($ElementQueue));
		
		if(empty($ElementQueue))
		$PLANET['b_hangar_id']	= '';
		else
		$PLANET['b_hangar_id']	= serialize(array_values($ElementQueue));
		
		FirePHP::getInstance(true)->log("Cola(Hangar): ".$PLANET['b_hangar_id']);
	}
	
	public function GetRestPrice($Element, $Factor = true)
	{
		global $USER, $PLANET, $pricelist, $resource, $LNG;

		if ($Factor)
			$level = isset($PLANET[$resource[$Element]]) ? $PLANET[$resource[$Element]] : $USER[$resource[$Element]];

		$array = array(
			'metal'      => $LNG['Metal'],
			'crystal'    => $LNG['Crystal'],
			'deuterium'  => $LNG['Deuterium'],
			'norio'      => $LNG['Norio'],
			'energy_max' => $LNG['Energy'],
			'darkmatter' => $LNG['Darkmatter'],
		);
		
		$restprice	= array();
		foreach ($array as $ResType => $ResTitle)
		{
			if ($pricelist[$Element][$ResType] == 0)
				continue;
			
			$cost = $Factor ? floor($pricelist[$Element][$ResType] * pow($pricelist[$Element]['factor'], $level)) : floor($pricelist[$Element][$ResType]);
			
			$restprice[$ResTitle] = pretty_number(max($cost - (($PLANET[$ResType]) ? $PLANET[$ResType] : $USER[$ResType]), 0));
		}

		return $restprice;
	}

	public function BuildAuftr($fmenge)
        {
                global $USER, $PLANET, $reslist, $CONF, $resource;               
                
                foreach($fmenge as $Element => $Count)
                {
                        if(empty($Count) || !in_array($Element, array_merge($reslist['fleet'], $reslist['defense'])) || !IsTechnologieAccessible($USER, $PLANET, $Element))
                                continue;
                                
                        $Count                  = is_numeric($Count) ? round($Count) : 0;
                        $Count                  = max(min($Count, MAX_FLEET_OR_DEFS_PER_ROW), 0);
                        $MaxElements    = $this->GetMaxConstructibleElements($Element);
                        $Count                  = min($Count, $MaxElements);
						$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();
						
                        if ($Element == 502 or $Element == 503)
                        {
					
						$Misiles	 		= array();
						$Misiles[502]		= $PLANET[$resource[502]];
						$Misiles[503]		= $PLANET[$resource[503]];
						$SiloSize      		= $PLANET[$resource[44]];
						$MaxMissiles   		= $SiloSize * 10;

						foreach($BuildArray as $ElementArray) {
							if(isset($Misiles[$ElementArray[0]]))
								$Misiles[$ElementArray[0]] += $ElementArray[1];
                        }
                                
                                $ActuMissiles  = $Misiles[502] + (2 * $Misiles[503]);
                                $MissilesSpace = max(0, $MaxMissiles - $ActuMissiles);
                                
                                if($Element == 502)
                                        $Count = min($Count, $MissilesSpace);
                                else
                                        $Count = min($Count, floor($MissilesSpace / 2));

                                $Misiles[$Element] += $Count;
                        } elseif(in_array($Element, $reslist['one'])) {
                               $InBuild	= false;
								foreach($BuildArray as $ElementArray) {		
									if($ElementArray[1] == $Element) {
								$InBuild	= true;		
								break;		
							}
						}
						
						if($Count != 0 && $PLANET[$resource[$Element]] == 0 && $InBuild === false)
						$Count 		=  1;
                    }

                        if(empty($Count))
                                continue;
                                
						$Ressource 	 			= $this->GetElementRessources($Element, $Count);
						$PLANET['metal']	 	-= $Ressource['metal'];
						$PLANET['crystal']   	-= $Ressource['crystal'];
						$PLANET['deuterium'] 	-= $Ressource['deuterium'];
						$PLANET['norio'] 	    -= $Ressource['norio'];
						$USER['darkmatter']  	-= $Ressource['darkmatter'];

                        $BuildArray[]			= array($Element, floattostring($Count));
						$PLANET['b_hangar_id']	= serialize($BuildArray);
						FirePHP::getInstance(true)->log("Cola(Hangar): ".$PLANET['b_hangar_id']);
                }
        }
	
	public function FleetBuildingPage()
	{
		global $PLANET, $USER, $LNG, $resource, $dpath, $db, $reslist;

		include_once(ROOT_PATH . 'includes/functions/IsTechnologieAccessible.php');
		include_once(ROOT_PATH . 'includes/functions/GetElementPrice.php');
		
		$template	= new template();
		
		$PlanetRess = new ResourceUpdate();
		$PlanetRess->CalcResource();
		
		if ($PLANET[$resource[21]] == 0)
		{
			$PlanetRess->SavePlanetToDB();
			$template->message("<font color=#FF0000 size=4>".$LNG['bd_shipyard_required']);
			exit;
		}
		
		$fmenge	= $_POST['fmenge'];
		$cancel	= request_var('auftr', range(0, MAX_FLEET_OR_DEFS_IN_BUILD - 1));
		$action	= request_var('action', '');
				
		$NotBuilding = true;

		if (!empty($PLANET['b_building_id']))
		{
			$CurrentQueue 	= unserialize($PLANET['b_building_id']);
			foreach($CurrentQueue as $ElementArray) {
				if($ElementArray[0] == 21 || $ElementArray[0] == 15) {
					$NotBuilding = false;
					break;
				}
			}
		}

		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		if(empty($ElementQueue))
			$Count	= 0;	
		else
			$Count	= count($ElementQueue);		
		if($USER['urlaubs_modus'] == 0) {
			if (!empty($fmenge) && $NotBuilding == true) {
				if ($Count >= MAX_FLEET_OR_DEFS_IN_BUILD) {
					$template->message(sprintf($LNG['bd_max_builds'], MAX_FLEET_OR_DEFS_IN_BUILD), "?page=buildings&mode=fleet", 3);
					exit;
				}
				$this->BuildAuftr($fmenge);
			}
			if ($action == "delete" && is_array($cancel))	
				$this->CancelAuftr($cancel);			
		}
		$PlanetRess->SavePlanetToDB();
$allow = $PLANET['fleet'];				
if($_GET['mode2'] == 1){$allow ="fleet" ;	$db->query("UPDATE ".PLANETS." SET fleet = 'fleet' ;");}
if($_GET['mode2'] == 2){$allow ="transport" ;	$db->query("UPDATE ".PLANETS." SET fleet = 'transport' ;");}
if($_GET['mode2'] == 3){$allow ="speciaux" ;	$db->query("UPDATE ".PLANETS." SET fleet = 'speciaux' ;");}
if($_GET['mode2'] == 4){$allow ="guerre" ; $db->query("UPDATE ".PLANETS." SET fleet = 'guerre' ;");}

$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();
				
		foreach($reslist[$allow] as $Element)
		{

			$bloque = 0;
			if(!IsTechnologieAccessible($USER, $PLANET, $Element))
			$bloque = 1;
			

			{
				$FleetList[]	= array(

					'id'			=> $Element,
					'name'			=> $LNG['tech'][$Element],
					'descriptions'	=> $LNG['res']['descriptions'][$Element],
					'price'			=> GetElementPrice($USER, $PLANET, $Element, false),
					'restprice'		=> $this->GetRestPrice($Element, false),
					'time'			=> pretty_time(GetBuildingTime($USER, $PLANET, $Element)),
					'IsAvailable'	=> IsElementBuyable($USER, $PLANET, $Element, false),
					'GetMaxAmount'	=> floattostring($this->GetMaxConstructibleElements($Element)),
					'GetMaxAmount1'	=> floattostring($this->GetMaxConstructibleElements1($Element)),
					'Available'		=> pretty_number($PLANET[$resource[$Element]]),
					'bloque'		=> $bloque,
				);
			}
		}
		
		$Buildlist	= array();
		
		if($USER['raza'] == 0) {
		$skin_raza = "gultra";
		} elseif ($USER['raza'] == 1) {
		$skin_raza = "voltra";
		} 
		
		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);		
		if(!empty($ElementQueue)) {
			$Shipyard		= array();
			$QueueTime		= 0;
			foreach($ElementQueue as $Element)
			{
				if (empty($Element))
					continue;
					
				$ElementTime  	= GetBuildingTime($USER, $PLANET, $Element[0]);
				$QueueTime   	+= $ElementTime * $Element[1];
				$Shipyard[]		= array($LNG['tech'][$Element[0]], $Element[1], $ElementTime, $Element[0]);		
			}

			$template->loadscript('bcmath.js');
			$template->loadscript('shipyard.js');
			$template->execscript('ShipyardInit();');
			
			$Buildlist	= array(
			
				'MaxQueue' 				=> $PLANET[$resource[$Element[0]]],			
				'Queue' 				=> $Shipyard,
				'b_hangar_id_plus' 		=> $PLANET['b_hangar'],
				'skin_raza' 	=> $skin_raza,
				'pretty_time_b_hangar' 	=> pretty_time(max($QueueTime - $PLANET['b_hangar'],0)),
			);
		}


		
		$template->assign_vars(array(
		
				        'allow'                 => $allow,			
						'planet_type'             => $PLANET['planet_type'],
				        'bv_gene'                 => $LNG['bv_gene'],
						'bv_transp'                 => $LNG['bv_transp'],
						'bv_vspeci'                 => $LNG['bv_vspeci'],
						'bv_vguerre'                => $LNG['bv_vguerre'],
						'bv_max'                => $LNG['bv_max'],
						'bv_bloque'                => $LNG['bv_bloque'],
		

			'FleetList'				=> $FleetList,
			'NotBuilding'			=> $NotBuilding,
			'bd_available'			=> $LNG['bd_available'],
			'bd_remaining'			=> $LNG['bd_remaining'],
			'fgf_time'				=> $LNG['fgf_time'],
			'bd_build_ships'		=> $LNG['bd_build_ships'],
			'bd_building_shipyard'	=> $LNG['bd_building_shipyard'],
			'bd_completed'			=> $LNG['bd_completed'],
			'bd_cancel_warning'		=> $LNG['bd_cancel_warning'],
			'bd_cancel_send'		=> $LNG['bd_cancel_send'],
			'bd_actual_production'	=> $LNG['bd_actual_production'],
			'bd_operating'			=> $LNG['bd_operating'],
			'BuildList'				=> json_encode($Buildlist),
			'USERcommander' => $USER['commander'],
			'maxlength'				=> strlen(MAX_FLEET_OR_DEFS_PER_ROW),
		));
		$template->show("construibles/shipyard_fleet.tpl");
	}

	public function DefensesBuildingPage()
	{
		global $USER, $PLANET, $LNG, $resource, $dpath, $reslist, $db;

		include_once(ROOT_PATH . 'includes/functions/IsTechnologieAccessible.php');
		include_once(ROOT_PATH . 'includes/functions/GetElementPrice.php');

		$template	= new template();

		$PlanetRess = new ResourceUpdate();
		$PlanetRess->CalcResource();
		if ($PLANET[$resource[21]] == 0)
		{
			$PlanetRess->SavePlanetToDB();
			$template->message("<font color=#FF0000 size=4>".$LNG['bd_shipyard_required']);
			exit;
		}

		$fmenge	= $_POST['fmenge'];
		$cancel	= request_var('auftr', range(0, MAX_FLEET_OR_DEFS_IN_BUILD - 1));
		$action	= request_var('action', '');
								
		$NotBuilding = true;
		if (!empty($PLANET['b_building_id']))
		{
			$CurrentQueue 	= unserialize($PLANET['b_building_id']);
			foreach($CurrentQueue as $ElementArray) {
				if($ElementArray[0] == 21 || $ElementArray[0] == 15) {
					$NotBuilding = false;
					break;
				}
			}
		}
		
	$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
	if(empty($ElementQueue))
		$Count	= 0;
	else
		$Count	= count($ElementQueue);
	if($USER['urlaubs_modus'] == 0) {
		if (!empty($fmenge) && $NotBuilding == true) {
			if ($Count >= MAX_FLEET_OR_DEFS_IN_BUILD) {
				$template->message(sprintf($LNG['bd_max_builds'], MAX_FLEET_OR_DEFS_IN_BUILD), "?page=buildings&mode=defense", 3);
				exit;
		}
		$this->BuildAuftr($fmenge);
	}
	if ($action == "delete" && is_array($cancel) && $USER['urlaubs_modus'] == 0)
	$this->CancelAuftr($cancel);
}	
		$PlanetRess->SavePlanetToDB();

$allow = $PLANET['defense'];				
if($_GET['mode1'] == 1){$allow ="defense" ;	$db->query("UPDATE ".PLANETS." SET defense = 'defense' ;");}
if($_GET['mode1'] == 2){$allow ="dome" ;	$db->query("UPDATE ".PLANETS." SET defense = 'dome' ;");}
if($_GET['mode1'] == 3){$allow ="terrestre" ;	$db->query("UPDATE ".PLANETS." SET defense = 'terrestre' ;");}
if($_GET['mode1'] == 4){$allow ="missile" ; $db->query("UPDATE ".PLANETS." SET defense = 'missile' ;");}

$BuildArray    	= !empty($PLANET['b_hangar_id']) ? unserialize($PLANET['b_hangar_id']) : array();		
		foreach($reslist[$allow] as $Element)
		{
			$bloque = 0;
			if(!IsTechnologieAccessible($USER, $PLANET, $Element))
			$bloque = 1;
	
			$DefenseList[]	= array(
				'bloque'						=> $bloque,
				'id'			=> $Element,
				'name'			=> $LNG['tech'][$Element],
				'descriptions'	=> $LNG['res']['descriptions'][$Element],
				'price'			=> GetElementPrice($USER, $PLANET, $Element, false),
				'restprice'		=> $this->GetRestPrice($Element),
				'time'			=> pretty_time(GetBuildingTime($USER, $PLANET, $Element)),
				'IsAvailable'	=> IsElementBuyable($USER, $PLANET, $Element, false),
				'GetMaxAmount'	=> floattostring($this->GetMaxConstructibleElements($Element)),
				'GetMaxAmount1'	=> floattostring($this->GetMaxConstructibleElements1($Element)),
				'GetMaxAmount2'	=> floattostring($this->GetMaxConstructibleElements2($Element)),
				'Available'		=> pretty_number($PLANET[$resource[$Element]]),
				'AlreadyBuild'	=> (in_array($Element, $reslist['one']) && (strpos($PLANET['b_hangar_id'], $Element.",") !== false || $PLANET[$resource[$Element]] != 0)) ? true : false,
			);
		}
		
		$ElementQueue 	= unserialize($PLANET['b_hangar_id']);
		
		if($USER['raza'] == 0) {
		$skin_raza = "gultra";
		} elseif ($USER['raza'] == 1) {
		$skin_raza = "voltra";
		} 
		
		$Buildlist		= array();
		if(!empty($ElementQueue)) {
			$Shipyard		= array();
			$QueueTime		= 0;
			foreach($ElementQueue as $Element)
			{
				if (empty($Element))
					continue;
				$ElementTime  	= GetBuildingTime( $USER, $PLANET, $Element[0]);
				$QueueTime   	+= $ElementTime * $Element[1];
				$Shipyard[]		= array($LNG['tech'][$Element[0]], $Element[1], $ElementTime, $Element[0]);		
			}

			$template->loadscript('bcmath.js');
			$template->loadscript('shipyard.js');
			$template->execscript('ShipyardInit();');
			
			$Buildlist	= array(
				'MaxQueue' 				=> $PLANET[$resource[$Element[0]]],			
				'Queue' 				=> $Shipyard,
				'b_hangar_id_plus' 		=> $PLANET['b_hangar'],
				'skin_raza' 	=> $skin_raza,
				'pretty_time_b_hangar' 	=> pretty_time(max($QueueTime - $PLANET['b_hangar'],0)),
			);
		}


				
		$template->assign_vars(array(
		
						  'allow'                 => $allow,	
						'planet_type'             => $PLANET['planet_type'],
				        'bv_gene'                 => $LNG['bv_gene'],
						'bv_dome'                 => $LNG['bv_dome'],
						'bv_terrestre'                 => $LNG['bv_terrestre'],
						'bv_misspa'                => $LNG['bv_misspa'],		

			'DefenseList'					=> $DefenseList,
			'NotBuilding'					=> $NotBuilding,
			'bd_available'					=> $LNG['bd_available'],
			'bd_remaining'					=> $LNG['bd_remaining'],
			'fgf_time'						=> $LNG['fgf_time'],
			'bd_build_ships'				=> $LNG['bd_build_ships'],
			'bd_building_shipyard'			=> $LNG['bd_building_shipyard'],
			'bd_protection_shield_only_one'	=> $LNG['bd_protection_shield_only_one'],
			'bd_cancel_warning'				=> $LNG['bd_cancel_warning'],
			'bd_cancel_send'				=> $LNG['bd_cancel_send'],
			'bd_operating'					=> $LNG['bd_operating'],
			'bd_actual_production'			=> $LNG['bd_actual_production'],
			'BuildList'						=> json_encode($Buildlist),
			'USERcommander' => $USER['commander'],
			'maxlength'						=> strlen(MAX_FLEET_OR_DEFS_PER_ROW),
		));
		$template->show("construibles/shipyard_defense.tpl");
	}
}
?>