{include file="overall_header.tpl"}
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
<div id="topnav" class="header_g"> 	
		{include file="overall_topnav.tpl"}	
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$lm_alliance}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/redes.jpg);"></div>
<div id="titulo_alternativo_corto">
    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$al_your_ally} : </font><font color="lime" size = 2>{$ally_name} </font><font color="yellow" size = 2>{$al_tag} : </font><font color="lime" size = 2>{$ally_tag}</font></b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
<div>
    <table width="95%">		
        <br />
		{if $ally_description}
			<font color="lime" size = 2>{$ally_description}</font>
		{else}
			<font color="lime" size = 2>{$al_description_message}</font>
		{/if}
    </table>
</div>
</div>	
<div class="new_footer"></div>	
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$al_inside_section}</font></b></span>
        </li>                                    
    </ul>
</div>	
<div id="eins">
<div>
<br />
	<table width="95%">	
		<font color="lime" size = 2>{$ally_text}</font>
	</table>		
</div>
</div>	
<div class="new_footer"></div>		
{if $DiploInfo}
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b>{$al_diplo}</b></span>
        </li>                                    
    </ul>
</div>	
<div id="eins">
<div>
 <table width="95%">		
		<tr>
		<th>{$pactos}</th>
		<th>{$alianzas}</th>
		</tr>		
			{if !empty($DiploInfo.1)}
			<tr class="alt">
			<td width="30"><img class="tooltip" name="{$al_diplo_level.1}" src="styles/theme/{$Raza_skin}/imagenes/otros/pacto_alianza.png" width="60" height="58" /></td>
			<td width="100%">{foreach item=PaktInfo from=$DiploInfo.1}<b><a href="?page=alliance&mode=ainfo&a={$PaktInfo.1}">{$PaktInfo.0}</a></b><br />{/foreach}</td>
			</tr>
			{/if}
			
			{if !empty($DiploInfo.2)}
			<tr class="alt_2">
			<td width="30"><img class="tooltip" name="{$al_diplo_level.2}" src="styles/theme/{$Raza_skin}/imagenes/otros/pacto_comercio.png" width="60" height="58" /></td>
			<td width="100%">{foreach item=PaktInfo from=$DiploInfo.2}<b><a href="?page=alliance&mode=ainfo&a={$PaktInfo.1}">{$PaktInfo.0}</a></b><br />{/foreach}</td>
			</tr>
			{/if}
			
			{if !empty($DiploInfo.3)}
			<tr class="alt">
			<td width="30"><img class="tooltip" name="{$al_diplo_level.3}" src="styles/theme/{$Raza_skin}/imagenes/otros/no_agrecion.png" width="60" height="58" /></td>
			<td width="100%">{foreach item=PaktInfo from=$DiploInfo.3}<b><a href="?page=alliance&mode=ainfo&a={$PaktInfo.1}">{$PaktInfo.0}</a></b><br />{/foreach}</td>
			</tr>
			{/if}
			
			{if !empty($DiploInfo.4)}
			<tr class="alt_2">
			<td width="30"><img class="tooltip" name="{$al_diplo_level.4}" src="styles/theme/{$Raza_skin}/imagenes/otros/en_guerra.png" width="60" height="58" /></td>
			<td width="100%">{foreach item=PaktInfo from=$DiploInfo.4}<b><a href="?page=alliance&mode=ainfo&a={$PaktInfo.1}">{$PaktInfo.0}</a></b><br />{/foreach}</td>
			</tr>
			{/if}
</table>
</div>
</div>	
<div class="new_footer"></div>			
{/if}
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$al_Allyquote}</font></b></span>
        </li>                                    
    </ul>
</div>	
<div id="eins">
<div>
 <table width="70%">	
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_totalfight}</td><td><font color="yellow" size = 2>{pretty_number($totalfight)}</td>
		</tr>
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_fightwon}</td><td><font color="yellow" size = 2>{pretty_number($fightwon)} {if $totalfight}<font color=#F2F5A9 size = 2>({round($fightwon / $totalfight * 100, 2)}%){/if}</td>
		</tr>
		<tr>	
			<td align="left"><font color="lime" size = 2>{$pl_fightlose}</td><td><font color="yellow" size = 2>{pretty_number($fightlose)} {if $totalfight}<font color=#F2F5A9 size = 2>({round($fightlose / $totalfight * 100, 2)}%){/if}</td>
		</tr>
		<tr>	
			<td align="left"><font color="lime" size = 2>{$pl_fightdraw}</td><td><font color="yellow" size = 2>{pretty_number($fightdraw)} {if $totalfight}<font color=#F2F5A9 size = 2>({round($fightdraw / $totalfight * 100, 2)}%){/if}</td>
		</tr>
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_unitsshot}</td><td><font color="yellow" size = 2>{$unitsshot}</td>
		</tr>
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_unitslose}</td><td><font color="yellow" size = 2>{$unitslose}</td>
		</tr>
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_dermetal}</td><td><font color="yellow" size = 2>{$dermetal}</td>
		</tr>
		<tr>
			<td align="left"><font color="lime" size = 2>{$pl_dercrystal}</td><td><font color="yellow" size = 2>{$dercrystal}</td>
		</tr>
    </table>
</div>	
</div>
<div class="new_footer"></div>		
<br /><br /><br /><br /><br /><br /><br /><br /><br />
</div>	
<div id="menu_flotas">
		<div id="lista_misiones">    
             <p><b>{$al_manage_image}</b></p>  
			{if $ally_image}
			<div class="misiones_top"></div>
			<div class="misiones">
			<img class="tooltip" name="<img src={$ally_image}  width=300 height=300 />" src="{$ally_image}" width="147" height="147" /></td>
			</div> 
			<div class="misiones_footer"></div>						
			{/if}
			<div class="misiones_top"></div>
			<div class="misiones">
			<center>                     
			<font color="orange"><b>{$al_ally_info_tag}:</b></font> {$ally_tag} <br />
			<font color="orange"><b>{$al_ally_info_name}:</b></font> {$ally_name} <br />
			<font color="orange"><b>{$al_ally_info_members}:</font> {$ally_members}</b><br />{if $rights.memberlist} (<a href="?page=alliance&amp;mode=memberslist">{$al_user_list}</a>){/if} <br />
			<font color="orange"><b>{$al_rank}:</b></font> {$range}<br />{if $rights.admin} (<a href="?page=alliance&amp;mode=admin&amp;edit=ally">{$al_manage_alliance}</a>){/if} <br />
			<b><a href="javascript:OpenPopup('?page=chat&amp;chat_type=ally', '', 800, 800);">{$al_goto_chat}</a></b> <br />
			{if $rights.seeapply && $req_count > 0}
			<a href="?page=alliance&amp;mode=admin&amp;edit=requests"><blink><font color="red"><b>{$al_requests}</b></font></blink></a> <br />
			{/if}
			{if $rights.roundmail}
			<b><a href="javascript:OpenPopup('?page=alliance&amp;mode=circular','', 720, 300);">{$al_send_circular_message}</a></b> <br />
			{/if}
			{if $ally_web}
			<b><a href="{$ally_web}" target="_blank">{$al_web_text}</a></b> <br />
			{/if}
			{if $isowner}	
			<br /><h3>{$al_leave_alliance}</h3>
			<input type="button" class="submit" onclick="javascript:if(confirm('Souhaitez-vous réellement quitter l\'Alliance ?')) location.href='game.php?page=alliance&amp;mode=exit';" value="{$al_continue}"><br />
			{/if}
			</center>
			</div> 
			<div class="misiones_footer"></div>			
</div>			
</div>		
</div>	
</div>
</div>	
</div>	
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}