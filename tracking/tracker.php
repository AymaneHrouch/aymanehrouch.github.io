<?php

date_default_timezone_set("Africa/Casablanca");

$handle = fopen("./tracking/counter.txt", "r");
$counter = (int ) fread($handle,20);
fclose ($handle);

if(!isset($_GET['counter'])) {
    $counter++;
    $handle = fopen("./tracking/counter.txt", "w" );
    fwrite($handle,$counter) ;
    fclose ($handle);
    
    $visits = fopen("./tracking/visits.txt", "a");
    $data = $counter."- date: ".date("Y/m/d, H:i")." | ip: ".$_SERVER['REMOTE_ADDR']."\n";
    fwrite($visits,$data) ;
    fclose ($visits) ;
}
else if($_GET['counter'] == 'reset') {
    $counter = 0;
    $handle = fopen("./tracking/counter.txt", "w" );
    fwrite($handle,$counter) ;
    fclose ($handle) ;
}
else if($_GET['counter'] == -1) {
	$counter--;
    $handle = fopen("./tracking/counter.txt", "w" );
    fwrite($handle,$counter) ;
    fclose ($handle) ;
}

?>