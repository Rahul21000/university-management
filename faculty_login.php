<?php
require('db.php');
session_start();
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $pass=$_POST['pass'];
  $sql = "select name,email,pass,role from faculty where email='$email' and pass='$pass' ";
  $res = mysqli_query($conn,$sql) or die("connection faild.");
  $row = mysqli_num_rows($res);
  if($row>0) {
    $data = mysqli_fetch_assoc($res);
    $_SESSION['name']=$data['name'];
    $_SESSION['email']=$data['email'];
    $_SESSION['ROLE']=$data['role'];
    $_SESSION['IS_LOGIN']='yes';
    if($data['role']==1){
      header('location:index.php');
      die();
    }
    if($data['role']==2){
      header('location:index.php');
      die();
    }
  }
  else{
    ?>
    <script>alert("enter correct login details!")</script> 
     <?php
     unset($_POST['submit']);
     session_destroy();
                
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
 <title>Login - jiwaji management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/image/logo.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <a href="index.php" class="logo d-flex align-items-center w-auto">
                  <img src="assets/image/logo.png" alt="image">
                  <span class="d-none d-lg-block">jiwaji management</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">
               <div class="card-body">
                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your user id & password to login</p>
                  </div>
                 <form class="row g-3 needs-validation" novalidate  method="POST" >
                   <div class="col-12">
                      <label for="yourUsername" class="form-label">Faculty Id</label>
                    <div class="input-group has-validation">
                       <input type="email" name="email" class="form-control" id="yourUsername" maxlength="32" required>
                        <div class="invalid-feedback">Please enter your user Id.</div>
                      </div>
                    </div>
                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="pass" class="form-control" id="yourPassword" maxlength="10" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="submit">Login</button>
                      <?php $error ?>
                    </div>
                  </form>
                    <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="regis.php">Create an account</a></p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
   </div>
 </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.min.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>