<?php

    $filename = "welcome.txt";
    $myfile = fopen($filename, "w") or die("Unable to open file!");
    $txt = "2220100303\n";
    fwrite($myfile, $txt);
    $txt = "Kamal Mittal\n";
    fwrite($myfile, $txt);
    fclose($myfile);
    
    if(file_exists($filename))
    {
       $filesize = filesize($filename);
       $msg = "File  created with name $filename ";
       $msg .= "containing $filesize bytes";
       echo $msg;
    }
    else
    {
       echo "File $filename does not exit";
    }
    echo"<br> This code is executed by Kamal Mittal!";
?>