<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
 <?php include './dbconfig.php';?>
<html>
   <head>
   <title>Field smile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
</head>
<body>

<nav class="navbar navbar-inverse">
    <div class="container-fluid"><img src="LOGOWAB1.png"width="70">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Field Smile</a>
    </div>
    <ul class="nav navbar-nav">
        
      
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span class="caret"></span></a>
        <ul class="dropdown-menu">
        
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>

    </ul>
  </div>
</nav>
    <div class="container">
            <div class="imgBx">
                <img src="LOGOWAB1.png">
            </div>
            <div class="loginBox"> 
                
                <h3>Log in Here</h3>
                <form>
                    <div class="inputbox">
                         <span><i class="fa fa-user" aria-hidden="true"></i></span>
                        <input type="text" name="user_name" placeholder="Username">
                       
                        </div>
                     <div class="inputbox">
                         <span><i class="fa fa-lock" aria-hidden="true"></i></span>
                         <input type="password" name="user_pass" placeholder="Password">
                        
                    </div> 
                    <input type="submit" name="submit" value="Log in">
                                         
                     </form>
                
                
                <div class="style-re">
            <?php echo "<a href =\"Register.php\">Register</a>";   ?>
                </div>
        </div>
</div>   
    

 
   <div class="picmove">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
 
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>


  <div class="carousel-inner">
    <div class="item active">
        <img src="pic/pic2.jpg">
    </div>

    <div class="item">
        <img src="pic/pic3.jpg">
    </div>

    <div class="item">
        <img src="pic/pic11.jpg">
    </div>
  </div>


  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
   </div>
    
<?php 
      
            if(isset($_POST['submit'])){
                $user_name=$_POST['user_name'];
                $user_pass=$_POST['user_pass'];
                $user_pass = md5($user_pass);
                $sql= " select * from account where user_name='$user_name'and user_pass='$user_pass'";
                
                echo "$sql";
                $query=mysqli_query($link,$sql);
                
                if(mysqli_num_rows($query)>0){
                     echo "<div><p>ยินดีต้อนรับ$user_name</p></div>";
                   
                header("Location:Mass.php");}
                    else
                    {echo"<div><p>ไม่พบ$user_name ในระบบ</p></dvi>";}
                    
                }
                ?>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    
</html>
