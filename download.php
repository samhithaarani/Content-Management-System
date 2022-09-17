<?php
$name=$_GET['file'];

if(file_exists("uploads_pdf/$name"))
{
    header("content-disposition:attachment;filename=".$name.";");
    readfile("uploads_pdf/$name");
}
else
{
    echo "file not found";
}



?>