    <table style="width:95%">
        <tr>
          <th><font color=yellow size=2><b>{$sh_name}</th>
          <th>&nbsp;</th>
          <th><font color=yellow size=2><b>{$sh_alliance}</th>
          <th><font color=yellow size=2><b>{$sh_planet}</th>
          <th><font color=yellow size=2><b>{$sh_coords}</th>
          <th><font color=yellow size=2><b>{$sh_position}</th>


        </tr>

{foreach item=SearchInfo from=$SearchResult}
<tr>
     <td><a href="#" onclick="return Dialog.Playercard({$SearchInfo.userid})">{$SearchInfo.username}</a></td>
     <td><a href="#" onclick="return Dialog.PM({$SearchInfo.userid})"><img src="{$dpath}imagenes/otros/m.gif"/></a>&nbsp;<a href="javascript:OpenPopup('game.php?page=buddy&amp;mode=2&amp;u={$SearchInfo.userid}','', 720, 300);" title="{$sh_buddy_request}"><img src="{$dpath}imagenes/otros/b.gif" border="0"></a></td>
     <td>{if {$SearchInfo.allyname}}<a href="game.php?page=alliance&amp;mode=ainfo&amp;a={$SearchInfo.allyid}">{$SearchInfo.allyname}</a>{else}-{/if}</td>
     <td>{$SearchInfo.planetname}</td>
     <td><a href="game.php?page=galaxy&amp;mode=3&amp;galaxy={$SearchInfo.galaxy}&amp;system={$SearchInfo.system}">[{$SearchInfo.galaxy}:{$SearchInfo.system}:{$SearchInfo.planet}]</a></td>
     <td>{$SearchInfo.rank}</td>
	 <td>{$SearchInfo.avat}</td>
{if {$SearchInfo.avatar}}	 
	 <td>

			<img class="tooltip" name="<img src={$SearchInfo.avatar}  width=300 height=300 />" src="{$SearchInfo.avatar}" width="30" height="30" />

	 </td>
{/if}	 
</tr>
{/foreach}
    </table>
