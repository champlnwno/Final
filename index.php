<?php 
session_start();
include './dbconfig.php';
if (!isset($_SESSION['user_id'])) {
  header("Location:login.php");
}

if (isset($_POST['post_top']) && $_POST['content'] != null && $_POST['content'] != '') {
  $sql="INSERT INTO `topic` (`topic_id`, `user_id`, `img_id`, `topic_name`, `topic_content`, `datetime`) VALUES (NULL, ".$_SESSION['user_id'].", '1', '', '".$_POST['content']."', now());";
  echo $sql;
  $result= mysqli_query($link, $sql);
  if ($result) {
      header("Location:index.php");                                                
  }
}

if (isset($_POST['post_top_update']) && $_POST['content_update'] != null && $_POST['content_update'] != '') {
  $sql = "UPDATE `topic` SET `topic_content` = '".$_POST['content_update']."' WHERE `topic`.`topic_id` = ".$_POST['top_id_update']." AND `topic`.`user_id` = ".$_SESSION['user_id'].";";   
  $result= mysqli_query($link, $sql);
  if ($result) {
     header("Location:index.php");                                       
  }
}

if (isset($_GET['topid'])) {
  $sql = "DELETE FROM `topic` WHERE `topic`.`topic_id` = ".$_GET['topid']." AND `topic`.`user_id` = ".$_SESSION['user_id']."";
  $result= mysqli_query($link, $sql);
  if ($result) {
     header("Location:index.php");                                       
  }
}
$sqlPost = "SELECT COUNT(*) FROM `topic`
        JOIN `account` ON `topic`.`user_id` = `account`.`user_id`
        JOIN `image` ON `topic`.`img_id` = `image`.`img_id`
        WHERE `topic`.`user_id` = ".$_SESSION['user_id']."";

$resultPost= mysqli_query($link, $sqlPost);
$rowPost = mysqli_fetch_assoc($resultPost);

$sqlfollow = "SELECT `account`.user_id, COUNT(*) FROM `account` JOIN `follow` ON `follow`.user_id = `account`.user_id WHERE `follow`.user_follower = ".$_SESSION['user_id']."";
$resultfollow= mysqli_query($link, $sqlfollow);
$rowfollower = mysqli_fetch_assoc($resultfollow);

$sqlfollowing = "SELECT `follow`.user_follower, COUNT(*) FROM `account` JOIN `follow` ON `follow`.user_id = `account`.user_id WHERE `account`.user_id = ".$_SESSION['user_id']."";
$resultfollowing= mysqli_query($link, $sqlfollowing);
$rowfollowing = mysqli_fetch_assoc($resultfollowing);

if (isset($_POST['likenow'])) {
 $sql="INSERT INTO `favorite` (`user_id`, `topic_id`) VALUES ('".$_SESSION['user_id']."', '".$_POST['top_id_like']."');";
  $result= mysqli_query($link, $sql);
}

if (isset($_POST['unlikenow'])) {
  $sql = "DELETE FROM `favorite` WHERE `favorite`.`user_id` = ".$_SESSION['user_id']." AND `favorite`.`topic_id` = ".$_POST['top_id_unlike']."";
  $result= mysqli_query($link, $sql);

}
if (isset($_GET['user_id_unfollow'])) {
  $sql = "DELETE FROM `follow` WHERE `follow`.`user_id` = ".$_SESSION['user_id']." AND `follow`.`user_follower` = ".$_GET['user_id_unfollow']."";
  $result= mysqli_query($link, $sql);
  if ($result) {
     header("Location:index.php");                                       
  }
}
if (isset($_GET['user_id_follow'])) {
  $sql = "INSERT INTO `follow` (`user_id`, `user_follower`) VALUES ('".$_SESSION['user_id']."', '".$_GET['user_id_follow']."');";
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
              <a href="./profile.php?u=<?=$_SESSION['user_name']?>"><img src="<?=$_SESSION['user_avatar']?>" class="img-thumbnail" alt=""></a>
            </div>
            <div class="col-md-7" style="padding-left: 5px;">
              <h6>@<?=$_SESSION['user_name']?></h6>
              <small><?=$_SESSION['user_email']?></small>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4 posts-label" style="padding-right: 0;">
              <h6 class="label-status">Posts</h6>
              <p><?=$rowPost['COUNT(*)']?></p>
            </div>
            <div class="col-md-4 posts-label" style="padding-left: 5px;">
              <h6 class="label-status">Follower</h6>
              <p><?=$rowfollower['COUNT(*)']?></p>
            </div>
            <div class="col-md-4 posts-label" style="padding-left: 5px;">
              <h6 class="label-status">Following</h6>
              <p><?=$rowfollowing['COUNT(*)']?></p>
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
          $sql = "SELECT COUNT(*) FROM `follow` WHERE (`user_id` = '".$_SESSION['user_id']."') AND (`user_follower` = '".$row['user_id']."');";
          $result= mysqli_query($link, $sql);
          $rowd = mysqli_fetch_assoc($result);
        ?>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-md-2">
                <a href="./profile.php?u=<?=$row['user_name']?>"><img style="width: 100%" src="<?=$row['user_avatar']?>" class="img-thumbnail circle" alt=""></a>
                <?php if ($row['user_id'] != $_SESSION['user_id']) {?>
                <?php if($rowd['COUNT(*)'] == 0) {?>
                  <a href="?user_id_follow=<?=$row['user_id']?>" class="btn btn-danger btn-sm btn-block">Follow</a>
                <?php } else {?>
                  <a href="?user_id_unfollow=<?=$row['user_id']?>" class="btn btn-outline-danger btn-sm btn-block">Unfollow</a>
                <?php } ?>
                <?php }?>
                
              </div>
              <div class="col-md-10">
                <p class="blog-post-meta"><a href="./profile.php?u=<?=$row['user_name']?>"><?=$row['user_name']?></a>  : <?=$row['datetime']?>
                  
                  <?php if ($row['user_name'] == $_SESSION['user_name']) {?>
                    <a href="./?topid=<?=$row['topic_id']?>" class=""> <i class="fa fa-trash  fa-fw fa-lg" aria-hidden="true"></i></a>
                    <a href="#" data-toggle="modal" data-target="#<?=$row['topic_id']?>"> <i class="fa fa-pencil-square-o fa-fw fa-lg" aria-hidden="true"></i></a>
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
                <?php 
                $sql = "SELECT COUNT(*) FROM `favorite` WHERE (`topic_id` = '".$row['topic_id']."');";
                $result= mysqli_query($link, $sql);
                $rowd = mysqli_fetch_assoc($result);

                $sqlsd = "SELECT COUNT(*) FROM `favorite` WHERE `user_id` = '".$_SESSION['user_id']."' AND `topic_id` = '".$row['topic_id']."';";
                $resultsd= mysqli_query($link, $sqlsd);
                $rowsd = mysqli_fetch_assoc($resultsd);

                if($rowsd['COUNT(*)'] == 0){
                ?>
                <form method="post">
                  <input type="hidden" name="top_id_like" value="<?=$row['topic_id']?>">
                  <button type="submit" name="likenow" class="btn btn-light btn-block">
                  <i class="fa fa-heart-o fa-fw fa-lg" aria-hidden="true"></i>
                  Like (<?=$rowd['COUNT(*)']?>)</button>
                </form>
                <?php } else {?>
                <form method="post">
                  <input type="hidden" name="top_id_unlike" value="<?=$row['topic_id']?>">
                  <button type="submit" name="unlikenow" class="btn btn-light btn-block">
                  <i class="fa fa-heart fa-fw fa-lg" aria-hidden="true"></i>
                  Unlike (<?=$rowd['COUNT(*)']?>)</button>
                </form>
                <?php }?>
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
        <div class="modal fade" id="<?=$row['topic_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="post">
                  <textarea name="content_update" class="form-control" cols="47" rows="10" placeholder="What's happening?"><?=$row['topic_content']?></textarea>
                  <input type="hidden" name="top_id_update" value="<?=$row['topic_id']?>">
                  <input type="submit" name="post_top_update" class="btn btn-block btn-md btn-danger" style="margin-top: 15px" value="Update">
                </form>
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