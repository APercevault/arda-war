<?php
function ShowFleetTraderPage()
{
	global $USER, $PLANET, $LNG, $CONF, $pricelist, $resource, $reslist, $db;

	$template	= new template();
	$template->loadscript('fleettrader.js');
	$template->execscript('updateVars();');	
	
	
	
	
	
	$PlanetRess = new ResourceUpdate();
	$PlanetRess->CalcResource();
	$CONF['trade_allowed_ships']	= explode(',', $CONF['trade_allowed_ships']);
	$ID								= request_var('id', 0);
	$IDA							= request_var('ida', 0);
	
	if(!empty($ID) && in_array($ID, $CONF['trade_allowed_ships'])) {
		$Count						= min(request_outofint('count'), $PLANET[$resource[$ID]]);
		$metal_total 				=  $Count * $pricelist[$ID]['metal'] * (1 - (VENTE_TAXE_VAISSEAU / 100));
		$PLANET['metal']			+= $metal_total;
		$crystal_total 				=  $Count * $pricelist[$ID]['crystal'] * (1 - (VENTE_TAXE_VAISSEAU / 100));
		$PLANET['crystal']			+= $crystal_total;
		$deuterium_total 			=  $Count * $pricelist[$ID]['deuterium'] * (1 - (VENTE_TAXE_VAISSEAU / 100));
		$PLANET['deuterium']		+= $deuterium_total ;
		$norio_total		    	= $Count * $pricelist[$ID]['norio'] * (1 - (VENTE_TAXE_VAISSEAU / 100));	
		$PLANET['norio']		    += $norio_total;
		$darkmatter_total 			= $Count * $pricelist[$ID]['darkmatter'] * (1 - (VENTE_TAXE_VAISSEAU / 100));
		$USER['darkmatter']			+= $darkmatter_total;				
		$PLANET[$resource[$ID]]		-= $Count;
		$PlanetRess->Builded[$ID]	-= $Count;
unset($_POST);
		$PlanetRess->SavePlanetToDB(); 
	if ($Count > 0) {$template->message("<font color=lime size=4><b>".$LNG['ft_vente'],"?page=fleettrader&mode=vente",4);
	exit; }
	}
	
		if(!empty($IDA) && in_array($IDA, $CONF['trade_allowed_ships'])) {
		$Count	= request_outofint('count');	
		$metal_total 				=  $Count * $pricelist[$IDA]['metal'] * (1 + (ACHAT_TAXE_VAISSEAU / 100));
		$PLANET['metal']			-= $metal_total;
		$crystal_total 				=  $Count * $pricelist[$IDA]['crystal'] * (1 + (ACHAT_TAXE_VAISSEAU / 100));
		$PLANET['crystal']			-= $crystal_total;
		$deuterium_total 			=  $Count * $pricelist[$IDA]['deuterium'] * (1 + (ACHAT_TAXE_VAISSEAU / 100));
		$PLANET['deuterium']		-= $deuterium_total ;
		$norio_total		    	= $Count * $pricelist[$IDA]['norio'] * (1 + (ACHAT_TAXE_VAISSEAU / 100));	
		$PLANET['norio']		    -= $norio_total;
		$darkmatter_total 			= $Count * $pricelist[$IDA]['darkmatter'] * (1 + (ACHAT_TAXE_VAISSEAU / 100));
		$PLANET[$resource[$IDA]]		+= $Count;
		$PlanetRess->Builded[$IDA]	+= $Count;
unset($_POST);	
		$PlanetRess->SavePlanetToDB(); 
	if ($Count > 0) {$template->message("<font color=lime size=4><b>".$LNG['ft_achat'],"?page=fleettrader&mode=achat",4);
	exit; }
		}
	
	//if ($Count > 0) {
		//$SQL = "INSERT INTO uni1_fleettrades SET ";
		//$SQL .= "`trader_id` = '".$USER[id] . "', ";
		//$SQL .= "`planet_id` = '".$PLANET[id] . "', ";
		//$SQL .= "`fleettrade_date` = '".TIMESTAMP."', ";
		//$SQL .= "`ship_id` = '".$ID."', ";
		//$SQL .= "`ship_ammount` = '".$Count."', ";
		//$SQL .= "`metal_total` = '".$metal_total."', ";
		//$SQL .= "`crystal_total` = '".$crystal_total."', ";
		//$SQL .= "`deuterium_total` = '".$deuterium_total."', ";
		//$SQL .= "`norio_total` = '".$norio_total."',";
		//$SQL .= "`darkmatter_total` = '".$darkmatter_total."'";
		//$db->query($SQL);
		
		$PlanetRess->SavePlanetToDB(); 
	//}
		$mode	= request_var('mode', '');
	switch($mode)
	{
	case 'vente':
	
	

	$Cost	= array();
	foreach($CONF['trade_allowed_ships'] as $ID)
	{
		if(in_array($ID, $reslist['Commerçant']))
			$Cost[$ID]	= array($PLANET[$resource[$ID]], $pricelist[$ID]['metal'], $pricelist[$ID]['crystal'], $pricelist[$ID]['deuterium'], $pricelist[$ID]['darkmatter'], $pricelist[$ID]['norio']);
	}
	
	if(empty($Cost)) {
		$template->message("<font color=#FF0000 size=4>".$LNG['ft_empty'], "?page=mercado", 5);
		exit;
	}
foreach($reslist['Commerçant'] as $ID){
			$infofleet[$ID] = $PLANET[$resource[$ID]];	
	}


		$template->assign_vars(array(

		'revente'					=> $LNG['revente'],	
		'ft_head'					=> $LNG['ft_head'],
		'taxecommercant'			=> $LNG['taxecommercant'],		
		'al_back'					=> $LNG['al_back'],		
		'rachat_comerciante'				=> $LNG['rachat_comerciante'],	
		'ft_selecciona'				=> $LNG['ft_selecciona'],
		'ft_uniselec'				=> $LNG['ft_uniselec'],
		'tech'						=> $LNG['tech'],
		'ft_unidad'					=> $LNG['ft_unidad'],
		'ft_max'					=> $LNG['ft_max'],
		'ft_total'					=> $LNG['ft_total'],
		'ft_coste'					=> $LNG['ft_coste'],		
		'ft_cantidad'				=> $LNG['ft_cantidad'],
		'ft_absenden'				=> $LNG['ft_absenden'],
		'ft_cau'					=> $LNG['ft_cau'],
		'ft_cau_2'					=> $LNG['ft_cau_2'],
		'trade_allowed_ships'		=> $CONF['trade_allowed_ships'],
		'CostInfos'					=> json_encode($Cost),
		'infofleet'					=> $infofleet,	
		'Charge'					=> VENTE_TAXE_VAISSEAU,
		'ft_charge'					=> $LNG['ft_charge'],
	));
	
	$template->show("mercader/fleettrader_vente.tpl");	
	break;
//////////////////////////////////////////////
/////////////////////////////////////////////	
	case 'achat':


	$Cost	= array();
	foreach($CONF['trade_allowed_ships'] as $IDA)
	{
			@$nb_tit = floor($PLANET['metal'] / ($pricelist[$IDA]['metal'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['metal'] <= 0) {$nb_tit = 1000000000000000000000000000000000000000;}
			@$nb_cry = floor($PLANET['crystal'] / ($pricelist[$IDA]['crystal'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['crystal'] <= 0) {$nb_cry = 1000000000000000000000000000000000000000;}
			@$nb_deu = floor($PLANET['deuterium'] / ($pricelist[$IDA]['deuterium'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['deuterium'] <= 0) {$nb_deu = 1000000000000000000000000000000000000000;}
			@$nb_nor = floor($PLANET['norio'] / ($pricelist[$IDA]['norio'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['norio'] <= 0) {$nb_nor = 1000000000000000000000000000000000000000;}
			$nb_max[$IDA] = min($nb_tit,$nb_cry,$nb_deu,$nb_nor);
			if($nb_max[$IDA] < 0)$nb_max[$IDA] = 0 ;

		if(in_array($IDA, $reslist['Commerçant']))
			$Cost[$IDA]	= array($nb_max[$IDA], $pricelist[$IDA]['metal'], $pricelist[$IDA]['crystal'], $pricelist[$IDA]['deuterium'], $pricelist[$IDA]['darkmatter'], $pricelist[$IDA]['norio']);
	}
	
	if(empty($Cost)) {
		$template->message("<font color=#FF0000 size=4>".$LNG['ft_empty'], "?page=mercado", 5);
		exit;
	}
foreach($reslist['Commerçant'] as $IDA){
	
			
			@$nb_tit = floor($PLANET['metal'] / ($pricelist[$IDA]['metal'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['metal'] <= 0) {$nb_tit = 1000000000000000000000000000000000000000;}
			@$nb_cry = floor($PLANET['crystal'] / ($pricelist[$IDA]['crystal'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['crystal'] <= 0) {$nb_cry = 1000000000000000000000000000000000000000;}
			@$nb_deu = floor($PLANET['deuterium'] / ($pricelist[$IDA]['deuterium'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['deuterium'] <= 0) {$nb_deu = 1000000000000000000000000000000000000000;}
			@$nb_nor = floor($PLANET['norio'] / ($pricelist[$IDA]['norio'] * (1 + ACHAT_TAXE_VAISSEAU / 100)));
			if($pricelist[$IDA]['norio'] <= 0) {$nb_nor = 1000000000000000000000000000000000000000;}
			$nb_max[$IDA] = min($nb_tit,$nb_cry,$nb_deu,$nb_nor);
			if($nb_max[$IDA] < 0)$nb_max[$IDA] = 0 ;			

			$infofleet[$IDA] = $nb_max[$IDA];	
	}	
		$template->assign_vars(array(

		'achat'					=> $LNG['achat'],	
		'ft_head'					=> $LNG['ft_head'],
		'taxecommercant'			=> $LNG['taxecommercant'],		
		'al_back'					=> $LNG['al_back'],		
		'vente_comerciante'				=> $LNG['vente_comerciante'],	
		'ft_selecciona'				=> $LNG['ft_selecciona'],
		'ft_uniselec'				=> $LNG['ft_uniselec'],
		'tech'						=> $LNG['tech'],
		'ft_unidad'					=> $LNG['ft_unidad'],
		'ft_max'					=> $LNG['ft_max'],
		'ft_total'					=> $LNG['ft_total'],
		'ft_coste'					=> $LNG['ft_coste'],		
		'ft_cantidad'				=> $LNG['ft_cantidad'],
		'ft_absenden'				=> $LNG['ft_absenden'],
		'ft_cau'					=> $LNG['ft_cau'],
		'ft_cau_2'					=> $LNG['ft_cau_2'],
		'trade_allowed_ships'		=> $CONF['trade_allowed_ships'],
		'CostInfos'					=> json_encode($Cost),
		'infofleet'					=> $infofleet,	
		'Charge'					=> ACHAT_TAXE_VAISSEAU,
		'ft_charge'					=> $LNG['ft_charge'],
	));
	
	$template->show("mercader/fleettrader_achat.tpl");		
/////////////////////////////////////////
////////////////////////////////////////	
	break;
default:	
	
	

	$template->assign_vars(array(

	
		'fleet_achat_vente'					=> $LNG['fleet_achat_vente'],	
		'fleet_achat'					=> $LNG['fleet_achat'],	
		'fleet_vente'					=> $LNG['fleet_vente'],	
		'al_back'					=> $LNG['al_back'],		

	));
	
	$template->show("mercader/fleettrader_achat_vente_vaisseaux.tpl");
break;	
}}
?>