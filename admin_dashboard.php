<?php include("header.php") ?>
<br><br>

<?php
session_start();
if(isset($_SESSION['ausername']))
{
    $username=$_SESSION['ausername'];
?>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">

<h3>welcome ADMIN <?php echo $username;?></h3><a href="logout.php" style= "color:green;text-align:center;font-weight:bold">Logout</a>
</div>
<div class="col-md-4">

</div>
<div class="col-md-4">
</div>
</div>
<br>

<div class="row">
<div class="col-md-4">
</div>

<div class="col-md-4" >
<form action="./my_con/u.php" method="POST" enctype="multipart/form-data">

  <div class="form-group">
  <input class="form-control" id="name" name="name" type="text" placeholder="Course Title">
    <label for="exampleFormControlTextarea1">Description of the Course</label>
    <textarea class="form-control" name="desc"  id="desc" id="exampleFormControlTextarea1" rows="3"></textarea>

  </div>
 
  <div class="mb-3">
  <label for="exampleFormControlTextarea1">Choose Course Image</label><br>
  <input type="file" name="f1" class="btn btn- btn-sm" style="background-image:linear-gradient(rgb(228, 42, 228), rgba(248, 6, 119, 0.9));">
  
  <b><small><b>**JPG Format Recommended</b></small></b>
</div>

  <div class="mb-3">
  <label for="exampleFormControlTextarea1">Choose Course Content</label><br>
  <input type="file" name="f2" class="btn btn- btn-sm" style="background-image:linear-gradient(rgb(228, 42, 228), rgba(248, 6, 119, 0.9));">
 
  <b><small><b>**PDF Format Recommended</b></small></b>
</div>


<button class="btn btn-primary btn-sm" >submit</button>
<br>

</form>
<p id="message"></p>
</div>

<div class="col-md-4">
</div>

</div>



<br><br><br><br><br><br>


<?php include("footer.php") ?>
<?php 
}
else
{
    header("location:admin.php");
}
?>

