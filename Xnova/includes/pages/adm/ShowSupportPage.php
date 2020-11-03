<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;
		
function ShowSupportPage()
{
	global $LNG, $USER, $db, $UNI, $CONF;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	$template			= new template();
	
	$ID	= request_var('id', 0);
	
	switch($_GET['action'])
	{
		case 'send':
			$text	= nl2br(request_var('text', '', true));
			if(empty($text)){
		$retour = "admin.php?page=support&action=detail&id=".$ID;
		$template->assign_vars(array('message' =>$LNG['sendit_error_msg'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;
				
			}

			$ticket = $db->uniquequery("SELECT `player_id`, `text` FROM ".SUPP." WHERE `id` = '".$ID."';");
			$newtext = $ticket['text'].'<br><br><hr>'.sprintf($LNG['sp_admin_answer'], $USER['username'], date(TDFORMAT, TIMESTAMP), $text);

			$SQL  = "UPDATE ".SUPP." SET ";
			$SQL .= "`text` = '".$db->sql_escape($newtext)."',";
			$SQL .= "`status` = '2'";
			$SQL .= "WHERE ";
			$SQL .= "`id` = '".$ID."' ";
			$db->query($SQL);
			SendSimpleMessage($ticket['player_id'], '', TIMESTAMP, 4, $USER['username'], sprintf($LNG['sp_answer_message_title'], $ID), sprintf($LNG['sp_answer_message'], $ID)); 
		break;
		case 'open':
			$ticket = $db->uniquequery("SELECT text FROM ".SUPP." WHERE `id` = '".$ID."';");
			$newtext = $ticket['text'].'<br><br><hr>'.sprintf($LNG['sp_admin_open'], $USER['username'], date(TDFORMAT, TIMESTAMP));
			$SQL  = "UPDATE ".SUPP." SET ";
			$SQL .= "`text` = '".$db->sql_escape($newtext)."',";
			$SQL .= "`status` = '2'";
			$SQL .= "WHERE ";
			$SQL .= "`id` = '".$ID."' ";
			$db->query($SQL);
		break;
		case 'close':
			$ticket = $db->uniquequery("SELECT text FROM ".SUPP." WHERE `id` = '".$ID."';");
			$newtext = $ticket['text'].'<br><br><hr>'.sprintf($LNG['sp_admin_closed'], $USER['username'], date(TDFORMAT, TIMESTAMP));
			$SQL  = "UPDATE ".SUPP." SET ";
			$SQL .= "`text` = '".$db->sql_escape($newtext)."',";
			$SQL .= "`status` = '0'";
			$SQL .= "WHERE ";
			$SQL .= "`id` = '".$ID."' ";
			$db->query($SQL);
		break;
	}
	
	$tickets	= array('open' => array(), 'closed' => array());
	$query = $db->query("SELECT s.*, u.username FROM ".SUPP." as s, ".USERS." as u WHERE u.id = s.player_id ORDER BY s.time;");
	while($ticket = $db->fetch_array($query))
	{
		switch($ticket['status']){
			case 0:
				$status = '<font color="red">'.$LNG['supp_close'].'</font>';
			break;
			case 1:
				$status = '<font color="green">'.$LNG['supp_open'].'</font>';
			break;
			case 2:
				$status = '<font color="orange">'.$LNG['supp_admin_answer'].'</font>';
			break;
			case 3:
				$status = '<font color="green">'.$LNG['supp_player_answer'].'</font>';
			break;
		}
		
		if($_GET['action'] == 'detail' && $ID == $ticket['ID'])
			$TINFO	= $ticket;
			
		if($ticket['status'] == 0){					
			$tickets['closed'][]	= array(
				'id'		=> $ticket['ID'],
				'username'	=> $ticket['username'],
				'subject'	=> $ticket['subject'],
				'status'	=> $status,
				'date'		=> date(TDFORMAT,$ticket['time'])
			);	
		} else {
			$tickets['open'][]	= array(
				'id'		=> $ticket['ID'],
				'username'	=> $ticket['username'],
				'subject'	=> $ticket['subject'],
				'status'	=> $status,
				'date'		=> date(TDFORMAT,$ticket['time'])
			);
		}
		
	}
	
	if($_GET['action'] == 'detail')
	{
		if($TINFO['status'] != 0)
			unset($tickets['closed']);
		
		switch($TINFO['status']){
			case 0:
				$status = '<font color="red">'.$LNG['supp_close'].'</font>';
			break;
			case 1:
				$status = '<font color="green">'.$LNG['supp_open'].'</font>';
			break;
			case 2:
				$status = '<font color="orange">'.$LNG['supp_admin_answer'].'</font>';
			break;
			case 3:
				$status = '<font color="green">'.$LNG['supp_player_answer'].'</font>';
			break;
		}		
			
		$template->assign_vars(array(
			't_id'			=> $TINFO['ID'],
			't_username'	=> $TINFO['username'],
			't_statustext'	=> $status,
			't_status'		=> $TINFO['status'],
			't_text'		=> $TINFO['text'],
			't_subject'		=> $TINFO['subject'],
			't_date'		=> date(TDFORMAT, $TINFO['time']),
			'text'			=> $LNG['text'],
			'answer_new'	=> $LNG['answer_new'],
			'button_submit'	=> $LNG['button_submit'],
			'open_ticket'	=> $LNG['open_ticket'],
			'close_ticket'	=> $LNG['close_ticket'],
		));	
	}	
	
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
		'tickets'			=> $tickets,
		'supp_header'		=> $LNG['supp_header'],
		'supp_header_g'		=> $LNG['supp_header_g'],
		'ticket_id'			=> $LNG['ticket_id'],
		'player'			=> $LNG['player'],
		'subject'			=> $LNG['subject'],
		'status'			=> $LNG['status'],
		'ticket_posted'		=> $LNG['ticket_posted'],
	));

	$template->show('adm/SupportPage.tpl');

}	
?>