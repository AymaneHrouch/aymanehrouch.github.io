<?php

date_default_timezone_set("Africa/Casablanca");

$handle = fopen("./".$folder."/counter.txt", "r");
$counter = (int ) fread($handle,20);
fclose ($handle);

if(!isset($_GET['counter'])) {
    $counter++;
    $handle = fopen("./".$folder."/counter.txt", "w" );
    fwrite($handle,$counter) ;
    fclose ($handle);
    
    $visits = fopen("./".$folder."/visits.txt", "a");
    $data = $counter."- date: ".date("Y/m/d, H:i")." | ip: ".$_SERVER['REMOTE_ADDR']."\n";
    fwrite($visits,$data) ;
    fclose ($visits) ;
}

?>