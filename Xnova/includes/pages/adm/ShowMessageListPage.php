<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowMessageListPage()
{
	global $LNG, $USER, $db, $UNI, $CONF;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	
	$Prev       = !empty($_POST['prev']) ? true : false;
	$Next       = !empty($_POST['next']) ? true : false;
	$DelSel     = !empty($_POST['delsel']) ? true : false;
	$DelDat     = !empty($_POST['deldat']) ? true : false;
	$CurrPage   = request_var('curr', 1);
	$Selected   = request_var('sele', 0);
	$SelType    = request_var('type', 1);
	$SelPage    = request_var('side', 1);

	$ViewPage = 1;
	if ( $Selected != $SelType )
	{
		$Selected = $SelType;
		$ViewPage = 1;
	}
	elseif ( $CurrPage != $SelPage )
	{
		$ViewPage = ( !empty($SelPage) ) ? $SelPage : 1;
	}

	if ($Selected < 100)
		$Mess      = $db->countquery("SELECT COUNT(*) FROM ".MESSAGES." WHERE `message_type` = '".$Selected."' AND `message_universe` = '".$_SESSION['adminuni']."';;");
	elseif ($Selected == 100)
		$Mess      = $db->countquery("SELECT COUNT(*) FROM ".MESSAGES." WHERE `message_universe` = '".$_SESSION['adminuni']."';;");
	
	
	$MaxPage   = ceil($Mess / 25);

	if($Prev   == true)
	{
		$CurrPage -= 1;
		$ViewPage = $CurrPage >= 1 ? $CurrPage : 1;
	}
	elseif ($Next   == true && $_POST['page'])
	{
		$CurrPage += 1;
		$ViewPage = $CurrPage <= $MaxPage ? $CurrPage : $MaxPage;
	}
	
	if ($_POST['delsel'] && is_array($_POST['sele']))
	{
		if ($DelSel == true)
		{
			foreach($_POST['sele'] as $MessId => $Value)
			{
				if ($Value = "on")
					$db->query("DELETE FROM ".MESSAGES." WHERE `message_id` = '". $MessId ."';");
			}
		}
	}
	
	if ($DelDat == true && $_POST['deldat'] && $_POST['sele'] >= 1 && is_numeric($_POST['selday']) && is_numeric($_POST['selmonth']) && is_numeric($_POST['selyear']))
	{
		$SelDay    = $_POST['selday'];
		$SelMonth  = $_POST['selmonth'];
		$SelYear   = $_POST['selyear'];
		$LimitDate = mktime (0,0,0, $SelMonth, $SelDay, $SelYear );
		if ($LimitDate !== false)
		{
			$db->multi_query("DELETE FROM ".MESSAGES." WHERE `message_time` <= '".$LimitDate."';DELETE FROM ".RW." WHERE `time` <= '".$LimitDate ."';");
		}
	}

	$data = $MessagesList = array();
	unset($LNG['mg_type'][999]);
	$Selector['type']	= $LNG['mg_type'];

	for($cPage = 1; $cPage <= $MaxPage; $cPage++) {
		$Selector['pages'][$cPage]	= $cPage.'/'.$MaxPage;
	}
	
	$StartRec            = (($ViewPage - 1) * 25);
	if ($Selected == 50)
		$Messages            = $db->query("SELECT * FROM ".MESSAGES." WHERE `message_type` = '". $Selected ."' AND `message_universe` = '".$_SESSION['adminuni']."' ORDER BY `message_time` DESC LIMIT ". $StartRec .",25;");
	elseif ($Selected == 100)
		$Messages            = $db->query("SELECT u.username, m.* FROM ".MESSAGES." as m, ".USERS." as u WHERE m.`message_owner` = u.`id` AND m.`message_universe` = '".$_SESSION['adminuni']."' ORDER BY `message_time` DESC LIMIT ". $StartRec .",25;");
	else
		$Messages            = $db->query("SELECT u.username, m.* FROM ".MESSAGES." as m, ".USERS." as u WHERE m.`message_type` = '". $Selected ."' AND m.`message_owner` = u.`id` AND `message_universe` = '".$_SESSION['adminuni']."' ORDER BY `message_time` DESC LIMIT ". $StartRec .",25;");
	
	while($row = $db->fetch_array($Messages))
	{
		$MessagesList[]	= array(
			'id'		=> $row['message_id'],
			'from'		=> $row['message_from'],
			'to'		=> ($Selected != 50) ? $row['username'].' '.$LNG['input_id'].':'.$row['message_owner'] : 'Universe',
			'subject'	=> $row['message_subject'],
			'text'		=> $row['message_text'],
			'time'		=> str_replace(' ', '&nbsp;', date(TDFORMAT, $row['message_time'])),
		);
	}	

	$template 	= new template();

	$template->loadscript('global.js');

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
		'Selector'					=> $Selector,
		'ViewPage'					=> $ViewPage,
		'Selected'					=> $Selected,
		'MaxPage'					=> $MaxPage,
		'MessagesList'				=> $MessagesList,
		'ml_page'					=> $LNG['ml_page'],
		'ml_type'					=> $LNG['ml_type'],
		'ml_dlte_since'				=> $LNG['ml_dlte_since'],
		'ml_dlte_selection'			=> $LNG['ml_dlte_selection'],
		'ml_dlte_since_button'		=> $LNG['ml_dlte_since_button'],
		'button_des_se'				=> $LNG['button_des_se'],
		'ml_select_all_messages'	=> $LNG['ml_select_all_messages'],
		'input_id'					=> $LNG['input_id'],
		'ml_date'					=> $LNG['ml_date'],
		'ml_from'					=> $LNG['ml_from'],
		'ml_to'						=> $LNG['ml_to'],
		'ml_subject'				=> $LNG['ml_subject'],
		'ml_content'				=> $LNG['ml_content'],
	));
				
	$template->show('adm/MessageList.tpl');
}
?>