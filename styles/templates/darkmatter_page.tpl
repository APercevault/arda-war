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
				<div id="titular_texto" style="display: block;">{$Darkmatter}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda"></div>
<div class="coso_derecha"></div>
<div id="planeta" style="background-image: url(styles/theme/{$Raza_skin}/adds/materia_oscura.jpg);"></div>
<div id="titulo_alternativo">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2><b>{$caja}1</font></b></span>
        </li>                                    
    </ul>
</div>



<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/gebaeude/materia_venta.png" align="top" width="80" height="80">
</td>
<td>
<font color=yellowgreen size="2"><b>{$cantidad_norio1_materia} {$de_materia}</b></font>
<br /><br />
<center><b><font color="orange">{$Norio}:</font> {$cantidad_norio1}</b></center>
</td>
{if $c_norio > $norio1}
<td align="right"><a href="?page=materiaoscura&pack=norio1"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;</span></div></a></td>
{/if}
</tr>
</table>
</div>
</div>	
<div class="new_footer"></div>	

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2>{$caja}2</font></b></span>
        </li>                                    
    </ul>
</div>


<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/gebaeude/materia_venta.png" align="top" width="80" height="80">
</td>
<td>
<font color=yellowgreen size="2"><b>{$cantidad_norio2_materia} {$de_materia}</b></font>
<br /><br />
<center><b><font color="orange">{$Norio}:</font> {$cantidad_norio2}</b></center>
</td>
{if $c_norio > $norio2}
<td align="right"><a href="?page=materiaoscura&pack=norio2"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;</span></div></a></td>
{/if}
</tr>
</table>
</div>
</div>	
<div class="new_footer"></div>	

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2>{$caja}3</font></b></span>
        </li>                                    
    </ul>
</div>



<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/gebaeude/materia_venta.png" align="top" width="80" height="80">
</td>
<td>
<font color=yellowgreen size="2"><b>{$cantidad_norio3_materia} {$de_materia}</b></font>
<br /><br />
<center><b><font color="orange">{$Norio}:</font> {$cantidad_norio3}</b></center>
</td>
{if $c_norio > $norio3}
<td align="right"><a href="?page=materiaoscura&pack=norio3"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;</span></div></a></td>
{/if}
</tr>
</table>
</div>
</div>	
<div class="new_footer"></div>	

<div id="titulo_alternativo_secundario">
    <ul class="tabsbelow">
        <li>
              <span><b><font color=yellow size=2>{$caja}4</font></b></span>
        </li>                                    
    </ul>
</div>



<div id="eins">
 <div>	
 <br />
<table width="95%">
<tr>
<td width="130">
<img border="0" src="styles/theme/{$Raza_skin}/gebaeude/materia_venta.png" align="top" width="80" height="80">
</td>
<td>
<font color=yellowgreen size="2"><b>{$cantidad_norio4_materia} {$de_materia}</b></font>
<br /><br />
<center><b><font color="orange">{$Norio}:</font> {$cantidad_norio4}</b></center>
</td>
{if $c_norio > $norio4}
<td align="right"><a href="?page=materiaoscura&pack=norio4"><div class="cancelar_c"><span class="comprar_c">{$comprar}&nbsp;</span></div></a></td>
{/if}
</tr>
</table>
</div>
</div>	
<div class="new_footer"></div>	

<br /><br /><br /><br /><br /><br />	
</div>
</div>
</div>
</div>
</div>
{include file="planet_menu.tpl"}
{include file="overall_footer.tpl"}