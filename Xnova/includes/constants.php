<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ |
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

//SET TIMEZONE (si le fuseau horaire du serveur n'est pas correct)
//date_default_timezone_set('Europe/Berlin');
 
//PARAMÈTRES PAR DÉFAUT
define('DEFAULT_THEME'	 		  , 'gultra');

define('PROTOCOL'				  , (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"]  == 'on') ? 'https://' : 'http://');
define('HTTP_ROOT'				  , str_replace(basename($_SERVER["PHP_SELF"]), '', $_SERVER["PHP_SELF"]));

define('DEFAULT_LANG'             , "es"); // For Fatal Errors!
define('PHPEXT'                   , "php");

/////////suppression automatique des joueurs////////
define('SUPAUTOJOUEUR'	  , strtotime("-365 day"));
/////////MARCHAND////////////
			//pack lune
define('COST_LUNE'	  , 1000000);	//prix mat. noire		
			//pack cases
define('COST_CASE'	  , 400000);	//prix mat. noire		
define('NMB_CASE'	  , 20);		//nombre de cases
//TAUX ECHANGE MARCHAND MARCHE NOIR
define('DARKMATTER_FOR_TRADER'	  , 100);
		//Titane
define('SILICIUM_FOR_METAL'		  , 2);
define('DETERIUM_FOR_METAL'		  , 4);
define('NORIO_FOR_METAL'		  , 3);
		//Silicium
define('METAL_FOR_SILICIUM'	 	  , 0.5);
define('DETERIUM_FOR_SILICIUM'	  , 2);
define('NORIO_FOR_SILICIUM'	 	  , 1.5);
		//Deutéride
define('METAL_FOR_DETERIUM'	 	  , 0.25);
define('SILICIUM_FOR_DETERIUM'	  , 0.5);
define('NORIO_FOR_DETERIUM'	 	  , 1.2);
		//Nôrium
define('METAL_FOR_NORIO'	 	  , 0.10);
define('SILICIUM_FOR_NORIO'		  , 2.25);
define('DETERIUM_FOR_NORIO'		  , 2);
		//taxes mines et stockage
define('COST_STOCK'				  , 1.5);
		//Commerçant taxe vaisseau (vente de vos vaisseaux) en %
define('VENTE_TAXE_VAISSEAU'		  , 5);
		//Commerçant taxe vaisseau (achat de nouveau vaisseaux) en %
define('ACHAT_TAXE_VAISSEAU'		  , 100);


/////////FIN  MARCHAND////////////

// UNIVERS, GALAXIES, SYSTEMES ET PLANETES || DEFAUT 9-499-15 RESPECTIVEMENT.
define('MAX_GALAXY_IN_WORLD'      ,   9);	//Galaxies
define('MAX_SYSTEM_IN_GALAXY'     , 499);	//Systèmes
define('MAX_PLANET_IN_SYSTEM'     ,  15);	//Planètes

// FACTEUR DE TAILLE DE LA PLANÈTE
define('PLANET_SIZE_FACTOR'		  , 1.0);

// NOMBRE DE COLONNES POUR LES RAPPORTS D'ESPIONNAGE
define('SPY_REPORT_ROW'           , 2);

// CHAMPS POUR CHAQUE NIVEAU DE LA BASE LUNAIRE
define('FIELDS_BY_MOONBASIS_LEVEL', 5);

// NOMBRES DE CASES POUR CHAQUE NIVEAU DU TERRAFORMEuR
define('FIELDS_BY_TERRAFORMER'	  , 10);

// NOMBRE(NUMÉRO) DE PLANÈTES QUI PEUVENT AVOIR UN ACTEUR(JOUEUR) SANS TECHNO
define('STANDART_PLAYER_PLANETS'  , 1);

// PLANÈTES MAXIMALES (-1 = illimité)
define('MAX_PLANETS'              , 10);

// PLANÈTE SUPPLÉMENTAIRE PRO 2 NIVEAUX TECHNOLOGIQUES
define('PLANETS_PER_TECH' 		  , 1);	

//NOMBRE DE CONSTRUCTIONS QUI PEUVENT ENTRER À LA FILE D'ATTENTE DE CONSTRUCTION(Commandant nécessaire)
define('MAX_BUILDING_QUEUE_SIZE'  , 5);

//NOMBRE DE TECHNOLOGIES QUI PEUVENT ENTRER À LA FILE D'ATTENTE DE RECHERCHE (Commandant nécessaire)
define('MAX_RESEACH_QUEUE_SIZE'  ,3);

// NOMBRE DE VAISSEAUX QUI PEUVENT ÊTRE CONSTRUIT EN UNE FOIS
define('MAX_FLEET_OR_DEFS_PER_ROW', 9999999999); 

// NUMBER OF SHIPS THAT CAN BUILD FOR ONCE
define('MAX_FLEET_OR_DEFS_IN_BUILD', 10);

// PRIX D'UN CLIC SUR GALAXY EN DEUTERIUM
define('DEUTERIUM_PER_GALAXY_CLICK', 10);

// SUPPORT WILDCAST DOMAINS
define('UNIS_WILDCAST'			  , true);

// SUPPORT OWN vars.php / UNIVERSE | NOTE: make a COPY of vars.php and rename it to vars_uni1.php,  vars_uni2.php, etc...
define('UNIS_MULTIVARS'			  , false);

// POURCENTAGE DE RESSOURCES POUVANT ÊTRE STOCKÉES
// 1,0 à 100% - 1,1 pour 110% - 1,3 pour 130% et ainsi de suite
define('MAX_OVERFLOW'             , 1.5);

// La limite de la mission DM (ID: 11)
define('MAX_DM_MISSIONS'		  , 1);

// La faction pour la création de la lune
define('MOON_CHANCE_FACTOR'		  , 1);

// Chance de lune maximale
define('MAX_MOON_CHANCE'		 , 20);

// If ture, the calculation for Researchtime is like OGAME, if false its calculation with standart XNova Formula
define('NEW_RESEARCH'			  , true);

// Université réduction par level - standard 8% (info: 8% = 0.08) (Info: 1 = 100%)
define('UNIVERISTY_RESEARCH_REDUCTION'	, 0.20);

// IF SET true, the derbis will be delete, when a moon is created.
define('DESTROY_DERBIS_MOON_CREATE', true);

// Facteur de stockage de métal / cristal et de deutérium
define('STORAGE_FACTOR'			  , 1.0);

// Quantité maximale de flottes où l'autorisation sur un ACS
define('MAX_FLEETS_PER_ACS'	  	  , 16);

// Combien d'IP Block II sera vérifié
// 1 = (AAA); 2 = (AAA.BBB); 3 = (AAA.BBB.CCC)
define('COMPARE_IP_BLOCKS'	  	  , 2);

// DEBUG LOG
define('DEBUG_EXTRA'	  	 	 , false);

// RESSOURCE INITIALE DES PLANÈTES
define('BUILD_METAL'              , 1500);
define('BUILD_CRISTAL'            , 1500);
define('BUILD_DEUTERIUM'          , 1500);
define('BUILD_NORIO'      		  , 1500);
// RESOURCE INITIAL EN MATIERE NOIRE (DARKMATTER)
define('BUILD_DARKMATTER'         , 200000);

// RESSOURCE INITIALE DU NOUVEAU JOUEUR (2ème const. Pour les utilisateurs de Facebook)
define('BUILD_FB_DARKMATTER'      , 0);

// Missions invisibles pour la phalange
// Exsample: '1','4','7','10'
define('INV_PHALANX_MISSIONS' 	  , '');
	

// Max Round sur les Combats
define('MAX_ATTACK_ROUNDS'		  , 6);

// Temps Minimum mode Vacance en Secondes!
define('VACATION_MIN_TIME'		  , 259200);	

// Activer la Simulation en un clic sur Spy-Raports
define('ENABLE_SIMULATOR_LINK'    , true);

//Temps Maximum Session d'Utilisateur en Secondes
define('SESSION_LIFETIME'		  , 43200);

// Format date, heure, ....etc
define('TIMEFORMAT'				  , 'H:i:s');
define('DATEFORMAT'				  , 'd. M Y');
define('TDFORMAT'				  , 'd. M Y, H:i:s');

// INFOS DE RENONCIATION
define('DICLAMER_NAME'            , "Edit constans.php!");
define('DICLAMER_ADRESS1'         , "Edit constans.php!");
define('DICLAMER_ADRESS2'         , "Edit constans.php!");
define('DICLAMER_TEL'     		  , "Edit constans.php!");
define('DICLAMER_EMAIL'    		  , "Edit constans.php!");

// Super porte des oris
define('JUMPGATE_WAIT_TIME', 3600); // temps entre deux sauts (en secondes).
define('JUMPGATE_REDUCTION_PER_LEVEL', 600); // Temps de réduction entre deux sauts par niveau du Saut Quantique(en secondes).
define('JUMPGATE_MAX_REDUCTION', 1200); // Temps maximal à réduire.

// UTF-8 Support for Names 
define('UTF8_SUPPORT'          	  , true);	

// Root IDs
define('ROOT_UNI'        	  	  , 1);
define('ROOT_USER'          	  , 1);

// AdminAuthlevels
define('AUTH_ADM'                 , 3);
define('AUTH_OPS'                 , 2);
define('AUTH_MOD'                 , 1);
define('AUTH_USR'                 , 0);

// Data Tabells
define('DB_NAME'				  , $database["databasename"]);
define('DB_PREFIX'			  	  , $database["tableprefix"]);

define('LOTO'				  	  , $database["tableprefix"]."loterie");

define('AKS'				  	  , $database["tableprefix"]."aks");
define('ALLIANCE'			  	  , $database["tableprefix"]."alliance");
define('BANNED'				  	  , $database["tableprefix"]."banned");
define('BUDDY'				  	  , $database["tableprefix"]."buddy");
define('CHAT'				  	  , $database["tableprefix"]."chat");
define('CONFIG'				  	  , $database["tableprefix"]."config");
define('DIPLO'				  	  , $database["tableprefix"]."diplo");
define('FLEETS'				  	  , $database["tableprefix"]."fleets");
define('FLEETTRADES'    		  , $database["tableprefix"]."fleettrades");
define('NEWS'				  	  , $database["tableprefix"]."news");
define('NOTES'				  	  , $database["tableprefix"]."notes");
define('MESSAGES'			  	  , $database["tableprefix"]."messages");
define('PLANETS'	              , $database["tableprefix"]."planets");
define('RW'			              , $database["tableprefix"]."rw");
define('SESSION'				  , $database["tableprefix"]."session");
define('STATPOINTS'				  , $database["tableprefix"]."statpoints");
define('SUPP'					  , $database["tableprefix"]."supp");
define('TOPKB'					  , $database["tableprefix"]."topkb");
define('USERS'				  	  , $database["tableprefix"]."users");
define('USERS_VALID'		  	  , $database["tableprefix"]."users_valid");

// Constantes AVATAR joueur,alliance (image par défaut)
define('joueur_avatar', str_replace(basename($_SERVER["PHP_SELF"]), '', $_SERVER["PHP_SELF"]).'/styles/images/grade/10.png');
define('alliance_avatar', str_replace(basename($_SERVER["PHP_SELF"]), '', $_SERVER["PHP_SELF"]).'/styles/images/grade/10.png');

// Constantes logo alliance
define('TARGET', ROOT_PATH.'/styles/logo/');    // Repertoire cible
define('TARGET1', str_replace(basename($_SERVER["PHP_SELF"]), '', $_SERVER["PHP_SELF"]).'/styles/logo/');    // Repertoire cible
define('MAX_SIZE', 300000);    // Taille max en octets du fichier
define('WIDTH_MAX', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 800);    // Hauteur max de l'image en pixels
 
// Constantes avatar
define('TURGET', ROOT_PATH.'/styles/avatar/');    // Repertoire cible
define('TURGET1', str_replace(basename($_SERVER["PHP_SELF"]), '', $_SERVER["PHP_SELF"]).'/styles/avatar/');    // Repertoire cible
define('MAX_SIZE1', 300000);    // Taille max en octets du fichier
define('WIDTH_MAX1', 800);    // Largeur max de l'image en pixels
define('HEIGHT_MAX1', 800);    // Hauteur max de l'image en pixels 

//constantes VSL
define('VSL_PRIX'	 		  , 1000);
define('VSL_MINI', 345600);    // temps minimum en seconde
define('VSL_MAX', 604800);    //  temps maximum en seconde

?>