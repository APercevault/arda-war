<table style="width:95%">
    <tr>
		<th><font color=yellow size=2><b>{$sh_tag}</th>
		<th><font color=yellow size=2><b>{$sh_name}</th>
		<th><font color=yellow size=2><b>{$sh_members}</th>
		<th><font color=yellow size=2><b>{$sh_points}</th>

    </tr>
	{foreach item=SearchInfo from=$SearchResult}
	<tr>
		<td><a href="game.php?page=alliance&amp;mode=ainfo&amp;tag={$SearchInfo.allytag}">{$SearchInfo.allytag}</a></td>
		<td>{$SearchInfo.allyname}</td>
		<td>{$SearchInfo.allymembers}</td>
		<td>{$SearchInfo.allypoints}</td>
		<td>

			<img class="tooltip" name="<img src={$SearchInfo.allyimage}  width=300 height=300 />" src="{$SearchInfo.allyimage}" width="30" height="30" />

		</td>
	</tr>
	{/foreach}
</table>
