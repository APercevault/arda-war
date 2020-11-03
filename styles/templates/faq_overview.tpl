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
				<div id="titular_texto" style="display: block;">{$lm_buildings} - <span>{$planetname}</span></div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div id="cabezza" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2.png);"></div>
<div id="eins_small">
 <div>	
 <br />
   <table width="95%">	
		<ul class="estructuras_c">






	<tr>
		<th>{$faq_overview}</th>
	</tr>
	{foreach key=Question item=Answer from=$FAQList}
	<tr>
		<th>{$Question}</th>
	</tr>
	<tr>
		<td class="left">
		{$Answer}
		</td>
	</tr>
	{/foreach}







    </table>
</div>
</div>	
<div class="new_footer_small"></div>		  
<br /><br /><br /><br /><br /><br />	
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