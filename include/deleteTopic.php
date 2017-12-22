<?php
session_start();
include './../dbconfig.php';
if (isset($_GET['topid'])) {
  $sql = "DELETE FROM `topic` WHERE `topic`.`topic_id` = ".$_GET['topid']." AND `topic`.`user_id` = ".$_SESSION['user_id']."";
  $result= mysqli_query($link, $sql);
  echo "<script>window.history.back();</script>";
}