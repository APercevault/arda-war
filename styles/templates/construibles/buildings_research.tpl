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
				<div id="titular_texto" style="display: block;">{$lm_research}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/investigaciones.jpg);"></div>
<div id="titulo_alternativo_corto">
    <ul class="tabsbelow">
        <li>
              <span><b><font color="lime" size = 2>{$lm_research} : </font>
	<class="mercader_menu1" id="bl2" style="visibility:visible">		  
{if $allow == "tech"}<font color="yellow" size = 2>{$bv_gene}</font>	{/if}
{if $allow == "tech1"}<font color="yellow" size = 2>{$bv_tech}</font>	{/if}	
{if $allow == "propulsion"}<font color="yellow" size = 2>{$bv_propul}</font>	{/if}	
{if $allow == "arme"}<font color="yellow" size = 2>{$bv_arme}</font>	{/if}	
{if $allow == "extration"}<font color="yellow" size = 2>{$bv_extra}</font>	{/if}				  
			  </b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 
       			      <td><center>	
				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=buildings&mode=research&mode1=1" value="{$bv_gene}" onclick="self.location.href='game.php?page=buildings&mode=research&mode1=1'" onclick>

				  
				  
				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=buildings&mode=research&mode1=2" value="{$bv_tech}" onclick="self.location.href='game.php?page=buildings&mode=research&mode1=2'" onclick>

				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=buildings&mode=research&mode1=3" value="{$bv_propul}" onclick="self.location.href='game.php?page=buildings&mode=research&mode1=3'" onclick>
				  
				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=buildings&mode=research&mode1=4" value="{$bv_arme}" onclick="self.location.href='game.php?page=buildings&mode=research&mode1=4'" onclick>

			  
				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=buildings&mode=research&mode1=5" value="{$bv_extra}" onclick="self.location.href='game.php?page=buildings&mode=research&mode1=5'" onclick>
				  
				  </form>				  
				  </td> 				  
				  
 <br />
    <table width="95%">	
	<ul class="estructuras_c">
		{foreach item=ResearchInfoRow from=$ResearchList}
			<li>
			
			
			
				<a href="#" onclick="return Dialog.info({$ResearchInfoRow.id})">
					<img class="tooltip" name="<table>
					<tr>
					<th colspan=2>{$ResearchInfoRow.name}</th>
					</tr>
					<tr>
					<td><img src={$dpath}gebaeude/{$ResearchInfoRow.id}.png width=140 height=140 /></td>
					<td>{$ResearchInfoRow.descr}<br /><font color=red>{$ResearchInfoRow.maxinfo}</font></td>
					</tr>
					</table>" src="{$dpath}gebaeude/{$ResearchInfoRow.id}.png" width="100" height="100" />
				</a>
				
				
				
				{if $ResearchInfoRow.lvl > 0}<div class="nivel_c"> <b style="cursor:help;" class="tooltip" name="{$bd_lvl} {$ResearchInfoRow.lvl}"><font color="yellow">{$bd_lvl}</font> <font color="lime"> {$ResearchInfoRow.lvl}</font> {if $ResearchInfoRow.elvl > 0} {$ResearchInfoRow.irv}{/if}</b></div>{/if}		
				<br />
				<div class="construir_c">{$ResearchInfoRow.link}</div>
				<div class="demas_c">
				<div class="recursos_c">{$ResearchInfoRow.price}</div>
				<div class="espacio_c"><br /></div>
				<div class="tiempo_c">
				<b>{$fgf_time}</b></font><br />{$ResearchInfoRow.time}
				</div>		
				</div>
			</li>
		{/foreach}
		<ul>
    </table>
</div>
</div>	
<div class="new_footer"></div>	
  {if $IsLabinBuild}<table width="70%" id="infobox" style="border: 2px solid red; text-align:center;background:transparent"><tr><td>{$bd_building_lab}</td></tr></table><br><br>{/if}	  
<br /><br /><br /><br /><br /><br /><br /><br />


	
</div>
<div id="buildlist" style="display:none;"></div>
<br/ ><br /><br />
</div>
</div>
</div>
</div>
{if $ScriptInfo}
<script type="text/javascript">
data	= {$ScriptInfo};
</script>
{/if}
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
setInterval("blink(bl2)",500);
</script>