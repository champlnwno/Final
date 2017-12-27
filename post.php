<?php 
session_start();
include './dbconfig.php';
if (!isset($_SESSION['user_id'])) {
  header("Location:login.php");
}
if (isset($_GET['post_id'])) {
          $post_id = $_GET['post_id'];
        }else {

          header("Location:index.php");                                       

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
     header("Location:post.php?post_id=$post_id");                                       
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
  if ($result) {
     header("Location:post.php?post_id=$post_id");                                                    
  }
}

if (isset($_POST['unlikenow'])) {
  $sql = "DELETE FROM `favorite` WHERE `favorite`.`user_id` = ".$_SESSION['user_id']." AND `favorite`.`topic_id` = ".$_POST['top_id_unlike']."";
  $result= mysqli_query($link, $sql);
  if ($result) {
    header("Location:post.php?post_id=$post_id");                                                 
  }

}
if (isset($_GET['user_id_unfollow'])) {
  $sql = "DELETE FROM `follow` WHERE `follow`.`user_id` = ".$_SESSION['user_id']." AND `follow`.`user_follower` = ".$_GET['user_id_unfollow']."";
  $result= mysqli_query($link, $sql);
  if ($result) {
     header("Location:post.php?post_id=$post_id");                                                    
  }
}
if (isset($_GET['user_id_follow'])) {
  $sql = "INSERT INTO `follow` (`user_id`, `user_follower`) VALUES ('".$_SESSION['user_id']."', '".$_GET['user_id_follow']."');";
  $result= mysqli_query($link, $sql);
  if ($result) {
     header("Location:post.php?post_id=$post_id");                                                
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
    <link href="css/stylemain.css" rel="stylesheet">

</head>

<body>

    <?php include './include/nav.php'; ?>

    <main role="main" class="container">

        <div class="row">
            <aside class="col-sm-12 blog-sidebar">
                






            </aside>

            <div class="col-sm-12 ml-sm-auto blog-main">

                <?php 
                
        $sql = "SELECT * FROM `topic`
        JOIN `account` ON `topic`.`user_id` = `account`.`user_id`
        JOIN `image` ON `topic`.`img_id` = `image`.`img_id`
        WHERE `topic`.`topic_id` = $post_id";
        
        $query = mysqli_query($link, $sql, MYSQLI_STORE_RESULT) or die ("Query Error");
        $num_row = mysqli_num_rows($query);
    

        while($row = mysqli_fetch_assoc($query)){
          $sql = "SELECT COUNT(*) FROM `follow` WHERE (`user_id` = '".$_SESSION['user_id']."') AND (`user_follower` = '".$row['user_id']."');";
          $result= mysqli_query($link, $sql);
          $rowd = mysqli_fetch_assoc($result);
        ?>      
        <div class="sidebar-module sidebar-module-inset">

                    <div class="row">
                        <div class="col-md-12">
                            <a class="twPc-bg twPc-block"></a>
                            <a href="./profile.php?u=<?=$row['user_name']?>" class="twPc-avatarLink">
                                <img src="<?=$row['user_avatar']?>" class="twPc-avatarImg">
                            </a>

                            <div class="twPc-divUser">
                                <div class="twPc-divName">
                                    <a href="./profile.php?u=<?=$row['user_name']?>">@
                                        <?=$row['user_name']?>
                                    </a>
                                </div>
                                <span>
                                    <span style="font-size: 12px;">
                                        <?=$row['datetime']?>
                                            <?php if ($row['user_name'] == $_SESSION['user_name']) {?>
                                            <div class="dropdown" style="display: inline-block;float: right;margin-right: 20px;">
                                                <button class="btn btn-secondary btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    <i class="fa fa-cog" aria-hidden="true"></i> Options
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a href="#" class="dropdown-item" data-toggle="modal" data-target="#<?=$row['topic_id']?>">Edit</a>
                                                    <a href="./?topid=<?=$row['topic_id']?>" class="dropdown-item">Delete</a>
                                                </div>
                                            </div>
                                            <?php } ?>
                      
                                    </span>
                                </span>
                            </div>
                            <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p>
                                    <?=$row['topic_content']?>
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
                                        Like (
                                        <?=$rowd['COUNT(*)']?>)</button>
                                </form>
                                <?php } else {?>
                                <form method="post">
                                    <input type="hidden" name="top_id_unlike" value="<?=$row['topic_id']?>">
                                    <button type="submit" name="unlikenow" class="btn btn-light btn-block">
                                        <i class="fa fa-heart fa-fw fa-lg" style="color: red" aria-hidden="true"></i>
                                        Unlike (
                                        <?=$rowd['COUNT(*)']?>)</button>
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