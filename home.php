<?php
	include('session.php');
	
	if(!isset($_SESSION['login_user'])) {
		header("location: Login.php");
	}
	if(isset($_POST['btn_search']))
	{
    $search = $_POST['search'];
		// search in all table columns
		// using concat mysql function
		$query = "SELECT * FROM `list` WHERE CONCAT(`id`, `name`, `email`, `tel`) LIKE '%".$search."%'";
		$search_result = filterTable($query);
    
	}
	else {
		$query = "SELECT * FROM `list`";
		$search_result = filterTable($query);
	}

	// function to connect and execute the query
	function filterTable($query)
	{
		$connect = mysqli_connect("localhost", "root", "", "phonebook");
		$filter_Result = mysqli_query($connect, $query);
		return $filter_Result;
	}
?>
<DOCTYPE! html>
<html lang="en">
	<head>
		<title>PhoneBook</title>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script type="text/javascript" src="bootstrap/js/jquery-slim.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class="navbar navbar-light bg-light">
			<a class="navbar-brand" href="#">
				<img src="2.png" width="30" height="30" class="d-inline-block align-top" alt="">Phonebook
			</a>
			<form class="form-inline my-2 my-lg-0">
				<div id="profile">
					<b id="welcome">Howdy, <i><?php echo $login_session; ?></i></b>
				</div>
				<div class="dropdown">
					<img src="prof.png" alt="Profile Picture" width="40" height="40" class="mr-sm-2">
					<div class="dropdown-content" style="right: 0; left: auto;">
						<img src="prof.png" alt="" width="200" height="200">
						<div class="desc"><b id="logout"><a href="logout.php">Log Out</a></b></div>
					</div>
				</div>
			</form>
		</nav>
		<div class="img">
			<div class="container">
				<div class="row">
					<div class="col-sm-2"></div>
					<div class="col-sm-8">
						<h2 class="display-1 font-weight-bold" style="font-size: 10vw"><div class="d-inline-block bg-primary rounded">Phonebook</div></h2><br>
						<div class="row">
							<div class="col-sm-10">
								<form class="example" action="home.php" method="post">
									<input type="text" placeholder="Search.." name="search">
									<button type="submit" name="btn_search"><i class="fa fa-search"></i></button>
								</form>
							</div>		
							<div class="col-sm-2">
								<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">ADD</button>

								<!-- Modal -->
							<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="form-control">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" >Add new phonebook</h5>
												<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
												</button>
										</div>
										<div class="modal-body">
											<form action="add.php" method="post">
												<label class="col-form-label">Name:</label>
												<input type="text" class="form-control form-control-sm" id="name" name="name" placeholder="name" value="<?php echo $name; ?>" required>
												<label class="col-form-label">Email address:</label>
												<input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="email@example.com" value="<?php echo $email; ?>" required>
												<label class="col-form-label">Phone Number:</label>
												<input type="tel" class="form-control form-control-sm" id="tel" name="tel" placeholder="phone number" value="<?php echo $tel; ?>" required>
												<input class="btn btn-primary btn-block button2" type="submit" name="submit" value="SAVE" onclick="return confirm('Are you sure?');">
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										</div>
									</div>
								</div>
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
				<div class="table-responsive">
				<table class="table table-hover table-dark">
				  <thead>
					<tr>
					  <th>ID</th>
					  <th>Name</th>
					  <th>Email</th>
					  <th>Phone Number</th>
					  <th>Action</th>
					</tr>
				  </thead>
					<?php while($row = mysqli_fetch_array($search_result)):?>
						<tbody>
						<tr>
							<td><?php echo $row['id'];?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['email'];?></td>
							<td><?php echo $row['tel'];?></td>
							<td>
								<div class="btn-group">
								<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								
								</button>
								  <div class="dropdown-menu">
									<a  data-toggle="modal" data-target="#exampleModalCenter" class="dropdown-item" href="edit.php?edit=<?php echo $row['id'];?>">Edit</a>
									<a class="dropdown-item" href="delete.php?id=<?php echo $row["id"]; ?>" onclick="return confirm('Are you sure?');">Delete</a>
								  </div>
								</div>
							</td>
						</tr>
						</tbody>
					<?php endwhile;?>
				</table>
				</div>
		<footer>
			<div class="row">
				<p class="col-sm-4 h5">&copy; 2018 Phonebook</p>
				<ul class="col-sm-8">
					<li class="col-sm-1"><img src="4.png" /></li>
					<li class="col-sm-1"><img src="5.png" /></li>
					<li class="col-sm-1"><img src="6.png" /></li>
				</ul>
			</div>
		</footer>
	</body>
</html>