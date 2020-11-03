<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

if (!allowedTo(str_replace(array(dirname(__FILE__), '\\', '/', '.php'), '', __FILE__))) exit;

function ShowAccountEditorPage() 
{
	global $USER, $db, $LNG, $reslist, $resource, $UNI, $CONF;

	$AvailableUnis[$CONF['uni']]	= $CONF['game_name'].' (ID: '.$CONF['uni'].')';
	$Query	= $db->query("SELECT `uni`, `game_name` FROM ".CONFIG." WHERE `uni` != '".$UNI."' ORDER BY `uni` DESC;");
	while($Unis	= $db->fetch_array($Query)) {
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	}
	ksort($AvailableUnis);
		$AvailableUnis[$Unis['uni']]	= $Unis['game_name'].' (ID: '.$Unis['uni'].')';
	$template 	= new template();

	switch($_GET['edit'])
	{
		case 'resources':
			$id         = request_var('id', 0);
			$id_dark    = request_var('id_dark', 0);
			$metal      = floattostring(round(abs(request_var('metal', 0.0)), 0));
			$cristal    = floattostring(round(abs(request_var('cristal', 0.0)), 0));
			$deut       = floattostring(round(abs(request_var('deut', 0.0)), 0));
			$norio      = floattostring(round(abs(request_var('norio', 0.0)), 0));
			$dark		= request_var('dark', 0);

			if ($_POST)
			{
				if ($_POST['add'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					$SQL .= "`metal` = `metal` + '".$metal."', ";
					$SQL .= "`crystal` = `crystal` + '".$cristal."', ";
					$SQL .= "`deuterium` = `deuterium` + '".$deut ."', ";
					$SQL .= "`norio` = `norio` + '".$norio ."' ";
					$SQL .= "WHERE ";
					$SQL .= "`id` = '". $id ."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);

					if (!empty($id_dark)) {
						$SQL  = "UPDATE ".USERS." SET ";
						$SQL .= "`darkmatter` = `darkmatter` + '". $dark ."' ";
						$SQL .= "WHERE ";
						$SQL .= "`id` = '". $id_dark ."' AND `universe` = '".$_SESSION['adminuni']."' ";
						$db->query($SQL);
					}
		$retour = "admin.php?page=accounteditor&edit=resources";
		$template->assign_vars(array('message' =>$LNG['ad_add_sucess'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
				elseif ($_POST['delete'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					$SQL .= "`metal` = `metal` - '". $metal ."', ";
					$SQL .= "`crystal` = `crystal` - '". $cristal ."', ";
					$SQL .= "`deuterium` = `deuterium` - '". $deut ."', ";
					$SQL .= "`norio` = `norio` - '". $norio ."' ";
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);

					if (!empty($id_dark)) {
						$SQL  = "UPDATE ".USERS." SET ";
						$SQL .= "`darkmatter` = `darkmatter` - '". $dark ."' ";
						$SQL .= "WHERE ";
						$SQL .= "`id` = '". $id_dark ."';";
						$db->query($SQL);
					}
		$retour = "admin.php?page=accounteditor&edit=resources";
		$template->assign_vars(array('message' =>$LNG['ad_delete_sucess'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;						

				}
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
				'button_reset'		=> $LNG['button_reset'],
				'button_delete'		=> $LNG['button_delete'],
				'button_add'		=> $LNG['button_add'],
				'Metal'				=> $LNG['Metal'],
				'Crystal'			=> $LNG['Crystal'],
				'Deuterium'			=> $LNG['Deuterium'],
				'Norio'			    => $LNG['Norio'],
				'Darkmatter'		=> $LNG['Darkmatter'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'input_id_user'		=> $LNG['input_id_user'],
				'resources_title'	=> $LNG['resources_title'],
				'input_id_p_m'		=> $LNG['input_id_p_m'],
			));
						
			$template->show('adm/AccountEditorPageResources.tpl');
		break;
		case 'ships':
			if($_POST)
			{
				if ($_POST['add'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['fleet'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` + '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=ships";
		$template->assign_vars(array('message' =>$LNG['ad_add_sucess_ships'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

				}
				elseif ($_POST['delete'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['fleet'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` - '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=ships";
		$template->assign_vars(array('message' =>$LNG['ad_delete_sucess_ships'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
				exit;
			}

			$parse['ships']	= "";
			foreach($reslist['fleet'] as $ID)
			{
				$INPUT[$ID]	= array(
					'name'	=> $LNG['tech'][$ID],
					'type'	=> $resource[$ID],
				);
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
				'inputlist'			=> $INPUT,
				'button_reset'		=> $LNG['button_reset'],
				'button_delete'		=> $LNG['button_delete'],
				'button_add'		=> $LNG['button_add'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'input_id_p_m'		=> $LNG['input_id_p_m'],
				'ships_title'		=> $LNG['ad_ships_title'],
				'ad_number'			=> $LNG['ad_number'],
				'ships_count'		=> $LNG['ad_count'],
			));
						
			$template->show('adm/AccountEditorPageShips.tpl');
		break;

		case 'defenses':
			if($_POST)
			{
				if ($_POST['add'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['defense'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` + '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=defenses";
		$template->assign_vars(array('message' =>$LNG['ad_add_defenses_succes'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

				}
				elseif ($_POST['delete'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['defense'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` - '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query( $SQL);
					$Name	=	$LNG['log_nomoree'];
		$retour = "admin.php?page=accounteditor&edit=defenses";
		$template->assign_vars(array('message' =>$LNG['ad_delete_defenses_succes'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
				exit;
			}
			
			foreach($reslist['defense'] as $ID)
			{
				$INPUT[$ID]	= array(
					'name'	=> $LNG['tech'][$ID],
					'type'	=> $resource[$ID],
				);
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
				'inputlist'			=> $INPUT,
				'button_reset'		=> $LNG['button_reset'],
				'button_delete'		=> $LNG['button_delete'],
				'button_add'		=> $LNG['button_add'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'input_id_p_m'		=> $LNG['input_id_p_m'],
				'defenses_title'	=> $LNG['ad_defenses_title'],
				'ad_number'			=> $LNG['ad_number'],
				'defenses_count'	=> $LNG['ad_count'],
			));
						
			$template->show('adm/AccountEditorPageDefenses.tpl');
		break;
		break;

		case 'buildings':
			if($_POST)
			{
				$PlanetData	= $db->uniquequery("SELECT `planet_type` FROM ".PLANETS." WHERE `id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';");
				if(!isset($PlanetData))
				{
		$retour = "admin.php?page=accounteditor&edit=buildings";
		$template->assign_vars(array('message' =>$LNG['ad_add_not_exist'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;						

				}
				if ($_POST['add'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['allow'][$PlanetData['planet_type']] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` + '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=buildings";
		$template->assign_vars(array('message' =>$LNG['ad_add_succes'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;	

				}
				elseif ($_POST['delete'])
				{
					$SQL  = "UPDATE ".PLANETS." SET ";
					foreach($reslist['allow'][$PlanetData['planet_type']] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` - '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=buildings";
		$template->assign_vars(array('message' =>$LNG['ad_delete_succes'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;					

				}
				exit;
			}
			
			foreach($reslist['build'] as $ID)
			{
				$INPUT[$ID]	= array(
					'name'	=> $LNG['tech'][$ID],
					'type'	=> $resource[$ID],
				);
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
				'inputlist'			=> $INPUT,
				'button_reset'		=> $LNG['button_reset'],
				'button_delete'		=> $LNG['button_delete'],
				'button_add'		=> $LNG['button_add'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'input_id_p_m'		=> $LNG['input_id_p_m'],
				'buildings_title'	=> $LNG['ad_buildings_title'],
				'ad_number'			=> $LNG['ad_number'],
				'ad_levels'			=> $LNG['ad_levels'],
			));
						
			$template->show('adm/AccountEditorPageBuilds.tpl');
		break;

		case 'researchs':
			if($_POST)
			{
				if ($_POST['add'])
				{
					$SQL  = "UPDATE ".USERS." SET ";
					foreach($reslist['tech'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` + '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=researchs";
		$template->assign_vars(array('message' =>$LNG['ad_add_rsucces'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;

				}
				elseif ($_POST['delete'])
				{
					$SQL  = "UPDATE ".USERS." SET ";
					foreach($reslist['tech'] as $ID)
					{
						$QryUpdate[]	= "`".$resource[$ID]."` = `".$resource[$ID]."` - '".floattostring(round(abs(request_var($resource[$ID], 0.0)), 0))."'";
					}
					$SQL .= implode(", ", $QryUpdate);
					$SQL .= "WHERE ";
					$SQL .= "`id` = '".request_var('id', 0)."' AND `universe` = '".$_SESSION['adminuni']."';";
					$db->query($SQL);
		$retour = "admin.php?page=accounteditor&edit=researchs";
		$template->assign_vars(array('message' =>$LNG['ad_delete_rsucces'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;	

				}
				exit;
			}
			
			foreach($reslist['tech'] as $ID)
			{
				$INPUT[$ID]	= array(
					'name'	=> $LNG['tech'][$ID],
					'type'	=> $resource[$ID],
				);
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
				'inputlist'			=> $INPUT,
				'button_reset'		=> $LNG['button_reset'],
				'button_delete'		=> $LNG['button_delete'],
				'button_add'		=> $LNG['button_add'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'input_id_user'		=> $LNG['input_id_user'],
				'research_title'	=> $LNG['ad_research_title'],
				'ad_number'			=> $LNG['ad_number'],
				'research_count'	=> $LNG['ad_count'],
			));
						
			$template->show('adm/AccountEditorPageResearch.tpl');
		break;
		case 'personal':
			if ($_POST)
			{
				$id			= request_var('id', 0);				
				$username	= request_var('username', '', UTF8_SUPPORT);				
				$password	= request_var('password', '', true);				
				$email		= request_var('email', '');				
				$email_2	= request_var('email_2', '');				
				$vacation	= request_var('vacation', '');				
				
				$PersonalQuery    =    "UPDATE ".USERS." SET ";

				if(!empty($username) && $id != ROOT_USER) {
					$PersonalQuery    .= "`username` = '".$db->sql_escape($username)."', ";
				} 
				if(!empty($email) && $id != ROOT_USER) {
					$PersonalQuery    .= "`email` = '".$db->sql_escape($email)."', ";
				} 
				if(!empty($email_2) && $id != ROOT_USER) {
					$PersonalQuery    .= "`email_2` = '".$db->sql_escape($email_2)."', ";
				} 	
				if(!empty($password) && $id != ROOT_USER) {
					$PersonalQuery    .= "`password` = '".$db->sql_escape(md5($password))."', ";
				} 
					
				$Answer		= 0;
				$TimeAns	= 0;
				
				if ($vacation == 'yes') {
					$Answer		= 1;
					$TimeAns    = TIMESTAMP + $_POST['d'] * 86400 + $_POST['h'] * 3600 + $_POST['m'] * 60 + $_POST['s'];
				}
				
				$PersonalQuery    .=  "`urlaubs_modus` = '".$Answer."', `urlaubs_until` = '".$TimeAns."' ";			
				$PersonalQuery    .= "WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."'";
				$db->query($PersonalQuery);
		$retour = "admin.php?page=accounteditor&edit=personal";
		$template->assign_vars(array('message' =>$LNG['ad_personal_succes'],'retour' =>$retour,));
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
				'button_submit'			=> $LNG['button_submit'],
				'ad_back_to_menu'		=> $LNG['ad_back_to_menu'],
				'input_id'				=> $LNG['input_id'],
				'ad_personal_vacat'		=> $LNG['ad_personal_vacat'],
				'ad_personal_email2'	=> $LNG['ad_personal_email2'],
				'ad_personal_email'		=> $LNG['ad_personal_email'],
				'ad_personal_pass'		=> $LNG['ad_personal_pass'],
				'ad_personal_name'		=> $LNG['ad_personal_name'],
				'ad_personal_title'		=> $LNG['ad_personal_title'],
				'time_seconds'			=> $LNG['time_seconds'],
				'time_minutes'			=> $LNG['time_minutes'],
				'time_hours'			=> $LNG['time_hours'],
				'time_days'				=> $LNG['time_days'],
				'Selector'				=> array(''	=> $LNG['select_option'], 'yes' => $LNG['one_is_yes'][1], 'no' => $LNG['one_is_yes'][0]),
			));
						
			$template->show('adm/AccountEditorPagePersonal.tpl');
		break;
		case 'planets':
			if ($_POST)
			{
				$id				= request_var('id', 0);
				$name			= request_var('name', '', UTF8_SUPPORT);
				$diameter		= request_var('diameter', 0);
				$fields			= request_var('fields', 0);
				$buildings		= request_var('0_buildings', '');
				$ships			= request_var('0_ships', '');
				$defenses		= request_var('0_defenses', '');
				$c_hangar		= request_var('0_c_hangar', '');
				$c_buildings	= request_var('0_c_buildings', '');
				$change_pos		= request_var('change_position', '');
				$galaxy			= request_var('g', 0);
				$system			= request_var('s', 0);
				$planet			= request_var('p', 0);

				if (!empty($name))
					$db->query("UPDATE ".PLANETS." SET `name` = '".$db->sql_escape($name)."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
						
				if ($buildings == 'on')
				{
					foreach($reslist['build'] as $ID) {
						$BUILD[]	= "`".$resource[$ID]."` = '0'";
					}
						
					$db->query("UPDATE ".PLANETS." SET ".implode(', ',$BUILD)." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				}
					
				if ($ships == 'on')
				{
					foreach($reslist['fleet'] as $ID) {
						$SHIPS[]	= "`".$resource[$ID]."` = '0'";
					}
					
					$db->query("UPDATE ".PLANETS." SET ".implode(', ',$SHIPS)." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				}
						
				if ($defenses == 'on')
				{
					foreach($reslist['defense'] as $ID) {
						$DEFS[]	= "`".$resource[$ID]."` = '0'";
					}
				
					$db->query("UPDATE ".PLANETS." SET ".implode(', ',$DEFS)." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				}

				if ($c_hangar == 'on')
					$db->query("UPDATE ".PLANETS." SET `b_hangar` = '0', `b_hangar_plus` = '0', `b_hangar_id` = '' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");

				if ($c_buildings == 'on')
					$db->query("UPDATE ".PLANETS." SET `b_building` = '0', `b_building_id` = '' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");

				if (!empty($diameter))
					$db->query("UPDATE ".PLANETS." SET `diameter` = '".$diameter."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");

				if (!empty($fields))
					$db->query("UPDATE ".PLANETS." SET `field_max` = '".$fields."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
						
				if ($change_pos == 'on' && $galaxy > 0 && $system > 0 && $planet > 0 && $galaxy <= MAX_GALAXY_IN_WORLD && $system <= MAX_SYSTEM_IN_GALAXY && $planet <= MAX_PLANET_IN_SYSTEM)
				{
					$P	=	$db->uniquequery("SELECT galaxy,system,planet,planet_type FROM ".PLANETS." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
					if ($P['planet_type'] == '1')
					{
						if (CheckPlanetIfExist($galaxy, $system, $planet, $UNI, $P['planet_type']))
						{
		$retour = "admin.php?page=accounteditor&edit=planets";
		$template->assign_vars(array('message' =>$LNG['ad_pla_error_planets3'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;								

						}

						$db->query ("UPDATE ".PLANETS." SET `galaxy` = '".$galaxy."', `system` = '".$system."', `planet` = '".$planet."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");

					} else {
						if(CheckPlanetIfExist($galaxy, $system, $planet, $UNI, $P['planet_type']))
						{
		$retour = "admin.php?page=accounteditor&edit=planets";
		$template->assign_vars(array('message' =>$LNG['ad_pla_error_planets5'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;							

						}
						
						$Target	= $db->uniquequery("SELECT id_luna FROM ".PLANETS." WHERE `galaxy` = '".$galaxy."' AND `system` = '".$system."' AND `planet` = '".$planet."' AND `planet_type` = '1';");
								
						if ($Target['id_luna'] != '0')
						{
		$retour = "admin.php?page=accounteditor&edit=planets";
		$template->assign_vars(array('message' =>$LNG['ad_pla_error_planets4'],'retour' =>$retour,));
		require_once(ROOT_PATH.'includes/pages/adm/Message.php');
		exit;							

						}
							
						$db->multi_query("UPDATE ".PLANETS." SET `id_luna` = '0' WHERE `galaxy` = '".$P['galaxy']."' AND `system` = '".$P['system']."' AND `planet` = '".$P['planet']."' AND `planet_type` = '1';UPDATE ".PLANETS." SET `id_luna` = '".$id."'  WHERE `galaxy` = '".$galaxy."' AND `system` = '".$system."' AND `planet` = '".$planet."' AND planet_type = '1';UPDATE ".PLANETS." SET `galaxy` = '".$galaxy."', `system` = '".$system."', `planet` = '".$planet."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
						
					$QMOON2	=	$db->uniquequery("SELECT id_owner FROM ".PLANETS." WHERE `galaxy` = '".$galaxy."' AND `system` = '".$system."' AND `planet` = '".$planet."';");
					$db->query("UPDATE ".PLANETS." SET `galaxy` = '".$galaxy."', `system` = '".$system."', `planet` = '".$planet."', `id_owner` = '".$QMOON2['id_owner']."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."' AND `planet_type` = '3';");
					}
				}
		$retour = "admin.php?page=accounteditor&edit=planets";
		$template->assign_vars(array('message' =>$LNG['ad_pla_succes'],'retour' =>$retour,));
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
				'button_submit'			=> $LNG['button_submit'],
				'button_reset'			=> $LNG['button_reset'],
				'ad_back_to_menu'		=> $LNG['ad_back_to_menu'],
				'ad_pla_title'			=> $LNG['ad_pla_title'],
				'input_id_p_m'			=> $LNG['input_id_p_m'],
				'ad_pla_edit_name'		=> $LNG['ad_pla_edit_name'],
				'ad_pla_edit_diameter'	=> $LNG['ad_pla_edit_diameter'],
				'ad_pla_edit_fields'	=> $LNG['ad_pla_edit_fields'],
				'ad_pla_delete_b'		=> $LNG['ad_pla_delete_b'],
				'ad_pla_delete_s'		=> $LNG['ad_pla_delete_s'],
				'ad_pla_delete_d'		=> $LNG['ad_pla_delete_d'],
				'ad_pla_delete_hd'		=> $LNG['ad_pla_delete_hd'],
				'ad_pla_delete_cb'		=> $LNG['ad_pla_delete_cb'],
				'ad_pla_title_l'		=> $LNG['ad_pla_title_l'],
				'ad_pla_change_p'		=> $LNG['ad_pla_change_p'],
				'ad_pla_change_pp'		=> $LNG['ad_pla_change_pp'],
			));
						
			$template->show('adm/AccountEditorPagePlanets.tpl');
		break;

		case 'alliances':
			if ($_POST)
			{
				$id				=	request_var('id', 0);
				$name			=	request_var('name', '', UTF8_SUPPORT);
				$changeleader	=	request_var('changeleader', 0);
				$tag			=	request_var('tag', '', UTF8_SUPPORT);
				$externo		=	request_var('externo', '', true);
				$interno		=	request_var('interno', '', true);
				$solicitud		=	request_var('solicitud', '', true);
				$delete			=	request_var('delete', '');
				$delete_u		=	request_var('delete_u', '');

				 #$QueryF	=	$db->uniquequery("SELECT * FROM ".ALLIANCE." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				 $QueryF	=	$db->uniquequery("SELECT * FROM ".ALLIANCE." WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';");

				if (!empty($name))
					#$db->multi_query("UPDATE ".ALLIANCE." SET `ally_name` = '".$name."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_name` = '".$name."' WHERE `ally_id` = '".$id."';");
					$db->multi_query("UPDATE ".ALLIANCE." SET `ally_name` = '".$name."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_name` = '".$name."' WHERE `ally_id` = '".$id."';");

				if (!empty($tag))
					 #$db->query("UPDATE ".ALLIANCE." SET `ally_tag` = '".$tag."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
					$db->query("UPDATE ".ALLIANCE." SET `ally_tag` = '".$tag."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';");

				$QueryF2	=	$db->uniquequery("SELECT ally_id FROM ".USERS." WHERE `id` = '".$changeleader."';");
				 #$db->multi_query("UPDATE ".ALLIANCE." SET `ally_owner` = '".$changeleader."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_rank_id` = '0' WHERE `id` = '".$changeleader."';");
				$db->multi_query("UPDATE ".ALLIANCE." SET `ally_owner` = '".$changeleader."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_rank_id` = '0' WHERE `id` = '".$changeleader."';");
						
				if (!empty($externo))
					 #$db->query("UPDATE ".ALLIANCE." SET `ally_description` = '".$externo."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				    $db->query("UPDATE ".ALLIANCE." SET `ally_description` = '".$externo."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';");
					
				if (!empty($interno))
					#$db->query("UPDATE ".ALLIANCE." SET `ally_text` = '".$interno."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
					$db->query("UPDATE ".ALLIANCE." SET `ally_text` = '".$interno."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';");
					
				if (!empty($solicitud))
					$db->query("UPDATE ".ALLIANCE." SET `ally_request` = '".$solicitud."' WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';");
				    #$db->query("UPDATE ".ALLIANCE." SET `ally_request` = '".$solicitud."' WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';");
				
				if ($delete == 'on')
				{
					#$db->multi_query("DELETE FROM ".ALLIANCE." WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_id` = '0', `ally_name` = '', `ally_request` = '0', `ally_rank_id` = '0', `ally_register_time` = '0', `ally_request` = '0' WHERE `ally_id` = '".$id."';");
					$db->multi_query("DELETE FROM ".ALLIANCE." WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_id` = '0', `ally_name` = '', `ally_request` = '0', `ally_rank_id` = '0', `ally_register_time` = '0', `ally_request` = '0' WHERE `ally_id` = '".$id."';");
				}

				if (!empty($delete_u))
				{
					 #$db->multi_query("UPDATE ".ALLIANCE." SET `ally_members` = ally_members - 1 WHERE `id` = '".$id."' AND `universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_id` = '0', `ally_name` = '', `ally_request` = '0', `ally_rank_id` = '0', `ally_register_time` = '0', `ally_request` = '0' WHERE `id` = '".$delete_u."' AND `ally_id` = '".$id."';");
					 $db->multi_query("UPDATE ".ALLIANCE." SET `ally_members` = ally_members - 1 WHERE `id` = '".$id."' AND `ally_universe` = '".$_SESSION['adminuni']."';UPDATE ".USERS." SET `ally_id` = '0', `ally_name` = '', `ally_request` = '0', `ally_rank_id` = '0', `ally_register_time` = '0', `ally_request` = '0' WHERE `id` = '".$delete_u."' AND `ally_id` = '".$id."';");
				}
		$retour = "admin.php?page=accounteditor&edit=alliances";
		$template->assign_vars(array('message' =>$LNG['ad_ally_succes'],'retour' =>$retour,));
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
				'button_submit'		=> $LNG['button_submit'],
				'ad_back_to_menu'	=> $LNG['ad_back_to_menu'],
				'ad_pla_title'		=> $LNG['ad_pla_title'],
				'ad_ally_title'		=> $LNG['ad_ally_title'],
				'input_id_ally'		=> $LNG['input_id_ally'],
				'ad_ally_change_id'	=> $LNG['ad_ally_change_id'],
				'ad_ally_name'		=> $LNG['ad_ally_name'],
				'ad_ally_tag'		=> $LNG['ad_ally_tag'],
				'ad_ally_delete_u'	=> $LNG['ad_ally_delete_u'],
				'ad_ally_user_id'	=> $LNG['ad_ally_user_id'],
				'ad_ally_delete'	=> $LNG['ad_ally_delete'],
				'ad_ally_text1'		=> $LNG['ad_ally_text1'],
				'ad_ally_text2'		=> $LNG['ad_ally_text2'],
				'ad_ally_text3'		=> $LNG['ad_ally_text3'],
			));
						
			$template->show('adm/AccountEditorPageAlliance.tpl');
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
				'ad_editor_personal'	=> $LNG['ad_editor_personal'],
				'ad_editor_alliances'	=> $LNG['ad_editor_alliances'],
				'ad_editor_planets'		=> $LNG['ad_editor_planets'],
				'ad_editor_resources'	=> $LNG['ad_editor_resources'],
				'ad_editor_researchs'	=> $LNG['ad_editor_researchs'],
				'ad_editor_defenses'	=> $LNG['ad_editor_defenses'],
				'ad_editor_ships'		=> $LNG['ad_editor_ships'],
				'ad_editor_buildings'	=> $LNG['ad_editor_buildings'],
				'ad_editor_title'		=> $LNG['ad_editor_title'],
			));
							
			$template->show('adm/AccountEditorPageMenu.tpl');
		break;
	}
}
?>