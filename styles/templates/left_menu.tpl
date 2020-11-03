<div id="menu_izquierdo">
        <ul id="menu_botones">
{if $planet_type == 1 && $bonustemplate == 1  && !CheckModule(43)}			
  		<li class="arriba_menu">
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton_2 " href="?page=bonus24"><span class="bonus24_menu" id="bl" style="visibility:visible">{$lm_bonus24}</span></a>
		</li>
	
		{/if}	

{if  !CheckModule(42)}		
 		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton_2 " href="?page=loterie"><span>{$lm_loterie}</span></a>
		</li>
{/if}
	
	
  		<li >
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton_2 " href="?page=overview"><span>{$lm_overview}</span></a>
		</li>
{if $planet_type == 1}		
		{if !CheckModule(15)}{$imperio}{/if}
		{if !CheckModule(3)}<li>
	    <span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=buildings&amp;mode=research"><span>{$lm_research}</span></a>
		</li>{/if}
{/if}		
		{if !CheckModule(2)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=buildings"><span>{$lm_buildings}</span></a>
		</li>{/if}
		{if !CheckModule(4)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=buildings&amp;mode=fleet"><span>{$lm_shipshard}</span></a>
		</li>{/if}
		{if !CheckModule(5)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=buildings&amp;mode=defense"><span>{$lm_defenses}</span></a>
		</li>{/if}

{if $planet_type == 1 && !CheckModule(44)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=soldata"><span>{$lm_soldats}</span></a>
		</li>
{/if}

{if $planet_type == 1 && !CheckModule(13)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=mercado"><span class="mercader_menu">{$lm_trader}</span></a>
		</li>
{/if}

{if $planet_type == 1 && !CheckModule(51)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=etoile"><span>{$lm_p_etoile}</span></a>
		</li>
{/if}

		{if !CheckModule(9)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=fleet"><span>{$lm_fleet}</span></a>
		</li>{/if}
		{if !CheckModule(28)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span><a class="menu_boton " href="?page=techtree"><span class="technology_menu">{$lm_technology}</span></a>
		</li>{/if}
{if $planet_type == 1}		
		{if !CheckModule(23)}<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span><a class="menu_boton " href="?page=resources"><span>{$lm_resources}</span></a>
		</li>{/if}
{/if}		
		{if !CheckModule(11)}<li><span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=galaxie"><span>galaxie</span></a>
		</li>{/if}

	
		
       {if !CheckModule(7)}<li>
	    <span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
        <a class="menu_boton " href="?page=chat"><span>{$lm_chat}</span></a>
		</li>{/if}

		
	
{if !CheckModule(0)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		{if $rights.seeapply && $req_count > 0}
		<a class="menu_boton "href="?page=alliance"><span ><font id="bll" style="visibility:visible" color="green">{$lm_alliance} ({$req_count})</font></span></a>
		{else}
		<a class="menu_boton "href="?page=alliance"><span>{$lm_alliance}</span></a>
		{/if}
		</li>
{/if}

{if !CheckModule(18)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=oficiales"><span class="mercader_menu">{$lm_officiers}</span></a>
		</li>
{/if}		

{if !CheckModule(45)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=gulvol"><span>{$lm_gulvol}</span></a>
		</li>
{/if}

{if !CheckModule(21)}
		<li>
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton " href="?page=banned"><span>{$lm_pilori}</span></a>
		</li>
{/if}
		
		{if !CheckModule(25)}<li class="abajo_menu">
		<span class="menu_icon">
		<img width="38" height="29" src="./styles/theme/{$Raza_skin}/imagenes/navegacion/menu_icon.png">
        </span>
		<a class="menu_boton_3 " href="?page=statistics"><span>{$lm_statistics}</span></a>
		</li>

		{/if}


		
    </ul>
{if !CheckModule(18)}	
	<div id="oficiales_menu">
	<a href="game.php?page=oficiales"><img src="styles/theme/{$Raza_skin}/imagenes/navegacion/oficiales/{$Comandante}" class="tooltip" name="{$comandante1}"></a>
	<a href="game.php?page=oficiales"><img src="styles/theme/{$Raza_skin}/imagenes/navegacion/oficiales/{$Geologo}" class="tooltip" name="{$geologo1}"></a>
	<a href="game.php?page=oficiales"><img src="styles/theme/{$Raza_skin}/imagenes/navegacion/oficiales/{$Almirante}" class="tooltip" name="{$almirante1}"></a>
	<a href="game.php?page=oficiales"><img src="styles/theme/{$Raza_skin}/imagenes/navegacion/oficiales/{$Ingeniero}" class="tooltip" name="{$ingeniero1}"></a>
	<a href="game.php?page=oficiales"><img src="styles/theme/{$Raza_skin}/imagenes/navegacion/oficiales/{$Tecnocrata}" class="tooltip" name="{$tecnocrata1}"></a>
	</div>
{/if}
	
	{if $closed}
	<table width="70%" id="infobox" style="border: 3px solid red; text-align:center; margin-left: 6px; margin-top: 3px;"><tr><td>{$closed}</td></tr></table>
	{elseif $delete}
	<table width="70%" id="infobox" style="border: 3px solid red; text-align:center; margin-left: 6px; margin-top: 3px;"><tr><td>{$tn_delete_mode} {$delete}</td></tr></table>
	{elseif $vacation}
	<table width="70%" id="infobox" style="border: 3px solid red; text-align:center; margin-left: 6px; margin-top: 3px;"><tr><td>{$tn_vacation_mode} {$vacation}</td></tr></table>
	{/if}
	<br /><br /><br /><br /><br /><br /><br /><br />
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
setInterval("blink(bll)",250);
</script>