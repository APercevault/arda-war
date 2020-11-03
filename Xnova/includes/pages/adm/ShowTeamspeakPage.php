<?php

/**
 _  \_/ |\ | /пп\ \  / /\    |пп) |_п \  / /пп\ |  |   |┤п|п` | /пп\ |\ | 
 п  /п\ | \| \__/  \/ /--\   |пп\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowTeamspeakPage() {
	global $LNG, $USER, $db, $UNI, $CONF;
	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	if ($_POST)
	{
		$CONF['ts_modon'] 			= isset($_POST['ts_on']) && $_POST['ts_on'] == 'on' ? 1 : 0;		
		$CONF['ts_server']			= request_var('ts_ip', '');
		$CONF['ts_tcpport']			= request_var('ts_tcp', 0);
		$CONF['ts_udpport']			= request_var('ts_udp', 0);
		$CONF['ts_timeout']			= request_var('ts_to', 0);
		$CONF['ts_version']			= request_var('ts_v', 0);
		$CONF['ts_login']			= request_var('ts_login', '');
		$CONF['ts_password']		= request_var('ts_password', '', true);
		$CONF['ts_cron_interval']	= request_var('ts_cron', 0);
		
		update_config(array(
			'ts_timeout'		=> $CONF['ts_timeout'],
			'ts_modon'			=> $CONF['ts_modon'],
			'ts_server'			=> $CONF['ts_server'],
			'ts_tcpport'		=> $CONF['ts_tcpport'],
			'ts_udpport'		=> $CONF['ts_udpport'],
			'ts_version'		=> $CONF['ts_version'],
			'ts_login'			=> $CONF['ts_login'],
			'ts_password'		=> $CONF['ts_password'],
			'ts_cron_interval'	=> $CONF['ts_cron_interval']
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
		'ts_tcpport'			=> $LNG['ts_tcpport'],
		'ts_serverip'			=> $LNG['ts_serverip'],
		'ts_version'			=> $LNG['ts_version'],
		'ts_active'				=> $LNG['ts_active'],
		'ts_settings'			=> $LNG['ts_settings'],
		'ts_udpport'			=> $LNG['ts_udpport'],
		'ts_timeout'			=> $LNG['ts_timeout'],
		'ts_server_query'		=> $LNG['ts_server_query'],
		'ts_sq_login'			=> $LNG['ts_login'],
		'ts_sq_pass'			=> $LNG['ts_pass'],
		'ts_lng_cron'			=> $LNG['ts_cron'],
		'ts_to'					=> $CONF['ts_timeout'],
		'ts_on'					=> $CONF['ts_modon'],
		'ts_ip'					=> $CONF['ts_server'],
		'ts_tcp'				=> $CONF['ts_tcpport'],
		'ts_udp'				=> $CONF['ts_udpport'],
		'ts_v'					=> $CONF['ts_version'],
		'ts_login'				=> $CONF['ts_login'],
		'ts_password'			=> $CONF['ts_password'],
		'ts_cron'				=> $CONF['ts_cron_interval']
	));
	$template->show('adm/TeamspeakPage.tpl');

}
?>