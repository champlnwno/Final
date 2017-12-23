<?php 
session_start();
include './dbconfig.php';
if (!isset($_SESSION['user_id']) || $_SESSION['user_rule'] != 1) {
  header("Location:login.php");
}
if(isset($_GET['ban_id'])){
    $ban_id=$_GET['ban_id'];

      $sql_del="UPDATE `account` SET `user_rule` = '2' WHERE `account`.`user_id` = $ban_id;";
      $result=mysqli_query($link,$sql_del);
    
    
}
if(isset($_GET['unban_id'])){
    $ban_id=$_GET['unban_id'];

      $sql_del="UPDATE `account` SET `user_rule` = '0' WHERE `account`.`user_id` = $ban_id;";
      $result=mysqli_query($link,$sql_del);
    
    
}

if(isset($_GET['del_id'])){
    $del_id=$_GET['del_id'];
    $sql_del="delete from account WHERE user_id=$del_id";
    $result=mysqli_query($link,$sql_del);
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Account</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="stylemain.css" rel="stylesheet">

</head>

<body>

  <?php include './include/nav.php'; ?>

  <main role="main" class="container">

    <table class="table table-dark">
  <thead>
      <tr align="center">
          <form method="POST">
          <td><input type="text" name="work" size="20" placehoder="ค้นหา"></td>
           <td> <input type="submit" name="submit" value="ยืนยัน">        </td>

          </form>
    </tr>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Avatar</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Gender</th>
      <th scope="col">Registed</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
      <?php 
      

        $sql = "SELECT * FROM `account` WHERE `user_rule` != 1 ORDER BY `account`.`user_id` DESC;";
        if(isset($_POST['submit'])){
          $work=$_POST['work'];
          $sql = "SELECT * FROM account WHERE (user_id like '%$work%' or user_name like '%$work%' or
          user_email like '%$work%' or user_gender like '%$work%') AND `user_rule` != 1 ORDER BY `account`.`user_id` DESC;";
        }
        $query = mysqli_query($link, $sql, MYSQLI_STORE_RESULT) or die ("Query Error");
        $num_row = mysqli_num_rows($query);
        while($row = mysqli_fetch_assoc($query)){
        ?>
    <tr>
      <th scope="row"><?=$row['user_id']?></th>
      <td><img src="<?=$row['user_avatar']?>" width=50 class="img-thumbnail circle" alt=""></td>
      <td><?=$row['user_email']?></td>
      <td><?=$row['user_name']?></td>
      <td><?=$row['user_gender']?></td>
      <td><?=$row['user_datetime']?></td>
      <td>
      <?php if ($row['user_rule'] == 2) {?>
          <a class="btn btn-primary btn-sm" href="./view_account.php?unban_id=<?=$row['user_id']?>" role="button">Unlock</a>
      <?php }else{?>
          <a class="btn btn-primary btn-sm" href="./view_account.php?ban_id=<?=$row['user_id']?>" role="button">Lock</a>
      <?php }?>
      
      <a class="btn btn-primary btn-sm" href="./view_account.php?del_id=<?=$row['user_id']?>" role="button">Delete</a>
      </td>
    </tr>
    <?php } if($num_row == 0) {?>
      <td colspan=7 align="center">ไม่มี</td>
    <?php } ?>
  </tbody>
</table>

  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
</body>

</html>