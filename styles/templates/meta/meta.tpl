{include file="overall_header.tpl"}


{if $meta == 1}
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=overview">
{/if}
{if $meta == 2}
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=galaxy">
{/if}
{if $meta == 3}
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=./game.php?page=galaxy2d">
{/if}		
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
<div id="topnav" class="header_normal"> 	
		{include file="overall_topnav.tpl"}	
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$lm_galaxy}</div>
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


{if $meta == 1}{$meta1}{/if}	
{if $meta == 2}{$meta2}{/if}
{if $meta == 3}{$meta3}{/if}
		
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