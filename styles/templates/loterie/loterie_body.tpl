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
				<div id="titular_texto" style="display: block;">{$lo_loterie}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}


<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="cabezza" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2.png);"></div>
<div id="eins_small">
 <div>


<table width="95%">
    <tr>
	    <th><a <span><font size="2" color=#7BA604>{$lo_besion}
    </tr>
 </table>

</div>
</div> 
<div class="new_footer_small"></div>


<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="cabezza" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2.png);"></div>
<div id="eins_small">
 <div>	
 
 <table width="95%">
    <tr>
       <td class="c" colspan="4"><center><font color = #FACC2E size="3"><b>{$lo_loterie}</b></font></center></td>
    </tr>
  {if $Faltac >60 and $Cantidadm}   
    <tr>

       <th><a <span><font color=yellow size="3">{$lo_tol_ticket}</font> <br><b> <font color="#7DF909" size="3">{$Cantidad}</font></b></span></a>
<a><br> <span><font color=yellow size="2">(</font><font color=lime size="2">100 </font><font color=yellow size="2">{$lo_tol_ticket1}</font><font>)</font></span></a>	   
	   </th>
       <th><a <span><font size="2"><b><u><font color=yellow>{$lo_prix}</font></u></b>
{if $Cantidadm >0}<br><font color=lime>{$lo_quan_met}</font><font color=red>{$Cantidadm}</font>{/if}
{if $Cantidadc >0}<br><font color=lime>{$lo_quan_cri}</font><font color=red>{$Cantidadc}</font>{/if}
{if $Cantidadd >0}<br><font color=lime>{$lo_quan_deu}</font><font color=red>{$Cantidadd}</font>{/if}
{if $Cantidadn >0}<br><font color=lime>{$lo_quan_nor}</font><font color=red>{$Cantidadn}</font>{/if}

</br>
</font></span></a></th>
    </tr>
    <tr>
{if $tustickets < 100}	
       <td class="c" colspan="4"><a <span><center><font size="3">{$lo_ticket0}</font></center></span></a></td>
{else}	   
     <tralign="left">
       <th class="c" colspan="4" ><a <span><font size="3">{$lo_ticket1}</font></span></a>
	   <div id="DivClignotante" style="visibility:visible;">
	   <a <span><font size="4"> <font size="5" color=#FA5882><b>{$lo_ticket2}</b></font><br> </span></a>
	   </div> 
	   </th>	 
{/if}	   
    </tr>
    <tr>
       <th class="c" colspan="2">
{if $tustickets < 100}	      

       <form method="POST" action="game&#46;php?page=loterie&cp=compra">
       <select name="Tickets" style="background-color:#08088A;>
	   <OPTION value="0">0</OPTION>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
       <option value="6">6</option>
       <option value="7">7</option>
       <option value="8">8</option>
       <option value="9">9</option>
       <option value="10">10</option>
       <option value="20">20</option>
	   <option value="30">30</option>
	   <option value="40">40</option>
	   <option value="50">50</option>
	   <option value="60">60</option>
	   <option value="70">70</option>
	   <option value="80">80</option>
	   <option value="90">90</option>
	   <option value="100">100</option>
	   </select>
       <input class="submit" type="submit" value={$lo_acheter} name="compra">
    </form>
{/if}
{else}	

  <a <span><font size="4"> <font color="yellow"><b>{$lo_acces}</b></font><br> </span></a></th>
{/if} 

 <a <span><font size="4">{$lo_poceder0}<font color="yellow">{$tustickets}</font> {$lo_poceder1}&#46;</font></span></a></th>

    </tr>
    <tr>
       <td class="c" colspan="4">
	   <div id="DivClignotante" style="visibility:visible;">
	   <B><font size="3">{$MensajeCompra}</font></B>
	   </div>
	   </td>
    </tr>
    <tr>
       <th class="c" colspan="4"></th>
    </tr>
{if $usuarios}	
    <tr>
	       <td class="c" colspan="4"><a <span><center><font size="3">{$lo_poceder2}</font></span></a></td>
    </tr>
	<tr>
    <tralign="left">
       <th class="c" colspan="4" ><a <span><font size="2">{$usuarios}</font></span></a><br></th>
    </tr>
 {/if}	
 {if $Faltac <60} 
    <tr>
    <tralign="left">
	
       <th class="c" colspan="4" ><a <span><font size="3">{$lo_tirage}{$Faltac}{$lo_tirage1}</font></span></a></th>
    </tr>	 
 {else}	
    <tr>
    <tralign="left">
	
       <th class="c" colspan="4" ><a <span><font size="3">{$usuariostime}</font></span></a></th>
    </tr>
 {/if}
 {if $gagnant}	
	<tr>
     <tralign="left">
	
       <th class="c" colspan="4" ><a <span><font size="3">{$lo_gagnant0}</font></span></a></th>
    </tr>
 

 
  	<tr>
     <tralign="left">

       <th class="c" colspan="4" ><a <span><font size="3">{$lo_gagnant1}</font><br><font color="lime" size="3">{$gagnant}</font></span></a>
{if $met >0}<br><font color="yellow">{$lo_gag_met}&#58; </font>{$met}{/if}
{if $cri >0}<br><font color="yellow">{$lo_gag_cri}&#58; </font>{$cri}{/if}
{if $det >0}<br><font color="yellow">{$lo_gag_deu}&#58;</font>{$det}{/if}
{if $nor >0}<br><font color="yellow">{$lo_gag_nor}&#58;</font>{$nor}{/if}	 
 {if $matnoire >0}<br><font color="yellow">{$lo_gag_mat}&#58;</font>{$matnoire}{/if}
 
{/if}
 </th>
    </tr>
 
 </table>
 
	
	
	
	
	
	
	
   	
</div>
</div>	
<div class="new_footer_small"></div>		  
<br /><br /><br /><br /><br /><br /><br /><br /><br />	<br /><br /><br />
</div>
<div id="buildlist" style="display:none;"></div>  
<br/ ><br /><br />
</div>
</div>
</div>
</div>
{if $data}
<script type="text/javascript">
data	= {$data};
</script>
{/if}
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}

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