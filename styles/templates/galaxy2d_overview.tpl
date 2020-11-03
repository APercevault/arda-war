<html>
  <head>
    <link rel="stylesheet" href="styles/planetes.css">
  </head>
  <body>
  </body>
<html>

{if $confirm == 0}
<body id="imgfond">
{/if}
{include file="overall_header.tpl"}

<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
<div id="topnav" class="header_normal"> 	
		{include file="overall_topnav.tpl"}	
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$lm_galaxy1} ---> {$gl_solar_system} {$galaxy}:{$system}</div>
			</div>
        </div>
	</div>
	
	

{if $confirm == 4}

{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">

<div id="eins_small">
        <div>	

  <div id="contenidoMostrado">                             
<div id="elCosoxD">
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/vaisseauVSL.jpg);"></div>
<div id="titulo_alternativo">
    <ul class="tabsbelow">
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
 <table width="95%">
<tr>
<td width="130">



<td><input colspan"2" type="button" onClick="window.location='game.php?page=galaxy2d&mode=5'" name="button" value="  CONFIRMER le deplacement VSL du vaisseau  " </td>
<td><input colspan"2" type="button" onClick="window.location='game.php?page=galaxy2d'" name="button" value="  ANNULER le deplacement VSL du vaisseau  " </td>


</table>
 </div>
 </div>
<div class="new_footer"></div>	

{elseif $confirm == 5}
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="cabezza" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2.png);"></div>
<div id="eins_small">
        <div>	

  <div id="contenidoMostrado">                             
<div id="elCosoxD">
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/vaisseauVSLsort.jpg);"></div>
<div id="titulo_alternativo">
    <ul class="tabsbelow">
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
 <table width="95%">
<tr>
<td width="130">




<td><input type="button" onClick="window.location='game.php?page=galaxy2d&mode=10'" name="button" value="Votre Vaisseau arrive a destination . Prochain saut entre 4 a 7 jours , Appuyer ICI " </td>


</table>
 </div>
 </div>
<div class="new_footer"></div>	

{else}	
	
	
	
<div id="mainWrapper">
 <div id="galaxyWrapper">   
<div id="galaxyMenu">
        <div id="galaxyBreadcrumb">
        <span id="breadCrumb-c1"><font size = 4 color = #00FF00>{$gl_galaxy}</font></span>
        <a href="javascript:void(0);" onclick=""><font size = 4 color = #FFFF00>{$galaxy}</a>
        <span id="breadCrumb-c2"><font size = 4 color = #00FF00>{$gl_solar_system}</font></span>
        <a href="javascript:void(0);" onclick="" id="breadCrumb-c1"><font size = 4 color = #FFFF00>{$system}</font></a>
                      
        </div>
			<tr>
			      <td><center>	
				  <form action="" method="post" >
				  <input type="button"  class="submitb" name="game.php?page=overview" value="{$gl_changer_vue}" onclick="self.location.href='game.php?page=galaxie&mode=7'" onclick>
				  </form>
				  </td>

            </tr>	
			
        <div id="galaxySearch">
            <div class="group galaxy">
        <form action="?page=galaxy2d&mode=1" method="post" id="galaxy_form">
        <input type="hidden" id="auto" value="dr">
                <a href="javascript:void(0);" onclick="galaxy_submit('galaxyRight')" class="scrollUp"></a>
              <input type="text" name="galaxy" id="c1" size="2" maxlength="1" style="color:#FFFF00;" value="{$galaxy}" onkeypress="galaxy_submit"/>
                <a href="javascript:void(0);" onclick="galaxy_submit('galaxyLeft')" class="scrollDown"></a>
            </div>
            <div class="group solarSystem">
                <a href="javascript:void(0);" onclick="galaxy_submit('systemRight')" class="scrollUp"></a>
              <input type="text" name="system" id="c2" size="2"  maxlength="3" style="color:#FFFF00;" value="{$system}" onkeypress="galaxy_submit"/>
                <a href="javascript:void(0);" onclick="galaxy_submit('systemLeft')" class="scrollDown"></a>
            </div>
            
            <input type="submit" value="{$gl_show}"  class="search"></form>
  </div>
        <ul id="galaxyAdditional">
		                    <li><a href="/game.php?page=overview">{$gl_out_retour}</a></li>
{if !CheckModule(30)}							
                        	<li><a href="javascript:void(0);" onclick="document.location = '?page=fleet&galaxy={$galaxy}&system={$system}&planet={$expedition + 1}&planettype=1&target_mission=15'">{$gl_out_space}</a></li>
{/if}
{if !CheckModule(55)}							
							<li><a href="javascript:void(0);" onclick="document.location = '?page=etoile&galaxy={$galaxy}&system={$system}&planet={$expedition + 1}&planettype=1&target_mission=15'">{$gl_out_space1}</a></li>
{/if}							
                </ul>
    </div>
    {if $mode == 2}
    <form action="?page=missiles&galaxy2d={$galaxy}&system={$system}&planet={$planet}" method="POST">
	<tr>
		<table class="table569">
			<tr>
				<th colspan="2">{$gl_missil_launch} [{$galaxy}:{$system}:{$planet}]</th>
			</tr>
			<tr>

				<td>{$missile_count} <input type="text" name="SendMI" size="2" maxlength="7"></td>
				<td>{$gl_objective}: 
                	{html_options name=Target options=$MissleSelector}
                </td>
			</tr>
			<tr>
				<th colspan="2" style="text-align:center;"><input type="submit" name="aktion" value="{$gl_missil_launch_action}"></th>
			</tr>
		</table>
	</form>{/if}
  
       
		<div id={$galaxyPlanets}>
        
<div class="sun"><a class="tooltip" name="<table style='width:100px'><tr><th>{$gl_solar_system} {$galaxy}:{$system}</th></tr>
<tr><td style='width:80'>{$planetcount}</td></tr>
</table>"><img src="styles/theme/{$Raza_skin}/planis/sun.png" onmouseover="({$planetcount})" onmouseout="hidePlayerInfo();" style="cursor: pointer;height="90" width="90"></a></div>
	
   
    {foreach name=galaxy key=planet item=GalaxyRow from=$GalaxyRows}

 
     
 <div class="planet{$planet}" > 
 
{if ($GalaxyRow.des)}
<a class="tooltip_sticky" name="<table style='width:320px'><tr><th colspan='2'>{$planet_destroyed} [{$galaxy}:{$system}:{$planet}]</th></tr>   
{/if} 
{if (empty($GalaxyRow) && $planet_type == 1) && (!$GalaxyRow.des)}
<a class="tooltip_sticky" name="<table style='width:320px'><tr><th colspan='2'>{$gl_pos1}{$planet}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$inavitado1} [{$galaxy}:{$system}:{$planet}]</th></tr>
{else}
<a class="tooltip_sticky" name="<table style='width:420px'><tr><th colspan='2'>{$gl_pos1}{$planet}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$gl_planet} {$GalaxyRow.planet.name} [{$galaxy}:{$system}:{$planet}]</th></tr>
{/if}
<tr><td style='width:80'><img src='styles/theme/{$Raza_skin}/planeten/small/s_{$GalaxyRow.planet.image}.jpg' height='75' width='75'></td><td>




{if (empty($GalaxyRow) && $planet_type == 1) && (!$GalaxyRow.des)}
<a
 href='?page=fleet&galaxy={$galaxy}&system={$system}&planet={$planet}&planettype=1&target_mission=7' >Coloniser
</a>
{/if}
{if (empty($GalaxyRow) && $planet_depla == 0 && $planet_type == 1) && (!$GalaxyRow.des)}
{if $VSLbon == 1}
<br /><br />
<a
href='?page=galaxy2d&mode=4&galaxy={$galaxy}&system={$system}&planet={$planet}&lune={$lune}'>{$inavitado}{$name_vaisseau} 
</a>
{/if}
{/if}




	{if ($GalaxyRow.planet.spionage) && (!$GalaxyRow.des)}
	<br />
	<a href='javascript:doit(6,{$galaxy},{$system},{$planet},1,{$spio_anz});'>{$GalaxyRow.planet.spionage} ( Spatial )</a>
	<br />
	{/if}	
	{if ($GalaxyRow.planet.phalax) && (!$GalaxyRow.des)}
	<a href='javascript:OpenPopup(&quot;?page=phalanx&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&quot;, &quot;&quot;, 640, 510);'>{$GalaxyRow.planet.phalax}</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.attack) && (!$GalaxyRow.des)}
	<a href='?page=fleet&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=1'>{$GalaxyRow.planet.attack} ( Spatial )</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.stayally) && (!$GalaxyRow.des)}
	<a href='?page=fleet&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=5'>{$GalaxyRow.planet.stayally} ( Spatial )</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.stay) && (!$GalaxyRow.des)}<a href='?page=fleet&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=4'>{$GalaxyRow.planet.stay} ( Spatial )</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.transport) && (!$GalaxyRow.des)}
	<a href='?page=fleet&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=3'>{$GalaxyRow.planet.transport} ( Spatial )</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.missile) && (!$GalaxyRow.des)}<a href='?page=galaxy&amp;mode=2&amp;galaxy={$galaxy}&amp;system={$system}&amp;gl_cp={$planet}'>{$GalaxyRow.planet.missile}</a>
	<br />
	{/if}
	
<br />	
	
	{if ($GalaxyRow.planet.spionage_pe) && (!$GalaxyRow.des)}
	<br />
	<a zhref='javascript:doitetoile(6,{$galaxy},{$system},{$planet},1,{$spio_anz});'>{$GalaxyRow.planet.spionage_pe} (UAV)</a>
	<br />
	{/if}	
	{if ($GalaxyRow.planet.attack_pe) && (!$GalaxyRow.des)}
	<a href='?page=etoile&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=1'>{$GalaxyRow.planet.attack_pe}</a>
	<br />
	{/if}

	{if ($GalaxyRow.planet.stay_pe) && (!$GalaxyRow.des)}
	<a href='?page=etoile&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=4'>{$GalaxyRow.planet.stay_pe}</a>
	<br />
	{/if}
	{if ($GalaxyRow.planet.transport_pe) && (!$GalaxyRow.des)}
	<a href='?page=etoile&amp;galaxy={$galaxy}&amp;system={$system}&amp;planet={$planet}&amp;planettype=1&amp;target_mission=3'>{$GalaxyRow.planet.transport_pe}</a>
	<br />
	{/if}	
	
	

</td></tr>
</table>">
{if !$GalaxyRow.des}
<img src="styles/theme/{$Raza_skin}/planis/p{$planet}.png" height="{$GalaxyRow.planet.diameter1}" width="{$GalaxyRow.planet.diameter1}" alt=""></a>
{else}
<img src="styles/theme/{$Raza_skin}/planis/detruite.gif" height="{$GalaxyRow.planet.diameter1}" 
width="{$GalaxyRow.planet.diameter1}" alt=""></a>
{/if}


<div class="moon">
{if ($GalaxyRow.moon) && (!$GalaxyRow.des)}
<a class="tooltip_sticky" name="<table style='width:240px'><tr><th colspan='2'>{$gl_moon} {$GalaxyRow.moon.name} [{$galaxy}:{$system}:{$planet}]</th></tr><tr>
<td style='width:80'><img src='styles/theme/{$Raza_skin}/planeten/small/s_mond.png' height='75' style='width:75'></td>
<td><table style='width:100%'><tr><th colspan='2'>{$gl_features}</th></tr></td>
<tr><td>{$gl_diameter}</td><td>{$GalaxyRow.moon.diameter}</td></tr>
<tr><td>{$gl_temperature}</td><td>{$GalaxyRow.moon.temp_min}</td></tr>
<tr><th colspan=2>{$gl_actions}</th></tr>
<tr><td colspan='2'>{if ($GalaxyRow.moon.attack) && (!$GalaxyRow.des)}<a href='?page=fleet&galaxy={$galaxy}&system={$system}&planet={$planet}&planettype=3&target_mission=1'>{$GalaxyRow.moon.attack}</a>
<br>
{/if}
<a href='?page=fleet&galaxy={$galaxy}&system={$system}&planet={$planet}&planettype=3&target_mission=3'>{$GalaxyRow.moon.transport}</a>
{if ($GalaxyRow.moon.stay) && (!$GalaxyRow.des)}
<br>
<a href='?page=fleet&galaxy={$galaxy}&system={$system}&planet={$planet}&planettype=3&target_mission=4'>{$GalaxyRow.moon.stay}</a>
{/if}
{if ($GalaxyRow.moon.stayally) && (!$GalaxyRow.des)}
<br>
<a href='?page=fleet&galaxy={$galaxy}&system={$system}&planet={$planet}&planettype=3&target_mission=5'>{$GalaxyRow.moon.stayally}</a>
{/if}
{if ($GalaxyRow.moon.spionage) && (!$GalaxyRow.des)}
<br>
<a href='javascript:doit(6,{$galaxy},{$system},{$planet},3,{$spio_anz});'>{$GalaxyRow.moon.spionage}</a>
{/if}

</td></tr></table></td></tr></table>">
<img src="styles/theme/{$Raza_skin}/imagenes/luna.png" height="22" width="22" alt="{$GalaxyRow.moon.name}" /></a>
{/if}
<a class="tooltip_sticky" name="<table style='width:240px'><tr><th colspan='2'>{$GalaxyRow.user.playerrank}</th></tr>
<tr>
{if ($GalaxyRow.user.isown) && (!$GalaxyRow.des)}<tr><td>

<a href='javascript:OpenPopup(&quot;?page=buddy&amp;mode=2&amp;u={$GalaxyRow.user.id}&quot;, &quot;&quot;, 720, 300);'>{$gl_buddy_request}</a></td></tr>
<td><a href='#' onclick='return Dialog.Playercard({$GalaxyRow.user.id}, &quot;{$GalaxyRow.user.username}&quot;);'>{$gl_playercard}</a></td></tr>

<td><a href='#' onclick='return Dialog.PM({$GalaxyRow.user.id}, &quot;{$GalaxyRow.user.username}&quot;);'>{$write_message}</a></td></tr>
{/if}


<tr><td><a href='?page=statistics&who=1&start={$GalaxyRow.user.rank}'>{$gl_see_on_stats}</a></td>
</tr></table>">
</div>
<div class="username"><span class="username">
{$GalaxyRow.user.Systemtatus}<font color="#01A9DB">{$GalaxyRow.user.username}</font><br><font color="yellow">{$GalaxyRow.planetname.name}</font></span><br>
{if ($GalaxyRow.user.Systemtatus) && (!$GalaxyRow.des)}</span>
{/if}

{if ($GalaxyRow.ally) && (!$GalaxyRow.des)}
<a class="tooltip_sticky" name="<table style='width:240px'><tr><th>{$gl_alliance} {$GalaxyRow.ally.name} {$GalaxyRow.ally.member}</th></tr><td><table>
<tr><td><a href='?page=alliance&amp;mode=ainfo&amp;a={$GalaxyRow.ally.id}'>{$gl_alliance_page}</a></td></tr>
<tr><td><a href='?page=statistics&start={$GalaxyRow.ally.rank}&who=2'>{$gl_see_on_stats}</a></td></tr>
{if ($GalaxyRow.ally.web) && (!$GalaxyRow.des)}<tr><td><a href='{$GalaxyRow.ally.web}' target='allyweb'>{$gl_alliance_web_page}</td></tr>
{/if}
</table>
</td>
</table>">
{if ($GalaxyRow.ally.inally == 2) && (!$GalaxyRow.des)}
<span class="username" style="color:lime;opacity: 0.5">{$GalaxyRow.ally.tag}<br></span>
{elseif $GalaxyRow.ally.inally == 1}
<span class="allymember" style="opacity: 0.5">{$GalaxyRow.ally.tag}<br></span>
{else}
<span class="username" style="color:orange;opacity: 0.5">{$GalaxyRow.ally.tag}<br></span>
{/if}</a>
{else} 
{/if}
<span class="username">{$GalaxyRow.user.Systemtatus2}</span>
</a></div><div id="community-p-{$planet}" style="display:none;">


</div>
 <div class="derbis">{if ($GalaxyRow.derbis) && (!$GalaxyRow.des)}<a class="tooltip_sticky" name="<table style='width:240px'><tr><th colspan='2'>{$gl_debris_field} [{$galaxy}:{$system}:{$planet}]</th></tr>
 
<tr><td style='width:80'><img src='styles/theme/{$Raza_skin}/planeten/small/debris.jpg' height='75' width='75'></td><td><table style='width:100%'><tr><th colspan='2'>{$gl_resources}:</th></tr>
<tr><td>{$Metal}: </td><td>{$GalaxyRow.derbis.metal}</td></tr><tr><td>{$Crystal}: </td><td>{$GalaxyRow.derbis.crystal}</td></tr>
<tr><th colspan='2'>{$gl_actions}</th></tr>
<tr><td colspan='2'><a href='javascript:doit(8,{$galaxy},{$system},{$planet}, 2, &quot;{$GalaxyRow.derbis.GRecSended}|{$GalaxyRow.derbis.RecSended}&quot;);'>{$gl_collect}</a></td></tr>
</table>
</td>
</tr>
</table>">

<img src="styles/theme/{$Raza_skin}/planis/debris.gif" height="30" width="10" alt=""></a>
{/if}</div>




 	</div>
	
	{/foreach} 

 	<tr>
		<td>
		<a id="legende" class="tooltip" name="<table style='width:240px'>
		<tr>
		<th colspan='2'>{$gl_legend}</td>
		</tr>

		<tr>
		<td style='width:220px'>{$gl_pseudo}</td>
		</tr>			
		<tr>
		<td style='width:220px'>{$gl_nomplapla}</td>
		</tr>		
		<tr>
		<td style='width:220px'>{$gl_ally}</td>
		</tr>
		<tr>
		<td style='width:220px'>{$gl_nonally}</td>
		</tr>		
		
		<tr>
		<td style='width:220px'>{$gl_strong_player}</td>
		<td><span class='strong'>{$gl_s}</span></td>
		</tr>
		<tr>
		<td style='width:220px'>{$gl_week_player}</td>
		<td><span class='noob'>{$gl_w}</span></td>
		</tr>
		<tr>
		<td style='width:220px'>{$gl_vacation}</td>
		<td><span class='vacation'>{$gl_v}</span>
		</td>
		</tr>
		<tr><td style='width:220px'>{$gl_banned}</td>
		<td><span class='banned'>{$gl_b}</span></td>
		</tr>
		<tr>
		<td style='width:220px'>{$gl_inactive_seven}</td>
		<td><span class='inactive'>{$gl_i}</span></td>
		</tr>
		<tr><td style='width:220px'>{$gl_inactive_twentyeight}</td>
		<td><span class='longinactive'>{$gl_I}</span></td>
		</tr>
		</table>"><img src="styles/theme/{$Raza_skin}/imagenes/otros/s.gif" /></a> 
		</td></td>
	</tr>
 
  </div>
	

</div> 
 
<script type="text/javascript">
		planetmenu 		= {$Scripttime};
		status_ok		= '{$gl_ajax_status_ok}';
		status_fail		= '{$gl_ajax_status_fail}';
		MaxFleetSetting = {$settings_fleetactions} - 1;
	</script>

<div  <div id="leftmenu">
{include file="left_menu.tpl"}</div>
 
	
	<div id="misiones_top2"></div>
	<div id="misiones2">
	<table class="galaxia_mini">
		<tr>
			<td><img class="tooltip" name="{$gl_avaible_spyprobes}" src="styles/theme/{$Raza_skin}/gebaeude/210.png" width="50" height="50" /></td><td> <span id="probes">{$spyprobes}</span> </td>
		</tr><tr>
			<td><img class="tooltip" name="{$gl_avaible_recyclers}" src="styles/theme/{$Raza_skin}/gebaeude/209.png" width="50" height="50" /></td><td> <span id="recyclers">{$recyclers}</span></td> 
		</tr><tr>
			<td><img class="tooltip" name="{$gl_avaible_grecyclers}" src="styles/theme/{$Raza_skin}/gebaeude/219.png" width="50" height="50" /></td><td> <span id="grecyclers">{$grecyclers}</span></td> 
		</tr>
	</table>
	
	<table>
		<tr>
		<td colspan="6">({$planetcount})</td>
		<td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
	</tr>
	<tr>
		<td><span id="missiles">{$currentmip}</span> <b>{$gl_avaible_missiles}</b><br />
		<span id="slots">{$maxfleetcount}</span>/{$fleetmax} <b>{$gl_fleets}</b></td>
	</tr>
	</table>
	
	<table class="semi_remarcado">
	<tr style="display: none;" id="fleetstatusrow">
		<td colspan="8">
			<table id="fleetstatustable">

			</table>
		</td>
	</tr>
	</table>
	</div>
	<div id="misiones_footer2"></div>	
<br/ ><br /><br />


</div>			
</div>
</div>	 

	
	
</div>
</div>	
</div>	
</div>	
</div>
{include file="planet_menu.tpl"}



{/if}
{include file="overall_footer.tpl"}


