<?php
include "../bootstrap/init.php"; 

if(!isAjaxRequest()){
    diePage("Invalid Request!");
}
//Request is ajax and ok
usleep(100000);

// echo "ok!";
$keyword = $_POST['keyword'];
if(!isset($keyword) or empty($keyword)){
    die("شروع به تایپ کردن کنید ...");
}

$locations = getLocationS(['keyword' => $keyword]);
// dd($locations);
if(sizeof($locations) == 0){
    echo "نتیجه ای یافت نشد!";
}
foreach($locations as $loc){
    echo "<a href='".BASE_URL."?$loc->id'>
    <div class='result-item' data-lat='$loc->lat' data-lng='$loc->lng'>
        <span class='loc-type'>".locationTypes[$loc->type]."</span>
        <span class='loc-title'>$loc->title</span>
    </div>
    </div></a>";
}