<?php
	session_start();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$error = '';
	
	if(!empty($username) && !empty($email) && !empty($password)) {
		$host = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbname = "phonebook";
		
		// create connection
		$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else {
			$SELECT = "SELECT username From register Where username = ? Limit 1";
			$INSERT = "INSERT Into register (username, email, password) values(?, ?, ?)";
			
			//prepare statement
			$stmt = $conn->prepare($SELECT);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$stmt->bind_result($username);
			$stmt->store_result();
			$rnum = $stmt->num_rows;
			
			if ($rnum==0) {
				$stmt->close();
				
				$stmt = $conn->prepare($INSERT);
				$stmt->bind_param("sss", $username, $email, $password);
				$stmt->execute();
				$_SESSION['message'] = "You are now logged in";
				$_SESSION['username'] = $username;
				header("location: home.php");
			}else {
				$error = "Someone already register this username!";
				echo "<script>alert('Someone already register this username') </script>";
				
			}
			$stmt->close();
			$conn->close();
		}
	}else {
		echo "All field are required";
		die();
	}

?>