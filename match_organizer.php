<!--
#############################################################################
# Copyright 2013 Ramon Fischer                                              #
#                                                                           #
# Licensed under the Apache License, Version 2.0 (the "License");           #
# you may not use this file except in compliance with the License.          #
# You may obtain a copy of the License at                                   #
#                                                                           #
#     http://www.apache.org/licenses/LICENSE-2.0                            #
#                                                                           #
# Unless required by applicable law or agreed to in writing, software       #
# distributed under the License is distributed on an "AS IS" BASIS,         #
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.  #
# See the License for the specific language governing permissions and       #
# limitations under the License.                                            #
#############################################################################
-->

<html>
<head>
<title>Battlefield 3 - Clan Match Organizer by keks24</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>
<body>
<h1>Clan Match Organizer</h1>
<?php
	include "accessories.inc.php";
	
	$update = "21.08.2013";

	echo "<hr color = '#000000'>";
	
	echo "<form action = 'output_and_save.php' method = 'post'>";
	echo "<h2><input name = 'clan1' size = '2' maxlength = '4' />" . " vs. " . "<input name = 'clan2' size = '2' maxlength = '4' /></h2>";

	echo "<p><table>";
	echo "<tr>";
	echo "<td>Date: <select name = 'day'>";
	for($date_day=1; $date_day<=31; $date_day++)
	{
		if($date_day == date("d"))
			echo "<option value = '" . date("d") . "' selected = 'selected' />" . date("d") . "</option>";

		else if($date_day <= 9)
			echo "<option value = '0" . $date_day . "' />0" . $date_day . "</option>";

		else
			echo "<option value = '" . $date_day . "' />" . $date_day . "</option>";
	}
	echo "</select></td>";

	echo "<td><select name = 'month'>";
	for($date_month=1; $date_month<=12; $date_month++)
	{	
		if($date_month == date("m"))
			echo "<option value = '" . date("m") . "' selected = 'selected' />" . date("m") . "</option>";

		else if($date_month <= 9)
			echo "<option value = '0" . $date_month . "' />0" . $date_month . "</option>";

		else
			echo "<option value = '" . $date_month . "' />" . $date_month . "</option>";
	}
	echo "</select></td>";
	
	echo "<td><select name = 'year'>";
	for($date_year=date("Y"); $date_year<=2100; $date_year++)
	{	
		if($date_year == date("Y"))
			echo "<option value = '" . date("Y") . "' selected = 'selected' />" . date("Y") . "</option>";

		else
			echo "<option value = '" . $date_year . "' />" . $date_year . "</option>";
	}
	echo "</select></td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>Time: <select name = 'hour'>";
	for($time_hour=0; $time_hour<=23; $time_hour++)
	{	
		if($time_hour == date("H"))
			echo "<option value = '" . date("H") . "' selected = 'selected' />" . date("H") . "</option>";
			
		else if($time_hour <= 9)
			echo "<option value = '0" . $time_hour . "' />0" . $time_hour . "</option>";
		
		else
			echo "<option value = '" . $time_hour . "' />" . $time_hour . "</option>";
	}
	echo "</select></td>";
	
	echo "<td><select name = 'minute'>";
	for($time_minute=0; $time_minute<=59; $time_minute++)
	{
		if($time_minute == date("i"))
			echo "<option value = '" . date("i") . "' selected = 'selected' />" . date("i") . "</option>";
			
		else if($time_minute <= 9)
			echo "<option value = '0" . $time_minute . "' />0" . $time_minute . "</option>";
	
		else
			echo "<option value = '" . $time_minute . "' />" . $time_minute . "</option>";
	}
	echo "</select></td>";
	echo "</tr>";
	echo "</table></p>";
	
	echo "<p><table>";
	for($i=1; $i<=5; $i++)
	{
		echo "<tr>";
		echo "<td>Map $i:</td>";
		echo "<td><select name = 'map$i'>";
		echo "<option value '' selected = 'selected' />Choose a map ...</option>";

		for($bf3=0; $bf3<=8; $bf3++)
		{
			echo "<option value = '" . $lang_maps_bf3[$bf3] . "' />" . $lang_maps_bf3[$bf3] . "</option>";

			if($bf3 == 8)
				echo "<option value = '' /></option>";
		}
		
		for($btk=0; $btk<=3; $btk++)
		{
			echo "<option value = '" . $lang_maps_btk[$btk] . "' />" . $lang_maps_btk[$btk] . "</option>";

			if($btk == 3)
				echo "<option value = '' /></option>";
		}

		for($cq=0; $cq<=3; $cq++)
		{
			echo "<option value = '" . $lang_maps_cq[$cq] . "' />" . $lang_maps_cq[$cq] . "</option>";

			if($cq == 3)
				echo "<option value = '' /></option>";
		}

		for($ak=0; $ak<=3; $ak++)
		{
			echo "<option value = '" . $lang_maps_ak[$ak] . "' />" . $lang_maps_ak[$ak] . "</option>";

			if($ak == 3)
				echo "<option value = '' /></option>";
		}

		for($am=0; $am<=3; $am++)
		{
			echo "<option value = '" . $lang_maps_am[$am] . "' />" . $lang_maps_am[$am] . "</option>";

			if($am == 3)
				echo "<option value = '' /></option>";
		}

		for($eg=0; $eg<=3; $eg++)
		{
			echo "<option value = '" . $lang_maps_eg[$eg] . "' />" . $lang_maps_eg[$eg] . "</option>";
		}
		echo "</select></td>";
		echo "</tr>";
	}
	
	echo "<tr>";
	echo "<td>Rules:</td>";
	echo "<td><textarea name = 'rules' rows = '5' cols = '30'></textarea></td>";
	echo "<td><font size = '2'>Keep blank, if no rules.</font></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>Host:</td>";
	echo "<td><select name = 'host'>";
	echo "<option value = 'Who hosts the match?' selected = 'selected' />Who hosts the match?</option>";
	echo "<option value = 'We host the match!' />We host the match!</option>";
	echo "<option value = 'The opponent hosts the match!' />The opponent hosts the match!</option>";
	echo "</tr>";
	echo "</table></p>";

	echo "<hr color = '#000000'>";

	echo "<p><table>";
	echo "<tr>";
	echo "<th><i>Team Name</i></th>";
	echo "<th><i>Player Name</i></th>";
	echo "<th><i>Player Class</i></th>";
	echo "<th><i>Player Desc</i></th>";
	echo "<th><i>Specialisation</i></th>";
	echo "<th><i>Vehicle Equip1</i></th>";
	echo "<th><i>Vehicle Equip2</i></th>";
	echo "<th><i>Vehicle Equip3</i></th>";
	echo "</tr>";
	
	for($j=1; $j<=12; $j++)
	{
		echo "<tr>";
		if($j == 1)
			echo "<th>Squad 1</th>";
			
		else if($j == 5)
			echo "<th>Squad 2</th>";

		else if($j == 9)
			echo "<th>Squad 3</th>";
				
		else
			echo "<td></td>";
			
		echo "<td><input name = 'playername$j' size = '14' maxlength = '16' /></td>";

		echo "<td>";
		echo "<select name = 'playerclass$j'>";
		echo "<option value = '' selected = 'selected' />Choose a class ...</option>";
		for($player_class=0; $player_class<=3; $player_class++)
		{
			echo "<option value = '" . $lang_player_class[$player_class] . "' />" . $lang_player_class[$player_class] . "</option>";
		}
		echo "</select>";
		echo "</td>";

		echo "<td>";
		echo "<select name = 'playerdesc$j'>";
		echo "<option value = '' selected = 'selected' />Choose a desc ...</option>";
		for($player_desc=0; $player_desc<=9; $player_desc++)
		{
			echo "<option value = '" . $lang_player_desc[$player_desc] . "' />" . $lang_player_desc[$player_desc] . "</option>";

			if($player_desc == 1 || $player_desc == 3 || $player_desc == 6)
				echo "<option value = '' /></option>";
		}
		echo "</select>";
		echo "</td>";

		echo "<td>";
		echo "<select name = 'playerspec$j'>";
		echo "<option value = '' selected = 'selected' />Choose a spec ...</option>";
		for($player_spec=0; $player_spec<=6; $player_spec++)
		{
			echo "<option value = '" . $lang_player_spec[$player_spec] . "' />" . $lang_player_spec[$player_spec] . "</option>";
		}
		echo "</select>";
		echo "</td>";

		echo "<td>";
		echo "<select name = 'vehicleequipa$j'>";
		echo "<option value = '' selected = 'selected' />Choose a vequip...</option>";
		for($vehicle_equip1=0; $vehicle_equip1<=9; $vehicle_equip1++)
		{
			echo "<option value = '" . $lang_vehicle_equip1[$vehicle_equip1] . "' />" . $lang_vehicle_equip1[$vehicle_equip1] . "</option>";

			if($vehicle_equip1 == 4)
				echo "<option value = '' /></option>";
		}
		echo "</select>";
		echo "</td>";

		echo "<td>";
		echo "<select name = 'vehicleequipb$j'>";
		echo "<option value = '' selected = 'selected' />Choose a vequip ...</option>";
		for($vehicle_equip2=0; $vehicle_equip2<=5; $vehicle_equip2++)
		{
			echo "<option value = '" . $lang_vehicle_equip2[$vehicle_equip2] . "' />" . $lang_vehicle_equip2[$vehicle_equip2] . "</option>";

			if($vehicle_equip2 == 2)
				echo "<option value = '' /></option>";
		}
		echo "</select>";
		echo "</td>";

		echo "<td>";
		echo "<select name = 'vehicleequipc$j'>";
		echo "<option value = '' selected = 'selected' />Choose a vequip ...</option>";
		for($vehicle_equip3=0; $vehicle_equip3<=8; $vehicle_equip3++)
		{
			echo "<option value = '" . $lang_vehicle_equip3[$vehicle_equip3] . "' />" . $lang_vehicle_equip3[$vehicle_equip3] . "</option>";

			if($vehicle_equip3 == 3 || $vehicle_equip3 == 5)
				echo "<option value = '' /></option>";
		}
		echo "</select>";
		echo "</td>";
		echo "</tr>";

		if($j == 4 || $j == 8)
		{
			echo "<tr>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "<td><hr color = '#FFFFFF' /></td>";
			echo "</tr>";
		}
	}
	echo "</table></p>";

	echo "<div align = 'center'>";
	echo "<input type = 'submit' name = 'send' /> <input type = 'reset'><br />";
	echo "<font size = '2'>Made by keks24 (" . $update . ")</font>";
	echo "</div>";
?>
</body>
</html>
