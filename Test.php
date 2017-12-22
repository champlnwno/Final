<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     
  
  
    </head>
    <body>        
    <div>
     <form method="POST"> 
          <input type="text" name="user_name" size="35"placeholder="User Name"><br><br>
          <input type="password" name="user_pass" size="35" placeholder="Choose a Password"><br><br>
          <input type="password" name="user_conpass" size="35" placeholder="Re-enter password"><br><br>
          <input type="text" name="user_email" size="35" placeholder="e-mail"><br><br>
          <input type="radio" name="user_gender"  value="male">Male
          <input type="radio" name="user_gender" value="female">Female
          <input type="text" name="user_age" size="4" placeholder="age"><br><br>
                   
          <input type="submit" name="submit" value="I'm sure">
         </form><br>
        
        
         
         
            <?php echo "<a href =\"Home.php\">ยกเลิก</a>";   ?>
               
         
        <?php
         if(isset($_POST['submit'])){
                      $user_name=$_POST['user_name'];
                  $user_pass=$_POST['user_pass'];
                  $user_conpass=$_POST['user_conpass'];
                   $user_email=$_POST['user_email'];
                    $user_gender=$_POST['user_gender'];
                     $user_age=$_POST['user_age'];
         
                   if ($user_pass!=$user_conpass) {
                     // กรณีpasswordไม่ตรงกัน
                      echo "<div><p>Passwordไม่ตรงกัน</p></div>";
                  }else{
                    
                      
                              $sql=" INSERT INTO `account` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_gender`, `user_age`) "
                                     . "VALUES (NULL, '$user_name', '$user_pass', '$user_email', '$user_gender', '$user_age');";                            
                              echo $sql; 
                  $result= mysqli_query($link, $sql);}
                              
                            if ($result) {
                                  
                          header("Location:Home.php");                                                
                                                                    
                 } else {     echo "<div><p>ไม่สามารถRegister ได้</p></div>";}
     
        
         }
         

        
        ?>
<</div>
    </body>

</html>
