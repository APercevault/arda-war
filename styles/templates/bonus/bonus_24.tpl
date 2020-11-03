{include file="overall_header.tpl"}

<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="">
<div id="cajaBG">
    <div id="caja">
	
<img src="styles/theme/{$Raza_skin}/imagenes/topnava.png"  />		
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$bonus24}</div>
			</div>
        </div>


<div id="menu_izquierdo">
        <ul id="menu_botones">
		</a>
<div id="texte" style="visibility:hidden"> 			
  		<li class="arriba_menu">
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/.png">
        </span>
	
		
</div>		
		</li>
		</ul>		
</div>		

<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/bonus24.jpg);"></div>

<div id="titulo_alternativo">
    <ul class="tabsbelow">
        <li>
<span><b><font color = yellow size =2>{$lm_bonus24}</font></b></span>




        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
   <table width="95%">		
	<ul class="estructuras_c">

	
 <a <span><b><font size="3"><font color=yellow>{$bo_bonus24}<br>
 <font color=lime>{$bo_metal}<font color=red>{$bo_titane}</font><br>
 <font color=lime>{$bo_deuterium}<font color=red>{$bo_deutdeut}</font><br>
 <font color=lime>{$bo_cristal}<font color=red>{$bo_cricri}</font><br>
 <font color=lime>{$bo_norio}<font color=red>{$bo_norionorio}</font><br><br><br></b></span></a>

	
	
{if $bonustpl == 2} <a <span><font size="5" id="bl" style="visibility:visible">Félicitation, vous venez de gagner le :<br> <font color=yellow>JACKPOT</font><br>soit :<br>Tous les Officiers <br>Pour une période de sept jours<br><br><br> </span></a>
{/if}	
	
	
	
	
	
	
	

			<tr>
			      <td><center>	
				  <form action="" method="post" >
				  <input type="button"  class="submit" name="game.php?page=overview" value="{$fl_continue}" onclick="self.location.href='game.php?page=overview'" onclick>
				  </form>
				  </td>

            </tr>		
	
	<ul>
    </table>
</div>
</div>	
<div class="new_footer"></div>
	  
<br /><br /><br /><br /><br /><br /><br /><br /><br />	
</div>
<div id="buildlist" style="display:none;"></div>  
<br/ ><br /><br />
</div>
</div>
</div>
</div>
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
setInterval("blink(bl)",500);

</script>