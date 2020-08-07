<?php

require 'config.php';

//Check if there is a registration code in the url and if it is in the database
if(!empty($_GET['code'])) {
	$code = addslashes($_GET['code']);

	$sql = "SELECT * FROM usuarios WHERE codigo = '$code'";
	$sql = $pdo->query($sql);

	if($sql->rowCount() == 0) {
		header("Location: login.php");
		exit;
	}
} else {
	header("Location: login.php");
	exit;
}
// Add data in the DB and check if the email already exists
if(!empty($_POST['email'])) {
  $name = $email = addslashes($_POST['name']);
	$email = addslashes($_POST['email']);
	$password = md5($_POST['password']);

	$sql = "SELECT * FROM usuarios WHERE email = '$email'";
	$sql = $pdo->query($sql);


	if($sql->rowCount() <= 0) {

		$code = md5(rand(0,99999).rand(0,99999));
		$sql = "INSERT INTO usuarios (nome, email, senha, codigo) VALUES ('$name', '$email', '$password', '$code')";
		$sql = $pdo->query($sql);

		unset($_SESSION['logged']);

		header("Location: index.php");
		exit;
	} else{
    echo "<script type=\"text/javascript\"> alert('Email already registered'); </script>";
  }
}

?>


<body> 
    <link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/style.css"/>

    <script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

    <div class="container">
      <div class="row" style="display: flex; padding-top: 15%;">
        <div class="col-lg-10 col-xl-9 mx-auto">
          <div class="card card-signin flex-row my-5">
            <div class="card-img-left d-none d-md-flex">
              <!-- Background image for card set in CSS! -->
            </div>
            <div class="card-body">
              <h5 class="card-title text-center">Register</h5>
              <form class="form-signin" method="POST">

              <div class="form-group">
                  <input type="text" id="inputPassword" class="form-control" placeholder="Name" name="name" required>
                  <br/>
                </div>
                
                <div class="form-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name ="email" required>
                  <br/>
                </div>
              
                <div class="form-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password"  name="password"required>
                  <br/>
                </div>
              
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Register</button>
                <a class="d-block text-center mt-2 small" href="login.php">I already have an account</a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>