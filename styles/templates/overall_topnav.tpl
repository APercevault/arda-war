
<a href="?page=changelog" id="changelog_link" class="tipsStandard"></a>         
        <div id="bar">
			<b><ul>
				<li><a href="?page=faq">{$lm_faq}</a></li>
				<li>{if !CheckModule(17)}<a href="?page=notes" target="notes">{$lm_notes}</a>{/if}</li>
				<li>{if !empty($forum_url)}<a href="{$forum_url}" target="forum">{$lm_forums}</a>{/if}</li>
				<li>{if !CheckModule(22)}<a href="javascript:OpenPopup('?page=records','{$lm_records}', 1024, 768);">{$lm_records}</a>{/if}</li>
				{if !CheckModule(16)}<li><a href="?page=messages">{$lm_messages}{if $new_message > 0}<span id="newmes"> (<span id="newmesnum"><blink><font color="lime">{$new_message}</font></blink></span>)</span>{/if}</a></li>{/if}
				<li>{if !CheckModule(12)}<a href="?page=topkb">{$lm_topkb}</a>{/if}</li>
				<li>{if !CheckModule(26)}<a href="?page=search">{$lm_search}</a>{/if}</li>
				<li><a href="?page=options">{$lm_options}</a></li>
				{if !CheckModule(6)}<li><a href="?page=buddy">{$lm_buddylist}</a></li>{/if}
				{if !CheckModule(39)}<li><a href="?page=battlesim">{$lm_battlesim}</a></li>{/if}
				<li>{if !empty($lm_credits)}<a href="?page=creditos">{$lm_credits}</a>{/if}</li>
				<!--<li>{if !CheckModule(7)}<a href="?page=chat">{$lm_chat}</a>{/if} </li>-->
				{if !CheckModule(27)}<li><a href="?page=support">{$lm_support}</a></li>{/if}
				<li><a href="?page=logout"><font color="red">{$lm_logout}</font></a></li>
				{if $authlevel > 0}<li><a href="./admin.php" style="color:lime">{$lm_administration}</a></li>{/if}
            </ul></b>
        </div> 
		
    	<ul id="recursos">


 
<script type="text/javascript">

 
function horloge(el) {
  if(typeof el=="string") { el = document.getElementById(el); }
  function actualiser() {
    var date = new Date();
	var ladate ="";

	ladate +="<b><font color=yellow>Nous sommes le : ";
	ladate +="<font color=lime>"+date.getDate()+"/"+(date.getMonth()+1)+"/"+date.getFullYear()+"<b/><font/>";
    var str ="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color=yellow>Il est : "+"<font color=lime>"+date.getHours();
    str += ':'+(date.getMinutes()<10?'0':'')+date.getMinutes();
    str += ':'+(date.getSeconds()<10?'0':'')+date.getSeconds();
    el.innerHTML ="<b>"+ladate+"<br />"+str;
  }
  actualiser();
  setInterval(actualiser,1000);
}

</script>
                <div id="div_horloge"></div>
                <script language="JavaScript">
                 horloge('div_horloge');
                </script>		
		
{if $planet_type == 1}
        <br />
		
    <body>
                               
                <script language="JavaScript">
               
                function t()
                {
			var prixVSL =  {$prixVSL};
            var compteur=document.getElementById('compteur');

            s=duree;
            m=0;h=0;j=0;m1=0;h1=0;j1=0;
            if(s<1)
                        {
                                compteur.innerHTML="<b><font color=yellow>D&eacute;placement VSL du vaisseau OK</font><br />"+"<font color=lime>Prix : "+"</font>"+"<font color=red>"+prixVSL+"<font color=lime>"+" Mat.Noire"
            }
                        else
{
                                if(s>59){ m=Math.floor(s/60);s=s-m*60}
                                if(m>59){ h=Math.floor(m/60);m=m-h*60}
								if(h>23){ j=Math.floor(h/24);h=h-j*24}
				j1=j
				h1=h
				m1=m
				s1=s
                if(s<10) { s="0"+s}
				s=s+" s "
				
                if(m<10){ m="0"+m}
				m=m+" m--"

				 if(j1 ==0 && m1==0 && h1==0) { m=""}		
                if(h<10){ h="0"+h}
				h=h+" h--"

                if(h1==0 && j1==0) { h=""}	
                if(j<1){ j=""}				
                if(j>0){ j=j+" J--"}
                  compteur.innerHTML="<b><font color=yellow>Mode VSL dans : </font><br /><font color=lime>"+j+h+m+s+"<br /><font color=yellow>Le prix sera de : "+"</font>"+"<font color=red>"+prixVSL+"<font color=yellow>"+" Mat.Noire"
}


            duree=duree-1;
            window.setTimeout("t();",999);

        }
               
                </script>
                <div id="compteur"></div>
                <script language="JavaScript">
                        duree = {$vsltime};
                        t();
                </script>
        </body>

{/if}

            

        	<li class="metal">
               <a style="cursor:help" class="tooltip" name="<h3>{$Metal}</h3><hr />{$Metal}: {pretty_number($metal)}&nbsp;&nbsp;&nbsp; <br /> {if $settings_tnstor}{$almacenes}: {$metal_max}{else}{$almacenes}: {$alt_metal_max}{/if}"> <img src="styles/theme/{$Raza_skin}/images/metal.jpg" /></a>
                <span class="valor">
						<b>{$metales1}</b>
						<span id="current_metal">{$metales}</span>
<style type="text/css">
   #current_metal { display: none; }
</style>

				</span>
            </li>
        	<li class="cristal">
               <a style="cursor:help" class="tooltip" name="<h3>{$Crystal}</h3><hr />{$Crystal}: {pretty_number($crystal)}&nbsp;&nbsp;&nbsp; <br /> {if $settings_tnstor}{$almacenes}: {$crystal_max}{else}{$almacenes}: {$alt_crystal_max}{/if}"> <img src="styles/theme/{$Raza_skin}/images/cristal.jpg" /></a>
					<span class="valor">
						<b>{$cristales1}</b>
						<span id="current_crystal">{$cristales}</span>
<style type="text/css">
   #current_crystal { display: none; }
</style>
                </span>
            </li>
        	<li class="deuterio">
                <a style="cursor:help" class="tooltip" name="<h3>{$Deuterium}</h3><hr />{$Deuterium}: {pretty_number($deuterium)}&nbsp;&nbsp;&nbsp; <br />{if $settings_tnstor}{$almacenes}: {$deuterium_max}{else}{$almacenes}: {$alt_deuterium_max}{/if}"><img src="styles/theme/{$Raza_skin}/images/deuterio.jpg" /></a>
                <span class="valor">
						<b>{$deuterios1}</b>
						<span id="current_deuterium">{$deuterios}</span>
<style type="text/css">
   #current_deuterium { display: none; }
</style>
               	</span>
            </li>
			<li class="norio">
				<a style="cursor:help" class="tooltip" name="<h3>{$Energy}</h3><hr />{$energy} / {$energy_maxx}"><img src="styles/theme/{$Raza_skin}/images/energia.jpg" /></a>
					<span class="valor">
						<span><b>{$energia}</b></span>
                </span>
            </li>
        	<li class="energia">
				<a style="cursor:help" class="tooltip" name="<h3>{$Norio}</h3><hr />{$Norio}: {pretty_number($norio)}&nbsp;&nbsp;&nbsp;<br /> {if $settings_tnstor}{$almacenes}: {$norio_max}{else}{$almacenes}: {$alt_norio_max}{/if}"><img src="styles/theme/{$Raza_skin}/images/norio.jpg" /></a>
                <span class="valor">
						<b>{$norios1}</b>
                    	<span id="current_norio">{$norios}</span>
<style type="text/css">
   #current_norio { display: none; }
</style>
                </span>
            </li>
        	<li class="materia_oscura">
			<a href="game.php?page=materiaoscura" class="tooltip" name="{$Darkmatter}: {$darkmatter}"><img src="styles/theme/{$Raza_skin}/images/materia.png" /></a>	
                <span class="valor">
                    	<span><b>{$darkmatter}</b></span>
                </span>
            </li>


{if $plani_soldat ==1}	
 <div style="text-align:right">	
   <body>
 <br>       
<div id="compte_a_rebours1"></div>

               <script language="JavaScript">
                        time_plani = {$time_plani};
						compte_a_rebours1();
			
                </script>
<script type="text/javascript">

function compte_a_rebours1()
{
	var compte_a_rebours1 = document.getElementById("compte_a_rebours1");
	var d = new Date();	
	var date_actuelle = d.getTime();
	var date_evenement = time_plani *1000;
	var total_secondes = (date_evenement - date_actuelle) / 1000;

	var prefixe = "Fin de la planification dans : ";
	if (total_secondes < 0)
	{
		prefixe = "La planification est termin&eacute;e. "; 

	}

	if (total_secondes > 0)
	{
		var jours = Math.floor(total_secondes / (60 * 60 * 24));
		var heures = Math.floor((total_secondes - (jours * 60 * 60 * 24)) / (60 * 60));
		minutes = Math.floor((total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60))) / 60);
		secondes = Math.floor(total_secondes - ((jours * 60 * 60 * 24 + heures * 60 * 60 + minutes * 60)));

		var et = "et";
		var mot_jour = "jours,";
		var mot_heure = "heures,";
		var mot_minute = "minutes,";
		var mot_seconde = "secondes";

		if (jours == 0)
		{
			jours = '';
			mot_jour = '';
		}
		else if (jours == 1)
		{
			mot_jour = "jour,";
		}

		if (heures == 0)
		{
			heures = '';
			mot_heure = '';
		}
		else if (heures == 1)
		{
			mot_heure = "heure,";
		}

		if (minutes == 0)
		{
			minutes = '';
			mot_minute = '';
		}
		else if (minutes == 1)
		{
			mot_minute = "minute,";
		}

		if (secondes == 0)
		{
			secondes = '';
			mot_seconde = '';
			et = '';
		}
		else if (secondes == 1)
		{
			mot_seconde = "seconde";
		}

		if (minutes == 0 && heures == 0 && jours == 0)
		{
			et = "";
		}

		compte_a_rebours1.innerHTML = prefixe + jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + et + ' ' + secondes + ' ' + mot_seconde;
	}
	else
	{
	
		compte_a_rebours1.innerHTML = prefixe
		
	}

	var actualisation = setTimeout("compte_a_rebours1();", 1000);
}
compte_a_rebours1();
</script>
 
        </body>
</div>	
{/if}		
 </li>

			
			
		</ul>	