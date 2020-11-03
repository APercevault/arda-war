<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if(!defined('INSIDE')) die('Hacking attempt!');

class ShowSoldatPage
{

function reinitialiser($plus)
	{
	global $LNG;
	
	$template    = new template();
	$template->assign_vars(array(
	'header'	=> $plus,
	'actualisation1' => $LNG['actualisation1'],
	'actualisation'  => $LNG['actualisation'],
	));
$template->show("reinitialiser/reinitialiser.tpl"); 
	exit ;
   } 

    function __construct(&$USER)
   {      
    global $PLANET, $USER, $LNG, $LANG, $dpath, $CONF, $resource, $reslist,  $pricelist, $db;

		
	if ($USER['commander'] == 1 AND $USER['admiral'] == 1 AND $USER['technocratic'] == 1 AND $USER['engineer'] == 1 AND $USER['geologe'] == 1) 
{
$a = 3;
$totalofficiers = $LNG['totalofficiers1'];
}
	else 
{
$a = 1;	
$totalofficiers = $LNG['totalofficiers2'];
}			
	
	$template    = new template();
$time_leger=450 / $a;$titane_leger=1800;$silicium_leger=450;$deterium_leger=750;
$time_lourd=600 / $a;$titane_lourd=3600;$silicium_lourd=900;$deterium_lourd=1500;
$time_archeologue=400 / $a;$titane_archeologue=2100;$silicium_archeologue=210;$deterium_archeologue=450;
$time_scientifique=750 / $a;$titane_scientifique=2700;$silicium_scientifique=450;$deterium_scientifique=300;
$time_malp=750 / $a;$titane_malp=3300;$silicium_malp=900;$deterium_malp=180;
$time_drone=900 / $a;$titane_drone=3300;$silicium_drone=1800;$deterium_drone=300;
$time_unas=900 / $a;$titane_unas=2100;$silicium_unas=1200;$deterium_unas=3600;
$time_jaffa=900 / $a;$titane_jaffa=1800;$silicium_jaffa=1800;$deterium_jaffa=1500;
$time_anubis=7200 / $a;$titane_anubis=18000;$silicium_anubis=21000;$deterium_anubis=12000;


$hoytime = $_SERVER['REQUEST_TIME'];
if ($PLANET['time_plani'] <= $hoytime AND $PLANET['plani_soldat'] == 1)
{	
$plani_soldat1 = 1;	
}	
$plani_soldat2 = $_POST['plani_soldat2'];
if ( $plani_soldat2 == 1 )
{
		$db->query("UPDATE ".PLANETS." SET leger = '".$PLANET['leger']."'+'".$PLANET['plani_leger']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET lourd = '".$PLANET['lourd']."'+'".$PLANET['plani_lourd']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET archeologue = '".$PLANET['archeologue']."'+'".$PLANET['plani_archeologue']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET scientifique = '".$PLANET['scientifique']."'+'".$PLANET['plani_scientifique']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET malp = '".$PLANET['malp']."'+'".$PLANET['plani_malp']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET drone = '".$PLANET['drone']."'+'".$PLANET['plani_drone']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET unas = '".$PLANET['unas']."'+'".$PLANET['plani_unas']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET jaffa = '".$PLANET['jaffa']."'+'".$PLANET['plani_jaffa']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET anubis = '".$PLANET['anubis']."'+'".$PLANET['plani_anubis']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_soldat = '0' WHERE `id` = '".$PLANET['id']."';");  
		
		$db->query("UPDATE ".PLANETS." SET plani_leger = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_lourd = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_archeologue = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_scientifique = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_malp = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_drone = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_unas = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_jaffa = '0' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_anubis = '0' WHERE `id` = '".$PLANET['id']."';");

$plus = 1 ;		
$this->reinitialiser($plus);		
exit ;		
}

$OK = $_POST['OK'];
if ( $OK == 1 AND $PLANET['plani_soldat']==0) {
	
/** ICI le temps de la planification */
$offtime = ($time_leger * ($_POST['choix_leger']/3)) +($time_lourd * ($_POST['choix_lourd']/3)) +($time_archeologue * ($_POST['choix_archeologue']/3)) +($time_scientifique * ($_POST['choix_scientifique']/3)) +($time_malp * ($_POST['choix_malp']/3)) +($time_drone * ($_POST['choix_drone']/3)) +($time_unas * ($_POST['choix_unas']/3)) +($time_jaffa * ($_POST['choix_jaffa']/3)) +($time_anubis * ($_POST['choix_anubis']/3))  ;

      $newEndTime = $_SERVER['REQUEST_TIME'] + $offtime; 
	
		$db->query("UPDATE ".PLANETS." SET plani_leger = '".$_POST['choix_leger']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_lourd = '".$_POST['choix_lourd']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_archeologue = '".$_POST['choix_archeologue']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_scientifique = '".$_POST['choix_scientifique']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_malp = '".$_POST['choix_malp']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_drone = '".$_POST['choix_drone']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_unas = '".$_POST['choix_unas']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_jaffa = '".$_POST['choix_jaffa']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_anubis = '".$_POST['choix_anubis']."' WHERE `id` = '".$PLANET['id']."';");
		$db->query("UPDATE ".PLANETS." SET plani_soldat = '1' WHERE `id` = '".$PLANET['id']."';");  
		$db->query("UPDATE ".PLANETS." SET time_plani = '".$newEndTime."' WHERE `id` = '".$PLANET['id']."';");
		
/** ICI le metal, le cricri et le deterium restant */
		
$titane = ($titane_leger * $_POST['choix_leger']) +  ($titane_lourd * $_POST['choix_lourd']) + ($titane_archeologue * $_POST['choix_archeologue']) + ($titane_scientifique * $_POST['choix_scientifique']) + ($titane_malp * $_POST['choix_malp']) + ($titane_drone * $_POST['choix_drone']) + ($titane_unas * $_POST['choix_unas']) + ($titane_jaffa * $_POST['choix_jaffa']) + ($titane_anubis * $_POST['choix_anubis']) ; 

$cricri = ($silicium_leger * $_POST['choix_leger']) +  ($silicium_lourd * $_POST['choix_lourd']) + ($silicium_archeologue * $_POST['choix_archeologue']) + ($silicium_scientifique * $_POST['choix_scientifique']) + ($silicium_malp * $_POST['choix_malp']) + ($silicium_drone * $_POST['choix_drone']) + ($silicium_unas * $_POST['choix_unas']) + ($silicium_jaffa * $_POST['choix_jaffa']) + ($silicium_anubis * $_POST['choix_anubis']) ; 

$deutdeut = ($deterium_leger * $_POST['choix_leger']) +  ($deterium_lourd * $_POST['choix_lourd']) + ($deterium_archeologue * $_POST['choix_archeologue']) + ($deterium_scientifique * $_POST['choix_scientifique']) + ($deterium_malp * $_POST['choix_malp']) + ($deterium_drone * $_POST['choix_drone']) + ($deterium_unas * $_POST['choix_unas']) + ($deterium_jaffa * $_POST['choix_jaffa']) + ($deterium_anubis * $_POST['choix_anubis']) ; 

$metalp = $PLANET['metal']-$titane;
$crystalp = $PLANET['crystal']-$cricri;
$deuteriump = $PLANET['deuterium']-$deutdeut;
$db->query("UPDATE ".PLANETS." SET metal = '".$metalp."' WHERE `id` = '".$PLANET['id']."';");
$db->query("UPDATE ".PLANETS." SET crystal = '".$crystalp."' WHERE `id` = '".$PLANET['id']."';");
$db->query("UPDATE ".PLANETS." SET deuterium = '".$deuteriump."' WHERE `id` = '".$PLANET['id']."';");

$plus = 1 ;		
$this->reinitialiser($plus);
exit ;
 
}
$plani_leger = $PLANET['plani_leger'];
$plani_lourd = $PLANET['plani_lourd'];
$plani_archeologue = $PLANET['plani_archeologue'];
$plani_scientifique = $PLANET['plani_scientifique'];
$plani_malp = $PLANET['plani_malp'];
$plani_drone = $PLANET['plani_drone'];
$plani_unas = $PLANET['plani_unas'];
$plani_jaffa = $PLANET['plani_jaffa'];
$plani_anubis = $PLANET['plani_anubis'];

	#Soldat Léger

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 3 || $PLANET['c_entrainement'] < 3 || $USER['military_tech'] < 3 || $USER['defence_tech'] < 3 || $USER['shield_tech'] < 3) 
	{
		$actividad700 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad700a = 3 ;
	}
	else {
		$actividad700 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad700a = 0 ;
	}


	#Soldat Lourd

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 6 || $PLANET['c_entrainement'] < 6 || $USER['military_tech'] < 6 || $USER['defence_tech'] < 6 || $USER['shield_tech'] < 6) 
	{
		$actividad701 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad701a = 3 ;
	}
	else {
		$actividad701 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad701a = 0 ;
	}


	#Archéologue

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_etude'] < 6) 
	{
		$actividad702 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad702a = 3 ;
	}
	else {
		$actividad702 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad702a = 0 ;
	}

	
	#Scientifique

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['laboratory'] < 6) 
	{
		$actividad703 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad703a = 3 ;
	}
	else {
		$actividad703 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad703a = 0 ;
	}


	#Malp

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 4 || $USER['computer_tech'] < 6) 
	{
		$actividad704 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad704a = 3 ;
	}
	else {
		$actividad704 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad704a = 0 ;
	}


	
	#drone

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 6 || $USER['spy_tech'] < 6) 
	{
		$actividad705 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad705a = 3 ;
	}
	else {
		$actividad705 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad705a = 0 ;
	}


	
	#unas

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 9 || $PLANET['c_entrainement'] < 9 || $USER['military_tech'] < 9 || $USER['defence_tech'] < 9 || $USER['shield_tech'] < 9) 
	{
		$actividad706 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad706a = 3 ;
	}
	else {
		$actividad706 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad706a = 0 ;
	}


	
	#jaffa

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 12 || $PLANET['c_entrainement'] < 12 || $USER['military_tech'] < 12 || $USER['defence_tech'] < 12 || $USER['shield_tech'] < 12) 
	{
		$actividad707 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad707a = 3 ;
	}
	else {
		$actividad707 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad707a = 0 ;
	}


	
	#anubis

	if ($PLANET['c_commandement'] < 3 || $PLANET['p_etoile'] < 3 || $PLANET['c_militaire'] < 15 || $PLANET['c_entrainement'] < 15 || $USER['military_tech'] < 15 || $USER['defence_tech'] < 15 || $USER['shield_tech'] < 15) 
	{
		$actividad708 = "<font color=\"red\"><b>" . $LNG['inactivo'] ."</b></font>";
		$actividad708a = 3 ;
	}
	else {
		$actividad708 = "<font color=\"green\">" . $LNG['activo'] . "</font>";
		$actividad708a = 0 ;
	}
	
	


$choix_jaffa = 0;
$choix_anubis = 0;
$choix_unas = 0;
$choix_drone = 0;
$choix_malp = 0;
$choix_scientifique = 0;
$choix_archeologue = 0;
$choix_lourd = 0;
$choix_leger = 0;
	



$total_leger = $PLANET['leger'];
$total_legerabs = $total_leger;
if ($PLANET['leger'] > 1000) ($total_legerabs = ceil($PLANET['leger'] / 1000) ."K");
if ($PLANET['leger'] > 1000000) ($total_legerabs = ceil($PLANET['leger'] / 1000000) ."Mio");
if ($PLANET['leger'] > 1000000000) ($total_legerabs = ceil($PLANET['leger'] / 1000000000) ."Mrd"); 

$total_lourd = $PLANET['lourd'];
$total_lourdabs = $total_lourd;
if ($PLANET['lourd'] > 1000) ($total_lourdabs = ceil($PLANET['lourd'] / 1000) ."K");
if ($PLANET['lourd'] > 1000000) ($total_lourdabs = ceil($PLANET['lourd'] / 1000000) ."Mio");
if ($PLANET['lourd'] > 1000000000) ($total_lourdabs = ceil($PLANET['lourd'] / 1000000000) ."Mrd"); 

$total_scientifique = $PLANET['scientifique'];
$total_scientifiqueabs = $total_scientifique;
if ($PLANET['scientifique'] > 1000) ($total_scientifiqueabs = ceil($PLANET['scientifique'] / 1000) ."K");
if ($PLANET['scientifique'] > 1000000) ($total_scientifiqueabs = ceil($PLANET['scientifique'] / 1000000) ."Mio");
if ($PLANET['scientifique'] > 1000000000) ($total_scientifiqueabs = ceil($PLANET['scientifique'] / 1000000000) ."Mrd"); 

$total_archeologue = $PLANET['archeologue'];
$total_archeologueabs = $total_archeologue;
if ($PLANET['archeologue'] > 1000) ($total_archeologueabs = ceil($PLANET['archeologue'] / 1000) ."K");
if ($PLANET['archeologue'] > 1000000) ($total_archeologueabs = ceil($PLANET['archeologue'] / 1000000) ."Mio");
if ($PLANET['archeologue'] > 1000000000) ($total_archeologueabs = ceil($PLANET['archeologue'] / 1000000000) ."Mrd"); 

$total_malp = $PLANET['malp'];
$total_malpabs = $total_malp;
if ($PLANET['malp'] > 1000) ($total_malpabs = ceil($PLANET['malp'] / 1000) ."K");
if ($PLANET['malp'] > 1000000) ($total_malpabs = ceil($PLANET['malp'] / 1000000) ."Mio");
if ($PLANET['malp'] > 1000000000) ($total_malpabs = ceil($PLANET['malp'] / 1000000000) ."Mrd"); 

$total_drone = $PLANET['drone'];
$total_droneabs = $total_drone;
if ($PLANET['drone'] > 1000) ($total_droneabs = ceil($PLANET['drone'] / 1000) ."K");
if ($PLANET['drone'] > 1000000) ($total_droneabs = ceil($PLANET['drone'] / 1000000) ."Mio");
if ($PLANET['drone'] > 1000000000) ($total_droneabs = ceil($PLANET['drone'] / 1000000000) ."Mrd"); 

$total_jaffa = $PLANET['jaffa'];
$total_jaffaabs = $total_jaffa;
if ($PLANET['jaffa'] > 1000) ($total_jaffaabs = ceil($PLANET['jaffa'] / 1000) ."K");
if ($PLANET['jaffa'] > 1000000) ($total_jaffaabs = ceil($PLANET['jaffa'] / 1000000) ."Mio");
if ($PLANET['jaffa'] > 1000000000) ($total_jaffaabs = ceil($PLANET['jaffa'] / 1000000000) ."Mrd"); 

$total_unas = $PLANET['unas'];
$total_unasabs = $total_unas;
if ($PLANET['unas'] > 1000) ($total_unasabs = ceil($PLANET['unas'] / 1000) ."K");
if ($PLANET['unas'] > 1000000) ($total_unasabs = ceil($PLANET['unas'] / 1000000) ."Mio");
if ($PLANET['unas'] > 1000000000) ($total_unasabs = ceil($PLANET['unas'] / 1000000000) ."Mrd"); 

$total_anubis = $PLANET['anubis'];
$total_anubisabs = $total_anubis;
if ($PLANET['anubis'] > 1000) ($total_anubisabs = ceil($PLANET['anubis'] / 1000) ."K");
if ($PLANET['anubis'] > 1000000) ($total_anubisabs = ceil($PLANET['anubis'] / 1000000) ."Mio");
if ($PLANET['anubis'] > 1000000000) ($total_anubisabs = ceil($PLANET['anubis'] / 1000000000) ."Mrd"); 

$plani_soldat = $PLANET['plani_soldat'];
$time_plani = $PLANET['time_plani'];
$c_militaire = $PLANET['c_militaire'];

$PlanetRess = new ResourceUpdate();
$PlanetRess->CalcResource();
$PlanetRess->SavePlanetToDB();



	if ($USER['commander'] == 1 AND $USER['admiral'] == 1 AND $USER['technocratic'] == 1 AND $USER['engineer'] == 1 AND $USER['geologe'] == 1) 
{
$a = 3;
$totalofficiers = $LNG['totalofficiers1'];
}
	else 
{
$a = 1;	
$totalofficiers = $LNG['totalofficiers2'];
}
$time_leger=450 / $a;$titane_leger=1800;$silicium_leger=450;$deterium_leger=750;
$time_lourd=600 / $a;$titane_lourd=3600;$silicium_lourd=900;$deterium_lourd=1500;
$time_archeologue=400 / $a;$titane_archeologue=2100;$silicium_archeologue=210;$deterium_archeologue=450;
$time_scientifique=750 / $a;$titane_scientifique=2700;$silicium_scientifique=450;$deterium_scientifique=300;
$time_malp=750 / $a;$titane_malp=3300;$silicium_malp=900;$deterium_malp=180;
$time_drone=900 / $a;$titane_drone=3300;$silicium_drone=1800;$deterium_drone=300;
$time_unas=900 / $a;$titane_unas=2100;$silicium_unas=1200;$deterium_unas=3600;
$time_jaffa=900 / $a;$titane_jaffa=1800;$silicium_jaffa=1800;$deterium_jaffa=1500;
$time_anubis=7200 / $a;$titane_anubis=18000;$silicium_anubis=21000;$deterium_anubis=12000;

$officier = "";
if ($USER['commander'] <> 1 ) {$officier1 = $LNG['commandant'];}
if ($USER['admiral'] <> 1 ) {$officier2 = $LNG['amiral'];}
if ($USER['technocratic'] <> 1 ) {$officier3 =  $LNG['technocrate'];}
if ($USER['engineer'] <> 1 ) {$officier4 =  $LNG['ingenieur'];}
if ($USER['geologe'] <> 1 ) {$officier5 = $LNG['geologue'];}

if ($a == 1)
{
		$template->assign_vars(array(
	
	'manque' => $LNG['manque'],
));}



	$template->assign_vars(array(
	
	
	'officier1' => $officier1,
	'officier2' => $officier2,
	'officier3' => $officier3,
	'officier4' => $officier4,
	'officier5' => $officier5,
	'totalofficiers' => $totalofficiers,
	'titane_leger' => $titane_leger,
	'titane_lourd' => $titane_lourd,
	'titane_archeologue' => $titane_archeologue,
	'titane_scientifique' => $titane_scientifique,
	'titane_malp' => $titane_malp,
	'titane_drone' => $titane_drone,
	'titane_unas' => $titane_unas,
	'titane_jaffa' => $titane_jaffa,
	'titane_anubis' => $titane_anubis,
	
	'silicium_leger' => $silicium_leger,
	'silicium_lourd' => $silicium_lourd,
	'silicium_archeologue' => $silicium_archeologue,
	'silicium_scientifique' => $silicium_scientifique,
	'silicium_malp' => $silicium_malp,
	'silicium_drone' => $silicium_drone,
	'silicium_unas' => $silicium_unas,
	'silicium_jaffa' => $silicium_jaffa,
	'silicium_anubis' => $silicium_anubis,
	
	'deterium_leger' => $deterium_leger,
	'deterium_lourd' => $deterium_lourd,
	'deterium_archeologue' => $deterium_archeologue,
	'deterium_scientifique' => $deterium_scientifique,
	'deterium_malp' => $deterium_malp,
	'deterium_drone' => $deterium_drone,
	'deterium_unas' => $deterium_unas,
	'deterium_jaffa' => $deterium_jaffa,
	'deterium_anubis' => $deterium_anubis,
	
	'metala' =>  round($PLANET['metal']),
	'crystala' => round($PLANET['crystal']),
	'deuteriuma' => round($PLANET['deuterium']),
	
		'c_militaire'=>$c_militaire,
		'time_plani'=>$time_plani,
		'plani_soldat1'=>$plani_soldat1,
		'fin_time_plani'=>$fin_time_plani,
		'plani_soldat' => $plani_soldat,
		
'plani_leger'		=> $plani_leger,
'plani_lourd'		=> $plani_lourd,
'plani_archeologue'	=> $plani_archeologue,
'plani_scientifique'=> $plani_scientifique,
'plani_malp'		=> $plani_malp,
'plani_drone'		=> $plani_drone,
'plani_unas'		=> $plani_unas, 
'plani_jaffa'		=> $plani_jaffa,
'plani_anubis'		=> $plani_anubis,
		
	'total_legerabs' 					=> $total_legerabs,
	'total_lourdabs' 					=> $total_lourdabs,
	'total_scientifiqueabs'				 => $total_scientifiqueabs,
	'total_archeologueabs' 				=> $total_archeologueabs,
	'total_malpabs' 					=> $total_malpabs,
	'total_droneabs' 					=> $total_droneabs,
	'total_jaffaabs' 					=> $total_jaffaabs,
	'total_unasabs' 					=> $total_unasabs,
	'total_anubisabs' 					=> $total_anubisabs,
	
	'total_jaffa'				=> $total_jaffa,
	'total_anubis'				=> $total_anubis,
	'total_unas'				=> $total_unas,
	'total_drone'				=> $total_drone,
	'total_malp'				=> $total_malp,
	'total_scientifique'		=> $total_scientifique,
	'total_archeologue'			=> $total_archeologue,
	'total_lourd'				=> $total_lourd,
	'total_leger'				=> $total_leger,
	
	'choix_jaffa'				=> $choix_jaffa,
	'choix_anubis'				=> $choix_anubis,
	'choix_unas'				=> $choix_unas,
	'choix_drone'				=> $choix_drone,
	'choix_malp'				=> $choix_malp,
	'choix_scientifique'		=> $choix_scientifique,
	'choix_archeologue'			=> $choix_archeologue,
	'choix_lourd'				=> $choix_lourd,
	'choix_leger'				=> $choix_leger,

	'sal_recru'					 => $LNG['sal_recru'],	
	's_formation'					 => $LNG['s_formation'],
	'Uppformation'				 => $LNG['Uppformation'],
	'infanterie' 	 		  	=> $LNG['leger'],
	'soldat'					 => $LNG['lourd'],
	'archeo'					 => $LNG['archeo'], 
	'scienti'					=> $LNG['scienti'],
	'malp'						=> $LNG['malp'],
	'drone'						=> $LNG['drone'],
	'unas'						=> $LNG['unas'],
	'jaffa'						=> $LNG['jaffa'],
	'anubis'					=> $LNG['anubis'],
		
	'infanterie_desc'			=> $LNG['leger_desc'],
	'soldat_desc'				=> $LNG['lourd_desc'],
	'scienti_desc'				=> $LNG['scienti_desc'],
	'archeo_desc'				=> $LNG['archeo_desc'],
	'malp_desc'					=> $LNG['malp_desc'],
	'drone_desc'				=> $LNG['drone_desc'],
	'unas_desc'					=> $LNG['unas_desc'],
	'jaffa_desc'				=> $LNG['jaffa_desc'],
	'anubis_desc'				=> $LNG['anubis_desc'],
	
		'actividad700' => $actividad700,
		'actividad700a' => $actividad700a,
		'actividad701' => $actividad701,
		'actividad701a' => $actividad701a,
		'actividad702' => $actividad702,
		'actividad702a' => $actividad702a,
		'actividad703' => $actividad703,
		'actividad703a' => $actividad703a,
		'actividad704' => $actividad704,
		'actividad704a' => $actividad704a,
		'actividad705' => $actividad705,
		'actividad705a' => $actividad705a,
		'actividad706' => $actividad706,
		'actividad706a' => $actividad706a,
		'actividad707' => $actividad707,
		'actividad707a' => $actividad707a,
		'actividad708' => $actividad708,
		'actividad708a' => $actividad708a,



    ));
    $template->show("soldat/soldat_table.tpl"); 

	

	
	
   } 
   
}
?> 