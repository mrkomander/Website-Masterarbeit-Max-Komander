<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "corona";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	
	if($_POST['type'] == 'establishment'){
		$sql = $_POST['query'];
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		  while($row = mysqli_fetch_assoc($result)) {
			echo $row["RES"];
		  }
		} else {
			echo "";
		}
		
	}else if($_POST['type'] == 'changeName'){
		$sql = $_POST['query'];
		$result = mysqli_query($conn, $sql);
		
	}else if($_POST['type'] == 'radialChart'){
		$sql = $_POST['query'];
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		  while($row = mysqli_fetch_assoc($result)) {
			echo $row["ACTIVE"];
		  }
		} else {
			echo "0";
		}
		
	}else if($_POST['type'] == 'admin'){
		$sql = $_POST['query'];
		$data = (object) array('now' => intval('0'), 'limit' => intval('0'));
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data = (object) array('now' => intval($row["RES"]), 'limit' => intval($row["SEATS"]));		

		echo json_encode($data);
		mysqli_close($conn);

	}else if($_POST['type'] == 'barChart'){
		$data = array();
		$sql = $_POST['query1'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Montag', 'value' => intval($row["ACTIVE"]), 'color' => '#000000');
		else
			$data[] = (object) array('language' => 'Montag', 'value' => intval('0'), 'color' => '#000000');
		
		$sql = $_POST['query2'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Dienstag', 'value' => intval($row["ACTIVE"]), 'color' => '#00a2ee');
		else
			$data[] = (object) array('language' => 'Dienstag', 'value' => intval('0'), 'color' => '#00a2ee');
		
		$sql = $_POST['query3'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Mittwoch', 'value' => intval($row["ACTIVE"]), 'color' => '#fbcb39');
		else
			$data[] = (object) array('language' => 'Mittwoch', 'value' => intval('0'), 'color' => '#fbcb39');
		
		$sql = $_POST['query4'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Donnerstag', 'value' => intval($row["ACTIVE"]), 'color' => '#007bc8');
		else
			$data[] = (object) array('language' => 'Donnerstag', 'value' => intval('0'), 'color' => '#007bc8');
		
		$sql = $_POST['query5'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Freitag', 'value' => intval($row["ACTIVE"]), 'color' => '#65cedb');
		else
			$data[] = (object) array('language' => 'Freitag', 'value' => intval('0'), 'color' => '#65cedb');
		
		$sql = $_POST['query6'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Samstag', 'value' => intval($row["ACTIVE"]), 'color' => '#ff6e52');
		else
			$data[] = (object) array('language' => 'Samstag', 'value' => intval('0'), 'color' => '#ff6e52');
		
		$sql = $_POST['query7'];
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0)
			while($row = mysqli_fetch_assoc($result))
				$data[] = (object) array('language' => 'Sonntag', 'value' => intval($row["ACTIVE"]), 'color' => '#f9de3f');
		else
			$data[] = (object) array('language' => 'Sonntag', 'value' => intval('0'), 'color' => '#f9de3f');
		
		echo $data;
		mysqli_close($conn);
	}
	?>