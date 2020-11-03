               <script language="JavaScript">
			   
	metala = {$metala};
	crystala= {$crystala};
	deuteriuma = {$deuteriuma};				   
			   
 titane_leger = {$titane_leger}; titane_lourd = {$titane_lourd}; titane_archeologue = {$titane_archeologue}; titane_scientifique = {$titane_scientifique}; titane_malp = {$titane_malp}; titane_drone = {$titane_drone}; titane_unas = {$titane_unas}; titane_jaffa = {$titane_jaffa}; titane_anubis = {$titane_anubis};
 
 silicium_leger = {$silicium_leger}; silicium_lourd = {$silicium_lourd}; silicium_archeologue = {$silicium_archeologue}; silicium_scientifique = {$silicium_scientifique}; silicium_malp = {$silicium_malp}; silicium_drone = {$silicium_drone}; silicium_unas = {$silicium_unas}; silicium_jaffa = {$silicium_jaffa}; silicium_anubis = {$silicium_anubis};
 
 deterium_leger = {$deterium_leger}; deterium_lourd = {$deterium_lourd}; deterium_archeologue = {$deterium_archeologue}; deterium_scientifique = {$deterium_scientifique}; deterium_malp = {$deterium_malp}; deterium_drone = {$deterium_drone}; deterium_unas = {$deterium_unas}; deterium_jaffa = {$deterium_jaffa}; deterium_anubis = {$deterium_anubis}; 

titane_leger2 =	titane_lourd2 =	titane_archeologue2 =	titane_scientifique2 =	titane_malp2 =	titane_drone2 =	titane_unas2 =	titane_jaffa2 =	titane_anubis2 = 0 ;

silicium_leger2 =	silicium_lourd2 =	silicium_archeologue2 =	silicium_scientifique2 =	silicium_malp2 =	silicium_drone2 =	silicium_unas2 =	silicium_jaffa2 =	silicium_anubis2 = 0 ;

deterium_leger2 =	deterium_lourd2 =	deterium_archeologue2 =	deterium_scientifique2 =	deterium_malp2 =	deterium_drone2 =	deterium_unas2 =	deterium_jaffa2 =	deterium_anubis2 = 0 ;
	
titane_total = silicium_total = deterium_total = 0 ;	

                </script>

<script language="javascript">
function leger(text){
var objet = document.getElementById("leger");
var objet1 = document.getElementById("leger1");
var objet2 = document.getElementById("leger2");
document.getElementById("texte").style.visibility = "";
objet.style.color='white';
objet1.style.color='white'; 
objet2.style.color='white';
objet.style.marginLeft = "-445px"; 
objet1.style.marginLeft = "-455px"; 
objet2.style.marginLeft = "-470px"; 

var titane_leger1=titane_leger ; var silicium_leger1=silicium_leger ; var deterium_leger1=deterium_leger ;
var titane_lourd1=titane_lourd ; var silicium_lourd1=silicium_lourd ; var deterium_lourd1=deterium_lourd ;
var titane_archeologue1=titane_archeologue ; var silicium_archeologue1=silicium_archeologue ; var deterium_archeologue1=deterium_archeologue ;
var titane_scientifique1=titane_scientifique ; var silicium_scientifique1=silicium_scientifique ; var deterium_scientifique1=deterium_scientifique ;
var titane_malp1=titane_malp ; var silicium_malp1=silicium_malp ; var deterium_malp1=deterium_malp ;
var titane_drone1=titane_drone ; var silicium_drone1=silicium_drone ; var deterium_drone1=deterium_drone ;
var titane_unas1=titane_unas ; var silicium_unas1=silicium_unas ; var deterium_unas1=deterium_unas ;
var titane_jaffa1=titane_jaffa ; var silicium_jaffa1=silicium_jaffa ; var deterium_jaffa1=deterium_jaffa ;
var titane_anubis1=titane_anubis ; var silicium_anubis1=silicium_anubis ; var deterium_anubis1=deterium_anubis ;

if (text == 1) {
for (i=0; i<document.forms.f.choix_leger.options.length; i++) {
  if (document.forms.f.choix_leger. options[i].selected ) {
      titane_leger2 = titane_leger1 * document.forms.f.choix_leger.options[i].text;
	  silicium_leger2 = silicium_leger1 * document.forms.f.choix_leger.options[i].text;
	  deterium_leger2 = deterium_leger1 * document.forms.f.choix_leger.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
  }
}
}

if (text == 2) {
for (i=0; i<document.forms.f.choix_lourd.options.length; i++) {
  if (document.forms.f.choix_lourd. options[i].selected ) {
      titane_lourd2 = titane_lourd1 * document.forms.f.choix_lourd.options[i].text;
	  silicium_lourd2 = silicium_lourd1 * document.forms.f.choix_lourd.options[i].text;
	  deterium_lourd2 = deterium_lourd1 * document.forms.f.choix_lourd.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 3) {
for (i=0; i<document.forms.f.choix_archeologue.options.length; i++) {
  if (document.forms.f.choix_archeologue. options[i].selected ) {
      titane_archeologue2 = titane_archeologue1 * document.forms.f.choix_archeologue.options[i].text;
	  silicium_archeologue2 = silicium_archeologue1 * document.forms.f.choix_archeologue.options[i].text;
	  deterium_archeologue2 = deterium_archeologue1 * document.forms.f.choix_archeologue.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 4) {
for (i=0; i<document.forms.f.choix_scientifique.options.length; i++) {
  if (document.forms.f.choix_scientifique. options[i].selected ) {
      titane_scientifique2 = titane_scientifique1 * document.forms.f.choix_scientifique.options[i].text;
	  silicium_scientifique2 = silicium_scientifique1 * document.forms.f.choix_scientifique.options[i].text;
	  deterium_scientifique2 = deterium_scientifique1 * document.forms.f.choix_scientifique.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 5) {
for (i=0; i<document.forms.f.choix_malp.options.length; i++) {
  if (document.forms.f.choix_malp. options[i].selected ) {
      titane_malp2 = titane_malp1 * document.forms.f.choix_malp.options[i].text;
	  silicium_malp2 = silicium_malp1 * document.forms.f.choix_malp.options[i].text;
	  deterium_malp2 = deterium_malp1 * document.forms.f.choix_malp.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 6) {
for (i=0; i<document.forms.f.choix_drone.options.length; i++) {
  if (document.forms.f.choix_drone. options[i].selected ) {
      titane_drone2 = titane_drone1 * document.forms.f.choix_drone.options[i].text;
	  silicium_drone2 = silicium_drone1 * document.forms.f.choix_drone.options[i].text;
	  deterium_drone2 = deterium_drone1 * document.forms.f.choix_drone.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 7) {
for (i=0; i<document.forms.f.choix_unas.options.length; i++) {
  if (document.forms.f.choix_unas. options[i].selected ) {
      titane_unas2 = titane_unas1 * document.forms.f.choix_unas.options[i].text;
	  silicium_unas2 = silicium_unas1 * document.forms.f.choix_unas.options[i].text;
	  deterium_unas2 = deterium_unas1 * document.forms.f.choix_unas.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 8) {
for (i=0; i<document.forms.f.choix_jaffa.options.length; i++) {
  if (document.forms.f.choix_jaffa. options[i].selected ) {
      titane_jaffa2 = titane_jaffa1 * document.forms.f.choix_jaffa.options[i].text;
	  silicium_jaffa2 = silicium_jaffa1 * document.forms.f.choix_jaffa.options[i].text;
	  deterium_jaffa2 = deterium_jaffa1 * document.forms.f.choix_jaffa.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	

  }
}
}
if (text == 9) {
for (i=0; i<document.forms.f.choix_anubis.options.length; i++) {
  if (document.forms.f.choix_anubis. options[i].selected ) {
      titane_anubis2 = titane_anubis1 * document.forms.f.choix_anubis.options[i].text;
	  silicium_anubis2 = silicium_anubis1 * document.forms.f.choix_anubis.options[i].text;
	  deterium_anubis2 = deterium_anubis1 * document.forms.f.choix_anubis.options[i].text;
	  
	  titane_total = titane_leger2 + titane_lourd2 +	titane_archeologue2 +	titane_scientifique2 +	titane_malp2 +	titane_drone2 +	titane_unas2 +	titane_jaffa2 +	titane_anubis2;	
	  
	  silicium_total = silicium_leger2 + silicium_lourd2 +	silicium_archeologue2 +	silicium_scientifique2 +	silicium_malp2 +	silicium_drone2 +	silicium_unas2 +	silicium_jaffa2 +	silicium_anubis2;	

	  deterium_total = deterium_leger2 + deterium_lourd2 +	deterium_archeologue2 +	deterium_scientifique2 +	deterium_malp2 +	deterium_drone2 +	deterium_unas2 +	deterium_jaffa2 +	deterium_anubis2;	
	  


  }
}
}
if (titane_total >= metala ) {
objet.style.color='red';
document.getElementById("texte").style.visibility = "hidden";
}
 objet.innerHTML ='<font color="white">Titane     : </font>' + titane_total + " / " + metala;

 if (silicium_total >= crystala ) {
objet1.style.color='red'; 
document.getElementById("texte").style.visibility = "hidden";
}
 objet1.innerHTML ='<font color="white">Silicium  : </font>' + silicium_total + " / " + crystala ; 
 
 if (deterium_total >= deuteriuma ) {
objet2.style.color='red'; 
document.getElementById("texte").style.visibility = "hidden";
}
 objet2.innerHTML = '<font color="white">Deuterium : </font>' + deterium_total + " / " + deuteriuma ;

 if (deterium_total < 1  && silicium_total < 1 && titane_total < 1) {
document.getElementById("texte").style.visibility = "hidden";
}
 
}



</script>
{if $plani_soldat <> 1}
<center><span style="color:#DBA901"><b>{$totalofficiers}</b></span></center>
<center><span style="color:#DBA901"><b>{$manque}{$officier1}{$officier2}{$officier3}{$officier4}{$officier5}</b></span></center>
{/if}

<form action="game.php?page=soldata" method="post" name="f" >
<li>

{if $actividad700a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/230a.png" width="40" height="40" />

{else}

				
			
   				
				<img class="" name="<table>
				
				<a	</table>" src="styles/theme/{$Raza_skin}/gebaeude/230b.png" width="40" height="40" />
				
				
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_leger" onchange="couleur(this);leger(1);" id="choix_leger" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}
</li>

<li>

{if $actividad701a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/231a.png" width="40" height="40" />

{else}

					
			
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/231b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_lourd" onchange="couleur(this);leger(2);" id="choix_lourd" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}			
</li>

<li>

{if $actividad702a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/232a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/232b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_archeologue" onchange="couleur(this);leger(3);" id="choix_archeologue" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}					
</li>

<li>

{if $actividad703a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/233a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/233b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_scientifique" onchange="couleur(this);leger(4);" id="choix_scientifique" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}					
</li>

<li>

{if $actividad704a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/234a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/234b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_malp" onchange="couleur(this);leger(5);" id="choix_malp" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}					
</li>

<li>

{if $actividad705a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/235a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/235b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_drone" onchange="couleur(this);leger(6);" id="choix_drone" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}				
</li>

<li>

{if $actividad706a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/236a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/236b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_unas" onchange="couleur(this);leger(7);" id="choix_unas" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}					
</li>

<li>

{if $actividad707a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/237a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/237b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_jaffa" onchange="couleur(this);leger(8);" id="choix_jaffa" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>
			

				</div>	
{/if}					
</li>

<li>

{if $actividad708a == 3 OR $plani_soldat == 1}
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/238a.png" width="40" height="40" />

{else}

		
					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/238b.png" width="40" height="40" />
				
				<br />
			</a>

			

			
				<div class="tiempo_c">
<select name="choix_anubis" onchange="couleur(this);leger(9);" id="choix_anubis" style="background-color:#08088A;">			

  <OPTION value="0">0</OPTION>
   {if $c_militaire >= 3} <OPTION value="3">3</OPTION> {/if}
   {if $c_militaire >= 6} <OPTION value="6">6</OPTION> {/if}
   {if $c_militaire >= 9} <OPTION value="9">9</OPTION> {/if}
   {if $c_militaire >= 12} <OPTION value="12">12</OPTION> {/if}
   {if $c_militaire >= 15} <OPTION value="15">15</OPTION> {/if}
   {if $c_militaire >= 18} <OPTION value="18">18</OPTION> {/if}
   {if $c_militaire >= 21} <OPTION value="21">21</OPTION> {/if}
   {if $c_militaire >= 24} <OPTION value="24">24</OPTION> {/if}
   {if $c_militaire >= 27} <OPTION value="27">27</OPTION> {/if}
   {if $c_militaire >= 30} <OPTION value="30">30</OPTION> {/if}
</SELECT>

			

				</div>	
{/if}	
</li>
{if $plani_soldat1 ==1}
<br><br><br><br>


<input type="hidden"  name="plani_soldat2"  value="1">
<input name="supprimer" type="image" src="styles/theme/{$Raza_skin}/gebaeude/buttons3.gif"   />

{/if}
{if $plani_soldat == 1 and $plani_soldat1 <>1}
<br><br><br><br><br><br><br>

					<img class="" name="<table>

					</table>" src="styles/theme/{$Raza_skin}/gebaeude/buttons2.gif " />
{/if}					
{if $plani_soldat == 1}
 <br />
		{if $plani_leger > 1}	<br><FONT color="#00FF00" size= "2">{$plani_leger}</FONT><font color="yellow" size= "2"> soldats l&eacute;gers</font>{/if}	
		{if $plani_lourd > 1}	<br><FONT color="#00FF00" size= "2">{$plani_lourd}</FONT><font color="yellow" size= "2"> soldats lourds</font>{/if}
		{if $plani_archeologue > 1}	<br><FONT color="#00FF00" size= "2">{$plani_archeologue}</FONT><font color="yellow" size= "2"> arch&eacute;ologues</font>{/if}
		{if $plani_scientifique > 1}	<br><FONT color="#00FF00">{$plani_scientifique}</FONT><font color="yellow" size= "2"> scientifiques</font>{/if}	
		{if $plani_malp > 1}	<br><FONT color="#00FF00" size= "2">{$plani_malp}</FONT><font color="yellow" size= "2"> malps</font>{/if}	
		{if $plani_drone > 1}	<br><FONT color="#00FF00" size= "2">{$plani_drone}</FONT><font color="yellow" size= "2"> drones</font>{/if}
		{if $plani_unas > 1}	<br><FONT color="#00FF00" size= "2">{$plani_unas}</FONT><font color="yellow" size= "2"> unas</font>{/if}	
		{if $plani_jaffa > 1}	<br><FONT color="#00FF00" size= "2">{$plani_jaffa}</FONT><font color="yellow" size= "2"> jaffas</font>{/if}
		{if $plani_anubis > 1}	<br><FONT color="#00FF00" size= "2">{$plani_anubis}</FONT><font color="yellow" size= "2"> anubis</font>{/if}
		{if $plani_soldat1 <> 1}
	
    <body>
 <br> 
 <br /> 
<div> <font color="yellow" size= "3" id="compte_a_rebours"></font></div>
 
               <script language="JavaScript">
                        time_plani = {$time_plani};
						var_rebours = 1;
                        compte_a_rebours();
			
                </script>
<script type="text/javascript">

function compte_a_rebours()
{
	var compte_a_rebours = document.getElementById("compte_a_rebours");
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

		compte_a_rebours.innerHTML = prefixe + jours + ' ' + mot_jour + ' ' + heures + ' ' + mot_heure + ' ' + minutes + ' ' + mot_minute + ' ' + et + ' ' + secondes + ' ' + mot_seconde;
	}
	else
	{
	
		if (var_rebours == 1){ var_rebours = 5 ; window.location.replace('game.php?page=soldata') }
		
	}

	var actualisation = setTimeout("compte_a_rebours();", 1000);
}
compte_a_rebours();
</script>
 
        </body>
{/if}		
		{if $plani_leger < 1}	<br>{/if}
		{if $plani_lourd < 1}	<br>{/if}
		{if $plani_archeologue < 1}	<br>{/if}
		{if $plani_scientifique < 1}	<br>{/if}	
		{if $plani_malp < 1}	<br>{/if}
		{if $plani_drone < 1}	<br>{/if}
		{if $plani_unas < 1}	<br>{/if}
		{if $plani_jaffa < 1}	<br>{/if}
		{if $plani_anubis < 1}	<br>{/if}
		{if $planitime > 1}		<br>{/if}
 
		
<br><br>

{/if}
{if $plani_soldat == 0}
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <body>
 <br>       
<div id="leger" style="position:relative;font-size: 12px;"></div>
<div id="leger1" style="position:relative;font-size: 12px;"></div>
<div id="leger2" style="position:relative;font-size: 12px;"></div>
  </body>

 <br>
 <div id="texte" style="visibility:hidden"> 
<p align="left">
<input type="hidden"  name="OK"  value="1">
<input id="afficher_cacher" name="supprimer" type="image" src="styles/theme/{$Raza_skin}/gebaeude/buttons.gif"
 onclick="if(!confirm('Voulez-vous continuer la planification ?')) return false;"  />
</div>
</form>

</p>	
{/if}
	



		
<script type="text/javascript">
function couleur(obj){ //je passe le select en paramètre
    for(var i=0;i<obj.options.length;i++){ //je parcours tous les <option>
        obj.options[i].style.color='white'; //je les mets tous en noir
    }
    obj.options[obj.selectedIndex].style.color='red'; //je met le <option> en rouge dans la liste
    obj.style.color='#00FF00'; //je met le <option> en rouge dans le select
}
couleur(document.getElementById('game.php?page=soldata'));
</script>