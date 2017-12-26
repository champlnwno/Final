<!DOCTYPE html>

<?php include './dbconfig.php';
if (isset($_SESSION['user_id'])) {
  header("Location:index.php");
}

if (isset($_POST['submit'])) {
    $user_name=$_POST['user_name'];
    $user_pass=$_POST['user_pass'];
    $user_conpass=$_POST['user_conpass'];
    $user_email=$_POST['user_email'];
    $user_gender=$_POST['user_gender'];
    $user_age=$_POST['user_age'];
    if ($user_pass!=$user_conpass) {
        echo "<script>alert('รหัสไม่ตรงกัน')</script>";
    } else {
        if ($user_name == null || $user_pass == null || $user_conpass == null || $user_email == null || $user_gender == null || $user_age == null) {
           echo "<script>alert('ใส่ให้ครบ')</script>";
        }else {
            $user_pass= md5($user_pass);
            $sql="INSERT INTO `account` (`user_id`, `user_name`, `user_pass`,`user_avatar`, `user_email`, `user_gender`, `user_age`, `user_datetime`) "
            . "VALUES (NULL, '$user_name', '$user_pass', 'http://cliparts101.com/files/255/584403E66798177B2C8372146E9589BF/AwesomeLinux.png', '$user_email', '$user_gender', '$user_age', now());";
            $result= mysqli_query($link, $sql);
            if ($result) {
                header("Location:index.php");                                                
            } else {
                echo "<script>alert('ไม่สามารถ register')</script>";
            }
        }
        
    }
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/Styleregister.css">
      
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
            crossorigin="anonymous">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>        
        <div>
            <div class="modal-body">
                <div class="modal-re">
                
                    <h4>REGISTER</h4>
                    <form method="POST"> 
                    <input type="text" name="user_name" size="35"placeholder="User Name"><br><br>
                    <input type="password" name="user_pass" size="35" placeholder="Choose a Password"><br><br>
                    <input type="password" name="user_conpass" size="35" placeholder="Re-enter password"><br><br>
                    <input type="text" name="user_email" size="35" placeholder="e-mail"><br><br>
                    <input type="radio" name="user_gender" value="male" checked>Male
                    <input type="radio" name="user_gender" value="female">Female
                    <input type="text" name="user_age" size="4" placeholder="age">

                </div>
            <input type="submit" name="submit" value="I'm sure">
            </form>

                <div class="style-co" >
                <?php echo "<a href =\"login.php\">ยกเลิก</a>";   ?>
                </div>
            </div>
        
    </div>
    </body>
</html>
