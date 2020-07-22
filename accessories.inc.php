<?php
	// Maps
	$lang_maps_bf3 = array("Caspian Border", "Damavand Peak", "Grand Bazaar", "Kharg Island", "Noshahr Canals", "Operation Firestorm", "Operation Métro", "Seine Crossing", "Tehran Highway");
	$lang_maps_btk = array("Gulf of Oman", "Sharqi Peninsula", "Strike at Karkand", "Wake Island");
	$lang_maps_cq = array("Donya Fortress", "Operation 925", "Scrapmetal", "Ziba Tower");
	$lang_maps_ak = array("Alborz Mountain", "Amoured Shield", "Bandar Desert", "Death Valley");
	$lang_maps_am = array("Azadi Palace", "Epicenter", "Markaz Monolith", "Talah Market");
	$lang_maps_eg = array("Kiasar Railroad", "Nebandan Flats", "Operation Riverside", "Sabalan Pipeline");

	// Player Classes, Descriptions, Specialisations
	$lang_player_class = array("Assault", "Engineer", "Support", "Recon");
	$lang_player_desc = array("Jet Pilot 1", "Jet Pilot 2", "Heli Pilot", "Heli Gunner", "Tank Driver 1", "Tank Driver 2", "Tank Driver 3", "Repair Bitch 1", "Repair Bitch 2", "Repair Bitch 3");
	$lang_player_spec = array("SQD AMMO", "SQD COVR", "SQD EXPL", "SQD FLAG", "SQD FRAG", "SQD SPRINT", "SQD SUPP");
	
	// Vehicle Equipments 1, 2, 3
	$lang_vehicle_equip1 = array("Auto Loader", "Maintenance", "Proximity Scan", "Thermal Camo", "Reactive Armor", "Stealth", "Air Radar", "Beam Scanning", "Laser Painter", "Guided Rocket");
	$lang_vehicle_equip2 = array("IR Smoke", "Zoom Optics", "Thermal Optics", "Flairs", "Extinguisher", "ECM Jammer");
	$lang_vehicle_equip3 = array("Coaxial LMG", "Coaxial HMG", "Guided Shell", "Canister Shell", "ATGM-Launcher", "APFSDS-T Shell", "Heat Seekers", "TV Missle", "Rocket Pods");

	// Check String
	function checkstring($string, $type, $length)
	{
		$type = "is_" . $type;
		
		if(!$type($string))
			return false;

		else if(empty($string))
			return false;

		else if(strlen($string) > $length)
			return false;

		else
			return true;
	}

	// Check Number
	function checknumber($number, $length)
	{
		if(is_numeric($number))
		{
			$number = preg_replace("/[^0-9]/", "", $number);
			return true;
		}

		else
		{
			echo "Input failed.";
			exit();
		}
	}
?>
