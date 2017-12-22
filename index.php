<?php 
session_start();
include './dbconfig.php';
if (!isset($_SESSION['user_id'])) {
  header("Location:login.php");
}

if (isset($_POST['post_top'])) {
  $sql="INSERT INTO `topic` (`topic_id`, `user_id`, `img_id`, `topic_name`, `topic_content`, `datetime`) VALUES (NULL, ".$_SESSION['user_id'].", '1', '', '".$_POST['content']."', now());";
  echo $sql;
  $result= mysqli_query($link, $sql);
  if ($result) {
      header("Location:index.php");                                                
  }
}


?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="stylemain.css" rel="stylesheet">

</head>

<body>

  <?php include './include/nav.php'; ?>

  <main role="main" class="container">

    <div class="row">
      <aside class="col-sm-4 blog-sidebar">
        <div class="sidebar-module sidebar-module-inset">
          <div class="row">
            <div class="col-md-5" style="padding-right: 0;">
              <img src="https://p.w3layouts.com/demos/profile_widget/web/images/t3.jpg" class="img-thumbnail" alt="">
            </div>
            <div class="col-md-7" style="padding-left: 5px;">
              <h6>@username</h6>
              <small>test@test.com</small>
            </div>
          </div>

          <input class="btn btn-outline-danger btn-sm btn-block" style="margin: 15px 0" type="button" value="Follow">

          <div class="row">
            <div class="col-md-4 posts-label" style="padding-right: 0;">
              <h6 class="label-status">Posts</h6>
              <p>200</p>
            </div>
            <div class="col-md-4 posts-label" style="padding-left: 5px;">
              <h6 class="label-status">Follower</h6>
              <p>200</p>
            </div>
            <div class="col-md-4 posts-label" style="padding-left: 5px;">
              <h6 class="label-status">Following</h6>
              <p>200</p>
            </div>
          </div>
        </div>
      </aside>

      <div class="col-sm-8 ml-sm-auto blog-main">
        <div class="form-group">
          <form method="post">
            <textarea name="content" class="form-control" cols="47" rows="3" placeholder="What's happening?"></textarea>
            <input type="submit" name="post_top" class="btn btn-block btn-md btn-danger" style="margin-top: 15px" value="Post">
          </form>
        </div>
        <?php 
        $sql = "SELECT * FROM `topic`
        JOIN `account` ON `topic`.`user_id` = `account`.`user_id`
        JOIN `image` ON `topic`.`img_id` = `image`.`img_id`
        ORDER BY `topic`.`topic_id` DESC;";

        $query = mysqli_query($link, $sql, MYSQLI_STORE_RESULT) or die ("Query Error");
        $num_row = mysqli_num_rows($query);
        while($row = mysqli_fetch_assoc($query)){
        ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-2">
                <img src="https://p.w3layouts.com/demos/profile_widget/web/images/t3.jpg" class="img-thumbnail circle" alt="">
              </div>
              <div class="col-md-10">
                <p class="blog-post-meta"><?=$row['datetime']?> by
                  <a href="./profile.php?u=<?=$row['user_name']?>"><?=$row['user_name']?></a>
                  <?php if ($row['user_name'] == $_SESSION['user_name']) {?>
                    <a href="./include/deleteTopic.php?topid=<?=$row['topic_id']?>" class=""> <i class="fa fa-trash  fa-fw fa-lg" aria-hidden="true"></i></a>
                  <?php } ?>
                  
                </p>
                <p><?=$row['topic_content']?>
                </p>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            <div class="row">
              <div class="col-md-4">
                <button type="button" class="btn btn-light btn-block">
                  <i class="fa fa-heart-o fa-fw fa-lg" aria-hidden="true"></i>
                  Like</button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-light btn-block">
                  <i class="fa fa-commenting-o fa-fw fa-lg" aria-hidden="true"></i>
                  Comment</button>
              </div>
              <div class="col-md-4">
                <button type="button" class="btn btn-light btn-block">
                  <i class="fa fa-share-square-o fa-fw fa-lg" aria-hidden="true"></i>
                  Share</button>
              </div>
            </div>
          </div>
        </div>
 <?php } if($num_row == 0) {?>
    <p>ไม่พบรายการ</p>
    <?php } ?>
      </div>
    </div>
   
  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ"
    crossorigin="anonymous"></script>
</body>

</html>