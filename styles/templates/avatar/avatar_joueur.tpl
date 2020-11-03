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
				<div id="titular_texto" style="display: block;">{$al_manage_image}</div>
			</div>
        </div>
	</div> 
{include file="left_menu.tpl"}
<div id="contenidoMostrado">                               
<div id="elCosoxD">
<div class="coso_izquierda_corto"></div>
<div class="coso_derecha_corto"></div>
<div id="planeta_small" style="background-image: url(styles/theme/{$Raza_skin}/adds/avatar.jpg);"></div>
<div id="titulo_alternativo_corto">
    <ul class="tabsbelow">
        <li>
              <span><b><font color="yellow" size = 2>{$al_change_logo}</font></b><a class="right" href="game.php?page=options"><b><font color="red" size = 2>>></font> <font size = 2>{$al_back}</font></b></a></span>
        </li>                                    
    </ul>
</div>

<div id="eins">
        <div>
		<br />
		
		
<b><span class="mercader_menu1" id="bla" style="visibility:visible"><font color="yellow" size = 5>Attention l'opération est irréversible</font></span></b>		

<p>
<br />		
		
<b><font color="yellow" size = 3>Fichier image de type : </font><font color="lime" size = 3>jpg, jepg, gif, png :</font></b>
<br /><br />
<b><font color="yellow" size = 3>Taille de l'image maxi (L x H): </font><font color="lime" size = 3>{$largeur} x {$hauteur}</font></b>
<br /><br />
<b><font color="yellow" size = 3>Poids de l'image maxi (octets): </font><font color="lime" size = 3>{$poids}</font></b>
<p>	
<br />	
<form method="post" enctype="multipart/form-data" action="game.php?page=options">
<input type="file" name="fichier" size="30" accept="image/*">
<p>
<br />
<input type="submit" class ="submit" name="upload" value="{$fl_continue}">

</p>
</form>

<br />
		
</div>
</div>
<div class="new_footer"></div>	
</div>	

<div id="menu_flotas">
		<div id="lista_misiones">    
             <p><b>{$al_manage_image}</b></p>  
			{if $ally_image}
			<div class="misiones_top"></div>
			<div class="misiones">
			<img class="tooltip" name="<img src={$ally_image}  width=300 height=300 />" src="{$ally_image}" width="147" height="147" /></td>
			</div> 
			<div class="misiones_footer"></div>						
			{/if}
	
</div>	

</div>
</div>
</div>
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
setInterval("blink(bla)",800);
</script>



<script type="text/javascript" language="JavaScript">
function check() {
  var ext = document.f.pic.value;
  ext = ext.substring(ext.length-3,ext.length);
  ext = ext.toLowerCase();
  if(ext == 'jpg' || ext == 'png' || ext == 'gif' || ext == 'jpeg') {
    return true; }
  else
      alert('Veuillez choisir s\'il vous plaît un fichier .jpg ou .png ou .gif !!!!!!');
    return false; }

</script>