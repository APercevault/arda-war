<?php

/**
 _  \_/ |\ | /пп\ \  / /\    |пп) |_п \  / /пп\ |  |   |┤п|п` | /пп\ |\ | 
 п  /п\ | \| \__/  \/ /--\   |пп\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if ($USER['id'] != ROOT_USER || $_GET['sid'] != session_id()) exit;

function ShowResetPage()
{
	global $LNG, $USER, $db, $UNI, $CONF, $reslist, $resource;
	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);	
	$template	= new template();
	$template->assign_vars(array(	
			'ad_authlevel_title'	=> $LNG['ad_authlevel_title'],
		're_reset_universe'		=> $LNG['re_reset_universe'],
		'mu_universe'			=> $LNG['mu_universe'],
		'mu_moderation_page'	=> $LNG['mu_moderation_page'],
		'adm_cp_title'			=> $LNG['adm_cp_title'],
		'adm_cp_index'			=> $LNG['adm_cp_index'],
		'adm_cp_logout'			=> $LNG['adm_cp_logout'],
		'sid'					=> session_id(),
		'id'					=> $USER['id'],
		'authlevel'				=> $USER['authlevel'],
		'AvailableUnis'			=> $AvailableUnis,
		'UNI'					=> $_SESSION['adminuni'],
		
		'mu_game_info'				=> $LNG['mu_game_info'],
		'mu_settings'				=> $LNG['mu_settings'],
		'mu_ts_options'				=> $LNG['mu_ts_options'],
		'mu_fb_options'				=> $LNG['mu_fb_options'],
		'mu_module'					=> $LNG['mu_module'],
		'mu_user_logs'				=> $LNG['mu_user_logs'],
		'mu_optimize_db'			=> $LNG['mu_optimize_db'],
		'mu_stats_options'			=> $LNG['mu_stats_options'],
		'mu_chat'					=> $LNG['mu_chat'],
		'mu_update'					=> $LNG['mu_update'],
		'mu_general'				=> $LNG['mu_general'],
		'new_creator_title'			=> $LNG['new_creator_title'],
		'mu_add_delete_resources'	=> $LNG['mu_add_delete_resources'],
		'mu_ban_options'			=> $LNG['mu_ban_options'],
		'mu_users_settings'			=> $LNG['mu_users_settings'],
		'mu_tools'					=> $LNG['mu_tools'],
		'mu_manual_points_update'	=> $LNG['mu_manual_points_update'],
		'mu_global_message'			=> $LNG['mu_global_message'],
		'mu_md5_encripter'			=> $LNG['mu_md5_encripter'],
		'mu_mpu_confirmation'		=> $LNG['mu_mpu_confirmation'],
		'mu_observation'			=> $LNG['mu_observation'],
		'mu_connected'				=> $LNG['mu_connected'],
		'mu_support'				=> $LNG['mu_support'],
		'mu_vaild_users'			=> $LNG['mu_vaild_users'],
		'mu_active_planets'			=> $LNG['mu_active_planets'],
		'mu_flying_fleets'			=> $LNG['mu_flying_fleets'],
		'mu_news'					=> $LNG['mu_news'],
		'mu_user_list'				=> $LNG['mu_user_list'],
		'mu_planet_list'			=> $LNG['mu_planet_list'],
		'mu_moon_list'				=> $LNG['mu_moon_list'],
		'mu_mess_list'				=> $LNG['mu_mess_list'],
		'mu_info_account_page'		=> $LNG['mu_info_account_page'],
		'mu_multiip_page'			=> $LNG['mu_multiip'],
		'mu_search_page'			=> $LNG['mu_search_page'],
		'mu_mod_update'				=> $LNG['mu_mod_update'],
		'mu_clear_cache'			=> $LNG['mu_clear_cache'],
		'supportticks'				=> $db->countquery("SELECT COUNT(*) FROM ".SUPP." WHERE `universe` = '".$_SESSION['adminuni']."' AND (`status` = '1' OR `status` = '3');"),	));	
	if ($_POST)
	{		
		foreach($reslist['build'] as $ID)
		{
			$dbcol['build'][$ID]	= "`".$resource[$ID]."` = '0'";
		}
		
		foreach($reslist['tech'] as $ID)
		{
			$dbcol['tech'][$ID]		= "`".$resource[$ID]."` = '0'";
		}
		
		foreach($reslist['fleet'] as $ID)
		{
			$dbcol['fleet'][$ID]	= "`".$resource[$ID]."` = '0'";
		}
		
		foreach($reslist['defense'] as $ID)
		{
			$dbcol['defense'][$ID]	= "`".$resource[$ID]."` = '0'";
		}
		
		// Players and Planets
		
		if ($_POST['players'] == 'on'){
			$ID	= $db->countquery("SELECT `id_owner` FROM ".PLANETS." WHERE `universe` = '".$_SESSION['adminuni']."' AND `galaxy` = '1' AND `system` = '1' AND `planet` = '1';");
			$db->multi_query("DELETE FROM ".USERS." WHERE `universe` = '".$_SESSION['adminuni']."' AND `id` != '".$ID."';DELETE FROM ".PLANETS." WHERE `universe` = '".$_SESSION['adminuni']."' AND `galaxy` != '1' AND `system` != '1' AND `planet` != '1';");
		}
		
		if ($_POST['planets'] == 'on')
			$db->multi_query("DELETE FROM ".PLANETS." WHERE `universe` = '".$_SESSION['adminuni']."' AND `id` NOT IN (SELECT id_planet FROM ".USERS."  WHERE `universe` = '".$_SESSION['adminuni']."');UPDATE ".PLANETS." SET `id_luna` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");
			
		if ($_POST['moons']	== 'on'){
			$db->multi_query("DELETE FROM ".PLANETS." WHERE `planet_type` = '3' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".PLANETS." SET `id_luna` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");}

		// HANGARES Y DEFENSAS
		if ($_POST['defenses']	==	'on')
			$db->query("UPDATE ".PLANETS." SET ".implode(", ",$dbcol['defense'])." AND `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['ships']	==	'on')
			$db->query("UPDATE ".PLANETS." SET ".implode(", ",$dbcol['fleet'])." AND `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['h_d']	==	'on')
			$db->query("UPDATE ".PLANETS." SET `b_hangar` = '0', `b_hangar_id` = '' AND `universe` = '".$_SESSION['adminuni']."';");
	

		// EDIFICIOS
		if ($_POST['edif_p']	==	'on')
			$db->query("UPDATE ".PLANETS." SET ".implode(", ",$dbcol['build']).", `field_current` = '0' WHERE `planet_type` = '1' AND `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['edif_l']	==	'on')
			$db->query("UPDATE ".PLANETS." SET ".implode(", ",$dbcol['build']).", `field_current` = '0' WHERE `planet_type` = '3' AND `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['edif']	==	'on')
			$db->query("UPDATE ".PLANETS." SET `b_building` = '0', `b_building_id` = '' WHERE `universe` = '".$_SESSION['adminuni']."';");
	

		// INVESTIGACIONES
		if ($_POST['inves']	==	'on')
			$db->query("UPDATE ".USERS." SET ".implode(", ",$dbcol['tech'])." WHERE `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['inves_c']	==	'on')
			$db->query("UPDATE ".USERS." SET `b_tech_planet` = '0', `b_tech` = '0', `b_tech_id` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");
	
	
		// RECURSOS
		if ($_POST['dark']	==	'on')
			$db->query("UPDATE ".USERS." SET `darkmatter` = '".BUILD_DARKMATTER."' WHERE `universe` = '".$_SESSION['adminuni']."';");
	
		if ($_POST['resources']   ==   'on')
			$db->query("UPDATE ".PLANETS." SET `metal` = '".BUILD_METAL."', `crystal` = '".BUILD_CRISTAL."', `deuterium` = '".BUILD_DEUTERIUM."', `norio` = '".BUILD_NORIO."' WHERE `universe` = '".$_SESSION['adminuni']."';");
	
		// GENERAL
		if ($_POST['notes']	==	'on')
			$db->query("DELETE FROM ".NOTES." WHERE `universe` = '".$_SESSION['adminuni']."';");

		if ($_POST['rw']	==	'on'){
			$TKBRW			= $db->query("SELECT `rid` FROM ".TOPKB." WHERE `universe` = '".$_SESSION['adminuni']."';");
		
			if(isset($TKBRW))
			{
				while($RID = $db->fetch_array($TKBRW)) {
					@unlink(ROOT_PATH.'raports/topkb_'.$RID['rid'].'.php');
				}
				$db->query("DELETE FROM ".TOPKB." WHERE `universe` = '".$_SESSION['adminuni']."';");		
			}
		}

		if ($_POST['friends']	==	'on')
			$db->query("DELETE FROM ".BUDDY." WHERE `universe` = '".$_SESSION['adminuni']."';");

		if ($_POST['alliances']	==	'on'){
			$db->multi_query("DELETE FROM ".ALLIANCE." WHERE `ally_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_id` = '0', `ally_name` = '', `ally_request` = '0', `ally_request_text` = 'NULL', `ally_register_time` = '0', `ally_rank_id` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");}

		if ($_POST['fleets']	==	'on')
			$db->query("DELETE FROM ".FLEETS." WHERE `fleet_universe` = '".$_SESSION['adminuni']."';");

		if ($_POST['banneds']	==	'on'){
			$db->multi_query("DELETE FROM ".BANNED." WHERE `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `bana` = '0', `banaday` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");}

		if ($_POST['messages']	==	'on'){
			$db->multi_query("DELETE FROM ".MESSAGES." WHERE `message_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `new_message` = '0' WHERE `universe` = '".$_SESSION['adminuni']."';");}

		if ($_POST['statpoints']	==	'on'){
			$db->query("DELETE FROM ".STATPOINTS." WHERE `universe` = '".$_SESSION['adminuni']."';");}
		$retour = "admin.php?page=reset&sid=".session_id();
		$template->assign_vars(array('message' =>$LNG['re_reset_excess'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

	}

	$template->assign_vars(array(	

		'button_submit'						=> $LNG['button_submit'],
		're_reset_universe_confirmation'	=> $LNG['re_reset_universe_confirmation'],

		're_reset_all'						=> $LNG['re_reset_all'],
		're_defenses_and_ships'				=> $LNG['re_defenses_and_ships'],
		're_reset_buldings'					=> $LNG['re_reset_buldings'],
		're_buildings_lu'					=> $LNG['re_buildings_lu'],
		're_buildings_pl'					=> $LNG['re_buildings_pl'],
		're_buldings'						=> $LNG['re_buldings'],
		're_reset_hangar'					=> $LNG['re_reset_hangar'],
		're_ships'							=> $LNG['re_ships'],
		're_defenses'						=> $LNG['re_defenses'],
		're_resources_met_cry'				=> $LNG['re_resources_met_cry'],
		're_resources_dark'					=> $LNG['re_resources_dark'],
		're_resources'						=> $LNG['re_resources'],
		're_reset_invest'					=> $LNG['re_reset_invest'],
		're_investigations'					=> $LNG['re_investigations'],
		're_reset_statpoints'				=> $LNG['re_reset_statpoints'],
		're_reset_messages'					=> $LNG['re_reset_messages'],
		're_reset_banned'					=> $LNG['re_reset_banned'],
		're_reset_errors'					=> $LNG['re_reset_errors'],
		're_reset_fleets'					=> $LNG['re_reset_fleets'],
		're_reset_allys'					=> $LNG['re_reset_allys'],
		're_reset_buddies'					=> $LNG['re_reset_buddies'],
		're_reset_rw'						=> $LNG['re_reset_rw'],
		're_reset_notes'					=> $LNG['re_reset_notes'],
		're_reset_moons'					=> $LNG['re_reset_moons'],
		're_reset_planets'					=> $LNG['re_reset_planets'],
		're_reset_player'					=> $LNG['re_reset_player'],
		're_player_and_planets'				=> $LNG['re_player_and_planets'],
		're_general'						=> $LNG['re_general'],
	));
	
	$template->show('adm/ResetPage.tpl');
}

?>