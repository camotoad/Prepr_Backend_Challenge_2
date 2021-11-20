<?php
$dbhost = "localhost";
$dbuser = "root";
$dbpw = "";
$dbname = "php_challenge_login_db";

/* 
using phpmyadmin.
I exported all the tables and left them in the sql folder.
*/

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpw, $dbname)){
    die('Connection to db failed');
}
