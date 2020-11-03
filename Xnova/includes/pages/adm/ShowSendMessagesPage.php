<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowSendMessagesPage() {
	global $LNG, $USER, $db, $UNI, $CONF;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);

	if ($_GET['mode'] == 'send')
	{
		switch($USER['authlevel'])
		{
			case AUTH_MOD:
				$color = 'yellow';
			break;
			case AUTH_OPS:
				$color = 'skyblue';
			break;
			case AUTH_ADM:
				$color = 'red';
			break;
		}
		
		$Subject	= request_var('subject', '', true);
		$Message 	= makebr(request_var('text', '', true));

		if (!empty($Message) && !empty($Subject))
		{
			require_once(ROOT_PATH.'includes/functions/BBCode.php');
			$Time    	= TIMESTAMP;
			$From    	= '<span style="color:'.$color.';">'.$LNG['user_level'][$USER['authlevel']].' '.$USER['username'].'</span>';
			$Subject 	= '<span style="color:'.$color.';">'.$Subject.'</span>';
			$Message 	= '<span style="color:'.$color.';font-weight:bold;">'.bbcode($Message).'</span>';

			SendSimpleMessage(0, $USER['id'], TIMESTAMP, 50, $From, $Subject, $Message, 0, $_SESSION['adminuni']);
			$db->query("UPDATE ".USERS." SET `new_gmessage` = `new_gmessage` + '1', `new_message` = `new_message` + '1' WHERE `universe` = '".$_SESSION['adminuni']."';");
			exit($LNG['ma_message_sended']);
		} else {
			exit($LNG['ma_subject_needed']);
		}
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
		'mg_empty_text' 			=> $LNG['mg_empty_text'],
		'ma_subject' 				=> $LNG['ma_subject'],
		'ma_none' 					=> $LNG['ma_none'],
		'ma_message' 				=> $LNG['ma_message'],
		'ma_send_global_message' 	=> $LNG['ma_send_global_message'],
		'ma_characters' 			=> $LNG['ma_characters'],
		'button_submit' 			=> $LNG['button_submit'],
	));
	
	$template->show('adm/SendMessagesPage.tpl');
}
?>