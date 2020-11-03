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
				<div id="titular_texto" style="display: block;">{$ft_head}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/fleettrader.jpg);"></div>
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="titulo_alternativo">
    <ul class="tabsbelow">
        <li>
<span><B><font color =yellow size = 2>{$rachat_comerciante}</font><font size = 2>{$taxecommercant}</font><font color = white size = 2>{$Charge}% </font><font color =yellow size = 2 id="blaa" style="visibility:visible">{$revente}</font></B> <a class="right" href="game.php?page=fleettrader"><b><font color="red" size = 2>>></font> <font size = 2>{$al_back}</font></b></a></span>	
        </li>                                    
    </ul>
</div>
<div id="eins">
        <div>	    
 <form action="" method="POST">
<table width="96%">
		<tbody>
			<tr>
				<th><font color = #01DF01 size = 2>{$ft_selecciona}</font></th>
				<th><font color = #01DF01 size = 2>{$ft_uniselec}</font></th>
				<th><font color = #01DF01 size = 2>{$ft_cantidad}</font></th>
				<th><font color = #01DF01 size = 2>{$ft_unidad}</font></th>
				<th><font color = #01DF01 size = 2>{$ft_total}</font></th>
			</tr>
			<tr>
			<td class="remarcado">
			<select name="id" id="id" onChange="updateVars()">
			{foreach $trade_allowed_ships as $ID}			
			<option style="background-color:#000000;" value="{$ID}" label="{$tech.$ID}">{$tech.$ID}</option>
			{/foreach}
			</select>
			</td>
		
			<td class="semi_remarcado">
			<div class="imagenes_fleettrader">
			<CENTER>
			{foreach $trade_allowed_ships as $ID}
			<img class="tooltip" name="{$tech.$ID} : {$infofleet.$ID}" src="styles/theme/{$Raza_skin}/gebaeude/{$ID}.png" height="70" width="70" />
			
			<div class="imagenes_fleettrader"> <b style="cursor:help;" >{$infofleet.$ID}</b></div>
			
			{/foreach}
			</div>
			</td>
			
			<td class="remarcado">
			
			<div class="bg_input_special">
			<input type="text" class="text" id="count" name="count" onkeyup="Total();" />
			<br><br><input type="button" class="submit" value="Maximum" onclick="MaxShips();">
			</div>
			</td>
					
			<td class="semi_remarcado" width="100px">
			<img class="tooltip" name="{$Metal}" src="styles/theme/{$Raza_skin}/images/metal.jpg" /><br /><b><span id="metal">0</span></b><br />
			<img class="tooltip" name="{$Crystal}" src="styles/theme/{$Raza_skin}/images/cristal.jpg" /><br /><b><span id="crystal">0</span></b><br />
			<img class="tooltip" name="{$Deuterium}" src="styles/theme/{$Raza_skin}/images/deuterio.jpg" /><br /><b><span id="deuterium">0</span></b><br />
			<img class="tooltip" name="{$Norio}" src="styles/theme/{$Raza_skin}/images/norio.jpg" /><br /><b><span id="norio">0</span></b>
			</td>
			
			<td class="remarcado" width="100px">
			<img name="{$Metal}" src="styles/theme/{$Raza_skin}/images/metal.jpg" /><br /><b><span id="total_metal">0</span></b><br />
			<img name="{$Crystal}" src="styles/theme/{$Raza_skin}/images/cristal.jpg" /><br /><b><span id="total_crystal">0</span></b><br />
			<img name="{$Deuterium}" src="styles/theme/{$Raza_skin}/images/deuterio.jpg" /><br /><b><span id="total_deuterium">0</span></b><br />
			<img name="{$Norio}" src="styles/theme/{$Raza_skin}/images/norio.jpg" /><br /><b><span id="total_norio">0</span></b>
			</td>
			</tr>

					
			<tr><td colspan="5">
			<CENTER>
			<br /><span class="remarcado" style="padding: 2px 2px 2px 2px; font-weight: bold;"><font color = yellow size = 2>{$ft_charge}<font color = white size = 2>{$Charge}%</font></span><br />
			<input type="submit" class="submit" value="{$ft_absenden}">
			</td></tr>
			
		</tbody>
	</table>
</form>
        </div>
</div>	
<div class="new_footer"></div>	
<br /><br /><br /><br /><br /><br />	
</div>
</div>	
</div>	
</div>	
</div>
</BODY>
<script type="text/javascript">
var CostInfo = {$CostInfos};
var Charge = {$Charge};
</script>
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}


<script>
function blink(Obj)
{
if (Obj.style.visibility == "visible" )
{
Obj.style.visibility = "hidden";
}
else
{
Obj.style.visibility = "visible";
}
}

setInterval("blink(blaa)",350);
</script>
{/if}