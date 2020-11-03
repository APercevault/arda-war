<tr>
	<th style="width:60px;">{$st_position}</th>
	<th>{$st_player}</th>
	<th></th>
	<th>{$st_alliance}</th>
	<th>{$Raza}</th>
	<th>{$st_points}</th>
	<th>{$st_avatar}</th>
</tr>
{foreach name=RangeList item=RangeInfo from=$RangeList}
<tr class="semi_remarcado">
	<td>
	<a>{$RangeInfo.rank}</a>
	</td>
	
	<td><a href="#" onclick="return Dialog.Playercard({$RangeInfo.id}, '{$RangeInfo.name}');">
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza != $raza_dif}
	<font color="#E40303"><b>{$RangeInfo.name}</b></font>
	{/if}   
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza == $raza_dif}
	<font color="#AAC305"><b>{$RangeInfo.name}</b></font>
	{/if}  
	{if $RangeInfo.id == $CUser_id}
	<b>{$RangeInfo.name}</b>
	{/if}
	</a></td>
	
	<td>
	{if $RangeInfo.id != $CUser_id}
	<a href="#" onclick="return Dialog.PM({$RangeInfo.id});">
	<img src="{$dpath}imagenes/otros/m.gif" title="{$st_write_message}" alt="{$st_write_message}" />
	</a>
	{/if}
	</td>
	
	<td>
	{if $RangeInfo.allyid != 0}
	<a href="game.php?page=alliance&amp;mode=ainfo&amp;a={$RangeInfo.allyid}">
	{if $RangeInfo.allyid == $CUser_ally}
	<span style="color:#33CCFF">{$RangeInfo.allyname}</span>
	{else}
	{$RangeInfo.allyname}
	{/if}
	</a>
	{/if}
	</td>
	
	{if {$RangeInfo.raza} == 0}<td>
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza != $raza_dif}
	<font color="#E40303"><b class="tooltip" name="<img src='styles/theme/gultra/imagenes/gultra.png' height='120' width='120'>">{$gultra}</b></font>
	{/if}   
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza == $raza_dif}
	<font color="#AAC305"><b class="tooltip" name="<img src='styles/theme/gultra/imagenes/gultra.png' height='120' width='120'>">{$gultra}</b></font>
	{/if}  
	{if $RangeInfo.id == $CUser_id}
	<b class="tooltip" name="<img src='styles/theme/gultra/imagenes/gultra.png' height='120' width='120'>">{$gultra}</b>
	{/if}  
	</td>{/if}
	
	{if {$RangeInfo.raza} == 1}<td>
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza != $raza_dif}
	<font color="#E40303"><b class="tooltip" name="<img src='styles/theme/voltra/imagenes/voltra.png' height='120' width='120'>">	{$voltra}</b></font>
	{/if}   
	{if $RangeInfo.id != $CUser_id and $RangeInfo.raza == $raza_dif}
	<font color="#AAC305"><b class="tooltip" name="<img src='styles/theme/voltra/imagenes/voltra.png' height='120' width='120'>">	{$voltra}</b></font>
	{/if}  
	{if $RangeInfo.id == $CUser_id}
	<b class="tooltip" name="<img src='styles/theme/voltra/imagenes/voltra.png' height='120' width='120'>">{$voltra}</b>
	{/if}  
	</td>{/if}
	<td>{$RangeInfo.points}</td>
	<td><img class="tooltip" name="<img src={$RangeInfo.avatar}  width=300 height=300 />" src="{$RangeInfo.avatar}" width="40" height="40" /></td>
</tr>
{/foreach}