{include file="overall_header.tpl"}
{if $planet_type == 3}
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=overview">
{else}
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
<div id="topnav" class="header_normal"> 	
		{include file="overall_topnav.tpl"}	
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$lm_bonus} - {$en_venta}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/bonus.jpg);"></div>



<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
	<span><b>{$minas_pack}</b> <a class="right" href="game.php?page=mercado"><b><font color="red">>></font> {$al_back}</b></a></span>		
 
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/imagenes/otros/minas.png" align="top" width="130" height="130">
</td>
<td><center>
<font color=yellowgreen size="2"><b>{$minas_pack_descr}</b></font>
<br /><br />
<b>{$coste}<font color=lime>{pretty_number($cost_mine)}</font> {$packs_norium}</b></center>

{if $cost_minea == 1}<center><br />
<a href="?page=bonus&pack=mineros"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;
{/if}
</span></div></a></td>
</tr>
</table>


</div>
</div>	
<div class="new_footer"></div>

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b>{$almacenes_pack}</b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/imagenes/otros/almacenes.png" align="top" width="130" height="130">
</td>
<td><center>
<font color=yellowgreen size="2"><b>{$almacenes_pack_descr}</b></font>
<br /><br />
<b>{$coste}<font color=lime>{pretty_number($cost_stor)}</font> {$packs_norium}</b></center>

{if $cost_stora == 1}<center><br />
<a href="?page=bonus&pack=almacenes"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;
{/if}
</span></div></a></td>
</tr>
</table>


</div>
</div>	
<div class="new_footer"></div>


<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b>{$lune_pack}</b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/imagenes/otros/lune.gif" align="top" width="130" height="130">
</td>
{if $id_luna == 0}
<td><center>
<font color=yellowgreen size="2"><b>{$lune_pack_descr}</b></font>
<br /><br />
<b>{$coste}<font color=lime>{pretty_number($cost_lune)}</font> {$mo_lang}</b></center>

{if $cost_lunea == 1}<center><br />
<a href="?page=bonus&pack=plune"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;
{/if}
{else}
<td><center>
<br />
<font color=white size="2"><b>{$lune_avec}</b></font>
</center>
{/if}
</span></div></a></td>
</tr>
</table>

</div>
</div>	



<div class="new_footer"></div>

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b>{$case_pack}</b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/imagenes/otros/case.png" align="top" width="130" height="130">
</td>
<td><center>
<font color=yellowgreen size="2"><b>{$case_pack_descr}</b></font>
<br /><br />
<b>{$coste}<font color=lime>{pretty_number($cost_case)}</font> {$mo_lang}</b></center>

{if $cost_casea == 1}<center><br />
<a href="?page=bonus&pack=pcase"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;
{/if}
</span></div></a></td>
</tr>
</table>

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
{/if}