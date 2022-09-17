<?php
include("header.php");

?>
<?php

$weather_con="";
$weather_temp="";
$error="";
if (array_key_exists("submit",$_GET))
{
if(!$_GET['search'])
{
    $error="We are Sorry please search something!!!";
}
else if($_GET['search'])
{

  $api_data=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_GET['search']."&APPID=9fb32d604405051d3e8ff0e78118aa51");
  $weather_array=json_decode($api_data,true);
  $temp=$weather_array["main"]['temp'];
  $weather_temp="<b>Temprature:</b> ".($temp-273)."&#8451<br>";
  $weather_con=$weather_temp." "."<b>Weather condition:</b> ".$weather_array["weather"]['0']["description"];
 

}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather APP</title>
</head>
<body>
<br><br>

<div class="input-group d-flex justify-content-center"style="align-items:center">
  <div >
    <form action="" method="GET" >
    <input type="text" id="search" name="search" placeholder="Search Weather" id="form1" class="form-control" />

  </div>
  <button type="submit" name="submit" class="btn btn-primary">
  </form>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
  </button>
</div>
<br>
<div  class="d-flex justify-content-center" id="message">
<?php 

if($weather_con)
{
  echo '<div class="alert alert-success" role="alert">
 '.$weather_con.'
</div>';
}

if($error)
{
  echo '<div class="alert alert-danger" role="alert">
 '.$error.'
</div>';
}
?>
</div>
</div>

<br><br><br><br><br><br><br>
</body>
</html>


<?php
include("footer.php");

?>