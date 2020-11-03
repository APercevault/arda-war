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
				<div id="titular_texto" style="display: block;">{$sal_recru}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>

<div id="titulo_alternativo_corto">

    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$Uppformation}</font></b></span>
        </li>                                    
    </ul>
</div>
<div id="eins">
 <div>	
 <br />
   <table width="95%">		
	<ul class="estructuras_c">
		 {include file="soldat/soldat_row.tpl"}
		 
	<ul>
    </table>
</div>
</div>	
<div class="new_footer"></div>
<!-- CAJA MATERIA OSCURA -->


<!-- ICI la suite -->
<div id="titulo_alternativo_corto">

    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$s_formation}</font></b></span>
        </li>                                    
    </ul>
</div>


<div id="eins">
 <div>	
 <br />
   <table width="95%">		
	<ul class="estructuras_c">
		   <table width="95%">		
	<ul class="estructuras_c">
		 {include file="soldat/soldat_row1.tpl"}
		 
	<ul>
	
    </table> 

	<ul>
    </table>
</div>
</div>	
<div class="new_footer"></div>

<!-- FIN  de la suite -->	
<!-- ICI la suite -->	 



<!-- FIN  de la suite -->	 
<br /><br /><br />
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