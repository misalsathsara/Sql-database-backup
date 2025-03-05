<?php 
try {
   $bdd = new PDO('mysql:host=habaraduwaps.lk;dbname=habaraduwaps_habaraduwaps;charset=UTF8', 'habaraduwaps_habaraduwaps', '8Md_pmotVwby');
} catch(Exception $e) {
    exit("Unable to connect to database: " . $e->getMessage());
}

date_default_timezone_set('Asia/Colombo'); 
$date1 = date("Y-m-d");
$date = new DateTime("$date1", new DateTimeZone('Asia/Colombo'));
$datet = date("Y-m-d H:i:s");

// Prevent redeclaration of the msgb function
if (!function_exists('msgb')) {
    function msgb($msg){ 
        $des = "<script type='text/javascript'>";
        $des .= "alert('$msg');";
        $des .= "</script>";
        echo $des;
    }
}

// Prevent redeclaration of the nextdate function
if (!function_exists('nextdate')) {
    function nextdate($datex){
        // Add your logic for nextdate here
    }
}
?>