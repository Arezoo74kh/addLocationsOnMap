<?php
include "../bootstrap/init.php"; 

if(!isAjaxRequest()){
    diePage("Invalid Request!");
}
//Request is ajax and ok

if(insertLocation($_POST)){
   echo "مکان با موفقیت ثبت شد و منتظر تایید مدیر است.";
}else{
   echo "مشکلی در ثبت مکان پیش آمده است.";
}