


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
				<div id="titular_texto" style="display: block;">{$pe_new_mission_title}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>

{if $PE_maplapla > 0 and $PE_autreplapla > 0}
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/etoile1.jpg);"></div>
{/if}

{if $PE_maplapla == 0 and $PE_autreplapla == 0}
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/etoile2.jpg);"></div>
{/if}

{if $PE_maplapla > 0 and $PE_autreplapla == 0}
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/etoile3.jpg);"></div>
{/if}

<div id="titulo_alternativo_corto">
    <ul class="tabsbelow">
        <li>
              <span><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><font color=yellow size = 2>{$fl_expeditions}:</font><font color=#FE2E2E size = 2> {$currentexpeditions}  </font> <font color=yellow size = 2>/</font> <font color=#01DF01 size = 2>{$maxexpeditions}</font></b>
			  <a class="right" href="javascript:maxShips();"><b><font color="red"size = 2 >>></font> <font color=yellow size = 2>{$pe_select_all_Soldats}</font></b></a> </span></span>

        </li>                                    
    </ul>
</div>
				
<div id="eins">

	

{if $PE_maplapla == 0}
			<table>
			<br />
			<th>
			<div id="DivClignotante" style="visibility:visible;">
			<font color= yellow size = 2 >{$fa_votre_no_porte}</font>
			</div>
			</th>
			</table>
{/if}	




{if  $PE_maplapla > 0}

			<table>
		   
			<th>
			<div id="DivClignotante" style="visibility:visible;">
			<font color= red size = 2 >{$fa_act_porte}</font>
			</div>
			</th>
			
			</table>
{/if}			
{if $PE_maplapla < 3 and  $PE_maplapla > 0}			
			<table>
			<th> <font color=#2EFE64 size = 2>Le niveau <font color="yellow">3</font> <font color=#2EFE64 size = 2>est requis pour l'utiliser <br> (mais à partir du <font color="yellow" size = 2>premier</font> <font color=#2EFE64 size = 2>niveau, vous pouvez recevoir des attaques) &nbsp;</th>
			</table>
		
{/if}	
{if $PE_maplapla > 0}
			<table>
			<th><font color=#04B404 size = 2>Vous avez le niveau :<font color="yellow" size = 2> {$PE_maplapla} </th>
			</table
{/if}	




		
{if $PE_autreplapla == 0 and $PE_maplapla > 2}
<br>
			<table>
			<th><font color= yellow size = 2 >{$fa_no_porte}</font></th>
			</table>

{/if}	
	
			
{if $PE_maplapla > 0 and $PE_autreplapla > 0}


<div id="non" style="display:" >
        <div>	
	<br />

        <table width="95%" height="100%">
		<form action="?page=etoile1" method="POST">
		<input type="hidden" name="galaxy" value="{$galaxy}" />
        <input type="hidden" name="system" value="{$system}" />
        <input type="hidden" name="planet" value="{$planet}" />
        <input type="hidden" name="planet_type" value="{$planettype}" />
        <input type="hidden" name="mission" value="{$target_mission}" />
        <input type="hidden" name="maxepedition" value="{$envoimaxexpedition}" />
        <input type="hidden" name="curepedition" value="{$expeditionencours}" />
        <input type="hidden" name="target_mission" value="{$target_mission}" />
		<div>
			<ul class="naves">
			

			
			
		{foreach name=Fleets item=FleetRow from=$FleetsOnPlanet}   
			
			<li>
			<img class="tooltip" name="<font color='orange'><b>{$FleetRow.name}:</b></font> <td id='ship{$FleetRow.id}_value'>{$FleetRow.count}</td><br />" src="styles/theme/{$Raza_skin}/gebaeude/{$FleetRow.id}.png" width="70" height="70" /><br />
			{if $FleetRow.id == 212} {else}<font color="orange"><b><ul id="ship{$FleetRow.id}_value">{$FleetRow.count}</ul></b></font>{/if}
			
			<input name="ship{$FleetRow.id}" id="ship{$FleetRow.id}_input" class="campo_comun" size="10" value="" /><a href="javascript:maxShip('ship{$FleetRow.id}');"><img class="max_img" src="styles/theme/{$Raza_skin}/imagenes/navegacion/none.png" /></a>
			</li>
	
		{/foreach}
			</ul>
			</div>
	
			{if $smarty.foreach.Fleets.total == 0}
			<table>
			<th>&nbsp;{$pe_no_ships}&nbsp;</th>
			</table>
			{/if}
{if $PE_maplapla > 2}
			<table>{if $smarty.foreach.Fleets.total > 0}<input type="submit" class="submit" value="{$fl_continue}" />{/if}</table>
{/if}			
        </form>
		</table>
        </div>
</div>		
		
<div id="oui" style="display:none" >		
        <div>	
	<br />

        <table width="95%" height="100%">
		<form action="?page=etoile1" method="POST">
		<input type="hidden" name="galaxy" value="{$galaxy}" />
        <input type="hidden" name="system" value="{$system}" />
        <input type="hidden" name="planet" value="{$planet}" />
        <input type="hidden" name="planet_type" value="{$planettype}" />
        <input type="hidden" name="mission" value="{$target_mission}" />
        <input type="hidden" name="maxepedition" value="{$envoimaxexpedition}" />
        <input type="hidden" name="curepedition" value="{$expeditionencours}" />
        <input type="hidden" name="target_mission" value="{$target_mission}" />
		<div>
			<ul class="naves">
			

			
			
		{foreach name=Fleets item=FleetRow from=$FleetsOnPlanet}   
			
			<li>
			<img class="tooltip" name="<font color='orange'><b>{$FleetRow.name}:</b></font> <td id='ship{$FleetRow.id}_value'>{$FleetRow.count}</td><br />" src="styles/theme/{$Raza_skin}/gebaeude/{$FleetRow.id}.png" width="70" height="70" /><br />
			{if $FleetRow.id == 212} {else}<font color="orange"><b><ul id="ship{$FleetRow.id}_value">{$FleetRow.count}</ul></b></font>{/if}
			
			<input name="ship{$FleetRow.id}" id="ship{$FleetRow.id}_input" class="campo_comun" size="10" value="{$FleetRow.count}" /><a href="javascript:maxShip('ship{$FleetRow.id}');"><img class="max_img" src="styles/theme/{$Raza_skin}/imagenes/navegacion/none.png" /></a>
			</li>
	
		{/foreach}
			</ul>
			</div>
	
			{if $smarty.foreach.Fleets.total == 0}
			<table>
			<th>&nbsp;{$pe_no_ships}&nbsp;</th>
			</table>
			{/if}
			<table>{if $smarty.foreach.Fleets.total > 0}<input type="button" class="submit" onClick="selectionne();"  value="{$fl_selection}" />{/if}</table>
			<table>{if $smarty.foreach.Fleets.total > 0}<input type="submit" class="submit" value="{$fl_continue}" />{/if}</table>
        </form>
		</table>
        </div>		
		
		
		
		
		
		
</div>	


<div class="new_footer"></div>	
{if isset($aks_invited_mr)}  	
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b>{$fl_sac_of_fleet}</b></span>
        </li>                                    
    </ul>
</div>

<div class="new_footer"></div>		
{/if}
<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size = 2 >{$fl_bonus}</font></b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
<div>
	<span id="info_izquierda">
	<div style="text-align:center">			
   <body>
		<img class="tooltip" name="<font color='orange'><b>{$fl_bonus_attack}:</b></font> +{$bonus_attack}%" src="styles/theme/{$Raza_skin}/imagenes/infos/Atacar.png" />
		<img class="tooltip" name="<font color='orange'><b>{$fl_bonus_defensive}:</b></font> +{$bonus_defensive}%" src="styles/theme/{$Raza_skin}/imagenes/infos/defensa.png" />
		<img class="tooltip" name="<font color='orange'><b>{$fl_bonus_shield}:</b></font> +{$bonus_shield}%" src="styles/theme/{$Raza_skin}/imagenes/infos/shield.png" />	
		</div>	
  <body>
</div>
	</span>	
</div>	
<div class="new_footer"></div>		
<br /><br /><br /><br /><br /><br /><br /><br /><br /><br />	
{/if}
		
</div>
<div class="new_footer"></div>	





<div id="menu_flotas">
			<div id="lista_misiones">    
                <p><b>{$fl_titulo_misiones}</b></p>  
			 {foreach name=FlyingFleets item=FlyingFleetRow from=$FlyingFleetList}
			<div class="misiones_top"></div>
			<div class="misiones"> 
			<table id="contenido_informativo">
			<span class="tooltip planeta_misiones" name="<table>
			<tr><td>
			<b><font color='orange'>{$fl_beginning}:</font></b> [{$FlyingFleetRow.start_galaxy}:</font>{$FlyingFleetRow.start_system}:{$FlyingFleetRow.start_planet}]
			</td></tr>
			<tr><td>
			<b><font color='orange'>{$fl_destiny}:</font></b> [{$FlyingFleetRow.end_galaxy}:{$FlyingFleetRow.end_system}:{$FlyingFleetRow.end_planet}]
			</td></tr>
			</table>"></span>
			
			<span class="tooltip naves_misiones1" name="<table>
			<tr><th>
			{$fl_info_detail}
			</th></tr>
			<tr><td>
			{foreach key=name item=count from=$FlyingFleetRow.FleetList}
			<b><font color='orange'>{$name}:</font></b> {$count} <br />
			{/foreach}
			</td></tr>
			</table>"></span>
			
			<span class="tooltip info_misiones" name="<table>
			<tr><td>
			<b><font color='orange'>{$fl_mission}:</font></b> {$FlyingFleetRow.missionname}</td></tr>
			<tr><td>
			<b><font color='orange'>{$fl_departure}:</font></b><br /> {$FlyingFleetRow.start_time}
			</td></tr>
			<tr><td>
			<b><font color='orange'>{$fl_arrival}:</font></b><br /> {$FlyingFleetRow.end_time}
			</td></tr>
			</table>"></span>
			</table><center>
			<br /><br />
			<b>{$FlyingFleetRow.backin}</b><br /> 
			{if $FlyingFleetRow.way != 1} 
			<form action="?page=etoile&amp;action=sendfleetback" method="post">
			<input name="fleetid" value="{$FlyingFleetRow.id}" type="hidden" />
			<input type="submit" class="submit" value="&nbsp;{$fl_send_back}&nbsp;" class="campo_comun" />
			</form> 
			{if $FlyingFleetRow.mission == 1}
			<form action="?page=etoile&amp;action=getakspage" method="post">
			<input name="fleetid" value="{$FlyingFleetRow.id}" type="hidden" />
			<input value="&nbsp;{$fl_acs}&nbsp;" class="campo_comun" type="submit" />
			</form>
			{/if}
			{else}
			<font color="lime"><b>--{$fl_returning}--</b></font>
			{/if}
			</center></div> 
			<div class="misiones_footer"></div>			
		{foreachelse}
	<div class="misiones_top"></div>
	<div class="misiones"><center>
	<b>{$fl_no_misiones}</b>
	</center></div>	
	<div class="misiones_footer"></div>	
	{/foreach} 
		</div>	

		
</div>	
</div>
</div>	
</div>	
</div>
{if isset($smarty.get.alert)}
<script type="text/javascript">
alert(unescape("{$smarty.get.alert}"));
</script>
{/if}
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
<script type="text/javascript">
var ok1 = 1;
function selectionne() {
if (ok1 == 0) {
document.getElementById('non').style.display = "";
document.getElementById("oui").style.display = "none";

ok1 = 1;
}
else {
document.getElementById('oui').style.display = "";
document.getElementById('non').style.display = "none";

ok1 = 0;
}
} 
</script>

<script type="text/javascript">
var clignotement = function(){
   if (document.getElementById('DivClignotante').style.visibility=='visible'){
      document.getElementById('DivClignotante').style.visibility='hidden';
   }
   else{
   document.getElementById('DivClignotante').style.visibility='visible';
   }
};

// mise en place de l appel de la fonction toutes les 0.8 secondes
// Pour arrêter le clignotement : clearInterval(periode);
periode = setInterval(clignotement, 800);
</script> 