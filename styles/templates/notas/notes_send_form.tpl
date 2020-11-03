{include file="overall_header.tpl"}
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
	
<img src="styles/theme/{$Raza_skin}/imagenes/topnava.png"  />		
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$nt_create_note}</div>
			</div>
        </div>
<div id="cabezzaa" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2a.png);"></div>
<div id="eins_smalla">
 <div>	
<form action="?page=notes&amp;action=send" method="POST">
  <table style="width:90%;">
    <tr>
      <th colspan="2">{$nt_create_note}</th>
    </tr>
    <tr>
      <td>{$nt_priority}</td>
      <td>
        <select name="priority">
			<option value="2">{$nt_important}</option>
			<option value="1" selected>{$nt_normal}</option>
			<option value="0">{$nt_unimportant}</option>
        </select>
      </td>
    </tr>
    <tr>
      <td>{$nt_subject_note}</td>
      <td>
        <input type="text" name="title" size="30" maxlength="30">
      </td>
    </tr>
    <tr>
      <td>{$nt_note} (<span id="cntChars">0</span> / 5000 {$nt_characters})</th>
      <td>
        <textarea name="text" cols="80" rows="30" onkeyup="$('#cntChars').text($(this).val().length);"></textarea>
      </td>
    </tr>
    <tr>
      <td><input type="button"  class="submit" name="game.php?page=notes" value="{$nt_back}" onclick="self.location.href='game.php?page=notes'" onclick>
	  
      <td>
        <input type="reset" class="submit" value="{$nt_reset}">
        <input type="submit" class="submit" value="{$nt_save}">
      </td>
    </tr>
  </table>
</form>
</div>
</div>
<div class="new_footer_smalla"></div>	
</div>
</div>
</div>
</div>
</div>

{include file="overall_footer.tpl"}