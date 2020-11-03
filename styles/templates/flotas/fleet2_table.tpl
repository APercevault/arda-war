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
				<div id="titular_texto" style="display: block;">{$thisgalaxy}:{$thissystem}:{$thisplanet} - {if $thisplanet_type == 3}{$fl_moon}{else}{$fl_planet}{/if}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/flotas3.jpg);"></div>
<div id="titulo_alternativo_corto">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2>{$fl_send_fleet}</font><font color="red" size=2>>></font><font color=yellow size=2>{$fl_fuel_consumption}:</font> <font color=#FE2E2E size=2>{pretty_number($consumption)}</font></b>
			  <a class="right" href="game.php?page=fleet1"><b><font color="red" size=2>>></font><font size=2> {$al_back}</font></b></a></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
        <div>	
<form action="game.php?page=fleet3" method="post">
<input type="hidden" name="galaxy" value="{$galaxy}">
<input type="hidden" name="system" value="{$system}">
<input type="hidden" name="planet" value="{$planet}">
<input type="hidden" name="planettype" value="{$planettype}">
<input type="hidden" name="speed" value="{$speed}">
<input type="hidden" name="fleet_group" value="{$fleet_group}">
<input type="hidden" name="usedfleet" value="{$fleetarray}">
<table cellspacing="0" cellpadding="0" id="mercado_tabla" >
			<tbody><tr>
                    <td></td>
					<td>{$fl_resources}</td>
		            <td>{$fl_cantidad}</td>
					<td>{$fl_accion}</td>
				</tr>
				<!-- Metal -->
				<tr class="alt">
                    <td class="resIcon noCenter"><img src="styles/theme/{$Raza_skin}/images/metal.jpg" /></td>
					<td class="noCenter">{$Metal}</td>
    				<td>
					<div class="bg_input1"><input class="text" name="metal" size="10" value = "0" onchange="calculateTransportCapacity();" type="text" style="text-align: right;" /></div>
					</td>
						<td>
                            <span class="marca_color"><a href="javascript:maxResource('metal');"><span class="max"></span></a></span>
						</td>
    			</tr>	
				<!-- Cristal -->
				<tr class="alt_2">
                    <td class="resIcon noCenter"><img src="styles/theme/{$Raza_skin}/images/cristal.jpg" /></td>
					<td class="noCenter">{$Crystal}</td>
    				<td>
					<div class="bg_input1"><input class="text" name="crystal" size="10" value = "0" onchange="calculateTransportCapacity();" type="text" style="text-align: right;" /></div>
					</td>
						<td>
                             <span class="marca_color"><a href="javascript:maxResource('crystal');"><span class="max"></span></a></span>
						</td>
    			</tr>
				<!-- Deuterio -->
				<tr class="alt">
                    <td class="resIcon noCenter"><img src="styles/theme/{$Raza_skin}/images/deuterio.jpg" /></td>
					<td class="noCenter">{$Deuterium}</td>
						<td>
							<div class="bg_input1"><input class="text" name="deuterium" size="10" value = "0" onchange="calculateTransportCapacity();" type="text" style="text-align: right;" size="10" /></div>
						</td>
						<td>
                            <span class="marca_color"><a href="javascript:maxResource('deuterium');"><span class="max"></span></a></span>
						</td>
				</tr>
				<!-- Norio -->
				<tr class="alt_2">
                    <td class="resIcon noCenter"><img src="styles/theme/{$Raza_skin}/images/norio.jpg" /></td>
					<td class="noCenter">{$Norio}</td>
						<td>
							<div class="bg_input1"><input class="text" name="norio" size="10" value = "0" onchange="calculateTransportCapacity();" type="text" style="text-align: right;" size="10" /></div>
						</td>
						<td>
                             <span class="marca_color"><a href="javascript:maxResource('norio');"><span class="max"></span></a></span>
						</td>
				</tr>
				<!-- Otras cosas -->
				<tr class="alt" style="height:20px;">
        			<td>{$fl_resources_left}</td>
					<td colspan="2" id="remainingresources">0</td>
					<td><b><a href="javascript:maxResources()"><font color="orange">{$fl_all_resources}</font></a></b></td>
				</tr>
				<tr>
					<td style="padding:10px" colspan="4">{$tr_descr}
{if ($authlevel <> 3) and ($galaxy_post == 1) and ($system_post == 1)}
<center><a<span><b> <font size="3"; color=yellow>Vous n'avez pas les autorisations nécessaires pour .......</font></a>
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=./game.php?page=fleet">
{elseif ($galaxy == 0) or ($system == 0) or ($planet == 0)}
<center><a<span><b> <font size="3"; color=yellow>Vous vous êtes trompé dans les coordonnées</font></a>
<META HTTP-EQUIV="Refresh" CONTENT="3; URL=./game.php?page=fleet">

{else}
<center><input type="submit" value="{$fl_continue}" class="submit" />
{/if}
					
					</td>
				</tr>
			</tbody>
		</table>
</div>
</div>
<div class="new_footer"></div>	
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow>{$fl_mission}</font></b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
<div>
<br />
<table>
<tr>
<td style="width:50%;margin:0;padding:0;">
        		<table width="270px"><tr>
        			{foreach item=MissionName key=MissionID from=$MissionSelector}
					
						<td><center>
						 <label for="radio_{$MissionID}">
                     <img class="tooltip" name="{$MissionName}" src="styles/theme/{$Raza_skin}/imagenes/infos/{$MissionID}.png" /><br /><input id="radio_{$MissionID}" type="radio" name="mission" value="{$MissionID}" {if $mission == $MissionID}checked="checked"{/if} style="width:60px;">
                  </label>
						</td>
					{/foreach}	
						<tr>
							{if $MissionID == 15}<center><div id="bl12" style="visibility:visible"><font color=yellow>{$fl_expedition_alert_message}</div><br />{/if}
							{if $MissionID == 11}<div style="color:red">{$fl_dm_alert_message}</div><br />{/if}
						</tr>					
					</tr>					
        		</table>
        	</td>			
</tr>
{if $StaySelector}
	<tr style="height:20px; text-align:center">
		<th width=90% class="transparent" colspan="3">{$fl_hold_time}</th>
	</tr>
	<tr style="height:20px; text-align:center">
		<td class="transparent" colspan="3">
		<br><br>
			{html_options name=holdingtime style="background-color: black;" options=$StaySelector} {$fl_hours}
		</td>
	</tr>
{/if} 
</table></form>
</div>
</div>	
<div class="new_footer"></div>
<br /><br /><br /><br /><br /><br />			
</div>
</div>
</div>	
</div>	
</div>
<script type="text/javascript">
data	= {$fleetdata};
</script>
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}

<SCRIPT LANGUAGE=JavaScript>
function ScrollWin() 
  {
 var Scroleto = 0;
  while(Scroleto!=700)
    {
    this.scroll(1,Scroleto)
    Scroleto++;
    }
  }
onload = ScrollWin;
</SCRIPT>
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
setInterval("blink(bl12)",500);
</script>