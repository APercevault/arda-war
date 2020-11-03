<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowBanPage() 
{
	global $LNG, $USER, $db, $UNI, $CONF;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	$ORDER = $_GET['order'] == 'id' ? "id" : "username";

	if ($_GET['view'] == 'bana')
		$WHEREBANA	= "AND `bana` = '1'";

	$UserList		= $db->query("SELECT `username`, `id`, `bana` FROM ".USERS." WHERE `id` != 1 AND `authlevel` <= '".$USER['authlevel']."' AND `universe` = '".$_SESSION['adminuni']."' ".$WHEREBANA." ORDER BY ".$ORDER." ASC;");

	$UserSelect	= array('List' => '', 'ListBan' => '');
	
	$Users	=	0;
	while ($a = $db->fetch_array($UserList))
	{
		$UserSelect['List']	.=	'<option value="'.$a['username'].'">'.$a['username'].'&nbsp;&nbsp;(ID:&nbsp;'.$a['id'].')'.(($a['bana']	==	'1') ? $LNG['bo_characters_suus'] : '').'</option>';
		$Users++;
	}

	$db->free_result($UserList);
	
	$ORDER2 = $_GET['order2'] == 'id' ? "id" : "username";
		
	$Banneds		=0;
	$UserListBan	= $db->query("SELECT `username`, `id` FROM ".USERS." WHERE `bana` = '1' AND `universe` = '".$_SESSION['adminuni']."' ORDER BY ".$ORDER2." ASC;");
	while ($b = $db->fetch_array($UserListBan))
	{
		$UserSelect['ListBan']	.=	'<option value="'.$b['username'].'">'.$b['username'].'&nbsp;&nbsp;(ID:&nbsp;'.$b['id'].')</option>';
		$Banneds++;
	}

	$db->free_result($UserListBan);

	$template	= new template();
	$template->loadscript('filterlist.js');


	if(isset($_POST['panel']))
	{
		$Name					= request_var('ban_name', '', true);
		$BANUSER				= $db->uniquequery("SELECT b.theme, b.longer, u.id, u.urlaubs_modus, u.banaday FROM ".USERS." as u LEFT JOIN ".BANNED." as b ON u.`username` = b.`who` WHERE u.`username` = '".$db->sql_escape($Name)."' AND u.`universe` = '".$_SESSION['adminuni']."';");
			
		if ($BANUSER['banaday'] <= TIMESTAMP)
		{
			$title			= $LNG['bo_bbb_title_1'];
			$changedate		= $LNG['bo_bbb_title_2'];
			$changedate_advert		= '';
			$reas					= '';
			$timesus				= '';
		}
		else
		{
			$title			= $LNG['bo_bbb_title_3'];
			$changedate		= $LNG['bo_bbb_title_6'];
			$changedate_advert	=	'<td class="c" width="18px"><img src="./styles/images/Adm/i.gif" class="tooltip" name="'.$LNG['bo_bbb_title_4'].'"></td>';
				
			$reas			= $BANUSER['theme'];
			$timesus		=	
				"<tr>
					<th>".$LNG['bo_bbb_title_5']."</th>
					<th height=25 colspan=2>".date($LNG['php_tdformat'], $BANUSER['longer'])."</th>
				</tr>";
		}
		
		
		$vacation	= ($BANUSER['urlaubs_modus'] == 1) ? true : false;
		
		$template->assign_vars(array(	
			'name'				=> $Name,
			'bantitle'			=> $title,
			'changedate'		=> $changedate,
			'reas'				=> $reas,
			'changedate_advert'	=> $changedate_advert,
			'timesus'			=> $timesus,
			'vacation'			=> $vacation,
			'bo_characters_1'	=> $LNG['bo_characters_1'],
			'bo_reason'			=> $LNG['bo_reason'],
			'bo_username'		=> $LNG['bo_username'],
			'bo_vacation_mode'	=> $LNG['bo_vacation_mode'],
			'bo_vacaations'		=> $LNG['bo_vacaations'],
			'time_seconds'		=> $LNG['time_seconds'],
			'time_minutes'		=> $LNG['time_minutes'],
			'time_hours'		=> $LNG['time_hours'],
			'time_days'			=> $LNG['time_days'],
		));
	} elseif (isset($_POST['bannow']) && $BANUSER['id'] != 1) {
		$Name              = request_var('ban_name', '' ,true);
		$reas              = request_var('why', '' ,true);
		$days              = request_var('days', 0);
		$hour              = request_var('hour', 0);
		$mins              = request_var('mins', 0);
		$secs              = request_var('secs', 0);
		$admin             = $USER['username'];
		$mail              = $USER['email'];
		$BanTime           = $days * 86400 + $hour * 3600 + $mins * 60 + $secs;

		if ($BANUSER['longer'] > TIMESTAMP)
			$BanTime          += ($BANUSER['longer'] - TIMESTAMP);
		
		$BannedUntil = ($BanTime + TIMESTAMP) < TIMESTAMP ? TIMESTAMP : TIMESTAMP + $BanTime;
		
		
		if ($BANUSER['banaday'] > TIMESTAMP)
		{
			$SQL      = "UPDATE ".BANNED." SET ";
			$SQL     .= "`who` = '". $Name ."', ";
			$SQL     .= "`theme` = '". $reas ."', ";
			$SQL     .= "`who2` = '". $Name ."', ";
			$SQL     .= "`time` = '".TIMESTAMP."', ";
			$SQL     .= "`longer` = '". $BannedUntil ."', ";
			$SQL     .= "`author` = '". $admin ."', ";
			$SQL     .= "`email` = '". $mail ."' ";
			$SQL     .= "WHERE `who2` = '".$Name."' AND `universe` = '".$_SESSION['adminuni']."';";
			$db->query($SQL);
		} else {
			$SQL      = "INSERT INTO ".BANNED." SET ";
			$SQL     .= "`who` = '". $Name ."', ";
			$SQL     .= "`theme` = '". $reas ."', ";
			$SQL     .= "`who2` = '". $Name ."', ";
			$SQL     .= "`time` = '".TIMESTAMP."', ";
			$SQL     .= "`longer` = '". $BannedUntil ."', ";
			$SQL     .= "`author` = '". $admin ."', ";
			$SQL     .= "`universe` = '".$_SESSION['adminuni']."', ";
			$SQL     .= "`email` = '". $mail ."';";
			$db->query($SQL);
		}

		$SQL     = "UPDATE ".USERS." SET ";
		$SQL    .= "`bana` = '1', ";
		$SQL    .= "`banaday` = '". $BannedUntil ."', ";
		$SQL	.= isset($_POST['vacat']) ? "`urlaubs_modus` = '1'" : "`urlaubs_modus` = '0'";
		$SQL    .= "WHERE ";
		$SQL    .= "`username` = '". $Name ."' AND `universe` = '".$_SESSION['adminuni']."';";
		$db->query($SQL);
		
		$retour = "admin.php?page=bans";
		$template->assign_vars(array('message' =>$LNG['bo_the_player'].$Name.$LNG['bo_banned'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

	} elseif(isset($_POST['unban_name'])) {
		$Name	= request_var('unban_name', '', true);
		$db->multi_query("DELETE FROM ".BANNED." WHERE who = '".$db->sql_escape($Name)."' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET bana = '0', banaday = '0' WHERE username = '".$db->sql_escape($Name)."' AND `universe` = '".$_SESSION['adminuni']."';");
		$retour = "admin.php?page=bans";
		$template->assign_vars(array('message' =>$LNG['bo_the_player2'].$Name.$LNG['bo_unbanned'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;		
		

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
		'UserSelect'		=> $UserSelect,
		'bo_ban_player'		=> $LNG['bo_ban_player'],
		'bo_select_title'	=> $LNG['bo_select_title'],
		'bo_order_banned'	=> $LNG['bo_order_banned'],
		'bo_order_id'		=> $LNG['bo_order_id'],
		'bo_order_username'	=> $LNG['bo_order_username'],
		'button_filter'		=> $LNG['button_filter'],
		'button_reset'		=> $LNG['button_reset'],
		'button_deselect'	=> $LNG['button_deselect'],
		'button_submit'		=> $LNG['button_submit'],
		'bo_total_users'	=> $LNG['bo_total_users'],
		'bo_total_banneds'	=> $LNG['bo_total_banneds'],
		'bo_unban_player'	=> $LNG['bo_unban_player'],
		'usercount'			=> $Users,
		'bancount'			=> $Banneds,
	));
	
	$template->show('adm/BanPage.tpl');
}
?>