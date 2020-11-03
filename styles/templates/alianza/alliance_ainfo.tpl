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
				<div id="titular_texto" style="display: block;">{$al_ally_information}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="cabezza" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2.png);"></div>
<div id="eins_small">
<div>
<table>
	<tr>
		<td colspan="2" style="height:100px">
		{if $ally_description}
		<font color="lime" size = 2>{$ally_description}</font>
		{else}
		<font color="lime" size = 2>{$al_description_message}</font>{/if}</td>
	</tr>
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
{if $ally_stats}

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow1">
        <li>
              <span>
			  <font color=orange size = 2><b>{$al_ally_info_tag} : </b></font> <font color=#FE642E size = 2><b>{$ally_tag} <font color=orange size = 2><b>{$al_ally_info_name} : </b></font> <font size = 2>{$ally_name} <font color=orange size = 2><b>{$al_ally_info_members} : </b></font></b></font><font size = 2> {$ally_member_scount}<br />
			  </span>
        </li>                                    
    </ul>
</div>
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span>
			  <b><font color="yellow" size = 2>{$al_Allyquote}</font></b></span>
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
{/if}	
<br /><br /><br /><br /><br /><br />
</div>
<div id="menu_flotas">
		<div id="lista_misiones">    
             <p><b>{$lm_alliance}</b></p>  
			<div class="misiones_top"></div>
			<div class="misiones">
			{if $ally_image}
						<img class="tooltip" name="<img src={$ally_image}  width=300 height=300 />" src="{$ally_image}" width="147" height="147" /></td>{/if}
			{if $ally_web}
			<center><a href="{$ally_web}" target="_blank"><b>{$al_web_text}</b></a></center>
			{/if}
			{if $ally_request}
			<center><a href="game.php?page=alliance&amp;mode=apply&amp;allyid={$ally_id}"><div class="tooltip send_solicitud" name="{$al_click_to_send_request}"></div></a></center>
			{/if}
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