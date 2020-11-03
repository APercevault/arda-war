<?php

//general
$LNG['index']				= 'Accueil';
$LNG['register']			= 'S\'enregistrer';
$LNG['forum']				= 'Forum';
$LNG['send']				= 'Soumettre';
$LNG['menu_index']			= 'Page d\'Accueil'; 	 
$LNG['menu_news']			= 'News';	 
$LNG['menu_rules']			= 'R&egrave;gles'; 
$LNG['menu_agb']			= 'Termes et Conditions'; 
$LNG['menu_pranger']		= 'Bannis';
$LNG['menu_top100']			= 'Hall of Fame';	 
$LNG['menu_disclamer']		= 'Contacter un administrateur';	  
$LNG['uni_closed']			= '(offline)';
	 
/* ------------------------------------------------------------------------------------------ */

$LNG['music_off']			= 'Music: OFF';
$LNG['music_on']			= 'Music: ON';


//index.php
//case lostpassword
$LNG['mail_not_exist'] 		    = 'L\'adresse de courrier &eacute;lectronique n\'existe pas.';
$LNG['mail_title']				= 'Le nouveau mot de passe';
$LNG['mail_text']				= 'Le nouveau mot de passe est : ';
$LNG['mail_sended_fail']		= 'L\'e-mail n\'a pas pu Ãªtre envoy&eacute;.';
$LNG['mail_sended']				= 'Votre mot de passe a &eacute;t&eacute; envoy&eacute; avec succ&egrave;s!';
$LNG['lost_empty']			= 'Vous devez remplir tous les champs!';
$LNG['lost_not_exists']		= 'Aucun utilisateur ne peut être trouv&eacute;e dans le cadre de cette adresse mail!';
$LNG['lost_mail_title']		= 'Nouveau mot de passe';
$LNG['server_infos']			= array(
	"Un jeu de strat&eacute;gie spatiale en temps r&eacute;el.",
    "Jouer avec des centaines d'utilisateurs.",
    "Pas de t&eacute;l&eacute;chargement, il faudra UNIQUEMENT d'un navigateur internet standard.",
    "Inscription gratuite",
);

//case default
$LNG['login_error_1']			= 'Nom d\'utilisateur / mot de passe incorrect !';
$LNG['login_error_2']			= 'Quelqu\'un s\'est connecte; depuis un autre PC dans votre compte!';
$LNG['login_error_3']			= 'Votre session a expir&eacute;!';
$LNG['screenshots']				= 'Captures d\'&eacute;cran';
$LNG['universe']				= 'Univers';
$LNG['chose_a_uni']				= 'Choisissez un univers';
$LNG['universe']				= 'Univers';
$LNG['chose_a_uni']				= 'Choisissez un univers';

/* ------------------------------------------------------------------------------------------ */

//lostpassword.tpl
$LNG['lost_pass_title']			= 'R&eacute;cup&eacute;rer mot de passe';
$LNG['retrieve_pass']			= 'Restore';
$LNG['email']					= 'Adresse E-mail';

//index_body.tpl
$LNG['user']					= 'Pseudo';
$LNG['pass']					= 'Mot de passe';
$LNG['remember_pass']			= 'Connection automatique';
$LNG['lostpassword']			= 'Mot de passe oubli&eacute;?';
$LNG['welcome_to']				= 'Bienvenue &agrave;';
$LNG['server_description']		= '<strong>%s</strong> est un jeu de strat&eacute;gie spatial et terrestre  avec des joueurs qui essayent simultan&eacute;ment d\Ãªtre les meilleurs . Tout ce que vous devez avoir pour jouer est un navigateur Internet standard (FireFox recommand&eacute). Enti&egrave;rement gratuit SANS ALLOPASS';
$LNG['server_register']			= 'S\'il vous pla&icirc;t inscrivez-vous maintenant!';
$LNG['server_message']			= 'Inscrivez-vous et une nouvelle exp&eacute;rience passionnante vous attend dans le monde du';
$LNG['login']					= 'Login';
$LNG['disclamer']				= 'Contacter un administrateur';
$LNG['login_info']				= 'En me connectant j\'accepte les <a onclick="ajax(\'?page=rules&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">RÃ¨gles</a> et le <a onclick="ajax(\'?page=agb&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">Termes et Conditions</a>';

/* ------------------------------------------------------------------------------------------ */

///reg.php - Registrierung
$LNG['register_closed']				= 'Les inscriptions sont closes!';
$LNG['register_at']					= 'Inscrit &agrave; ';
$LNG['reg_mail_message_pass']		= 'Un pas de plus pour activer votre nom d\'utilisateur';
$LNG['reg_mail_reg_done']			= 'Bienvenue &agrave; %s!';
$LNG['invalid_mail_adress']			= 'Adresse e-mail invalide!<br>';
$LNG['empty_user_field']			= "S'il vous plaît remplissez tous les champs!<br>";

$LNG['password_lenght_error']		= "Le mot de passe doit être au minimum de 4 caractères de long!<br>";
$LNG['password1_lenght_error']		= 'Le mot de passe ne doit pas dépasser les 15 caractères de long!<br>';
$LNG['user_field_no_alphanumeric']	= 'S\'il vous pla&icirc;t entrez votre pseudo avec des caract&egrave;res alphanum&eacute;riques UNIQUEMENT!<br>';
$LNG['user_field_no_space']			= "Le champs PSEUDO est de 4 caractères mini et de 15 caractères maxi!<br>";
$LNG['planet_field_no']				= 'Vous devez entrer un nom de planète!';
$LNG['planet_field_no_alphanumeric']= 'S\'il vous pla&icirc;t entrez le nom de la plan&egrave;te avec des caract&egrave;res alphanum&eacute;riques UNIQUEMENT!<br>';
$LNG['planet_field_no_space']		= "Le champs NOM PLANETE est de 4 caractères mini et de 15 caractères maxi!<br>";
$LNG['terms_and_conditions']		= "Vous devez accepter <a href=index.php?page=agb>Termes et Conditions </a> et <a href=index.php?page=rules>Rules</a> s'il vous plaît!<br>";
$LNG['user_already_exists']			= 'Le nom d\'utilisateur est d&eacute;j&agrave; pris!<br>';
$LNG['mail_already_exists']			= 'L\'adresse e-mail est d&eacute;j&agrave; utilis&eacute;e!<br>';
$LNG['wrong_captcha']				= 'Code de s&eacute;curit&eacute; est incorrect!<br>';
$LNG['different_passwords']			= 'Vous avez indiqu&eacute; 2 mots de passe diff&eacute;rents!<br>';
$LNG['different_mails']				= 'Vous avez indiqu&eacute; 2 adresses e-mail diff&eacute;rentes!<br>';
$LNG['welcome_message_from']		= 'Administrateur';
$LNG['welcome_message_sender']		= 'Administrateur';
$LNG['welcome_message_subject']		= 'Bienvenue';
$LNG['welcome_message_content']		= 'Bienvenue &agrave; %s!<br>Premi&egrave;re construire une &eacute;nergie solaire, parce que l\'&eacute;nergie est n&eacute;cessaire pour la production ult&eacute;rieure de mati&egrave;res premi&egrave;res. Pour la construire, faites un clic gauche dans le menu Â«bÃ¢timentÂ». Puis la construction du bÃ¢timent 4e &agrave; partir de la partie sup&eacute;rieure. L&agrave;, vous avez l\'&eacute;nergie, vous pouvez commencer &agrave; construire des mines. Retour au menu sur le bÃ¢timent et construire une mine de m&eacute;taux, puis &agrave; nouveau une mine de cristal. Afin d\'Ãªtre en mesure de construire des navires dont vous avez besoin d\'avoir d\'abord construit un chantier naval. Ce qui est n&eacute;cessaire pour que vous trouvez dans la technologie menu de gauche. L\'&eacute;quipe vous souhaite beaucoup de plaisir &agrave; explorer l\'univers!';
$LNG['newpass_smtp_email_error']	= '<br><br>Une erreur s\'est produite. Votre mot de passe est: ';
$LNG['reg_completed']				= "Toute léquipe vous remercie de votre inscription!<br /> Vous recevrez un email avec un lien d'activation.";
$LNG['planet_already_exists']		= 'La position de la plan&egrave;te est d&eacute;j&agrave; occup&eacute;e! <br>';


//registry_form.tpl
$LNG['server_message_reg']			= 'Inscrivez-vous d&egrave;s maintenant et faire partie de';
$LNG['register_at_reg']				= 'Inscrit &agrave;';
$LNG['uni_reg']						= 'Univers';
$LNG['user_reg']					= "Pseudo (4-15 caractères)";
$LNG['pass_reg']					= "Mot de passe (4-15 caractères)";
$LNG['pass2_reg']					= 'Confirmation mot de passe';
$LNG['email_reg']					= 'Adresse e-mail ';
$LNG['email2_reg']					= 'Confirmation adresse e-mail';
$LNG['planet_reg']					= "Nom planète mère (4-15 caractères)";
$LNG['ref_reg']						= 'Référé par';
$LNG['lang_reg']					= 'Langue';
$LNG['raza_reg']                                        = 'Raza';
$LNG['raza_0']                                  = 'Gultra';
$LNG['raza_1']                                   = 'Voltra';
$LNG['register_now']				= ' S\'inscrire ';
$LNG['captcha_reg']					= 'Question de s&eacute;curit&eacute;';
$LNG['accept_terms_and_conditions']	= 'J\'accepte les <a onclick="ajax(\'?page=rules&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">R&egrave;gles</a> et <a onclick="ajax(\'?page=agb&amp;\'+\'getajax=1&amp;\'+\'lang=%1$s\');" style="cursor:pointer;">Termes et Conditions</a>';
$LNG['captcha_reload']				= 'Rechargement';
$LNG['captcha_help']				= 'Aide';
$LNG['captcha_get_image']			= 'Charge Bild-CAPTCHA';
$LNG['captcha_reload']				= 'Nouveau CAPTCHA';
$LNG['captcha_get_audio']			= 'Chargement Son-CAPTCHA';
$LNG['user_active']                	= 'Utilisateur %s a &eacute;t&eacute; activ&eacute;!';

//registry_closed.tpl
$LNG['info']						= 'Information';
$LNG['reg_closed']					= 'Les inscriptions sont closes';

//Rules
$LNG['rules_overview']				= "R&egrave;gles";
$LNG['rules']						= array(
	"Comptes (sauf avis contraire)"					=> "Chaque joueur a le droit de contrôler un seul compte par univers. Chaque compte doit être joué par un seul joueur à la fois. <br><br>

- Tout joueur ayant plusieurs comptes sur un univers verra tous ses comptes bloqués. <br><br>
- Si plusieurs joueurs jouent sur la même IP. Ceux-ci doivent impérativement contacter l'administrateur afin d'expliquer pourquoi il y a un partage d'IP. Si jamais le propriétaire ne déclare pas son partage d'IP, il sera sanctionné. <br><br>
- Un joueur reprenant le compte d'un autre joueur et n'ayant pas encore trouvé de repreneur pour son ancien compte, celui doit impérativement mettre son compte en mode vacances jusqu'a ce qu'il ait trouvé un repreneur. Il est préférable cependant de contacter un administrateur pour faire l'échange afin d'éviter les vols de comptes.",


	"Pushing"					=> "Il n'est pas autorisé d'obtenir le bénéfice déloyal d'un compte plus bas classé que soi. Ceci inclut :
<br><br>
- Ressources envoyées d'un compte plus bas classé à plus haut classé avec aucune contrepartie en retour. <br><br>
- Si un joueur plus faible que vous vous envoie des ressources sans que vous ne lui ayez rien demandé, veuillez lui renvoyer ou l'envoyer à un des opérateurs de jeu. Vous ne pouvez pas garder ces ressources !<br><br>
- L'échanges de ressources doivent être exécutés sous 48 heures.<br><br>
- Le taux de change maximum autorisé est de 3.5 contre 1 entre les ressources (3.5/1). Ceci veut dire que l'on peut échanger 3.5 iridium contre 1 onyx, 3.5 onyx contre 1 tritium, ou 3.5 iridium contre 1 tritium mais pas dans le sens inverse. Seuls les échanges tombant dans le champ d'application des règles du pull peuvent dépasser ce taux maximum! Notez également que le taux minimum accepté, pour que cela ne soit pas considéré comme du push, est de : 1/1/1. ",

	"Bashing"					=> "Il n'est pas autorisé d'attaquer n'importe quelle planète donnée ou lune appartenant à un joueur plus de 4 fois dans une période de 24 heures. Cependant vous pouvez attaquer 4 fois simultamement. <br><br>
- Les attaques contre une lune en mode destruction comptent dans le bash.<br><br>
- Les flottes attaquantes complètement détruites au cours du combat ne comptent pas pour une attaque. <br><br>
- Si votre Alliance est en guerre avec une autre Alliance. La guerre doit être annoncée au forum et les deux leaders doivent être d'accord avec les termes.<br><br>
- La guerre commence seulement 12 heures après la déclaration sur le forum guerre pour que le bash soit levé. ",

	
	"Bugusing"					=> "L'utilisation d'un bug dans un but lucratif est strictement interdit. Si vous trouvez un bug il est impératif d'avertir un administrateur, sous peine de sanctions. ",


	"Les menaces"	=> "Les menaces, insultes et autres sont absolument interdites (sanctions).",

	"Spam"			=> "N'importe quelle intention de saturer une interface de joueurs par n'importe quelle méthode sera sanctionnée. Ceci inclut, mais n'est pas limité à:<br><br>
- Spam de Messages Personnel<br><br>
- Spam de sondes <br><br>
- etc",

  "Pull"                    => "Si un joueur est plus faible que vous, vous avez le droit de lui donner des ressources sans contrepartie.",
  " Sitting"                    => "Le sitting de compte est lié au respect des règles suivantes :<br><br>
- Un compte ne peut être sitté que pour 48 heures consécutives.<br><br>
- Un opérateur de l'univers doit impérativement être informé par mail de ce sitting.<br><br>
- Lorsque le compte est sitté, le surveillant a le droit d'activer des constructions de bâtiments ou de lancer des recherches avec les ressources présentes sur la planète.<br><br>
- Un compte ne peut être sitté qu'après une existence de 14 jours.<br><br>
- Seules les missions de transport ou de stationnement sont autorisées.<br><br>
- Pendant le sitting, seul le sitteur est autorisé à ce connecter. ",  

);


$LNG['rules_info2']				= "Pour compléter ce reglement, prenez connaissance des Termes et Conditions que vous devez respecter !</font>";


//AGB

$LNG['agb_overview']				= "Termes et Conditions";
$LNG['agb']						= array(
	"Contenu Service"				=> array( 
		" La reconnaissance des règles sont des conditions préalables nécessaires pour être en mesure de participer au jeu. Elles s'appliquent à toutes les offres de la part du fournisseur, y compris le Forum et d'autres contenu du jeu.",
		
		" Le service est gratuit. Ainsi, il n'y a pas de revendications possibles quand à la disponibilité ou à la fonctionnalité du service fourni. En aucuns cas nous ne sommes responsables de l'endommagement quelconque relié à la communication envers ou provenant de sites web. En outre, le joueur n'a aucune possibilité de demander la restauration de son compte.",
	),

	"Adhésion"				=> array(
		" En vous connectant au jeu ou en étant membre du Forum vous débutez votre Adhésion.",
		
		"La supression de votre compte peut être mise en oeuvre en envoyant une lettre à un administrateur. Pour des raisons techniques l'effacement des données ne peut être fait immédiatement.",
		
		" L'administrateur se réserve le droit de supprimer les comptes. La décision de supprimer un compte est uniquement et exclusivement à l'administrateur. Toute réclamation légale pour l'adhésion est exclue.",
		
		"Tous les droits restent à l'administrateur.",
	),

	"Le Contenu et Responsabilité"	=> "les utilisateurs sont responsables du contenu des communications dans le jeu ou dans le forum. Les contenus : Pornographique, raciste, injurieux, contraire à la loi applicable reste en dehors de la responsabilité de l'hébergeur. Les infractions peuvent mener au banissement définitif d'un compte.",

	" Procédés interdits"			=> array(
		"L'utilisateur n'est pas autorisé à modifier le matériel, logiciel ou code des mécanismes associés au site web, ou tout agissement pouvant interférer avec le fonctionnement du jeu. L'utilisateur ne peut pas diminué la capacité technique par quelconques moyens. L'utilisateur n'est pas autorisé à manipuler le contenu généré par l'hébergeur ou interférer en aucune façon avec le jeu.
",
		
		"Tout type de robot, script ou autres fonctions automatisées sont interdites. Le jeu peut être joué uniquement dans le navigateur. Même ses fonctions ne doivent pas être utilisés pour obtenir un avantage dans le jeu.",
		
	
	),

	" Restrictions sur l'utilisation"		=> array(
		"Un joueur ne peut utiliser qu'un compte par univers, les multis comptes ne sont pas autorisés et seront supprimés sans avertissement (Sauf avis contraire).",
		
		" La fermeture d'un compte peut être effectuée en permanence à la décision de l'hébergeur. De même, la fermeture peut s'étendre à un ou tous les univers du jeux. La décision de la suspension d'un compte sera prise seulement par l'hébergeur, administrateur, ou un opérateur. le temps de la suspension du compte sera défini au cas par cas.",
		
	),

	"Vie Privée"					=> array(
		"L'opérateur se réserve le droit de stocker les données des joueurs afin de controler le respect des règles, suite aux conditions d'utilisation et aux lois applicables. Cela inclus toutes les données présentées par le joueur ou ses informations de compte. Les adresses IP sont associées avec des périodes dutilisation et de consommation, l'adresse e-mail donnée lors de l'inscription et d'autres données. Dans le forum, les données du profil sont stockées également.",
		
		"Ces données seront publiées dans certaines circonstances aux autorités ou aux personnes autorisées. En outre, les données peuvent (le cas échéant) être remises dans certaines circonstances, à des tiers.",
		
		"L'utilisateur peut s'opposer à l'enregistrement de données personnelles à tout moment. En envoyant un email pour résiliation.",
	),

	"Droits de l'exploitant des comptes"	=> array(
		"Tous les comptes et tous les objets virtuels restent en la possession et la propriété de l'hébergeur. Le joueur n'a pas la propriété et d'autres droits sur son compte. Tous les droits restent à l'hébergeur.",
		
		"La vente, l'utilisation, la copie, la distribution, reproduction ou autres violations des droits de l'hébergeur seront signalées aux autorités et poursuivis.",
	),

	"Responsabilité"	=> "L'hébergeur n'est pas responsable des dommages possibles. Il est expressément souligné que les jeux vidéo peuvent présenter des risques importants pour la santé. Les dommages ne sont pas sous la responsabilité de l'hébergeur. ",

	"Modifications apportées aux Conditions"	=> "L'administrateur se réserve le droit de modifier les termes et les règles à tout moment.",
);

//Facebook Connect

$LNG['fb_perm']                	= 'Accèc interdit. %s besoins de tous les droits afin que vous puissiez vous connecter avec votre compte Facebook. \n Alternativement, vous pouvez vous connecter sans compte Facebook!';

//NEWS

$LNG['news_overview']			= "News";
$LNG['news_from']				= "Sur %s par %s";
$LNG['news_does_not_exist']		= "Pas de News disponibles!";

//Impressum

$LNG['disclamer']				= "Disclaimer";
$LNG['disclamer_name']			= "Pseudo";
$LNG['disclamer_adress']		= "Adresse";
$LNG['disclamer_tel']			= "Téléphone:";
$LNG['disclamer_email']			= "Adresse E-mail";

// Traduction Française by Scofield06 - All rights reserved (C) 2011

?>