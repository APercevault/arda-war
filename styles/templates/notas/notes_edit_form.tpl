{include file="overall_header.tpl"}
<body id="mercado">
<div id="tooltip" class="tip"></div>
<div class="contenido_big">
<div id="cajaBG">
    <div id="caja">
	
<img src="styles/theme/{$Raza_skin}/imagenes/topnava.png"  />		
			<div id="titular">
			<div id="estructura_titular" style="position:relative;">
				<div id="titular_texto" style="display: block;">{$nt_edit_note}</div>
			</div>
        </div>
<div id="cabezzaa" style="background-image: url(styles/theme/{$Raza_skin}/imagenes/navegacion/head2a.png);"></div>
<div id="eins_smalla">
 <div>	
<form action="?page=notes&amp;action=send&amp;id={$id}" method="POST">
  <table style="width:90%;">
    <tr>
      <th colspan="2">{$nt_edit_note}</th>
    </tr>
    <tr>
      <td>{$nt_priority}</td>
      <td>
		{html_options name=priority style="background-color: black;" options=$PriorityList selected=$priority}
      </td>
    </tr>
    <tr>
      <td>{$nt_subject_note}</td>
      <td>
        <input type="text" name="title" size="30" maxlength="30" value="{$ntitle}">
      </td>
    </tr>
    <tr>
      <td>{$nt_note} (<span id="cntChars">0</span> / 5000 {$nt_characters})</td>
      <td>
        <textarea name="text" id="text" cols="80" rows="30" onkeyup="$('#cntChars').text($(this).val().length);">{$ntext}</textarea>
      </td>
    </tr>
    <tr>
      <td><input type="button"  class="submit" name="game.php?page=notes" value="{$nt_back}" onclick="self.location.href='game.php?page=notes'" onclick> </td>
      <td>
        <input type="reset" class="submit" value="{$nt_reset}">
        <input type="submit" class="submit" value="{$nt_save}">
      </td>
    </tr>
  </table>
</form>
<script type="text/javascript">
$('#cntChars').text($('#text').val().length);
</script>
</div>
</div>
<div class="new_footer_small"></div>	
	
</div>
</div>
</div>
</div>
</div>

{include file="overall_footer.tpl"}