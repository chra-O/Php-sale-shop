<?php include 'includes/nav.php'; include 'includes/search.php' ?>
<?php include 'includes/search.php';?>




<div class="container bg-light radius-10 shadow-sm p-3">
<?php if(isset($userid)){ ?>
  <p class="m-2 p-2 text-nowrap bd-highlight text-uppercase font-weight-bold text-info " > user login ..</p>
  <?php } ?>
  <?php if(isset($admin)){ ?>
  <p class="m-2 p-2 text-nowrap bd-highlight text-uppercase font-weight-bold text-info " > admin login ..</p>
  <?php } ?>

 <div class="btn btn-secodary  bg-light shadow">
 <img src="assets/img/one.svg"  class=" m-2 p-2"width=" 55">love it
<img src="assets/img/thumb-down.svg"   class=" m-2 p-2" width=" 55"> don't like it
 </div>
 

<img src="assets/img/one.svg"  class="  m-2 p-2"width="35"><?php  get_column("person WHERE `ispass` = 1" , "ispass", 1 ,0);?> : love it
<img src="assets/img/thumb-down.svg"  class="  m-2 p-2"width="35"> <?php  get_column("person WHERE `ispass` = 0" , "ispass", 1 ,0);?> : don't like it
  

<div class="row m-3 justify-content-center">
<?php
if(isset($_POST['update']) && isset($admin)){
  
$id =x($_POST['id']);
$name =x($_POST['name']);
$age =x($_POST['age']);
$job =x($_POST['job']);


$query = mysqli_query($db , "UPDATE `person`  SET `name`='$name' , `age`='$age', `job`='$job' WHERE `id`='$id' ");
if($query){
  header("location:index.php?success");
}
}
if(isset($_GET['success'])){

  echo "<p class='alert alert-warning  p-3 m-4 container font-weight-bold text-danger'>  change successful done  </p>";
}
$query = mysqli_query($db, "SELECT * FROM `person`");
while($row = mysqli_fetch_assoc($query)){
  $is_pass = x($row['ispass']);
  $personid = x($row['id']);
  ?>

<div class="modal fade" id="post<?php echo x($row['id']);?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-header col-auto" >
      <form action="index.php" method="POST" >  
        <input type="text" value="<?php echo x($row['id']);?>" name="id" hidden>

         <img src="assets/img/man.svg"   width="40" height="40" alt=""> <label class="form-label"> type:</label>
         <input name="name" type="text" class="form-control  form-control-lg m-2" value="<?php echo x($row['name']);?>">
         <img src="assets/img/boy.svg"   width="50" height="50" alt="">  <label class=""> price:</label>
         <input name="age" type="text" class="form-control  form-control-lg m-2 " value="<?php echo x($row['age']);?>">
         <img src="assets/img/folder.svg"   width="40" height="40" alt="">  <label class=""> chef:</label>
         <input name="job" type="text" class="form-control  form-control-lg m-2" value="<?php echo x($row['job']);?>">
        
     
         </div>
        <div class="modal-footer">
         <img src="assets/img/exchange.svg "   width="40" height="40" alt="">
         <button  name="update" class="btn btn-outline-danger m-3 w-40  ml-7">UPDATE</button>
         <img src="assets/img/cancel.svg "   width="40" height="40" alt="">
         <button type="button" class="btn btn-outline-danger m-3 w-40  ml-7" data-dismiss="modal">Close</button>
        
      </div>
    </div>
         </form >
    
  </div>
</div>
<div class="card m-2 border-0 p-3 radius-10 shadow-sm" style="width: 18rem;">
  <img src="assets/img/<?php echo x($row['photo']);?>" class="w-50 m-auto">
  <div class="card-body text-center">
    <h5 class="card-title">type : <?php echo x($row['name']);?></h5>
    <p class="card-text">price : <?php echo x($row['age']);?></p>
    <p class="card-text">chef : <?php echo x($row['job']);?></p>
    <img src="assets/img/<?php  if ($is_pass == 0){echo "thumb-down.svg"; } else if($is_pass == 1 ){echo "one.svg";};?>" width="30" class="mr-3">
   
    
  </div>
  
  <?php if(isset($admin)){ ?>
    <div class="bg-light"> 
  <a href="?d=<?php echo x($row['id']);?>"><img src="assets/img/remove.svg" width="40" style="position:absolute;top:0;right:0;margin:10px" alt=""></a>
  <span data-toggle="modal" data-target="#post<?php echo x($row['id']);?>" >  <img src="assets/img/edit.svg"   width="40" height="40" alt=""> </span> </div>
 
 <?php } ?>
 

 <?php if(isset($userid)){ ?>
  <div>
    
 <a href="?like=<?php echo $personid;?>"> <img src="assets/img/one.svg"  class="m-2" width="30" height="40" alt=""> </a>
  <a href="?unlike=<?php echo $personid;?>"> <img src="assets/img/thumb-down.svg" class="m-2"  width="30" height="40" alt=""> </a>
  </div>
  <?php } ?>

</div>


<?php } ?>
  <br>
  

</div>
</div>