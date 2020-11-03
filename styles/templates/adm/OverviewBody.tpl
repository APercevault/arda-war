{include file="adm/ShowTopnavPage.tpl"}
<br>
<script type="text/javascript" src="./scripts/buildlist.js"></script>
<center>
<h1>{$ow_title}</h1>
<table width="75%" style="border:2px {if empty($Messages)}lime{else}red{/if} solid;text-align:center;font-weight:bold;">
<tr>
    <td class="transparent">{foreach item=Message from=$Messages}
	<span style="color:red">{$Message}</span><br>
	{foreachelse}{$ow_none}{/foreach}
	</td>
</tr>
</table>
 <table width="60%">
	<tr>
	<th colspan="2"><h3>Xnova Revolution Team</h3></th>
	</tr>
<tr align="center">
	  <td><a href="" target="_blank"><b>Destiny</b></a></td>
	  <td>Leader<br />Programmer<br />Designer<td>
	</tr>
	<tr align="center">
	  <td><b>Destiny</b></td>
	  <td>Xnova<td>
	</tr>
	<tr align="center">
	  <td><b>Destiny</b></td>
	  <td>Xnova<td>
	</tr>

	</table>
<script type="text/javascript">
$(document).ready(function(){
	$('.UIStory_Message').css("color","#CCCCCC");
});
</script>
{include file="adm/ShowMenuPage.tpl"}