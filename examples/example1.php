<?php 

require '../tokendownloader.php';

$downloader = new tokendownloader;

//setting token
$downloader->setToken("file.txt");
//downloading file
$downloader->download("file.txt");

