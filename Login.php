<!DOCTYPE html>
<?php 
session_start();
include './dbconfig.php';
if (isset($_SESSION['user_id'])) {
  header("Location:index.php");
}
if(isset($_POST['submit'])){
  $user_name=$_POST['user_name'];
  $user_pass=$_POST['user_pass'];
  $user_pass = md5($user_pass);
  $sql= "select * from account where user_name='$user_name' and user_pass='$user_pass'";

  $query=mysqli_query($link,$sql);

  $row = mysqli_fetch_assoc($query);
  
    if(!empty($row) && $row['user_rule'] != 2){
      $_SESSION['user_id'] = $row['user_id'];
      $_SESSION['user_name'] = $row['user_name'];
      $_SESSION['user_email'] = $row['user_email'];
      $_SESSION['user_avatar'] = $row['user_avatar'];
      $_SESSION['user_rule'] = $row['user_rule'];
      header("Location:index.php");
    }else{
      echo"<script>alert('no account')</script>";
    }
  }
  ?>
<html>

<head>
  <title>Field smile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="stylemain.css" rel="stylesheet">
</head>

<body style="background: url('./bg1.jpeg');background-size: cover;">

<?php include './include/nav.php'; ?>
  <div class="container">
    <div class="imgBx">
      <img src="LOGOWAB1.png">
    </div>
    <div class="loginBox">

      <h3>Log in Here </h3>
      
      <form method="post">
        <div class="inputbox">
          <span>
            <i class="fa fa-user" aria-hidden="true"></i>
          </span>
          <input type="text" name="user_name" placeholder="Username">

        </div>
        <div class="inputbox">
          <span>
            <i class="fa fa-lock" aria-hidden="true"></i>
          </span>
          <input type="password" name="user_pass" placeholder="Password">

        </div>
        <input type="submit" name="submit" value="Log in">

      </form>


      <div class="style-re">
        <?php echo "<a href =\"register.php\">Register</a>";   ?>
      </div>
    </div>
  </div>


<div class="picmove">
 <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="./pic/pic2.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./pic/pic3.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="./pic/pic11.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
  crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
  crossorigin="anonymous"></script>

</html>