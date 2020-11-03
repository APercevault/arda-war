
{include file="adm/ShowTopnavPage.tpl"}
<center>
<br>
<table width="50%">
    <tr>
                <td>{$info_information}
                        <textarea rows="25">Information sur le serveur: {$info}
						
Versión PHP: {$vPHP}
PHP API: {$vAPI}
SafeMode: {$safemode}
MemoryLimit: {$memory}
Version client MySQL : {$vMySQLc}
Version de MySQL: {$vMySQLs}
Version du jeu: xNova Revolution {$vGame} modifié
URL du jeu: http://{$root}/
Adresse du jeu: http://{$gameroot}/index.php
JSON disponible: {$json}
BCMath disponible: {$bcmath}
cURL disponible: {$curl}
Navigateur: {$browser}

Problèmes depuis l'installation :
Éditeur utilisé  (Notepad++,Etc..):
Capture d'écran:
Détails du problème :
                        </textarea>
                </td>
    </tr>
</table>
</center>
{include file="adm/ShowMenuPage.tpl"}