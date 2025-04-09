<?php 
  session_start();
  if($_SESSION['status_login'] = true){
    echo '<script>window.location="login.php</script>';
  }
 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | warung_kopi_mas_ucuu</title>
  <link rel="stylesheet" type="text/css" href="css/style.css"><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
</head>
<body id="box-login">
  <div class="box-login">
    <h2>Login</h2>
    <form action="" method="POST">
      <input type="text" name="user" placeholder="username" class="input-control">
      <input type="password" name="pass" placeholder="password" class="input-control">
      <input type="submit" name="submit" value="Login" class="btn">
    </form>
    <?php 
      if(isset($_POST['submit'])){
        include 'db.php';

        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."'AND password = '".$pass."'");
        if(mysqli_num_rows($cek) >0){
          $d = mysqli_fetch_object($cek);
          $_SESSION['status_login'] = true;
          $_SESSION['a_global'] = $d;
          echo '<script>window.location="dashboard.php"</script>';
        }else{
          echo'<script>alert("username atau password anda salah!")</script>';
        }
      }

    ?>
  </div>
</body>
</html>