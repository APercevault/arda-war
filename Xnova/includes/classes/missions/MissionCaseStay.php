<?php

/**
 _  \_/ |\ | /¯¯\ \  / /\    |¯¯) |_¯ \  / /¯¯\ |  |   |´¯|¯` | /¯¯\ |\ | 
 ¯  /¯\ | \| \__/  \/ /--\   |¯¯\ |__  \/  \__/ |__ \_/   |   | \__/ | \|
*/

class MissionCaseStay extends MissionFunctions
{
	function __construct($Fleet)
	{
		$this->_fleet	= $Fleet;
	}
	
	function TargetEvent()
	{	
		global $LANG;
		$LNG				= $LANG->GetUserLang($this->_fleet['fleet_owner']);
		
		$TargetUserID       = $this->_fleet['fleet_target_owner'];
$Fleetsold = explode(" ", $this->_fleet['fleet_array']);
if ($Fleetsold[0] < 230)	{			
	$TargetMessage      = sprintf($LNG['sys_stat_mess'], GetTargetAdressLink($this->_fleet, ''), pretty_number($this->_fleet['fleet_resource_metal']), $LNG['Metal'], pretty_number($this->_fleet['fleet_resource_crystal']), $LNG['Crystal'], pretty_number($this->_fleet['fleet_resource_deuterium']), $LNG['Deuterium'], pretty_number($this->_fleet['fleet_resource_norio']), $LNG['Norio']);}
if ($Fleetsold[0] > 230)	{			
	$TargetMessage      = sprintf($LNG['sys_stat_messa'], GetTargetAdressLink($this->_fleet, ''), pretty_number($this->_fleet['fleet_resource_metal']), $LNG['Metal'], pretty_number($this->_fleet['fleet_resource_crystal']), $LNG['Crystal'], pretty_number($this->_fleet['fleet_resource_deuterium']), $LNG['Deuterium'], pretty_number($this->_fleet['fleet_resource_norio']), $LNG['Norio']);}	
		SendSimpleMessage($TargetUserID, 0, $this->_fleet['fleet_start_time'], 5, $LNG['sys_mess_tower'], $LNG['sys_stat_mess_stay'], $TargetMessage);
		
		$this->RestoreFleet(false);
	}
	
	function EndStayEvent()
	{
		return;
	}
	
	function ReturnEvent()
	{
		global $LANG;
		$LNG				= $LANG->GetUserLang($this->_fleet['fleet_owner']);
	
		$TargetUserID       = $this->_fleet['fleet_target_owner'];
$Fleetsold = explode(" ", $this->_fleet['fleet_array']);
if ($Fleetsold[0] < 230)	{			
	$TargetMessage      = sprintf($LNG['sys_stat_mess'], GetStartAdressLink($this->_fleet, ''), pretty_number($this->_fleet['fleet_resource_metal']), $LNG['Metal'], pretty_number($this->_fleet['fleet_resource_crystal']), $LNG['Crystal'], pretty_number($this->_fleet['fleet_resource_deuterium']), $LNG['Deuterium'], pretty_number($this->_fleet['fleet_resource_norio']), $LNG['Norio']);}
if ($Fleetsold[0] > 230)	{			
	$TargetMessage      = sprintf($LNG['sys_stat_messa'], GetStartAdressLink($this->_fleet, ''), pretty_number($this->_fleet['fleet_resource_metal']), $LNG['Metal'], pretty_number($this->_fleet['fleet_resource_crystal']), $LNG['Crystal'], pretty_number($this->_fleet['fleet_resource_deuterium']), $LNG['Deuterium'], pretty_number($this->_fleet['fleet_resource_norio']), $LNG['Norio']);}	
		SendSimpleMessage($TargetUserID, 0, $this->_fleet['fleet_end_time'], 5, $LNG['sys_mess_tower'], $LNG['sys_stat_mess_stay'], $TargetMessage);
		
		$this->RestoreFleet();
	}
}
?>