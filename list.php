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
								<form class="example" action="list.php" method="post">
									<input type="text" placeholder="Search.." name="search">
									<button type="submit" name="btn_search"><i class="fa fa-search"></i></button>
								</form>
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone#</th>
			</tr>
			<?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['tel'];?></td>
                </tr>
                <?php endwhile;?>
		</table>
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