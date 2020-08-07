<?php
session_start();
require 'config.php';


//Verificar se existe usuarios na DB e fazer login
if(!empty($_POST['email'])){
  $email = addslashes($_POST['email']);
  $password = md5($_POST['password']);

  $sql = "SELECT id FROM usuarios WHERE email='$email' AND senha='$password'";
  $sql = $pdo->query($sql);

  if($sql->rowCount()>0){
    $info = $sql->fetch();
    $_SESSION['logged'] = $info['id'];
    header("Location: index.php");
      exit;
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
            <h5 class="card-title text-center">Login</h5>
            <form class="form-signin" method="POST">
              
              <div class="form-group">
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email"required>
                <br/>
              </div>
            
              <div class="form-group">
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                <br/>
              </div>

              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Login</button>
              <a class="d-block text-center mt-2 small" href="register.php">Register</a>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body> 