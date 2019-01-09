//edit contact
	if (isset($_POST['update'])) {
	$contact_id = $_POST['contact_id'];
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];

	mysqli_query($db, "UPDATE account SET name='$name', phone='$phone', email='$email', address='$address' WHERE contact_id=$contact_id");
	$_SESSION['message'] = "Successfully updated!"; 
	header('location: index.php');
}
<?php include('server.php'); 
	
	if (isset($_GET['edit'])) {
		$contact_id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM account WHERE contact_id=$contact_id");
		
	
			$n = mysqli_fetch_array($record);
			$name = $n["name"];
			$phone = $n["phone"];
			$email = $n["email"];
			$address = $n["address"];
		
	}

?>
