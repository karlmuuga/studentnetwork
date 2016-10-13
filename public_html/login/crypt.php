<?php
if(isset($_GET['enCrypt'])){
$unsecure2 = $_GET['enCrypt'];
echo hash("sha512", $unsecure2);}

if(isset($_GET['setToken'])){
        $token = md5(uniqid(rand(), true));
        echo $token;
}
    
?>