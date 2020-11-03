{include file="overall_header.tpl"}



{if $header == 1}<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=soldata">{/if}
{if $header == 2}<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=overview">{/if}

		
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
<div id="topnav" class="header_normal"> 	
		{include file="overall_topnav.tpl"}	
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$actualisation1}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">

<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="cajon">
        <h3>{$pe_construction}</h3>
        <div style="position:relative; height:80px">        	
<br><br><br>


{$actualisation}
		
		</div>

    </div>
	
	<br /><br />
	</div>
</div>
</div>	
</div>	
</div>
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}