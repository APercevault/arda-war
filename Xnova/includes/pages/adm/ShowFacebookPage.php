<?php

/**
 _  \_/ |\ | /пп\ \  / /\    |пп) |_п \  / /пп\ |  |   |┤п|п` | /пп\ |\ | 
 п  /п\ | \| \__/  \/ /--\   |пп\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowFacebookPage() {
	global $LNG, $USER, $db, $UNI, $CONF;
		$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	
	if ($_POST)
	{
		$CONF['fb_on']		= isset($_POST['fb_on']) && $_POST['fb_on'] == 'on' && !empty($_POST['fb_skey']) && !empty($_POST['fb_apikey']) ? 1 : 0;
		$CONF['fb_apikey']	= request_var('fb_apikey', '');
		$CONF['fb_skey'] 	= request_var('fb_skey', '');
	
		update_config(array(
			'fb_on'		=> $CONF['fb_on'],
			'fb_apikey'	=> $CONF['fb_apikey'],
			'fb_skey'	=> $CONF['fb_skey']
		), true);
	}
	
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
		'supportticks'				=> $db->countquery("SELECT COUNT(*) FROM ".SUPP." WHERE `universe` = '".$_SESSION['adminuni']."' AND (`status` = '1' OR `status` = '3');"),			
		'se_save_parameters'	=> $LNG['se_save_parameters'],
		'fb_info'				=> $LNG['fb_info'],
		'fb_secrectkey'			=> $LNG['fb_secrectkey'],
		'fb_api_key'			=> $LNG['fb_api_key'],
		'fb_active'				=> $LNG['fb_active'],
		'fb_settings'			=> $LNG['fb_settings'],
		'fb_on'					=> $CONF['fb_on'],
		'fb_apikey'				=> $CONF['fb_apikey'],
		'fb_skey'				=> $CONF['fb_skey'],
		'fb_curl'				=> function_exists('curl_init') ? 1 : 0,
		'fb_curl_info'			=> function_exists('curl_init') ? $LNG['fb_curl_yes'] : $LNG['fb_curl_no'],
	));
	$template->show('adm/FacebookPage.tpl');
}

?>