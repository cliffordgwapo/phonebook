<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$tel = $_POST['tel'];
	
	if(!empty($name) && !empty($email) && !empty($tel)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "phonebook";
		
		// create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else {
			$SELECT = "SELECT tel From list Where tel = ? Limit 1";
			$INSERT = "INSERT Into list (name, email, tel) values(?, ?, ?)";
			
			//prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $tel);
			$stmt->execute();
			$stmt->bind_result($tel);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if ($rnum==0) {
				$stmt->close();
				
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sss", $name, $email, $tel);
				$stmt->execute();
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['name'] = $name;
				header("location: home.php");
			}else {
				echo "Someone already this number";
			}
			$stmt->close();
			$conn->close();
		}
	}else {
		echo "All field are required";
		die();
	}

?>