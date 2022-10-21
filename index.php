<?php 
  include 'koneksi.php';
  session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <!-- javascript && css -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="./assets/styles.css">
    <style><?php include 'styles.css' ?></style>

    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&display=swap" rel="stylesheet"> 

    <!-- title blog -->
    <title>Account Session</title>

    <!-- favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">

  </head>
  <body class="bg-no-repeat bg-cover height-full">

    <div class="container position-absolute" style="margin-top: 50px">
      <div class="row" id="registers">
        <div class="col-md-5 offset-md-3">
          <div class="card bg-black bg-opacity-40 text-white">
            <div class="card-body">
              <label class=""><strong>REGISTER</strong></label>
              <hr>
              <br>
                <form action="" onsubmit="return false">
                <div class="form-group">
                  <label>FUll Name :</label>
                  <input type="text" class="form-control bg-black bg-opacity-40 text-white" id="fullname" placeholder="Enter Your Full Name">
                </div>

                <div class="form-group">
                  <label>Username :</label>
                  <input type="text" class="form-control bg-black bg-opacity-40 text-white" id="username" placeholder="Username">
                </div>

                <div class="form-group">
                  <label>Password :</label>
                  <input type="password" class="form-control bg-black bg-opacity-40 text-white" id="password" placeholder="Password">
                </div>
                
                <button class="btn btn-register btn-block btn-success">REGISTER</button>
                </form>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
          <a class="text-white">Already Have Account?</a> <a class="underline alrhave" type="button" id="logins" onclick="alrHave()">Login Here</a>
          </div>
        </div>
      </div>
    <!-- login session -->


    <div class="container c2y position-absolute " style="margin-top: 50px">
      <div class="row" id="login-session">
        <div class="col-md-5 offset-md-3">
          <div class="card bg-black bg-opacity-40 text-white">
            <div class="card-body">
              <label>LOGIN</label>
              <hr class="bg-white">
              <br>
              <form action="" onsubmit="return false">
              <div class="form-group">
              <label>Username :</label>
                  <input type="text" class="form-control bg-black bg-opacity-40 text-white" id="usernames" onkeyup="usernamess()" placeholder="Masukkan Username">
                </div>
                <a id="pesan_failed1">Username Wrong!</a>

                <div class="form-group">
                  <label>Password :</label>
                  <input type="password" class="form-control bg-black bg-opacity-40 text-white" id="passwords" onkeyup="passwordss()" placeholder="Masukkan Password">
                </div>
                <a id="pesan_failed2">Password Wrong!</a>

                <button class="btn btn-login btn-block btn-success">LOGIN</button>
              </form>
              
            </div>
          </div>

          <div class="text-center" style="margin-top: 15px">
          <a id="registers" class="text-white">Not Have Account?</a> <a href="" class="text-green-400/100 underline arlhaves"><strong>Register Here</strong></a>
          </div>

        </div>
      </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
    <script src="./assets/script.js"></script>
    
  </body>
</html>