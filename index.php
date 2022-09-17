<?php
include("header.php")
?>

<!-- Register form-->
<!-- simple registration form -->
<br><br>
<div class="row">
<div class="col-md-2">
    
</div>
<div class="col-md-4">
<br><br>
<h4><u>RESGISTER</u></h4>
<div>
    <div class="form-group">
        <label>Username</label>
      <input type="text" id="username" class="form-control" name="username">
    </div>
    <div class="form-group">
        <label>Password</label>
      <input type="password"  id="password" name="password"class="form-control">
      <button onclick="viewpass();"><img src="https://t3.ftcdn.net/jpg/03/22/15/60/360_F_322156093_8Sasp1yPrfO5P55wlmkNlR7a8aqH7QS5.jpg" style="width:22px; height:20px"></button>
      
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
      <input type="password"  id="cpassword" name="cpassword"class="form-control">
    </div>
    <button type="submit" class="btn btn-" onclick="submit();">Submit</button>
</div>
<div id="message"></div>
</div>


<div class="col-md-4" id="display" style="visibility: hidden;">
  <br>
   <h2 id="dusername" >hi</h2><br>
   <h4 id="dquote" style="visibility: hidden;">Happy Learning!!Have a Great Day!!</h4><br>
   <img id="dimg" style="visibility: hidden;"src="https://i.gifer.com/6il0.gif" width="90px" height="90px">
   
   
   


</div>
<div class="col-md-2">
    
</div>
</div>
<br><br><br><br><br><br><br>

<?php include("footer.php"); ?>


<script>
 
 $('#username').on('keyup',function(){
            
            document.getElementById("display").style.visibility="visible";
            name=document.getElementById("username").value
            document.getElementById("dusername").innerHTML="Hii"+ " "+name;
        }); 
 $('#password').on('keyup',function(){
            
            document.getElementById("dquote").style.visibility="visible";
           
        }); 
 $('#cpassword').on('keyup',function(){
            
            document.getElementById("dimg").style.visibility="visible";
           
        }); 
 
     function submit()
    {
       
     
        var username=$("#username").val();
        var password=$("#password").val();
        var cpassword=$("#cpassword").val();
     
        
         if(username=="")
         {
           
            $("#message").html("<p><b>please fill the username</b></p>");
         }

         else if(password=="")
         {
            $("#message").html("<p><b>please fill the password</b></p>");
         }
         else if(cpassword=="")
         {
            $("#message").html("<p><b>please confirm your password</b></p>");
         }


        else if(password!=cpassword)
        {
            $("#message").html("<p><b>passwords not matching</b></p>"); 
        }
         else
         {
            var datastring="username="+username+"&password="+password;
           
            $. ajax({
                type: "POST",
                url: 'submit.php',
                data: datastring,
                beforeSend:function()
                {
                    $("#message").html("<p><b>processing....<b></p>");
                },
                success:function(data)
                {
                    alert(data);
                    if(data=="user name already Exists!!! try with another name")
                    {
                        $("#message").html("<font style='color:red;font-size:15px;'><b>invalid details</b></font>");
                    }

                    else
                    {
                        $("#message").html("<font style='color:green;font-size:15px;'><b>verified!!</b></font>");
                        window.location='login.php';
                    }
                }
              });
         }


      
     }

    function viewpass()
{
    
    document.getElementById("password").type="text";
    var delayInMilliseconds = 2000; //3 seconds

setTimeout(function() {
    document.getElementById("password").type="password";
}, delayInMilliseconds);

   
}
</script>
</body>
</html>