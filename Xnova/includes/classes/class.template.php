<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

class template
{
	function __construct()
	{	
		$this->jsscript				= array();
		$this->script				= array();
		$this->vars					= array();
		$this->cache				= false;
		$this->cachedir				= is_writable(ROOT_PATH.'cache/') ? ROOT_PATH.'cache/' : sys_get_temp_dir();
		$this->file					= '';
		$this->cachefile			= '';
		$this->phpself				= '';
		$this->Popup				= false;
		$this->Dialog				= false;
	}
	
	public function render()
	{
		global $CONF;
		require(ROOT_PATH.'includes/libs/Smarty/Smarty.class.php');
		$TMP						= new Smarty();
		$TMP->force_compile 		= false;
		$TMP->compile_dir 			= $this->cachedir;
		$TMP->caching 				= false;
		$TMP->compile_check			= true; #Set false for production!
		$TMP->template_dir 			= $this->template_dir;
		$TMP->assign($this->vars);
		$PAGE						= $TMP->fetch($this->file);
		if($this->cache && $CONF['debug'] == 0)
		{
			file_put_contents($this->cachefile, $PAGE);
		}
		return $PAGE;
	}
	
	public function isDialog() {
		$this->Dialog		= true;
	}
	
	public function getplanets()
	{
		global $USER;
		$this->UserPlanets			= SortUserPlanets($USER);
	}
	
	public function loadscript($script)
	{
		$this->jsscript[]			= substr($script, 0, -3);
	}
	
	public function execscript($script)
	{
		$this->script[]				= $script;
	}
		
	public function assign_vars($var = array()) 
	{		
		$this->vars	= array_merge($this->vars, $var);
	}
	
	private function Menus()
	{
		global $PLANET, $LNG, $USER, $CONF, $db;
		
		//PlanetMenu
		if(empty($this->UserPlanets))
			$this->getplanets();
		
		$this->loadscript("planetmenu.js");
		$this->loadscript("topnav.js");
		$this->execscript("PlanetMenu();");
		$this->phpself	= "?page=".request_var('page', '')."&amp;mode=".request_var('mode', '');
		$PlanetSelect	= array();
		$Scripttime		= array();
		foreach($this->UserPlanets as $CurPlanetID => $PlanetQuery)
		{
			if(!empty($PlanetQuery['b_building_id']))
			{
				$QueueArray						= explode(";", $PlanetQuery['b_building_id']);
				$ActualCount					= count($QueueArray);
				for ($ID = 0; $ID < $ActualCount; $ID++)
				{
					$ListIDArray						= explode(",", $QueueArray[$ID]);
					
					if($ListIDArray[3] > TIMESTAMP)
						$Scripttime[$PlanetQuery['id']][]	= $ListIDArray[3];
				}
			}
			
			$Planetlist[$PlanetQuery['id']]	= array(
				'url'		=> $this->phpself."&amp;cp=".$PlanetQuery['id'],
				'name'		=> $PlanetQuery['name'],
//				'name'		=> $PlanetQuery['name'].(($PlanetQuery['planet_type'] == 3) ? " (".$LNG['fcm_moon'].")":""),
				'image'		=> $PlanetQuery['image'],
				'galaxy'	=> $PlanetQuery['galaxy'],
				'system'	=> $PlanetQuery['system'],
				'planet'	=> $PlanetQuery['planet'],
				'ptype'		=> $PlanetQuery['planet_type'],
			);
			
			$PlanetSelect[$this->phpself."&amp;cp=".$PlanetQuery['id']]	= $PlanetQuery['name'].(($PlanetQuery['planet_type'] == 3) ? " (" . $LNG['fcm_moon'] . ")":"")."&nbsp;[".$PlanetQuery['galaxy'].":".$PlanetQuery['system'].":".$PlanetQuery['planet']."]&nbsp;&nbsp;";
		}
		
			
		if($USER['urlaubs_modus'] == 1) {
			$CONF['metal_basic_income']     = 0;
			$CONF['crystal_basic_income']   = 0;
			$CONF['deuterium_basic_income'] = 0;
			$CONF['norio_basic_income'] = 0;
		}		
		
		if($PLANET['metal'] >= $PLANET["metal_max"]) {
			$cantidad_metal = colorRed(shortly_number($PLANET['metal']));
			
		} else {
			$cantidad_metal = shortly_number($PLANET['metal']);
		}
		if($PLANET['crystal'] >= $PLANET["crystal_max"]) {
			$cantidad_cristal = colorRed(shortly_number($PLANET['crystal']));
		} else {
			$cantidad_cristal = shortly_number($PLANET['crystal']);
		}
		if($PLANET['deuterium'] >= $PLANET["deuterium_max"]) {
			$cantidad_deuterio = colorRed(shortly_number($PLANET['deuterium']));
		} else {
			$cantidad_deuterio = shortly_number($PLANET['deuterium']);
		}
		if($PLANET['norio'] >= $PLANET["norio_max"]) {
			$cantidad_norio = colorRed(shortly_number($PLANET['norio']));
		} else {
			$cantidad_norio = shortly_number($PLANET['norio']);
		}
$cantidad_metal1 = pretty_number($PLANET['metal']);
$cantidad_cristal1 = pretty_number($PLANET['crystal']);
$cantidad_deuterio1 = pretty_number($PLANET['deuterium']);
$cantidad_norio1 = pretty_number($PLANET['norio']);


$nb_min = VSL_MINI; 
$nb_max = VSL_MAX; 
$vsltime = $PLANET['planet_time'] - $_SERVER['REQUEST_TIME'];
if ($vsltime <= 0) {$vsltime = 0;}	
if ($vsltime > $nb_max) 	{$db->query("UPDATE ".PLANETS." SET planet_time = '0' WHERE `id` = '".$PLANET['id']."';");}
$time_plani = $PLANET['time_plani'] ;

$plani_soldat = $PLANET['plani_soldat'] ;
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// calcul les cases occupées
$cases = $PLANET ['metal_mine'] + $PLANET ['crystal_mine'] + $PLANET ['deuterium_sintetizer'] + $PLANET ['solar_plant'] + $PLANET ['fusion_plant'] + $PLANET ['robot_factory'] + $PLANET ['nano_factory'] + $PLANET ['hangar'] + $PLANET ['metal_store'] + $PLANET ['crystal_store'] + $PLANET ['deuterium_store'] + $PLANET ['norio_store'] + $PLANET ['laboratory'] + $PLANET ['university'] + $PLANET ['norio_mine'] + $PLANET ['c_commandement'] + $PLANET ['c_militaire'] + $PLANET ['c_entrainement'] + $PLANET ['c_etude'] + $PLANET ['p_etoile'] + $PLANET ['terraformer'] + $PLANET ['silo'] + $PLANET ['ally_deposit'];

$db->query("UPDATE ".PLANETS." SET field_current = '".$cases."' WHERE `id` = '".$PLANET['id']."';");
//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//déplacement VSL si assez de matière noire alors OK(voir constants.php pour VSL_PRIX)

$darkmatter = $USER['darkmatter'];
if ($darkmatter - VSL_PRIX > 0) {$VSLbon = 1;}	


//++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
//loterie
    $Tiempo = time();
	$Faltaa =  $db->query ("SELECT loterie FROM ".CONFIG."");
     $Faltab = $db->fetch_array($Faltaa);
	 $Faltac = $Faltab['loterie']-$Tiempo ;
	 if ($Faltac <= 0){$Faltac = 0 ;}
 	 $Falta = date(TIMEFORMAT, mktime(0, 0, $Faltac));
    $parse['usuariostime'] = "Il reste ".$Falta." secondes avant la prochaine loterie.";
	

//bonus 24h
global $bonustemplate ;
$bonustemplate = 0 ;
if($PLANET['dailybonus'] < TIMESTAMP){
$bonustemplate = 1 ;}

//alliance vue candidature 
$ally = $db->uniquequery("SELECT * FROM ".ALLIANCE." WHERE id='".$USER['ally_id']."';");
$ally_ranks = unserialize($ally['ally_ranks']);
$USER['rights']['seeapply']			= ($ally_ranks[$USER['ally_rank_id']-1]['bewerbungen'] == 1 || $ally['ally_owner'] == $USER['id']) ? true : false;

$Reuqests					= $db->uniquequery("SELECT COUNT(*) as state FROM ".USERS." WHERE ally_request='".$ally['id']."';");


// Nombre planète
$MaxPlanets = 1 + ceil($USER['expedition_tech']/2);
	if($MaxPlanets > MAX_PLANETS ){$MaxPlanets = MAX_PLANETS;}
	if($MaxPlanets > MAX_PLANETS ){$MaxPlanets = MAX_PLANETS;}
$nombrepla = $db->query ("SELECT count(id_owner) as total_plapla FROM ".PLANETS." WHERE `id_owner` = '".$PLANET['id_owner']."' AND `planet_type` = '1' ",'planets');
$nombrepla1 = $db->fetch_array($nombrepla);
$nombrepla2 = "<font color=\"yellow\"><b>".$LNG['planete']."</font>".$nombrepla1['total_plapla']."/".$MaxPlanets." ( max : ".MAX_PLANETS." )";	

global $array;

		$this->assign_vars(array(
		'nombrepla2'			 => $nombrepla2,
		//déplacement VSL 
		'VSLbon'			 => $VSLbon,
		'prixVSL'			 => VSL_PRIX,		
		//loterie	
		'Faltac' 			=> $Faltac,	
		'usuariostime'		 => $parse['usuariostime'],		
		//alliance vue candidature 			
		'rights'					=> $USER['rights'],
		'req_count' 				=> $Reuqests['state'],
		//bonus 24h
		'bonustemplate'					=>$bonustemplate,
		'lm_bonus24'					=>$LNG['lm_bonus24'],

			'lm_loterie'		=> $LNG['lm_loterie'],	
		'rs_heure'			=>$LNG['rs_heure'],
		'plani_soldat'					=> $plani_soldat,	
		'time_plani'					=> $time_plani,
		'vsltime'					=> $vsltime,
		'planet_type' 				=> $PLANET['planet_type'],
			'PlanetMenu' 		=> $Planetlist,
			'metales1'				=> $cantidad_metal,
			'metales'				=> $cantidad_metal1,
			'cristales1'			=> $cantidad_cristal,
			'cristales'			=> $cantidad_cristal1,
			'deuterios1'			=> $cantidad_deuterio,
			'deuterios'			=> $cantidad_deuterio1,
			'norios1'			    => $cantidad_norio,
			'norios'			    => $cantidad_norio1,
			'almacenes' => $LNG['rs_storage_capacity'],
			'show_planetmenu' 	=> $LNG['show_planetmenu'],
			'current_pid'		=> $PLANET['id'],
			'Scripttime'		=> json_encode($Scripttime),	
			'lm_overview'		=> $LNG['lm_overview'],
			'lm_buildings'		=> $LNG['lm_buildings'],
			'lm_bonus' 			=> $LNG['lm_bonus'],
			'lm_resources'		=> $LNG['lm_resources'],
			'lm_trader'			=> $LNG['lm_trader'],
			'lm_soldats'			=> $LNG['lm_soldats'],
			'lm_p_etoile'			=> $LNG['lm_p_etoile'],
			'lm_gulvol'			=> $LNG['lm_gulvol'],
			'lm_pilori'			=> $LNG['lm_pilori'],
			'lm_fleettrader'	=> $LNG['lm_fleettrader'],
			'lm_research'		=> $LNG['lm_research'],
			'lm_shipshard'		=> $LNG['lm_shipshard'],
			'lm_fleet'			=> $LNG['lm_fleet'],
			'lm_technology'		=> $LNG['lm_technology'],
			'lm_galaxy'			=> $LNG['lm_galaxy'],
			'lm_defenses'		=> $LNG['lm_defenses'],
			'lm_alliance'		=> $LNG['lm_alliance'],
			'lm_forums'			=> $LNG['lm_forums'],
			'lm_officiers'		=> $LNG['lm_officiers'],
			'lm_statistics' 	=> $LNG['lm_statistics'],
			'lm_records'		=> $LNG['lm_records'],
			'lm_topkb'			=> $LNG['lm_topkb'],
			'lm_search'			=> $LNG['lm_search'],
			'lm_battlesim'		=> $LNG['lm_battlesim'],
			'lm_messages'		=> $LNG['lm_messages'],
			'lm_notes'			=> $LNG['lm_notes'],
			'lm_buddylist'		=> $LNG['lm_buddylist'],
			'lm_chat'			=> $LNG['lm_chat'],
			'lm_support'		=> $LNG['lm_support'],
			'lm_faq'			=> $LNG['lm_faq'],
			'lm_options'		=> $LNG['lm_options'],
			'lm_banned'			=> $LNG['lm_banned'],
			'lm_rules'			=> $LNG['lm_rules'],
			'lm_logout'			=> $LNG['lm_logout'],
			'lm_credits'		=> $LNG['lm_credits'],			
			'new_message' 		=> $USER['new_message'],
			'forum_url'			=> $CONF['forum_url'],
			'lm_administration'	=> $LNG['lm_administration'],
			'topnav'			=> true,
			'metal'				=> $PLANET['metal'],
			'crystal'			=> $PLANET['crystal'],
			'deuterium'			=> $PLANET['deuterium'],
			'norio'			    => $PLANET['norio'],
			'energy'			=> (($PLANET["energy_max"] + $PLANET["energy_used"]) < 0) ? pretty_number($PLANET["energy_max"] + $PLANET["energy_used"]) : pretty_number($PLANET["energy_max"] + $PLANET["energy_used"]),
			'energy_maxx' => pretty_number($PLANET["energy_max"]),
			'energia' => (($PLANET["energy_max"] + $PLANET["energy_used"]) < 0) ? colorRed(shortly_number($PLANET["energy_max"] + $PLANET["energy_used"])) : shortly_number($PLANET["energy_max"] + $PLANET["energy_used"]),
			'darkmatter'		=> pretty_number($USER["darkmatter"]),
			'metal_max'			=> pretty_number($PLANET["metal_max"]),
			'crystal_max'		=> pretty_number($PLANET["crystal_max"]),
			'deuterium_max' 	=> pretty_number($PLANET["deuterium_max"]),
			'norio_max' 	    => pretty_number($PLANET["norio_max"]),
			'alt_metal_max'		=> pretty_number($PLANET["metal_max"]),
			'alt_crystal_max'	=> pretty_number($PLANET["crystal_max"]),
			'alt_deuterium_max' => pretty_number($PLANET["deuterium_max"]),
			'alt_norio_max'     => pretty_number($PLANET["norio_max"]),
			'js_metal_max'		=> floattostring($PLANET["metal_max"]),
			'js_crystal_max'	=> floattostring($PLANET["crystal_max"]),
			'js_deuterium_max' 	=> floattostring($PLANET["deuterium_max"]),
			'js_norio_max'   	=> floattostring($PLANET["norio_max"]),
			'js_metal_hr'		=> $PLANET['planet_type'] == 1 ? floattostring($PLANET['metal_perhour'] + $CONF['metal_basic_income'] * $CONF['resource_multiplier']) : 0,
			'js_crystal_hr'		=> $PLANET['planet_type'] == 1 ? floattostring($PLANET['crystal_perhour'] + $CONF['crystal_basic_income'] * $CONF['resource_multiplier']) : 0,
			'js_deuterium_hr'	=> $PLANET['planet_type'] == 1 ? floattostring($PLANET['deuterium_perhour'] + $CONF['deuterium_basic_income'] * $CONF['resource_multiplier']) : 0,
			'js_norio_hr'		=> $PLANET['planet_type'] == 1 ? floattostring($PLANET['norio_perhour'] + $CONF['norio_basic_income'] * $CONF['resource_multiplier']) : 0,
			'current_planet'	=> $this->phpself."&amp;cp=".$PLANET['id'],
			'tn_vacation_mode'	=> $LNG['tn_vacation_mode'],
			'closed'			=> !$CONF['game_disable'] ? $LNG['ov_closed'] : false,
			'vacation'			=> $USER['urlaubs_modus'] ? date(TDFORMAT,$USER['urlaubs_until']) : false,
			'delete'			=> $USER['db_deaktjava'] ? sprintf($LNG['tn_delete_mode'], date(TDFORMAT, strtotime("+7 day", $USER['db_deaktjava']))) : false,
			'image'				=> $PLANET['image'],
			'settings_tnstor'	=> $USER['settings_tnstor'],
			'PlanetSelect'		=> $PlanetSelect,
			'Metal'				=> $LNG['Metal'],
			'Crystal'			=> $LNG['Crystal'],
			'Deuterium'			=> $LNG['Deuterium'],
			'Norio'			    => $LNG['Norio'],
			'Darkmatter'		=> $LNG['Darkmatter'],
			'Energy'			=> $LNG['Energy'],
		));
	}
	
    private function main()
    {
		global $USER, $CONF, $LANG, $LNG, $THEME;
		
		if ( strpos( $_SERVER['HTTP_USER_AGENT'], 'Trident' ) !== FALSE ) {$css_style = "formato_IE"; }
		elseif ( strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE' ) !== FALSE ) {$css_style = "formato_IE"; }
		else { $css_style = "formato"; }

	  
	  if($USER['raza'] == 0) {
                        $raza_tipo = $LNG['Raza_0'];
						$skin_raza = "gultra";
                } elseif ($USER['raza'] == 1) {
                        $raza_tipo = $LNG['Raza_1'];
						$skin_raza = "voltra";
                }
				
;				
		if($USER['commander'] >= 1) {
	$total = 	$USER['commander_time'] - $_SERVER['REQUEST_TIME']	;
    $jours=floor($total/86400);if ($jours > 0) {$jours .= " jour(s)" .  '<br>';} else {$jours = "";}
    $reste=$total%86400;
    $heures=floor($reste/3600); if ($heures > 0) {$heures .= " heure(s)" .  '<br>';} else {$heures = "";}
    $reste=$reste%3600;
    $minutes=floor($reste/60); if ($minutes > 0) {$minutes .= " minute(s)" .  '<br>';} else {$minutes = "";}
	$comandante1 =  $LNG["comandante"] . '<br>' . $jours . $heures . $minutes;
	
			$imperio = "<li>
		<span class=\"menu_icon\">
		<img width=\"38\" height=\"29\" src=\"./styles/theme/". $skin_raza ."/imagenes/navegacion/menu_icon.png\">
        </span>
		<a class=\"menu_boton\" href=\"javascript:OpenPopup('?page=imperium','" .$LNG['lm_empire'] ."', 1024, 768);\"><span>" .$LNG['lm_empire'] ."</span></a>
		</li>";
			$comandante_icon = "600.png";
		} else {
			$imperio = "";
			$comandante_icon = "600_off.png";
		$comandante1 =  $LNG["comandante"];	
		}
		if($USER['engineer'] >= 1) {
	$total = 	$USER['engineer_time'] - $_SERVER['REQUEST_TIME']	;
    $jours=floor($total/86400);if ($jours > 0) {$jours .= " jour(s)" .  '<br>';} else {$jours = "";}
    $reste=$total%86400;
    $heures=floor($reste/3600); if ($heures > 0) {$heures .= " heure(s)" .  '<br>';} else {$heures = "";}
    $reste=$reste%3600;
    $minutes=floor($reste/60); if ($minutes > 0) {$minutes .= " minute(s)" .  '<br>';} else {$minutes = "";}
	$ingeniero1 =  $LNG["ingeniero"] . '<br>' . $jours . $heures . $minutes;			
		$ingeniero_icon = "603.png";
		} else {
		$ingeniero_icon = "603_off.png";
		$ingeniero1 =  $LNG["ingeniero"];			
		}
		if($USER['admiral'] >= 1) {
	$total = 	$USER['admiral_time'] - $_SERVER['REQUEST_TIME']	;
    $jours=floor($total/86400);if ($jours > 0) {$jours .= " jour(s)" .  '<br>';} else {$jours = "";}
    $reste=$total%86400;
    $heures=floor($reste/3600); if ($heures > 0) {$heures .= " heure(s)" .  '<br>';} else {$heures = "";}
    $reste=$reste%3600;
    $minutes=floor($reste/60); if ($minutes > 0) {$minutes .= " minute(s)" .  '<br>';} else {$minutes = "";}
	$almirante1 =  $LNG["almirante"] . '<br>' . $jours . $heures . $minutes;			
		$almirante_icon = "602.png";
		} else {
		$almirante_icon = "602_off.png";
		$almirante1 =  $LNG["almirante"];			
		}
		if($USER['geologe'] >= 1) {
	$total = 	$USER['geologe_time'] - $_SERVER['REQUEST_TIME']	;
    $jours=floor($total/86400);if ($jours > 0) {$jours .= " jour(s)" .  '<br>';} else {$jours = "";}
    $reste=$total%86400;
    $heures=floor($reste/3600); if ($heures > 0) {$heures .= " heure(s)" .  '<br>';} else {$heures = "";}
    $reste=$reste%3600;
    $minutes=floor($reste/60); if ($minutes > 0) {$minutes .= " minute(s)" .  '<br>';} else {$minutes = "";}
	$geologo1 =  $LNG["geologo"] . '<br>' . $jours . $heures . $minutes;			
		$geologo_icon = "601.png";	
		} else {
		$geologo_icon = "601_off.png";
		$geologo1 =  $LNG["geologo"];			
		}
		if($USER['technocratic'] >= 1) {
	$total = 	$USER['technocratic_time'] - $_SERVER['REQUEST_TIME']	;
    $jours=floor($total/86400);if ($jours > 0) {$jours .= " jour(s)" .  '<br>';} else {$jours = "";}
    $reste=$total%86400;
    $heures=floor($reste/3600); if ($heures > 0) {$heures .= " heure(s)" .  '<br>';} else {$heures = "";}
    $reste=$reste%3600;
    $minutes=floor($reste/60); if ($minutes > 0) {$minutes .= " minute(s)" .  '<br>';} else {$minutes = "";}
	$tecnocrata1 =  $LNG["tecnocrata"] . '<br>' . $jours . $heures . $minutes;			
		$tecnocrata_icon = "604.png";
		} else {
		$tecnocrata_icon = "604_off.png";
		$tecnocrata1 =  $LNG["tecnocrata"];			
		}
      
        $this->assign_vars(array(
			'Comandante' => $comandante_icon,
			'Tecnocrata' => $tecnocrata_icon,
			'Ingeniero' => $ingeniero_icon,
			'Almirante' => $almirante_icon,
			'Geologo' => $geologo_icon,
			'comandante1' => $comandante1,
			'tecnocrata1' => $tecnocrata1,
			'ingeniero1' => $ingeniero1,
			'almirante1' => $almirante1,
			'geologo1' => $geologo1,
			'comandante' => $LNG["comandante"],
			'tecnocrata' => $LNG['tecnocrata'],
			'ingeniero' => $LNG['ingeniero'],
			'almirante' => $LNG['almirante'],
			'geologo' => $LNG['geologo'],
            'title'            => $CONF['game_name'],
            'css_style'       => $css_style,
         'uni_name'         => $CONF['uni_name'],
            'dpath'				=> $THEME->getTheme(),
            'vmode'				=> $USER['urlaubs_modus'],
            'is_pmenu'			=> $USER['settings_planetmenu'],
			'authlevel'			=> $USER['authlevel'],
            'lang'    			=> $LANG->getUser(),
            'ready'    			=> $LNG['ready'],
			'date'				=> explode("|", date('Y\|n\|j\|G\|i\|s\|Z', TIMESTAMP)),
			'cron'				=> GetCrons(),
			'ga_active'			=> $CONF['ga_active'],
			'ga_key'			=> $CONF['ga_key'],
			'debug'				=> $CONF['debug'],
			'min_js'			=> $CONF['min_js'],
			'fcm_info'			=> $LNG['fcm_info'],
			'VERSION'			=> $CONF['VERSION'],
			'REV'				=> substr($CONF['VERSION'], -4),
			'Raza'                          => $LNG['Raza'],
            'Raza_tipo'        => $raza_tipo,
			'Raza_skin'      => $skin_raza,
			'imperio' => $imperio,

		));
	}
	
	private function adm_main()
	{
		global $LNG, $CONF;
		$this->assign_vars(array(
			'scripts'	=> $this->script,
			'title'		=> $CONF['game_name'].' - '.$LNG['adm_cp_title'],
			'fcm_info'	=> $LNG['fcm_info'],
			'gotoinsec'	=> false,
			'goto'		=> false,
		));
	}
	
	public function login_main()
	{
		global $USER, $CONF, $LNG, $LANG, $UNI;
		$this->assign_vars(array(
			'cappublic'			=> $CONF['cappublic'],
			'servername' 		=> $CONF['game_name'],
			'forum_url' 		=> $CONF['forum_url'],
			'fb_active'			=> $CONF['fb_on'],
			'fb_key' 			=> $CONF['fb_apikey'],
			'forum' 			=> $LNG['forum'],
			'register_closed'	=> $LNG['register_closed'],
			'fb_perm'			=> sprintf($LNG['fb_perm'], $CONF['game_name']),
			'menu_index'		=> $LNG['menu_index'],
			'menu_news'			=> $LNG['menu_news'],
			'menu_rules'		=> $LNG['menu_rules'],
			'menu_agb'			=> $LNG['menu_agb'],
			'menu_pranger'		=> $LNG['menu_pranger'],
			'menu_top100'		=> $LNG['menu_top100'],
			'menu_disclamer'	=> $LNG['menu_disclamer'],
			'music_off'			=> $LNG['music_off'],
			'music_on'			=> $LNG['music_on'],
			'game_captcha'		=> $CONF['capaktiv'],
			'reg_close'			=> $CONF['reg_closed'],
			'ga_active'			=> $CONF['ga_active'],
			'ga_key'			=> $CONF['ga_key'],
			'bgm_active'		=> $CONF['bgm_active'],
			'bgm_file'			=> $CONF['bgm_file'],
			'mail_active'		=> $CONF['mail_active'],
			'getajax'			=> request_var('getajax', 0),
			'lang'				=> $LANG->getUser(),
			'UNI'				=> $UNI,
			'langs'				=> Language::getAllowedLangs(),
		));
	}
		
	public function isPopup()
	{
		$this->Popup		= true;
	}
		
	public function show($file)
	{		
		global $USER, $PLANET, $CONF, $LNG, $db;
		
		if(!defined('INSTALL')) {
			if(defined('IN_ADMIN')) {
				$this->adm_main();			
			} elseif(defined('LOGIN')) {
				$this->login_main();	
			} elseif(!$this->Dialog) {
				if(!defined('AJAX')) {
					$_SESSION['USER']	= $USER;
					$_SESSION['PLANET']	= $PLANET;
				}
				$this->main();
				if($this->Popup === false)
					$this->Menus();
			}
		}
		$this->assign_vars(array(
			'scripts'			=> $this->jsscript,
			'execscript'		=> implode("\n", $this->script),
		));
		
		$this->display($file);
	}
	
	public function gotoside($dest, $time = 3)
	{
		$this->assign_vars(array(
			'gotoinsec'	=> $time,
			'goto'		=> $dest,
		));
	}
	
	public function display($file)
	{
		global $THEME;
		$this->file			= $file;
		$this->template_dir	= $THEME->getTemplatePath();
		if($this->cache && $GLOBALS['CONF']['debug'] == 0)
		{
			$this->cachefile	= $this->cachedir.md5($this->template_dir.$this->file .r_implode('', $this->vars)).'.tpl.php';
			if(file_exists($this->cachefile))
				echo file_get_contents($this->cachefile);
			else
				echo $this->render();
		} else {
			echo $this->render();
		}
	}
	
	public function message($mes, $dest = false, $time = 3, $Fatal = false)
	{
		global $LNG, $THEME;
		if($Fatal)
			$this->isPopup(true);
	
		$this->assign_vars(array(
			'mes'		=> $mes,
			'fcm_info'	=> $LNG['fcm_info'],
			'Fatal'		=> $Fatal,
            'dpath'		=> $THEME->getTheme(),
		));
		
		$this->gotoside($dest, $time);
		if (defined('IN_ADMIN')) {
			$this->show('adm/error_message_body.tpl');
			exit;
		}
		$this->show('error_message_body.tpl');
	}
}

?>