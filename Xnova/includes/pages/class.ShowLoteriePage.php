<?php


/*	
créé--->class.ShowLoteriePage.php	
créé--->loterie_body.tpl
modifié-->class.template.php
modifié-->class.template.php
modifié-->left_menu.tpl
modifié-->game.php
modifié-->INGAME.php (fr)
modifié-->constants.php
A CREER (ou il y a xxxx mettre à la place le préfixe de la table EX: Game)
   requêtes SQL (dans BDD) (si elle n'existe pas )
CREATE TABLE `xxxx_loterie` (
      `ID` int(11) NOT NULL,
      `user` varchar(255) collate latin1_swedish_ci NOT NULL,
      `tickets` int(5) NOT NULL,
	  `lot` int(5) NOT NULL
   ) ENGINE=MyISAM DEFAULT CHARSET=utf8;
   
   
  
   
ALTER TABLE xxxx_config ADD loterie int (11) NOT NULL ;
ALTER TABLE xxxx_config ADD gagnant varchar(255) NOT NULL ;
ALTER TABLE xxxx_config ADD met varchar(30) NOT NULL ;
ALTER TABLE xxxx_config ADD det varchar(30) NOT NULL ;
ALTER TABLE xxxx_config ADD cri varchar(30) NOT NULL ;
ALTER TABLE xxxx_config ADD nor varchar(30) NOT NULL ;
ALTER TABLE xxxx_config ADD matnoire varchar(30) NOT NULL ;
ALTER TABLE xxxx_config ADD lot_id varchar(5) NOT NULL ;


*/

define('ROOT_PATH', str_replace('\\', '/',dirname(__FILE__)).'/');
 //   include($xnova_root_path . 'includes/common.php');

global $PLANET, $USER, $CONFIG, $db;
    $Tiempo = time();
	$Faltaa =  $db->query ("SELECT loterie FROM ".CONFIG." ",'');
     $Faltab = $db->fetch_array($Faltaa);
	 $Faltac = $Faltab['loterie']-$Tiempo ;
	 $Falta = date(TIMEFORMAT, mktime(0, 0, $Faltac));
    $parse['usuariostime'] = "Il reste ".$Falta." secondes avant la prochaine loterie.";	

    $nombrepla = $db->query ("SELECT count(metal_perhour) as total_plapla FROM ".PLANETS." WHERE `id_owner` = '".$PLANET['id_owner']."' AND `planet_type` = '1' ",'planets'); 
    $nombrepla1 = $db->fetch_array($nombrepla);
	$nombrepla2 = 	$nombrepla1['total_plapla'];	
	
    $permine = $db->query ("SELECT sum(metal_perhour) as total_metal, sum(crystal_perhour) as total_critaux, sum(deuterium_perhour) as total_deutaux, sum(norio_perhour) as total_noriaux FROM ".PLANETS." WHERE `id_owner` = '".$PLANET['id_owner']."' AND `planet_type` = '1' ",'planets'); 
	$permine1 = $db->fetch_array($permine);
	$metaux2 = 	 $permine1['total_metal'] / $nombrepla2;	
    $critaux2 =  $permine1['total_critaux'] / $nombrepla2;
	$deutaux2 =  $permine1['total_deutaux'] / $nombrepla2;
	$noriaux2 =  $permine1['total_noriaux'] / $nombrepla2;

            
 
    $tiempolote = 43200; //temps entre deux loteries (secondes)

    $canxticketm = ceil($metaux2 /4); //prix d'un ticket en métal
    $canxticketc = ceil($critaux2 /4); //prix d'un ticket en cristal
    $canxticketd = ceil($deutaux2 /4); //prix d'un ticket en deutérium
    $canxticketn = ceil($noriaux2 /4); //prix d'un ticket en norium





    $totaltickets  = $db->query ("SELECT sum(tickets) as total_tickets FROM ".LOTO." ",'loterie');
      $CantidadTickets = $db->fetch_array($totaltickets);
	$parse['Cantidad'] = $CantidadTickets['total_tickets'];
	if ($parse['Cantidad']<1){$parse['Cantidad'] = 0;}


    $parse['Cantidadm'] = pretty_number($canxticketm);
    $parse['Cantidadc'] = pretty_number($canxticketc);
    $parse['Cantidadd'] = pretty_number($canxticketd);
    $parse['Cantidadn'] = pretty_number($canxticketn);


    $TusTickets2  = $db->query ("SELECT * FROM ".LOTO." WHERE `user` = '".$USER['username']."' ",'loterie');	
    $TusTicket3 = $db->fetch_array($TusTickets2);
    $TusTickets=$TusTicket3['tickets'];
    $gagnant2 = $db->query ("SELECT gagnant FROM ".CONFIG." ",'config');
	$gagnant3 = $db->fetch_array($gagnant2);
	$gagnant = $gagnant3['gagnant'];
    $met2 = $db->query ("SELECT met, det, cri, nor, matnoire FROM ".CONFIG." ",'config');	
	$met3 = $db->fetch_array($met2);
	$met = $met3['met'];
	$det = $met3['det'];
	$cri = $met3['cri'];
	$nor = $met3['nor'];
	$matnoire = $met3['matnoire'];	
	
    if($TusTickets != NULL) {
    $parse['tustickets'] = $TusTickets;
    }
      else {
    $parse['tustickets'] = 0;
    }
	
	
	
	
    if($_GET['cp'] == "compra" and $parse['tustickets'] < 100) {

	if ($parse['tustickets'] + $_POST['Tickets'] > 100){$_POST['Tickets'] = 100 - $parse['tustickets'];}
    $metal = $_POST['Tickets']*$canxticketm;
    $cristal = $_POST['Tickets']*$canxticketc;
    $Deuterio = $_POST['Tickets']*$canxticketd;
	$norio = $_POST['Tickets']*$canxticketn;
    $complant = $db->query("SELECT * FROM ".PLANETS." WHERE `id` = '".$PLANET['id']."' ",'planets');
    $DatosPlaneta = $db->fetch_array($complant);
    if ($DatosPlaneta['metal'] >= $metal && $DatosPlaneta['crystal'] >= $cristal && $DatosPlaneta['deuterium'] >= $Deuterio && $DatosPlaneta['norio'] >= $norio)
    {	



    $smetal = $DatosPlaneta['metal']-$metal;
    $scristal = $DatosPlaneta['crystal']-$cristal;
    $sdeuterio = $DatosPlaneta['deuterium']-$Deuterio;
	$snorio = $DatosPlaneta['norio']-$norio;
    $db->query("UPDATE ".PLANETS." SET `metal`='".$smetal."', `crystal`='".$scristal."', `deuterium`='".$sdeuterio."', `norio`='".$snorio."' WHERE `id`='".$PLANET['id']."' limit 1", "planets");



    if($TusTickets > 0) {
    $Suma = $TusTickets+$_POST['Tickets'];

    $db->query("UPDATE ".LOTO." SET `tickets`='".$Suma."', `lot`='".$PLANET['id']."' WHERE `user`='{$USER['username']}' limit 1", "loterie");
    } else { $db->query("INSERT INTO ".LOTO." SET `ID`='".$USER['id']."', `user`='".$USER['username']."', `lot`='".$PLANET['id']."', `tickets`='".$_POST['Tickets']."' ", "loterie"); }
    $parse['MensajeCompra'] = "<center><font size='6' color='#00FF40'>{$LNG['lo_achat']}<font  color='#FF0000'>".$_POST['Tickets']."<font size='6' color='#00FF40'>{$LNG['lo_poceder1']}</font>";
    ?> <META HTTP-EQUIV='Refresh' CONTENT="5; URL='game.php?page=loterie'> <?php

                


    } else { $parse['MensajeCompra'] = "<center><font size='5' color='#FF0000'>{$LNG['lo_ressource']}</font>"; 
	?> <META HTTP-EQUIV='Refresh' CONTENT="5; URL='game.php?page=loterie'> <?php
	}				 
    }
	
    $pase['usuarios'] = "Autres joueurs";
 
			$maxtickets = 0 ;
           $usuarios   = $db->query("SELECT * FROM ".LOTO." order by tickets", "loterie");
               while ($listad = $db->fetch_array($usuarios)) {   
             $parse['usuarios'] .= "".$listad['user']." possède : ".$listad['tickets']." tickets<br/>";
			 $maxtickets = $maxtickets + $listad['tickets'];
           
             }
 	if($Faltac <= 0) {	
                 $ganador = $db->query("SELECT * FROM ".LOTO." order by rand()", "loterie");
                $elganador = $db->fetch_array($ganador);
                $ganad_id = $elganador['ID'];      // id user
				$ganad_user = $elganador['user'];  // nom
				$ganad_lot = $elganador['lot'];    // id planète
				$ganad_ticket = $elganador['tickets']; //billet acheté
				
    $nombrepla = $db->query ("SELECT count(id_owner) as plapla FROM ".PLANETS." WHERE `id_owner` = '".$ganad_id."' AND `planet_type` = '1' ");
    $nombrepla1 = $db->fetch_array($nombrepla);
	$nombrepla2 = 	$nombrepla1['plapla'];	
if ($nombrepla2 < 1) {$nombrepla2 = 1 ;}
    $permine = $db->query ("SELECT sum(metal_perhour) as total_metal, sum(crystal_perhour) as total_critaux, sum(deuterium_perhour) as total_deutaux, sum(norio_perhour) as total_noriaux FROM ".PLANETS." WHERE `id_owner` = '".$ganad_id."' AND `planet_type` = '1' ",'planets'); 
	$permine1 = $db->fetch_array($permine);

	$metaux2 = 	 $permine1['total_metal'] / $nombrepla2;	
    $critaux2 =  $permine1['total_critaux'] / $nombrepla2;
	$deutaux2 =  $permine1['total_deutaux'] / $nombrepla2;
	$noriaux2 =  $permine1['total_noriaux'] / $nombrepla2;
	
    $canxticketm = ceil($metaux2 /4); //prix d'un ticket en métal
    $canxticketc = ceil($critaux2 /4); //prix d'un ticket en cristal
    $canxticketd = ceil($deutaux2 /4); //prix d'un ticket en deutérium
	$canxticketn = ceil($noriaux2 /4); //prix d'un ticket en norium


			$maxtickets = 0 ;
           $usuarios   = $db->query("SELECT * FROM ".LOTO." order by tickets", "loterie");
               while ($listad = $db->fetch_array($usuarios)) {   
             $parse['usuarios'] .= "".$listad['user']." possède : ".$listad['tickets']." tickets<br/>";
			 $maxtickets = $maxtickets + $listad['tickets'];	
	 }
	 
       $complant = $db->query("SELECT * FROM ".PLANETS." WHERE `id` = '".$ganad_lot."' limit 1",'planets');
       $DatosPlaneta = $db->fetch_array($complant);
       $emetal = $DatosPlaneta['metal']+($canxticketm*$maxtickets);
       $ecristal = $DatosPlaneta['crystal']+($canxticketc*$maxtickets);
       $edeuterio = $DatosPlaneta['deuterium']+($canxticketd*$maxtickets);
       $enorio = $DatosPlaneta['norio']+($canxticketn*$maxtickets);
	   
	   
       $complant1 = $db->query("SELECT * FROM ".USERS." WHERE `id` = '".$ganad_id."' limit 1",'users');
       $DatosPlaneta1 = $db->fetch_array($complant1);
	   $ematnoire = $DatosPlaneta1['darkmatter'] + $maxtickets;
	 
	   $met = $canxticketm*$maxtickets ;
	   $det = $canxticketd*$maxtickets ;  
	   $cri = $canxticketc*$maxtickets ;
	   $nor = $canxticketn*$maxtickets ;
	   $matnoire = $maxtickets ;

	
            $dando = $db->query("SELECT * FROM ".LOTO." ", "loterie");
                 $Timea    = $_SERVER['REQUEST_TIME'];             
                 $From    = "<font color=\"". $kolor ."\">Loteries</font>";             
                 $Subject = "<font color=\"". $kolor ."\">Résultats de la loterie</font>";   
                 $summery=0;  

               while ($uzer = $db->fetch_array($dando)) {         
             if($ganad_id == $uzer['ID']) { $Message = "<font color='#00ff00'>Félicitations !!!!¡!¡<br>Vous avez le Ticket gagnant de la loterie, <br>Nous espérons vous revoir bientôt !</font>"; }
             else { $Message = "<font color='#FF0000'>Pas de chance!¡!¡<br>Vous n'avez pas acheté le Ticket gagnant, <br>Nous espérons vous revoir bientôt !</font>"; }
                  SendSimpleMessage ( $uzer['ID'], $uzer['ID'], $Timea, 1, $From, $Subject, $Message);
                    }  
					
              $sigueintelore = $tiempolote + $_SERVER['REQUEST_TIME'];
              $db->query("UPDATE ".CONFIG." SET `loterie`='".$sigueintelore."', `gagnant`='".$ganad_user."', `lot_id`='".$ganad_lot."', `met`='".$met."', `det`='".$det."', `cri`='".$cri."', `matnoire`='".$matnoire."', `nor`='".$nor."' ", "config");
			  
      $db->query("UPDATE ".USERS." SET `darkmatter`='".$ematnoire."' WHERE `username` = '".$ganad_user."' limit 1",'');
      $db->query("UPDATE ".PLANETS." SET `metal`='".$emetal."', `crystal`='".$ecristal."', `deuterium`='".$edeuterio."', `norio`='".$enorio."' WHERE `id` = '".$ganad_lot."' limit 1",'planets');  			  
					
					
              $db->query ("DELETE FROM ".LOTO."  ",'loterie');				
			  
			?> <META HTTP-EQUIV='Refresh' CONTENT="0; URL='game.php?page=loterie'> <?php			  
              }

			 	$template	= new template();
	$template->assign_vars(array(
			'lo_loterie' 		=> $LNG['lo_loterie'],
			'lo_besion' 		=> $LNG['lo_besion'],
			'lo_tol_ticket' 		=> $LNG['lo_tol_ticket'],
			'lo_tol_ticket1' 		=> $LNG['lo_tol_ticket1'],
			'lo_prix' 		=> $LNG['lo_prix'],
			'lo_quan_met' 		=> $LNG['lo_quan_met'],
			'lo_quan_cri' 		=> $LNG['lo_quan_cri'],
			'lo_quan_deu' 		=> $LNG['lo_quan_deu'],
			'lo_quan_nor' 		=> $LNG['lo_quan_nor'],
			'lo_ticket0' 		=> $LNG['lo_ticket0'],
			'lo_ticket1' 		=> $LNG['lo_ticket1'],
			'lo_ticket2' 		=> $LNG['lo_ticket2'],
			'lo_acheter' 		=> $LNG['lo_acheter'],
			'lo_acces' 		=> $LNG['lo_acces'],
			'lo_poceder0' 		=> $LNG['lo_poceder0'],
			'lo_poceder1' 		=> $LNG['lo_poceder1'],
			'lo_poceder2' 		=> $LNG['lo_poceder2'],
			'lo_tirage' 		=> $LNG['lo_tirage'],
			'lo_tirage1' 		=> $LNG['lo_tirage1'],
			'lo_gagnant0' 		=> $LNG['lo_gagnant0'],
			'lo_gagnant1' 		=> $LNG['lo_gagnant1'],
			'lo_gag_met' 		=> $LNG['lo_gag_met'],
			'lo_gag_cri' 		=> $LNG['lo_gag_cri'],
			'lo_gag_deu' 		=> $LNG['lo_gag_deu'],
			'lo_gag_nor' 		=> $LNG['lo_gag_nor'],
			'lo_gag_mat' 		=> $LNG['lo_gag_mat'],
			
			
			'met' => $met,
			'det' => $det,
			'cri' => $cri,
			'nor' => $nor,
			'matnoire' => $matnoire,
			'gagnant' => $gagnant,	
			'usuariostime' => $parse['usuariostime'],	
			'MensajeCompra' => $parse['MensajeCompra'],
			'usuarios' => $parse['usuarios'],	
			'tustickets' => $parse['tustickets'],	

			'Cantidad' => $parse['Cantidad'],

			'Cantidadm' => $canxticketm,	
			'Cantidadc' => $canxticketc,
			'Cantidadd' => $canxticketd,	
			'Cantidadn' => $canxticketn,
			
	
			'metal_p' => pretty_number(floattostring($ticket_price_metal)),
			'crystal_p' => pretty_number(floattostring($ticket_price_crystal)),
			'deuterium_p' => pretty_number(floattostring($ticket_price_deuterium)),
			'dm_win'	=> $ticket_prize_dm,
			'secs'		=>$secs,
			'user_lists' => $lista,
			'max_tickets_per_player' => $max_users_tickets,
			'winners'	=> $lista_winners,
			'minimum_users'	=> $CONF['lottery_min'],
	)); 

	   $template->show("styles/templates/loterie/loterie_body.tpl");


    ?>