<html>
<head>
<title>Battlefield 3 - Clan Match Organizer by keks24</title>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
</head>
<body>
<h1>Clan Match Organizer</h1>
<?php
	if($_POST["send"] == true)
	{
		$top = "╔════════════════════════════════╗" . "\n";
		$text = "║Clan Match Organisator by keks24║" . "\n";
		$bottom = "╚════════════════════════════════╝" . "\n\n";
		$date = date("d.m.y");
		
		$filename = $_POST["clan1"] . "_vs._" . $_POST["clan2"] . "_(" . $_POST["day"] . "." . $_POST["month"] . "." . $_POST["year"] . ").txt";
		$file = fopen("data/" . $filename, "w") or die("Something went wrong.");
		fwrite($file, $top . $text . $bottom);
		
		echo "<p><h2>" . "[" . $_POST["clan1"] . "]" . " vs. " . "[" . $_POST["clan2"] . "]" . "</h2></p>";
		fwrite($file, "[" . $_POST["clan1"] . "]" . " vs." . " [" . $_POST["clan2"] . "]" . "\n\n");
		
		echo "<hr color = '#000000'>";
	
		echo "<p><table>";
		echo "<tr><td>Date: " . $_POST["day"] . "." . $_POST["month"] . "." . $_POST["year"] . "</td></tr>";
		fwrite($file, "Date: " . $_POST["day"] . "." . $_POST["month"] . "." . $_POST["year"] . "\n");
		echo "<tr><td>Time: " . $_POST["hour"] . ":" . $_POST["minute"] . "</td></tr>";
		fwrite($file, "Time: " . $_POST["hour"] . ":" . $_POST["minute"] . "\n\n");
		echo "</table></p>";
		
		echo "<p><table>";
		for($i=1; $i<=5; $i++)
		{
			if(empty($_POST["map$i"]))
				echo "<tr><td></td></tr>";
			
			else
			{
				echo "<tr>";
				echo "<td>Map $i: " . $_POST["map$i"] . "<td>";
				echo "</tr>";
				fwrite($file, "Map $i: " . $_POST["map$i"] . "\n");
			}
		}
	
		if(empty($_POST["rules"]))
		{
			echo "<tr><td><hr color = '#FFFFFF'></td></tr>";
			echo "<tr><td>Rules: No Rules!</td></tr>";
			fwrite($file, "\n" . "Rules: No Rules!" . "\n");
		}
		
		else
		{
			echo "<tr><td><hr color = '#FFFFFF'></td></tr>";
			echo "<tr><td>Rules: " . $_POST["rules"] . "</td></tr>";
			fwrite($file, "\n" . "Rules: " . $_POST["rules"] . "\n");
		}
	
		echo "<tr><td>Host: " . $_POST["host"] . "</td></tr>";
		fwrite($file, "Host:  " . $_POST["host"] . "\n\n");
			
		echo "</table></p>";
	
		echo "<hr color = '#000000'>";
	
		echo "<p><table cellspacing = '4' cellpadding = '2'>";
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
	
		fwrite($file, str_pad("Team Name", 20) . str_pad("Player Name", 20) . str_pad("Player Class", 20) . str_pad("Player Desc", 20) . str_pad("Specialisation", 20) . str_pad("Vehicle Equip1", 20) . str_pad("Vehicleequip2", 20) . str_pad("Vehicleequip3", 20) . "\n\n");
	
		for($j=1; $j<=12; $j++)
		{
			echo "<tr>";
			if($j == 1)
			{
				echo "<th>Squad 1</th>";
				fwrite($file, str_pad("Squad 1", 20));
			}
				
			else if($j == 5)
			{
				echo "<th>Squad 2</th>";
				fwrite($file, str_pad("Squad 2", 20));
			}
	
			else if($j == 9)
			{
				echo "<th>Squad 3</th>";
				fwrite($file, str_pad("Squad 3", 20));
			}
			
			else
			{
				echo "<td></td>";
				fwrite($file, str_pad("", 20));
			}
				
	
			if(isset($_POST["playername$j"]) || isset($_POST["playerclass$j"]) || isset($_POST["playerdesc$j"]) || isset($_POST["playerspec"]) || isset($_POST["vehicleequipa$j"]) || isset($_POST["vehicleequipb$j"]) || isset($_POST["vehicleequipc$j"]))
			{
				echo "<td>" . $_POST["playername$j"] . "</td>";
				echo "<td>" . $_POST["playerclass$j"] . "</td>";
				echo "<td>" . $_POST["playerdesc$j"] . "</td>";
				echo "<td>" . $_POST["playerspec$j"] . "</td>";
				echo "<td>" . $_POST["vehicleequipa$j"] . "</td>";
				echo "<td>" . $_POST["vehicleequipb$j"] . "</td>";
				echo "<td>" . $_POST["vehicleequipc$j"] . "</td>";
				echo "</tr>";
				fwrite($file, str_pad($_POST["playername$j"], 20) . str_pad($_POST["playerclass$j"], 20) . str_pad($_POST["playerdesc$j"], 20) . str_pad($_POST["playerspec$j"], 20) . str_pad($_POST["vehicleequipa$j"], 20) . str_pad($_POST["vehicleequipb$j"], 20) . str_pad($_POST["vehicleequipc$j"], 20) . "\n");
			}

			if($j == 4 || $j == 8)
			{
				echo "<tr>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "<td><hr color = '#000000'></td>";
				echo "</tr>";
				fwrite($file, "\n");
			}
		}
		echo "</table></p>";
		fclose($file);
		
		foreach(glob('data/*.txt') as $delete);
		$time_difference = time() - fileatime($delete);

		if($time_difference > 86400)
		{
			for($d=1; $d<=50; $d++)
			{
				unlink($delete);
			}
		}
		
		echo "<form action = '' method = 'post'>";
		echo "<div align = 'center'>";
		echo "<a href = 'data/$filename'><img src = 'icons/download.png'></img></a> <input type = 'button' value = 'Back' onClick = 'window.history.back()'><br />";
		echo "<font size = '2'>Download: Right click - 'Save link as'.</font>";
		echo "</div>";
	}

	else
		echo "<p><font color = '#FF0000'><b>Something went wrong. Go <a href = 'match_organizer.php'>back</a> and try again.</b></font></p>";
?>
</body>
</html>
