<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;


function ShowCreatorPage()
{
	global $LNG, $USER, $db, $UNI, $CONF, $LANG;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
	$template	= new template();

	
	switch ($_GET['mode'])
	{
		case 'user':
			$LANG->includeLang(array('PUBLIC'));
			if ($_POST)
			{
				$UserName 	= request_var('name', '', UTF8_SUPPORT);
				$UserPass 	= request_var('password', '');
				$UserPass2 	= request_var('password2', '');
				$UserMail 	= request_var('email', '');
				$UserMail2	= request_var('email2', '');
				$UserLang 	= request_var('lang', '');
				$UserAuth 	= request_var('authlevel', 0);
				$Galaxy 	= request_var('galaxy', 0);
				$System 	= request_var('system', 0);
				$Planet 	= request_var('planet', 0);
				$Univer		= $USER['authlevel'] != AUTH_ADM ? $_SESSION['adminuni'] : request_var('uni','');
								
				if ($CONF['capaktiv'] === '1') {
					require_once('includes/libs/reCAPTCHA/recaptchalib.php');
					$resp = recaptcha_check_answer($CONF['capprivate'], $_SERVER['REMOTE_ADDR'], request_var('recaptcha_challenge_field', ''), request_var('recaptcha_response_field', ''));
					if (!$resp->is_valid)
						$errorlist .= $LNG['wrong_captcha'];
				}
					
				$Exist['userv'] = $db->uniquequery("SELECT username, email FROM ".USERS." WHERE username = '".$db->sql_escape($UserName)."' OR email = '".$db->sql_escape($UserEmail)."';");
				$Exist['vaild'] = $db->uniquequery("SELECT username, email FROM ".USERS_VALID." WHERE username = '".$db->sql_escape($UserName)."' OR email = '".$db->sql_escape($UserEmail)."';");
								
				if (!ValidateAddress($UserMail)) 
					$errors .= $LNG['invalid_mail_adress'];
					
				if (empty($UserName))
					$errors .= $LNG['empty_user_field'];
										
				if (strlen($UserPass) < 6)
					$errors .= $LNG['password_lenght_error'];
					
				if ($UserPass != $UserPass2)
					$errors .= $LNG['different_passwords'];				
					
				if ($UserMail != $UserMail2)
					$errors .= $LNG['different_mails'];
					
				if (!CheckName($UserName))
					$errors .= (UTF8_SUPPORT) ? $LNG['user_field_no_space'] : $LNG['user_field_no_alphanumeric'];				
										
				if ((isset($Exist['userv']['username']) || isset($Exist['vaild']['username']) && ($UserName == $Exist['userv']['username'] || $UserName == $Exist['vaild']['username'])))
					$errors .= $LNG['user_already_exists'];

				if ((isset($Exist['userv']['email']) || isset($Exist['vaild']['email'])) && ($UserEmail == $Exist['userv']['email'] || $UserEmail == $Exist['vaild']['email']))
					$errors .= $LNG['mail_already_exists'];
				
				if (CheckPlanetIfExist($Galaxy, $System, $Position, $_SESSION['adminuni'])) {
					$errors .= $LNG['planet_already_exists'];
				}	

				if (!empty($errors)) {
		$retour = "admin.php?page=create&mode=user";
		$template->assign_vars(array('message' =>$errors,'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
				
				$SQL = "INSERT INTO ".USERS." SET ";
				$SQL .= "`username` = '".$db->sql_escape($UserName). "', ";
				$SQL .= "`email` = '".$db->sql_escape($UserMail)."', ";
				$SQL .= "`email_2` = '".$db->sql_escape($UserMail)."', ";
				$SQL .= "`lang` = '".$db->sql_escape($UserLang)."', ";
				$SQL .= "`authlevel` = '".$UserAuth."', ";
				$SQL .= "`ip_at_reg` = '".$_SERVER['REMOTE_ADDR']."', ";
				$SQL .= "`id_planet` = '0', ";
				$SQL .= "`universe` = '".$Univer."',";
				$SQL .= "`onlinetime` = '".TIMESTAMP."', ";
				$SQL .= "`register_time` = '".TIMESTAMP. "', ";
				$SQL .= "`password` = '".md5($UserPass)."', ";
				$SQL .= "`dpath` = '".DEFAULT_THEME."', ";
				$SQL .= "`darkmatter` = '".BUILD_DARKMATTER."', ";				
				$SQL .= "`uctime`= '0';";
				$db->query($SQL);
				$db->query("UPDATE ".CONFIG." SET `users_amount` = users_amount + '1' WHERE `uni` = '".$Univer."';");

				$ID_USER 	= $db->uniquequery("SELECT `id` FROM ".USERS." WHERE `username` = '".$db->sql_escape($UserName)."';");
				
				require_once(ROOT_PATH.'includes/functions/CreateOnePlanetRecord.php');
				CreateOnePlanetRecord($Galaxy, $System, $Planet, $Univer ,$ID_USER['id'], $UserPlanet, true, $UserAuth);
				$ID_PLANET 	= $db->uniquequery("SELECT `id` FROM ".PLANETS." WHERE `id_owner` = '".$ID_USER['id']."';");
								
				$SQL = "UPDATE ".USERS." SET ";
				$SQL .= "`id_planet` = '".$ID_PLANET['id']."', ";
				$SQL .= "`universe` = '".$Univer."', ";
				$SQL .= "`galaxy` = '".$Galaxy."', ";
				$SQL .= "`system` = '".$System."', ";
				$SQL .= "`planet` = '".$Planet."' ";
				$SQL .= "WHERE ";
				$SQL .= "`id` = '".$ID_USER['id']."' ";
				$SQL .= "LIMIT 1;";
				$db->query($SQL);
				
		$retour = "admin.php?page=create&mode=user";
		$template->assign_vars(array('message' =>$LNG['new_user_success'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

			}

			$AUTH		    = array();
			$AUTH[AUTH_USR]	= $LNG['user_level'][AUTH_USR];
			
			if($USER['authlevel'] >= AUTH_OPS)
				$AUTH[AUTH_OPS]	= $LNG['user_level'][AUTH_OPS];
				
			if($USER['authlevel'] >= AUTH_MOD)
				$AUTH[AUTH_MOD]	= $LNG['user_level'][AUTH_MOD];
				
			if($USER['authlevel'] >= AUTH_ADM)
				$AUTH[AUTH_ADM]	= $LNG['user_level'][AUTH_ADM];
				
			
			$Query	= $db->query("SELECT `uni`, `uni_name` FROM ".CONFIG." ORDER BY `uni` ASC;");
			while($Unis	= $db->fetch_array($Query)) {
				$AvailableUnisa[$Unis['uni']]	= $Unis;
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
				'AvailableUnisa'			=> $AvailableUnisa,
				'admin_auth'			=> $USER['authlevel'],
				'new_add_user'			=> $LNG['new_add_user'],
				'new_creator_refresh'	=> $LNG['new_creator_refresh'],
				'new_creator_go_back'	=> $LNG['new_creator_go_back'],
				'universe'				=> $LNG['mu_universe'],
				'user_reg'				=> $LNG['user_reg'],
				'pass_reg'				=> $LNG['pass_reg'],
				'pass2_reg'				=> $LNG['pass2_reg'],
				'email_reg'				=> $LNG['email_reg'],
				'email2_reg'			=> $LNG['email2_reg'],
				'new_coord'				=> $LNG['new_coord'],
				'new_range'				=> $LNG['new_range'],
				'lang'					=> $LNG['op_lang'],		
				'new_title'				=> $LNG['new_title'],
				'Selector'				=> array('auth' => $AUTH, 'lang' => $LANG->getAllowedLangs(false)),  
			));
			$template->show('adm/CreatePageUser.tpl');
		break;
		case 'moon':
			if ($_POST)
			{
				$PlanetID  	= request_var('add_moon', 0);
				$MoonName  	= request_var('name', '', UTF8_SUPPORT);
				$Diameter	= request_var('diameter', 0);
				$FieldMax	= request_var('field_max', 0);
				if($USER['authlevel'] == AUTH_ADM)
				$Univer		= request_var('uni','');
				else
				$Univer		= $_SESSION['adminuni'];
			
				$MoonPlanet	= $db->uniquequery("SELECT `temp_max`, `temp_min`, `id_luna`, `galaxy`, `system`, `planet`, `planet_type`, `destruyed`, `id_owner` FROM ".PLANETS." WHERE `id` = '".$PlanetID."' AND `universe` = '".$Univer."' AND `planet_type` = '1' AND `destruyed` = '0';");

				if (!isset($MoonPlanet)) {
		$retour = "admin.php?page=create&mode=moon";
		$template->assign_vars(array('message' =>$LNG['mo_planet_doesnt_exist'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
			
				require_once(ROOT_PATH.'includes/functions/CreateOneMoonRecord.php');
				
				if(CreateOneMoonRecord($MoonPlanet['galaxy'], $MoonPlanet['system'], $MoonPlanet['planet'], $Univer, $MoonPlanet['id_owner'], 0, $MoonName, 20, (($_POST['diameter_check'] == 'on') ? 0: $Diameter)) !== false)
{
		$retour = "admin.php?page=create&mode=moon";
		$template->assign_vars(array('message' =>$LNG['mo_moon_added'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;				
}
				else
{
		$retour = "admin.php?page=create&mode=moon";
		$template->assign_vars(array('message' =>$LNG['mo_moon_unavaible'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					
}
						

			}
			
			$Query	= $db->query("SELECT `uni`, `uni_name` FROM ".CONFIG." ORDER BY `uni` ASC;");
			while($Unis	= $db->fetch_array($Query)) {
				$AvailableUnisa[$Unis['uni']]	= $Unis;
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
			
				'AvailableUnisa'			=> $AvailableUnisa,
				'admin_auth'			=> $USER['authlevel'],	
				'universum'				=> $LNG['mu_universe'],
				'po_add_moon'			=> $LNG['po_add_moon'],
				'input_id_planet'		=> $LNG['input_id_planet'],
				'mo_moon_name'			=> $LNG['mo_moon_name'],
				'mo_diameter'			=> $LNG['mo_diameter'],
				'mo_temperature'		=> $LNG['mo_temperature'],
				'mo_fields_avaibles'	=> $LNG['mo_fields_avaibles'],
				'button_add'			=> $LNG['button_add'],
				'new_creator_refresh'	=> $LNG['new_creator_refresh'],
				'mo_moon'				=> $LNG['fcm_moon'],
				'new_creator_go_back'	=> $LNG['new_creator_go_back'],
			));
			
			
			$template->show('adm/CreatePageMoon.tpl');
		break;
		case 'planet':
			if ($_POST) 
			{
				$id          = request_var('id', 0);
				$Galaxy      = request_var('galaxy', 0);
				$System      = request_var('system', 0);
				$Planet      = request_var('planet', 0);
				$name        = request_var('name', '', UTF8_SUPPORT);
				$field_max   = request_var('field_max', 0);
				if($USER['authlevel'] == AUTH_ADM)
				$Univer		 = request_var('uni','');
				else
				$Univer		 = $_SESSION['adminuni'];
				
				
				$ISUser		= $db->uniquequery("SELECT id, authlevel FROM ".USERS." WHERE `id` = '".$id."' AND `universe` = '".$Univer."';");
				if(CheckPlanetIfExist($Galaxy, $System, $Planet, $Univer) || !isset($ISUser)) {
		$retour = "admin.php?page=create&mode=planet";
		$template->assign_vars(array('message' =>$LNG['po_complete_all'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;						

				}
				
				require_once(ROOT_PATH.'includes/functions/CreateOnePlanetRecord.php');
				CreateOnePlanetRecord($Galaxy, $System, $Planet, $Univer, $id, '', '', false) ; 
						
				$SQL  = "UPDATE ".PLANETS." SET ";
				
				if ($_POST['diameter_check'] != 'on' || $field_max > 0)
					$SQL .= "`field_max` = '".$field_max."' ";
			
				if (!empty($name))
					$SQL .= ", `name` = '".$db->sql_escape($name)."' ";

				$SQL .= "WHERE ";
				$SQL .= "`universe` = '". $Univer ."' AND ";
				$SQL .= "`galaxy` = '". $Galaxy ."' AND ";
				$SQL .= "`system` = '". $System ."' AND ";
				$SQL .= "`planet` = '". $Planet ."' AND ";
				$SQL .= "`planet_type` = '1'";
				$db->query($SQL);
		$retour = "admin.php?page=create&mode=planet";
		$template->assign_vars(array('message' =>$LNG['po_complete_succes'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

			}
			
			$Query	= $db->query("SELECT `uni`, `uni_name` FROM ".CONFIG." ORDER BY `uni` ASC;");
			while($Unis	= $db->fetch_array($Query)) {
				$AvailableUnisa[$Unis['uni']]	= $Unis;
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
				'AvailableUnisa'			=> $AvailableUnisa,
				'admin_auth'			=> $USER['authlevel'],	
				'universum'				=> $LNG['mu_universe'],
				'po_add_planet'			=> $LNG['po_add_planet'],
				'po_galaxy'				=> $LNG['po_galaxy'],
				'po_system'				=> $LNG['po_system'],
				'po_planet'				=> $LNG['po_planet'],
				'input_id_user'			=> $LNG['input_id_user'],
				'new_creator_coor'		=> $LNG['new_creator_coor'],
				'po_name_planet'		=> $LNG['po_name_planet'],
				'po_fields_max'			=> $LNG['po_fields_max'],
				'button_add'			=> $LNG['button_add'],
				'po_colony'				=> $LNG['fcp_colony'],
				'new_creator_refresh'	=> $LNG['new_creator_refresh'],
				'new_creator_go_back'	=> $LNG['new_creator_go_back'],
			));
			
			$template->show('adm/CreatePagePlanet.tpl');
		break;
		default:
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
				'new_creator_title_u'	=> $LNG['new_creator_title_u'],
				'new_creator_title_p'	=> $LNG['new_creator_title_p'],
				'new_creator_title_l'	=> $LNG['new_creator_title_l'],
				'new_creator_title'		=> $LNG['new_creator_title'],
			));
			
			$template->show('adm/CreatePage.tpl');
		break;	
	}
}
?>