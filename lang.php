<?php
include_once './php/variable.php';

if(isset($_GET['lang'])){
    $de = $_GET['de'];
    $en = $_GET['en'];
if($de){
    echo $de;
}else{
    echo $en;
}

}
