<?php include 'includes/nav.php';?>


<?php
if(isset($_POST['adminlogin'])){
  session_start();
$username= $_POST['username'];
$password =$_POST['password'];
if(empty($username)|| empty($password)){
  echo "<p class='alert alert-warning  p-3 m-4 container font-weight-bold text-danger'>  MISSed fild! And refresh the page  </p>";
}else{
  $query = mysqli_query( $db ," SELECT * FROM admin WHERE `username`='$username' AND `password`='$password'");
 
  if(mysqli_num_rows($query) == 1) {
    while($row  =mysqli_fetch_assoc($query)){
      $_SESSION['admin'] = x($row['id']);
    
      $_SESSION['username']=x($row ['username']);
    }
    header("location:index.php");
  }else{
    header("location:login.php");
  }
 
}

}
?>

<?php
if(isset($_POST['userlogin'])){
  session_start();
$username= $_POST['username'];
$password =$_POST['password'];
if(empty($username)|| empty($password)){
  echo "<p class='alert alert-warning  p-3 m-4 container font-weight-bold text-danger'>  MISSed fild! And refresh the page  </p>";
}else{
  $query = mysqli_query( $db ," SELECT * FROM `user` WHERE `name`='$username' AND `password`='$password'");
 
    if(mysqli_num_rows($query) == 1) {
    while($row  =mysqli_fetch_assoc($query)){
      $_SESSION['user'] = x($row['id']);
      $_SESSION['username']=x($row ['username']);
     
    }
    header("location:index.php");
  }else{
   
    header("location:login.php");
  }
 
}

}
?>
<div class="container text-center mt-4 bg-light p-4 "  >

  
 
  <img src="assets/img/group.svg"  class="userb"  width="100" class="m-2">
  <img src="assets/img/profile.svg" class="companyb" width="100"class="m-2" >     
  

  <div class="row  justify-content-center ">
    
   <form action="login.php" method="POST"  class=" company col-lg-4 bg-white d-none p-4 m-2 radius-10 shadow-sm"> 
    <input  type="text" name="username" placeholder="user name"class="form-control form-control-lg radius-10 mt-2 ">
    <input name="password" class="form-control form-control-lg radius-10 mt-2 "type="password" placeholder="password">
   <button name="adminlogin" class="btn btn-warning w-100 my-3 radius-10">log In</button>
</form>

<form action="login.php" method="POST"  class=" user col-lg-4 bg-white d-none p-4 m-2 radius-10 shadow-sm"> 
    <input  type="text" name="username" placeholder="name"class="form-control form-control-lg radius-10 mt-2 ">
   <input name="password" class="form-control form-control-lg radius-10 mt-2 "type="password" placeholder="password">
   <button name="userlogin" class="btn btn-dark w-100 my-3 radius-10">log In</button>
</form>


</div>
</div>
<script>
 $(document).ready(function(){
   $(".userb").on("click",function(){
    
   $(".user").removeClass('d-none');
   $(".company").addClass('d-none');

   })
   $(".companyb").on("click",function(){
  
   $(".company").removeClass('d-none');
   $(".user").addClass('d-none');
  

   })
 })

  
 
</script>