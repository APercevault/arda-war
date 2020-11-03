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
              
<form action="" method="POST"><b><font color="yellow" size = 2>{$al_find_alliances}</font></b>
<a class="right"><font color="red" size = 2>>></font>
	<input class="submite" type="Submit" name="upvote" style="color:lime;font-weight: bold;" value="{$al_find_all}"/>
<a class="right"><font color="red">>></font>	
	<input class="submite" type="Submit" name="upvota" style="font-weight: bold;" value="{$al_back}"/>
</a></a>
</form>	
	</b>	  
			  
        </li>                                    
    </ul>
</div>
<div id="eins">
<div>	
    <form action="" method="POST">
              <center><div class="bg_input_special"><input type="text" class="text" name="searchtext" value="{$searchtext}" style="text-align:right;" /></div></center>
			  <input class="submit" type="submit" value="{$al_find_submit}" />&nbsp;&nbsp;&nbsp;
    </form>
	{if is_array($SeachResult) }

</div>	
</div>	
<div class="new_footer"></div>
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2>{$al_rejoindre}</font></b></span>
        </li>                                    
    </ul>
</div>	
<div id="eins">
<div>	
	<table width="95%">
        <tr>
            <th><b><font color=yellow size = 2>{$al_ally_info_tag}</font></th>
            <th><b><font color=yellow size = 2>{$al_ally_info_name}</font></th>
            <th><b><font color=yellow size = 2>{$al_ally_info_members}</font></th>
        </tr>
		{foreach item=SeachRow from=$SeachResult}
        <tr>
			<td><a href="game.php?page=alliance&amp;mode=apply&amp;allyid={$SeachRow.id}"><font color=lime>{$SeachRow.tag}</font></a></td>
			<td><font color=lime>{$SeachRow.name}</font></td>
			<td><font color=lime>{$SeachRow.members}</font></td>
		</tr>
		{foreachelse}
        <tr>
			<td colspan="3"><font color=lime size=4>{$al_find_no_alliances}</td>
		</tr>
		{/foreach}
    </table>
	{/if}
</div>	
</div>
<div class="new_footer"></div>		
<br /><br /><br /><br /><br /><br />
</div>		
</div>	
</div>
</div>	
</div>		
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}