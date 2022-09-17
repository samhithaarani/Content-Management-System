<?php include("header.php") ?>
<br><br>

<?php
session_start();
if(isset($_SESSION['username']))
{
    $username=$_SESSION['username'];
?>
<style>

#mycard .card
{
    display:inline-block;
    align-items: center;
    padding: 5px;


}

#mycard
{
  padding: "20px";
  margin: 0;
}
</style>
<div class="row">
<div class="col-md-1">
</div>
<div class="col-md-3">

<h3>welcome <?php echo $username;?></h3><a href="logout.php" style= "color:green;text-align:center;font-weight:bold">Logout</a>
</div>
<div class="col-md-4">

</div>
<div class="col-md-4">
</div>
</div>
<br>
<div class="row">
<div class="col-md-1">
</div>
<?php
 
// Set the current working directory
$directory = getcwd()."/uploads_img";
$directory1 = getcwd()."/uploads_pdf";
  
// Returns array of files
$files1 = scandir($directory);
$files2 = scandir($directory1);
  
// Count number of files and store them to variable
$num_files = count($files1) - 2;
$num_files1 = count($files2) - 2;


 
// echo $num_files . " files";
// echo $num_files1 . " files";

$mydir="uploads_img";
$mydir1="uploads_pdf";
$myfiles1=array_diff(scandir($mydir),array('.','..'));
$myfiles2=array_diff(scandir($mydir1),array('.','..'));
// print_r($myfiles1);
// print_r($myfiles2);
include("db.php");



echo '<div class="my" style="display:inline;right:20px;margin:0;">';
for ($x = 2; $x <= $num_files+1; $x++) {
  // echo $myfiles1[$x];
  // echo $myfiles2[$x];


  $paths=[];
  $add_path=pathinfo($myfiles1[$x])["filename"];
  array_push($paths,$add_path);
  
  

  $paths1=[];
  $add_path=pathinfo($myfiles2[$x])["filename"];
  array_push($paths1,$add_path);
  $q=mysqli_query($con,"SELECT * FROM `course` WHERE file_name='$myfiles1[$x]' ");
  $row=mysqli_fetch_array($q);


  sort ($paths);
  sort ($paths1);
  if($paths==$paths1)
  {

  echo '<div class="col-md-10" id="mycard">';
   echo '<div class="card" style="width: 18rem; height:25rem">';
      echo '<a href=uploads_pdf/'.$myfiles2[$x].' ><img class="card-img-top" width="300" height="200" src=uploads_img/'.$myfiles1[$x].' alt="Card image cap"></a>';
      echo '<div class="card-body"><h5 class="card-title">'.$row['title'].'</h5>';
        echo '<p class="text-nowrap card-text">'.$row['desc'].'</p>';
        echo '<a class="btn btn-" href="download.php?file='.$myfiles2[$x].'" style="background-image:linear-gradient(rgb(228, 40, 228), rgba(248, 6, 119, 0.5));color:white;">Download Content</a>';
      echo '</div>';
   echo '</div>';
    echo '</div>';

      
  
  }
 
  
  
}
echo '</div>'; 
?>

<style>
  .my #mycard {

    display:inline;
    width:300;
    height:200;
    padding:80px;
    

}
</style>


<div class="col-md-1">
</div>
</div>




<br><br><br><br><br><br>
<?php include("footer.php") 

?>
<?php }
else
{
    header("location:login.php");
} ?>