<?php
$db = mysqli_connect('localhost' , 'root' , '' , 'cv');
function x($data){
    global $db;
    $data = mysqli_real_escape_string($db , htmlspecialchars($data));
    return $data;
} 
session_start();
if(isset($_SESSION['admin'])){
  $admin = $_SESSION['admin'];
} else if (isset($_SESSION['user']))
$userid = $_SESSION['user'];
{ 

}

if(isset($_GET['d']) && isset($admin)){
    $id = x($_GET['d']);
    mysqli_query($db , "DELETE FROM `person` WHERE `id` = '$id'");
    header("Location:index.php");
  }

  
if(isset($_GET['like']) && isset($userid)){
   $person= x($_GET['like']);
  mysqli_query($db ,"UPDATE `person` SET `ispass` = 1 WHERE  `id` = '$person'");
   
} else if( isset($_GET['unlike']) && isset($userid)){
  $person= x($_GET['unlike']);
  mysqli_query($db ,"UPDATE `person` SET `ispass` =0 WHERE  `id` = '$person'");
  header("Location:index.php");


}

  if(isset($_GET['logout'])){
   session_unset();
   session_destroy();
   unset($admin);
   unset($userid);
   header("location:index.php");



  }
  function get_column($condition ,$rowfunction , $stayt ,$staytcolum){
   global $db;
   $query= mysqli_query( $db ,"SELECT * FROM $condition");
   $num_row =mysqli_num_rows($query);
   while($row =mysqli_fetch_assoc($query)){
     if($staytcolum ==1){
     echo $row[$rowfunction];
   }
  }
   if($stayt==1){
    echo $num_row;

   }
  }
?>



  
 
