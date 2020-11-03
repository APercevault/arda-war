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
              <span><b><font color="yellow" size = 2>{$fleet_achat_vente}</font></b> <a class="right" href="game.php?page=mercado"><b><font color="red" size = 2>>></font> <font size = 2>{$al_back}</font></b></a></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
<div>	
    <table>
        <br />
		<tr>
			<td><center><a href="game.php?page=fleettrader&amp;mode=vente"><img src="styles/theme/{$Raza_skin}/imagenes/infos/vente.png" /><br /><h4><font color="yellow" size = 2>{$fleet_vente}</font></h4></a></td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><center><a href="game.php?page=fleettrader&amp;mode=achat"><img src="styles/theme/{$Raza_skin}/imagenes/infos/achat.png" /><br /><h4><font color="yellow" size = 2>{$fleet_achat}</font></h4></a></td>
        </tr>
    </table>
</div>	
</div>
<div class="new_footer"></div>		

</div>		
</div>	
</div>
</div>	
</div>				
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}