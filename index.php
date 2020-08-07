<?php
session_start();
require 'config.php';

//To Verify if you are already logged in
if(empty($_SESSION['logged'])) {
	header("Location: login.php");
	exit;
}

$name = '';
$email = '';
$code = '';

//Get the data of the person who is logged in
$sql = "SELECT nome, email, codigo FROM usuarios WHERE id = '".addslashes($_SESSION['logged'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
    $info = $sql->fetch();
    $name = $info['nome'];
	$email = $info['email'];
	$code = $info['codigo'];
}
?>

<body>

<link rel="stylesheet" href="assets/css/bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/style.css"/>

<script type="text/javascript" src="assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.min.js"></script>

<div class="container">
    <div class="row " style="display: flex; padding-top: 15%;">
      <div class="col-lg-10 col-xl-9 mx-auto ">
        <div class="card card-signin flex-row my-5">
          <div class="card-img-left d-none d-md-flex">
             <!-- Background image for card set in CSS! -->
          </div>
          <div class="card-body">
            <h5 class="card-title text-center">Internal system area</h5>
            <form class="form-signin" method="POST">

            <div class="form-group">
                <a><strong>Name</strong></a>
                <input type="text" class="form-control"  name="name" value="<?php echo ucfirst($name); ?>"readonly>
                <br/>
              </div>
              
              <div class="form-group">
              <a><strong>Email</strong></a>
                <input type="email"  class="form-control"  name ="email" value ="<?php echo $email; ?>"readonly>
                <br/>
              </div>

              <div class="form-group">
              <a><strong>Invitation to register</strong></a>
                <input type="text" class="form-control" name ="email" value ="http://localhost/registro_por_convite/register.php?code=<?php echo $code; ?>"readonly>
                <br/>
              </div>
              <a class="btn btn-lg btn-primary btn-block text-uppercase" href="logout.php">Logout</a></p>            
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

