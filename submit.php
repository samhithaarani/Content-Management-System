<?php 
//session started(it's nothing but a command to start or initialise the seesion)
if(isset($_POST['username']))
{
    include("db.php");
    $username=$_POST['username'];
    $password=$_POST['password'];

   $qq=  $q=mysqli_query($con,"SELECT * FROM register where username='$username'");
   $count=mysqli_num_rows($qq);
  if($count == 0)
  {
    
    
$q=mysqli_query($con,"INSERT INTO `register` (`sno`, `username`, `password`) values (NULL,'$username', '$password')");

if($q)
{
    echo "sucessfully registered";
}

else
  {
    echo "failed";
  }
}
else
{
    echo "user name already Exists!!! try with another name" ;
}

}

// else if(isset($_POST['desc']))
// {
//     include("db.php");
//     $desc=$_POST['desc'];
//     $name=$_POST['name'];
//     $admin=$_POST['admin'];
  
    
// $q=mysqli_query($con,"INSERT INTO `course` (`title`, `desc`, `admin`) values ('$name', '$desc','$admin')");

// if($q)
// {
//     echo "sucessfully Posted";
// }

// else
// {
//     echo "unable to connect to our database" ;
// }

// }



?>
