<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

function ShowTraderPage()
{
   global $USER, $PLANET, $LNG, $db;
   $ress       = request_var('ress', '');
   $action    = request_var('action', '');
   $metal      = round(request_var('metal', 0.0), 0);
   $crystal    = round(request_var('crystal', 0.0), 0);
   $deut      = round(request_var('deuterium', 0.0), 0);
   $norio      = round(request_var('norio', 0.0), 0);

   $PlanetRess = new ResourceUpdate();
   
   $template   = new template();
   $template->loadscript("trader.js");

   if ($ress != '')
   {
      switch ($ress) {
         case 'metal':
            if($action == "trade")
            {
               if ($USER['darkmatter'] < DARKMATTER_FOR_TRADER)
                  $template->message(sprintf($LNG['tr_empty_darkmatter'], $LNG['Darkmatter']), "game.php?page=trader", 4);
               elseif ($crystal < 0 || $deut < 0 || $norio < 0)
                  $template->message($LNG['tr_only_positive_numbers'], "game.php?page=trader",4);
               else
               {
                  $trade   = ($crystal * SILICIUM_FOR_METAL + $deut * DETERIUM_FOR_METAL + $norio * NORIO_FOR_METAL);
                  $PlanetRess->CalcResource();
                  if ($PLANET['metal'] > $trade)
                  {
                     $PLANET['metal']     -= $trade;
                     $PLANET['crystal']   += $crystal;
                     $PLANET['deuterium'] += $deut;
                     $PLANET['norio']     += $norio;
                     $USER['darkmatter']   -= DARKMATTER_FOR_TRADER;
                     $template->message("<font color=\"lime\"size=\"4\"><b>".$LNG['tr_exchange_done'],"game.php?page=trader",4);
                  }
                  else
                     $template->message("<font color=\"red\"size=\"4\"><b>".$LNG['tr_not_enought_metal'], "game.php?page=trader", 4);
                     
                  $PlanetRess->SavePlanetToDB();
               }
            } else {




               $template->assign_vars(array(
			   
				'al_back'		=>	$LNG['al_back'],
				'echange_metal'		=>	$LNG['echange_metal'],
                  'tr_resource'      => $LNG['tr_resource'],
                  'tr_sell_metal'      => $LNG['tr_sell_metal'],
                  'tr_amount'         => $LNG['tr_amount'],
                  'tr_exchange'      => $LNG['tr_exchange'],  
				  'tr_almacenes'      => $LNG['tr_almacenes'],   				  
                  'tr_quota_exchange'   => $LNG['tr_quota_exchange'],
				  'tr_descr'   		=> $LNG['tr_descr'],
				  'tr_cost_dm_trader'   	=> sprintf($LNG['tr_cost_dm_trader'], pretty_number(DARKMATTER_FOR_TRADER), $LNG['Darkmatter']),
                  'Metal'            => $LNG['Metal'],
                  'Crystal'         => $LNG['Crystal'],
                  'Deuterium'         => $LNG['Deuterium'],
                  'Norio'             => $LNG['Norio'],
                  'mod_ma_res_a'       => SILICIUM_FOR_METAL,
                  'mod_ma_res_b'       => DETERIUM_FOR_METAL,
                  'mod_ma_res_d'       => NORIO_FOR_METAL,
                  'ress'             => $ress,
               ));

               $template->show("mercader/trader_metal.tpl");   
            }
         break;
         case 'crystal':
            if($action == "trade")
            {
               if ($USER['darkmatter'] < DARKMATTER_FOR_TRADER)
                  $template->message(sprintf($LNG['tr_empty_darkmatter'], $LNG['Darkmatter']), "game.php?page=trader", 4);
               elseif ($metal < 0 || $deut < 0 || $norio < 0)
                  $template->message($LNG['tr_only_positive_numbers'], "game.php?page=trader",4);
               else
               {
                  $trade   = ($metal * METAL_FOR_SILICIUM + $deut * DETERIUM_FOR_SILICIUM + $norio * NORIO_FOR_SILICIUM);                  
                  $PlanetRess->CalcResource();
                  if ($PLANET['crystal'] > $trade)
                  {
                     $PLANET['metal']     += $metal;
                     $PLANET['crystal']   -= $trade;
                     $PLANET['deuterium'] += $deut;
                     $PLANET['norio']     += $norio;
                     $USER['darkmatter']   -= DARKMATTER_FOR_TRADER;
                     $template->message("<font color=\"lime\"size=\"4\"><b>".$LNG['tr_exchange_done'],"game.php?page=trader",4);
                  }
                  else
                     $template->message("<font color=\"red\"size=\"4\"><b>".$LNG['tr_not_enought_crystal'], "game.php?page=trader", 4);
                  
                  $PlanetRess->SavePlanetToDB();
               }
            } else {




               $template->assign_vars(array(
					
					'al_back'		=>	$LNG['al_back'],
					'echange_crystal'	=> $LNG['echange_crystal'],
                  'tr_resource'      => $LNG['tr_resource'],
                  'tr_sell_crystal'   => $LNG['tr_sell_crystal'],
                  'tr_amount'         => $LNG['tr_amount'],
                  'tr_exchange'      => $LNG['tr_exchange'],   
				  'tr_almacenes'      => $LNG['tr_almacenes'],
                  'tr_quota_exchange'   => $LNG['tr_quota_exchange'],
				  'tr_descr'   		=> $LNG['tr_descr'],
				  'tr_cost_dm_trader'   		=> sprintf($LNG['tr_cost_dm_trader'], pretty_number(DARKMATTER_FOR_TRADER), $LNG['Darkmatter']),
                  'Metal'            => $LNG['Metal'],
                  'Crystal'         => $LNG['Crystal'],
                  'Deuterium'         => $LNG['Deuterium'],
                  'Norio'             => $LNG['Norio'],
                  'mod_ma_res_a'       => METAL_FOR_SILICIUM,
                  'mod_ma_res_b'       => DETERIUM_FOR_SILICIUM,
                  'mod_ma_res_d'       => NORIO_FOR_SILICIUM,
                  'ress'             => $ress,
               ));

               $template->show("mercader/trader_crystal.tpl");   
            }
         break;
         case 'deuterium':
            if($action == "trade")
            {
               if ($USER['darkmatter'] < DARKMATTER_FOR_TRADER)
                  $template->message(sprintf($LNG['tr_empty_darkmatter'], $LNG['Darkmatter']), "game.php?page=trader", 4);
               elseif ($metal < 0 || $crystal < 0 || $norio < 0)
                  message($LNG['tr_only_positive_numbers'], "game.php?page=trader",4);
               else
               {
                  $trade   = ($metal * METAL_FOR_DETERIUM + $crystal * SILICIUM_FOR_DETERIUM + $norio * NORIO_FOR_DETERIUM);   #si norio se multplica por (1) da el mismo resultado               
                  $PlanetRess->CalcResource();
                  if ($PLANET['deuterium'] > $trade)
                  {
                     $PLANET['metal']     += $metal;
                     $PLANET['crystal']   += $crystal;
                     $PLANET['deuterium'] -= $trade;
                     $PLANET['norio']     += $norio;
                     $USER['darkmatter']   -= DARKMATTER_FOR_TRADER;
                     $template->message("<font color=\"lime\"size=\"4\"><b>".$LNG['tr_exchange_done'],"game.php?page=trader", 4);
                  }
                  else
                     $template->message("<font color=\"red\"size=\"4\"><b>".$LNG['tr_not_enought_deuterium'], "game.php?page=trader", 4);
                     
                  $PlanetRess->SavePlanetToDB();
               }
            } else {




               $template->assign_vars(array(
			   
					'al_back'		=>	$LNG['al_back'],
					'echange_deuterium'	=> $LNG['echange_deuterium'],
                  'tr_resource'      => $LNG['tr_resource'],
                  'tr_sell_deuterium'   => $LNG['tr_sell_deuterium'],
                  'tr_amount'         => $LNG['tr_amount'],
                  'tr_exchange'      => $LNG['tr_exchange'],   
				  'tr_almacenes'      => $LNG['tr_almacenes'],
                  'tr_quota_exchange'   => $LNG['tr_quota_exchange'],
				  'tr_descr'   		=> $LNG['tr_descr'],
				  'tr_cost_dm_trader'   		=> sprintf($LNG['tr_cost_dm_trader'], pretty_number(DARKMATTER_FOR_TRADER), $LNG['Darkmatter']),
                  'Metal'            => $LNG['Metal'],
                  'Crystal'         => $LNG['Crystal'],
                  'Deuterium'         => $LNG['Deuterium'],
                  'Norio'             => $LNG['Norio'],
                  'mod_ma_res_a'       => METAL_FOR_DETERIUM,
                  'mod_ma_res_b'       => SILICIUM_FOR_DETERIUM,
                  'mod_ma_res_d'       => NORIO_FOR_DETERIUM,
                  'ress'             => $ress,
               ));



               $template->show("mercader/trader_deuterium.tpl");   
            }
         break;   
         case 'norio':
            if($action == "trade")
            {
               if ($USER['darkmatter'] < DARKMATTER_FOR_TRADER)
                  $template->message(sprintf($LNG['tr_empty_darkmatter'], $LNG['Darkmatter']), "game.php?page=trader", 4);
               elseif ($metal < 0 || $crystal < 0 || $deut < 0)
                  message($LNG['tr_only_positive_numbers'], "game.php?page=trader",4);
               else
               {
                  $trade = ($metal * METAL_FOR_NORIO + $crystal * SILICIUM_FOR_NORIO + $deut * DETERIUM_FOR_NORIO);         
                  $PlanetRess->CalcResource();
                  if ($PLANET['norio'] > $trade)
                  {
                     $PLANET['metal']     += $metal;
                     $PLANET['crystal']   += $crystal;
                     $PLANET['deuterium'] += $deut;
                     $PLANET['norio']     -= $trade;
                     $USER['darkmatter']   -= DARKMATTER_FOR_TRADER;
                     $template->message("<font color=\"lime\"size=\"4\"><b>".$LNG['tr_exchange_done'],"game.php?page=trader", 4);
                  }
                  else
                     $template->message("<font color=\"red\"size=\"4\"><b>".$LNG['tr_not_enought_norio'], "game.php?page=trader", 4);
                     
                  $PlanetRess->SavePlanetToDB();
               }
            } else {



               $template->assign_vars(array(
			   
					'al_back'		=>	$LNG['al_back'],
					'echange_norio'	=> $LNG['echange_norio'],
                  'tr_resource'      => $LNG['tr_resource'],
                  'tr_sell_norio'     => $LNG['tr_sell_norio'],
                  'tr_amount'         => $LNG['tr_amount'],
                  'tr_exchange'      => $LNG['tr_exchange'],   
				  'tr_almacenes'      => $LNG['tr_almacenes'],
                  'tr_quota_exchange'   => $LNG['tr_quota_exchange'],
				  'tr_descr'   		=> $LNG['tr_descr'],
				  'tr_cost_dm_trader'   => sprintf($LNG['tr_cost_dm_trader'], pretty_number(DARKMATTER_FOR_TRADER), $LNG['Darkmatter']),
                  'Metal'            => $LNG['Metal'],
                  'Crystal'         => $LNG['Crystal'],
                  'Deuterium'         => $LNG['Deuterium'],
                  'Norio'             => $LNG['Norio'],
                  'mod_ma_res_a'       => METAL_FOR_NORIO,
                  'mod_ma_res_b'       => SILICIUM_FOR_NORIO,
                  'mod_ma_res_c'       => DETERIUM_FOR_NORIO,
                  'ress'             => $ress,
               ));

               $template->show("mercader/trader_norio.tpl");   
            }
         break;   
      }
   }
   else
   {
      $PlanetRess->CalcResource();
      $PlanetRess->SavePlanetToDB();




      $template->assign_vars(array(

         'tr_cost_dm_trader'         => sprintf($LNG['tr_cost_dm_trader'], pretty_number(DARKMATTER_FOR_TRADER), $LNG['Darkmatter']),
		 'al_back'   => $LNG['al_back'],
         'tr_call_trader_who_buys'   => $LNG['tr_call_trader_who_buys'],
         'tr_call_trader'         => $LNG['tr_call_trader'],
         'tr_exchange_quota'         => $LNG['tr_exchange_quota'],
         'tr_call_trader_submit'      => $LNG['tr_call_trader_submit'],
		 'tr_elemento'   => $LNG['tr_elemento'],
         'Metal'                  => $LNG['Metal'],
         'Crystal'               => $LNG['Crystal'],
         'Deuterium'               => $LNG['Deuterium'],
         'Norio'                   => $LNG['Norio'],
      ));

      $template->show("mercader/trader_overview.tpl");
   }
}
?>