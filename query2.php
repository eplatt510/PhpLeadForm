<?php
	if(empty($errorMessage)) 
        {
			$servername = "pdb19.awardspace.net";
			$username = "1763895_bddb1";
			$password = "rqxqhwlej7";
			$dbname = "1763895_bddb1";

			$db2 = new mysqli($servername,$username, $password, $dbname);
			if($db2->connect_error) die("Error connecting to MySQL database.");
			
			$sql = "SELECT COUNT(lead_id)
					FROM leads";
			$totalLeads = $db2->query($sql);
			while ($row = $totalLeads->fetch_assoc()) {
			$total = $row['COUNT(lead_id)']."<br>";
			
			}
			
		}
	
	$db2->close();
?>         