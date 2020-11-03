
<?php
//modifié class.template.php (bonus 24h)
//modifié game.php (bonus24)
//modifié left_menu.tpl (bonus24)
//créé bonus_24.tpl
//créé class.ShowBonus24Page.php
/*
requête SQL xxxx préfixe de la table
ALTER TABLE xxxx_planets ADD dailybonus int (11) NOT NULL ;
*/
function reinitialiser($plus)
	{
	global $LNG;
	
	$template    = new template();
	$template->assign_vars(array(
	'header'	=> $plus,
	'actualisation1' => $LNG['actualisation1'],
	'actualisation' => $LNG['actualisation'],
	));
$template->show("reinitialiser/reinitialiser.tpl"); 
	exit ;
   } 
   
function ShowBonus24Page()
{
global $PLANET, $LNG, $USER, $CONF, $db, $bonustpl;

if($PLANET['dailybonus'] < TIMESTAMP){
$bonusrand = mt_rand(1,(int) 300);
$time = 86400 + TIMESTAMP;
//jackpot tout les officiers pendant 7 jours
if (($USER['commander'] == 0 OR $USER['engineer'] == 0 OR $USER['admiral'] == 0 OR $USER['technocratic'] == 0 OR $USER['geologe'] == 0)){$error1 = 2 ;}
if ($bonusrand ==297  AND $error1 == 2 )
{
$timeofficier = 604800 +	TIMESTAMP;
	
	
	$db->query("UPDATE ".USERS." SET commander = '1' , commander_time ='".$timeofficier."' WHERE `id` = '".$USER['id']."';");
	$db->query("UPDATE ".USERS." SET admiral = '1' , admiral_time ='".$timeofficier."' WHERE `id` = '".$USER['id']."';");
	$db->query("UPDATE ".USERS." SET technocratic = '1' , technocratic_time ='".$timeofficier."' WHERE `id` = '".$USER['id']."';");
	$db->query("UPDATE ".USERS." SET engineer = '1' , engineer_time ='".$timeofficier."' WHERE `id` = '".$USER['id']."';");	
	$db->query("UPDATE ".USERS." SET geologe = '1' , geologe_time ='".$timeofficier."' WHERE `id` = '".$USER['id']."';");	
$db->query("UPDATE ".PLANETS." SET `dailybonus` = ".$time." WHERE `id` = ".$PLANET['id'].";");
	$bonustpl = 2 ;
}




// bonus 24h normal(simplement les ressources)
if (($PLANET['metal_perhour'] < 100)){$PLANET['metal_perhour'] = 100 ;}
if (($PLANET['crystal_perhour'] < 100)){$PLANET['crystal_perhour'] = 100 ;}
if (($PLANET['deuterium_perhour'] < 100)){$PLANET['deuterium_perhour'] = 100 ;}
if (($PLANET['norio_perhour'] < 100)){$PLANET['norio_perhour'] = 100 ;}



	$db->query("UPDATE ".PLANETS." SET metal = '".$PLANET['metal']."'+'".$PLANET['metal_perhour']."' WHERE `id` = '".$PLANET['id']."';");
	$db->query("UPDATE ".PLANETS." SET crystal = '".$PLANET['crystal']."'+'".$PLANET['crystal_perhour']."' WHERE `id` = '".$PLANET['id']."';");
	$db->query("UPDATE ".PLANETS." SET deuterium = '".$PLANET['deuterium']."'+'".$PLANET['deuterium_perhour']."' WHERE `id` = '".$PLANET['id']."';");
	$db->query("UPDATE ".PLANETS." SET norio = '".$PLANET['norio']."'+'".$PLANET['norio_perhour']."' WHERE `id` = '".$PLANET['id']."';");

$db->query("UPDATE ".PLANETS." SET `dailybonus` = ".$time." WHERE `id` = ".$PLANET['id'].";");


$template	= new template();
		$template->assign_vars(array(
'bo_metal'					=> $LNG['bo_metal'],
'bo_deuterium'				=> $LNG['bo_deuterium'],
'bo_cristal'				=> $LNG['bo_cristal'],
'bo_norio'					=> $LNG['bo_norio'],
'bonus'						=> $bonus,				
'bonus2'					=> $bonus2,		
'bo_bonus24'				=> $LNG['bo_bonus24'],
'bo_titane'					=> intval($PLANET['metal_perhour']),
'bo_cricri'					=> intval($PLANET['crystal_perhour']),
'bo_deutdeut'				=> intval($PLANET['deuterium_perhour']),
'bo_norionorio'				=> intval($PLANET['norio_perhour']),
'bonus24'					=> $LNG['lm_bonus24'],
'fl_continue'				=> $LNG['fl_continue'],		
'bonustpl'					=> $bonustpl,

		));
		
		
		$template->show('bonus/bonus_24.tpl');
}
	if($PLANET['dailybonus'] > TIMESTAMP){ 
$plus = 2 ;		
reinitialiser($plus);
exit ;	
	}	
}
?>	