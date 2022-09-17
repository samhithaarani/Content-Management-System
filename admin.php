<?php
session_start();
if(!isset($_SESSION['ausername']))
{
   
?>
<?php
include("header.php");
?>
<!-- login form-->
<br><br>
<div class="row">
<div class="col-md-4">
    
</div>
<div class="col-md-4">
<br><br>
<h4><u>ADMIN/Login</u></h4>
<div id="fo">
    <div class="form-group">
        <label>AdminUsename</label>
      <input type="text" id="ausername" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Password</label>
      <input type="password"  id="password" name="password"class="form-control">
    </div>
    <button type="submit" value="login" class="btn btn-" style="background-image:linear-gradient(rgb(228, 40, 228), rgba(248, 6, 119, 0.5));"onclick="submit();">Submit</button>
</div>
<div id="message"></div>
</div>

</div>
<div class="col-md-4"></div>
</div>
<br><br>
<script>
  
  function submit()
    {
        var username=$("#ausername").val();
        var password=$("#password").val();
         if(username=="")
         {
            $("#message").html("<p><b>please fill the username</b></p>");
         }

         else if(password=="")
         {
            $("#message").html("<p><b>please fill the password</b></p>");
         }

         else
         {

            var datastring="ausername="+username+"&password="+password;
           
            $. ajax({
                type: "POST",
                url: 'login_db.php',
                data: datastring,
                beforeSend:function()
                {
                    $("#message").html("<p><b>Verifiying...<b></p>");
                },
                success:function(data)
                {
                    alert(data);
                    if(data=="invalid")
                    {
                        $("#message").html("<font style='color:red;font-size:15px;'>invalid details</font>");
                    }

                    else
                    {
                        $("#message").html("<font style='color:green;font-size:15px;'><b>Logged In!!</b></font>");
                        window.location='admin_dashboard.php';
                    }
                }
              });
         }
         
     }

</script>
<?php 
include("footer.php");
?>
<?php 
}
else
{
    header("Location:admin_dashboard.php");
}
?>