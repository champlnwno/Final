<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$host="localhost";
$username="root";
$password="";
$database="blogger";
        $link=new mysqli($host,$username,$password,$database);
        if($link){
         //   echo "สามารถเชื่อมต่อได้ $database ";
                                
            
        } //echo "เชื่อมต่อ $database ได้แล้ว";
        $link->query("set name utf8");
                
