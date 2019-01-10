<?php 
	include('db.php'); 
	$name = '';
	$email = '';
	$tel = '';
	
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$result = mysqli->query("SELECT * FROM list WHERE id=$id");
		if (count($result)==1) {
			$row = $result->fetch_array();
			$name = $row['username'];
			$email = $row['email'];
			$tel = $row['[tel'];
		}
		
	}
?>
