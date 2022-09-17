
<?php 
session_start();//session started(it's nothing but a command to start or initialise the seesion)
if(isset($_POST['username']))
{
    include("db.php");
    $username=$_POST['username'];
    $password=$_POST['password'];
    $q=mysqli_query($con,"SELECT * FROM register where username='$username' and  password='$password'");
    $row=mysqli_fetch_array($q);
    $count=mysqli_num_rows($q);
    if($count>0)
    {
       
        echo "sucess"; 
        // if data is present in db we need to give a sign to our webpage a hint to remember some detail abut user
        //'we are saying to website that hey user is here'here we make our webpage to remember username and usertype by creating session variable
         $_SESSION['username']=$username; 
        
    }

    else
    {
        echo "invalid";
    }

}




else if(isset($_POST['ausername']))
{
    include("db.php");
    $ausername=$_POST['ausername'];
    $password=$_POST['password'];
    $q=mysqli_query($con,"SELECT * FROM admin where ausername='$ausername' and  password='$password'");
    $row=mysqli_fetch_array($q);
    $count=mysqli_num_rows($q);
   
    if($count>0)
    {
       
        echo "sucess"; 
        // if data is present in db we need to give a sign to our webpage a hint to remember some detail abut user
        //'we are saying to website that hey user is here'here we make our webpage to remember username and usertype by creating session variable
         $_SESSION['ausername']=$ausername; 
        
    }

else
{
   echo "invalid";
}

}

else
{
    header("location:index.php");
}
?>