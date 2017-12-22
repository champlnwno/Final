<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php include './dbconfig.php';?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>REGISTER</title>
        
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="Styleregister.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
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
          <input type="radio" name="user_gender"  value="male">Male
          <input type="radio" name="user_gender" value="female">Female
          <input type="text" name="user_age" size="4" placeholder="age"><br><br>
          <?php
//             $user_date=null;
//             $user_month=null;
//             $user_year=null;
             ?>
<!--                <?php echo "วันที่"?>
              <select name="user_date">
                
                 <?php 
//                    for ($index1 = 1; $index1 <=31; $index1++) {
//                    echo "<option value=$index1";
//                    if($user_date==$index1) echo " selected";
//                    echo">  $index1 </option>";
//                                         }
                    ?>  
                            
              </select>
                   
                   
               <?php echo "เดือน"?>     
              <select name="user_month">
              <option value="มกราคม">มกราคม </option>  
              <option value="กุมภาพันธ์">กุมภาพันธ์ </option> 
              <option value="มีนาคม">มีนาคม </option> 
              <option value="เมษายน">เมษายน </option> 
              <option value="พฤษภาคม">พฤษภาคม </option> 
              <option value="มิถุนายน">มิถุนายน </option> 
              <option value="กรกฎาคม">กรกฎาคม </option> 
              <option value="สิงหาคม ">สิงหาคม  </option> 
              <option value="กันยายน">กันยายน </option> 
              <option value="ตุลาคม ">ตุลาคม  </option> 
              <option value="พฤศจิกายน">พฤศจิกายน </option> 
              <option value="ธันวาคม">ธันวาคม </option> 
              </select>
                    
                     <?php echo "พ.ศ."?>
                    <select  name="user_year" >
                        
                         <?php 
//                    for ($index2 = 2560; $index2 >=2400; $index2--) {
//                    echo "<option value=$index2";
//                    if($user_year==$index2 ) echo " selected";
//                    echo">  $index2  </option>";
//                                         }
                    ?>                          
                        
                   </select>-->
            </div><br>
             <input type="submit" name="submit" value="I'm sure">
          </form>
        
       
          
           <div class="style-co" >
            <?php echo "<a href =\"Home.php\">ยกเลิก</a>";   ?>
                </div>
         </div>
        <?php
         if(isset($_POST['submit'])){
                      $user_name=$_POST['user_name'];
                  $user_pass=$_POST['user_pass'];
                  $user_conpass=$_POST['user_conpass'];
                   $user_email=$_POST['user_email'];
                    $user_gender=$_POST['user_gender'];
                     $user_age=$_POST['user_age'];
         
                    
       
                  if ($user_pass!=$user_conpass) {
                      //กรณีpasswordไม่ตรงกัน
                      echo "<div><p>Passwordไม่ตรงกัน</p></div>";
                  }else{
                     $user_pass= md5($user_pass);
                      
                              $sql=" INSERT INTO `account` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_gender`, `user_age`) "
                                      . "VALUES (NULL, '$user_name', '$user_pass', '$user_email', '$user_gender', '$user_age');";
                            //  echo $sql; 
                  $result= mysqli_query($link, $sql);}
                              
                            if ($result) {
//                                  session_start();
//                                  $_SESSION['user']="5555";
//                                  if (isset($_SESSION['user']))echo "มี";
                       header("Location:Home.php");                                                
                                                                    
                 } else {     echo "<div><p>ไม่สามารถRegister ได้</p></div>";}
        
        
         }
        
        ?>
<</div>
    </body>
</html>
